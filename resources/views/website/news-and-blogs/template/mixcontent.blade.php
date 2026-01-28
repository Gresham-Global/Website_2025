<div class="customSection blog-wrapper">

    {{-- VIDEO --}}
    @if($news->video_link)
    <div class="video-wrapper mb-5">
        <iframe src="{{ $news->video_link }}" frameborder="0" allowfullscreen></iframe>
    </div>
    @endif

    @php
    $galleryImages = is_string($news->gallery_images)
    ? json_decode($news->gallery_images, true)
    : ($news->gallery_images ?? []);
    @endphp

    {{-- MASONRY IMAGE GALLERY --}}
    @if(!empty($galleryImages) && is_array($galleryImages))
    <section class="masonry-gallery">
        @foreach($galleryImages as $image)
        <figure class="masonry-item">
            <img src="{{ asset($image) }}" alt="{{ $news->title }}">
            {{-- Optional caption --}}
            {{-- <figcaption>Image caption here</figcaption> --}}
        </figure>
        @endforeach
    </section>
    @endif

    {{-- ARTICLE CONTENT --}}
    <div class="customContainer mediaCon mt-5">
        <div class="blog-content">
            {!! $news->description !!}
        </div>
    </div>
</div>

<style>
    /* Masonry gallery */
    .masonry-gallery {
        column-count: 3;
        column-gap: 20px;
        margin: 40px auto;
        max-width: 1200px;
    }

    .masonry-item {
        break-inside: avoid;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .masonry-item img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        object-fit: cover;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .masonry-item img:hover {
        transform: scale(1.03);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .masonry-item figcaption {
        font-size: 14px;
        color: #666;
        text-align: center;
        margin-top: 6px;
    }

    /* Video */
    .video-wrapper iframe {
        width: 100%;
        height: 500px;
        border-radius: 12px;
    }

    /* ARTICLE TEXT */
    .blog-content {
        max-width: 900px;
        margin: 50px auto;
        font-size: 18px;
        line-height: 1.8;
        color: #222;
    }

    /* Drop caps for first paragraph */
    .blog-content p:first-of-type::first-letter {
        font-size: 3rem;
        font-weight: 700;
        float: left;
        margin-right: 10px;
        line-height: 1;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .masonry-gallery {
            column-count: 2;
        }
    }

    @media (max-width: 768px) {
        .masonry-gallery {
            column-count: 1;
        }

        .video-wrapper iframe {
            height: 300px;
        }

        .blog-content p:first-of-type::first-letter {
            font-size: 2.5rem;
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