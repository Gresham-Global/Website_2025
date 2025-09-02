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
    <h1 class="text-center">Gresham Annual Counsellors Conference (GACC) 2024</h1>
    <p class="text-center my-3" style="font-size: 20px; font-family: 'Proxima Nova';
">
      GACC is an annual conference for counsellors supporting high school students in their
      career transitions. This flagship event aimed to provide counsellors with insights and
      information on new career options, empowering them with diverse pathways from top UK,
      Canada and European universities. Participants explored unconventional courses and
      connected with key resources to serve students’ needs. The conference also
      featured esteemed speakers sharing insights into the evolving education landscape, offering
      a unique opportunity for knowledge-sharing and networking among peers.
    </p>


    <!-- <div class="embed-responsive embed-responsive-16by9"> -->
    <!-- <iframe id="video-player" width="100%" height="800",src="https://www.youtube.com/embed/sMtxEb8WBGc?enablejsapi=1&autoplay=1&mute=1" frameborder="0"
allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
    <!-- <iframe width="100%" height="800" src="https://www.youtube-nocookie.com/embed/sMtxEb8WBGc?si=5_-cRsaOtlu5nTH9&autoplay=1&mute=1&start=33" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div> -->
    <div class="embed-responsive embed-responsive-16by9 desktop-view">
      <iframe width="100%" height="800" src="https://www.youtube-nocookie.com/embed/sMtxEb8WBGc?si=5_-cRsaOtlu5nTH9&autoplay=1&mute=1&start=33" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <div class="embed-responsive embed-responsive-16by9 mobile-view">
      <iframe width="100%" height="400" src="https://www.youtube-nocookie.com/embed/sMtxEb8WBGc?si=5_-cRsaOtlu5nTH9&autoplay=1&mute=1&start=10" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <script>
      // This function is triggered when the YouTube Iframe API is ready
      function onYouTubeIframeAPIReady() {
        var player = new YT.Player('video-player', {
          videoId: 'sMtxEb8WBGc', // Add the YouTube video ID here
          playerVars: {
            'autoplay': 1, // Enable autoplay
            'mute': 1, // Mute the video to bypass autoplay restrictions
            'modestbranding': 1,
            'rel': 0,
            'controls': 1,
            'start': 33
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // This function is triggered when the player is ready
      function onPlayerReady(event) {
        event.target.playVideo(); // Automatically play the video when it's ready
      }

      // This function is triggered when the player's state changes (e.g., video ends)
      function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.ENDED) {
          // When the video ends, restart the video
          event.target.seekTo(0);
          event.target.playVideo();
        }
      }

      // Load the YouTube Iframe API
      var tag = document.createElement('script');
      tag.src = 'https://www.youtube.com/iframe_api';
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    </script>
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
          <button class="city-button active" data-city="all">All Cities</button>
          <button class="city-button" data-city="mumbai">Mumbai</button>
          <button class="city-button" data-city="bengaluru">Bengaluru</button>
          <button class="city-button" data-city="delhi">Delhi</button>
        </div>
      </div>


      <div class="image-gallery">
        <!-- Mumbai event pictures -->
        <img src="{{ asset('website/assets/images/mumbai/img1.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img2.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img3.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img4.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img5.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img6.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img7.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img8.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img9.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img10.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img11.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img12.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img13.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img14.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img15.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img16.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img17.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img18.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img19.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img20.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img21.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img22.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img23.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img24.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img25.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img26.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img27.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img28.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img29.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img30.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img31.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img32.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img33.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img34.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img35.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img36.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img37.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img38.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img39.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img40.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img41.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img42.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img43.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img44.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img45.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img46.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img47.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img48.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img49.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img50.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img51.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img52.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img53.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img54.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img55.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img56.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img57.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img58.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img59.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img60.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img61.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img62.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img63.png') }}" alt="Mumbai Event" data-city="mumbai" />
        <img src="{{ asset('website/assets/images/mumbai/img64.png') }}" alt="Mumbai Event" data-city="mumbai" />

        <!-- Bengaluru event pictures -->
        <img src="{{ asset('website/assets/images/bnglr/img1.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img2.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img3.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img4.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img5.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img6.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img7.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img8.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img9.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img10.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img11.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img12.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img13.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img14.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img15.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img16.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img17.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img18.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img19.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img20.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img21.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img22.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img23.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img24.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img25.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img26.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img27.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img28.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img29.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img30.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img31.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img32.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img33.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img34.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img35.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img36.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img37.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img38.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img39.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img40.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img41.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img42.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img43.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img44.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img45.png') }}" alt="Bengaluru Event" data-city="bengaluru" />
        <img src="{{ asset('website/assets/images/bnglr/img46.png') }}" alt="Bengaluru Event" data-city="bengaluru" />

        <!-- Delhi event pictures -->
        <img src="{{ asset('website/assets/images/delhi/img1.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img2.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img3.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img6.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img7.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img8.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img9.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img10.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img11.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img12.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img13.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img14.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img15.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img16.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img17.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img18.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img19.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img20.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img21.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img22.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img23.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img24.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img25.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img26.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img27.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img28.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img29.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img30.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img31.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img32.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img33.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img34.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img35.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img36.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img37.png') }}" alt="Delhi Event" data-city="delhi" />
        <img src="{{ asset('website/assets/images/delhi/img38.png') }}" alt="Delhi Event" data-city="delhi" />
      </div>
    </div>

  </div>
</div>


</div>

@endsection