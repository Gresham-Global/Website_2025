@foreach ($news_and_blogs as $news_and_blog)
<!-- <div class="col-md-6 col-lg-4 ">
    <div class="news-card h-100 d-flex flex-column">
      <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank">
        <img src="{{ $news_and_blog->thumbnail_image }}" alt="News Image" class="news-card-img">
      </a>
      <div class="news-card-body d-flex flex-column flex-grow-1">
        <div class="d-flex align-items-center gap-2 text-muted-c small">
          <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon" class="icon-sm">
          <span>{{ $news_and_blog->published_date }} IST</span>
        </div>
        <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank">
          <h5 class="news-card-title">{{ $news_and_blog->title }}</h5>
        </a>
        <p class="news-card-text flex-grow-1">{{ $news_and_blog->short_description }} ...</p>
        <hr class="opacity-25">
        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
          <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank" class="readmoreBtn">Read More</a>
          <a href="javascript:void(0);" class="share_social share-blog-hit" data-url="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" data-title="{{ $news_and_blog->title }}">
            <img src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="">
          </a>
        </div>
      </div>
    </div>
  </div> -->
<div class="col-md-4 news-blog-card" data-type="{{ $news_and_blog->type }}">
  <div class="news-card h-100 d-flex flex-column">
    <div class="news-card-body d-flex flex-column flex-grow-1">


      <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank">
        <img src="{{ $news_and_blog->thumbnail_image }}" alt="News Image" class="news-card-img">
      </a>


      <div class="d-flex align-items-center gap-2 text-muted-c small mt-3">
        <img src="{{ asset('website/assets/images/time.svg') }}" class="icon-sm">
        <span style="font-size: 0.875em">
          {{ \Carbon\Carbon::parse($news_and_blog->publish_date ?? $news_and_blog->created_at)->format('d M Y') }}
        </span>
      </div>


      <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank">
        <h5 class="news-card-title">
          {{ \Illuminate\Support\Str::limit($news_and_blog->title, 63) }}
        </h5>
      </a>


      <p class="news-card-text flex-grow-1">
        {{ $news_and_blog->short_description }}
      </p>


      <hr class="opacity-25">


      <div class="mt-1 d-flex justify-content-between align-items-center w-100">
        <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank" class="readmoreBtn">
          Read More
        </a>


        <a href="javascript:void(0);" class="share_social share-blog-hit"
          data-url="{{ route('news-and-blogs.show', $news_and_blog->slug) }}"
          data-title="{{ $news_and_blog->title }}">
          <img src="{{ asset('website/assets/images/events/share_icon.webp') }}">
        </a>
      </div>


    </div>
  </div>
</div>

@endforeach
<style>
  .news-card-title {
    overflow: hidden;
    min-height: 2.26em;
    max-height: 2.5em;
    line-height: 28px;
  }

  @supports (-webkit-line-clamp: 2) {
    .news-card-title {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      max-height: unset;
    }
  }

  @media screen and (max-width: 768px) {


    .news-card-title {
      overflow: hidden;
      max-height: 3.5em;
      line-height: 28px;
      min-height: 60px !important;
    }

    @supports (-webkit-line-clamp: 2) {
      .news-card-text {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        max-height: unset;
      }
    }
  }


  .news-card-text {
    overflow: hidden;
    min-height: 2.26em;
    max-height: 2.5em;
    line-height: 28px;
  }

  @supports (-webkit-line-clamp: 3) {
    .news-card-text {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      max-height: unset;
    }
  }

  @media screen and (max-width: 768px) {


    .news-card-text {
      overflow: hidden;
      max-height: 3.5em;
      line-height: 28px;
      min-height: 66px !important;
    }

    @supports (-webkit-line-clamp: 3) {
      .news-card-text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        max-height: unset;
      }
    }
  }
</style>