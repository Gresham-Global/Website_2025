@if(!empty($image))
<section class="about-banner-background firstSection customSection">
    <div class="customContainer firstContainer">
        <!-- <h1 class="text-white titleH1">{{ $title }}</h1> -->
    </div>

    @php
    $desktopImage = $image ?? 'website/assets/images/default-desktop-banner.png';
    $mobileImage = $image ?? 'website/assets/images/default-mobile-banner.png';
    $altText = $alt ?? $title ?? 'Banner';
    @endphp

    {{-- Desktop Banner --}}
    <img src="{{ $desktopImage }}"
        alt="{{ $altText }}"
        class="w-100 forMobBanner d-none d-md-block">

    {{-- Mobile Banner --}}
    <img src="{{ $mobileImage }}"
        alt="{{ $altText }}"
        class="w-100 forMobBanner d-block d-md-none">
</section>
@endif