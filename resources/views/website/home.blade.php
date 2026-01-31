@extends('website.layout.master')
@section('content')
<style>
    /* Custom Slick Arrow Buttons */
    .slick-prev,
    .slick-next {
        font-size: 40px;
        color: rgb(168, 35, 35);
        cursor: pointer;
        z-index: 100;
        margin-left: -1rem;
    }

    .slick-next {
        right: 0.7rem !important;
    }

    .slick-prev {
        left: 2 !important;
    }

    .slick-prev:hover,
    .slick-next:hover {
        color: rgb(184, 34, 34);
    }

    .slick-next:before,
    .slick-prev:before {
        display: none;
    }

    .slick-next {
        right: -1.3rem !important;
    }

    .slick-prev {
        left: -2.5rem;
    }

    .slick-arrow {
        opacity: 1;
        visibility: visible;
        transition: opacity 0.3s;
    }

    .slider:hover .slick-arrow {
        opacity: 1;
    }

    .news-card-title-in-mediaBox {
        overflow: hidden;
        max-height: 4.5em;
        line-height: 1.5em;
    }

    @supports (-webkit-line-clamp: 3) {
        .news-card-title-in-mediaBox {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            max-height: unset;
        }
    }
</style>

<!-- 1st Section -->
<section class="customSection firstSection homebann">
    <div class="videoBackground" id="videoBackground"></div>

    <div class="customContainer firstContainer home-banner-text">
        <h1>
            Your Global <br />
            <span>Gro<span style="letter-spacing: 5px;">wt</span>h Pa<span style="letter-spacing: 5px;">rt</span>ner</span>
        </h1>
        <p class="mt-4">
            We are an in-country representative specialist firm for<br>
            higher education institutions looking to expand their reach<br>
            in India and South Asia
        </p>
    </div>
</section>


<!-- sec 2 starts -->
<section class="sec2">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 d-lg-block d-md-none d-sm-none d-none sec2Left"><img
                    src="{{ asset('website/assets/images/abouthome.webp') }}" alt="" class="w-100" /></div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 sec2right">
                <h2>About Us</h2>
                <p>We deliver comprehensive solutions to ensure your university’s success, from establishing in-country
                    representation and driving strategic market development to executing on-the-ground initiatives and
                    streamlining admissions support. Acting as an integrated extension of your team, we manage local
                    operations with precision and care, underpinned by deep expertise and understanding of the South
                    Asia region. <br>
                    <br>
                    Our approach turns your international goals into measurable results, connecting you with a diverse
                    and talented student diaspora while helping establish a lasting presence in one of the world’s
                    fastest-growing education markets.

                </p>
            </div>
            <div class="d-xl-none d-lg-none col-md-none col-sm-block sec2Leftmob"><img
                    src="{{ asset('website/assets/images/abouthome.webp') }}" alt="" class="w-100" /></div>
        </div>
    </div>
</section>
<!-- sec 2 ends -->

