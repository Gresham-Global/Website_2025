<!-- -Footer -->
<footer class="footer bg-dark text-light">
    <video class="video-background" autoplay muted loop playsinline>
        <source src="{{ asset('website/assets/videos/footer.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="subContainer">
        <h4>Subscribe to our Newsletter</h4>
        <div class="subscribeBox">
            <input type="email" class="emailInput" placeholder="Enter your email" id="email_subscribe" required />
            <button>Subscribe Now</button>
        </div>
    </div>
    <div class="footerContainer">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 order-md-1 order-2">
                {{-- <div class="footer-logo">
                    <img src="{{ asset('website/assets/logo/logo-W.svg') }}" alt="Gresham Global Logo"
                        class="img-fluid mb-5" />
                </div> --}}
                <p class="mb-4">
                    We are an in-country representative specialist firm <br />
                    for <strong>higher education institutions</strong> looking to
                    expand <br />
                    their <strong>reach in South Asia.</strong>
                </p>
                <h6 class="mb-4">Contact Us</h6>
                <a target="_blank" href="tel:9773911384" class="contactlinks">
                    <p class="contactP d-flex ">
                        <img src="{{ asset('website/assets/icons/callIcon.svg') }}" alt="" /> +91 977 3911 384
                    </p>
                </a>
                <a target="_blank" href="mailto:contact@gresham.world" class="contactlinks">
                    <p class="contactP  ">
                        <img src="{{ asset('website/assets/icons/emailfooter.svg') }}"
                            alt="email">contact@gresham.world
                    </p>
                </a>
                <a target="_blank"
                    href="https://www.google.com/maps/dir//1206,+Signature+Business+Park,+Mono+Rail+Station,+Postal+Colony+Rd,+near+Chembur,+Postal+Colony,+Chembur,+Mumbai,+Maharashtra+400071/@19.0600367,72.8138403,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3be7c8ed89588c29:0xba83964829b13797!2m2!1d72.896242!2d19.060055?entry=ttu&g_ep=EgoyMDI1MDMyNC4wIKXMDSoASAFQAw%3D%3D"
                    class="contactlinks">
                    <p class="contactP ">

                        <img src="{{ asset('website/assets/icons/pin.png') }}" alt="" /> 1204/1206, Signature
                        Business Park, <br />
                        Chembur, Mumbai, Maharashtra, <br />
                        India 400071

                    </p>

                </a>

                <!-- Social Media and Badge -->
                <h6 class="mb-4 mt-4">Follow us on
                    <a href="https://www.linkedin.com/company/gresham-global/" target="_blank" class="text-light"
                        style="margin-left :1rem;"><img src="{{ asset('website/assets/icons/linkedinRound.svg') }}"
                            alt="" class="fIcon me-4" /></a>
                </h6>


                <!-- <a href="https://www.instagram.com/gresham.global" target="_blank" class="text-light"><img
                    src="{{ asset('website/assets/icons/instaRound.svg') }}" alt="" class="fIcon" /></a> -->
                {{-- <div class="mt-4">
                    <img src="{{ asset('website/assets/images/offer.webp') }}" alt="Great Place to Work"
                        class="img-fluid" />
                </div> --}}
                {{-- <div class="col-lg-3 col-sm-6 mb-4">
                </div> --}}
            </div>

            <div class="col-lg-2 col-sm-6 mb-4 order-md-2 order-3">
                <h6 class="mb-4">Quick Links</h6>
                <ul class="list-unstyled row">
                    <li class="col-6 col-md-12 col-lg-12"><a href="{{ url('') }}"
                            class="text-light {{ request()->is('/') ? 'ftactive' : '' }}">Home</a></li>
                    <li class="col-6 col-md-12 col-lg-12"><a href="{{ url('about') }}"
                            class="text-light {{ request()->is('about') ? 'ftactive' : '' }}">About Us</a></li>
                    <li class="col-6 col-md-12 col-lg-12"><a href="{{ url('approach') }}"
                            class="text-light {{ request()->is('approach') ? 'ftactive' : '' }}">Approach</a></li>

                    <li class="col-6 col-md-12 col-lg-12">
                        <a href="#" class="text-light" data-bs-toggle="dropdown">Services
                            <span class="material-symbols-outlined">
                                arrow_drop_down
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->is('research-assessment') ? 'ftactive' : '' }}"
                                    href="{{ url('research-assessment') }}">Research and Assessment</a></li>
                            <li><a class="dropdown-item {{ request()->is('incountry-representation') ? 'ftactive' : '' }}"
                                    href="{{ url('incountry-representation') }}">In-Country Representation</a></li>
                            <li><a class="dropdown-item {{ request()->is('academic-collaborations') ? 'ftactive' : '' }}"
                                    href="{{ url('academic-collaborations') }}">Academic Collaborations</a></li>
                            <li><a class="dropdown-item {{ request()->is('admission-compliance') ? 'ftactive' : '' }}"
                                    href="{{ url('admission-compliance') }}">Admissions and Compliance</a></li>
                            <li><a class="dropdown-item {{ request()->is('strategic-marketing') ? 'ftactive' : '' }}"
                                    href="{{ url('strategic-marketing') }}">Strategic Marketing</a></li>
                            <li><a class="dropdown-item {{ request()->is('operational-support') ? 'ftactive' : '' }}"
                                    href="{{ url('operational-support') }}">Operational Support</a></li>
                        </ul>
                    </li>
                    <li class="col-6 col-md-12 col-lg-12"><a href="{{ url('contact') }}"
                            class="text-light {{ request()->is('contact') ? 'ftactive' : '' }}">Contact Us</a></li>
                    <li class="col-6 col-md-12 col-lg-12"><a href="{{ url('media') }}"
                            class="text-light {{ request()->is('media') ? 'ftactive' : '' }}">Media</a></li>
                    <li class="col-6 col-md-12 col-lg-12"><a href="{{ url('events') }}"
                            class="text-light {{ request()->is('events') ? 'ftactive' : '' }}">Events</a></li>
                    <li class="col-6 col-md-12 col-lg-12"><a href="{{ url('careers') }}"
                            class="text-light {{ request()->is('careers') ? 'ftactive' : '' }}">Careers</a></li>
                </ul>

            </div>

            <!-- Contact Form -->
            <div class="col-lg-6 col-md-6 mb-4 order-md-3 order-1">
                <h6 class="mb-4">Get in touch</h6>
                <form class="footerForm" id="footerForm">
                    <div id="allerror" class="font-weight-bold text-danger custom-formset"></div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <input type="text" class="form-control" placeholder="Full Name" id="full_name" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <input type="email" class="form-control" placeholder="Email ID" id="email" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <input type="text" class="form-control" placeholder="Designation" id="designation" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <input type="text" class="form-control" placeholder="Organisation"
                                id="organisation" />
                        </div>
                        <div class="servivesBox col-md-12">
                            <input type="text" class="form-control" placeholder="Organisation" id="servicess" />
                        </div>
                        <div class="mb-3 col-md-12">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button"
                                    id="multiSelectDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Services
                                </button>
                                <ul class="dropdown-menu p-3 scrollAlign" aria-labelledby="multiSelectDropdown2">

                                    <li><input type="checkbox" class="form-check-input service-option2"
                                            value="Research & Assessment"> Research & Assessment</li>
                                    <li><input type="checkbox" class="form-check-input service-option2"
                                            value="In-Country Representation"> In-Country Representation</li>
                                    <li><input type="checkbox" class="form-check-input service-option2"
                                            value="Academic Collaborations"> Academic Collaborations</li>
                                    <li><input type="checkbox" class="form-check-input service-option2"
                                            value="Admissions Compliance"> Admissions Compliance</li>
                                    <li><input type="checkbox" class="form-check-input service-option2"
                                            value="Strategic Marketing"> Strategic Marketing</li>
                                    <li><input type="checkbox" class="form-check-input service-option2"
                                            value="Operational Support"> Operational Support</li>
                                    <li><input type="checkbox" class="form-check-input service-option"
                                            value="Others">
                                        Others</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Message" id="message"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="submitFooter" id="submit_footer">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bottom Section -->
    <div class="footer-bottom">
        <div class="fbContainer">
            <p>© 2025 Gresham Global. All rights reserved.</p>
            <a href="/privacy-policy" class="text-light">Privacy Policy</a>
        </div>
    </div>
