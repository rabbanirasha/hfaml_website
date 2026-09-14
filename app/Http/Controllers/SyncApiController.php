<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SyncApiController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $payload = $request->all();

        $validated = collect($payload)
            ->filter(fn ($value) => is_array($value))
            ->all();

        abort_if($validated === [], 422, 'No table datasets provided.');

        foreach (array_keys($validated) as $tableName) {
            abort_unless(
                $this->isValidTableName($tableName),
                422,
                "Invalid table name: {$tableName}"
            );
        }

        $counts = [];

        DB::transaction(function () use ($validated, &$counts): void {
            foreach ($validated as $tableName => $records) {
                if ($records === []) {
                    $counts[$tableName] = 0;
                    continue;
                }

                $this->ensureTableExists($tableName, $records[0]);
                $this->ensurePrimaryKey($tableName, array_key_first($records[0]));

                $counts[$tableName] = DB::table($tableName)->insertOrIgnore($records);
            }
        });

        return response()->json([
            'status' => 'ok',
            'inserted' => $counts,
        ]);
    }

    private function isValidTableName(string $tableName): bool
    {
        return preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $tableName) === 1;
    }

    private function ensureTableExists(string $table, array $sampleRecord): void
    {
        if (Schema::hasTable($table)) {
            return;
        }

        foreach (array_keys($sampleRecord) as $column) {
            abort_unless(
                $this->isValidTableName($column),
                422,
                "Invalid column name: {$column}"
            );
        }

        Schema::create($table, function (Blueprint $blueprint) use ($sampleRecord): void {
            foreach ($sampleRecord as $column => $value) {
                $this->addColumn($blueprint, $column, $value);
            }
        });
    }

    private function addColumn(Blueprint $blueprint, string $column, mixed $value): void
    {
        match (true) {
            is_null($value) => $blueprint->string($column)->nullable(),
            is_bool($value) => $blueprint->boolean($column)->nullable(),
            is_int($value) => $blueprint->bigInteger($column)->nullable(),
            is_float($value) => $blueprint->decimal($column, 18, 4)->nullable(),
            $this->looksLikeDateTime($value) => $blueprint->dateTime($column)->nullable(),
            default => $blueprint->text($column)->nullable(),
        };
    }

    private function looksLikeDateTime(mixed $value): bool
    {
        return is_string($value)
            && preg_match('/^\d{4}-\d{2}-\d{2}([ T]\d{2}:\d{2}:\d{2})?$/', $value) === 1;
    }

    private function ensurePrimaryKey(string $table, string $column): void
    {
        $hasPrimaryKey = DB::table('information_schema.table_constraints')
            ->where('table_schema', DB::getDatabaseName())
            ->where('table_name', $table)
            ->where('constraint_type', 'PRIMARY KEY')
            ->exists();

        if ($hasPrimaryKey) {
            return;
        }

        Schema::table($table, function (Blueprint $table) use ($column): void {
            $table->primary($column);
        });
    }
}