<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class Recordeditor extends Component
{
    use WithFileUploads;

    public ?string $table = null;
    public ?string $primaryKey = null;
    public $recordId = null;
    public array $fields = [];
    public array $richFields = [];
    public array $fieldTypes = [];
    public array $imageUploads = [];

    protected function resolveFieldTypes(string $table, array $fields): array
    {
        $types = [];

        foreach ($fields as $field) {
            try {
                $types[$field] = Schema::getColumnType($table, $field);
            } catch (\Throwable $e) {
                $types[$field] = 'string';
            }
        }

        return $types;
    }    

    #[On('add-record')]
    public function addRecord(string $table, string $primaryKey, array $columns, array $richFields = []): void
    {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->recordId = null;
        $this->richFields = $richFields;

        $this->fields = collect($columns)
            ->pluck('field')
            ->reject(fn ($field) => $field === $primaryKey)
            ->mapWithKeys(fn ($field) => [$field => ''])
            ->all();
        $this->fieldTypes = $this->resolveFieldTypes($table, array_keys($this->fields));
        $this->dispatch('record-modal-open');
        $this->imageUploads = [];
    }    

    #[On('edit-record')]
    public function editRecord(string $table, string $primaryKey, $id, array $richFields = []): void
    {
        $row = DB::table($table)->where($primaryKey, $id)->first();

        if (! $row) {
            return;
        }

        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->recordId = $id;
        $this->richFields = $richFields;
        $this->fields = (array) $row;
        $this->fieldTypes = $this->resolveFieldTypes($table, array_keys($this->fields));
        $this->dispatch('record-modal-open');
        $this->imageUploads = [];
    }

    public function save(): void
    {
        if (! $this->table) {
            return;
        }

        // only validate fields that actually have a new file selected
        $this->validate(
            collect($this->imageUploads)
                ->filter()
                ->mapWithKeys(fn ($file, $field) => ["imageUploads.$field" => 'image|max:5120'])
                ->all()
        );

        foreach ($this->imageUploads as $field => $file) {
            if ($file) {
                $oldPath = $this->fields[$field] ?? null;

                $folder = 'img/' . Str::after($this->table, 'tbl_'); // e.g. tbl_news -> img/news
                $destination = public_path($folder);

                if (! File::isDirectory($destination)) {
                    File::makeDirectory($destination, 0755, true);
                }

                $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '-' . time() . '-' . random_int(1000, 9999)
                    . '.' . $file->getClientOriginalExtension();

                File::copy($file->getRealPath(), $destination . DIRECTORY_SEPARATOR . $filename);

                $this->fields[$field] = $folder . '/' . $filename;

                if ($oldPath && File::exists(public_path($oldPath))) {
                    File::delete(public_path($oldPath));
                }
            }
        }

        $data = $this->fields;
        unset($data[$this->primaryKey]);

        if ($this->recordId === null) {
            $data['created_at'] = now();
            $data['updated_at'] = now();
            DB::table($this->table)->insert($data);
        } else {
            DB::table($this->table)->where($this->primaryKey, $this->recordId)->update($data);
        }

        $this->imageUploads = [];
        $this->dispatch('record-updated', table: $this->table);
        $this->dispatch('record-modal-close');
    }

    public function render()
    {
        return view('livewire.recordeditor');
    }
}