</footer>



<div class="modal fade" id="contactModal" tabindex="1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Get In Touch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="modalForm">
                    <div id="allerror_modal" class="font-weight-bold text-danger custom-formset"></div>
                    <input type="text" class="form-control mb-3" placeholder="Full Name" id="full_name_modal">
                    <input type="email" class="form-control mb-3" placeholder="Email ID" id="email_modal">
                    <input type="text" class="form-control mb-3" placeholder="Designation"
                        id="designation_modal">
                    <input type="text" class="form-control mb-3" placeholder="Organisation"
                        id="organisation_modal">


                    <div class="servivesBox">
                        <input type="text" class="form-control" placeholder="Organisation"
                            id="servicess_modal" />
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="multiSelectDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Select Services
                        </button>
                        <ul class="dropdown-menu p-3 scrollAlign" aria-labelledby="multiSelectDropdown">
                            <li><input type="checkbox" class="form-check-input service-option"
                                    value="Research & Assessment"> Research & Assessment</li>
                            <li><input type="checkbox" class="form-check-input service-option"
                                    value="In-Country Representation"> In-Country Representation</li>
                            <li><input type="checkbox" class="form-check-input service-option"
                                    value="Academic Collaborations"> Academic Collaborations</li>
                            <li><input type="checkbox" class="form-check-input service-option"
                                    value="Admissions Compliance"> Admissions Compliance</li>
                            <li><input type="checkbox" class="form-check-input service-option"
                                    value="Strategic Marketing"> Strategic Marketing</li>
                            <li><input type="checkbox" class="form-check-input service-option"
                                    value="Operational Support"> Operational Support</li>
                            <li><input type="checkbox" class="form-check-input service-option" value="Others"> Others
                            </li>
                        </ul>
                    </div>


                    <textarea class="form-control mb-3 mt-3" rows="3" placeholder="Message" id="message_modal"></textarea>
                    <button type="submit" class="btn btn-dark" id="submit_modal">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>




{{-- <div class="modal fade popModal" id="popModal" tabindex="1" aria-labelledby="popModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <a href="https://gacc.gresham.world/" target="_blank">
                    <img src="{{ asset('/website/assets/images/popup.webp') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</div> --}}




<a href="https://gacc.gresham.world/" target="_blank" class="sticky-sideBtn">
    GACC 2025
</a>

<script>
    window.addEventListener('load', function() {
        // Check if current path is homepage
        if (window.location.pathname === '/' || window.location.pathname === '/index.html') {
            setTimeout(function() {
                var myModal = new bootstrap.Modal(document.getElementById('popModal'));
                myModal.show();
            }, 0);
        }
    });
</script>
