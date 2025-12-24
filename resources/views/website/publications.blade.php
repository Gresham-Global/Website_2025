@extends('website.layout.master')
@section('content')
<!-- banner section starts here -->
<!-- <section class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white  titleH1">Publications</h1>
    </div>
    <img src="{{ asset('website/assets/images/banner_event_publi.webp') }}"
        class="w-100 forMobBanner d-none d-md-block" alt="" />
    <img src="{{ asset('website/assets/images/banner_event_publi_mb.webp') }}"
        class="w-100 forMobBanner d-block d-md-none" alt="" />

</section> -->
<x-banner-section type="publication" title="Publications" />
<!-- Media section -->





<section class="customSection my-5">
    <div class="customContainer mediaCon publicationscrads">
        <div class="row g-4 publication-container" id="publicationContainer">
            @foreach ($publications as $publication)
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4 ">
                <div class="news-card publication-card h-100 d-flex flex-column">

                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <a href="{{ route('publications.show', $publication->slug) }}" target="_blank">
                            <img src="{{ $publication->thumbnail_image }}" alt="News Image" class="news-card-img">
                        </a>
                        <!-- <div class="d-flex align-items-center gap-2 text-muted small">
          <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon" class="icon-sm">
          <span>12 March 2025 | 5:56 IST</span>
          </div> -->
                        <a href="{{ route('publications.show', $publication->slug) }}" target="_blank">
                            <h5 class="news-card-title">{{ $publication->title }}</h5>
                        </a>
                        <p class="news-card-text flex-grow-1">{{ $publication->short_description }} ...</p>
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

    </div>
</section>
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
    $('#loadMorePublications').on('click', function() {
        var button = $(this);
        var page = button.data('page');
        var loaded = button.data('loaded');
        var total = button.data('total');
        var loader = button.find('img');

        loader.removeClass('d-none');

        $.ajax({
            url: '{{ url(' / publications ') }}?page=' + page,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                $('#publicationContainer').append(res.html);

                // Update counts
                var newLoaded = loaded + res.count;
                button.data('page', page + 1);
                button.data('loaded', newLoaded);

                if (newLoaded >= total) {
                    button.addClass('d-none');
                }

                loader.addClass('d-none');
            },
            error: function() {
                // alert('Failed to load more publications.');
                loader.addClass('d-none');
            }
        });
    });
</script>
@endpush