<!-- sec 3 starts -->
<section class="sec3 d-desk">
    <div class="custom-container">
        <h2>Services</h2>
        <div class="row">

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="{{ url('research-assessment')}}">
                    <div class="flip-card">
                        <div class="front-card pic1">
                            <div class="row fCardMain">
                                <div class="col-md-8 col-8 frontcardLeft">
                                    <h3>Research &<br /> Assessment</h3>
                                </div>
                                <div class="col-md-4 col-4 frontcardRight"><img style="width: 60px; height: 60px;"
                                        src="{{ asset('website/assets/images/rotate.webp') }}" alt="" /></div>
                            </div>
                        </div>
                        <div class="back-card">
                            <h3>Research & Assessment</h3>
                            <ul>
                                <!-- <li>Research & Assessment</li> -->
                                <li>Market Analysis & Research</li>
                                <li>Go-To Market Strategy</li>
                                <li>Financial Compliance</li>
                                <li>Legal and Regulatory Guidance</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="{{ url('incountry-representation')}}">
                    <div class="flip-card">
                        <div class="front-card pic2">
                            <div class="row fCardMain">
                                <div class="col-md-8 col-8 frontcardLeft">
                                    <h3>In-Country<br /> Representation</h3>
                                </div>
                                <div class="col-md-4 col-4 frontcardRight"><img style="width: 60px; height: 60px;"
                                        src="{{ asset('website/assets/images/rotate.webp') }}" alt="" /></div>
                            </div>
                        </div>
                        <div class="back-card">
                            <h3>In-Country Representation</h3>
                            <ul>
                                <li>Student Engagement & Recruitment</li>
                                <li>Regional Office</li>
                                <li>Educational Fairs and Events</li>
                                <li>Strategic Alliances</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="{{ url('operational-support')}}">
                    <div class="flip-card">
                        <div class="front-card pic3">
                            <div class="row fCardMain">
                                <div class="col-md-8 col-8 frontcardLeft">
                                    <h3>Operational<br /> Support</h3>
                                </div>
                                <div class="col-md-4 col-4 frontcardRight"><img style="width: 60px; height: 60px;"
                                        src="{{ asset('website/assets/images/rotate.webp') }}" alt="" /></div>
                            </div>
                        </div>
                        <div class="back-card">
                            <h3>Operational Support</h3>
                            <ul>
                                <li>Talent Acquisition</li>
                                <li>Real Estate Solutions</li>
                                <li>Travel Services</li>
                                <li>Print and Ancillary Services</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="{{ url('academic-collaborations')}}">
                    <div class="flip-card">
                        <div class="front-card pic4">
                            <div class="row fCardMain">
                                <div class="col-md-8 col-8 frontcardLeft">
                                    <h3>Academic<br /> Collaboration</h3>
                                </div>
                                <div class="col-md-4 col-4 frontcardRight"><img style="width: 60px; height: 60px;"
                                        src="{{ asset('website/assets/images/rotate.webp') }}" alt="" /></div>
                            </div>
                        </div>
                        <div class="back-card">
                            <h3>Academic Collaboration</h3>
                            <ul>
                                <li>Collaborative Programme Development</li>
                                <li>Institutional Mapping and Matchmaking</li>
                                <li>Regulatory Guidance and Support</li>
                                <li>Quality Assurance</li>
                                <!-- <li>Global Benchmarking & </li>
                <li>Market Intelligence</li> -->
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="{{ url('strategic-marketing')}}">
                    <div class="flip-card">
                        <div class="front-card pic5">
                            <div class="row fCardMain">
                                <div class="col-md-8 col-8 frontcardLeft">
                                    <h3>Strategic<br /> Marketing</h3>
                                </div>
                                <div class="col-md-4 col-4 frontcardRight"><img style="width: 60px; height: 60px;"
                                        src="{{ asset('website/assets/images/rotate.webp') }}" alt="" /></div>
                            </div>
                        </div>
                        <div class="back-card">
                            <h3>Strategic Marketing</h3>
                            <ul>
                                <li>Digital Marketing
                                </li>
                                <li>Offline Campaigns and Outreach
                                </li>
                                <li>Localisation and Geo-Targeting
                                </li>
                                <li>Marketing Automation and Retargeting
                                </li>
                                <li>Events and more</li>
                                <!-- <li>Localisation and Geo-Targeting</li>
              <li>Community and Influencer Engagement</li>
              <li>Marketing Automation and Retargeting</li>
              <li>Events</li> -->
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="{{ url('admission-compliance')}}">
                    <div class="flip-card">
                        <div class="front-card pic6">
                            <div class="row fCardMain">
                                <div class="col-md-8 col-8 frontcardLeft">
                                    <h3>Admission <br>Compliance</h3>
                                </div>
                                <div class="col-md-4 col-4 frontcardRight"><img style="width: 60px; height: 60px;"
                                        src="{{ asset('website/assets/images/rotate.webp') }}" alt="" /></div>
                            </div>
                        </div>
                        <div class="back-card">
                            <h3>Admission Compliance</h3>
                            <ul>
                                <li>Application Processing</li>
                                <li>Document Verification</li>
                                <li>Guidance on Visa Compliance</li>
                                <li>Pre-CAS and Credibility Compliance</li>
                            </ul>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</section>


