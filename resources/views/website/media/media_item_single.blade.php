<div class="col-md-4">
    <div class="news-card h-100 d-flex flex-column">
        <div class="news-card-body d-flex flex-column flex-grow-1">

            <a href="{{ $item->media_link }}" target="_blank">
                <img src="{{ asset($item->thumbnail_image) }}"
                    class="news-card-img"
                    alt="Media Image">
            </a>

            <div class="d-flex align-items-center gap-2 text-muted-c small mt-1">
                <img src="{{ asset('website/assets/images/time.svg') }}" class="icon-sm">
                <span style="font-size: .875em !important; ">
                    {{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('d M Y') }}
                </span>
            </div>

            <img src="{{ asset($item->logo_image) }}"  class="repiblicimg">

            <a href="{{ $item->media_link }}" target="_blank">
                <h5 class="news-card-title">
                    {{ \Illuminate\Support\Str::limit($item->title, 63) }}
                 
                </h5>
            </a>

            <p class="news-card-text flex-grow-1">
                <!-- {{ \Illuminate\Support\Str::limit($item->short_description, 200) }} -->
                {{ $item->short_description }}
            </p>

            <hr class="opacity-25">
            <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                <a href="{{ $item->media_link }}" target="_blank" class="readmoreBtn">
                    Read More
                </a>
            </div>

        </div>
    </div>
</div>
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