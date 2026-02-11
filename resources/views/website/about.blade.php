@extends('website.layout.master')
@section('content')
<style>
    .sec7 {
        padding: 60px 0px 80px 0;
    }

    .getintouchBtn {
        font-family: "Proxima Nova";
    }

    @media screen and (max-width:767px) {
        .position-relative {
            margin-bottom: 1rem;
        }
    }

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

    @media screen and (max-width: 990px) {
        .sec7 {
            padding: 60px 0px 120px 0;
        }
    }
</style>
<!-- 1st Section -->
<section id="" class="about-banner-background  firstSection customSection">
    <div class="customContainer firstContainer ">
        <h1 class="titleH1">About Us</h1>
    </div>
    <!-- <img src="{{ asset('website/assets/images/about-bannerimg.webp') }}" class=" img-fluid forMobBanne w-100" -->
    <!-- alt="Bootstrap Themes" /> -->
    <img src="{{ asset('website/assets/images/about-bannerimg.webp') }}" class="w-100 forMobBanner d-none d-md-block" alt="about us  " />
    <img src="{{ asset('website/assets/images/aboutmobile.webp') }}" class="w-100 aboutmobile forMobBanner d-block d-md-none" alt="about us " />
</section>

<!-- Below about us -->
<section id="growth-partner" class="customSection">
    <div class="customContainer aboutCon">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-5">
                <div class="imgHolder">
                    <img src="{{ asset('website/assets/images/aboutusauimg.webp') }}" alt="Global Growth Partner"
                        class="" style="flex: 0 0 30%;" />
                </div>
                <br>
                <br>
            </div>
            <!-- Text Column -->
            <div class="col-md-6 col-lg-7">
                <!-- <h2 class="display-5 fw-bold text80">Your Global Growth Partner</h2> -->
                <p class="mt-4 paragraph mt4Is">
                    With a focus on international education, we empower international
                    universities to thrive and expand in the rapidly evolving Indian
                    and South Asian markets. Our comprehensive suite of services is
                    designed to elevate your institution’s presence, attract top-tier
                    students, and drive significant recruitment growth.
                </p>
                <p class="mt-4 paragraph mt4Is">From in-country representation and market development to hands-on
                    execution and admissions support, we offer everything your
                    university needs to succeed. We don’t just consult; we integrate
                    as an extension of your team, managing local operations with
                    precision, supported by our in-depth regional expertise.</p>
            </div>
        </div>
    </div>
</section>
<!-- Below about us -->
<!-- <section id="growth-partner" class="customSection">
                            <div class="customContainer aboutCon">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-lg-5">
                                        <img src="{{ asset('website/assets/images/aboutusauimg.webp') }}" alt="Global Growth Partner"
                                            class="w-100" />
                                    </div>
                                    <div class="col-md-6 col-lg-7">
                                        <p class="mt-4 paragraph mt4Is">
                                            With a focus on international education, we empower international
                                            universities to thrive and expand in the rapidly evolving Indian
                                            and South Asian markets. Our comprehensive suite of services is
                                            designed to elevate your institution’s presence, attract top-tier
                                            students, and drive significant recruitment growth.
                                        </p>
                                        <p class="mt-4 paragraph mt4Is">From in-country representation and market development to hands-on
                                            execution and admissions support, we offer everything your
                                            university needs to succeed. We don’t just consult; we integrate
                                            as an extension of your team, managing local operations with
                                            precision, supported by our in-depth regional expertise.</p>
                                    </div>
                                </div>
                            </div>
                        </section> -->

<!--Latest News-->
<!-- <section id="latest-news" class="customSection bgnews">
            <div class="customContainer ">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold m-0">Latest News</h2>
                    <div class="d-flex gap-2">
                        <button class="artBtn btn btn-danger rounded-circle p-3" data-bs-target="#news-carousel"
                            data-bs-slide="prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 0 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
                            </svg>
                        </button>
                        <button class="artBtn btn btn-danger rounded-circle p-3" data-bs-target="#news-carousel"
                            data-bs-slide="next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-4.147-4.146a.5.5 0 0 1 .708-.708l5 5a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <hr />
                <div id="news-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="slider articalMe">
                        <div class="news-card border-0 position-relative">
                            <img src="{{ asset('website/assets/images/first-c.webp') }}" class="card-img-top" alt="News 1" />
                            <div class="gradient-overlay"></div>
                            <div class="card-img-overlay d-flex align-items-end p-3">
                                <h5 class="card-title text-white">
                                    Lorem Ipsum is simply dummy text
                                </h5>
                            </div>
                        </div>
                        <div class="news-card border-0 position-relative">
                            <img src="{{ asset('website/assets/images/second-c.webp') }}" class="card-img-top" alt="News 2" />
                            <div class="gradient-overlay"></div>
                            <div class="card-img-overlay d-flex align-items-end p-3">
                                <h5 class="card-title text-white">
                                    Lorem Ipsum is simply dummy text
                                </h5>
                            </div>
                        </div>
                        <div class="news-card border-0 position-relative">
                            <img src="{{ asset('website/assets/images/third-c.webp') }}" class="card-img-top" alt="News 3" />
                            <div class="gradient-overlay"></div>
                            <div class="card-img-overlay d-flex align-items-end p-3">
                                <h5 class="card-title text-white">
                                    Lorem Ipsum is simply dummy text
                                </h5>
                            </div>
                        </div>
                        <div class="news-card border-0 position-relative">
                            <img src="{{ asset('website/assets/images/fourth-c.webp') }}" class="card-img-top" alt="News 4" />
                            <div class="gradient-overlay"></div>
                            <div class="card-img-overlay d-flex align-items-end p-3">
                                <h5 class="card-title text-white">
                                    Lorem Ipsum is simply dummy text
                                </h5>
                            </div>
                        </div>
                        <div class="news-card border-0 position-relative">
                            <img src="{{ asset('website/assets/images/fourth-c.webp') }}" class="card-img-top" alt="News 4" />
                            <div class="gradient-overlay"></div>
                            <div class="card-img-overlay d-flex align-items-end p-3">
                                <h5 class="card-title text-white">
                                    Lorem Ipsum is simply dummy text
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