<section class="d-mob">
    <div class="custom-container flipcard_box">
        <div class="row">
            <div class="flip-card py-4">
                <h2 class="serviecsmob">Services</h2>
                <div class="servicescards">
                    <div class="serv_card servcard1">
                        <div class="serv_card-content">
                            <div class="serv_card-title">Research & Assessment</div>
                            <ul class="serv_card-list">
                                <li>Market Analysis & Research</li>
                                <li>Go-To Market Strategy</li>
                                <li>Financial Compliance</li>
                                <li>Legal and Regulatory Guidance</li>
                            </ul>
                        </div>
                    </div>

                    <div class="serv_card servcard2">
                        <div class="serv_card-content">
                            <div class="serv_card-title">In-Country Representation</div>
                            <ul class="serv_card-list">
                                <li>Student Engagement & Recruitment</li>
                                <li>Regional Offices</li>
                                <li>Educational Fairs and Events</li>
                                <li>Strategic Alliances</li>
                            </ul>
                        </div>
                    </div>

                    <div class="serv_card servcard3">
                        <div class="serv_card-content">
                            <div class="serv_card-title">Operational Support</div>
                            <ul class="serv_card-list">
                                <li>Talent Acquisition</li>
                                <li>Real Estate Solutions</li>
                                <li>Travel Services</li>
                                <li>Print and Advisory Services</li>
                            </ul>
                        </div>
                    </div>

                    <div class="serv_card servcard4">
                        <div class="serv_card-content">
                            <div class="serv_card-title">Academic Collaboration</div>
                            <ul class="serv_card-list">
                                <li>Collaborative Programme Development</li>
                                <li>International Mapping and Matching</li>
                                <li>Regulatory Guidance and Support</li>
                                <li>Quality Assurance and more</li>
                            </ul>
                        </div>
                    </div>

                    <div class="serv_card servcard5">
                        <div class="serv_card-content">
                            <div class="serv_card-title">Strategic Marketing</div>
                            <ul class="serv_card-list">
                                <li>Digital Marketing</li>
                                <li>Localization and Geo-Targeting</li>
                                <li>Online Campaigns and Outreach</li>
                                <li>Marketing Automation and Retargeting</li>
                            </ul>
                        </div>
                    </div>

                    <div class="serv_card servcard6">
                        <div class="serv_card-content">
                            <div class="serv_card-title">Admission & Compliance</div>
                            <ul class="serv_card-list">
                                <li>Application Processing</li>
                                <li>Document Verification</li>
                                <li>Guidance on Visa Compliance</li>
                                <li>Pre-CAS Credibility Interview</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sec 3 ends -->


<!-- sec 4 starts -->
<section class="sec4">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 sec4left">
                <h2>Why Choose Us? </h2>
                <p>We understand that every university is unique, and entering the dynamic South Asian market requires a
                    bespoke approach. Rather than applying generic strategies, we take the time to understand your
                    vision,
                    strengths, and objectives.<br /><br />
                    Our tailored solutions are built around your specific goals—whether it’s forging meaningful
                    partnerships,
                    creating bespoke marketing campaigns, elevating your institution’s profile, or driving strategic
                    recruitment. We work to ensure your university stands out in this diverse region, establishing a
                    strong,
                    sustainable presence with long-term impact.
                </p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 sec4Right"><img
                    src="{{ asset('website/assets/images/whychoose.webp') }}" alt="" /></div>

        </div>
    </div>
</section>
<!-- sec 4 ends -->

<!-- sec 5 starts -->
<section class="sec5">
    <div class="custom-container">
        <div class="row">
            <p class="h2"><span>Our Commitment,</span> Your Global Growth</p>
            <p>We prioritise understanding your institution’s unique landscape, ensuring our tailored strategies drive
                brand
                growth and cultivate regional success in India and South Asia.</p>
            <img src="{{ asset('website/assets/images/Group 1000004157.webp') }}" alt=""
                class="w-100 d-none d-sm-none d-md-block d-lg-block" />
            <img src="{{ asset('website/assets/images/Group 1000004057.svg') }}" alt="" class="w-100 d-md-none d-lg-none" />
        </div>
    </div>
</section>
<!-- sec 5 ends -->

