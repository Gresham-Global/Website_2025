<div class="customSection blog-wrapper">
 {{-- Title --}}
        <h1 class="blog-title text-center">
            {{ $news->title }}
        </h1>
    @if($news->video_link)
    <iframe
        class="blog-video"
        src="{{ $news->video_link }}"
        frameborder="0"
        allowfullscreen>
    </iframe>
    @endif

    <div class="customContainer mediaCon">

        <div class="blog-content text-start mb-5">
            {!! $news->description !!}
        </div>

        @php
        $galleryImages = is_string($news->gallery_images)
        ? json_decode($news->gallery_images, true)
        : $news->gallery_images;
        @endphp

        @if(!empty($galleryImages) && is_array($galleryImages))
        <div class="row-gallery">
            <div class="swiper rowSwiper-{{ $news->id }}">
                <div class="swiper-wrapper">

                    @foreach($galleryImages as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image) }}" alt="{{ $news->title }}">
                    </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>
            </div>
        </div>
        @endif

    </div>
</div>

<style>
    /* Row Gallery */
    .row-gallery {
        width: 100%;
        margin-bottom: 60px;
    }

    .row-gallery .swiper {
        width: 100%;
        padding-bottom: 40px;
    }

    .row-gallery .swiper-slide {
        height: 320px;
        overflow: hidden;
        border-radius: 12px;
    }

    .row-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Controls */
    .row-gallery .swiper-button-next,
    .row-gallery .swiper-button-prev {
        color: #000;
    }

    .row-gallery .swiper-pagination-bullet {
        background: rgba(0, 0, 0, 0.4);
    }

    .row-gallery .swiper-pagination-bullet-active {
        background: #000;
    }
</style>
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".rowSwiper-{{ $news->id }}", {
        loop: true,
        speed: 700,
        spaceBetween: 24,

        slidesPerView: 3,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            }
        },

        pagination: {
            el: ".rowSwiper-{{ $news->id }} .swiper-pagination",
            clickable: true,
        },

        navigation: {
            nextEl: ".rowSwiper-{{ $news->id }} .swiper-button-next",
            prevEl: ".rowSwiper-{{ $news->id }} .swiper-button-prev",
        },
    });
});
</script>
@endpush