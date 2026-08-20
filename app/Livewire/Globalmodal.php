<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\tbl_modal as ModalRecord;

class Globalmodal extends Component
{
    public ?string $modal_body = null;

    #[On('show-modal')]
    public function show(string $target_name): void
    {
        // single indexed lookup, same as WHERE target_name = ?
        $this->modal_body = ModalRecord::where('target_name', $target_name)->value('modal_body');
    }

    public function render()
    {
        return view('livewire.globalmodal');
    }
}