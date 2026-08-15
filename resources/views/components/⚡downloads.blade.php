<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("Downloads");
    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Downloads</h1>
            <hr style="border-style: inset;">
            <!-- Category Cards Grid -->
            <div class="row g-4">

                <!-- Application Forms -->
                <div class="col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header bg-primary bg-opacity-10 py-3">
                            <h5 class="fw-bold mb-0">Application Forms</h5>
                            <small class="opacity-75">For buying, selling & transferring units</small>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">Buy / Subscription Form</div>
                                    <div class="text-muted small">For purchasing mutual fund units</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~120 KB</span>
                                    <a href="#" class="btn btn-primary btn-sm">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">Surrender / Redemption Form</div>
                                    <div class="text-muted small">For redeeming mutual fund units</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~110 KB</span>
                                    <a href="#" class="btn btn-primary btn-sm">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">Unit Transfer Form</div>
                                    <div class="text-muted small">For transferring units between accounts</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~95 KB</span>
                                    <a href="#" class="btn btn-primary btn-sm">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">SIP Registration Form</div>
                                    <div class="text-muted small">Set up a Systematic Investment Plan</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~105 KB</span>
                                    <a href="#" class="btn btn-primary btn-sm">Download</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Scheme Documents -->
                <div class="col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header bg-success bg-opacity-10 py-3">
                            <h5 class="fw-bold mb-0">Scheme Documents</h5>
                            <small class="opacity-75">Prospectus and Factsheet</small>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">SID – HFUF</div>
                                    <div class="text-muted small">Scheme Information Document</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~2.1 MB</span>
                                    <a href="#" class="btn btn-success btn-sm">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">SID – HFSUF</div>
                                    <div class="text-muted small">Scheme Information Document</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~2.3 MB</span>
                                    <a href="#" class="btn btn-success btn-sm">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">SID – HFACMEUF</div>
                                    <div class="text-muted small">Scheme Information Document</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~1.9 MB</span>
                                    <a href="#" class="btn btn-success btn-sm">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">KIM – Key Info Memorandum</div>
                                    <div class="text-muted small">Summarized scheme details (all funds)</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~450 KB</span>
                                    <a href="#" class="btn btn-success btn-sm">Download</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Account Management -->
                <div class="col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header bg-danger bg-opacity-10 py-3">
                            <h5 class="fw-bold mb-0">Account Management</h5>
                            <small class="opacity-75">KYC, nominee, and update forms</small>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">Account Statement Request</div>
                                    <div class="text-muted small">Request printed account statement</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~85 KB</span>
                                    <a href="#" class="btn btn-sm text-white bg-danger">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">Nominee Change Form</div>
                                    <div class="text-muted small">Update or add account nominee</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~90 KB</span>
                                    <a href="#" class="btn btn-sm text-white bg-danger">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">Bank Mandate / ECS Form</div>
                                    <div class="text-muted small">Register bank account for dividends</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~100 KB</span>
                                    <a href="#" class="btn btn-sm text-white bg-danger">Download</a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="fw-semibold">KYC Update Form</div>
                                    <div class="text-muted small">Update Know Your Customer details</div>
                                </div>
                                <div class="d-flex flex-column align-items-end gap-1">
                                    <span class="badge bg-body-light text-body-secondary border">~130 KB</span>
                                    <a href="#" class="btn btn-sm text-white bg-danger">Download</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Investor Portal Callout -->
            <div class="card border-primary mt-5 shadow-sm">
                <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 p-4">
                    <div>
                        <h5 class="fw-bold text-primary mb-1">Already an Investor?</h5>
                        <p class="mb-0 text-muted">Login to the Investor Portal to ⬇️ download your personal account statement, investment and dividend certificates, 👁️ view your holdings and growth, and 📈 track NAV movements in real time.</p>
                    </div>
                    <a href="/login" class="btn btn-light px-4 py-2 text-nowrap text-primary shadow-sm">Login to Portal</a>
                </div>
            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>