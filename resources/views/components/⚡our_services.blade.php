<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("Our Services");
    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Our Services</h1>
            <hr style="border-style: inset;">
            <div class="row mb-4">
                <div class="col-md-8 col-xl-6 p-4">
                    <h4 class="fw-bolder text-center" style="color: #2c4fc3;">FUND MANAGEMENT</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <p style="text-align: justify;"><strong>Mutual Fund</strong></p> <ul> <li><span style="text-decoration: underline;">Open End Mutual Fund:</span> An open-end fund is one that is available for subscription all through the year and is not listed on the stock exchanges. Investors have the flexibility to buy or sell any part of their investment at any time at a price linked to the fund's Net Asset Value.</li> <li><span style="text-decoration: underline;">Closed End Mutual Fund:</span> A closed-end fund has a fixed number of shares outstanding and operates for a fixed duration. The fund would be open for subscription only during a specified period and there is an even balance of buyers and sellers, so someone would have to be selling in order for you to be able to buy it. Closed-end funds are also listed on the stock exchange so it is traded just like other stocks on an exchange or over the counter. Usually, the redemption is also specified which means that they terminate on specified dates when the investors can redeem their units.</li> </ul> <p style="text-align: justify;"><br /><strong>Institutional fund management</strong><br />HF Asset Management Limited, involvement with institutional is a privilege that we take seriously. We offer our high net worth investors, as well as institutions, tailor-made solutions through our Portfolio Management arm. When trying to select the right investment at the right time you are often confronted with a myriad of complex factors requiring careful analysis, evaluation and monitoring. HF Asset Management Limited can be of invaluable service in this decisive process. Our portfolio management specialists are highly experienced and always manage client assets against a background of financial responsibility that you can expect from the market leader.<br /><br />What we offer:</p> <ul class="mutual_fund_listings"> <li>Customization of approach based on analysis of each client’s risk tolerance, return requirements, and other preferences, including shariah-compliant investment.</li> <li>Customized mandates, usually across asset classes like equity and fixed income with tailored objectives, are prepared for discussion and approval by client.</li> <li>When objectives are agreed we set out to maximize them, using our expertise and strengths with or without the constraints of benchmarks.</li> <li>We provide personalized and enhanced service – including continuous updates on portfolios, market and company research, access to portfolio managers as well as quarterly visits.</li> </ul>
                </div>
                <div class="col-md-8 col-xl-6 p-4">
                    <h4 class="fw-bolder text-center" style="color: #2c4fc3;">CORPORATE ADVISORY</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <p style="text-align: justify;">Our culture is a reflection of who we are as organization and people of the Organization. This is the reflection&nbsp;of our founders and top management, like them, it guides us everyday. We believe in the culture of the "free to think of&nbsp;build unique and exceptional". <br><br> People work best when they’re free to pursue and express their conviction. This 'free think' attracts&nbsp;dynamic individuals who want to pursue their passions and interests and we help them&nbsp;to convert their dream into reality. We believe in non-hierarchical workplace where everyone has access to every level of Management. We encourage honesty and discussion. And we organize and empower our teams to inspire diversity of perspective.</p>
                </div>
            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>