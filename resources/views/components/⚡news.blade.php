<?php

use Livewire\Attributes\Title;
Use Livewire\Component;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    public $news;
    public function mount(){
        $this->news = DB::table('tbl_news')->get();
        
        if ($this->news->isEmpty()) {
            abort(404);
        }

    }
    public function render(){
        return $this->view()->title("News");

    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">News</h1>
            <hr style="border-style: inset;">
            <div class="row p-5">
            @foreach($news as $row)
                <div class="col-12 col-md-4 mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="fs-4 fw-bolder text-start mb-2">{{$row->title}}</p>
                        <p class="mb-3"><span style="font-weight: normal !important;">{{$row->main_body}}</span></p>
                        <a class="fw-bold text-primary mb-0" href ="{{route('view_news', ['news_id' => $row->news_id])}}" wire:navigate.hover>Read More</a>
                    </div>
                </div>
            @endforeach                                
            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>