<!-- sec 6 starts -->
<x-our-values />
<?php /* ?>
<section class="sec6">

    <div class="custom-container">
        <h2>Our Values</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 MainValueBox">
            <!-- box1 -->
            <div class="flex-fill ValueBox">
                <div class="flip-card1">
                    <div class="front-card1">
                        <div class="box1">
                            <img src="{{ asset('website/assets/images/ic1.svg') }}" alt="" />
                            <h4>Quality</h4>
                        </div>
                    </div>
                    <div class="back-card1">
                        <p>Ensuring excellence in every aspect of our work</p>
                    </div>
                </div>
            </div>
            <!-- box1 -->

            <!-- box1 -->
            <div class="flex-fill ValueBox">
                <div class="flip-card1">
                    <div class="front-card1">
                        <div class="box1">
                            <img src="{{ asset('website/assets/images/compliance.webp') }}" alt="" />
                            <h4>Compliance
                            </h4>
                        </div>
                    </div>
                    <div class="back-card1">
                        <p>Ensuring adherence to regulations, policies, and ethical standards
                        </p>
                    </div>
                </div>
            </div>
            <!-- box1 -->


            <!-- box1 -->
            <div class="flex-fill ValueBox">
                <div class="flip-card1">
                    <div class="front-card1">
                        <div class="box1">
                            <img src="{{ asset('website/assets/images/growth.webp') }}" alt="" />
                            <h4>Growth</h4>
                        </div>
                    </div>
                    <div class="back-card1">
                        <p>Expanding visibility, numbers, and impact across India and South Asia
                        </p>
                    </div>
                </div>
            </div>
            <!-- box1 -->

            <!-- box1 -->
            <div class="flex-fill ValueBox">
                <div class="flip-card1">
                    <div class="front-card1">
                        <div class="box1">
                            <img src="{{ asset('website/assets/images/commitment.webp') }}" alt="" />
                            <h4>Commitment</h4>
                        </div>
                    </div>
                    <div class="back-card1">
                        <p>Aligning with your goals to ensure success</p>
                    </div>
                </div>
            </div>
            <!-- box1 -->

            <!-- box1 -->
            <div class="flex-fill ValueBox">

                <div class="flip-card1">
                    <div class="front-card1">
                        <div class="box1">
                            <img src="{{ asset('website/assets/images/transparency.webp') }}" alt="" />
                            <h4>Transparency</h4>
                        </div>
                    </div>
                    <div class="back-card1">
                        <p>Maintaining clear communication, accountability, and strategic collaboration</p>
                    </div>
                </div>
            </div>
            <!-- box1 -->
        </div>
        <div class="container ourval_sec">
            <div class="ovalue_card">
                <div class="ovalue_icon">
                    <img src="{{ asset('website/assets/images/service/Quality.webp') }}" alt="Quality">
                </div>
                <div class="ovalue_text">
                    <h3>Quality</h3>
                    <p>Ensuring excellence in every aspect of our work</p>
                </div>
            </div>

            <div class="ovalue_card">
                <div class="ovalue_icon">
                    <img src="{{ asset('website/assets/images/service/Compliance.webp') }}" alt="Compliance">
                </div>
                <div class="ovalue_text">
                    <h3>Compliance</h3>
                    <p>Ensuring adherence to regulations, policies, and ethical standards</p>
                </div>
            </div>

            <div class="ovalue_card">
                <div class="ovalue_icon">
                    <img src="{{ asset('website/assets/images/service/Growth.webp') }}" alt="Growth">
                </div>
                <div class="ovalue_text">
                    <h3>Growth</h3>
                    <p>Expanding visibility, numbers, and impact across India and South Asia</p>
                </div>
            </div>

            <div class="ovalue_card">
                <div class="ovalue_icon">
                    <img src="{{ asset('website/assets/images/service/Commitment.webp') }}" alt="Commitment">
                </div>
                <div class="ovalue_text">
                    <h3>Commitment</h3>
                    <p>Aligning with your goals to ensure success</p>
                </div>
            </div>

            <div class="ovalue_card">
                <div class="ovalue_icon">
                    <img src="{{ asset('website/assets/images/service/Transparency.webp') }}" alt="Transparency">
                </div>
                <div class="ovalue_text">
                    <h3>Transparency</h3>
                    <p>Maintaining clear communication, accountability, and strategic collaboration</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php */ ?>
<!-- sec 6 ends -->