<!--Our founders and values section-->
<section id="our-founders" class="customSection">
    <div class="customContainer">
        <h2 class="text-center fw-bold m-0 foundersh">Our Founders</h2>
        <div class="row row-cols-1 row-cols-md-2 g-5 mt-1">
            <!-- Founder 1 -->
            <div class="col ">
                <div class="d-flex shadow rounded founder h-100 ourfoundersec">
                    <!-- Left Column (Image & Name) -->
                    <div class="d-flex flex-column align-items-center justify-content-center"
                        style="flex: 0 0 30%; text-align: center">
                        <img src="{{ asset('website/assets/images/Group 1000004028.webp') }}" alt="Founder 1"
                            class="img-fluid" style="
                                   width: 282.9515075683594;
                height: 282.9515075683594;
                top: 2850.18px;
                left: 111px;" />
                        <h5 class="fw-bold mt-3 mb-0 foundersp">Jaspreet Singh</h5>
                        <p class="text-muted-c mb-0 foundersp">Co-Founder</p>
                    </div>
                    <!-- Right Column (Description) -->
                    <div class="" style="flex: 1">
                        <p class="mb-0 text-muted-c" style="font-family: 'Poppins', sans-serif;
                                                                font-weight: 400;
                                                                font-size: 18px;
                                                                line-height: 34px;
                                                                letter-spacing: 0%;
                                                                margin-top: 24px;
                                                                ">
                            With 20 years of experience, Jaspreet specializes in market
                            entry, strategic partnerships, and student recruitment,
                            enabling universities to establish and grow their presence in
                            South Asia. His expertise in opening avenues in new markets
                            has been instrumental to Gresham Global's success.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Founder 2 -->
            <div class="col ">
                <div class="d-flex shadow rounded founder h-100 ourfoundersec">
                    <!-- Left Column (Image & Name) -->
                    <div class="d-flex flex-column align-items-center justify-content-center"
                        style="flex: 0 0 30%; text-align: center">
                        <img src="{{ asset('website/assets/images/Group 1000004029.webp') }}" alt="Founder 2"
                            class="img-fluid" style="
                                    width: 282.9515075683594;
                height: 282.9515075683594;
                top: 2850.18px;
                left: 111px;
                " />
                        <h5 class="fw-bold mt-3 mb-0 foundersp">Jasminder Khanna</h5>
                        <p class="text-muted-c mb-0 foundersp">Co-Founder and CEO</p>
                    </div>
                    <!-- Right Column (Description) -->
                    <div class="" style="flex: 1">
                        <p class="mb-0 text-muted-c" style="font-family: 'Poppins', sans-serif;
                                                                font-weight: 400;
                                                                font-size: 18px;
                                                                line-height: 34px;
                                                                letter-spacing: 0%;
                                                                margin-top: 24px;
                                                                            ">
                            Jasminder brings over 15 years of experience in the higher
                            education sector. With a strong focus on strategic
                            partnerships and in-country representation, he has played a
                            pivotal role in assisting international universities to grow
                            in developing markets. His in-depth knowledge of the South
                            Asian education landscape and his commitment to excellence
                            ensure impactful outcomes for partner institutions worldwide.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- sec 6 starts -->
<x-our-values />

<!-- Articles & Resources -->


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

<?php /*
<section class="sec6">
    <div class="custom-container">
        <h2>Our Values</h2>
        <div class="w-100 d-flex flex-wrap gap-2 MainValueBox">

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
    <div class="row mt-5 w-100 justify-content-center mx-auto abtnt5btn">
        <button class="btn bg-white fw-bold text-center btn-custom getintouchBtn ctagetint">Get in Touch</button>
    </div><br>

</section>
<?php */ ?>
<!-- sec 6 ends -->

@endsection