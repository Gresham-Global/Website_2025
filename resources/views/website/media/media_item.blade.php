@foreach ($media as $item)
<div class="col-md-6 col-lg-4">
  <div class="news-card h-100 d-flex flex-column">
    <a href="{{ $item->media_link }}" target="_blank">
      <img src="{{ asset($item->thumbnail_image) }}" alt="News Image" class="news-card-img">
    </a>
    <div class="news-card-body d-flex flex-column flex-grow-1">
      <div class="d-flex align-items-center gap-2 text-muted small">
        <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon" class="icon-sm">
        <span>{{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('d M Y | h:i A \I\S\T') }}</span>
      </div>
      <img src="{{ asset($item->logo_image) }}" alt="" class="repiblicimg my-2">
      <a href="{{ $item->media_link }}" target="_blank">
        <h5 class="news-card-title">{{ $item->title }}</h5>
      </a>
      <p class="news-card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($item->short_description, 120) }}</p>
      <hr class="opacity-25">
      <div class="mt-1 d-flex justify-content-between align-items-center w-100">
        <a href="{{ $item->media_link }}" target="_blank" class="readmoreBtn">Read More</a>
      </div>
    </div>
  </div>
</div>
@endforeach
