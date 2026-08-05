<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("About Us");
    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">About Us</h1>
            <hr style="border-style: inset;">
            <div class="row mb-4">
                <div class="col-md-8 col-lg-8 col-xl-auto text-center p-4 mx-md-auto">
                    <p style="text-align: justify;">Founded in 2016, HF Asset Management Limited (HFAML) is a Bangladesh Securities and Exchange Commission (BSEC) licensed Asset Management company that primarily engages Fund Management and Corporate Advisory Services.<br><br>HFAML offers global standard investment management combined with local expertise to our institutional and individual clients through both open-end and closed-end Mutual funds, institutional portfolio management. HFAML also offers Corporate advisory services by providing optimum capital structure solution to the Bangladeshi companies and arranging fund from both local and overseas sources for local companies.</p>
                </div>
                <div class="col-md-8 col-xl-6 text-center p-4 mx-auto">
                    <h4 class="fw-bolder" style="color: #2c4fc3;">OUR MISSION AND VISION</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <p style="text-align: justify;"><strong>Our Vision</strong><br>To become the most respected company in its sector in Bangladesh.<br><br><strong>Our Mission</strong><br>To provide attractive returns on investment and capital appreciation keeping the highest standard of services to the community through innovations and efficient asset management.</p>
                </div>
                <div class="col-md-8 col-xl-6 text-center p-4 mx-auto">
                    <h4 class="fw-bolder" style="color: #2c4fc3;">OUR CULTURE</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <p style="text-align: justify;">Our culture is a reflection of who we are as organization and people of the Organization. This is the reflection&nbsp;of our founders and top management, like them, it guides us everyday. We believe in the culture of the "free to think of&nbsp;build unique and exceptional". <br><br> People work best when they’re free to pursue and express their conviction. This 'free think' attracts&nbsp;dynamic individuals who want to pursue their passions and interests and we help them&nbsp;to convert their dream into reality. We believe in non-hierarchical workplace where everyone has access to every level of Management. We encourage honesty and discussion. And we organize and empower our teams to inspire diversity of perspective.</p>
                </div>
                <div class="col-md-8 col-xl-6 text-center p-4 mx-auto">
                    <h4 class="fw-bolder" style="color: #2c4fc3;">OUR OBJECTIVE</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <p style="text-align: justify;">• Generate satisfactory return with management’s target to keep the return above sector average on all of its investments. <br>• Attain significant market share and mark-up on share value without compromising service quality and governance. <br>• Maintain diversity, innovation and research for product development and operation. <br>• Contribute to Bangladesh Government’s mandate to develop capital market. <br>• Provide unique, innovative and trustworthy solutions for both Capital Market &amp; Money Market instruments. <br>• Provide education, training and counseling to the employees and investors.</p>
                </div>
                <div class="col-md-8 col-xl-6 text-center p-4 mx-auto">
                    <h4 class="fw-bolder" style="color: #2c4fc3;">WHY US</h4>
                    <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
                    <p style="text-align: justify;"><strong>Our Approach Makes Us Unique</strong><br>We believe that our Clients are the greatest asset of us and we continuously help our clients through tailor an investment strategy to meet their objectives by bring market experts, unique ideas and unique investment strategies. We strive to anticipate and evaluate Capital market trends that may impact client objectives. Our investment framework is rigorous and repeatable, entailing: <br>•&nbsp; &nbsp;A clear investment philosophy <br>•&nbsp; &nbsp;A focus on longer-term valuations and risk-adjusted performance <br>•&nbsp; &nbsp;In-depth research and analysis to support investment decisions <br>• Risk based portfolio construction and generating return as per client requirement</p>
                </div>
            </div>
            <h4 class="fw-bolder text-center" style="color: #2c4fc3;">OUR TEAM</h4>
            <hr class="hr-warning mx-auto" style="background-color: #2c4fc3;height: 5px;width: 80px;margin-top: -5px;">
            <!-- Start: BOD -->
            <div class="py-5">
                <p class="fs-5 mb-3 text-center"><strong>Board of Directors</strong></p>
                <div class="row justify-content-center mx-auto">                    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbebe1428a.webp')}}">
                            <p class="mb-0 fw-bold">Mr. Hafizur Rahman Khan</p>
                            <p class="mb-0">Chairman</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/454A7214.jpg')}}">
                            <p class="mb-0 fw-bold">Mr. Md Fayekuzzaman</p>
                            <p class="mb-0">Executive Director &amp; Former Chief Executive Officer (CEO)</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbf27c8092.webp')}}">
                            <p class="mb-0 fw-bold">Mr. Md. Mozammel Hossain</p>
                            <p class="mb-0">Director</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/IMG_5496.jpg')}}">
                            <p class="mb-0 fw-bold">Ms. Munira Begum</p>
                            <p class="mb-0">Director</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div><!-- End: BOD --><!-- Start: MT -->
            <div class="pb-5">
                <p class="fs-5 mb-3 text-center"><strong>Management &amp; Executive Team</strong></p>
                <div class="row justify-content-center mx-auto">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbebe1428a.webp')}}">
                            <p class="mb-0 fw-bold">Mr. Md Fayekuzzaman</p>
                            <p class="mb-0">Executive Director &amp; Former Chief Executive Officer (CEO)</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbebe1428a.webp')}}">
                            <p class="mb-0 fw-bold">Mr. Nazmul Islam</p>
                            <p class="mb-0">Chief Operating Officer (COO) &amp; CEO (in-charge)</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbebe1428a.webp')}}">
                            <p class="mb-0 fw-bold">Mr. Shihab Alam Khan</p>
                            <p class="mb-0">Sr. Manager - Portfolio Mgmt.</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbebe1428a.webp')}}">
                            <p class="mb-0 fw-bold">Mr. Md Mohiuddin Miah</p>
                            <p class="mb-0">Manager - Accounts and Finance</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbebe1428a.webp')}}">
                            <p class="mb-0 fw-bold">Mr. Fazlul Gani Mazumder (Roman)</p>
                            <p class="mb-0">Manager - Compliance and HR</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>                                                                                               
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="d-flex flex-column align-items-center h-100 text-center p-3">
                            <img class="team-photo mb-3" src="{{asset('img/team/2026-01-19-696dbebe1428a.webp')}}">
                            <p class="mb-0 fw-bold">Rabbani Rasha</p>
                            <p class="mb-0">Manager - Information Technology</p>
                            <a class="badge text-bg-primary btn mt-auto" href="#">Read More</a>
                        </div>
                    </div>                                       
                </div>
            </div>
            <!-- End: MT -->
        </div>
        <!-- End: About Us -->
    </section>
</div>