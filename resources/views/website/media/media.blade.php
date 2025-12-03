@extends('website.layout.master')
@section('content')
    <!-- banner section starts here -->
    <section class="about-banner-background firstSection customSection">
        <div class="customContainer firstContainer">
            <h1 class="text-white  titleH1">Media</h1>
        </div>
        <img src="{{ asset('website/assets/images/bannermedia44.png') }}" class="w-100 forMobBanner d-none d-md-block" />
        <img src="{{ asset('website/assets/images/mediamobilebanner.png') }}" class="w-100 forMobBanner d-block d-md-none" />

    </section>
    <!-- Media section -->

    <section class="customSection my-5">
        <div class="customContainer mediaCon">
            <div class="row g-4" id="mediaContainer">
                @foreach ($media as $item)
                    <div class="col-md-4 ">
                        <div class="news-card h-100 d-flex flex-column">
                            <div class="news-card-body d-flex flex-column flex-grow-1">
                                <a href="{{ $item->media_link }}" target="_blank">
                                    <img src="{{ asset($item->thumbnail_image) }}" alt="News Image" class="news-card-img">
                                </a>
                                <div class="d-flex align-items-center gap-2 text-muted small">
                                    <img src="{{ asset('website/assets/images/time.svg') }}" alt="Time Icon"
                                        class="icon-sm">
                                    <span>{{ \Carbon\Carbon::parse($item->publish_date ?? $item->created_at)->format('d M Y') }}</span>
                                </div>

                                <img src="{{ asset($item->logo_image) }}" alt="" class="repiblicimg my-2">

                                <a href="{{ $item->media_link }}" target="_blank">
                                    <h5 class="news-card-title">{{ \Illuminate\Support\Str::limit($item->title, 20) }}</h5>
                                </a>

                                <p class="news-card-text flex-grow-1">
                                    {{ \Illuminate\Support\Str::limit($item->short_description, 200) }}
                                </p>

                                <hr class="opacity-25">

                                <div class="mt-1 d-flex justify-content-between align-items-center w-100">
                                    <a href="{{ $item->media_link }}" target="_blank" class="readmoreBtn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row g-4 addmoreBlogs text-center {{ $media->count() >= $total ? 'd-none' : '' }}">
                <button id="loadMoreMedia" data-page="2" data-loaded="{{ $media->count() }}"
                    data-total="{{ $total }}">
                    <span>Load More</span>
                    <img src="{{ asset('website/assets/images/loading.svg') }}" alt="" class="d-none">
                </button>
            </div>

            {{-- Optional Pagination (if you decide to paginate properly) --}}
            {{-- <div class="mt-4 d-flex justify-content-center">
      {{ $media->links() }}
    </div> --}}
        </div>
    </section>
@endsection

@push('js_code')
    <script>
        $(document).ready(function() {
            $('#loadMoreMedia').click(function() {
                let button = $(this);
                let page = parseInt(button.data('page'));
                let total = parseInt(button.data('total'));
                let loaded = parseInt(button.data('loaded'));
                let loader = button.find('img');

                loader.removeClass('d-none');

                $.ajax({
                    url: "{{ url('media') }}?page=" + page,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.count === 0) {
                            button.hide();
                        } else {
                            $('#mediaContainer').append(response.html);
                            loaded += response.count;
                            button.data('page', page + 1);
                            button.data('loaded', loaded);
                            if (loaded >= total) {
                                button.hide();
                            }
                        }
                        loader.addClass('d-none');
                    },
                    error: function() {
                        // alert('Could not load more media. Try again.');
                        loader.addClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush
