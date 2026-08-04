<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
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
                    <div class="carousel-item h-100"><img class="w-100 d-block img-fluid carousel-image" src="{{asset('img/HFUF.png')}}" alt="Slide Image" style="z-index: -1;"></div>
                </div>
                <div><!-- Start: Previous --><a class="carousel-control-prev" role="button" data-bs-slide="prev" href="#carousel-1"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><!-- End: Previous --><!-- Start: Next --><a class="carousel-control-next" role="button" data-bs-slide="next" href="#carousel-1"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a><!-- End: Next --></div>
                <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button></div>
            </div><!-- End: Hero Carousel -->
        </div>
    </section>
    <header><!-- Start: Hero Clean Reverse -->
        <div class="container p-4">
            <div class="row p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="fw-bold mb-0 text-primary">Fund Performance</h1><a class="badge text-bg-primary btn" href="#">Historical Trend</a>
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
                                        <th>NAV</th>
                                        <th>Selling Price</th>
                                        <th>Repurchase/ Surrender Price</th>
                                    </tr>
                                </thead>
                                <tbody style="border-top: 2px solid var(--bs-primary) ;">
                                    <tr>
                                        <td>26 May 2024</td>
                                        <td>HFAML Unit Fund</td>
                                        <td>7.66</td>
                                        <td>7.66</td>
                                        <td>&nbsp;&nbsp;7.36</td>
                                    </tr>
                                    <tr>
                                        <td>26 May 2024</td>
                                        <td>HFAML Unit Fund</td>
                                        <td>7.66</td>
                                        <td>7.66</td>
                                        <td>&nbsp;&nbsp;7.36</td>
                                    </tr>
                                </tbody>
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
                        <div class="card bg-primary-subtle">
                            <div class="card-body text-center p-3">
                                <h5 class="fw-bold mb-3 card-title text-primary" style="border-bottom: 1px solid #dddddd;">HFAML Unit Fund</h5>
                                <p class="fw-bold mb-2 card-text text-dark" style="text-align: justify;"><span style="font-weight: normal !important;">Sponsored by us, it helps stabilize the Capital Market, provide liquidity in the market and declare attractive dividend to the unit holders by investing the proceeds in the capital and money market of Bangladesh.</span><br><br><br></p><button class="btn btn-primary btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-primary-subtle">
                            <div class="card-body text-center p-3">
                                <h5 class="fw-bold mb-3 card-title text-primary" style="border-bottom: 1px solid #dddddd;">HFAML-ACME Employees' Unit Fund</h5>
                                <p class="fw-bold mb-2 card-text text-dark" style="text-align: justify;"><span style="font-weight: normal !important;">Sponsored by the ACME Laboratories, it provides attractive dividends, helps stabilize the Capital Market and provide liquidity in the market by investing the proceeds in the capital and the money market of Bangladesh, for a wider range of investors.&nbsp;</span><br><br></p><button class="btn btn-primary btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-primary-subtle">
                            <div class="card-body text-center p-3">
                                <h5 class="fw-bold mb-3 card-title text-primary" style="border-bottom: 1px solid #dddddd;">HFAML Shariah Unit Fund</h5>
                                <p class="fw-bold mb-2 card-text text-dark" style="text-align: justify;"><span style="font-weight: normal !important;">Sponsored by us, it provides maximum return of investment in the form of capital appreciation and dividend payment by&nbsp;adjusting risks of investments in the shariah compliant instruments of the capital and the money market of Bangladesh, especially for investors who abides by the Islamic Shariah.</span></p><button class="btn btn-primary btn-sm" type="button">Learn more</button>
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
                        <h1 class="fw-bold mb-0 text-primary">News</h1><a class="badge text-bg-primary btn" href="#">Read More News</a>
                    </div>
                </div><!-- End: News Title -->
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="fs-4 fw-bolder text-start mb-2">Sponsored by the ACME Laboratories, it&nbsp;</p>
                        <p class="mb-3"><span style="font-weight: normal !important;">Sponsored by the ACME Laboratories, it provides attractive dividends, helps stabilize the Capital Market and provide liquidity in the market by investing the proceeds in the capital and the money market of Bangladesh, for a wider range of investors.&nbsp;</span></p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{asset('img/team/avatar2.jpg')}}">
                            <div>
                                <p class="fw-bold text-primary mb-0">John Smith</p>
                                <p class="text-muted mb-0">Erat netus</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="fs-4 fw-bolder text-start mb-2">Sponsored by the ACME Laboratories, it&nbsp;</p>
                        <p class="mb-3"><span style="font-weight: normal !important;">Sponsored by the ACME Laboratories, it provides attractive dividends, helps stabilize the Capital Market and provide liquidity in the market by investing the proceeds in the capital and the money market of Bangladesh, for a wider range of investors.&nbsp;</span></p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{asset('img/team/avatar2.jpg')}}">
                            <div>
                                <p class="fw-bold text-primary mb-0">John Smith</p>
                                <p class="text-muted mb-0">Erat netus</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="fs-4 fw-bolder text-start mb-2">Sponsored by the ACME Laboratories, it&nbsp;</p>
                        <p class="mb-3"><span style="font-weight: normal !important;">Sponsored by the ACME Laboratories, it provides attractive dividends, helps stabilize the Capital Market and provide liquidity in the market by investing the proceeds in the capital and the money market of Bangladesh, for a wider range of investors.&nbsp;</span></p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{asset('img/team/avatar2.jpg')}}">
                            <div>
                                <p class="fw-bold text-primary mb-0">John Smith</p>
                                <p class="text-muted mb-0">Erat netus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End: Hero Clean Reverse -->
    </header>
    <section class="py-2"><!-- Start: Hero Clean Reverse -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start d-flex flex-column justify-content-center align-items-center mb-4">
                    <div class="py-3" style="max-width: 450px;">
                        <h2 class="fw-bold text-primary">Not Sure Where to Invest?</h2>
                        <p class="my-3">Invest in our Mutual Funds today with as low as BDT 1000 &amp; receive <strong>attractive </strong>dividends. In our hands, your precious investments continue to grow <strong>fast &amp; safe</strong>.&nbsp;<a class="badge text-bg-primary btn" href="#">Learn More</a></p>
                    </div>
                    <div class="py-3" style="max-width: 450px;">
                        <h2 class="fw-bold text-primary">Corporate Advisory</h2>
                        <p class="my-3">We offer <strong>advice </strong>on strategy, structure, value &amp; capital<strong>&nbsp;</strong>to boost performance of corporations.&nbsp;<a class="badge text-bg-primary btn" href="#">Learn More</a></p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="p-5 mx-lg-5 pulse animated infinite" style="background: url({{asset('img/blob.svg')}}) center / contain no-repeat;"><img class="img-fluid rounded w-100" style="min-height: 300px;" src="{{asset('img/investment.png')}}"></div>
                </div>
            </div>
        </div><!-- End: Hero Clean Reverse -->
    </section>
    <section><!-- Start: Features Cards -->
        <div class="container py-5 bg-primary-gradient">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1 class="fw-bold mb-0 text-primary">Why Us?</h1>
                </div>
            </div>
            <div class="py-3">
                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-3 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><svg class="icon icon-tabler icon-tabler-moneybag text-primary" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5z"></path>
                                        <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Transparent Investment Philosophy</h5>
                                <p class="text-muted card-text" style="text-align: justify;">With over 50 years plus total market expertise by our management team, and a consistent investment philosophy and a team of professionals makes us unique in the business.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-3 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><svg class="icon icon-tabler icon-tabler-bulb text-primary" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 12h1m8 -9v1m8 8h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7"></path>
                                        <path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3"></path>
                                        <path d="M9.7 17l4.6 0"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Long-term Valuations and risk adjusted Performance</h5>
                                <p class="text-muted card-text" style="text-align: justify;">We provide our clients with our best ideas and investment expertise as we collaborate with them to help them grow and protect their investment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-3 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><svg class="icon icon-tabler icon-tabler-graph text-primary" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 18v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M7 14l3 -3l2 2l3 -3l2 2"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">In-depth research and analysis for Investment</h5>
                                <p class="text-muted card-text" style="text-align: justify;">We continuously help our clients through tailor an investment strategy to meet their objectives by bring market experts, unique ideas and unique investment strategies.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bs-icon-lg mb-3 mx-auto bs-icon rounded shadow" style="top: 1rem;right: 1rem;"><svg class="icon icon-tabler icon-tabler-growth text-primary" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M16.5 15a4.5 4.5 0 0 0 -4.5 4.5m4.5 -8.5a4.5 4.5 0 0 0 -4.5 4.5m4.5 -8.5a4.5 4.5 0 0 0 -4.5 4.5m-4 3.5c2.21 0 4 2.015 4 4.5m-4 -8.5c2.21 0 4 2.015 4 4.5m-4 -8.5c2.21 0 4 2.015 4 4.5m0 -7.5v6"></path>
                                    </svg></div>
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
        <h1 class="fw-bold text-center mb-0 text-primary">Our Partners</h1>
        <div class="container text-center py-2">
            <div class="row row-cols-1 row-cols-sm-3">
                <div class="col">
                    <p class="fw-bolder text-center mb-2" style="text-align: justify;">Sponsors</p><a href="#"> <img class="m-3" src="{{asset('img/brands/instacart.png')}}"></a><a href="#"> <img class="m-3" src="{{asset('img/brands/kickstarter.png')}}"></a>
                </div>
                <div class="col">
                    <p class="fw-bolder text-center mb-2" style="text-align: justify;">Custodians</p><a href="#"> <img class="m-3" src="{{asset('img/brands/lyft.png')}}"></a><a href="#"> <img class="m-3" src="{{asset('img/brands/shopify.png')}}"></a>
                </div>
                <div class="col">
                    <p class="fw-bolder text-center mb-2" style="text-align: justify;">Clients</p><a href="#"> <img class="m-3" src="{{asset('img/brands/pinterest.png')}}"></a><a href="#"> <img class="m-3" src="{{asset('img/brands/twitter.png')}}"></a>
                </div>
            </div>
        </div>
    </section>
</div>