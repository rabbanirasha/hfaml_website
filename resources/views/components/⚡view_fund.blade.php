<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("Mutual Fund");
    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Mutual Fund</h1>
            <hr style="border-style: inset;">
            <div class="card bg-primary bg-opacity-10 mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <span class="badge bg-light text-primary mb-2">Open-End Fund</span>
                            <h2 class="fw-bold mb-1">HF Unit Fund</h2>
                            <p class="mb-0">Symbol/Code: HFUF | Asset Manager: HFAML</p>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <div class="bg-white text-dark p-3 rounded text-center shadow-sm">
                                <div class="small text-muted text-uppercase fw-bold">Latest Selling Price</div>
                                <div class="fs-2 fw-bold text-primary">BDT 26246</div>
                                <div class="small text-muted">Repurchase: BDT 246246</div>
                                <div class="small text-secondary mt-1">As of 24/1/32</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="row g-4">
                <!-- Left Column: NAV Growth Chart & Fund Information -->
                <div class="col-lg-8">
                    <!-- NAV Historical Chart -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="fw-bold mb-0 text-primary">NAV Growth Trend</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="navChart" height="260"></canvas>
                        </div>
                    </div>

                    <!-- Fund Description & Profile -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="fw-bold mb-0 text-primary">Fund Overview</h5>
                        </div>
                        <div class="card-body">
                            <p class="lead fs-6">description description description description description description></p>
                            
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <th class="bg-light w-33">Sponsor</th>
                                            <td>'HF Asset Management Ltd.'</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Trustee</th>
                                            <td>'Investment Corporation of Bangladesh (ICB)')</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Custodian</th>
                                            <td>'BRAC Bank PLC')</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Inception Date</th>
                                            <td>356/346/436</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Target AUM</th>
                                            <td>BDT 436426</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Quick Calculators & SID Downloads -->
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white py-3">
                            <h6 class="fw-bold mb-0">Scheme Documents & Disclosures</h6>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="/downloads" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Scheme Information Document (SID)</strong>
                                    <div class="small text-muted">Full Prospectus & Bylaws</div>
                                </div>
                                <span class="badge bg-secondary">PDF</span>
                            </a>
                            <a href="/reports" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Quarterly Portfolio Disclosure</strong>
                                    <div class="small text-muted">Asset Allocation & Holdings</div>
                                </div>
                                <span class="badge bg-secondary">PDF</span>
                            </a>
                        </div>
                    </div>

                    <div class="card bg-primary-subtle border-primary text-center p-4">
                        <h5 class="fw-bold text-primary mb-2">Ready to Invest in HFUF?</h5>
                        <p class="small text-muted mb-3">Open your investor account online or submit a buy request directly with our support team.</p>
                        <a href="/register" class="btn btn-primary shadow-sm mb-2 w-100">Open Investor Account</a>
                        <a href="/contact" class="btn btn-outline-primary w-100">Contact Investment Desk</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>