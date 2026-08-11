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
                            ['field' => 'fund_id', 'label' => 'id', 'sortable' => true],
                            ['field' => 'fund_name', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'fund_type', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'reg_date', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'sponsor', 'label' => '#', 'sortable' => true],
                            ['field' => 'trustee', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'custodian', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'target_size', 'label' => 'Price ($)', 'sortable' => true],                                                   
                            
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
                    <table class="table table-responsive text-start mt-4">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">"SIP" Investment</th>
                        <th class="text-center" scope="col">Other Capital Market Investment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Uncomplicated &amp; largely automated</td>
                            <td>Either gambling  or investment for research</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Small amount of fund required</td>
                            <td>Require Lump sum funds</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>No need to time the market</td>
                            <td>Market timing is important for gain</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Minimized average cost per unit</td>
                            <td>Cost of investment depends on market timing</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Simple way to create long term wealth</td>
                            <td>Trust your Luck!</td>
                        </tr>
                    </tbody>
                    </table>                                    
                </div>
                <div class="col-md-10 col-xl-10 text-center mx-auto my-5">
                    <h4 class="fw-bolder text-center" style="color: #2c4fc3;">Dividend History</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <livewire:datatable 
                        title="Raw DB Products" 
                        table="users" 
                        :columns="[
                            ['field' => 'id', 'label' => 'Product Name', 'sortable' => true],
                            ['field' => 'name', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'email', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'email_verified_at', 'label' => 'Price ($)', 'sortable' => true]
                        ]"
                        :filters="[
                            [
                                'field' => 'name', 
                                'label' => 'All Statuses', 
                                'options' => ['active' => 'Active Only', 'inactive' => 'Inactive Only', 'draft' => 'Drafts']
                            ],
                            [
                                'field' => 'email', 
                                'label' => 'All Visibility Modes', 
                                'options' => ['public' => 'Public Pages', 'hidden' => 'Hidden Pages']
                            ]
                        ]"
                    />                                                                     
                </div>                                             
            </div>                         
        </div>
        <!-- End: About Us -->
    </section>
</div>