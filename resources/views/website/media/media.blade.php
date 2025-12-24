@extends('website.layout.master')
@section('content')
<!-- banner section starts here -->
<x-banner-section type="media" title="Media" />
<!-- <section class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white  titleH1">Media</h1>
    </div>
    <img src="{{ asset('website/assets/images/bannermedia44.png') }}" alt="" class="w-100 forMobBanner d-none d-md-block" />
    <img src="{{ asset('website/assets/images/mediamobilebanner.png') }}" alt="" class="w-100 forMobBanner d-block d-md-none" />

</section> -->
<!-- Media section -->

<section class="customSection my-5">
    <div class="customContainer mediaCon">
        <div class="row g-4" id="mediaContainer">
            @foreach ($media as $item)
            <div class="col-md-6 col-lg-4 ">
                <div class="news-card h-100 d-flex flex-column">
                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <!-- <a href="{{ $item->media_link }}" target="_blank">
                            <img src="{{ asset($item->thumbnail_image) }}" alt="News Image" class="news-card-img">
                        </a> -->
                        @php

                        $images = is_array(json_decode($item->thumbnail_image))
                        ? json_decode($item->thumbnail_image)
                        : ($item->thumbnail_image ? [$item->thumbnail_image] : ['/storage/default-fallback.png']);
                        @endphp
                        <div class="swiper imageSwiper">
                            <div class="swiper-wrapper">

                                @foreach ($images as $image)
                                <div class="swiper-slide">
                                    <div class="news-card-img-wrapper">
                                        <a href="{{ $item->media_link }}" target="_blank">
                                            <img src="{{ asset($image) }}"
                                                alt="News Image"
                                                class="news-card-img">
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        {{-- <div class="d-flex align-items-center gap-2 text-muted small">
                                    <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                        class="icon-sm">
                        <span>{{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('d M Y | h:i A \I\S\T') }}</span>
                    </div> --}}

                    <img src="{{ asset($item->logo_image) }}" alt="" class="repiblicimg my-2">

                    <a href="{{ $item->media_link }}" target="_blank">
                        <h5 class="news-card-title">{{ $item->title }}</h5>
                    </a>

                    <p class="news-card-text flex-grow-1">
                        {{ \Illuminate\Support\Str::limit($item->short_description, 120) }}
                    </p>

                    <hr class="opacity-25">

                    <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                        <a href="{{ $item->media_link }}" target="_blank" class="readmoreBtn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row g-4 addmoreBlogs text-center {{ $media->count() >= $total ? 'd-none' : '' }}">
        <button id="loadMoreMedia" data-page="2" data-loaded="{{ $media->count() }}"
            data-total="{{ $total }}">
            <span>Load More</span>
            <img src="{{ asset('website/assets/images/loading.svg') }}" alt="" class="d-none">
        </button>
    </div>

    {{-- Optional Pagination (if you decide to paginate properly) --}}
    {{-- <div class="mt-4 d-flex justify-content-center">
      {{ $media->links() }}
    </div> --}}
    </div>
</section>
@endsection

@push('css')
<style>

</style>
@endpush

@push('js_code')
<script>
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

        // Load More Media AJAX
        $('#loadMoreMedia').click(function() {
            let button = $(this);
            let page = parseInt(button.data('page'));
            let total = parseInt(button.data('total'));
            let loaded = parseInt(button.data('loaded'));
            let loader = button.find('img');

            loader.removeClass('d-none');

            $.ajax({
                url: "{{ url('media') }}?page=" + page,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.count === 0) {
                        button.hide();
                    } else {
                        $('#mediaContainer').append(response.html);

                        // Re-initialize Swipers for new items
                        initializeSwipers();

                        loaded += response.count;
                        button.data('page', page + 1);
                        button.data('loaded', loaded);
                        if (loaded >= total) {
                            button.hide();
                        }
                    }
                    loader.addClass('d-none');
                },
                error: function() {
                    loader.addClass('d-none');
                }
            });
        });

    });
</script>
@endpush