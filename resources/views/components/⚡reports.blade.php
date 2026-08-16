<?php

use Livewire\Attributes\Title;
Use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $news;
    public function mount(){
        $this->news = DB::table('tbl_news')->get();
        
        // if ($this->news->isEmpty()) {
        //     abort(404);
        // }

    }
    public function render(){
        return $this->view()->title("Reports");

    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Reports</h1>
            <hr style="border-style: inset;">
            <div class="row mb-4">
                <div class="col-12">
                    <ul class="nav nav-underline justify-content-center">
                    <li class="nav-item" role="presentation"> <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-selected="true">All</button> </li>
                    <li class="nav-item" role="presentation"> <button class="nav-link" id="annual-tab" data-bs-toggle="pill" data-bs-target="#annual" type="button" role="tab" aria-selected="false">Annual Reports</button> </li>
                    <li class="nav-item" role="presentation"> <button class="nav-link" id="quarterly-tab" data-bs-toggle="pill" data-bs-target="#quarterly" type="button" role="tab" aria-selected="false">Quarterly Disclosures</button> </li>
                    <li class="nav-item" role="presentation"> <button class="nav-link" id="portfolio-tab" data-bs-toggle="pill" data-bs-target="#portfolio" type="button" role="tab" aria-selected="false">Portfolio Statements</button> </li>
                    <li class="nav-item" role="presentation"> <button class="nav-link" id="nav-tab" data-bs-toggle="pill" data-bs-target="#nav" type="button" role="tab" aria-selected="false">NAV Declarations</button> </li>
                    <li class="nav-item" role="presentation"> <button class="nav-link" id="nav-tab" data-bs-toggle="pill" data-bs-target="#nav" type="button" role="tab" aria-selected="false">Price Sensitive Info</button> </li>                    
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="px-4" scope="col">Report Title</th>
                                    <th class="px-4" scope="col">Type</th>
                                    <th class="px-4" scope="col">Date</th>
                                    <th class="px-4" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $row)
                                <tr>
                                    <td class="px-4 fw-medium">{{$row->title}}</td>
                                    <td><span class="badge bg-primary">{{$row->news_id}}</span></td>
                                    <td>{{$row->post_date}}</td>
                                    <td class="text-end px-4">
                                        <a href="#" class="btn btn-primary btn-sm">Download</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>        
                    </div>
                </div>
            </div>
            
            <div class="alert alert-secondary mt-5 small" role="alert">
                <i class="bi bi-info-circle-fill"></i><strong> Regulatory Compliance Notice:</strong> All disclosures and reports are published in accordance with the guidelines set forth by the Bangladesh Securities and Exchange Commission (BSEC). For older archives, please contact our support team.
            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>