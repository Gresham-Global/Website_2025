@foreach ($publications as $publication)
<div class="col-md-6 col-lg-4">
    <div class="news-card publication-card h-100 d-flex flex-column">
        <div class="news-card-body d-flex flex-column flex-grow-1">
            <a href="{{ route('publications.show', $publication->slug) }}" target="_blank">
                <img src="{{ $publication->thumbnail_image }}" alt="News Image" class="news-card-img">
            </a>
            <a href="{{ route('publications.show', $publication->slug) }}" target="_blank">
                <h5 class="news-card-title">{{ $publication->title }}</h5>
            </a>
            <p class="news-card-text flex-grow-1">{{ $publication->short_description }} ...</p>
            <div class="cards_tags">
                <span class="taghead">Tags: </span>
                <span class="tagtxt">
                    @if ($publication->tags && $publication->tags->isNotEmpty())
                    {{ $publication->tags->pluck('name')->join(', ') }}
                    @else
                    -
                    @endif
                </span>
            </div>
            <hr class="opacity-25">
            <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                <a href="{{ route('publications.show', $publication->slug) }}" target="_blank"
                    class="readmoreBtn">Read More</a>

                @if (!empty($publication->share_link))
                <a href="{{ $publication->share_link }}" class="share_social share-blog-hit ">
                    <img style="border-radius: 0 !important;" src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="Share Icon">
                </a>
                @endif

                <a href="javascript:void(0);" class="share_social share-blog-hit"
                    data-url="{{ route('publications.show', $publication->slug) }}"
                    data-title="{{ $publication->title }}">
                    <img style="border-radius: 0 !important;" src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="share icon">
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach