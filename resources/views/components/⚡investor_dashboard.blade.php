<?php

use Livewire\Attributes\Title;
Use Livewire\Component;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    public $fund_summary, $fund_performance, $fund_list;
    public function mount(){
        $fund_code = "HFUF";
        $fund_code_small = strtolower($fund_code);
        $this->fund_summary = DB::table('tbl_fundsummary')->where('fund_code', $fund_code_small)->first();
        $this->fund_list = DB::table('tbl_fundperformance')->get();
        $this->fund_performance = $this->fund_list->firstWhere('fund_code', $fund_code);

        if (!$this->fund_summary) {
            abort(404);
        }

    }
    public function render(){
        return $this->view()->title("Investor Dashboard");

    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2">
            <div class="row align-items-center mb-4">
                <div class="col-md-4 text-end mt-3 mt-md-0">
                    <div class="card rounded-bordered shadow-sm bg-white w-100">
                        <div class="d-flex align-items-center p-4">
                            <div class="bs-icon-xl bs-icon-circle bg-secondary text-white me-3 bs-icon"> <i class="bi bi-pie-chart-fill"></i> </div>
                            <div class="text-dark w-100">
                                <div class="fs-5 fw-bold text-secondary"> Total Unit Holdings </div>
                                <div class="fs-1 fw-bold"> {{ $fund_performance?->nav_mp_pu ?? 'N/A' }} </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end mt-3 mt-md-0">
                    <div class="card rounded-bordered shadow-sm bg-white w-100">
                        <div class="d-flex align-items-center p-4">
                            <div class="bs-icon-xl bs-icon-circle bg-secondary text-white me-3 bs-icon"> <i class="bi bi-cash-coin"></i> </div>
                            <div class="text-dark w-100">
                                <div class="fs-5 fw-bold text-secondary"> Current Portfolio Value  </div>
                                <div class="fs-1 fw-bold"> {{ $fund_performance?->nav_mp_pu ?? 'N/A' }} </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end mt-3 mt-md-0">
                    <div class="card rounded-bordered shadow-sm bg-white w-100">
                        <div class="d-flex align-items-center p-4">
                            <div class="bs-icon-xl bs-icon-circle bg-secondary text-white me-3 bs-icon"> <i class="bi bi-graph-up-arrow"></i> </div>
                            <div class="text-dark w-100">
                                <div class="fs-5 fw-bold text-secondary"> Total Gain / Loss</div>
                                <div class="fs-1 fw-bold"> {{ $fund_performance?->nav_mp_pu ?? 'N/A' }} </div>
                            </div>
                        </div>
                    </div>
                </div>                                                              
            </div>

            <!-- Main Content Grid -->
            <div class="row mt-5">
                <!-- Left Column -->
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-secondary text-white py-3">
                            <h6 class="fw-bold mb-0">NAV at Market<span class="badge bg-light text-secondary" style="float:right;">As of 1 Sept 2026</span></h6>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('downloads') }}" wire:navigate.hover class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div> <strong>HFUF</strong> <div class="small text-muted">NAV at cost: 10 | NAV at Surrender: 10</div> </div>
                                <div class="fs-3 fw-bold text-body-black"> {{ $fund_performance?->nav_mp_pu ?? 'N/A' }} </div>                              
                            </a>                                                                              
                        </div>
                    </div>
                    
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-secondary text-white py-3">
                            <h6 class="fw-bold mb-0">Schemes under your account</h6>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('downloads') }}" wire:navigate.hover class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div> <strong>HFUF_SIP_CIP</strong> <div class="small text-muted">SIP scheme with stock dividend</div> </div>
                                <div class="fs-6 fw-bold text-body-black"> HFUF005 </div>                              
                            </a>
                            <a href="{{ route('downloads') }}" wire:navigate.hover class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div> <strong>HFACME_SIP_CASH</strong> <div class="small text-muted">SIP scheme with cash dividend</div> </div>
                                <div class="fs-6 fw-bold text-body-black"> HFACMEUF003 </div>                              
                            </a>
                            <a href="{{ route('downloads') }}" wire:navigate.hover class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div> <strong>HFSUF_CASH</strong> <div class="small text-muted">lump-sum scheme with cash dividend</div> </div>
                                <div class="fs-6 fw-bold text-body-black"> HFSUF004 </div>                              
                            </a>
                            <a href="{{ route('downloads') }}" wire:navigate.hover class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div> <strong>HFSUF_CIP</strong> <div class="small text-muted">lump-sum scheme with stock dividend</div> </div>
                                <div class="fs-6 fw-bold text-body-black"> HFSUF005 </div>                              
                            </a>                                                                                                                                              
                        </div>
                    </div>                     

                    <div class="card bg-secondary-subtle border-primary text-center p-4">
                        <h5 class="fw-bold text-secondary mb-2">Ready to Invest in HFUF?</h5>
                        <p class="small text-muted mb-3">Open your investor account online or submit a buy request directly with our support team.</p>
                        <a href="/register" class="btn btn-secondary shadow-sm mb-2 w-100">Open Investor Account</a>
                        <a href="/contact" class="btn btn-secondary w-100">Contact Investment Desk</a>
                    </div>
                </div>                
                <!-- Right Column -->
                <div class="col-lg-8">

                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h3 class="fw-bold mb-0 mt-3 text-secondary text-center">Your Portfolio</h3>
                        </div>
                        <div class="card-body">
                            <livewire:datatable 
                                title="Investor Folio" 
                                table="tbl_investorportfolios" 
                                :columns="[
                                    ['field' => 'fund_id', 'label' => '#', 'sortable' => true],
                                    ['field' => 'unit_holding', 'label' => 'Units', 'sortable' => true],
                                    ['field' => 'total_cost_bdt', 'label' => 'Cost Value', 'sortable' => true],
                                    ['field' => 'current_market_value_bdt', 'label' => 'Market Value', 'sortable' => true],
                                    ['field' => 'unrealized_gain_loss_bdt', 'label' => 'U/R Gain', 'sortable' => true],                                               
                                    
                                ]"
                                :filters="[
                                    [
                                        'field' => 'fund_type', 
                                        'label' => 'fund_type', 
                                        'options' => ['Open-end Growth Mutual Fund' => 'Open-end Growth Mutual Fund', 'Close End' => 'Closed End']
                                    ]
                                ]"
                            /> 
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h3 class="fw-bold mb-0 mt-3 text-secondary text-center">Your Ledger</h3>
                        </div>
                        <div class="card-body">
                            <livewire:datatable 
                                title="Investor Folio" 
                                table="tbl_investorportfolios" 
                                :columns="[
                                    ['field' => 'fund_id', 'label' => '#', 'sortable' => true],
                                    ['field' => 'unit_holding', 'label' => 'Units', 'sortable' => true],
                                    ['field' => 'total_cost_bdt', 'label' => 'Cost Value', 'sortable' => true],
                                    ['field' => 'current_market_value_bdt', 'label' => 'Market Value', 'sortable' => true],
                                    ['field' => 'unrealized_gain_loss_bdt', 'label' => 'U/R Gain', 'sortable' => true],                                               
                                    
                                ]"
                                :filters="[
                                    [
                                        'field' => 'fund_type', 
                                        'label' => 'fund_type', 
                                        'options' => ['Open-end Growth Mutual Fund' => 'Open-end Growth Mutual Fund', 'Close End' => 'Closed End']
                                    ]
                                ]"
                            /> 
                        </div>
                    </div>                   


                </div>
            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>