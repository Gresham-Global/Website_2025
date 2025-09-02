@foreach ($events as $event)
  <div class="event-card">
    <div class="event-img col-md-12">
      <img src="{{ $event->thumbnail_image }}" alt="Event Image">
    </div>
    <div class="event-content col-md-12">
      <div class="event-title">{{ $event->title }}</div>
      <div class="event-description">{{ $event->short_description }}</div>
      <div class="events_footer_card">
        <a href="{{ route('events.show', $event->slug) }}" class="read-more">Read More</a>
        <a href="javascript:void(0);" 
           class="share_social share-blog-hit" 
           data-url="{{ route('events.show', $event->slug) }}" 
           data-title="{{ $event->title }}">
          <img src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="">
        </a>
      </div>
    </div>
  </div>
@endforeach
