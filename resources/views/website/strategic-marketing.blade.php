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
<div class="container-fluid servicesbannerSec101 firstSection">
  <div class="row">
    <h1>Strategic <br>Marketing</h1>
  </div>
</div>
<!-- banner section ends here -->
<!--info sec-->
<section id="about-overview">
  <div class="custom-container">
    <div class="row g-4 ">
      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 overview-title">
        <h1 class="serh1">Ennobling the Stature of your University</h1>

        <p class="service-p">Expanding your university’s reach demands a strategy that resonates with the region’s
          distinct dynamics. We deliver tailored marketing solutions that increase visibility, build strong
          relationships, and drive long-term success across diverse markets.</p>
        <!-- <a class="read-more" href="#">Know more</a> -->

      </div>
    </div>
</section>

<!-- container section -->
<div class="custom-container py-5">
  <div class="row g-4 rwbox">
    <div class="col-md-6 col-xl-4 col-12">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/excellienceicon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Digital Marketing <br>Excellence</h5>
        <p>We utilise SEO, SEM, and performance marketing to boost visibility and deliver measurable outcomes. Our
          approach drives targeted traffic and ensures that every digital effort contributes to your institution’s
          success, maximising ROI.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/Group 1000004092.svg') }}" alt="icon"></div>
        <h5 class="heading1">Social Media &<br> Content Strategy
        </h5>
        <p>We craft engaging content across platforms such as Instagram, LinkedIn, and YouTube, including blogs, videos,
          and alumni stories. Our focus is on creating authentic content that builds trust, generates interest, and
          positions your institution as a leader in education.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/outreachicon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Offline Campaigns &<br>Outreach</h5>
        <p>We design and execute strategic offline campaigns—from educational fairs to roadshows and institutional
          partnerships. These initiatives create a tangible presence, amplifying your brand’s impact and making
          connections that matter in the broader market.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4 ">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/Group 1000004094.svg') }}" alt="icon"></div>
        <h5 class="heading1">Brand <br>Positioning</h5>
        <p>We position your brand by developing a compelling narrative, enhancing alumni engagement, and leveraging
          co-branding opportunities. Our strategies ensure that your institution is viewed as a credible and influential
          leader in the education sector.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/anaylsticon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Analytics &<br>Optimization</h5>
        <p>Through advanced tools like Google Analytics, we track and optimise campaigns based on real-time data, making
          informed adjustments to ensure alignment with your strategic objectives and sustained success.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/fi_4742190.svg') }}" alt="icon"></div>
        <h5 class="heading1">Localisation &<br>Geo-Targeting</h5>
        <p>Understanding local context is essential to connecting meaningfully. We tailor messaging to reflect cultural
          nuances and use geo-targeting to reach specific audiences at the right time and place. Our approach ensures
          your campaigns resonate with prospective students, wherever they are.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/communtyicon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Community & <br>Influencer Engagement</h5>
        <p>We connect your institution with local influencers, alumni ambassadors, and community leaders, creating
          impactful partnerships that enhance credibility and increase awareness. These connections foster long-term
          engagement and growth.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/fi_9670841.svg') }}" alt="icon"></div>
        <h5 class="heading1">Marketing Automation <br>& Retargeting</h5>
        <p>Our marketing automation streamlines lead nurturing, while retargeting ensures your institution stays top of
          mind throughout the student’s decision-making journey. We ensure that prospects remain engaged, keeping your
          university at the forefront of their considerations.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/eventsicon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Events</h5>
        <p>We organise tailored events—admission days, conversion events, and pre-departure sessions—to engage students,
          facilitate decision-making, and drive enrolments, ensuring your university remains top of mind.


        </p>
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

      <div class="d-none">
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