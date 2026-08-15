<?php

use Livewire\Attributes\Title;
Use Livewire\Component;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    public $fund_summary, $fund_performance;
    public function mount($fund_code){
        $fund_code_small = strtolower($fund_code);
        $this->fund_summary = DB::table('tbl_fundsummary')->where('fund_code', $fund_code_small)->first();
        $this->fund_performance = DB::table('tbl_fundperformance')->where('fund_code', $fund_code_small)->first();
        
        if (!$this->fund_summary) {
            abort(404);
        }

    }
    public function render(){
        return $this->view()->title("Home");

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
                            <span class="badge bg-light text-primary mb-2">{{$fund_summary->nature}}</span>
                            <h2 class="fw-bold mb-1">{{$fund_summary->fund_name}}</h2>
                            <p class="mb-0">Symbol/Code: {{$fund_summary->fund_code}} | Asset Manager: HFAML</p>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <div class="bg-white text-dark p-3 rounded text-center shadow-sm">
                                <div class="small text-muted text-uppercase fw-bold">Latest Selling Price /Unit</div>
                                <div class="fs-1 fw-bold text-primary">{{$fund_performance->nav_mp_pu}}</div>
                                <div class="small text-muted d-flex justify-content-around gap-2"> <span>Repurchase:</span><span class="fw-bold">{{$fund_performance->nav_rp_pu}}</span> </div>
                                <div class="small d-flex justify-content-around gap-2 mt-1"> <span>As of:</span><span class="fw-bold">{{$fund_performance->effective_date}}</span> </div>
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
                            <p class="lead fs-6" style="text-align: justify;">Our equity funding solution helps our clients raise equity throughout the various stages of its growth cycle. Many corporate require capital to support their growth without increasing the debt burden on their balance sheet and in order to facilitate this HFAML acts as an advisor that helping the company raise funds through private placement of their shares to various private equity funds in Bangladesh and across the globe. Our core private equity team extensive experience along with other functional support teams offers end to end equity advisory solutions to corporate in the need of equity capital. Given our long standing relationship with the blue chip investors we assist the company in capturing the complete value of the organization and the brand. The team has a strong experience in negotiating the investment terms and coordinating the due diligence process which results in the faster execution of the transaction.</p>
                            
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <th class="bg-light w-33">Sponsor</th>
                                            <td>{{$fund_summary->sponsor}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Trustee</th>
                                            <td>{{$fund_summary->trustee}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Custodian</th>
                                            <td>{{$fund_summary->custodian}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Inception Date</th>
                                            <td>{{$fund_summary->reg_date}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Initial Size</th>
                                            <td>{{$fund_summary->initial_size}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Target_size</th>
                                            <td>{{$fund_summary->target_size}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Face Value</th>
                                            <td>{{$fund_summary->face_value}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Nature</th>
                                            <td>{{$fund_summary->nature}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Type</th>
                                            <td>{{$fund_summary->type}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Constituents</th>
                                            <td>{{$fund_summary->constituents}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Objectives</th>
                                            <td>{{$fund_summary->objectives}}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Investment</th>
                                            <td>{{$fund_summary->investment}}</td>
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