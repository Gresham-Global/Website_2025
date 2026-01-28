<div class="customSection blog-wrapper split-layout">
    <div class="customContainer">

        <div class="content-wrap">

            <h1 class="blog-title">{{ $news->title }}</h1>

            @php
            $galleryImages = is_string($news->gallery_images)
            ? json_decode($news->gallery_images, true)
            : $news->gallery_images;
            @endphp

            @if(!empty($galleryImages) && is_array($galleryImages))
            <!-- FLOATING IMAGE SLIDER -->
            <div class="floating-gallery">
                <div class="swiper fullscreenSwiper-{{ $news->id }}">
                    <div class="swiper-wrapper">
                        @foreach($galleryImages as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset($image) }}" alt="{{ $news->title }}">
                        </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            @endif

            <!-- TEXT CONTENT -->
            <div class="blog-content">
                {!! $news->description !!}
            </div>

        </div>

    </div>
</div>

<style>
    .content-wrap {
        font-family: 'Inter', sans-serif;
        margin-bottom: 25px;
        padding: 40px 0;
    }

    /* FLOATING SLIDER */
    .floating-gallery {
        float: right;
        width: 45%;
        margin: 10px 0 25px 30px;
        background: rgba(0,0,0,0.25);
        padding: 15px;
    }

    /* IMAGE FIT */
    .floating-gallery img {
        width: 100%;
        height: auto;
        object-fit: contain;
        display: block;
    }

    /* CLEAR FLOAT AFTER CONTENT */
    .content-wrap::after {
        content: "";
        display: block;
        clear: both;
    }

    /* TYPOGRAPHY */
    .blog-title {
        font-size: 38px;
        margin-bottom: 25px;
    }

    .blog-content p {
        font-size: 18px;
        line-height: 1.9;
        margin-bottom: 20px;
    }

    /* MOBILE */
    @media (max-width: 991px) {
        .floating-gallery {
            float: none;
            width: 100%;
            margin: 0 0 30px;
        }
    }


    .split-layout {
        background: #fff;
        font-family: 'Inter', sans-serif;
    }

    /* TEXT PANEL */
    .text-panel {
        padding: 20px 20px;
        background: #fafafa;
    }

    .text-inner {
        /* max-width: 560px; */
    }

    .blog-title {
        font-size: 38px;
        font-weight: 600;
        line-height: 1.3;
        margin-bottom: 30px;
        color: #111;
    }

    /* CONTENT */
    .blog-content p {
        font-size: 18px;
        line-height: 1.9;
        color: #333;
        margin-bottom: 20px;
    }

    .blog-content h2 {
        font-size: 26px;
        margin: 40px 0 18px;
    }

    .blog-content blockquote {
        border-left: 4px solid #000;
        padding-left: 18px;
        font-size: 22px;
        font-style: italic;
        margin: 40px 0;
    }

    /* IMAGE PANEL */
    .image-panel {
        padding: 20px;
        background: #000;
    }

    /* Swiper height adapts to image */
    .gallery-wrapper {
        width: 100%;
    }

    .fullscreenSwiper- {
            {
            $news->id
        }
    }

        {
        width: 100%;
    }

    /* IMAGE — NO CROP */
    .fullscreen-gallery img,
    .swiper-slide img {
        width: 100%;
        height: auto;
        object-fit: contain;
        /* 🔑 FIX */
        display: block;
    }

    /* Swiper UI */
    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
    }

    .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.6);
    }

    .swiper-pagination-bullet-active {
        background: #fff;
    }

    /* MOBILE */
    @media (max-width: 992px) {
        .text-panel {
            padding: 40px 25px;
        }

        .blog-title {
            font-size: 30px;
        }

        .image-panel {
            padding: 25px;
        }
    }
</style>
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".fullscreenSwiper-{{ $news->id }}", {
            slidesPerView: 1,
            loop: true,
            speed: 800,

            pagination: {
                el: ".fullscreenSwiper-{{ $news->id }} .swiper-pagination",
                clickable: true,
            },

            navigation: {
                nextEl: ".fullscreenSwiper-{{ $news->id }} .swiper-button-next",
                prevEl: ".fullscreenSwiper-{{ $news->id }} .swiper-button-prev",
            },

            keyboard: {
                enabled: true,
            }
        });
    });
</script>
@endpush