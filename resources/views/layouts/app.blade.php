<!DOCTYPE html>
<html data-bs-theme="auto" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="A leading Asset Management Company of Bangladesh, managing 3 mutual funds to date and offering corporate advisory services.">
    <title>{{ config('app.name') }} - {{ $title }}</title>
    @vite('resources/app.js')
    @livewireStyles
</head>

<body class="bg-primary-gradient">
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-shrink navbar-light" id="mainNav" style="font-size: 13px;height: 60px;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span><img class="img-fluid fit-contain" src="{{asset('img/HFAML%20Logo.png')}}" loading="auto" style="height: 2.2rem;"></span></a>
            <div class="theme-switcher dropdown me-auto">
                <a class="dropdown-toggle my-auto" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;"><i class="bi bi-brightness-high-fill fs-6 text-primary"></i></a>
                <div class="dropdown-menu" style="font-size:small;">
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="light"><i class="bi bi-sun pe-2 text-primary"></i>Light</a>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="dark"><i class="bi bi-moon-stars pe-2 text-primary"></i>Dark</a>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="auto"><i class="bi bi-circle-half pe-2 text-primary"></i>Auto</a></div>
            </div>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1" style="border-style: none;">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-nowrap text-end justify-content-between p-2 rounded-1" id="navcol-1" style="background-color: var(--bs-body-bg);">
                <ul class="navbar-nav text-center" style="font-size:0.9rem;">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" wire:navigate.hover wire:current.exact="active text-blue">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" wire:navigate.hover wire:current="active text-blue">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('services') }}" wire:navigate.hover wire:current="active text-blue">Our Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('funds') }}" wire:navigate.hover wire:current="active text-blue">Our Funds</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('schemes') }}" wire:navigate.hover wire:current="active text-blue">Our Schemes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reports') }}" wire:navigate.hover wire:current="active text-blue">Reports</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('downloads') }}" wire:navigate.hover wire:current="active text-blue">Downloads</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" wire:navigate.hover wire:current="active text-blue">Contact Us</a></li>
                </ul>
                <div class="d-inline-flex">
                    <a class="fw-bold btn btn-sm btn-outline-light text-primary mb-0 border-0 d-none d-xl-inline-flex" href ="{{route('signup')}}" wire:navigate.hover>SIGN UP</a>
                    <a class="btn btn-primary btn-sm shadow" role="button" wire:navigate.hover href="{{ route('login') }}">LOGIN</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End: Navbar Centered Links -->
<main>
    {{ $slot }}
    @livewireScripts
</main>
    <!-- Start: Footer Multi Column -->
    <footer style="border-top: 1px solid #dddddd; background-color: var(--bs-body-bg);">
        <div class="container py-4 py-lg-5">
            <div class="row"><!-- Start: About Us -->
                <div class="col text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">About Us</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Mission &amp; Vision</a></li>
                        <li><a href="#">Our Culture</a></li>
                        <li><a href="#">Our Objective</a></li>
                        <li><a href="#">Why Us</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Our Partners</a></li>
                        <li><a href="#">History of HFAML</a></li>
                        <li><a href="#">Career at HFAML</a></li>
                    </ul>
                </div><!-- End: About Us --><!-- Start: Our Services -->
                <div class="col text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Our Services</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Fund Management</a></li>
                        <li><a href="#">Corporate Advisory</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div><!-- End: Our Services --><!-- Start: Our Funds -->
                <div class="col text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Our Funds</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Fund Summary</a></li>
                        <li><a href="#">HFAML Unit Fund</a></li>
                        <li><a href="#">HFAML-ACME Employees Unit Fund</a></li>
                        <li><a href="#">HFAML Shariah Unit Fund</a></li>
                    </ul>
                </div><!-- End: Our Funds --><!-- Start: Insights -->
                <div class="col text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Insights</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Downloads</a></li>
                        <li><a href="#">Market Commentary</a></li>
                        <li><a href="#">Mutual Fund Analysis</a></li>
                    </ul>
                </div><!-- End: Insights --><!-- Start: Our Schemes -->
                <div class="col text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Our Schemes</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">SIP</a></li>
                        <li><a href="#">CIP</a></li>
                        <li><a href="#">Cash Dividend</a></li>
                    </ul>
                </div><!-- End: Our Schemes --><!-- Start: Related Sites -->
                <div class="col text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Related Sites</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">BSEC</a></li>
                        <li><a href="#">DSE</a></li>
                        <li><a href="#">CSE</a></li>
                        <li><a href="#">CDBL</a></li>
                        <li><a href="#">AAMCMF</a></li>
                    </ul>
                </div><!-- End: Related Sites -->
            </div>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2024 HF Asset Management Ltd.</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><i class="bi bi-facebook"></i></li>
                    <li class="list-inline-item"><i class="bi bi-twitter-x"></i></li>
                    <li class="list-inline-item"><i class="bi bi-whatsapp"></i></li>
                    <li class="list-inline-item"><i class="bi bi-linkedin"></i></li>                    
                </ul>
            </div>
        </div>
    </footer><!-- End: Footer Multi Column -->
</body>

</html>