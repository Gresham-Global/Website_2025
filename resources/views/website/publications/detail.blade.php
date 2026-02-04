@extends('website.layout.master')
@section('content')

@section('css_files')
<link rel="stylesheet" href="{{ asset('../website/assets/css/publication.css') }}">
@endsection



<section class="publicationBannerSection firstSection">
    <div class="customContainer publicationBanner">
        <img src="{{ $publications['banner_image'] }}" alt="Publication Banner" class="w-100 d-none d-md-block publicationBannerimg" />
        <img src="{{ $publications['mb_banner_image'] }}" alt="Publication Banner" class="w-100 d-block d-md-none publicationBannerimg publicationMbBannerimg" />
    </div>
</section>
<section class="middleContentSection">
    <div class="customContainer">
        <div class="row gap-xl-4">
            <div class="col-sm-4 col-xl-3 verticalImage">
                <img src="{{ $publications['vertical_image'] }}" alt="Download Brochure" class="w-100 downloadBrochureImg mb-3" />
                <a href="{{$publications['report_pdf']}}"
                    class="downloadBtn mb-3 mt-0 downloadReportForm downloadReportBtn"
                    data-title="{{$publications['title']}}"
                    data-id="{{$publications['id']}}"
                    aria-label="Download Brochure">
                    Download Report <img src="../website/assets/images/publications/downloadArrow.svg" alt="" />
                </a>
            </div>
            <div class="col-sm-8 col-xl-8">
                <h2 class="mainHeadingSection publicationTitle">{{ $publications['title'] }}</h2>
                <p>{!! $publications['description'] !!}</p>
            </div>
        </div>
    </div>
</section>
@if (!empty($publications['report_cards']))
<section class="reportSection">
    <div class="customContainer">
        <h2 class="mainHeadingSection text-center mb-5">What the Report Includes</h2>
        <div class="row justify-content-center gy-4">
            @foreach ($publications['report_cards'] as $card)
            <div class="col-lg-4 col-sm-6">
                <div class="reportCard">
                    <!-- Front View -->
                    <div class="frontView">
                        <img src="{{ $card['report_image'] ?? 'website/assets/images/publications/report1.webp' }}" alt="Report Image" class="w-100" />
                        <div class="overlay">
                            <h4>{{ $card['report_title'] ?? 'Untitled' }}</h4>
                            <button type="button" aria-label="Repeat Button" class="reapeatButton">
                                <img src="{{ asset('website/assets/images/publications/repeat.svg') }}" alt="Repeat" />
                            </button>
                        </div>
                    </div>

                    <!-- Back View -->
                    <div class="backView">
                        <h5>{{ $card['report_title'] ?? 'Untitled' }}</h5>
                        <ul>
                            @foreach ($card['report_list'] ?? [] as $item)
                            <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if (!empty($publications['key_highlights']))
