@extends('website.layout.master')
@section('content')
<!-- banner section starts here -->
<section class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white  titleH1">Media</h1>
    </div>
    <img src="{{ asset('website/assets/images/bannermedia44.png') }}" class="w-100 forMobBanner d-none d-md-block" />
    <img src="{{ asset('website/assets/images/mediamobilebanner.png') }}" class="w-100 forMobBanner d-block d-md-none" />

</section>
<!-- Media section -->

<section class="customSection my-5">
    <div class="customContainer mediaCon">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4 ">
                <div class="news-card h-100 d-flex flex-column">
                    <a href="https://thepienews.com/unis-and-agencies-work-to-leverage-bangladeshi-market/"
                        target="_blank"><img src="{{ asset('website/assets/images/Group 1000004103.png') }}"
                            alt="News Image" class="news-card-img">
                    </a>
                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 text-muted small">
                            <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon" class="icon-sm">
                            <span>12 March 2025 | 5:56 IST</span>
                        </div>
                        <img src="{{ asset('website/assets/icons/Desktop.png') }}" alt="" class="repiblicimg">
                        <a href="https://thepienews.com/unis-and-agencies-work-to-leverage-bangladeshi-market/"
                            target="_blank">
                            <h5 class="news-card-title">Unis and agencies work to leverage Bangladeshi market
                            </h5>
                        </a>
                        <p class="news-card-text flex-grow-1">As the number of Bangladeshi students pursuing education
                            abroad continues ...</p>
                        <hr class="opacity-25">
                        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                            <a href="https://thepienews.com/unis-and-agencies-work-to-leverage-bangladeshi-market/"
                                target="_blank" class="readmoreBtn">Read More</a>
                            <!-- <img src="{{ asset('website/assets/images/share.svg') }}" alt="Share Icon" class="icon-xs"> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 2 -->
            <div class="col-md-6 col-lg-4 ">
                <div class="news-card h-100 d-flex flex-column">
                    <a href="https://www.hindustantimes.com/brand-stories/gresham-global-strengthens-south-asia-education-networks-with-inaugural-gresham-connect-event-in-bangladesh-101741068844870.html"
                        target="_blank"><img src="{{ asset('website/assets/images/Group 1000004103.png') }}"
                            alt="News Image" class="news-card-img">
                    </a>
                    <div class="d-flex align-items-center gap-2 text-muted small">
                        <div class="news-card-body d-flex flex-column flex-grow-1">
                            <div class="d-flex align-items-center gap-2 text-muted small">
                                <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                                    class="icon-sm">
                                {{-- <span>04 Mar 2025 | 11:47 AM IST</span> --}}
                            </div>
                            <img src="{{ asset('website/assets/images/hindustaitimes.png') }}" alt=""
                                class="repiblicimg">
                            <a href="https://www.hindustantimes.com/brand-stories/gresham-global-strengthens-south-asia-education-networks-with-inaugural-gresham-connect-event-in-bangladesh-101741068844870.html"
                                target="_blank">
                                <h5 class="news-card-title">Gresham Global Strengthens South Asia Education Networks
                                    ....
                                </h5>
                            </a>
                            <p class="news-card-text flex-grow-1">With the success of its inaugural event in Bangladesh,
                                Gresham Global ...</p>
                            <hr class="opacity-25">
                            <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                                <a href="https://www.hindustantimes.com/brand-stories/gresham-global-strengthens-south-asia-education-networks-with-inaugural-gresham-connect-event-in-bangladesh-101741068844870.html"
                                    target="_blank" class="readmoreBtn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card 3 -->
            <div class="col-md-6 col-lg-4 ">
                <div class="news-card h-100 d-flex flex-column">
                    <a href="https://www.ptinews.com/press-release/gresham-global-simplifies-south-asia-growth-for-international-universities/2330553"
                        target="_blank"><img src="{{ asset('website/assets/images/bcofounder.png') }}" alt="News Image"
                            class="news-card-img">
                    </a>
                    <div class="d-flex align-items-center gap-2 text-muted small">
                        <div class="news-card-body d-flex flex-column flex-grow-1">
                            <div class="d-flex align-items-center gap-2 text-muted small">
                                <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                                    class="icon-sm">
                                {{-- <span>27 Feb 2025 |10:02:56 IST</span> --}}
                            </div>
                            <img src="{{ asset('website/assets/images/imgpsh_fullsize_anim3 1.svg') }}" alt=""
                                class="repiblicimg">
                            <a href="https://www.ptinews.com/press-release/gresham-global-simplifies-south-asia-growth-for-international-universities/2330553"
                                target="_blank">
                                <h5 class="news-card-title">Gresham Global Simplifies Growth in South Asia for
                                    International Universities
                                </h5>
                            </a>
                            <p class="news-card-text flex-grow-1">The international higher education landscape is
                                evolving rapidly, ...</p>
                            <hr class="opacity-25">
                            <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                                <a href="https://www.ptinews.com/press-release/gresham-global-simplifies-south-asia-growth-for-international-universities/2330553"
                                    target="_blank" class="readmoreBtn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- card 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card h-100 d-flex flex-column">
                    <a href="https://thepienews.com/studying-abroad-disease-or-an-opportunity-lets-break-the-myth/
      "
                        target="_blank">
                        <img src="{{ asset('website/assets/images/media596.png') }}" alt="News Image"
                            class="news-card-img">
                    </a>
                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 text-muted small">
                            <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon" class="icon-sm">
                            {{-- <span>12 Nov 2024 | 12:05 IST</span> --}}
                        </div>
                        <img src="{{ asset('website/assets/icons/Desktop.png') }}" alt=""
                            style="width: 152.045px;
    height: 30px;
    flex-shrink: 0;
    margin-top:12px;
    margin-bottom:12px;">
                        <a href="https://thepienews.com/studying-abroad-disease-or-an-opportunity-lets-break-the-myth/
      "
                            target="_blank">
                            <h5 class="news-card-title flex-grow-1">Studying abroad – disease or an opportunity? Let’s
                                break the myth
                            </h5>
                        </a>
                        <p class="news-card-text flex-grow-1">The honourable vice president of India, Jagdeep Dhankar,
                            recently
                            described the trend ....
                        </p>
                        <hr class="opacity-25">
                        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                            <a href="https://thepienews.com/studying-abroad-disease-or-an-opportunity-lets-break-the-myth/
    "
                                target="_blank" class="readmoreBtn">Read More</a>
                            <!-- <img src="{{ asset('website/assets/images/share.svg') }}" alt="Share Icon" class="icon-xs"> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card h-100 d-flex flex-column">
                    <a href="https://www.business-standard.com/content/press-releases-ani/gresham-global-becomes-south-asia-representative-for-university-of-guelph-124102100639_1.html"
                        target="_blank"><img src="{{ asset('website/assets/images/3.webp') }}" alt="News Image"
                            class="news-card-img"></a>
                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 text-muted small">
                            <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                                class="icon-sm">
                            {{-- <span>22 Oct 2024 | 12:05 IST</span> --}}
                        </div>
                        <img src="{{ asset('website/assets/icons/business-standard-logo 1.svg') }}" alt=""
                            class="repiblicimg">

                        <a href="https://www.business-standard.com/content/press-releases-ani/gresham-global-becomes-south-asia-representative-for-university-of-guelph-124102100639_1.html"
                            target="_blank">
                            <h5 class="news-card-title">Gresham Global Becomes South Asia Representative for University
                                of Guelph</h5>
                        </a>
                        <p class="news-card-text flex-grow-1">Mumbai (Maharashtra) [India], October 21: Gresham Global
                            is excited to
                            announce its recent partnership...</p>
                        <hr class="opacity-25">
                        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                            <a href="https://www.business-standard.com/content/press-releases-ani/gresham-global-becomes-south-asia-representative-for-university-of-guelph-124102100639_1.html"
                                target="_blank" class="readmoreBtn">Read More</a>
                            <!-- <img src="{{ asset('website/assets/images/share.svg') }}" alt="Share Icon" class="icon-xs"> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card h-100 d-flex flex-column">
                    <a href="https://thepienews.com/canada-australia-shift-from-quantity-to-quality/"
                        target="_blank"><img src="{{ asset('website/assets/images/the-pie.png') }}" alt="News Image"
                            class="news-card-img"></a>
                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 text-muted small">
                            <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                                class="icon-sm">
                            {{-- <span>23 Sept 2024 | 17:04 IST</span> --}}
                            <br>
                        </div>
                        <img src="{{ asset('website/assets/icons/Desktop.png') }}" alt=""
                            style="width: 152.045px;
      height: 30px;
      flex-shrink: 0;
      margin-top:12px;
      margin-bottom:12px;">
                        <a href="https://thepienews.com/canada-australia-shift-from-quantity-to-quality/"
                            target="_blank">
                            <h5 class="news-card-title">Canada and Australia: the shift from quantity to quality – and
                                rightly so</h5>
                        </a>
                        <p class="news-card-text flex-grow-1 ">Jasminder Khanna's head's still spinning after a
                            tumultuous few weeks
                            for Canadian and Australian intled...</p>
                        <hr class="opacity-25">
                        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                            <a href="https://thepienews.com/canada-australia-shift-from-quantity-to-quality/"
                                target="_blank" class="readmoreBtn">Read More</a>
                            <!-- <img src="{{ asset('website/assets/images/share.svg') }}" alt="Share Icon" class="icon-xs"> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row g-4 addmoreBlogs">
            <button id="loadMore">
                <span>Load More</span>
                <img src="{{ asset('website/assets/images/loading.svg') }}" alt="" class="d-none">
            </button>


        </div>
    </div>
</section>
@endsection