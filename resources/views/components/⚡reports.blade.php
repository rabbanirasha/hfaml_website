<?php

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $tab = 'all';

    public array $tabs = [
        'all' => [
            'label' => 'All',
        ],
        'Annual Reports' => [
            'label' => 'Annual Reports',
            'color' => 'primary',
        ],
        'Quarterly Disclosures' => [
            'label' => 'Quarterly Disclosures',
            'color' => 'secondary',
        ],
        'Portfolio Statements' => [
            'label' => 'Portfolio Statements',
            'color' => 'success',
        ],
        'NAV Declarations' => [
            'label' => 'NAV Declarations',
            'color' => 'danger',
        ],
        'Price Sensitive Info' => [
            'label' => 'Price Sensitive Info',
            'color' => 'dark',
        ],
    ];

    public int $perPage = 10;
    public string $search = '';

    public function setTab(string $tab): void
    {
        $this->tab = $tab;
        $this->resetPage();
    }

    public function render()
    {
        $query = DB::table('tbl_reports') ->orderBy('report_date', 'desc');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('report_title', 'like', '%' . $this->search . '%')
                    ->orWhere('report_type', 'like', '%' . $this->search . '%')
                    ->orWhere('remarks', 'like', '%' . $this->search . '%');
            });
        }        

        if ($this->tab !== 'all') {
            $query->where('report_type', $this->tab);
        }

        $reports = $query->paginate($this->perPage);

        return $this->view([ 'reports' => $reports, 'tabs' => $this->tabs, ])->title('Reports');
    }
}
?>

<div>
    <section>
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Reports</h1>
            <hr style="border-style: inset;">

            <div class="row mb-4">
                <div class="col-12">
                    <ul class="nav nav-underline justify-content-center">
                    @foreach ($tabs as $key => $tabData)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $tab === $key ? 'active' : '' }}" type="button" wire:click="setTab('{{ $key }}')" role="tab" aria-selected="{{ $tab === $key ? 'true' : 'false' }}" >
                                {{ $tabData['label'] }}
                            </button>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="px-4" scope="col">Report Title</th>
                                    <th class="px-4" scope="col">Type</th>
                                    <th class="px-4" scope="col">Date</th>
                                    <th class="px-4 d-none d-md-table-cell" scope="col">Remarks</th>
                                    <th class="px-4" scope="col">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $row)
                                    <tr>
                                        <td class="px-4 fw-medium">{{ $row->report_title }}</td>
                                        <td><span class="badge bg-{{ $tabs[$row->report_type]['color'] ?? 'secondary' }}"> {{ $row->report_type }} </span></td>
                                        <td>{{ $row->report_date }}</td>
                                        <td class="d-none d-md-table-cell">{{ $row->remarks }}</td>
                                        <td class="text-end px-4"> <a href="#" class="btn btn-primary btn-sm">Download</a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Universal Pagination Footers -->
            <div class="card-footer p-4">
                <div class="row align-items-start">
                    <div class="col-6 col-lg-3 text-center text-sm-start text-muted small mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <label class="me-2 text-nowrap text-muted small">Show:</label>
                            <select wire:model.live="perPage" class="form-select form-select-sm w-auto">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <input wire:model.live.debounce.250ms="search" type="text" class="form-control rounded-4 mt-1" placeholder="🔍 Search..." />
                    </div>                               
                    <div class="col-6 col-lg-3 text-start text-muted small mt-2">
                        Showing {{ $reports->firstItem() ?? 0 }} to {{ $reports->lastItem() ?? 0 }} of {{ $reports->total() }} rows
                    </div>         
                    <div class="col-6 col-lg-3 d-flex justify-content-end align-content-center ms-auto">
                        @php
                            $currentPage = $reports->currentPage();
                            $lastPage = $reports->lastPage();
                            $window = 1; // show 1 pages before and after current page

                            $start = max(1, $currentPage - $window);
                            $end = min($lastPage, $currentPage + $window);

                            $pages = [];
                            if ($start > 1) {
                                $pages[] = 1;
                                if ($start > 2) {
                                    $pages[] = 'ellipsis-start';
                                }
                            }

                            for ($p = $start; $p <= $end; $p++) {
                                $pages[] = $p;
                            }

                            if ($end < $lastPage) {
                                if ($end < $lastPage - 1) {
                                    $pages[] = 'ellipsis-end';
                                }
                                $pages[] = $lastPage;
                            }
                        @endphp

                        <nav aria-label="Pagination">
                            <ul class="pagination justify-content-center flex-nowrap">
                                @if ($reports->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Prev</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <button class="page-link" type="button" wire:click="gotoPage({{ $reports->currentPage() - 1 }})">
                                            Prev
                                        </button>
                                    </li>
                                @endif

                                @foreach ($pages as $page)
                                    @if ($page === 'ellipsis-start' || $page === 'ellipsis-end')
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                    @else
                                        <li class="page-item {{ $page == $reports->currentPage() ? 'active' : '' }}">
                                            <button class="page-link" type="button" wire:click="gotoPage({{ $page }})">
                                                {{ $page }}
                                            </button>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($reports->hasMorePages())
                                    <li class="page-item">
                                        <button class="page-link" type="button" wire:click="gotoPage({{ $reports->currentPage() + 1 }})">
                                            Next
                                        </button>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="alert alert-secondary mt-5 mb-0 small" role="alert">
                <i class="bi bi-info-circle-fill"></i><strong> Regulatory Compliance Notice:</strong> All disclosures and reports are published in accordance with the guidelines set forth by the Bangladesh Securities and Exchange Commission (BSEC). For older archives, please contact our support team.
            </div>
        </div>
    </section>
</div>