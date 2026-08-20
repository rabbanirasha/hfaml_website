<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class Recordeditor extends Component
{
    public ?string $table = null;
    public ?string $primaryKey = null;
    public $recordId = null;
    public array $fields = [];
    public array $richFields = [];

    #[On('edit-record')]
    public function editRecord(string $table, string $primaryKey, $id, array $richFields = []): void
    {
        $row = DB::table($table)->where($primaryKey, $id)->first();

        if (! $row) {
            return;
        }

        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->recordId = $id;
        $this->richFields = $richFields;
        $this->fields = (array) $row;

        $this->dispatch('record-modal-open');
    }

    public function save(): void
    {
        if (! $this->table || $this->recordId === null) {
            return;
        }

        $data = $this->fields;
        unset($data[$this->primaryKey]);

        DB::table($this->table)->where($this->primaryKey, $this->recordId)->update($data);

        $this->dispatch('record-updated', table: $this->table);
        $this->dispatch('record-modal-close');
    }

    public function render()
    {
        return view('livewire.recordeditor');
    }
}