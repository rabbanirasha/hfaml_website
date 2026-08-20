<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $title = 'Data View';
    public string $table = '';
    public array $columns = [];
    public array $filters = [];

    public string $search = '';
    public array $activeFilters = [];
    public int $perPage = 10;

    public string $sortField = 'id';
    public string $sortDirection = 'asc';

    public string $primaryKey = 'id';
    public bool $showActions = false;
    public bool $showAddButton = false;    
    public array $richFields = [];
    
    public function edit($id): void
    {
        $this->dispatch('edit-record',
            table: $this->table,
            primaryKey: $this->primaryKey,
            id: $id,
            richFields: $this->richFields,
        );
    }

#[On('record-updated')]
public function onRecordUpdated(string $table): void
{
    // no-op is fine: Livewire re-renders this component on any listened event,
    // which re-runs render()'s DB::table() query and refreshes the row
}    

    public function mount(): void
    {
        if (!empty($this->columns)) {
            $this->sortField = $this->columns[0]['field'] ?? 'id';
        }
    }

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->resetPage();
    }

    public function gotoPage(int $page): void
    {
        $this->setPage($page);
    }

    public function render()
    {
        $query = DB::table($this->table);

        if (!empty($this->search)) {
            $query->where(function ($q) {
                foreach ($this->columns as $index => $column) {
                    if ($index === 0) {
                        $q->where($column['field'], 'like', '%' . $this->search . '%');
                    } else {
                        $q->orWhere($column['field'], 'like', '%' . $this->search . '%');
                    }
                }
            });
        }

        foreach ($this->activeFilters as $field => $value) {
            if ($value !== '') {
                $query->where($field, $value);
            }
        }

        $query->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.datatable', [
            'records' => $query->paginate($this->perPage),
        ]);
    }
}
