@extends('website.layout.master')
@section('content')

<style>
    #similar_newsandblogs_event {
        width: 100%;
        display: block;
    }

    #similar_newsandblogs_event .slick-slide {
        display: flex !important;
        justify-content: center;
    }

    #similar_newsandblogs_event .slick-track {
        display: flex !important;
        gap: 1rem;
        padding: 1rem;
        justify-content: flex-start !important;
        margin: 0 !important;
    }

    section.similar_newsandblogs .event-card .event-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        min-height: 19rem;
    }

    section.similar_newsandblogs ul.slick-dots li button:before {
        display: none;
    }

    section.similar_newsandblogs .slick-dots {
        display: flex !important;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }

    section.similar_newsandblogs .slick-dots li button {
        font-size: 0;
        width: 20px;
        height: 18px;
        border-radius: 10px;
        background: #D9D9D9;
        border: none;
        transition: all 0.3s ease;
    }

    section.similar_newsandblogs .slick-dots li.slick-active button {
        width: 31px;
        background: #e32636;
    }

    section.similar_newsandblogs .event-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media screen and (max-width: 1240px) {
        section.similar_newsandblogs .event-card .event-img {
            min-height: 15rem !important;
        }

        section.similar_newsandblogs .slick-list {
            overflow: unset !important;
            display: flex;
            justify-content: center !important;
        }
    }

    @media screen and (max-width: 640px) {
        section.similar_newsandblogs .slick-dots li button {
            width: 20px;
            height: 15px;
        }

        section.similar_newsandblogs .slick-dots li.slick-active button {
            width: 26px;
            height: 15px;
        }
    }
</style>

<section class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white titleH1">Events</h1>
    </div>
    <img src="{{ asset('website/assets/images/banner_events.png') }}"
        class="w-100 img-fluid forMobBanner minScreenBG"
        alt="{{ $event->title }}" />
</section>

<div class="customSection">
    <div class="customContainer mediaCon">
        <h2 class="text-center">{{ $event->title }}</h2>

        <p class="text-center my-3" style="font-size:18px;">
            {!! $event->description !!}
        </p>

        @if($event->video_link)
        <div class="video-container text-center my-4">
            <iframe width="100%" height="800"
                src="{{ $event->video_link }}"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
        @endif

        @if(($cityImages && $cityImages->isNotEmpty()))
        @php
        $uniqueCityIds = $cityImages->pluck('city_id')->unique();
        $cities = \App\Models\City::whereIn('id', $uniqueCityIds)->get()->keyBy('id');
        @endphp

        <div class="category-section mediaCon {{ $event->video_link == '' ? 'mt-5' : ''}}">
            @if($uniqueCityIds->count() > 1)
            <div class="citybox">
                <div class="city-buttons">
                    <button class="city-button active" data-city="all">All Cities</button>
                    @foreach($uniqueCityIds as $cityId)
                    <button class="city-button" data-city="{{ $cities[$cityId]->city_name }}">
                        {{ $cities[$cityId]->city_name }}
                    </button>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="image-gallery">
                @foreach($cityImages as $image)
                @php $cityName = $cities[$image->city_id]->city_name ?? ''; @endphp
                <img src="{{ asset($image->image_path) }}"
                    alt="{{ $image->caption }}"
                    data-city="{{ $cityName }}">
                @endforeach

                @foreach($eventWideImages as $image)
                <img src="{{ asset($image->image_path) }}"
                    alt="{{ $image->caption }}"
                    data-city="all">
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@if(($cityImages && $cityImages->isNotEmpty()))
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const buttons = document.querySelectorAll('.city-button');
        let images = document.querySelectorAll('.image-gallery img');

        /* ---------------------------------
           REMOVE DUPLICATES (ALL CITIES)
        --------------------------------- */
        const seen = new Set();
        images.forEach(img => {
            if (seen.has(img.src)) {
                img.remove();
            } else {
                seen.add(img.src);
            }
        });

        images = document.querySelectorAll('.image-gallery img');

        /* ---------------------------------
           GLIGHTBOX SETUP (NO DOWNLOAD)
        --------------------------------- */
        images.forEach(img => {
            img.classList.add('glightbox');
            img.setAttribute('data-gallery', 'event-gallery');
            img.setAttribute('data-src', img.src);
            img.style.display = 'block';
        });

        let lightbox = GLightbox({
            selector: '.glightbox',
            download: false
        });

        /* ---------------------------------
           CITY FILTER
        --------------------------------- */
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const city = this.dataset.city;

                buttons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                images.forEach(img => {
                    img.style.display =
                        (city === 'all' || img.dataset.city === city) ?
                        'block' :
                        'none';
                });

                lightbox.destroy();
                lightbox = GLightbox({
                    selector: '.glightbox',
                    download: false
                });
            });
        });

        /* ---------------------------------
           DOWNLOAD IMAGE ON CLICK
        --------------------------------- */
        /* ---------------------------------
ADD DOWNLOAD OVERLAY BUTTON
--------------------------------- */
        images.forEach(img => {


            // Wrap image
            const wrapper = document.createElement('div');
            wrapper.classList.add('img-wrap');
            img.parentNode.insertBefore(wrapper, img);
            wrapper.appendChild(img);


            // Create download button
            const btn = document.createElement('button');
            btn.className = 'download-btn fa-solid fa-download';
            btn.innerText = '';


            wrapper.appendChild(btn);


            // Download logic
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                e.preventDefault();


                const city = img.dataset.city || 'all';
                const timestamp = new Date()
                    .toISOString()
                    .replace(/[-:]/g, '')
                    .replace('T', '_')
                    .split('.')[0];


                const filename = `${city}_${timestamp}.jpg`;


                const link = document.createElement('a');
                link.href = img.src;
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });


    });
</script>
@endif

<style>
    p,
    span {
        font-family: "Poppins", sans-serif;
        font-size: 18px !important;
        line-height: 28px !important;
    }

    .image-gallery {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .image-gallery img {
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
    }

    @media (min-width: 768px) {
        .image-gallery {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .image-gallery {
            grid-template-columns: repeat(5, 1fr);
        }
    }

    .gdesc-inner {
        display: none !important;
    }

    .image-gallery {
        position: relative;
    }


    .image-gallery .img-wrap {
        position: relative;
    }


    .download-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #e32636;
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 6px 10px;
        font-size: 14px;
        cursor: pointer;
        z-index: 5;
        opacity: 0;
        transition: opacity 0.3s ease;
       
        font-size: 1rem;
       
        cursor: pointer;
        transition: background-color 0.3s ease;
     
    }


    .img-wrap:hover .download-btn {
        opacity: 1;
    }
</style>

@endsection