<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $title = 'Data View';
    public string $table = '';
    public array $columns = [];
    public array $filters = [];

    #[Url]
    public string $search = '' {
        set {
            $this->search = $value ?? '';
            $this->resetPage();
        }
    }

    #[Url]
    public array $activeFilters = [] {
        set {
            $this->activeFilters = $value ?? [];
            $this->resetPage();
        }
    }

    #[Url]
    public int $perPage = 10 {
        set {
            $this->perPage = $value ?? 10;
            $this->resetPage();
        }
    }

    #[Url] public string $sortField = 'id';
    #[Url] public string $sortDirection = 'asc';

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
        $this->setPage($page);   // this is the Livewire paginator API
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