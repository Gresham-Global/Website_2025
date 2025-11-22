@extends('website.layout.master')
@section('content')

<style>
    /* Contact Form */
    .contact-form {
        background: #1e1e1e;
        color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .contact-form .form-control,
    .contact-form .form-select {
        background: #333;
        color: #fff !important;
        ;
        border: none;
    }

    .contact-form .form-control::placeholder {
        color: #bbb;
    }

    .contact-form .btn {
        background: #fff;
        color: #000;
        font-weight: bold;
    }

    .contact-form .btn:hover {
        background: #f1f1f1;
    }

    .contact-form .select2-container--default .select2-selection--multiple {
        background-color: #333 !important;
        border: none;
        min-height: 36px !important;
    }

    .contact-form .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: none !important;
        outline: 0;
    }
</style>
<!-- banner section starts here -->
<div class="container-fluid servicesbannerSec1 firstSection">
    <div class="row">
        <h1>Contact Us</h1>
    </div>
</div>
<!-- banner section ends here -->

<section class="customSection mb-5">
    <div class="customContainer mediaCon">
        <!-- <h2 class="text-center mb-5">Contact Us</h2> -->

        <div class="row g-4 align-items-stretch">
            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="contact-card p-4 h-100 d-flex flex-column">
                    <h3 class="mb-3 fw-bold">Gresham Global</h3>
                    <div class="contact-detail d-flex gap-2 mb-2">
                        <img src="{{ asset('website/assets/images/Group 1000004045.png') }}" alt="Location Icon"
                            style="width:80px !important;
                                height:80px!important">
                        <a target="_blank" href="https://www.google.com/maps/dir//1206,+Signature+Business+Park,+Mono+Rail+Station,+Postal+Colony+Rd,+near+Chembur,+Postal+Colony,+Chembur,+Mumbai,+Maharashtra+400071/@19.0600367,72.8138403,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3be7c8ed89588c29:0xba83964829b13797!2m2!1d72.896242!2d19.060055?entry=ttu&g_ep=EgoyMDI1MDMyNC4wIKXMDSoASAFQAw%3D%3D">

                            <span class="contact-text dark">808, The Epicentre Wadhwa, Chembur, Mumbai, Maharashtra, India 400088</span>
                        </a>
                    </div>
                    <div class="contact-detail d-flex gap-2 mb-2">
                        <img src="{{ asset('website/assets/icons/icon2.svg') }}" alt="Phone Icon"
                            style="width:80px !important;    ">
                        <a target="_blank" href="tel:9773911384">
                            <span class="contact-text dark" style=" line-height: 5rem;">+91 9773911384</span>
                        </a>
                    </div>
                    <div class="contact-detail d-flex">
                        <img src="{{ asset('website/assets/icons/icon3.svg') }}" alt="Email Icon"
                            style="width:80px !important;     ">
                        <a target="_blank" href="mailto:contact@gresham.world">
                            <span class="contact-text dark " style=" line-height: 5rem;">contact@gresham.world</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="col-lg-4">
                <div class="map-container h-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1629.3365424887747!2d72.89537320482417!3d19.060371741411533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8ed89588c29%3A0xba83964829b13797!2sGresham%20Global!5e0!3m2!1sen!2sin!4v1739370786449!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0; border-radius: 15px; min-height: 350px;"
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-4">
                <div class="contact-form p-4 h-100 d-flex flex-column">
                    <h4 class="mb-3">Enquire Now</h4>
                    <form class="mt-auto contactform1" id="contactform1">
                        <div id="allerror_contact" class="font-weight-bold text-danger custom-formset"></div>
                        <input type="text" class="form-control mb-3" placeholder="Full Name" id="full_name_contact">
                        <input type="email" class="form-control mb-3" placeholder="Email ID" id="email_contact">
                        <input type="text" class="form-control mb-3" placeholder="Designation" id="designation_contact">
                        <input type="text" class="form-control mb-3" placeholder="Organisation"
                            id="organisation_contact">

                        <div class="servivesBox">
                            <input type="text" class="form-control" placeholder="Organisation" id="servicess_contact" />
                        </div>

                        <div class="dropdown contactform">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="multiSelectDropdown3"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Select Services
                            </button>
                            <ul class="dropdown-menu p-3" aria-labelledby="multiSelectDropdown3">
                                <li><input type="checkbox" class="form-check-input service-option3"
                                        value="Research & Assessment"> Research & Assessment</li>
                                <li><input type="checkbox" class="form-check-input service-option3"
                                        value="In-Country Representation"> In-Country Representation</li>
                                <li><input type="checkbox" class="form-check-input service-option3"
                                        value="Academic Collaborations"> Academic Collaborations</li>
                                <li><input type="checkbox" class="form-check-input service-option3"
                                        value="Admissions Compliance"> Admissions Compliance</li>
                                <li><input type="checkbox" class="form-check-input service-option3"
                                        value="Strategic Marketing"> Strategic Marketing</li>
                                <li><input type="checkbox" class="form-check-input service-option3"
                                        value="Operational Support"> Operational Support</li>
                            </ul>
                        </div>


                        <textarea class="form-control mb-3 mt-3" rows="3" placeholder="Message"
                            id="message_contact"></textarea>
                        <button type="submit" class="btn btn-dark" id="submit_contact">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection