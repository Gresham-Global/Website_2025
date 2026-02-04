@extends('website.layout.master')

@section('content')

<!-- Banner -->
<x-banner-section type="media" title="Media" />

<section class="customSection my-5">
    <div class="customContainer mediaCon">

        <!-- Media Items -->
        <div class="row g-4" id="mediaContainer">
            @foreach ($media as $item)
            @include('website.media.media_item_single', ['item' => $item])
            @endforeach
        </div>

        <!-- Loader -->
        <div class="text-center my-4 d-none" id="scrollLoader">
            <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
        </div>

        <!-- Load More Button for Mobile -->
        <div class="text-center my-4 d-md-none" id="loadMoreWrapper">
            <button class="mx-auto" id="loadMore">Load More</button>
            <div class="mt-2 d-none" id="loadMoreLoader">
                <img src="{{ asset('website/assets/images/loading.svg') }}" alt="Loading">
            </div>
        </div>

    </div>
</section>

@endsection

@push('js_code')
<script>
    $(document).ready(function() {

        let page = 2;
        let loading = false;
        let total = {
            {
                $total ?? 0
            }
        };
        let loaded = {
            {
                $media - > count() ?? 0
            }
        };

        // Detect screen width
        const isMobile = $(window).width() < 768; // Bootstrap md breakpoint

        if (isMobile) {
            // Mobile: Load More button
            $('#loadMore').on('click', function() {
                if (loading || loaded >= total) return;

                loading = true;
                $('#loadMoreLoader').removeClass('d-none');
                $(this).prop('disabled', true);

                $.ajax({
                    url: "{{ url('/media') }}",
                    type: "GET",
                    data: {
                        page: page
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.count > 0) {
                            $('#mediaContainer').append(response.html);
                            loaded += response.count;
                            page++;
                        }

                        if (loaded >= total || response.count === 0) {
                            $('#loadMoreWrapper').hide();
                        }
                    },
                    complete: function() {
                        loading = false;
                        $('#loadMoreLoader').addClass('d-none');
                        $('#loadMore').prop('disabled', false);
                    },
                    error: function() {
                        loading = false;
                        $('#loadMoreLoader').addClass('d-none');
                        $('#loadMore').prop('disabled', false);
                    }
                });
            });
        } else {
            // Desktop: Infinite scroll
            $(window).on('scroll', function() {
                if (loading || loaded >= total) return;

                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
                    loading = true;
                    $('#scrollLoader').removeClass('d-none');

                    $.ajax({
                        url: "{{ url('/media') }}",
                        type: "GET",
                        data: {
                            page: page
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.count > 0) {
                                $('#mediaContainer').append(response.html);
                                loaded += response.count;
                                page++;
                            }

                            if (loaded >= total || response.count === 0) {
                                $(window).off('scroll');
                            }
                        },
                        complete: function() {
                            loading = false;
                            $('#scrollLoader').addClass('d-none');
                        },
                        error: function() {
                            loading = false;
                            $('#scrollLoader').addClass('d-none');
                        }
                    });
                }
            });
        }

    });
</script>
@endpush