<?php

use Livewire\Attributes\Title;
Use Livewire\Component;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    public $news_article;
    public function mount($news_id){
        $this->news_article = DB::table('tbl_news')->where('news_id', $news_id)->first();
        
        if (!$this->news_article) {
            abort(404);
        }

    }
    public function render(){
        return $this->view()->title($this->news_article->title);

    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <div class="row my-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">{{$news_article->title}}</h2>
                    <p class="text-muted mb-0">{{$news_article->post_date}}</p>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;">                      
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item fs-5 text-blue"><i class="bi bi-facebook"></i></li>
                        <li class="list-inline-item fs-5"><i class="bi bi-twitter-x"></i></li>
                        <li class="list-inline-item fs-5 text-success"><i class="bi bi-whatsapp"></i></li>
                        <li class="list-inline-item fs-5"><i class="bi bi-linkedin"></i></li>                    
                    </ul>
                                 
                    <img class="img-fluid rounded shadow w-100 fit-cover my-5" src="{{asset('img/products/1.jpg')}}" style="height: 300px;">
                    <p class="text-muted">{{$news_article->main_body}}</p>
                    <a class="fw-bold btn btn-outline-light text-primary mb-0 border-0" href ="{{route('news')}}" wire:navigate.hover>Go Back to News</a>
                </div>
            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>