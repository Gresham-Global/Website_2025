@extends('website.layout.master')
@section('css_files')
<link rel="stylesheet" href="{{ asset('website/assets/css/inside.css') }}">
@endsection
@section('content')
<style>
    @media screen and (max-width:1700px) and (min-width:1100px) {
        .fntsize {
            /* font-size: 1rem; */
            font-size: 20px;
            text-align: start;
        }

        .Explore {
            width: 15%;
            min-width: 200px;
        }
    }
</style>

<!-- banner section starts here -->
<div class="container-fluid in_country firstSection">
    <div class="row">
        <h1>In-Country <br>Representation</h1>
    </div>
</div>


<!-- banner section ends here -->

<!--info sec-->
<section id="about-overview">
    <div class="custom-container">
        <div class="row g-4">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 overview-title">
                <h2 class="serh1">Your Global Strategy, Supported Locally</h2>

                <p class="service-p">
                    A dedicated regional office is pivotal for expanding your university's presence in India and South Asia. Our
                    In-Country Representation (ICR) service provides a professional extension of your international office,
                    driving regional operations and recruitment activities. Leveraging local expertise and market insights, we
                    position your institution effectively, foster lasting partnerships, and deliver measurable outcomes to achieve
                    your international recruitment goals efficiently.
                </p>
                <!-- <a class="read-more" href="#">Know more</a> -->

            </div>
        </div>
</section>

<!-- container section -->
<div class="custom-container py-5">
    <div class="row g-4">
        <div class="col-md-6 col-12">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/regionalofficeicon.svg') }}" alt="icon"></div>
                <h5 class="heading1">Regional Office</h5>
                <p>A dedicated, professional regional office is essential for establishing a seamless presence in South Asia.
                    The in-country representatives of your university team at Gresham Global oversee everything from student
                    enquiries to daily operations, ensuring your university’s engagement remains consistent, approachable, and
                    impactful across the region. We act as an extension of your international office, providing a strong
                    foundation for sustained growth and effective recruitment.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/Layer_1.svg') }}" alt="icon"></div>
                <h5 class="heading1">Student Engagement & Recruitment</h5>
                <p>Our tailored outreach strategies are designed to build meaningful connections with prospective students. From
                    innovative digital campaigns to hands-on activities, we create dynamic recruitment initiatives that foster
                    engagement and drive enrolment. By utilising a range of channels, we ensure your university’s presence
                    resonates with the right audiences at the right time.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/service2icon4.svg') }}" alt="icon"></div>
                <h5 class="heading1">Strategic Collaborations</h5>
                <p>Forming strategic partnerships with schools, counsellors, and key industry players is critical for expanding
                    your university’s influence. We help you identify and cultivate meaningful collaborations that align with your
                    institutional goals, opening doors to new networks, enhancing your reputation, and ensuring long-term growth
                    and success in South Asia.
                    <!-- <br>
      With Gresham Global’s In-Country Representation, your university gains more than just visibility—we create the
      connections, momentum, and lasting relationships that drive sustainable expansion and success in South Asia. -->
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/educationaleficon.svg') }}" alt="icon"></div>
                <h5 class="heading1">Educational Events & Fairs</h5>
                <p>Participating in key educational events is an essential strategy for expanding your university’s visibility
                    in South Asia. Gresham Global orchestrates every detail of your involvement, from planning to execution,
                    ensuring a high-impact presence that attracts prospective students, parents, and key stakeholders. We leverage
                    these events to create lasting impressions and generate tangible engagement, advancing your recruitment
                    objectives.</p>
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

            <div class="d-none">
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

            <div class="">
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