<!-- sec 7 starts -->
<section class="sec7">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 sec7Left">
                <h2>Articles & Resources</h2>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 sec7Right">
                <ul>
                    <!-- <a href="media"> -->
                    <li class="tabs active" id="hmtab1" data-tab="tab1">Media</li>
                    <li class="tabs" id="hmtab2" data-tab="tab2">News & Blogs</li>
                    </a>
                </ul>
            </div>
        </div>

        <div id="tab1" class="tab-content active">
            <!-- slider starts -->

            <div class="slider media hmmedia">
                @foreach ($media_for_slider as $media)
                <div>
                    @php

                    $images = is_array(json_decode($media->thumbnail_image))
                    ? json_decode($media->thumbnail_image)
                    : ($media->thumbnail_image ? [$media->thumbnail_image] : ['/storage/default-fallback.webp']);
                    @endphp
                    <div class="swiper imageSwiper">
                        <div class="swiper-wrapper">

                            @foreach ($images as $image)
                            <div class="swiper-slide">
                                <div class="home-news-card-img-wrapper">
                                    <a href="{{ $media->media_link }}" target="_blank">
                                        <img src="{{ asset($image) }}"
                                            alt="News Image"
                                            class="mediaText imgRadius">
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <!-- <a href="{{ $media->media_link }}" target="_blank" class="mediaText imgRadius">
                        <img src="{{ asset($media->thumbnail_image) }}" class="articalThamble" alt="" />
                    </a> -->
                    <div class="mediaBox">
                        <div class="row">
                            <div class="col-md-12 col-12 mediaboxB">
                                <img src="{{ asset($media->logo_image) }}" alt="icon" class="mediaLogo">
                                <a href="{{ $media->media_link }}" target="_blank" class="mediaText">
                                    <p>{{ \Illuminate\Support\Str::limit($media->title, 100) }}</p>
                                </a>
                            </div>
                            <div class="mt-2">
                                <a href="{{ $media->media_link }}" target="_blank" class="readmoreBtn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- slider ends -->
        </div>

    </div>

    <div id="tab2" class="tab-content">
        <!-- slider starts -->
        <div class="slider media hmnews custom-container">
            @foreach ($news_and_blogs_for_slider as $news_and_blog)
            <div> {{-- This div represents a single slide in your slider --}}
                {{-- Image with direct link --}}
                <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank" class="mediaText">
                    <img src="{{ asset($news_and_blog->thumbnail_image) }}" class="articalThamble"
                        alt="{{ $news_and_blog->title ?? 'News Image' }}" />
                </a>

                <div class="mediaBox">
                    <div class="row">
                        <div class="col-md-12 col-12 mediaboxB">

                            {{-- Title (similar to original card's h5, but placed within mediaboxB) --}}
                            <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank"
                                class="mediaText">
                                <!-- <p class="news-card-title-in-mediaBox">{{ \Illuminate\Support\Str::limit($news_and_blog->title, 150) }}</p> -->
                                <p class="news-card-title-in-mediaBox">{{ $news_and_blog->title }}</p>
                                {{-- Short Description (re-added from original card) --}}
                                <!-- <p class="news-card-text flex-grow-1 mt-2">
                                    {{ Str::limit($news_and_blog->short_description, 50, '...') }}
                                </p> -->
                            </a>


                        </div>
                        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                            {{-- Read More Button (retained) --}}
                            <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank"
                                class="readmoreBtn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- slider ends -->
    </div>


    </div>
</section>
<!-- sec 7 ends -->


<!-- sec 8 starts -->
<section class="sec8" style="margin-bottom: 100px;">
    <div class="container-fluid">
        {{-- <h5>Testimonials</h5> --}}
        <h2>What our partner universities have to say</h2>
        <!-- slider starts -->
        <div class="slider testimonials">
            <div class="TestiBox">
                <div class="row">
                    <div class="test_top_sec col-md-12 col-12">
                        <p class="textTexsti">Gresham Global is an invaluable partner in Cranfield University’s mission
                            to attract
                            top-tier
                            international students. We have worked with the team for more than eight years and during
                            that time
                            Gresham has built our presence in India, using their expertise in recruitment to enhance our
                            global
                            reach. We are grateful for their dedication and commitment to helping us cultivate a diverse
                            and dynamic
                            student body, paving the way for thousands of students to start their Cranfield University
                            journey.</p>
                        <p class="see-more-btn ">See More</p>
                    </div>
                    <div class="col-md-3 col-3 test_btm_sect"><img
                            src="{{ asset('website/assets/images/Group 1000004092.webp') }}" alt="" class="w-100" />
                    </div>
                    <div class="col-md-6 col-6">
                        <h4>Andrew Jones</h4>
                        <p class="test_per_desc">Director of Student Recruitment & Admissions,<br> Cranfield University,
                            UK</p>
                    </div>
                    <div class="col-md-3 col-3 test_btm_sect"><img
                            src="{{ asset('website/assets/images/cranfieldLogo.webp') }}" alt="Cranfield University"
                            class="w-100" /></div>
                </div>
            </div>
            <div class="TestiBox">
                <div class="row">
                    <div class="test_top_sec col-md-12 col-12">
                        <p class="textTexsti">At Leeds Arts University we really value the relationship with Gresham
                            Global. Gresham
                            Global provide
                            invaluable market intelligence, help shape our strategy and we are impressed time and time
                            again with the
                            dedication and commitment of the team. Gresham Global have helped us grow our visibility and
                            market
                            presence in India.</p>
                        <p class="see-more-btn ">See More</p>
                    </div>
                    <div class="col-md-3 col-3 test_btm_sect"><img
                            src="{{ asset('website/assets/images/Group 1000004093.webp') }}" alt="" class="w-100" />
                    </div>
                    <div class="col-md-6 col-6">
                        <h4>Jenny Oxley
                        </h4>
                        <p class="test_per_desc">Head of Internationalisation, <br>Leeds Arts University, UK
                        </p>
                    </div>
                    <div class="col-md-3 col-3 test_btm_sect"><img
                            src="{{ asset('website/assets/images/leedsLogo.webp') }}" alt="Leeds Arts University"
                            class="w-100" /></div>
                </div>
            </div>

            <div class="TestiBox">
                <div class="row">
                    <div class="test_top_sec col-md-12 col-12">
                        <p class="textTexsti">University College Birmingham (UCB) have had a successful partnership with
                            Gresham
                            Global for many years.
                            They have an excellent understanding of the Indian student recruitment market and always
                            follow a
                            professional and methodical approach that balances quality and quantity. Their commitment to
                            the
                            diversification of recruitment channels and the overall alignment to the UCB’s international
                            strategy has
                            been instrumental in securing a sustainable growth for the university in the market. Our
                            dedicated team at
                            Gresham Global are an integral part of our international operations and they have our full
                            trust and
                            support to further strengthen our market position in India.</p>
                        <p class="see-more-btn ">See More</p>
                    </div>
                    <div class="col-md-3 col-3 test_btm_sect"><img
                            src="{{ asset('website/assets/images/Group 1000004094.webp') }}" alt="" class="w-100" />
                    </div>
                    <div class="col-md-6 col-6">
                        <h4>Luke Huo
                        </h4>
                        <p class="test_per_desc">Director of International, <br>University College Birmingham, UK</p>
                    </div>
                    <div class="col-md-3 col-3 test_btm_sect"><img
                            src="{{ asset('website/assets/images/birminghamLogo.webp') }}"
                            alt="University College Birmingham" class="w-100" /></div>
                </div>
            </div>



            <div class="TestiBox">
                <div class="row">
                    <div class="test_top_sec col-md-12 col-12">
                        <p class="textTexsti">Our collaboration with Gresham has significantly increased EHL’s
                            visibility among
                            Indian students,
                            strengthening our position as a top choice for hospitality and business education. Their
                            focused
                            recruitment efforts and understanding of the Indian market have highlighted the unique
                            advantages of an
                            EHL education. This has helped more Indian students discover the exceptional opportunities
                            we offer,
                            further enhancing our reputation and attracting talented individuals seeking to excel in
                            hospitality and
                            business.
                        </p>
                        <p class="see-more-btn ">See More</p>
                    </div>
                    <div class="col-md-3 col-3"><img src="{{ asset('website/assets/images/Group 1000004095.webp') }}"
                            alt="" class="w-100" />
                    </div>
                    <div class="col-md-6 col-6">
                        <h4>Arnaud Jonquet
                        </h4>
                        <p class="test_per_desc">Sales Manager, <br>EHL,Switzerland</p>
                    </div>
                    <div class="col-md-3 col-3"><img src="{{ asset('website/assets/images/EHLlogo.webp') }}"
                            alt="EHL,Switzerland" class="w-100" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider ends -->
    </div>
</section>

<!-- sec 8 ends -->

<!-- sec 9 starts -->
<!-- <section class="sec9">
        <div class="custom-container">
        <h2>Our Videos</h2>

        <div class="slider video">
          <div class="mainvidBox">
          <img src="{{ asset('website/assets/images/vid1.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-4 col-4 videoB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>

          </div>
          <div class="mainvidBox">
          <img src="{{ asset('website/assets/images/vid2.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-4 col-4 videoB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>
          <div class="mainvidBox">
          <img src="{{ asset('website/assets/images/vid3.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-4 col-4 videoB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>
          <div class="mainvidBox">
          <img src="{{ asset('website/assets/images/vid4.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-4 col-4 videoB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>
          <div class="mainvidBox">
          <img src="{{ asset('website/assets/images/vid1.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-4 col-4 videoB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>


        </div>
        </div>
        </section> -->
<!-- sec 9 ends -->

<!-- sec 10 starts -->
<!-- <section class="sec10">
        <div class="custom-container">
        <h2>Research & Publication</h2>
        <div class="slider Research">
          <div>
          <img src="{{ asset('website/assets/images/1.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-6 col-6 researchboxL">4 Min Read </div>
          <div class="col-md-6 col-6 researchboxR">Sunday, 24 June 2024</div>
          <div class="col-md-12 col-12 researchboxB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>

          </div>
          <div>
          <img src="{{ asset('website/assets/images/2.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-6 col-6 researchboxL">4 Min Read </div>
          <div class="col-md-6 col-6 researchboxR">Sunday, 24 June 2024</div>
          <div class="col-md-12 col-12 researchboxB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>
          <div>
          <img src="{{ asset('website/assets/images/3.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-6 col-6 researchboxL">4 Min Read </div>
          <div class="col-md-6 col-6 researchboxR">Sunday, 24 June 2024</div>
          <div class="col-md-12 col-12 researchboxB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>
          <div>
          <img src="{{ asset('website/assets/images/4.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-6 col-6 researchboxL">4 Min Read </div>
          <div class="col-md-6 col-6 researchboxR">Sunday, 24 June 2024</div>
          <div class="col-md-12 col-12 researchboxB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>
          <div>
          <img src="{{ asset('website/assets/images/1.webp') }}" class="w-100" />
          <div class="row">
          <div class="col-md-6 col-6 researchboxL">4 Min Read </div>
          <div class="col-md-6 col-6 researchboxR">Sunday, 24 June 2024</div>
          <div class="col-md-12 col-12 researchboxB">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting...</p>
          </div>
          </div>
          </div>


        </div>
        </div>
        </section> -->
<!-- sec 10 ends -->

<script>
    // Function to load video based on screen size
    function loadVideo() {
        const videoContainer = document.getElementById('videoBackground');
        const isMobile = window.innerWidth < 767;

        videoContainer.innerHTML = '';

        const video = document.createElement('video');
        video.autoplay = true;
        video.muted = true;
        video.loop = true;
        video.playsInline = true;

        if (isMobile) {
            video.src = "{{ asset('website/assets/videos/Banner-Video-Mobile.mp4') }}";
        } else {
            video.src = "{{ asset('website/assets/videos/hero-banner.mp4') }}";
        }

        videoContainer.appendChild(video);
    }

    loadVideo();

    window.addEventListener('resize', function() {
        loadVideo();
    });
    $(document).ready(function() {

        function initializeSwipers() {
            document.querySelectorAll(".imageSwiper").forEach((el) => {
                if (el.swiper) {
                    el.swiper.destroy(true, true); // destroy previous instance
                }

                new Swiper(el, {
                    slidesPerView: 'auto', // allow fixed width slides
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: el.querySelector(".swiper-pagination"),
                        clickable: true,
                    },
                    spaceBetween: 10, // optional spacing between slides
                });
            });
        }

        // Call on page load and after AJAX load
        initializeSwipers();
    })
</script>


@endsection