<?php

use Livewire\Attributes\Title;
Use Livewire\Component;

new class extends Component
{
    public function render(){
        return $this->view()->title("Contact Us");
    }
}
?>

<div>
    <section><!-- Start: About Us -->
        <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
            <h1 class="fw-bold pt-3 text-primary" style="text-align: center;">Contact Us</h1>
            <hr style="border-style: inset;">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4 p-md-5">
                            <form method="POST" action="/contact" id="contactForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-lg rounded-4" id="name" name="name" placeholder="Your full name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control form-control-lg rounded-4" id="email" name="email" placeholder="you@example.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                        <input type="tel" class="form-control form-control-lg rounded-4" id="phone" name="phone" placeholder="+880 1X-XXXX-XXXX" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                                        <select class="form-select rounded-4" id="subject" name="subject" required>
                                            <option value="">Select a subject...</option>
                                            <option value="General Enquiry" <?= (($_POST['subject'] ?? '') === 'General Enquiry') ? 'selected' : '' ?>>General Enquiry</option>
                                            <option value="Investment Query" <?= (($_POST['subject'] ?? '') === 'Investment Query') ? 'selected' : '' ?>>Investment Query</option>
                                            <option value="Account & Folio" <?= (($_POST['subject'] ?? '') === 'Account & Folio') ? 'selected' : '' ?>>Account & Folio Issue</option>
                                            <option value="Complaint" <?= (($_POST['subject'] ?? '') === 'Complaint') ? 'selected' : '' ?>>Complaint</option>
                                            <option value="Others" <?= (($_POST['subject'] ?? '') === 'Others') ? 'selected' : '' ?>>Others</option>
                                        </select>
                                    </div>
                                    <div class="col-12 form-floating">
                                        <textarea style="height: 200px" class="form-control" id="message" name="message" rows="5" placeholder="Describe your query in detail..." required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                                        <label for="message" class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm fw-semibold">
                                            Send Message &rarr;
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info Column -->
                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-4">

                        <!-- Office Address -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="bg-secondary bg-opacity-10 rounded-3 p-3" style="font-size:1.5rem;">📍</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Office Address</h6>
                                        <p class="text-muted mb-0 small">5th Floor, Runner Group,<br>138/1 Tejgaon Industrial Area, Dhaka 1208</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-3" style="font-size:1.5rem;">📞</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Phone</h6>
                                        <p class="text-muted mb-0 small">
                                            <a href="tel:+88028810000" class="text-decoration-none">+880 2 8810000</a><br>
                                            <a href="tel:+8801700000000" class="text-decoration-none">+880 1706 634 377</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="bg-warning bg-opacity-10 rounded-3 p-3" style="font-size:1.5rem;">✉️</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-muted mb-0 small">
                                            <a href="mailto:info@hfassetmanagement.com" class="text-decoration-none">info@hfassetmanagement.com</a><br>
                                            <a href="mailto:investor@hfassetmanagement.com" class="text-decoration-none">consultancy@hfassetmanagement.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Office Hours -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="bg-info bg-opacity-10 rounded-3 p-3" style="font-size:1.5rem;">🕐</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Office Hours</h6>
                                        <p class="text-muted mb-0 small">
                                            Sunday – Thursday: <span style="float-right">9:00 AM – 5:00 PM</span><br>
                                            Friday – Saturday: <span style="float-right">Closed</span><br>
                                            <em class="text-danger">Public Holidays: Closed</em>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Map Placeholder -->
                        <div class="card border-0 shadow-sm overflow-hidden">
                            <div class="d-flex align-items-center justify-content-center bg-light" style="height:180px;">
                                <div class="text-center text-muted">
                                    <div style="font-size:2.5rem;">🗺️</div>
                                    <p class="mb-0 small mt-2">Google Maps integration<br><em>coming soon</em></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- End: About Us -->
    </section>
</div>