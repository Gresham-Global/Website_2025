@extends('website.layout.master')
@section('content')
<!-- banner section starts here -->
<section class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <h1 class="text-white  titleH1">News and Blogs</h1>
    </div>
    <img src="{{ asset('website/assets/images/bannermedia44.png') }}" class="w-100 forMobBanner d-none d-md-block" />
    <img src="{{ asset('website/assets/images/mediamobilebanner.png') }}" class="w-100 forMobBanner d-block d-md-none" />
</section>
<!-- Toggle Buttons -->
<section class="customSection customSectionToggle pt-2 pb-2 my-0">
    <div class="customContainer  customContainerToggle">
        <div class="news-blog-toggle">
            <button class="toggle-btn active" data-type="news">News</button>
            <button class="toggle-btn" data-type="blogs">Blogs</button>
            <span class="toggle-indicator"></span>
        </div>
    </div>
</section>
<!-- Media section -->
<section class="customSection my-0">
    <div class="customContainer mediaCon newscrads">
        <div class="row g-4 news-container" id="newscrads">
            @foreach ($news_and_blogs as $news_and_blog)
            <div class="col-md-4 news-blog-card mt-0" data-type="{{ $news_and_blog->type }}">
                <div class="news-card h-100 d-flex flex-column">
                    <div class="news-card-body d-flex flex-column flex-grow-1">
                        <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank">
                            <img src="{{ $news_and_blog->thumbnail_image }}" alt="News Image" class="news-card-img">
                        </a>
                        <div class="d-flex align-items-center gap-2 text-muted-c small mt-3">
                            <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon" class="icon-sm">
                            <span style="font-size: 0.875em !important;">{{ \Carbon\Carbon::parse($news_and_blog->publish_date ?? $news_and_blog->created_at)->format('d M Y') }}</span>
                        </div>
                        <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank">
                            <h5 class="news-card-title">{{ \Illuminate\Support\Str::limit($news_and_blog->title, 63) }}</h5>
                        </a>
                        <p class="news-card-text flex-grow-1">{{ $news_and_blog->short_description }}</p>
                        <hr class="opacity-25">
                        <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                            <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank" class="readmoreBtn">Read More</a>
                            @if (!empty($news_and_blog->share_link))
                            <a href="{{ $news_and_blog->share_link }}" class="share_social share-blog-hit">
                                <img src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="">
                            </a>
                            @endif
                            <a href="javascript:void(0);" class="share_social share-blog-hit" data-url="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" data-title="{{ $news_and_blog->title }}">
                                <img src="{{ asset('website/assets/images/events/share_icon.webp') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Loader -->
        <div id="infinite-loader" class="text-center my-3 d-none">
            <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
        </div>

        <div class="text-center my-4 d-md-none" id="loadMoreWrapperNews">
            <button class="mx-auto" id="loadMore">Load More</button>
            <div class="mt-2 d-none" id="loadMoreLoaderNews">
                <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
            </div>
        </div>
    </div>
</section>
<style>
    .customSectionToggle .customContainerToggle {
        width: 88%;
        text-align: right;
    }

    .news-blog-card {
        margin-top: 5px !important;
    }

    /* .customContainer {
        text-align: right;
    } */

    .news-blog-toggle {
        position: relative;
        display: inline-flex;
        background: #f1f3f6;
        border-radius: 999px;
        padding: 4px;
        gap: 0;
        width: 260px;
        height: 48px;
        align-items: center;
        justify-content: space-between;
    }


    .news-blog-toggle .toggle-btn {
        flex: 1;
        border: none;
        background: transparent;
        color: #555;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        z-index: 2;
        transition: color 0.3s ease;
    }


    .news-blog-toggle .toggle-btn.active {
        color: #fff;
    }


    .news-blog-toggle .toggle-indicator {
        position: absolute;
        top: 4px;
        left: 4px;
        width: calc(50% - 4px);
        height: calc(100% - 8px);
        /* background: linear-gradient(135deg, #3b82f6, #2563eb); */
        background: #e32636;
        border-radius: 999px;
        transition: transform 0.35s ease;
        z-index: 1;
    }


    /* Move indicator when blogs is active */
    .news-blog-toggle.blogs-active .toggle-indicator {
        transform: translateX(100%);
    }


    /* Mobile tweak */
    @media (max-width: 576px) {
        .news-blog-toggle {
            width: 220px;
            height: 44px;
        }
    }

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
        .customSectionToggle .customContainerToggle {
            width: 100%;
            text-align: center;
        }

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
@endsection

@push('js_code')
<script>
    $(document).ready(function() {


        let loading = false;
        const isMobile = $(window).width() < 768;


        // State per type
        let state = {
            news: {
                page: 1
            },
            blogs: {
                page: 1
            }
        };


        function getActiveType() {
            return $('.toggle-btn.active').data('type');
        }


        function resetAndLoad(type) {
            // reset state
            state[type].page = 1;
            $('#newscrads').html(''); // clear old cards
            $('#loadMoreWrapperNews').show();


            loadMoreContent(true);
        }


        function loadMoreContent(isFirstLoad = false) {
            if (loading) return;


            const type = getActiveType();
            const current = state[type];


            loading = true;


            if (isMobile) {
                $('#loadMoreLoaderNews').removeClass('d-none');
                $('#loadMore').prop('disabled', true);
            } else {
                $('#infinite-loader').removeClass('d-none');
            }


            $.ajax({
                url: "{{ url('news-and-blogs') }}",
                type: "GET",
                data: {
                    page: current.page,
                    type: type
                },
                dataType: "json",
                success: function(data) {


                    if (data.html.trim() !== "") {
                        $('#newscrads').append(data.html);
                        current.page++;
                    } else if (!isFirstLoad) {
                        $('#loadMoreWrapperNews').hide();
                    }
                },
                complete: function() {
                    loading = false;
                    $('#loadMoreLoaderNews').addClass('d-none');
                    $('#infinite-loader').addClass('d-none');
                    $('#loadMore').prop('disabled', false);
                },
                error: function() {
                    loading = false;
                    console.error('Could not load data');
                }
            });
        }


        // Mobile Load More
        if (isMobile) {
            $('#loadMore').on('click', function() {
                loadMoreContent();
            });
        }
        // Desktop infinite scroll
        else {
            $(window).on('scroll', function() {
                if ($(window).scrollTop() + $(window).height() + 120 >= $(document).height()) {
                    loadMoreContent();
                }
            });
        }


        // Toggle buttons → trigger AJAX
        $('.toggle-btn').on('click', function() {
            const type = $(this).data('type');


            $('.toggle-btn').removeClass('active');
            $(this).addClass('active');


            $('.news-blog-toggle')
                .toggleClass('blogs-active', type === 'blogs');


            resetAndLoad(type); // 🔥 AJAX trigger here
        });


        // Initial load → News
        $('.toggle-btn[data-type="news"]').addClass('active');
        resetAndLoad('news');


    });
</script>

@endpush
<style>
    .news-card-text {
        overflow: hidden;
        max-height: 4.5em;
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
</style>