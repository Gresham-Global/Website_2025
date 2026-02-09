@extends('website.layout.master')
@section('content')

<x-banner-section type="event" title="Events" />
<!-- <section id="" class="about-banner-background firstSection customSection">
  <div class="customContainer firstContainer">
    <h1 class="text-white titleH1">Events</h1>
  </div>
  <img src="{{ asset('website/assets/images/banner_events.png') }}" class="w-100 img-fluid forMobBanner minScreenBG"
    alt="Bootstrap Themes" />
</section> -->
<!-- banner section ends here -->

<!-- Text and City Picture section starts -->
<section class="events_main my-5">
  <div class="events_container container-fluid px-5 py-5">
    <div class="events-container" id="eventscrads">
      <div class="event-card">
        <div class="event-img col-md-12">
          <a href="/events1/gacc-events">
            <img src="https://gresham.world/website/assets/images/mumbai/img1.png" alt="Event Image">
        </div>
        <div class="event-content col-md-12">
          <div class="event-title">Gresham Annual Counsellors Conference (GACC) 2024</div>
          <div class="event-description">GACC is an annual conference for counsellors supporting high school students in their career transitions. This flagship event aimed to provide counsellors with insights and information on new career options, empowering them with diverse pathways from top UK, Canada and European...</div>
          </a>

          <div class="events_footer_card">
            <a href="/events1/gacc-events" class="read-more" data-post-url="/gacc-events">Read More</a>
            <a href="#" class="share_social share-blog-hit" data-post-url="/events/gacc-events">
              <img src="https://gresham.world/website/assets/images/events/share_icon.webp" alt="gacc-event" srcset="">
            </a>
          </div>

        </div>
      </div>

      <div class="event-card">
        <div class="event-img col-md-12">
          <a href="/events1/gresham-connect-bangladesh">
            <img src="https://gresham.world/website/assets/images/bangladesh/bangladesh.webp" alt="Event Image">
        </div>
        <div class="event-content col-md-12">
          <div class="event-title ">Gresham Connect Bangladesh</div>
          <div class="event-description">Gresham Connect Bangladesh brought together leading universities, recruitment partners, and industry experts to explore the evolving landscape of international education in Bangladesh. The event provided a platform for meaningful discussions on market trends, student mobility,...</div>
          </a>

          <div class="events_footer_card">
            <a href="/events1/gresham-connect-bangladesh" class="read-more">Read More</a>
            <a href="#" class="share_social share-blog-hit" data-post-url="/events/gresham-connect-bangladesh">
              <img src="https://gresham.world/website/assets/images/events/share_icon.webp" alt="gresham-connect-bangladesh" srcset="">
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4 addmoreevents d-none">
      <button id="loadMore">
        <span>Load More</span>
        <img src="https://gresham.world/website/assets/images/loading.svg" alt="loading icon" class="d-none">
      </button>
    </div>
  </div>
</section>




<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
    const descriptions = document.querySelectorAll(".event-description");
    const maxLength = 280;
    descriptions.forEach(function(desc) {
      const fullText = desc.textContent.trim();

      if (fullText.length > maxLength) {
        let shortened = fullText.substring(0, maxLength);
        shortened = shortened.substring(0, shortened.lastIndexOf(" "));
        desc.textContent = shortened + "...";
      }
    });
  });


  document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('#eventscrads .event-card'); // Assuming .card is the class for each card
    const loadMoreButton = document.querySelector('#loadMore');
    const eventsContainer = document.querySelector('#eventscrads');

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
</script> -->

@endsection