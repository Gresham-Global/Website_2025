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
<div class="container-fluid servicesbannerSec3 firstSection">
    <div class="row">
        <h1>Research and<br> Assessment</h1>
    </div>
</div>
<!-- banner section ends here -->
<!--info sec-->
<section id="about-overview">
    <div class="custom-container">
        <div class="row g-4">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 overview-title">
                <h1 class="serh1">Empowering your University’s Future, Today</h1>

                <p class="service-p">India and South Asia's vast and diverse landscape presents immense opportunities
                    for
                    international universities seeking to expand their footprint. We offer tailored research and
                    assessment
                    solutions designed to ensure your institution’s growth is both impactful and long-term.
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
                <div class="icon1"><img src="{{ asset('website/assets/icons/markeiconra.svg') }}" alt="icon"></div>
                <h5 class="heading1">Market Analysis & Research</h5>
                <p>Understanding the intricacies of the South Asian education market requires more than surface-level
                    insights. Our in-depth, data-driven research uncovers critical trends, student preferences, and
                    emerging
                    opportunities, providing a comprehensive view of the market’s potential and challenges. By
                    conducting
                    competitive benchmarking, we highlight your institution’s positioning against key players, equipping
                    you
                    with actionable insights to navigate this dynamic region effectively.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/fi_9670967.svg') }}" alt="icon"></div>
                <h5 class="heading1">Go-To-Market Strategy</h5>
                <p>Strategically establish your institution’s presence in South Asia with a bespoke roadmap. We help you
                    navigate the region’s geographic and cultural diversity, pinpoint high-potential markets, and
                    identify ideal
                    partners. This approach positions your university for long-term success and impactful engagement.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/fi_3207533.svg') }}" alt="icon"></div>
                <h5 class="heading1">Legal & Regulatory Guidance</h5>
                <p>Operating within South Asia’s complex legal and regulatory environments requires expert support. Our
                    experienced team provides comprehensive guidance on local regulations, contracts, and institutional
                    policies, ensuring your operations are fully aligned with regional requirements. By simplifying the
                    intricacies of compliance and mitigating risks, we empower your institution to function confidently
                    and
                    effectively within the framework of local laws</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-card light">
                <div class="icon1"><img src="{{ asset('website/assets/icons/financialcomicon.svg') }}" alt="icon"></div>
                <h5 class="heading1">Financial Compliance</h5>
                <p>Navigating South Asia's complex regulatory landscape requires meticulous financial compliance. Our
                    expertise ensures your institution adheres to local financial regulations while upholding global
                    standards
                    of transparency and efficiency.</p>
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

<!-- contact us button -->

<div class="w-100 d-flex align-items-center justify-content-center mt-4 mb-5 getintouchbtn-box">
    <button class="btn btn-danger mb-5 px-4 fw-bold getintouchBtn gettouchbtn">
        Get In Touch
    </button>
</div>

@endsection