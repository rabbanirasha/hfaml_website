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
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10 text-center p-4 mx-md-auto">
                    <p style="text-align: justify;">We are always in a quest to inculcate healthy habits for our well-being. So whether it is eating an apple a day, following a strict work-out regime or having a healthy meal, we leave no stone unturned to stay healthy. However, did you know that there is one Wealthy Habit that you can follow to ensure you financial well-being! It is the Systematic Investment Plan (SIP). Benefits of SIP are as follows:</p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2"><i class="bi bi-align-middle text-blue pe-2"></i><strong>"SIP" average out the cost of investments</strong><br>By investing in an "SIP" over a longer time, you can make the volatility of the market work in your favor. This phenomenon is enabled by the principle of ‘Taka Cost Averaging’. This is how: When Market is UP; BDT 1,000 can buy 50 Units at NAV of BDT 20/Unit When Market is UP; BDT 1,000 can buy 100 Units at NAV of BDT 10/Unit</li>
                        <li class="mb-2"><i class="bi bi-bar-chart-line-fill text-blue pe-2"></i><strong>Power of Compounding</strong><br>It is easy to put your investment decisions on old, waiting for the right time to take the plunge. But putting things off means missing out on utilizing one of the most potent benefits available to long-term investors.</li>
                        <li class="mb-2"><i class="bi bi-safe-fill text-blue pe-2"></i><strong>It inculcates financial discipline</strong><br>Just like you need to stick to your workout routine to get results, you must make investments regularly to remain financially fit. SIPs are regular investments that can be fixed at a regular schedule. Here’s an ideal scenario: 
                            <ul>
                                <li>You get your salary on the 1st of every month</li>
                                <li>You want to save BDT 5,000 every month</li>
                                <li>By the time the month ends you may have overspent</li>
                                <li>If you schedule an SIP payment on the 2nd of every month, the amount will be automatically saved</li>
                            </ul>
                        </li>
                        <li class="mb-2"><i class="bi bi-calendar-check-fill text-blue pe-2"></i><strong>Tax Benefit</strong><br>SIP deducts your tax return in the following ways: 
                            <ul>
                                <li>No tax on Capital Gain</li>
                                <li>Tax Rebate on Dividend Income</li>
                            </ul>
                        </li>                                                
                    </ul>
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
                        table="migrations" 
                        :columns="[
                            ['field' => 'id', 'label' => 'Product Name', 'sortable' => true],
                            ['field' => 'migration', 'label' => 'Price ($)', 'sortable' => true],
                            ['field' => 'batch', 'label' => 'Inventory', 'sortable' => true]
                        ]"
                        :filters="[
                            ['field' => 'batch', 'label' => 'Select Status', 'options' => ['active' => 'Active Only', 'inactive' => 'Inactive Only']]
                        ]" 
                    />                                                                     
                </div>                                             
            </div>                         
        </div>
        <!-- End: About Us -->
    </section>
</div>