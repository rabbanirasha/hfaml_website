<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;

class Datatable extends Component
{
    use WithPagination;

    public string $title = 'Data View';
    public string $table = ''; 
    public array $columns = [];
    public array $filters = [];

    // NATIVE PHP 8.4 PROPERTY HOOKS: Attach set blocks directly to properties
    #[Url] 
    public string $search = '' {
        set {
            // Intercept the input value ($value), convert null to '', and assign it safely
            $this->search = $value ?? '';
            $this->resetPage();
        }
    }

    #[Url] 
    public array $activeFilters = [] {
        set {
            // Intercept the input value, convert null to an empty array, and assign it safely
            $this->activeFilters = $value ?? [];
            $this->resetPage();
        }
    }

    #[Url] 
    public int $perPage = 10 {
        set {
            // Intercept the input value, convert null to an empty array, and assign it safely
            $this->perPage = $value ?? [];
            $this->resetPage();
        }
    }

    #[Url] public string $sortField = 'id';
    #[Url] public string $sortDirection = 'asc';

    // REMOVED completely: $searchHook, $perPageHook, and $activeFiltersHook tracking properties

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
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
            'records' => $query->paginate($this->perPage)
        ]);
    }
}
