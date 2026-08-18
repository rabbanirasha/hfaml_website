<div>
    <!-- Header Block featuring Title & Search Layout -->
    <div class="card-header py-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            {{-- <h5 class="mb-0 text-dark font-weight-bold">{{ $title }}</h5> --}}
            

        </div>

        <div class="row g-2">
            <!-- Universal Global Text Search -->
            <div class="col-md-4">
                <input wire:model.live.debounce.250ms="search" type="text" class="form-control rounded-4" placeholder="🔍 Search..." />
            </div>

            <!-- Loop to dynamically inject any custom filter select arrays -->
            <div class="col-md-8 d-flex flex-row justify-content-end">
            @foreach($filters as $filter)
                <div class="p-1">
                    <select wire:model.live="activeFilters.{{ $filter['field'] }}" class="form-select form-select-sm">
                        <option value="">🧹{{ $filter['label'] }}</option>
                        @foreach($filter['options'] as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <!-- Data Presentation Layout Engine -->
    <div class="table-responsive position-relative">
        <div wire:loading.flex class="d-none position-absolute top-0 start-0 w-100 h-100 justify-content-center align-items-center" style="z-index: 10; pointer-events: none;" >
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <table class="table table-hover align-middle mb-0">
            <thead class="text-nowrap">
                <tr>
                    @foreach($columns as $column)
                        @if($column['sortable'] ?? false)
                            <th wire:click="sortBy('{{ $column['field'] }}')" style="cursor: pointer;" class="user-select-none text-start">
                                {{ $column['label'] }}
                                @if($sortField === $column['field'])
                                    <span class="small ms-1">{!! $sortDirection === 'asc' ? '▲' : '▼' !!}</span>
                                @endif
                            </th>
                        @else
                            <th>{{ $column['label'] }}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
                <tbody>
                    @forelse($records as $record)
                        <tr>
                            @foreach($columns as $column)
                                <td class="text-start">
                                    @if(($column['type'] ?? '') === 'currency')
                                        <!-- Cast string to float explicitly to fix the parameter type error -->
                                        ${{ number_format((float) $record->{$column['field']}, 2) }}
                                    @else
                                        {{ $record->{$column['field']} }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) }}" class="text-center py-4 text-muted">
                                No records matching query definitions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
        </table>
    </div>

    <!-- Universal Pagination Footers -->
    <div class="card-footer py-3">
        <div class="row align-items-start">
            <div class="col-6 col-sm-4 text-center text-sm-start text-muted small mb-3 mb-sm-0">
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
            <div class="col-6 col-sm-2 text-start d-none d-lg-flex text-muted text-nowrap small mt-2">
                Showing {{ $records->firstItem() ?? 0 }} to {{ $records->lastItem() ?? 0 }} of {{ $records->total() }} rows
            </div>         
            <div class="col-12 col-sm-6 d-flex justify-content-end align-content-center ms-auto">
                @php
                    $currentPage = $records->currentPage();
                    $lastPage = $records->lastPage();
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
                        @if ($records->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Prev</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button class="page-link" type="button" wire:click="gotoPage({{ $records->currentPage() - 1 }})">
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
                                <li class="page-item {{ $page == $records->currentPage() ? 'active' : '' }}">
                                    <button class="page-link" type="button" wire:click="gotoPage({{ $page }})">
                                        {{ $page }}
                                    </button>
                                </li>
                            @endif
                        @endforeach

                        @if ($records->hasMorePages())
                            <li class="page-item">
                                <button class="page-link" type="button" wire:click="gotoPage({{ $records->currentPage() + 1 }})">
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
</div>
