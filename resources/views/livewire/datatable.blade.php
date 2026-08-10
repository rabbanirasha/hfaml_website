<div class="card shadow-sm">
    <!-- Header Block featuring Title & Search Layout -->
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0 text-dark font-weight-bold">{{ $title }}</h5>
            
            <!-- Row Count Limit Menu -->
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

        <div class="row g-2">
            <!-- Universal Global Text Search -->
            <div class="col-md-4">
                <input 
                    wire:model.live.debounce.250ms="search" 
                    type="text" 
                    class="form-control" 
                    placeholder="Search standard columns..."
                />
            </div>

            <!-- Loop to dynamically inject any custom filter select arrays -->
            @foreach($filters as $filter)
                <div class="col-md-3">
                    <select wire:model.live="activeFilters.{{ $filter['field'] }}" class="form-select">
                        <option value="">{{ $filter['label'] }}</option>
                        @foreach($filter['options'] as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Data Presentation Layout Engine -->
    <div class="table-responsive position-relative">
        <div wire:loading.flex class="d-none position-absolute top-0 start-0 w-100 h-100 bg-white opacity-50 justify-content-center align-items-center" style="z-index: 10; pointer-events: none;" >
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-nowrap">
                <tr>
                    @foreach($columns as $column)
                        @if($column['sortable'] ?? false)
                            <th wire:click="sortBy('{{ $column['field'] }}')" style="cursor: pointer;" class="user-select-none">
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
                                <td>
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
    <div class="card-footer bg-white py-3">
        <div class="row align-items-center">
            <div class="col-sm-6 text-center text-sm-start text-muted small mb-3 mb-sm-0">
                Showing {{ $records->firstItem() ?? 0 }} to {{ $records->lastItem() ?? 0 }} of {{ $records->total() }} rows
            </div>
            <div class="col-sm-6 d-flex justify-content-center justify-content-sm-end">
                {{ $records->links() }}
            </div>
        </div>
    </div>
</div>
