@extends('website.layout.master')
@section('content')
<!-- banner section starts here -->
<section class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white  titleH1">Publications</h1>
    </div>
    <img src="{{ asset('website/assets/images/banner_event_publi.webp') }}"
        class="w-100 forMobBanner d-none d-md-block" />
    <img src="{{ asset('website/assets/images/banner_event_publi_mb.webp') }}"
        class="w-100 forMobBanner d-block d-md-none" />

</section>
<!-- Media section -->





<section class="customSection my-5">
    <div class="customContainer mediaCon publicationscrads">
        <div class="row g-4 publication-container" id="publicationContainer">
            @foreach ($publications as $publication)
            <!-- Card 1 -->
            <div class="col-md-4 ">
                <div class="news-card publication-card h-100 d-flex flex-column">

                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <a href="{{ route('publications.show', $publication->slug) }}" target="_blank">
                            <img src="{{ $publication->thumbnail_image }}" alt="News Image" class="news-card-img">
                        </a>
                        <!-- <div class="d-flex align-items-center gap-2 mt-3 text-muted-c small">
                            <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                                class="icon-sm">
                            <span style="font-size: 0.85em !important;">{{ \Carbon\Carbon::parse($publication->created_at)->format('d M Y') }}</span>
                        </div> -->
                        <a href="{{ route('publications.show', $publication->slug) }}" target="_blank">
                            <h5 class="news-card-title">
                                <!-- {{$publication->title }} -->
                                {{ \Illuminate\Support\Str::limit($publication->title, 63) }}
                            </h5>
                        </a>
                        <p class="news-card-text flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($publication->short_description, 250) }}
                        </p>
                        <div class="cards_tags">
                            <span class="taghead">Tags: </span>
                            <span class="tagtxt">

                                @if ($publication->tags && $publication->tags->isNotEmpty())
                                {{ $publication->tags->pluck('name')->join(', ') }}
                                @else
                                -
                                @endif

                            </span>
                        </div>


                        <hr class="opacity-25">
                        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                            <a href="{{ route('publications.show', $publication->slug) }}" target="_blank"
                                class="readmoreBtn">Read
                                More</a>
                            <!-- <a href="#" target="_blank" class="readmoreBtn">Read More</a> -->
                            <!-- <img src="{{ asset('website/assets/images/share.svg') }}" alt="Share Icon" class="icon-xs"> -->
                            @if (!empty($publication->share_link))
                            <a href="{{ !empty($publication->share_link) ? $publication->share_link : '#' }}"
                                class="share_social share-blog-hit ">
                                <img src="{{ asset('website/assets/images/events/share_icon.webp') }}"
                                    alt="Share Icon">
                            </a>
                            @endif

                            <a href="javascript:void(0);" class="share_social share-blog-hit"
                                data-url="{{ route('publications.show', $publication->slug) }}"
                                data-title="{{ $publication->title }}">
                                <img src="{{ asset('website/assets/images/events/share_icon.webp') }}"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="row g-4 addmoreBlogs text-center">
                  <button id="loadMorePublications" data-page="2" data-loaded="{{ $publications->count() }}"
                  data-total="{{ $total }}">
                  <span>Load More</span>
                  <img src="{{ asset('website/assets/images/loading.svg') }}" alt="" class="d-none">
                  </button>
                </div> -->
<!-- Desktop Infinite Scroll Loader -->
<div id="infinite-loader" class="text-center my-3 d-none">
    <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
</div>

<!-- Mobile Load More Button -->
<div class="text-center my-4 d-md-none" id="loadMoreWrapperPublications">
    <button class="mx-auto btn btn-primary" id="loadMorePublications"
            data-page="2" 
            data-loaded="{{ $publications->count() }}" 
            data-total="{{ $total }}">
        Load More
    </button>
    <div class="mt-2 d-none" id="loadMoreLoaderPublications">
        <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
    </div>
</div>
    </div>
</section>
<style>
      .news-card-title {
        overflow: hidden;
        min-height: 2.26em;
        max-height: 2.5em;
        line-height: 28px;
    }

    @supports (-webkit-line-clamp: 2) {
        .news-card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            max-height: unset;
        }
    }

    @media screen and (max-width: 768px) {


        .news-card-title {
            overflow: hidden;
            max-height: 3.5em;
            line-height: 28px;
            min-height: 60px !important;
        }

        @supports (-webkit-line-clamp: 2) {
            .news-card-text {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                max-height: unset;
            }
        }
    }


    .news-card-text {
        overflow: hidden;
        min-height: 2.26em;
        max-height: 2.5em;
        line-height: 28px;
    }

    @supports (-webkit-line-clamp: 3) {
        .news-card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            max-height: unset;
        }
    }

    @media screen and (max-width: 768px) {


        .news-card-text {
            overflow: hidden;
            max-height: 3.5em;
            line-height: 28px;
            min-height: 66px !important;
        }

        @supports (-webkit-line-clamp: 3) {
            .news-card-text {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                max-height: unset;
            }
        }
    }
