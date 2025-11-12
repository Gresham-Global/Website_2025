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

        /* Search bar styles */
        .search-bar-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-form {
            display: flex;
            width: 80%;
            max-width: 800px;
            gap: 10px;
        }

        .search-bar-input {
            padding: 10px;
            font-size: 16px;
            flex: 1;
            min-width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-bar-button {
            padding: 10px 20px;
            background-color: rgb(168, 35, 35);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            white-space: nowrap;
        }

        .search-bar-button:hover {
            background-color: rgb(184, 34, 34);
        }

        .search-results-info {
            text-align: center;
            margin: 20px 0;
            font-size: 16px;
        }

        .search-keyword {
            font-weight: bold;
            color: rgb(168, 35, 35);
        }

        .no-results-message {
            text-align: center;
            padding: 40px 0;
        }

        section.careersopening .opening-card {
            transition: transform 0.3s;
            height: 100%;
            border-radius: 30px;
            background: #FFF;
            box-shadow: 0px 0px 24px 0px rgba(0, 0, 0, 0.15);
        }

        section.careersopening .opening-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>


    <!-- 1st Section -->
    <section class="careerbanner_section">
        <div class="careerbanner_background"></div>
        <div class="careerbanner_container">
            <div class="careerbanner_textWrapper">
                <h1 class="careerbanner_title text-light">Careers Opening</h1>
            </div>
        </div>
    </section>

    <!--Opening Section-->
    <section class="customSection backgRound  careersopening">
        <div class="customContainer mediaCon h">
            <div class="no-results-message d-none" id="no-results">
                <h3>No job openings found</h3>
                <p>Please try different search criteria or check back later for new opportunities.</p>
                <a href="{{ url('careers-openings') }}" class="btn btn-outline-danger mt-3">View All Openings</a>
            </div>

            <div class="row g-4" id="career-list">
                @foreach ($careers as $career)
                    <div class="col-md-6 col-lg-4 p-2 gr-4 career-item">
                        <div class="opening-card p-4">
                            <h3 class="job-title">{{ $career['title'] }}</h3>
                            <!-- <p><strong>Education & Experience:</strong> {{ $career['education_experience_card'] }}</p> -->
                            <p><strong>Job Description:</strong> {!! $career['short_description'] !!}</p>
                            @if ($career['status'] == 'active')
                                <a href="{{ url('career-details/' . $career['slug']) }}">
                                    <button class="apply-btn">Apply Now</button>
                                </a>
                            @else
                                {{-- <a href="{{ url('career-details/' . $career['slug']) }}"> --}}
                                    <button class="apply-btn">Opening Closed</button>
                                {{-- </a> --}}
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
