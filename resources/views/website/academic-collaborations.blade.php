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
<div class="container-fluid servicesbannerSec98 firstSection">
  <div class="row">
    <h1>Academic <br>Collaborations</h1>
  </div>
</div>
<!-- banner section ends here -->
<!--info sec-->
<section id="about-overview">
  <div class="custom-container">
    <div class="row g-4">
      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 overview-title">
        <h2 class="serh1">Shaping Your Academic Partnerships</h2>

        <p class="service-p">Expanding your global footprint through Academic Partnerships and Transnational Education
          (TNE) initiatives requires a strategic vision and a deep understanding of both local and international
          academic landscapes. At Gresham Global, we empower institutions to form meaningful alliances that align with
          their academic strengths and long-term objectives, fostering impactful and sustainable growth.
        </p>
        <!-- <a class="read-more" href="#">Know more</a> -->
      </div>
    </div>
</section>

<!-- container section -->
<div class="custom-container py-5">
  <div class="row g-4 rwbox">
    <div class="col-md-6 col-xl-4 col-12">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/developementicon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Collaborative Programme Development</h5>
        <p>Expanding your global footprint through Academic Partnerships and Transnational Education (TNE) initiatives
          requires a strategic vision and a deep understanding of both local and international academic landscapes. At
          Gresham Global, we empower institutions to form meaningful alliances that align with their academic strengths
          and long-term objectives, fostering impactful and sustainable growth.

        </p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/Layer_11.svg') }}" alt="icon"></div>
        <h5 class="heading1">Institutional Mapping & Strategic Partnerships</h5>
        <p>Our approach begins with identifying partner institutions that complement your academic strengths and
          strategic goals. By fostering partnerships rooted in shared values and objectives, we ensure collaborations
          that deliver long-term value for all stakeholders. Our approach prioritises not just current success but also
          future sustainability. We specialise in aligning with like-for-like universities, ensuring partnerships that
          uphold academic standards, enhance institutional prestige, and offer mutual benefits.
        </p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/supportsvgicon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Regulatory Expertise & Support</h5>
        <p>Navigating the complexities of local and international regulatory frameworks is critical for successful TNE
          arrangements. Our experienced team provides clear, actionable guidance to ensure seamless compliance, enabling
          your partnerships to thrive without unnecessary obstacles.
        </p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/ac_vector3.svg') }}" alt="icon"></div>
        <h5 class="heading1">Quality Assurance & Excellence</h5>
        <p>We prioritise the highest standards in all academic collaborations, safeguarding institutional reputations
          and delivering programmes of exceptional quality. Ensuring consistency and credibility, we help build trust
          with students, partners, and the broader academic community.</p>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="custom-card light">
        <div class="icon1"><img src="{{ asset('website/assets/icons/intelleginceicon.svg') }}" alt="icon"></div>
        <h5 class="heading1">Global Benchmarking & Market Intelligence</h5>
        <p>Our in-depth market research provides a clear understanding of local student preferences, labour market
          demands, and emerging sectors, enabling data-driven decisions that position your institution as a global
          leader.
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


      <div class="d-none">
        <a href="/academic-collaborations" class="text-dark">
          <button type="button" class="btn Explore">
            <div class="d-flex justify-content-between">
              <div class="pr-2 fntsize">Academic <br>Collaborations</div>
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


<div class="w-100 d-flex align-items-center justify-content-center mt-4 mb-5 getintouchbtn-box ">
  <button class="btn btn-danger mb-5 px-4 fw-bold getintouchBtn gettouchbtn">
    Get In Touch
  </button>
</div>

@endsection