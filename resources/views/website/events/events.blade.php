@extends('website.layout.master')

@section('content')
<section id="" class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white titleH1">Events</h1>
    </div>
    <img src="{{ asset('website/assets/images/banner_events.png') }}" class="w-100 img-fluid forMobBanner minScreenBG"
        alt="Bootstrap Themes" />
</section>
<!-- banner section ends here -->

<!-- Text and City Picture section starts -->
<section class="events_main my-5">
    <div class="events_container container-fluid px-5 pt-2 pb-5">
        <div class="events-container" id="eventscrads">
            @foreach ($events as $event)
            <div class="event-card">
                <div class="event-img col-md-12">
                    <a href="{{ route('events.show', $event->slug) }}">
                        <img src="{{ $event->thumbnail_image }}" alt="Event Image" class="news-card-img">
                    </a>
                </div>
                <div class="event-content col-md-12 p-0">
                    <div class="d-flex align-items-center gap-2 text-muted-c small">
                        <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon" class="icon-sm">
                        <span>{{ \Carbon\Carbon::parse($event->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="news-card-title"> <a href="{{ route('events.show', $event->slug) }}"
                            class="news-card-title">{{ \Illuminate\Support\Str::limit($event->title, 63) }}</a></div>
                    <div class="news-card-text">
                        <!-- {{ \Illuminate\Support\Str::limit($event->short_description, 200) }} -->
                        {{ $event->short_description }}
                    </div>
                    <hr class="opacity-25 w-100">
                    <div class="events_footer_card">
                        <!-- <a href="{{ url('/events/' . $event->slug) }}" class="read-more" data-post-url="{{ $event->slug }}">Read More</a> -->
                        <a href="{{ route('events.show', $event->slug) }}" class="readmoreBtn">Read More</a>

                        <!-- <a href="{{ $event->share_link ?? '#' }}" class="share_social share-blog-hit">
                        <img src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="">
                      </a> -->

                        <a href="javascript:void(0);" class="share_social share-blog-hit"
                            data-url="{{ route('events.show', $event->slug) }}" data-title="{{ $event->title }}">
                            <img src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="">
                        </a>


                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- <div class="row g-4 addmoreevents text-center {{ $events->count() >= $total ? 'd-none' : '' }} ">
            <button class="mx-auto" id="loadMoreEvents" data-page="2" data-loaded="{{ $events->count() }}"
                data-total="{{ $total }}">
                <span>Load More</span>
                <img src="{{ asset('website/assets/images/loading.svg') }}" alt="" class="d-none">
            </button>
        </div> -->
        <!-- Loader -->
        <div id="infinite-loader" class="text-center my-3 d-none">
            <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
        </div>

        <div class="text-center my-4 d-md-none" id="loadMoreWrapperEvents">
            <button class="mx-auto" id="loadMore">Load More</button>
            <div class="mt-2 d-none" id="loadMoreLoaderEvents">
                <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
            </div>
        </div>
</section>




<!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const descriptions = document.querySelectorAll(".event-description");
            const maxLength = 280;
            descriptions.forEach(function(desc) {
                const fullText = desc.textContent.trim();

                if (fullText.length > maxLength) {
                    let shortened = fullText.substring(0, maxLength);
                    shortened = shortened.substring(0, shortened.lastIndexOf(" "));
                    desc.textContent = shortened + "...";
                }
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(
                '#eventscrads .event-card'); // Assuming .card is the class for each card
            const loadMoreButton = document.querySelector('#loadMore');
            const eventsContainer = document.querySelector('#eventscrads');

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
    </script> -->
@endsection


@push('js_code')
<script>
    $(document).ready(function() {
        let page = 2;
        const total = parseInt("{{ $total }}");
        let loaded = parseInt("{{ $events->count() }}");
        let loading = false;

        // Detect mobile
        const isMobile = $(window).width() < 768; // Bootstrap md breakpoint

        if (isMobile) {
            // Mobile: Load More button
            $('#loadMore').on('click', function() {
                if (loading || loaded >= total) return;

                loading = true;
                $('#loadMoreLoaderEvents').removeClass('d-none');
                $(this).prop('disabled', true);

                $.ajax({
                    url: "{{ url('events') }}",
                    type: "GET",
                    data: {
                        page: page
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.html.trim() !== "") {
                            $('#eventscrads').append(data.html);
                            loaded += data.count;
                            page++;
                        }

                        if (loaded >= total || data.html.trim() === "") {
                            $('#loadMoreWrapperEvents').hide();
                        }
                    },
                    complete: function() {
                        loading = false;
                        $('#loadMoreLoaderEvents').addClass('d-none');
                        $('#loadMore').prop('disabled', false);
                    },
                    error: function() {
                        console.error('Could not load more events.');
                        loading = false;
                        $('#loadMoreLoaderEvents').addClass('d-none');
                        $('#loadMore').prop('disabled', false);
                    }
                });
            });
        } else {
            // Desktop: Infinite scroll
            $(window).scroll(function() {
                if (loading) return;
                if ($(window).scrollTop() + $(window).height() + 100 >= $(document).height()) {
                    if (loaded >= total) return;

                    loading = true;
                    $('#infinite-loader').removeClass('d-none');

                    $.ajax({
                        url: "{{ url('events') }}?page=" + page,
                        type: "GET",
                        success: function(data) {
                            if (data.html.trim() !== "") {
                                $('#eventscrads').append(data.html);
                                loaded += data.count;
                                page++;
                            }
                        },
                        complete: function() {
                            loading = false;
                            $('#infinite-loader').addClass('d-none');
                        },
                        error: function() {
                            console.error('Could not load more events.');
                            loading = false;
                            $('#infinite-loader').addClass('d-none');
                        }
                    });
                }
            });
        }
    });
</script>

@endpush
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