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

    /* Make sure these override default slick theme */

    section.similar_newsandblogs ul.slick-dots li button:before {
        display: none;
    }

    /* Slick dots container */
    section.similar_newsandblogs .slick-dots {
        display: flex !important;
        justify-content: center;
        align-items: center;
        /* bottom: 15px; */
        gap: 1rem;
    }

    /* Dot button (default) */
    section.similar_newsandblogs .slick-dots li button {
        font-size: 0;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgb(92, 85, 85);
        /* light gray */
        border: none;
        transition: all 0.3s ease;
        width: 20px;
        border-radius: 10px;
        background: #D9D9D9;

        height: 18px;
    }

    /* Active dot */
    section.similar_newsandblogs .slick-dots li.slick-active button {
        width: 31px;
        border-radius: 10px;
        background: #EF4B4F;
        height: 18px;
    }

    section.similar_newsandblogs .event-img img {
        width: 100%;
        height: auto;
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
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

        /* Active dot */
        section.similar_newsandblogs .slick-dots li.slick-active button {
            width: 26px;
            height: 15px;
        }

        section.events_main .events_container {
            padding: 0 20px 20px !important;
            margin-bottom: 5rem !important;
            /* margin-top: 1rem !important; */
        }
    }
</style>
<section id="" class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white titleH1">Events</h1>
    </div>
    <img src="{{ asset('website/assets/images/banner_events.png') }}" class="w-100 img-fluid forMobBanner minScreenBG"
        alt="{{ $event->title }}" />
</section>

<div class="customSection">
    <div class="customContainer mediaCon" style="font-family: 'Proxima Nova';">
        <h1 class="text-center">{{ $event->title }}</h1>

        <p class="text-center my-3" style="font-size: 20px; font-family: 'Proxima Nova';">
            {!! ($event->description) !!}
        </p>

        @if($event->video_link)
        <div class="video-container text-center my-4">
            <iframe width="100%" height="800" src="{{ $event->video_link }}" frameborder="0" allowfullscreen></iframe>
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
                        @if($uniqueCityIds->count() > 1)
                            <button class="city-button active" data-city="all">All Cities</button>
                        @endif
                    
                        @foreach($uniqueCityIds as $cityId)
                            @php
                                $city = $cities[$cityId];
                                $cityName = $city->city_name;
                            @endphp
                            <button class="city-button {{ $uniqueCityIds->count() === 1 ? 'active' : '' }}"
                                data-city="{{ $cityName }}">
                                {{ $cityName }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="image-gallery">
                {{-- City-specific images --}}
                @foreach($cityImages as $image)
                @php
                $cityName = $cities[$image->city_id]->city_name ?? '';
                @endphp
                <img src="{{ asset( $image->image_path) }}" alt="{{$image->caption}}" data-city="{{ $cityName }}" />
                @endforeach

                {{-- Global images (city_id is NULL) --}}
                @foreach($eventWideImages as $image)
                <img src="{{ asset( $image->image_path) }}" alt="{{$image->caption}}" data-city="all" />
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@if(($cityImages && $cityImages->isNotEmpty()))
<script>
    function shuffleImages() {
        const gallery = document.getElementById("image-gallery");
        const images = Array.from(gallery.getElementsByTagName("img"));
        for (let i = images.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [images[i], images[j]] = [images[j], images[i]];
        }
        gallery.innerHTML = "";
        images.forEach(img => gallery.appendChild(img));
    }

    window.onload = shuffleImages;
</script>
@endif

@endsection