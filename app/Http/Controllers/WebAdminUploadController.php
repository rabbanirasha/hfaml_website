<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebAdminUploadController extends Controller
{
    public function storeReports(Request $request)
    {
        $data = $request->validate([
            'report_type'      => 'required|string|max:500',
            'report_date'      => 'nullable|date',
            'remarks'          => 'nullable|string|max:1000',
            'report_files'     => 'required|array|min:1',
            'report_files.*'   => 'file|max:512000',
        ]);

        $date = $data['report_date'] ?? now()->format('Y-m-d');

        $startNumber = DB::table('tbl_reports')
            ->where('report_type', $data['report_type'])
            ->count() + 1;

        $destination = public_path('storage/reports');
        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $rows = [];

        foreach ($request->file('report_files') as $i => $file) {
            $number = $startNumber + $i;
            $filename = Str::slug($data['report_type']) . '-' . $number . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move($destination, $filename);

            $rows[] = [
                'report_title' => $data['report_type'] . '_' . $number,
                'report_type'  => $data['report_type'],
                'report_date'  => $date,
                'remarks'      => $data['remarks'] ?? '',
                'report_link'  => 'reports/' . $filename,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }

        DB::table('tbl_reports')->insert($rows);

        return back()->with('success_reports', count($rows) . ' report(s) uploaded successfully.');
    }

    public function storeDownloads(Request $request)
    {
        $data = $request->validate([
            'download_type'    => 'required|string|max:500',
            'download_date'    => 'nullable|date',
            'remarks'          => 'nullable|string|max:1000',
            'download_files'   => 'required|array|min:1',
            'download_files.*' => 'file|max:512000',
        ]);

        $date = $data['download_date'] ?? now()->format('Y-m-d');

        $startNumber = DB::table('tbl_downloads')
            ->where('download_type', $data['download_type'])
            ->count() + 1;

        $destination = public_path('storage/downloads');
        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $rows = [];

        foreach ($request->file('download_files') as $i => $file) {
            $number = $startNumber + $i;
            $filename = Str::slug($data['download_type']) . '-' . $number . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move($destination, $filename);

            $rows[] = [
                'download_title' => $data['download_type'] . '_' . $number,
                'download_type'  => $data['download_type'],
                'download_date'  => $date,
                'remarks'        => $data['remarks'] ?? '',
                'download_link'  => 'downloads/' . $filename,
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        DB::table('tbl_downloads')->insert($rows);

        return back()->with('success_downloads', count($rows) . ' form/doc(s) uploaded successfully.');
    }
}