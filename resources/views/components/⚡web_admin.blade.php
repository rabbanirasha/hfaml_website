<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

new class extends Component
{
    use WithFileUploads;

    public array $download_types = [
        'Application Forms'  => ['description' => 'For buying, selling & transferring units'],
        'Scheme Documents'   => ['description' => 'Prospectus and Factsheet'],
        'Account Management' => ['description' => 'KYC, nominee, and update forms'],
    ];    

    public string $report_title = '';
    public string $download_title = '';
    public string $report_type = '';
    public string $download_type = '';
    public ?string $report_date = null;
    public ?string $download_date = null;
    public string $remarks = '';
    public array $report_files = [];
    public array $download_files = [];
    public int $insertChunkSize = 5;
    public bool $confirmingClear = false;
    public ?string $clearTarget = null;
    public array $clearableTargets; 

    protected function extractDateFromFile($file): ?string
    {
        $path = $file->getRealPath();

        if ($path === false || ! is_file($path)) {
            return null;
        }

        $ext = strtolower($file->getClientOriginalExtension());

        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'tiff', 'heic', 'heif'], true) && function_exists('exif_read_data')) {
            $exif = @exif_read_data($path);

            foreach (['DateTimeOriginal', 'DateTimeDigitized', 'DateTime'] as $key) {
                if (! empty($exif[$key])) {
                    $date = $exif[$key];
                    $dateTime = \DateTime::createFromFormat('Y:m:d H:i:s', $date);

                    if ($dateTime !== false) {
                        return $dateTime->format('Y-m-d');
                    }
                }
            }
        }

        if ($ext === 'pdf') {
            $output = [];
            exec('pdfinfo ' . escapeshellarg($path) . ' 2>/dev/null', $output);

            foreach ($output as $line) {
                if (str_starts_with($line, 'CreationDate:') || str_starts_with($line, 'ModDate:')) {
                    $raw = trim(str_replace(['CreationDate:', 'ModDate:'], '', $line));
                    $raw = preg_replace('/^D:/', '', $raw);
                    $raw = preg_replace('/\s+/', ' ', $raw);

                    if (! empty($raw)) {
                        $date = \DateTime::createFromFormat('YmdHisO', $raw);

                        if ($date === false) {
                            $date = \DateTime::createFromFormat('YmdHis', $raw);
                        }

                        if ($date !== false) {
                            return $date->format('Y-m-d');
                        }
                    }
                }
            }
        }

        return filemtime($path) ? date('Y-m-d', filemtime($path)) : null;
    }

    protected function buildTitleFromFile($file): string
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        return trim($name) !== '' ? $name : 'Report';
    }   

    public function confirmClear(string $target): void
    {
        $this->clearTarget = $target;
    }    

    public function clearData(): void
    {
        $key = $this->clearTarget;
        $target = $this->clearableTargets[$key] ?? null;

        if ($target === null) {
            $this->clearTarget = null;
            return;
        }

        DB::table($target['table'])->truncate();

        $path = public_path('storage/' . $target['folder']);
        if (File::isDirectory($path)) {
            File::deleteDirectory($path);
            File::makeDirectory($path, 0755, true);
        }

        $this->clearTarget = null;
        session()->flash('success_' . $key, ucfirst($target['label']) . ' data cleared.');
    }   

    public function submit_reports()
    {
        $this->validate([
            'report_type' => 'required|string|max:500',
            'report_files' => 'required|array|min:1',
            'report_title' => 'nullable|string|max:1000',
            'report_date' => 'nullable|date',
            'remarks' => 'nullable|string|max:1000',                    
        ]);        

        $rows = [];

        foreach ($this->report_files as $file) {
            $title = trim($this->report_title) !== ''
                ? $this->report_title
                : $this->buildTitleFromFile($file);

            $date = $this->report_date ?: $this->extractDateFromFile($file) ?: now()->format('Y-m-d');

            $remarks = trim($this->remarks) !== ''
                ? $this->remarks
                : '';

            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '-' . random_int(1000, 9999) . '.' . $file->getClientOriginalExtension();

            $storedPath = $file->storeAs('reports', $filename, 'public');

            $rows[] = [
                'report_title' => $title,
                'report_type' => $this->report_type,
                'report_date' => $date,
                'remarks' => $remarks,
                'report_link' => $storedPath,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (collect($rows)->chunk($this->insertChunkSize) as $chunk) {
            DB::table('tbl_reports')->insert($chunk->toArray());
        }

        session()->flash('success_reports', count($this->report_files) . ' report(s) uploaded successfully.');

        $this->reset(['report_title', 'report_type', 'report_date', 'remarks', 'report_files']);
    }

    public function submit_downloads()
    {
        $this->validate([
            'download_type' => 'required|string|max:500',
            'download_files' => 'required|array|min:1',
            'download_title' => 'nullable|string|max:1000',
            'download_date' => 'nullable|date',
            'remarks' => 'nullable|string|max:1000',                    
        ]);        

        $rows = [];

        foreach ($this->download_files as $file) {
            $title = trim($this->download_title) !== ''
                ? $this->download_title
                : $this->buildTitleFromFile($file);

            $date = $this->download_date ?: $this->extractDateFromFile($file) ?: now()->format('Y-m-d');

            $remarks = trim($this->remarks) !== ''
                ? $this->remarks
                : '';

            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '-' . random_int(1000, 9999) . '.' . $file->getClientOriginalExtension();

            $storedPath = $file->storeAs('downloads', $filename, 'public');

            $rows[] = [
                'download_title' => $title,
                'download_type' => $this->download_type,
                'download_date' => $date,
                'remarks' => $remarks,
                'download_link' => $storedPath,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (collect($rows)->chunk($this->insertChunkSize) as $chunk) {
            DB::table('tbl_downloads')->insert($chunk->toArray());
        }

        session()->flash('success_downloads', count($this->download_files) . ' form,doc(s) uploaded successfully.');

        $this->reset(['download_title', 'download_type', 'download_date', 'remarks', 'download_files']);
    }
    
    public function mount(): void
    {
        foreach (['report', 'download'] as $label) {
            $this->clearableTargets[$label . 's'] = [
                'table' => 'tbl_' . $label . 's',
                'folder' => $label . 's',
                'label' => $label,
            ];
        }
    }    

    public function render()
    {
        return $this->view()->title('Web Admin');
    }
}
?>

<div>
    <section>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 my-2">
                    <div class="card shadow-sm rounded-bordered rounded-4 h-100">
                        <div class="card-body p-4 p-md-5">
                            <div class="mb-4 text-center">
                                <h2 class="fw-bold text-primary mb-1">Upload Reports</h2>
                                <p class="text-muted mb-0">Select multiple files and upload them as one report type.</p>
                            </div>

                            <form wire:submit.prevent="submit_reports">
                                <div class="mb-3">
                                    <label for="report_title" class="form-label fw-semibold">Report Title</label>
                                    <input
                                        id="report_title"
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="report_title"
                                        placeholder="Optional - defaults to each file name"
                                    >
                                    @error('report_title')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="report_type" class="form-label fw-semibold">Report Type</label>
                                    <select id="report_type" class="form-select form-select-lg rounded-3" wire:model="report_type">
                                        <option value="">Select report type</option>
                                        <option value="Annual Reports">Annual Reports</option>
                                        <option value="Quarterly Disclosures">Quarterly Disclosures</option>
                                        <option value="Portfolio Statements">Portfolio Statements</option>
                                        <option value="NAV Declarations">NAV Declarations</option>
                                        <option value="Price Sensitive Info">Price Sensitive Info</option>
                                    </select>
                                    <small class="text-muted">Select a report type</small>
                                    @error('report_type')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="report_date" class="form-label fw-semibold">Report Date</label>
                                    <input
                                        id="report_date"
                                        type="date"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="report_date"
                                    >
                                    <small class="text-muted">Leave blank to use metadata from the file, or fallback to today.</small>
                                    @error('report_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="remarks" class="form-label fw-semibold">Remarks</label>
                                    <input
                                        id="remarks"
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="remarks"
                                        placeholder="Optional remarks"
                                    >
                                    @error('remarks')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="report_files" class="form-label fw-semibold">Upload</label>
                                    <input
                                        id="report_files"
                                        type="file"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="report_files"
                                        wire:loading.attr="disabled"
                                        wire:target="report_files"
                                        multiple
                                    >
                                    <div wire:loading wire:target="report_files" class="text-muted small mt-1"> Preparing selected file(s)... </div>
                                    <small class="text-muted">You can select as many files as you want as they uploaded in chunks of {{ $insertChunkSize }}.</small>
                                    @error('report_files')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled" wire:target="report_files,submit" > <span wire:loading.remove wire:target="report_files,submit"> Upload Selected Files </span> <span wire:loading wire:target="report_files,submit"> Preparing Upload... </span> </button>
                                    <button type="button" class="btn btn-danger btn-lg" wire:click="confirmClear('reports')">Clear Data</button>
                                </div>
                            </form>
                            @if (session()->has('success_reports'))
                                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                                    {{ session('success_reports') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 my-2">
                    <div class="card shadow-sm rounded-bordered rounded-4 h-100">
                        <div class="card-body p-4 p-md-5">
                            <div class="mb-4 text-center">
                                <h2 class="fw-bold text-primary mb-1">Upload Forms, Docs</h2>
                                <p class="text-muted mb-0">Select multiple files and upload them as one report type.</p>
                            </div>

                            <form wire:submit.prevent="submit_downloads">
                                <div class="mb-3">
                                    <label for="download_title" class="form-label fw-semibold">Download Title</label>
                                    <input
                                        id="download_title"
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="download_title"
                                        placeholder="Optional - defaults to each file name"
                                    >
                                    @error('download_title')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="download_type" class="form-label fw-semibold">download Type</label>
                                    <select id="download_type" class="form-select form-select-lg rounded-3" wire:model.live="download_type">
                                        <option value="">Select download type</option>
                                        @foreach ($download_types as $type => $meta)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">{{ $download_types[$download_type]['description'] ?? 'Select a type to see its description' }}</small>
                                    @error('download_type')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="download_date" class="form-label fw-semibold">download Date</label>
                                    <input
                                        id="download_date"
                                        type="date"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="download_date"
                                    >
                                    <small class="text-muted">Leave blank to use metadata from the file, or fallback to today.</small>
                                    @error('download_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="remarks" class="form-label fw-semibold">Remarks</label>
                                    <input
                                        id="remarks"
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="remarks"
                                        placeholder="Optional remarks"
                                    >
                                    @error('remarks')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="download_files" class="form-label fw-semibold">Upload</label>
                                    <input
                                        id="download_files"
                                        type="file"
                                        class="form-control form-control-lg rounded-3"
                                        wire:model="download_files"
                                        wire:loading.attr="disabled"
                                        wire:target="download_files"
                                        multiple
                                    >
                                    <div wire:loading wire:target="download_files" class="text-muted small mt-1"> Preparing selected file(s)... </div>
                                    <small class="text-muted">You can select as many files as you want as they uploaded in chunks of {{ $insertChunkSize }}.</small>
                                    @error('download_files')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled" wire:target="download_files,submit" > <span wire:loading.remove wire:target="download_files,submit"> Upload Selected Files </span> <span wire:loading wire:target="download_files,submit"> Preparing Upload... </span> </button>
                                    <button type="button" class="btn btn-danger btn-lg" wire:click="confirmClear('downloads')">Clear Data</button>
    
                                </div>
                            </form>
                            @if (session()->has('success_downloads'))
                                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                                    {{ session('success_downloads') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif                            
                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="card shadow-sm rounded-bordered rounded-4 h-100">
                        <div class="card-body p-4 p-md-5">
                            <div class="mb-4 text-center">
                                <h2 class="fw-bold text-primary mb-1">News</h2>
                                <p class="text-muted mb-0">Add or Edit News section</p>
                            </div>
                            <livewire:datatable 
                                title="News" 
                                table="tbl_news" 
                                :columns="[
                                    ['field' => 'news_id', 'label' => 'news_id', 'sortable' => true],
                                    ['field' => 'post_date', 'label' => 'Post Date', 'sortable' => true],
                                    ['field' => 'title', 'label' => 'Title', 'sortable' => true],
                                    ['field' => 'main_body', 'label' => 'Description', 'sortable' => true],
                                    ['field' => 'image_link', 'label' => 'Image', 'sortable' => true],                                                  
                                    
                                ]"
                                :filters="[
                                    [
                                        'field' => 'post_date', 
                                        'label' => 'Post Date', 
                                        'options' => ['Open-end Growth Mutual Fund' => 'Open-end Growth Mutual Fund', 'Close End' => 'Closed End']
                                    ]
                                ]"
                            />                                                        
                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="card shadow-sm rounded-bordered rounded-4 h-100">
                        <div class="card-body p-4 p-md-5">
                            <div class="mb-4 text-center">
                                <h2 class="fw-bold text-primary mb-1">Modal</h2>
                                <p class="text-muted mb-0">Edit Modal Body</p>
                            </div>                        
                            <livewire:datatable 
                                title="Modal"
                                table="tbl_modal"
                                :show-actions="true"
                                primary-key="target_id"
                                :rich-fields="['modal_body']"
                                :columns="[
                                    ['field' => 'target_id', 'label' => 'target_id', 'sortable' => true],
                                    ['field' => 'target_name', 'label' => 'target_name', 'sortable' => true],
                                    ['field' => 'modal_body', 'label' => 'modal_body', 'sortable' => true],                                                
                                    
                                ]"
                                :filters="[
                                    [
                                        'field' => 'post_date', 
                                        'label' => 'Post Date', 
                                        'options' => ['Open-end Growth Mutual Fund' => 'Open-end Growth Mutual Fund', 'Close End' => 'Closed End']
                                    ]
                                ]"
                            />                                                        
                        </div>
                    </div>
                </div>                                                      
            </div>
        </div>
        @if ($clearTarget)
            <div class="modal d-block" tabindex="-1" style="background:rgba(0,0,0,.5)">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            This will permanently delete all {{ $clearableTargets[$clearTarget]['label'] }} records and files. This cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" wire:click="$set('clearTarget', null)">Cancel</button>
                            <button class="btn btn-danger" wire:click="clearData">Yes, delete everything</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif        
    </section>
    <livewire:record-editor />
</div>