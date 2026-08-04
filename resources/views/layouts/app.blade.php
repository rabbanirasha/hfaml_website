<!DOCTYPE html>
<html data-bs-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="A leading Asset Management Company of Bangladesh, managing 3 mutual funds to date and offering corporate advisory services.">
    <title>{{ config('app.name') }} - {{ $title }}</title>
    @vite('resources/app.js')
    @livewireStyles
</head>

<body class="bg-primary-gradient"><!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-shrink navbar-light" id="mainNav" style="font-size: 13px;height: 60px;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span><img class="img-fluid" src="assets/img/HFAML%20Logo.png" loading="auto" style="height: 2.2rem;"></span></a>
            <div class="theme-switcher dropdown me-auto"><a class="dropdown-toggle my-auto" data-bs-toggle="dropdown" aria-expanded="false" href="#"><svg class="bi bi-sun-fill" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="height: 20px;width: 20px;">
                        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"></path>
                    </svg></a>
                <div class="dropdown-menu" style="font-size:small;"><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="light"><svg class="bi bi-sun-fill me-2 opacity-50" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"></path>
                        </svg>Light</a><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="dark"><svg class="bi bi-moon-stars-fill me-2 opacity-50" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"></path>
                            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"></path>
                        </svg>Dark</a><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="auto"><svg class="bi bi-circle-half me-2 opacity-50" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 0 8 1zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16"></path>
                        </svg>Auto</a></div>
            </div><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1" style="border-style: none;"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-nowrap text-end justify-content-between p-2 rounded-1" id="navcol-1" style="background-color: var(--bs-body-bg);">
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_us.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Our Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Our Funds</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Our Schemes</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Reports</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Downloads</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacts.html">Contact Us</a></li>
                </ul>
                <div class="d-inline-flex"><a class="btn btn-sm d-none d-xl-inline-flex" role="button" href="signup.html" style="color: var(--bs-primary);">Signup</a><a class="btn btn-primary btn-sm shadow" role="button" href="login.html">Login</a></div>
            </div>
        </div>
    </nav><!-- End: Navbar Centered Links -->
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
                    <li class="list-inline-item"><svg class="bi bi-facebook" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg class="bi bi-twitter" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg class="bi bi-linkedin" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"></path>
                        </svg></li>
                </ul>
            </div>
        </div>
    </footer><!-- End: Footer Multi Column -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>