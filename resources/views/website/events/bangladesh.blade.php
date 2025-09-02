@extends('website.layout.master')

@section('meta')
    <meta name="robots" content="noindex, nofollow">
@endsection

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
<div class="customSection">
  <div class="customContainer mediaCon" style="font-family: 'Proxima Nova';
">
    <h1 class="text-center">Gresham Connect Bangladesh</h1>
    <p class="text-center my-3" style="font-size: 20px; font-family: 'Proxima Nova';">
      Gresham Connect Bangladesh brought together leading universities, recruitment partners, and industry experts to explore the evolving landscape of international education in Bangladesh. The event provided a platform for meaningful discussions on market trends, student mobility, and collaborative opportunities, fostering stronger connections between institutions and education professionals. Through insightful conversations and strategic networking, Gresham Connect Bangladesh reinforced our commitment to fostering partnerships that drive international education forward.</p>


    <script>
      function shuffleImages() {
        const gallery = document.getElementById("image-gallery");
        const images = Array.from(gallery.getElementsByTagName("img"));

        // Shuffle the array of images
        for (let i = images.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1));
          [images[i], images[j]] = [images[j], images[i]]; // Swap elements
        }

        // Clear the gallery and append images in new random order
        gallery.innerHTML = "";
        images.forEach(img => gallery.appendChild(img));
      }

      // Shuffle images when the page is loaded
      window.onload = shuffleImages;
    </script>

    
    <div class="category-section mediaCon">
      <div class="citybox">
        <div class="city-buttons">
          <button class="hidecity city-button active" data-city="all">All Cities</button>
          <button class="city-button" data-city="bangladesh">Bangladesh</button>
          <!-- <button class="city-button" data-city="bengaluru">Bengaluru</button>
          <button class="city-button" data-city="delhi">Delhi</button> -->
        </div>
      </div>

      <div class="image-gallery">
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh1.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh2.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh3.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh4.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh5.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh6.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh7.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh8.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh9.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh10.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh11.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh12.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh13.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh14.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh15.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh16.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh17.webp') }}" alt="Event" data-city="bangladesh" />
        <img src="{{ asset('website/assets/images/bangladesh/bangladesh18.webp') }}" alt="Event" data-city="bangladesh" />
      </div>
      
    </div>
  </div>
</div>


</div>

@endsection