@extends('website.layout.master')
@section('content')

<section id="" class="about-banner-background firstSection customSection">
  <div class="customContainer firstContainer">
    <h1 class="text-white titleH1">News and Blogs</h1>
  </div>
  <img src="{{ asset('website/assets/images/banner_events.png') }}" class="w-100 img-fluid forMobBanner minScreenBG"
    alt="{{$news_and_blogs->title }}" />
</section>

<div class="customSection">
  <div class="customContainer mediaCon" style="font-family: 'Poppins', sans-serif;">
    <h2 class="text-center">{{$news_and_blogs->title }}</h2>

    <p class="text-center my-3" style="font-size: 22px; font-family: 'Poppins', sans-serif;">
      {!! ($news_and_blogs->description) !!}

    </p>

    @if($news_and_blogs->video_link)
    <div class="video-container text-center my-4">
      <iframe width="100%" height="800" src="{{$news_and_blogs->video_link }}" frameborder="0" allowfullscreen></iframe>
    </div>
    @endif



    {{-- Gallery Images – optional if you store them in DB --}}
    @if(isset($news_and_blogs->gallery_images) && is_array($news_and_blogs->gallery_images))
    <div class="image-gallery" id="image-gallery">
      @foreach($news_and_blogs->gallery_images as $image)
      <img src="{{ asset('storage/events/' . $image) }}" alt="{{$news_and_blogs->title }} image" data-city="bangladesh" />
      @endforeach
    </div>
    @endif

  </div>
</div>

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

@endsection