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
                <img src="{{ $item->thumbnail_image ?? asset('website/assets/images/publications/publicationCard.webp') }}" alt="{{ $item->title }}" class="w-100">
                </a>
                <div class="bodyContent">
                    <a href="{{ route('publications.show', $item->slug) }}" target="_blank">
                    <h4 class="similarPublicationsTitle">{{ Str::limit($item->title, 70) }}</h4>
                    </a>
                    <p class="similarPublicationsDesc">{{ Str::limit(strip_tags($item->short_description), 100) }}</p>
                </div>

                @if ($item->tags && count($item->tags))
                <div class="tagDiv">
                    <span>Tags:</span> {{ implode(', ', $item->tags->pluck('name')->toArray()) }}
                </div>
                @endif

                <hr />
                <div class="d-flex justify-content-between">
                    <a href="{{ route('publications.show', $item->slug) }}" class="readMoreBtn" aria-label="Read More">
                        Read More
                    </a>
                    <img src="{{ asset('website/assets/images/publications/share.svg') }}" alt="Share Icon" />
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
                <input type="text" class="form-input" id="fullName" name="full_name" placeholder="Full Name" >
            </div>

            <div class="form-group">
                <label class="form-label" for="emailId">Business Email ID *</label>
                <input type="email" class="form-input" id="emailId" name="email_id" placeholder="Email ID" >
            </div>

            <!-- Hidden Fields for Title and ID -->
            <input type="hidden" id="reportUrl" name="report_url">
            <input type="hidden" id="publicationTitle" name="publication_title">
            <input type="hidden" id="publicationId" name="publication_id">

            <span class="mb-3 formtxt">By Submitting this form, you are accepting Gresham Global's <a class="formLink" href="/privacy-policy" target="_blank" >Terms &amp; Conditions</a>.</span>

            <button type="submit" class="form-submit" id="submitBtn">
                Submit
            </button>

            <div class="loading" id="loadingMsg">
                Processing your request...
            </div>
        </form>
    </div>
</div>


@endif

@endsection
