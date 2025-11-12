@extends('website.layout.master')
@section('content')
    <style>
        .life-slider {
            display: flex;
            justify-content: center;
        }

        .slide-item {
            padding: 10px;
        }

        .slide-item img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Custom Slick Arrow Buttons */
        .slick-prev,
        .slick-next {
            font-size: 40px;
            color: rgb(168, 35, 35);
            cursor: pointer;
            z-index: 100;
            margin: 1px;
        }

        .slick-next {
            right: 0.7rem !important;
            margin: 1px 14px;
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
            left: -1rem;
        }

        @media screen and (max-width:767px) {
            .firstContainer p {
                width: 100%;
            }

            .firstContainer {
                top: 9rem;
            }

            .firstContainer p {
                font-size: 16px;
                line-height: 1.5rem;
            }

            .cardContainer1 {
                display: flex;
                flex-wrap: wrap;
            }

            .mediaCon {
                margin: 0rem 0;
            }

            .sec6 .flip-card1 {
                height: 15rem;
            }

            .sec6 .front-card1 {
                margin: 10px 0px !important;
                /* background: url(../../assets/images/flip1.png) no-repeat center center; */
            }

            .sec6 .flip-card1 {
                margin: 10px 0px !important;
            }

            .sec6 .back-card1 {
                margin: 10px 0px !important;
            }

            .slick-next:before,
            .slick-prev:before {
                display: none;
            }

            .slick-next {
                right: -1.3rem !important;
            }

            .slick-prev {
                left: -1rem;
            }

            .lead1 {
                font-size: 15px;
                font-weight: 400;
                line-height: 30px;
            }

            .subscribeBox button {
                width: 100% !important;
                padding: 0px 5px;
            }
        }

        .cardContainer1 {
            align-items: center;
        }
    </style>


    <!-- 1st Section -->
    <section class="careerbanner_section">
        <div class="careerbanner_background"></div> <!-- Background container -->

        <div class="careerbanner_container">
            <div class="careerbanner_textWrapper">
                <h1 class="careerbanner_title text-light">Careers</h1>
                <p class="careerbanner_description mt-2">
                    India and South Asia's vast and diverse landscape presents immense opportunities for international
                    universities seeking to expand their footprint. We offer tailored research and assessment solutions
                    designed
                    to ensure your institution’s growth is both impactful and long-term.
                </p>
            </div>
        </div>
    </section>



    <!--why work with us section-->
    <section class="customSection">
        <div class="customContainer careerCon">
            <div class="whyWorkSection">
                <div class="cardContainer1">
                    <!-- First row: "Why Work with Us?" + two cards -->
                    <div class="whyWorkHeading d-none d-md-block">
                        <h1 style="font-weight: 700; font-family: 'Proxima Nova';">Why Work<br>with Us?</h1>
                    </div>

                    <div class="whyWorkHeading d-block d-md-none py-3">
                        <h1 style="font-weight: 700; font-family: 'Proxima Nova'">Why Work with Us?</h1>
                    </div>

                    <!-- Card 1 -->
                    <div class="card highlightedCard">
                        <div class="icon">
                            <img src="{{ asset('website/assets/images/culture-innovation.png') }}" alt="Innovation Icon" />
                        </div>
                        <h3>A Culture of Innovation</h3>
                        <p>
                            We embrace creativity and forward-thinking, empowering our team members to bring their ideas to
                            life.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="card">
                        <div class="icon">
                            <img src="{{ asset('website/assets/images/professional-devlopment.png') }}"
                                alt="Development Icon" />
                        </div>
                        <h3>Professional Development</h3>
                        <p>
                            Our learning and development programs are designed to help you acquire new skills, grow
                            professionally, and
                            achieve your career goals.
                        </p>
                    </div>

                    <!-- Second row: Three cards -->
                    <div class="card">
                        <div class="icon">
                            <img src="{{ asset('website/assets/images/work-life.png') }}" alt="Work-Life Balance Icon" />
                        </div>
                        <h3>Work-Life Balance</h3>
                        <p>
                            We understand the importance of balance and offer flexible work arrangements to help you thrive
                            both
                            personally and professionally.
                        </p>
                    </div>

                    <div class="card">
                        <div class="icon">
                            <img src="{{ asset('website/assets/images/diversity.png') }}" alt="Diversity Icon" />
                        </div>
                        <h3>Diversity & Inclusion</h3>
                        <p>
                            We celebrate diversity and are committed to creating an inclusive environment where everyone can
                            succeed.
                        </p>
                    </div>

                    <div class="card">
                        <div class="icon">
                            <img src="{{ asset('website/assets/images/rewards.png') }}" alt="Rewards Icon" />
                        </div>
                        <h3>Rewards & Recognition</h3>
                        <p>
                            We value hard work and celebrate achievements with competitive compensation, bonuses, and
                            employee
                            recognition programs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- sec 6 starts -->
    <section class="sec6" id="our-values-sec">
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

                            <p>We are committed to delivering the highest standards in our work, continuously striving for
                                improvement
                                and innovation</p>
                        </div>
                    </div>


                </div>
                <!-- box1 -->

                <!-- box1 -->
                <div class="flex-fill ValueBox">

                    <div class="flip-card1">
                        <div class="front-card1">
                            <div class="box1">
                                <img src="{{ asset('website/assets/images/compliance.png') }}" alt="" />
                                <h4>Compliance
                                </h4>
                            </div>
                        </div>
                        <div class="back-card1">

                            <p>Integrity is non-negotiable—we follow all regulations and best practices to create a secure
                                and
                                trustworthy workplace
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
                                <img src="{{ asset('website/assets/images/growth.png') }}" alt="" />
                                <h4>Growth</h4>
                            </div>
                        </div>
                        <div class="back-card1">

                            <p>Your development matters. We support continuous learning and offer opportunities to grow with
                                us
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
                                <img src="{{ asset('website/assets/images/commitment.png') }}" alt="" />
                                <h4>Commitment</h4>
                            </div>
                        </div>
                        <div class="back-card1">

                            <p>We are committed to each other’s success, fostering a supportive and collaborative culture
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
                                <img src="{{ asset('website/assets/images/transparency.png') }}" alt="" />
                                <h4>Transparency</h4>
                            </div>
                        </div>
                        <div class="back-card1">

                            <p>We act with honesty and transparency in all that we do, ensuring trust and respect across
                                every
                                interaction</p>
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
    <!-- sec 6 ends -->

    <!--Carousel-->
    <section id="latest-news" class="customSection">
        <div class="customContainer">
            <!-- Title -->
            <div class="d-flex justify-content-center align-items-center mb-4">
                <h2 class="fw-bold" style="font-family: 'Proxima Nova'">Life at Gresham Global</h2>
            </div>
            <hr>
            <!-- Carousel -->
            <div class="life-slider">
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/img11.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                {{-- <div class="slide-item">
        <img src="{{ asset('website/assets/images/lifeofgg/img2.webp') }}" class="img-fluid rounded"
          alt="Team enjoying at an event">
      </div> --}}

                {{-- <div class="slide-item">
        <img src="{{ asset('website/assets/images/lifeofgg/img4.webp') }}" class="img-fluid rounded"
          alt="Interactive games at the event">
      </div> --}}
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/img5.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>

                {{-- <div class="slide-item">
        <img src="{{ asset('website/assets/images/lifeofgg/img7.webp') }}" class="img-fluid rounded"
          alt="Interactive games at the event">
      </div> --}}

                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/img9.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/img10.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                {{-- <div class="slide-item">
        <img src="{{ asset('website/assets/images/lifeofgg/img3.webp') }}" class="img-fluid rounded"
          alt="Interactive games at the event">
      </div> --}}
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/img12.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/img13.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/carousel3.jpeg') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/img8.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>

                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/EMP_5505.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/EMP_5515.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/EMP_5524.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/EMP_5669.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/EMP_7865.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/EMP_7925.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>
                <div class="slide-item">
                    <img src="{{ asset('website/assets/images/lifeofgg/EMP_8020.webp') }}" class="img-fluid rounded"
                        alt="Interactive games at the event">
                </div>

                {{-- <div class="slide-item">
        <img src="{{ asset('website/assets/images/lifeofgg/img6.webp') }}" class="img-fluid rounded"
          alt="Interactive games at the event">
      </div> --}}
                {{-- <div class="slide-item">
        <img src="{{ asset('website/assets/images/lifeofgg/img15.webp') }}" class="img-fluid rounded"
          alt="Interactive games at the event">
      </div> --}}
                {{-- <div class="slide-item">
        <img src="{{ asset('website/assets/images/lifeofgg/img1.webp') }}" class="img-fluid rounded"
          alt="Group of people smiling together">
      </div> --}}
            </div>
        </div>
    </section>


    <!--Opening Section-->
    <section class="customSection backgRound ">
        <div class="customContainer mediaCon h ">
            <div class="currentopn_topsect mb-2">
                <div class="headsect">
                    <h1 class="text-start mb-0" id="currentopeningsection">Current Openings</h1>
                </div>
                <div class="veiwallsec">
                    <a href="/careers-openings" id="viewall">
                        <span>View All</span>
                    </a>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($careers as $career)
                    <div class="col-md-6 col-lg-4 p-2 gr-4">
                        <div class="opening-card p-4">
                            <!-- <img src="{{ asset('website/assets/logo/Frame 1000004058.svg') }}" alt="JD Electronics Logo" class="mb-3"
                width="80"> -->
                            <!-- <p class="job-meta"><span class="company">Gresham Global</span> <span class="time">{{ $career['created_at_human'] }}</span></p> -->
                            <h3 class="job-title">{{ $career['title'] }}</h3>
                            <!-- <p class="opencard_txt"><strong class="stbgtxt">Education & Experience:</strong> {{ $career['education_experience_card'] }}</p> -->
                            <p><strong class="stbgtxt">Job Description:</strong>
                                {!! $career['short_description'] !!}</p>
                            <a href="{{ url('career-details') }}/{{ $career['slug'] }}">
                                <button class="apply-btn">Apply Now</button>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>

    <!--Impact section-->
    <section id="growth-partner" class="customSection careerFooter">
        <div class="customContainer">
            <div class="row d-flex align-items-center justify-content-center romdcol">
                <!-- Image Column -->
                <div class="col-md-6 col-lg-5">
                    <img src="{{ asset('website/assets/images/impact-section.png') }}" alt="Global Growth Partner"
                        class="img-fluid">
                </div>
                <!-- Text Column -->
                <div class="col-md-6 col-lg-5">
                    <h2 class="display-5 fw-bold py-1 mb-4">Ready to Make an Impact.</h2>
                    <p class="lead1">
                        Explore our current openings and discover how you can contribute to Gresham Global <br>Together,
                        let’s build
                        a brighter future.
                    </p>
                    <a href="/careers-openings" class="connect-btn mt-2">Current Openings</a>
                </div>
            </div>
        </div>
    </section>
@endsection
