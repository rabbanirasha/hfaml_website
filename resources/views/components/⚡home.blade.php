<?php

use Livewire\Attributes\Title;
Use Livewire\Component;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    public $fund_performance, $news;
    public function mount(){
        $this->fund_performance = DB::table('tbl_fundperformance')->get();
        $this->news = DB::table('tbl_news')->take(3)->get();


    }
    public function render(){
        return $this->view()->title("Home");

    }
}
?>

<div>
    <section class="py-3">
        <div class="container text-center py-3"><!-- Start: Hero Carousel -->
            <div class="carousel slide carousel-dark shadow img-fluid" data-bs-ride="carousel" id="carousel-1">
                <div class="carousel-inner img-fluid" style="height: 100%;">
                    <div class="carousel-item active img-fluid"><img class="w-100 d-block img-fluid carousel-image" src="{{asset('img/HFSUF.png')}}" alt="Slide Image" style="z-index: -1;"></div>
                    <div class="carousel-item h-100 img-fluid"><img class="w-100 d-block img-fluid carousel-image" src="{{asset('img/HFUF.png')}}" alt="Slide Image" style="z-index: -1;"></div>
                    <div class="carousel-item h-100 img-fluid"><img class="w-100 d-block img-fluid carousel-image" src="{{asset('img/HFACMEUF.png')}}" alt="Slide Image" style="z-index: -1;"></div>
                </div>
                <div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-1" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></button><!-- End: Previous -->
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-1" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></button><!-- End: Next -->
                </div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> 
                    <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button>
                </div>
            </div><!-- End: Hero Carousel -->
        </div>
    </section>
    <header><!-- Start: Hero Clean Reverse -->
        <div class="container p-4">
            <div class="row p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
                <div class="col-12 d-flex justify-content-center align-items-center mb-4 mt-2">
                    <div class="text-center">
                        <h1 class="fw-bold mb-0 text-primary">Fund Performance</h1><a class="badge text-bg-primary btn" href="{{ route('funds') }}" wire:navigate.hover>Historical Trend</a>
                    </div>
                </div>
                <div class="col text-center text-md-start">
                    <div class="text-center">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Effective Date</th>
                                        <th>Fund Name</th>
                                        <th>NAV at Cost /Unit*</th>
                                        <th>NAV at Market (Selling Price) /Unit</th>
                                        <th>Repurchase or Surrender Price /Unit</th>
                                    </tr>
                                </thead>
                                <tbody style="border-top: 2px solid var(--bs-primary) ;">
                                @foreach($fund_performance as $row)
                                    <tr>
                                        <td>{{$row->effective_date}}</td>
                                        <td>{{$row->fund_name}}</td>
                                        <td>{{$row->nav_cp_pu}}</td>
                                        <td>{{$row->nav_mp_pu}}</td>
                                        <td>{{$row->nav_rp_pu}}</td>
                                    </tr>
                                @endforeach                                  
                                </tbody>
                                <tfoot class="small">
                                    <tr>
                                    <td colspan="5">Valid until the announcement of the next NAV. The repurchase/surrender price is calculated after deducting 2% exit load from the NAV.</td>
                                    </tr>
                                </tfoot>                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End: Hero Clean Reverse -->
    </header>
    <section class="py-2"><!-- Start: Features Cards -->
        <div class="container py-2">
            <div>
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                        <div class="card bg-primary-subtle h-100">
                            <div class="card-body text-center p-3 d-flex flex-column">
                                <img class="mx-auto my-4 w-25" src="{{asset('img/money.svg')}}">
                                <h5 class="fw-bold mb-3 card-title text-primary" style="border-bottom: 1px solid #dddddd;">HFAML Unit Fund</h5>
                                <p class="fw-bold mb-2 card-text text-dark" style="text-align: justify;"><span style="font-weight: normal !important;">Sponsored by us, it helps stabilize the Capital Market, provide liquidity in the market and declare attractive dividend to the unit holders by investing the proceeds in the capital and money market of Bangladesh.</span><br><br><br></p><a class="btn btn-primary btn-sm mt-auto" href ="{{route('view_fund', ['fund_code' => 'hfuf'])}}" wire:navigate.hover type="button">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-primary-subtle h-100">
                            <div class="card-body text-center p-3 d-flex flex-column">
                                <img class="mx-auto my-4 w-25" src="{{asset('img/employees.svg')}}">
                                <h5 class="fw-bold mb-3 card-title text-primary" style="border-bottom: 1px solid #dddddd;">HFAML-ACME Employees' Unit Fund</h5>
                                <p class="fw-bold mb-2 card-text text-dark" style="text-align: justify;"><span style="font-weight: normal !important;">Sponsored by the ACME Laboratories, it provides attractive dividends, helps stabilize the Capital Market and provide liquidity in the market by investing the proceeds in the capital and the money market of Bangladesh, for a wider range of investors.&nbsp;</span><br><br></p><a class="btn btn-primary btn-sm mt-auto" href ="{{route('view_fund', ['fund_code' => 'hfacmeuf'])}}" wire:navigate.hover type="button">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-primary-subtle h-100">
                            <div class="card-body text-center p-3 d-flex flex-column">
                                <img class="mx-auto my-4 w-25" src="{{asset('img/kaaba.svg')}}">
                                <h5 class="fw-bold mb-3 card-title text-primary" style="border-bottom: 1px solid #dddddd;">HFAML Shariah Unit Fund</h5>
                                <p class="fw-bold mb-2 card-text text-dark" style="text-align: justify;"><span style="font-weight: normal !important;">Sponsored by us, it provides maximum return of investment in the form of capital appreciation and dividend payment by&nbsp;adjusting risks of investments in the shariah compliant instruments of the capital and the money market of Bangladesh, especially for investors who abides by the Islamic Shariah.</span></p><a class="btn btn-primary btn-sm mt-auto" href ="{{route('view_fund', ['fund_code' => 'hfsuf'])}}" wire:navigate.hover type="button">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End: Features Cards -->
    </section>
    <header><!-- Start: Hero Clean Reverse -->
        <div class="container p-4">
            <div class="row p-2 rounded-bordered" style="background-color: var(--bs-body-bg);"><!-- Start: News Title -->
                <div class="col-12">
                    <div class="text-center pb-3">
                        <h1 class="fw-bold mb-0 text-primary">News</h1><a class="badge text-bg-primary btn" href ="{{route('news')}}" wire:navigate.hover>Go to News</a>
                    </div>
                </div><!-- End: News Title -->
                @foreach($news as $row)
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="fs-4 fw-bolder text-start mb-2">{{$row->title}}</p>
                        <p class="mb-3"><span style="font-weight: normal !important;">{{$row->main_body}}</span></p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{asset('img/products/3.jpg')}}">
                            <div>
                                <p class="text-muted mb-0">{{$row->post_date}}</p>                                
                                <a class="fw-bold text-primary mb-0" href ="{{route('view_news', ['news_id' => $row->news_id])}}" wire:navigate.hover>Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach  
            </div>
        </div><!-- End: Hero Clean Reverse -->
    </header>
    <section class="py-4"><!-- Start: Hero Clean Reverse -->
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mb-4">
                    <div class="py-3 mx-auto pulse animated infinite" style="max-width: 450px;">
                        <img class="mx-auto my-4 w-25" src="{{asset('img/question.svg')}}">
                        <h4 class="fw-bold" style="color: #2c4fc3;">Not Sure Where to Invest?</h4>
                        <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                        <p class="my-3">Invest in our Mutual Funds today with as low as BDT 1000 &amp; receive <strong>attractive </strong>dividends. In our hands, your precious investments continue to grow <strong>fast &amp; safe</strong>.<br><a class="badge text-bg-primary btn" href="{{ route('services') }}" wire:navigate.hover>Learn More</a></p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    {{-- <div class="p-5 mx-lg-5 pulse animated infinite" style="background: url({{asset('img/blob.svg')}}) center / contain no-repeat;"><img class="img-fluid rounded w-100" style="min-height: 300px;" src="{{asset('img/investment.png')}}"></div> --}}
                    <div class="py-3 mx-auto pulse animated infinite" style="max-width: 450px;">
                        <img class="mx-auto my-4 w-25" src="{{asset('img/speedometer.svg')}}">
                        <h4 class="fw-bold" style="color: #2c4fc3;">Corporate Advisory</h4>
                        <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                        <p class="my-3">We offer <strong>advice </strong>on strategy, structure, value &amp; capital<strong>&nbsp;</strong>to revive and boost performance of corporations.<br><a class="badge text-bg-primary btn" href="{{ route('services') }}" wire:navigate.hover>Learn More</a></p>
                    </div>                    
                </div>
            </div>
        </div><!-- End: Hero Clean Reverse -->
    </section>
    <section><!-- Start: Features Cards -->
        <div class="container py-5 bg-primary-gradient">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1 class="fw-bold text-primary">Why Us?</h1>
                </div>
            </div>
            <div class="py-3">
                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-5 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><i class="bi bi-cash-coin"></i></div>
                                <h5 class="fw-bold card-title">Transparent Investment Philosophy</h5>
                                <p class="text-muted card-text" style="text-align: justify;">With over 50 years plus total market expertise by our management team, and a consistent investment philosophy and a team of professionals makes us unique in the business.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-5 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><i class="bi bi-lightbulb-fill"></i></div>
                                <h5 class="fw-bold card-title">Long-term Valuations and risk adjusted Performance</h5>
                                <p class="text-muted card-text" style="text-align: justify;">We provide our clients with our best ideas and investment expertise as we collaborate with them to help them grow and protect their investment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-5 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><i class="bi bi-graph-up-arrow"></i></div>
                                <h5 class="fw-bold card-title">In-depth research and analysis for Investment</h5>
                                <p class="text-muted card-text" style="text-align: justify;">We continuously help our clients through tailor an investment strategy to meet their objectives by bring market experts, unique ideas and unique investment strategies.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-5 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><i class="bi bi-list-ol"></i></div>
                                <h5 class="fw-bold card-title">Prioritised Client Requirement</h5>
                                <p class="text-muted card-text" style="text-align: justify;">We embrace the concept of active stewardship. The aim of our work is to preserve and grow the real purchasing power of the assets entrusted to us by our clients over the long term.<br><br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End: Features Cards -->
    </section>
    <section class="py-2">
        <h1 class="fw-bold text-center text-primary">Our Partners</h1>
        <div class="container text-center py-2">
            <div class="row justify-content-center mx-auto">
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                        <img class="rounded-circle mx-auto fit-cover logo-image" src="{{asset('img/brands/runner.jpg')}}">
                        <p><strong class="text-center">RUNNER GROUP</strong></p>
                        <a class="badge text-bg-primary btn mt-auto" href="#">Sponsor</a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                        <img class="rounded-circle mx-auto fit-cover logo-image" src="{{asset('img/brands/icb.svg')}}">
                        <p><strong class="text-center">INVESTMENT CORPORATION OF BANGLADESH</strong></p>
                        <a class="badge text-bg-primary btn mt-auto" href="#">Trustee</a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                        <img class="rounded-circle mx-auto fit-cover logo-image" src="{{asset('img/brands/brac.jpg')}}">
                        <p><strong class="text-center">BRAC BANK PLC</strong></p>
                        <a class="badge text-bg-primary btn mt-auto" href="#">Custodian</a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                        <img class="rounded-circle mx-auto fit-cover logo-image" src="{{asset('img/brands/acme.jpg')}}">
                        <p><strong class="text-center">THE ACME LABORATORIES LTD.</strong></p>
                        <a class="badge text-bg-primary btn mt-auto" href="#">Sponsor</a>
                    </div>
                </div>                                                                        
            </div>
        </div>
    </section>
</div>