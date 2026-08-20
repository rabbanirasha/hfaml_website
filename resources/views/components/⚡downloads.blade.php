<?php

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

new class extends Component
{
    public array $colors = [
        'Application Forms'  => ['description' => 'For buying, selling & transferring units', 'section_color' => 'bg-primary bg-opacity-10', 'btn_color' => 'btn-primary'],
        'Scheme Documents'   => ['description' => 'Prospectus and Factsheet', 'section_color' => 'bg-success bg-opacity-10', 'btn_color' => 'btn-success'],
        'Account Management' => ['description' => 'KYC, nominee, and update forms', 'section_color' => 'bg-danger bg-opacity-10', 'btn_color' => 'btn-danger'],
    ];

    public function render()
    {
        $downloads = DB::table('tbl_downloads')
            ->orderBy('download_date', 'desc')
            ->get()
            ->groupBy('download_type');

        return $this->view(['downloads' => $downloads])->title('Downloads');
    }
}
?>

<div>
    <section>
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Downloads</h1>
            <hr style="border-style: inset;">

            <div class="row g-4 px-2">
                @foreach ($colors as $type => $meta)
                    <div class="col-lg-4">
                        <div class="card h-100 border-0">
                            <div class="card-header {{ $meta['section_color'] }} py-3">
                                <h5 class="fw-bold mb-0">{{ $type }}</h5>
                                <small class="opacity-75">{{ $meta['description'] }}</small>
                            </div>
                            <ul class="list-group list-group-flush">
                                @forelse (($downloads[$type] ?? []) as $row)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-0 ms-2">
                                        <div>
                                            <div class="fw-semibold text-break">{{ $row->download_title }}</div>
                                            <div class="text-muted small">{{ $row->remarks }}</div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end gap-1">
                                            <a href="{{ Storage::disk('public')->url($row->download_link) }}" class="btn {{ $meta['btn_color'] }} btn-sm ms-2" target="_blank">Download</a>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted py-3">No files available yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Investor Portal Callout -->
            <div class="card border-primary mt-5">
                <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 p-4">
                    <div>
                        <h5 class="fw-bold text-primary mb-1">Already an Investor?</h5>
                        <p class="mb-0 text-muted">Login to the Investor Portal to ⬇️ download your personal account statement, investment and dividend certificates, 👁️ view your holdings and growth, and 📈 track NAV movements in real time.</p>
                    </div>
                    <a href="/login" class="btn btn-light px-4 py-2 text-nowrap text-primary shadow-sm">Login to Portal</a>
                </div>
            </div>
        </div>
    </section>
</div>