<section class="keyHightSection">
    <h2 class="mainHeadingSection text-center mb-5">Key Highlights</h2>
    <div class="keyHightSectionMain">
        <div class="customContainer">
            <div class="row justify-content-center">
                @foreach ($publications['key_highlights'] as $highlight)
                <div class="col-sm-4">
                    <div class="keyHightCard">
                        <img src="{{ $highlight['highlight_icon'] }}" alt="Highlight Icon">
                        <p>{!! $highlight['highlight_description'] !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="{{$publications['report_pdf']}}"
                class="downloadBtn mb-3 mt-3 downloadReportForm "
                data-title="{{$publications['title']}}"
                data-id="{{$publications['id']}}"
                aria-label="Download Brochure">
                Download Report <img src="../website/assets/images/publications/downloadArrow.svg" alt="right arrow" />
            </a>
        </div>
    </div>
</section>
@endif


@if (!empty($similarPublications))

<section class="similarProductSection">
    <div class="customContainer">
        <h2 class="mainHeadingSection similarPublication mb-5">Similar Publications</h2>
        <div class="row publicationSlider">
            @foreach ($similarPublications as $item)
            <div class="col-md-3 publicationCard">
                <a href="{{ route('publications.show', $item->slug) }}" target="_blank">
                    <img src="{{ $item->thumbnail_image ?? asset('website/assets/images/publications/publicationCard.webp') }}" alt="{{ $item->title }}" class="w-100 news-card-img">
                </a>
                <div class="bodyContent">
                    <a href="{{ route('publications.show', $item->slug) }}" target="_blank">
                        <h4 class="similarPublicationsTitle">{{ Str::limit($item->title, 63) }}</h4>
                    </a>
                    <p class="similarPublicationsDesc">{{ Str::limit(strip_tags($item->short_description), 250) }}</p>
                </div>

                @if ($item->tags && count($item->tags))
                <div class="tagDiv">
                    <span>Tags:</span> {{ implode(', ', $item->tags->pluck('name')->toArray()) }}
                </div>
                @endif

                <hr />
                <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                    <a href="{{ route('publications.show', $item->slug) }}" class="readMoreBtn" aria-label="Read More">
                        Read More
                    </a>

                    @if (!empty($item->share_link))
                    <a href="{{ $item->share_link }}" class="share_social share-blog-hit ">
                        <img style="border-radius: 0 !important;" src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="Share Icon">
                    </a>
                    @endif

                    <a href="javascript:void(0);" class="share_social share-blog-hit"
                        data-url="{{ route('publications.show', $item->slug) }}"
                        data-title="{{ $item->title }}">
                        <img style="border-radius: 0 !important;" src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="popup-overlay" id="downloadPopup">
    <div class="popup-container">
        <div class="popup-header">
            <div class="popupheaer-top">
                <h3 class="popup-title">Download Report</h3>
                <button class="popup-close" id="closePopup">&times;</button>
            </div>
            <p class="mb-0 mt-2 formtxt"> Get your report delivered to your inbox</p>
        </div>


        <form class="popup-form" id="downloadForm">
            <!-- Existing Fields -->
            <div id="allerror" class="font-weight-bold text-danger custom-formset"></div>
            <div class="form-group">
                <label class="form-label" for="fullName">Full Name *</label>
                <input type="text" class="form-input" id="fullName" name="full_name" placeholder="Full Name">
            </div>

            <div class="form-group">
                <label class="form-label" for="emailId">Business Email ID *</label>
                <input type="email" class="form-input" id="emailId" name="email_id" placeholder="Email ID">
            </div>

            <!-- Hidden Fields for Title and ID -->
            <input type="hidden" id="reportUrl" name="report_url">
            <input type="hidden" id="publicationTitle" name="publication_title">
            <input type="hidden" id="publicationId" name="publication_id">

            <span class="mb-3 formtxt">By Submitting this form, you are accepting Gresham Global's <a class="formLink" href="/privacy-policy" target="_blank">Terms &amp; Conditions</a>.</span>

            <button type="submit" class="form-submit" id="submitBtn" disabled>
                Submit
            </button>

            <!-- <div class="loading" id="loadingMsg">
                Processing your request...
            </div> -->
        </form>
    </div>
</div>
<style>
    .slick-list {
        padding-bottom: 20px;
    }

    .tagDiv span {
        font-size: 1rem !important;

    }

    .similarPublicationsTitle {
        overflow: hidden;
        min-height: 2.26em;
        max-height: 2.5em;
        line-height: 28px;
    }

    @supports (-webkit-line-clamp: 2) {
        .similarPublicationsTitle {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            max-height: unset;
        }
    }

    .similarPublicationsDesc {
        overflow: hidden;
        min-height: 2.26em;
        max-height: 2.5em;
        line-height: 28px;
    }

    @supports (-webkit-line-clamp: 3) {
        .similarPublicationsDesc {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            max-height: unset;
        }
    }

    @media screen and (max-width: 1366px) {
        .similarPublicationsTitle {
            overflow: hidden;
            max-height: 3.5em;
            line-height: 28px;
            min-height: 60px !important;
        }

        .similarPublicationsDesc {
            overflow: hidden;
            max-height: 5em;
            line-height: 28px;
            min-height: 66px !important;
        }

    }

    @media screen and (max-width: 768px) {


        .similarPublicationsTitle {
            overflow: hidden;
            max-height: 3.5em;
            line-height: 28px;
            min-height: 60px !important;
        }

        @supports (-webkit-line-clamp: 2) {
            .similarPublicationsDesc {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                max-height: unset;
            }
        }

        .similarPublicationsDesc {
            overflow: hidden;
            max-height: 3.5em;
            line-height: 28px;
            min-height: 66px !important;
        }

        @supports (-webkit-line-clamp: 3) {
            .similarPublicationsDesc {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                max-height: unset;
            }
        }
    }
</style>

@endif

@endsection