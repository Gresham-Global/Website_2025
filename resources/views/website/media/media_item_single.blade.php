<div class="col-md-4">
    <div class="news-card h-100 d-flex flex-column">
        <div class="news-card-body d-flex flex-column flex-grow-1">

            {{-- Thumbnail Image --}}
            @php
            $thumb = json_decode($item->thumbnail_image, true);
            $thumbPath = is_array($thumb) ? $thumb[0] : $item->thumbnail_image;
            $thumbPath = str_replace('\\/', '/', $thumbPath);
            @endphp

            <a href="{{ $item->media_link }}" target="_blank">
                <img src="{{ asset($thumbPath) }}"
                    class="news-card-img"
                    alt="Media Image">
            </a>

            {{-- Date --}}
            <div class="d-flex align-items-center gap-2 text-muted-c small mt-1">
                <img src="{{ asset('website/assets/images/time.svg') }}" class="icon-sm">
                <span style="font-size: .875em !important;">
                    {{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('d M Y') }}
                </span>
            </div>

            {{-- Logo Image --}}
            @php
            $logo = json_decode($item->logo_image, true);
            $logoPath = is_array($logo) ? $logo[0] : $item->logo_image;
            $logoPath = str_replace('\\/', '/', $logoPath);
            @endphp

            <img src="{{ asset($logoPath) }}" class="repiblicimg" alt="Logo">

            {{-- Title --}}
            <a href="{{ $item->media_link }}" target="_blank">
                <h5 class="news-card-title">
                    {{ \Illuminate\Support\Str::limit($item->title, 63) }}
                </h5>
            </a>

            {{-- Description --}}
            <p class="news-card-text flex-grow-1">
                {{ $item->short_description }}
            </p>

            <hr class="opacity-25">

            {{-- Footer --}}
            <div class="mt-1 d-flex justify-content-between align-items-center w-100">

                <a href="{{ $item->media_link }}"
                    target="_blank"
                    class="readmoreBtn">
                    Read More
                </a>

                <a href="javascript:void(0);"
                    class="share_social share-blog-hit"
                    data-url="{{ $item->media_link }}"
                    data-title="{{ $item->title }}">

                    <img src="{{ asset('website/assets/images/events/share_icon.webp') }}">
                </a>

            </div>

        </div>
    </div>
</div>

{{-- Styles --}}
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

        .news-card-title {
            max-height: 3.5em;
            min-height: 60px !important;
        }

        .news-card-text {
            max-height: 3.5em;
            min-height: 66px !important;
        }

        @supports (-webkit-line-clamp: 2) {
            .news-card-text {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }
        }
    }
</style>