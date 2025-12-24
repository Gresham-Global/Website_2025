@extends('website.layout.master')
@section('content')

<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet"> -->
<style>
    /* .approach .custom-set {
            margin-top: 130px;
        } */

    .approach_about p {
        color: #555555;
        font-size: 24px;
        text-align: center;
    }

    .approach_about1 p {
        color: #555555;
        font-size: 15px;
    }

    .approach_about1 {
        background: #EEEEEE;
        padding-bottom: 30px;

    }

    .mt1 {
        margin-top: -2rem;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    .ml-2 {
        margin-left: 1.5rem;
    }

    .disp-m {
        display: none;
    }

    .disp-d {
        display: block;
    }

    .clr-r {
        color: #F04C50;
    }

    @media screen and (max-width:767px) {
        /* .approach .custom-set {
                margin-top: 7rem !important;
            } */

        .py-set {
            padding-top: 1rem !important;
        }

        .approach_about {
            padding-top: 1rem !important;
        }
    }

    @media screen and (max-width:1700px) {
        /* .approach .custom-set {
                margin-top: 8.5rem;
            } */
    }

    @media screen and (max-width:1024px) {
        .disp-m {
            display: block;
        }

        .disp-d {
            display: none;
        }
    }

    @media (min-width: 768px) {
        .d-md-block {
            display: flex !important;
            width: 100%;
        }
    }
</style>


<section id="" class="approach firstSection approachsection bg-approach-banner">
    <div class="customContainer firstContainer">
        <h1 class="titleH1">Approach</h1>
    </div>
</section>


<section class="approach_about py-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10 mt-5 text-center">
                <p style="font-size: 22px;  font-family: 'Poppins', sans-serif;">Expanding into India and South Asia’s dynamic and multifaceted market
                    requires a strategic framework that goes beyond generic solutions. We adopt a methodical, data-driven approach, working as an
                    extension of your institution to ensure measurable outcomes and sustainable impact. Our focus is on
                    aligning with your institutional goals while navigating the complexities of the region with
                    precision. <br>
                    <br>
                    At Gresham Global, our approach is rooted in precision, adaptability, and a commitment to delivering
                    measurable value. With a deep understanding of South Asia’s unique market characteristics and a
                    focus on strategic alignment, we provide institutions with the expertise and execution capabilities
                    needed to thrive in this competitive landscape.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="approach_about1">
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('website/assets/images/approach/approach_img.png') }}"
                class="w-100 d-none d-sm-none d-md-block d-lg-block" alt="">
            <img src="{{ asset('website/assets/images/apporoachcontent.png') }}" class="w-100 d-md-none d-lg-none" alt="">
        </div>
        <!-- <div class="disp-m pt-5 p-3">
                    <div class="row">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('website/assets/images/approach/1.svg') }}" class="img-fluid">
                            <h2 class="ml-2 clr-r">Identify</h2>
                        </div>
                        <div class="mb-4">

                            <p>Recognising that each institution is unique, we begin with in-depth consultations to
                                understand
                                your priorities, core competencies, and flagship programmes. By conducting a thorough needs
                                assessment, we ensure our strategies are precisely aligned with your objectives in South
                                Asia.
                            </p>
                        </div>


                        <div class="d-flex align-items-center mb-3">

                            <img src="{{ asset('website/assets/images/approach/2.svg') }}" class="img-fluid">
                            <h2 class="ml-2 clr-r">Research </h2>
                        </div>
                        <div class="mb-4">

                            <p>South Asia comprises a diverse and complex set of markets, each with its own cultural,
                                educational, and demographic dynamics. Our rigorous market analysis identifies
                                high-potential
                                regions and target demographics, ensuring that your initiatives are strategically focused
                                and
                                resource-efficient.
                            </p>
                        </div>




                        <div class="d-flex align-items-center mb-3">

                            <img src="{{ asset('website/assets/images/approach/3.svg') }}" class="img-fluid">
                            <h2 class="ml-2 clr-r">Plan</h2>
                        </div>
                        <div class="mb-4">

                            <p>Leveraging insights from our analysis, we develop a detailed, institution-specific strategy.
                                This
                                includes clearly defined objectives, actionable pathways, and resource allocation
                                frameworks,
                                all consolidated into a comprehensive, data-backed operational plan.
                            </p>
                        </div>




                        <div class="d-flex align-items-center mb-3">

                            <img src="{{ asset('website/assets/images/approach/4.svg') }}" class="img-fluid">
                            <h2 class="ml-2 clr-r">Implement </h2>
                        </div>
                        <div class="mb-4">

                            <p>Execution is where strategy translates into action. We manage all operational aspects,
                                including
                                participating in high-impact education fairs, forging partnerships with agents and
                                institutions,
                                conducting targeted outreach initiatives, and implementing marketing campaigns. Our goal is
                                to
                                deliver tangible outcomes while maintaining operational excellence.
                            </p>
                        </div>


                        <div class="d-flex align-items-center mb-3">

                            <img src="{{ asset('website/assets/images/approach/5.svg') }}" class="img-fluid">
                            <h2 class="ml-2 clr-r">Grow</h2>
                        </div>
                        <div class="mb-4">

                            <p>The final stage focuses on scalability and long-term impact. By continuously monitoring
                                performance metrics and refining strategies, we enhance your institution’s visibility,
                                strengthen brand equity, and ensure consistent results. Over time, we help position your
                                institution as a trusted and recognised leader in the South Asian education market.

                            </p>
                        </div>


                    </div>
                </div> -->


        <div class="w-100 d-flex align-items-center justify-content-center mt-4 mb-5 getintouchbtn-box">
            <button class="btn btn-danger mb-5 px-4 fw-bold getintouchBtn gettouchbtn">
                Get In Touch
            </button>
        </div>
    </div>
</section>



@endsection