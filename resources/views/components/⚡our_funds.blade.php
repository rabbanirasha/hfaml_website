<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("Our Funds");
    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Our Funds</h1>
            <hr style="border-style: inset;">
            <div class="row mt-5">
                <div class="col-md-10 col-xl-10 text-center mx-auto">
                    <h4 class="fw-bolder text-center" style="color: #2c4fc3;">Fund Summary</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <livewire:datatable 
                        title="Fund Summary" 
                        table="tbl_fundsummary" 
                        :columns="[
                            ['field' => 'fund_id', 'label' => '#', 'sortable' => true],
                            ['field' => 'fund_name', 'label' => 'Fund Name', 'sortable' => true],
                            ['field' => 'fund_type', 'label' => 'Fund Type', 'sortable' => true],
                            ['field' => 'reg_date', 'label' => 'Registration Date', 'sortable' => true],
                            ['field' => 'sponsor', 'label' => 'Sponsor', 'sortable' => true],
                            ['field' => 'trustee', 'label' => 'Trustee', 'sortable' => true],
                            ['field' => 'custodian', 'label' => 'Custodian', 'sortable' => true],
                            ['field' => 'target_size', 'label' => 'Target Size', 'sortable' => true],                                                   
                            
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
                <div class="col-md-10 col-xl-10 text-center mx-auto my-5">
                    <h4 class="fw-bolder text-center" style="color: #2c4fc3;">NAV History</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <livewire:datatable 
                        title="NAV History" 
                        table="eod_fund_summary" 
                        :columns="[
                            ['field' => 'RecordID', 'label' => '#', 'sortable' => true],
                            ['field' => 'FundCode', 'label' => 'FundCode', 'sortable' => true],
                            ['field' => 'FundName', 'label' => 'FundName', 'sortable' => true],
                            ['field' => 'Date', 'label' => 'Date', 'sortable' => true],
                            ['field' => 'TOTALNOOFSHARE', 'label' => 'Total Shares', 'sortable' => true],                            
                            ['field' => 'NAV_CP', 'label' => 'NAV_CP', 'sortable' => true],
                            ['field' => 'NAV_MP', 'label' => 'NAV at Cost', 'sortable' => true],
                            ['field' => 'NAV_CP_PU', 'label' => 'NAV_CP_PU', 'sortable' => true],
                            ['field' => 'NAV_MP_PU', 'label' => 'NAV_MP_PU', 'sortable' => true],
                            ['field' => 'NAV_SP_PU', 'label' => 'NAV_SP_PU', 'sortable' => true],                                               
                            
                        ]"
                        :filters="[
                            [
                                'field' => 'FundCOAID', 
                                'label' => 'FundCOAID', 
                                'options' => ['2' => 'HFUF', '3' => 'HFACMEUF','4' => 'HFSUF']
                            ]
                        ]"
                    />                                                   
                </div>
                <div class="col-md-10 col-xl-10 text-center mx-auto my-5">
                    <h4 class="fw-bolder text-center" style="color: #2c4fc3;">Dividend History</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <livewire:datatable 
                        title="Dividend History" 
                        table="openfund_tbldividenddeclaration" 
                        :columns="[
                            ['field' => 'DividendCOAID', 'label' => '#', 'sortable' => true],
                            ['field' => 'FundCode', 'label' => 'FundCode', 'sortable' => true],
                            ['field' => 'DividendID', 'label' => 'DividendID', 'sortable' => true],
                            ['field' => 'RecordDate', 'label' => 'RecordDate', 'sortable' => true],
                            ['field' => 'EffectiveDate', 'label' => 'EffectiveDate', 'sortable' => true],
                            ['field' => 'TrusteeCommitteMeetingDate', 'label' => 'TrusteeCommitteMeetingDate', 'sortable' => true],
                            ['field' => 'LastNAVpublicationDate', 'label' => 'LastNAVpublicationDate', 'sortable' => true],
                            ['field' => 'DividendPercentage', 'label' => 'DividendPercentage', 'sortable' => true], 
                            ['field' => 'SaleRateForCIP', 'label' => 'SaleRateForCIP', 'sortable' => true], 
                            ['field' => 'TaxRateForIndividual', 'label' => 'TaxRateForIndividual', 'sortable' => true], 
                            ['field' => 'TaxRateForInstitution', 'label' => 'TaxRateForInstitution', 'sortable' => true],
                            ['field' => 'TaxFreeAmountForIndividual', 'label' => 'TaxFreeAmountForIndividual', 'sortable' => true], 
                            ['field' => 'TaxFreeAmountForInstitution', 'label' => 'TaxFreeAmountForInstitution', 'sortable' => true],                                                                                                                                                                                                                          
                            
                        ]"
                        :filters="[
                            [
                                'field' => 'FundCOAID', 
                                'label' => 'FundCOAID', 
                                'options' => ['2' => 'HFUF', '3' => 'HFACMEUF','4' => 'HFSUF']
                            ]
                        ]"
                    />                                                                      
                </div>                                             
            </div>                         
        </div>
        <!-- End: About Us -->
    </section>
</div>