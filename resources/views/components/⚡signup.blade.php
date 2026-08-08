<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("Signup");
    }
}
?>

<div>
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow mx-auto my-4 bs-icon"><i class="bi bi-person-fill-add"></i></div>
                    <h2 class="fw-bold" style="color: darkorange;">Signup</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <form method="post" data-bs-theme="light">
                                <div class="mb-3"><input class="form-control form-control-lg rounded-4" type="email" name="email" placeholder="Email"></div>
                                <div class="mb-3"><input class="form-control form-control-lg rounded-4" type="password" name="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary shadow w-100 d-block" type="submit">Sign up</button></div>
                            </form>
                            <p class="text-muted">Already have an account?&nbsp;<a wire:navigate.hover href="{{ route('login') }}">Log in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>