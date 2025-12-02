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
    <!-- Media section -->

    <section class="customSection my-5">
        <div class="customContainer mediaCon newscrads">
            <div class="row g-4 news-container" id="newscrads">

                @foreach ($news_and_blogs as $news_and_blog)
                    <!-- Card 1 -->
                    <div class="col-md-4 col-lg-3 ">
                        <div class="news-card h-100 d-flex flex-column">
                            <div class="news-card-body d-flex flex-column flex-grow-1">
                                <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank"><img
                                        src="{{ $news_and_blog->thumbnail_image }}" alt="News Image"
                                        class="news-card-img"></a>
                                <div class="d-flex align-items-center gap-2 text-muted small">
                                    <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                                        class="icon-sm">
                                    <span>{{ \Carbon\Carbon::parse($news_and_blog->published_date)->format('d M Y') }}</span>
                                </div>
                                <!-- <img src="{{ asset('website/assets/icons/Desktop.png') }}" alt="" class="repiblicimg"> -->
                                <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank">
                                    <h5 class="news-card-title">{{ \Illuminate\Support\Str::limit($news_and_blog->title, 20) }}</h5>
                                </a>
                                <p class="news-card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($news_and_blog->short_description, 200) }} ...</p>
                                <hr class="opacity-25">
                                <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                                    <a href="{{ route('news-and-blogs.show', $news_and_blog->slug) }}" target="_blank"
                                        class="readmoreBtn">Read More</a>
                                    <!-- <img src="{{ asset('website/assets/images/share.svg') }}" alt="Share Icon" class="icon-xs"> -->
                                    @if (!empty($news_and_blog->share_link))
                                        <a href="{{ !empty($news_and_blog->share_link) ? $news_and_blog->share_link : '#' }}"
                                            class="share_social share-blog-hit">
                                            <img src="{{ asset('website/assets/images/events/share_icon.webp') }}"
                                                alt="">
                                        </a>
                                    @endif

                                    <a href="javascript:void(0);" class="share_social share-blog-hit"
                                        data-url="{{ route('news-and-blogs.show', $news_and_blog->slug) }}"
                                        data-title="{{ $news_and_blog->title }}">
                                        <img src="{{ asset('website/assets/images/events/share_icon.webp') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row g-4 addmoreBlogs {{ $news_and_blogs->count() >= $total ? 'd-none' : '' }}">
                <button id="loadMoreNews" data-page="2" data-total="{{ $total }}"
                    data-loaded="{{ $news_and_blogs->count() }}">
                    <span>Load More</span>
                    <img src="{{ asset('website/assets/images/loading.svg') }}" alt="" class="d-none">
                </button>
            </div>
            <!-- <div class="mt-4 d-flex justify-content-center">
                 {{-- {{  $news_and_blogs->links('pagination::bootstrap-4') }} --}}
                </div> -->
        </div>
    </section>
@endsection


@push('js_code')
    <script>
        $(document).ready(function() {
            $('#loadMoreNews').click(function() {
                let button = $(this);
                let page = parseInt(button.data('page'));
                let total = parseInt(button.data('total'));
                let loaded = parseInt(button.data('loaded'));
                let loader = button.find('img');

                loader.removeClass('d-none');

                $.ajax({
                    url: "{{ url('news-and-blogs') }}?page=" + page,
                    type: "GET",
                    success: function(data) {
                        if (data.html.trim() === "") {
                            button.hide();
                        } else {
                            $('#newscrads').append(data.html);
                            loaded += data.count;
                            button.data('page', page + 1);
                            button.data('loaded', loaded);
                            if (loaded >= total) {
                                button.hide();
                            }
                        }
                        loader.addClass('d-none');
                    },
                    error: function() {
                        alert('Could not load more news. Try again.');
                        loader.addClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush
