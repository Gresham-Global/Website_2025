@extends('website.layout.master')
@section('css_files')
<link rel="stylesheet" href="{{ asset('website/assets/css/inside.css') }}">
@endsection
@section('content')
<style>
    @media screen and (max-width:1700px) and (min-width:1100px) {
        .fntsize {
            font-size: 1rem;
            text-align: start;
        }

        .Explore {
            width: 15%;
            min-width: 200px;
        }
    }
</style>
<!-- banner section starts here -->
<div class="container-fluid servicesbannerSec100 firstSection">
    <div class="row">
        <h1>Admissions and <br>Compliance</h1>
    </div>
</div>

<!-- banner section ends here -->
<!--info sec-->
<section id="about-overview">
    <div class="custom-container">
        <div class="row g-4 ">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 overview-title">
                <h1 class="serh1">Upholding Your University’s Admissions Standards</h1>

                <p class="service-p">Managing admissions and ensuring compliance is pivotal to a successful
                    international student recruitment strategy. At Gresham Global, we simplify these complex
                    processes, safeguarding your institution’s credibility while delivering a seamless experience
                    for students and stakeholders.
                </p>
                <!-- <a class="read-more" href="#">Know more</a> -->

            </div>
        </div>
</section>

<!-- container section -->
<div class="custom-container py-5">
    <div class="row g-4 rwbox">
        <div class="col-md-6 col-12">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/processingicon.svg') }}" alt="icon"></div>
                <h5 class="heading1">Application Processing</h5>
                <p>We optimise your admissions workflow, from application submission to enrolment, ensuring accuracy
                    and efficiency at every stage. This reduces administrative burdens and enhances the applicant
                    experience.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/fi_48136282.svg') }}" alt="icon"></div>
                <h5 class="heading1">Document Verification</h5>
                <p>Our meticulous document verification process ensures all student records meet institutional and
                    regulatory requirements, paving the way for a smooth and compliant admissions journey.</p>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/fi_32226374.svg') }}" alt="icon"></div>
                <h5 class="heading1">Pre-CAS & Credibility Interviews</h5>
                <p>We organise and conduct Pre-CAS and credibility interviews to evaluate students’ readiness and
                    genuine intentions. These assessments align with institutional standards and visa authority
                    expectations, ensuring reliable enrolments.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/visaicon.svg') }}" alt="icon"></div>
                <h5 class="heading1">Guidance on Visa Compliance</h5>
                <p>We provide students with clear, up-to-date visa guidance, enabling them to navigate application
                    requirements and adhere to the latest regulations. This ensures a hassle-free process and
                    compliance with visa authorities.</p>
            </div>
        </div>


    </div>
</div>

<section id="tab-function">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 overview-title">
        <h2>Explore our other services</h2>
    </div>
    <div class="custom-container">
        <div class="d-flex flex-wrap justify-content-center">

            <!-- <button type="button" class="btn Explore">
      <div class="d-flex justify-content-between w-100">
      <div class="pr-2 fntsize">
        Research &<br> Assessment
      </div>
      <img class="icon11 default-icon" src="{{ asset('website/assets/icons/right-up (1) 1.svg') }}" alt="rightup">
      <a href="/research-assessment"> <img class="icon hover-icon"
        src="{{ asset('website/assets/icons/whiterightup.svg') }}" alt="transform"></a>
      </div>
      </button> -->
            <div class="">
                <a href="/research-assessment" class="text-dark">
                    <button type="button" class="btn Explore">
                        <div class="d-flex justify-content-between">
                            <div class="pr-2 fntsize">Research & <br>Assessment</div>
                            <div class="">
                                <img class="icon11 default-icon"
                                    src="{{ asset('website/assets/icons/right-up (1) 1.svg') }}" alt="rightup">
                                <a href="/incountry-representation">
                                    <img class="icon hover-icon"
                                        src="{{ asset('website/assets/icons/whiterightup.svg') }}" alt="transform">
                                </a>
                            </div>
                        </div>
                    </button>
                </a>
            </div>

            <div class="">
                <a href="/incountry-representation" class="text-dark">
                    <button type="button" class="btn Explore">
                        <div class="d-flex justify-content-between">
                            <div class="pr-2 fntsize">In-Country<br>Representation
                            </div>
                            <div class="">
                                <img class="icon11 default-icon"
                                    src="{{ asset('website/assets/icons/right-up (1) 1.svg') }}" alt="rightup">
                                <a href="/incountry-representation">
                                    <img class="icon hover-icon"
                                        src="{{ asset('website/assets/icons/whiterightup.svg') }}" alt="transform">
                                </a>
                            </div>
                        </div>
                    </button>
                </a>
            </div>

            <div class="">
                <a href="/operational-support" class="text-dark">
                    <button type="button" class="btn Explore">
                        <div class="d-flex justify-content-between">
                            <div class="pr-2 fntsize">Operational <br>Support
                            </div>
                            <div class="">
                                <img class="icon11 default-icon"
                                    src="{{ asset('website/assets/icons/right-up (1) 1.svg') }}" alt="rightup">
                                <a href="/operational-support">
                                    <img class="icon hover-icon"
                                        src="{{ asset('website/assets/icons/whiterightup.svg') }}" alt="transform">
                                </a>
                            </div>
                        </div>
                    </button>
                </a>
            </div>


            <div class="">
                <a href="/academic-collaborations" class="text-dark">
                    <button type="button" class="btn Explore">
                        <div class="d-flex justify-content-between">
                            <div class="pr-2 fntsize">Academic <br>Collaborations
                            </div>
                            <div class="">
                                <img class="icon11 default-icon"
                                    src="{{ asset('website/assets/icons/right-up (1) 1.svg') }}" alt="rightup">
                                <a href="/academic-collaborations">
                                    <img class="icon hover-icon"
                                        src="{{ asset('website/assets/icons/whiterightup.svg') }}" alt="transform">
                                </a>
                            </div>
                        </div>
                    </button>
                </a>
            </div>

            <div class="d-none">
                <a href="/admission-compliance" class="text-dark">
                    <button type="button" class="btn Explore">
                        <div class="d-flex justify-content-between">
                            <div class="pr-2 fntsize">Admission & <br>Compliance
                            </div>
                            <div class="">
                                <img class="icon11 default-icon"
                                    src="{{ asset('website/assets/icons/right-up (1) 1.svg') }}" alt="rightup">
                                <a href="/admission-compliance">
                                    <img class="icon hover-icon"
                                        src="{{ asset('website/assets/icons/whiterightup.svg') }}" alt="transform">
                                </a>
                            </div>
                        </div>
                    </button>
                </a>
            </div>

            <div class="">
                <a href="/strategic-marketing" class="text-dark">
                    <button type="button" class="btn Explore">
                        <div class="d-flex justify-content-between">
                            <div class="pr-2 fntsize">Strategic <br> Marketing
                            </div>
                            <div class="">
                                <img class="icon11 default-icon"
                                    src="{{ asset('website/assets/icons/right-up (1) 1.svg') }}" alt="rightup">
                                <a href="/strategic-marketing">
                                    <img class="icon hover-icon"
                                        src="{{ asset('website/assets/icons/whiterightup.svg') }}" alt="transform">
                                </a>
                            </div>
                        </div>
                    </button>
                </a>
            </div>




        </div>
    </div>
</section>


<div class="w-100 d-flex align-items-center justify-content-center mt-4 mb-5 getintouchbtn-box">
    <button class="btn btn-danger mb-5 px-4 fw-bold getintouchBtn gettouchbtn">
        Get In Touch
    </button>
</div>

@endsection