<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("Login");
    }
}
?>

<div>
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow mx-auto my-4 bs-icon"><svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                        </svg></div>
                    <h2 class="fw-bold" style="color: darkorange;">Login</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <form method="post" data-bs-theme="light">
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary shadow w-100 d-block" type="submit">Login</button></div>
                            </form>
                            <p class="text-muted">Don't have an account?&nbsp;<a wire:navigate.hover href="{{ route('signup') }}">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>