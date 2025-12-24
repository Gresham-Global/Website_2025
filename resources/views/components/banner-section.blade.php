<section class="about-banner-background firstSection customSection">

    <div class="customContainer firstContainer">
        <h1 class="text-white titleH1">{{ $banner->title ?? '' }}</h1>
    </div>

    {{-- Desktop Banner --}}
    @if($banner && $banner->image)
    <img src="{{ asset($banner->image) }}"
        alt="{{ $banner->title }}"
        class="w-100 forMobBanner d-none d-md-block">
    @else
    {{-- Optional default desktop fallback --}}
    <img src="{{ asset('website/assets/images/default-desktop-banner.png') }}"
        class="w-100 forMobBanner d-none d-md-block">
    @endif

    {{-- Mobile Banner --}}
    @if($banner && $banner->mobile_image)
    <img src="{{ asset($banner->mobile_image) }}"
        alt="{{ $banner->title }}"
        class="w-100 forMobBanner d-block d-md-none">
    @else
    {{-- Optional default mobile fallback --}}
    <img src="{{ asset('website/assets/images/default-mobile-banner.png') }}"
        class="w-100 forMobBanner d-block d-md-none">
    @endif

</section>