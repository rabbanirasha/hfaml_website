<?php

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

new class extends Component
{

    public array $download_types = [
        'Application Forms'  => ['description' => 'For buying, selling & transferring units'],
        'Scheme Documents'   => ['description' => 'Prospectus and Factsheet'],
        'Account Management' => ['description' => 'KYC, nominee, and update forms'],
    ];

    public array $report_types = [
        'Annual Reports'         => ['description' => 'Yearly audited financial statements'],
        'Quarterly Disclosures'  => ['description' => 'Quarterly financial disclosures'],
        'Portfolio Statements'   => ['description' => 'Fund portfolio holdings'],
        'NAV Declarations'       => ['description' => 'Daily/periodic NAV values'],
        'Price Sensitive Info'   => ['description' => 'Material price-sensitive disclosures'],
    ];  

    public string $report_type = '';
    public string $download_type = '';
    public ?string $report_date = null;
    public ?string $download_date = null;
    public string $remarks = '';
    public bool $confirmingClear = false;
    public ?string $clearTarget = null;
    public array $clearableTargets; 

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

                            <form method="POST" action="{{ route('web-admin.reports.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="report_type" class="form-label fw-semibold">Report Type</label>
                                    <select id="report_type" name="report_type" class="form-select form-select-lg rounded-3" wire:model.live="report_type" required>
                                        <option value="">Select Report Type</option>
                                    @foreach ($report_types as $type => $meta)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                    </select>
                                    <small class="text-muted">{{ $report_types[$report_type]['description'] ?? 'Select a type to see its description' }}</small>
                                    @error('report_type') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="report_date" class="form-label fw-semibold">Report Date</label>
                                    <input id="report_date" type="date" name="report_date" class="form-control form-control-lg rounded-3">
                                    <small class="text-muted">Leave blank to use today's date.</small>
                                    @error('report_date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="report_remarks" class="form-label fw-semibold">Remarks</label>
                                    <input id="report_remarks" type="text" name="remarks" class="form-control form-control-lg rounded-3" placeholder="Optional remarks">
                                    @error('remarks') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="report_files" class="form-label fw-semibold">Upload</label>
                                    <input id="report_files" type="file" name="report_files[]" class="form-control form-control-lg rounded-3" multiple required>
                                    <small class="text-muted">Files will be named Report Type_1, Report Type_2, and so on.</small>
                                    @error('report_files') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="d-flex justify-content-center gap-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Upload Selected Files</button>
                                    <button type="button" class="btn btn-danger btn-sm" wire:click="confirmClear('reports')">Clear Data</button>
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

                            <form method="POST" action="{{ route('web-admin.downloads.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="download_type" class="form-label fw-semibold">download Type</label>
                                    <select id="download_type" class="form-select form-select-lg rounded-3" name="download_type" wire:model.live="download_type">
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
                                    <input id="download_date" type="date" class="form-control form-control-lg rounded-3" name="download_date" >
                                    <small class="text-muted">Leave blank to use metadata from the file, or fallback to today.</small>
                                    @error('download_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="remarks" class="form-label fw-semibold">Remarks</label>
                                    <input id="remarks" type="text" class="form-control form-control-lg rounded-3" name="remarks" placeholder="Optional remarks" >
                                    @error('remarks')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="download_files" class="form-label fw-semibold">Upload</label>
                                    <input id="download_files" type="file" name="download_files[]" class="form-control form-control-lg rounded-3" multiple required>
                                    <small class="text-muted">Files will be named Download Type_1, Download Type_2, and so on.</small>
                                    @error('download_files') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="d-flex justify-content-center gap-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Upload Selected Files</button>
                                    <button type="button" class="btn btn-danger btn-sm" wire:click="confirmClear('downloads')">Clear Data</button>
    
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
                                :show-actions="true"
                                :show-add-button="true"
                                primary-key="news_id"
                                :rich-fields="['main_body']"                                
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
    <livewire:recordeditor />
</div>