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
<div class="container-fluid servicesbannerSec102 firstSection">
    <div class="row">
        <h1>Operational<br>Support</h1>
    </div>
</div>
<!-- banner section ends here -->

<!--info sec-->
<section id="about-overview">
    <div class="custom-container">
        <div class="row g-4 ">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 overview-title">
                <h1 class="serh1">Upholding your Benchmarks through Operational Excellence</h1>

                <p class="service-p">Successfully navigating India and South Asia’s dynamic market requires more than just local
                    presence—it demands expertise. Gresham Global’s Operational Support ensures that every facet of your
                    institution’s operations is expertly managed. We take care of the complexities, allowing you to focus on
                    driving strategic growth and expanding your influence with confidence.
                </p>
                <!-- <a class="read-more" href="#">Know more</a> -->

            </div>
        </div>
</section>

<!-- container section -->
<div class="custom-container py-5">
    <div class="row g-4 ">
        <div class="col-md-6 col-12">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/talenticon.svg') }}" alt="icon"></div>
                <h5 class="heading1">Talent Acquisition</h5>
                <p>Building a successful team is essential to fulfilling your university’s goals. Gresham Global helps you
                    recruit top-tier professionals who align with your institution’s values and objectives. From identifying the
                    best-fit talent to streamlining the hiring process, we ensure you have a team equipped to lead and succeed in
                    South Asia’s competitive landscape.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/Page-1.svg') }}" alt="icon"></div>
                <h5 class="heading1">Real Estate Solutions</h5>
                <p>Selecting the right location is more than just a practical decision—it’s strategic. Gresham Global offers
                    comprehensive real estate solutions, from sourcing prime locations to negotiating lease agreements. We ensure
                    your university is optimally positioned for long-term success in South Asia, giving you the strategic edge to
                    thrive.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/Group 1000004101.svg') }}" alt="icon"></div>
                <h5 class="heading1">Print & Ancillary Services</h5>
                <p>Gresham Global manages the designing, production and distribution of print materials and branded merchandise,
                    ensuring your institution is consistently represented with precision and quality. To ensure timely delivery
                    and seamless execution, we leverage our strong local networks to produce materials within the region. From
                    brochures to custom resources, we make sure your brand stands out across India and South Asia. </p>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/travelicon.svg') }}" alt="icon"></div>
                <h5 class="heading1">Travel Services</h5>
                <p> Managing travel logistics can be complex, but with Gresham Global, it’s simple. We coordinate all aspects of
                    travel for your teams, ensuring smooth, efficient journeys for faculty, delegates, and visiting
                    representatives. Whether for meetings, events, or on-the-ground activities, we handle the details so you can
                    focus on what matters.</p>
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

            <div class="d-none">
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