</style>
@endsection

<!--
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll(
            '#publicationscrads .publication-card'); // Assuming .card is the class for each card
        const loadMoreButton = document.querySelector('#loadMore');
        const eventsContainer = document.querySelector('#publicationscrads');

        // Check if there are more than 6 cards
        if (cards.length > 6) {
            // Show "Load More" button
            loadMoreButton.parentElement.classList.remove('d-none');

            // Hide all cards beyond the 6th one
            for (let i = 6; i < cards.length; i++) {
                cards[i].classList.add('d-none');
            }

            // Handle the "Load More" button click event
            loadMoreButton.addEventListener('click', function(event) {
                event.preventDefault();
                // Reveal all the hidden cards
                for (let i = 6; i < cards.length; i++) {
                    cards[i].classList.remove('d-none');
                }

                // Optionally, hide the "Load More" button after it’s clicked
                loadMoreButton.style.display = 'none'; // Or remove if you prefer
            });
        } else {
            // If there are 6 or fewer cards, hide the "Load More" button
            loadMoreButton.parentElement.classList.add('d-none');

            // Optionally, just unhide the .eventscrads container if all cards are visible
            eventsContainer.classList.remove('d-none');
        }
    });
</script>

 -->


@push('js_code')
<script>
    // $('#loadMorePublications').on('click', function() {
    //     var button = $(this);
    //     var page = button.data('page');
    //     var loaded = button.data('loaded');
    //     var total = button.data('total');
    //     var loader = button.find('img');

    //     loader.removeClass('d-none');

    //     $.ajax({
    //         url: '{{ url(' / publications ') }}?page=' + page,
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(res) {
    //             $('#publicationContainer').append(res.html);

    //             // Update counts
    //             var newLoaded = loaded + res.count;
    //             button.data('page', page + 1);
    //             button.data('loaded', newLoaded);

    //             if (newLoaded >= total) {
    //                 button.addClass('d-none');
    //             }

    //             loader.addClass('d-none');
    //         },
    //         error: function() {
    //             // alert('Failed to load more publications.');
    //             loader.addClass('d-none');
    //         }
    //     });
    // });
    $(document).ready(function() {
        let page = parseInt($('#loadMorePublications').data('page')) || 2;
        let loaded = parseInt($('#loadMorePublications').data('loaded')) || 0;
        const total = parseInt($('#loadMorePublications').data('total')) || 0;
        let loading = false;

        const isMobile = $(window).width() < 768; // Bootstrap md breakpoint

        if (isMobile) {
            // Mobile: Load More button
            $('#loadMorePublications').on('click', function() {
                if (loading || loaded >= total) return;

                loading = true;
                var button = $(this);
                var loader = button.find('img');
                loader.removeClass('d-none');

                $.ajax({
                    url: '{{ url("publications") }}',
                    type: 'GET',
                    data: {
                        page: page
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#publicationContainer').append(res.html);

                        loaded += res.count;
                        page++;

                        button.data('page', page);
                        button.data('loaded', loaded);

                        if (loaded >= total || res.count === 0) {
                            button.addClass('d-none');
                        }
                    },
                    complete: function() {
                        loading = false;
                        loader.addClass('d-none');
                    },
                    error: function() {
                        console.error('Failed to load more publications.');
                        loading = false;
                        loader.addClass('d-none');
                    }
                });
            });
        } else {
            // Desktop: Infinite scroll
            $(window).scroll(function() {
                if (loading || loaded >= total) return;

                if ($(window).scrollTop() + $(window).height() + 100 >= $(document).height()) {
                    loading = true;
                    $('#loadMorePublications img').removeClass('d-none');

                    $.ajax({
                        url: '{{ url("publications") }}',
                        type: 'GET',
                        data: {
                            page: page
                        },
                        dataType: 'json',
                        success: function(res) {
                            $('#publicationContainer').append(res.html);

                            loaded += res.count;
                            page++;

                            $('#loadMorePublications').data('page', page);
                            $('#loadMorePublications').data('loaded', loaded);

                            if (loaded >= total || res.count === 0) {
                                $(window).off('scroll');
                                $('#loadMorePublications').addClass('d-none');
                            }
                        },
                        complete: function() {
                            loading = false;
                            $('#loadMorePublications img').addClass('d-none');
                        },
                        error: function() {
                            console.error('Failed to load more publications.');
                            loading = false;
                            $('#loadMorePublications img').addClass('d-none');
                        }
                    });
                }
            });
        }
    });
</script>
@endpush