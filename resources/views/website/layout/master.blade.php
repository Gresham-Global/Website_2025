<!DOCTYPE html>
<html lang="en">

<head>
    @yield('css_files')
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-seo-meta :page-url="request()->path()" />
    {{-- @php
    $currentRoute = request()->route()->getName();
    @endphp --}}
    @php
    $currentRoute = request()->route()
    ? request()->route()->getName()
    : null;
    @endphp

    @if($currentRoute === 'events.show' && isset($event))
    <meta property="og:title" content="{{ $event->title }}" />
    <meta property="og:description" content="{{ $event->short_description }}" />
    <meta property="og:image" content="{{ $event->thumbnail_image }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    @elseif($currentRoute === 'news-and-blogs.show' && isset($post))
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->short_description }}" />
    <meta property="og:image" content="{{ $post->thumbnail_image }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    @endif
    @yield('meta')


    <link rel="stylesheet" href="{{ asset('website/assets/css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/banner.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/media.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/banner.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('website/assets/css/event.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/media.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/events.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/careers.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('website/assets/css/404.css') }}" /> -->


    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- fonts -->
    <link href="
    https://cdn.jsdelivr.net/npm/@dannymichel/proxima-nova@4.5.2/index.min.css
    " rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_drop_down" />
    <link rel="icon" href="https://gresham.world/wp-content/uploads/2021/10/icon-01-150x150.png" sizes="32x32" />
    <link rel="icon" href="https://gresham.world/wp-content/uploads/2021/10/icon-01.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://gresham.world/wp-content/uploads/2021/10/icon-01.png" />
    <meta name="msapplication-TileImage" content="https://gresham.world/wp-content/uploads/2021/10/icon-01.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" />

    <link rel="stylesheet" href="{{ asset('website/assets/share-hit/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
</head>

<body>
    @include('website.layout.header')
    @yield('content')
    @include('components.share-hit')
    @include('website.layout.footer')
    @stack('scripts')

    <div id="shareModal" class="share-modal" style="display: none;">
        <div class="share-modal-content">
            <span class="close">&times;</span>
            <h4>Share this event</h4>
            <div class="share-links">
                <a href="#" target="_blank" class="linkedin">LinkedIn</a>
                <a href="#" target="_blank" class="email">Email</a>
                <a href="#" target="_blank" class="outlook">Outlook</a>
                <a href="#" target="_blank" class="teams">Teams</a>
                <a href="#" target="_blank" class="whatsapp">WhatsApp</a>
                <a href="#" target="_blank" class="facebook">Facebook</a>
            </div>
        </div>
    </div>


</body>
<script>
    var baseurl = "{{ url('/') }}/"; // Laravel's base URL
</script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Slick Slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('website/assets/js/enquiry.js') }}"></script>
<script src="{{ asset('website/assets/js/publicationenquiry.js') }}"></script>
<script src="{{ asset('website/assets/js/job-interest.js') }}"></script>
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<!-- Get To Touch -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("#touchBtn, .getintouchBtn").forEach(button => {
            button.addEventListener("click", function() {
                let contactModal = new bootstrap.Modal(document.getElementById("contactModal"));
                contactModal.show();
            });
        });
    });
</script>

<!-- side navbar dropdown -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButtons = document.querySelectorAll('.headmbmenu .nav-link.dropdown-toggle');

        toggleButtons.forEach(function(btn) {
            const dropdownMenu = btn.nextElementSibling;

            if (dropdownMenu && dropdownMenu.classList.contains("dropdownmenu")) {
                btn.addEventListener("click", function(event) {
                    event.preventDefault();
                    dropdownMenu.classList.toggle("show");
                });
            }
        });
    });
</script>

<!-- testimonial -->
<!-- <script>

function checkScreenSize() {
    return window.innerWidth <= 1080;
}

function applySeeMoreFeature() {
    $(".textTexsti").each(function() {
        let $textElement = $(this);
        let fullText = $textElement.text().trim();
        let words = fullText.split(" ");

        if (words.length > 50) {
            let shortText = words.slice(0, 50).join(" ") + "...";

            if (checkScreenSize()) {
                // Only modify if not already processed
                if (!$textElement.find(".short-text").length) {
                    $textElement.html(`
                            <span class="short-text">${shortText}</span>
                            <span class="full-text d-none">${fullText}</span>
                        `);
                }

                let btn = $textElement.siblings(".see-more-btn");
                if (!btn.length) {
                    $textElement.after(`<button class="btn btn-primary see-more-btn">See More</button>`);
                } else {
                    btn.removeClass("d-none");
                }
            } else {
                // Restore full content on larger screens
                $textElement.html(fullText);
                $textElement.siblings(".see-more-btn").addClass("d-none");
            }
        }
    });

    // Toggle handler
    $(document).on("click", ".see-more-btn", function() {
        const $btn = $(this);
        const $parent = $btn.prev(".textTexsti");
        const shortText = $parent.find(".short-text");
        const fullText = $parent.find(".full-text");

        if (shortText.is(":visible")) {
            shortText.addClass("d-none");
            fullText.removeClass("d-none");
            $btn.text("See Less");
        } else {
            shortText.removeClass("d-none");
            fullText.addClass("d-none");
            $btn.text("See More");
        }
    });
}

$(document).ready(function() {
    applySeeMoreFeature();

    // Reapply on resize
    $(window).resize(function() {
        applySeeMoreFeature();
        // Force reset all buttons to "See More" state on resize
        $(".see-more-btn").text("See More");
    });
});
</script> -->
<script>
    function applySeeMoreFeature() {
        $(".textTexsti").each(function() {
            let $textElement = $(this);
            let fullText = $textElement.text().trim();
            let words = fullText.split(" ");

            if (words.length > 150) {
                let shortText = words.slice(0, 150).join(" ") + "...";

                // Ensure modification happens only once
                if (!$textElement.find(".short-text").length) {
                    $textElement.html(`
                    <span class="short-text">${shortText}</span>
                    <span class="full-text d-none">${fullText}</span>
                `);
                }

                // Add button if not already present
                let btn = $textElement.siblings(".see-more-btn");
                if (!btn.length) {
                    $textElement.after(`<button class="btn btn-primary see-more-btn mt-2">See More</button>`);
                } else {
                    btn.removeClass("d-none");
                }
            }
        });

        // Toggle function
        $(document).on("click", ".see-more-btn", function() {
            const $btn = $(this);
            const $parent = $btn.prev(".textTexsti");
            const shortText = $parent.find(".short-text");
            const fullText = $parent.find(".full-text");

            if (shortText.hasClass("d-none")) {
                shortText.removeClass("d-none");
                fullText.addClass("d-none");
                $btn.text("See More");
            } else {
                shortText.addClass("d-none");
                fullText.removeClass("d-none");
                $btn.text("See Less");
            }
        });
    }

    $(document).ready(function() {
        applySeeMoreFeature();
    });
</script>
<!-- load more query  -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var loadMoreBtn = document.getElementById("loadMoreBtn");
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener("click", function() {
                var hiddenCards = document.querySelector(".hidden-cards");
                if (hiddenCards) {
                    hiddenCards.style.display = "block";
                }
                this.style.display = "none"; // Hide the button after clicking
            });
        }
    });
</script>
<!-- load more query end -->
<!-- Navbar Scroll to Hide -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const webNav = document.querySelector('.webNav');
        const navbarToggler = document.querySelector('.navbar-toggler');
        const topNav = document.querySelector('.topSection');
        let isScrolled = false;

        function handleScroll() {
            if (window.innerWidth > 1080) {
                if (window.scrollY > 600 && !isScrolled) {
                    topNav.classList.add('hidden');
                    webNav.classList.add('hidden');
                    navbarToggler.classList.add('visible');
                    isScrolled = true;
                } else if (window.scrollY <= 600 && isScrolled) {
                    topNav.classList.remove('hidden');
                    webNav.classList.remove('hidden');
                    navbarToggler.classList.remove('visible');
                    isScrolled = false;
                }
            }
        }
        handleScroll();
        let isThrottled = false;
        window.addEventListener('scroll', function() {
            if (!isThrottled) {
                handleScroll();
                isThrottled = true;
                setTimeout(() => {
                    isThrottled = false;
                }, 100);
            }
        });
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 1080) {
                webNav.classList.remove('hidden');
                navbarToggler.classList.remove('visible');
            }
        });
    });
</script>

<!-- Choose City -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".city-button");
        const images = document.querySelectorAll(".image-gallery img");

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const selectedCity = this.dataset.city;

                // Toggle active class on buttons
                buttons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");

                images.forEach(img => {
                    if (selectedCity === "all" || img.dataset.city === selectedCity) {
                        img.style.display = "inline-block"; // or "block" based on layout
                    } else {
                        img.style.display = "none";
                    }
                });
            });
        });
    });
</script>

<!-- Multi Select -->
<script>
    document.querySelectorAll('.service-option').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            let selected = [];
            document.querySelectorAll('.service-option:checked').forEach((chk) => {
                selected.push(chk.value);
            });
            document.getElementById('multiSelectDropdown').textContent = selected.length ? selected.join(
                ', ') : "Select Services";
            let data = selected.length ? selected.join(', ') : "";
            const text = document.getElementById('servicess_modal').value = data;
        });
    });

    document.querySelectorAll('.service-option2').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            let selected = [];
            document.querySelectorAll('.service-option2:checked').forEach((chk) => {
                selected.push(chk.value);
            });
            document.getElementById('multiSelectDropdown2').textContent = selected.length ? selected.join(
                ', ') : "Select Services";
            let data = selected.length ? selected.join(', ') : "";
            const text = document.getElementById('servicess').value = data;
        });
    });

    document.querySelectorAll('.service-option3').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            let selected = [];
            document.querySelectorAll('.service-option3:checked').forEach((chk) => {
                selected.push(chk.value);
            });
            document.getElementById('multiSelectDropdown3').textContent = selected.length ? selected.join(
                ', ') : "Select Services";
            let data = selected.length ? selected.join(', ') : "";
            const text = document.getElementById('servicess_contact').value = data;
        });
    });
</script>

<!-- artical page dropdown -->
<script>
    $(document).ready(function() {
        $(".articalMe").slick({
            infinite: true,
            slidesToShow: 4,
            arrows: false, // Disable default arrows
            dots: false, // Remove dots
            slideTransition: "linear",
            autoplay: true,
            margin: 20,
            autoplaySpeed: 2000, // Correct autoplay speed property
            pauseOnHover: true, // Correct property name
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $(".btn[data-bs-slide='prev']").click(function() {
            $(".articalMe").slick("slickPrev");
        });

        $(".btn[data-bs-slide='next']").click(function() {
            $(".articalMe").slick("slickNext");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $(".Research").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            arrows: false,
            centerPadding: '60px',
            responsive: [{
                    breakpoint: 1200, // Large screens
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 991, // Medium screens (tablets)
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767, // Small tablets
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 575, // Large mobile screens
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 400, // Small mobile screens
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $(".video").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            arrows: false,
            centerPadding: '60px',
            responsive: [{
                    breakpoint: 1200, // Large screens
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 991, // Medium screens (tablets)
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767, // Small tablets
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 575, // Large mobile screens
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 400, // Small mobile screens
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });


        // Slick slider configuration object
        // Slick slider configuration object
        const slickConfig = {
            infinite: true,
            slidesToShow: 4,
            loop: true,
            dots: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
            nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
            centerPadding: '60px',
            slideTransition: "linear",
            autoplay: false,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
            ]
        };

        // Function to initialize media slider
        function initializeMediaSlider() {
            // Check if slider exists and is visible before initializing
            if ($(".hmmedia").length && $('#tab1').is(':visible')) {
                $(".hmmedia").slick(slickConfig);
            }
        }

        // Function to initialize news slider
        function initializeNewsSlider() {
            // Check if slider exists and is visible before initializing
            if ($(".hmnews").length && $('#tab2').is(':visible')) {
                $(".hmnews").slick(slickConfig);
            }
        }

        // Function to destroy media slider
        function destroyMediaSlider() {
            if ($('.hmmedia').hasClass('slick-initialized')) {
                $('.hmmedia').slick('unslick');
            }
        }

        // Function to destroy news slider
        function destroyNewsSlider() {
            if ($('.hmnews').hasClass('slick-initialized')) {
                $('.hmnews').slick('unslick');
            }
        }

        // Function to destroy all sliders
        function destroyAllSliders() {
            destroyMediaSlider();
            destroyNewsSlider();
        }

        // Media tab (hmtab1) click handler
        $('#hmtab1').on('click', function() {
            // Remove active from all tabs
            $('#hmtab1, #hmtab2').removeClass('active');

            // Add active to clicked tab
            $(this).addClass('active');

            // Immediately destroy and reinitialize
            destroyAllSliders();

            // Hide all tab content and show target immediately
            $('.tab-content').hide();
            $('#tab1').show();

            // Initialize slider immediately - no setTimeout delay
            initializeMediaSlider();
        });

        // News/Blogs tab (hmtab2) click handler
        $('#hmtab2').on('click', function() {
            // Remove active from all tabs
            $('#hmtab1, #hmtab2').removeClass('active');

            // Add active to clicked tab
            $(this).addClass('active');

            // Immediately destroy and reinitialize
            destroyAllSliders();

            // Hide all tab content and show target immediately
            $('.tab-content').hide();
            $('#tab2').show();

            // Initialize slider immediately - no setTimeout delay
            initializeNewsSlider();
        });

        // Optimized slider initialization functions
        function initializeMediaSlider() {
            // Check if slider exists and is visible before initializing
            if ($(".hmmedia").length && $('#tab1').is(':visible')) {
                $(".hmmedia").slick(slickConfig);
            }
        }

        function initializeNewsSlider() {
            // Check if slider exists and is visible before initializing
            if ($(".hmnews").length && $('#tab2').is(':visible')) {
                $(".hmnews").slick(slickConfig);
            }
        }

        // Pre-initialize both sliders on page load for faster switching
        $(document).ready(function() {
            // Initialize the active tab's slider immediately
            if ($('#hmtab1').hasClass('active')) {
                initializeMediaSlider();
            } else if ($('#hmtab2').hasClass('active')) {
                initializeNewsSlider();
            }

            // Preload images for faster switching (optional)
            preloadSliderImages();
        });

        // Optional: Preload images for faster switching
        function preloadSliderImages() {
            $('.hmmedia img, .hmnews img').each(function() {
                if (this.src) {
                    const img = new Image();
                    img.src = this.src;
                }
            });
        }

        // Initialize appropriate slider on page load
        $(document).ready(function() {
            if ($('#hmtab1').hasClass('active')) {
                initializeMediaSlider();
            } else if ($('#hmtab2').hasClass('active')) {
                initializeNewsSlider();
            }
        });

        // Initialize appropriate slider on page load
        $(document).ready(function() {
            if ($('#hmtab1').hasClass('active')) {
                initializeMediaSlider();
            } else if ($('#hmtab2').hasClass('active')) {
                initializeNewsSlider();
            }
        });

        $(".testimonials").slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            centerMode: true,
            centerPadding: '20px',
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
            nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
            centerPadding: '20%',
            slideTransition: "linear",
            autoplay: false,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        centerMode: true,
                        centerPadding: '0px',
                    }
                }
            ]
        });

        $(".tabs").click(function() {

            var tabId = $(this).attr("data-tab");
            // alert(tabId);
            $(".tabs").removeClass("active");
            $(this).addClass("active");

            $(".tab-content").removeClass("active");
            $("#" + tabId).addClass("active");


            $(".blogs").slick({
                dots: true,
                infinite: true,
                slidesToShow: 4,
                arrows: false,
                centerPadding: '60px',
                responsive: [{
                        breakpoint: 1200, // Large screens
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991, // Medium screens (tablets)
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767, // Small tablets
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575, // Large mobile screens
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                    {
                        breakpoint: 400, // Small mobile screens
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        });
    });
</script>
<!-- Event Page -->
<script>
    $(document).ready(function() {
        $('.life-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
            nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                }, // Tablets
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                } // Mobile
            ]
        });
        $('.publicationSlider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            cssEase: 'linear',
            adaptiveHeight: true,
            speed: 500,
            autoplay: true,
            dots: true,
            responsive: [{
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>
<!-- Home page articale section -->
<!-- <script>$(document).ready(function(){
    $('.slider.media').slick({
        slidesToShow: 3,  // Number of visible slides
        slidesToScroll: 1,
        arrows: true,      // Enable arrows
        prevArrow: $('.prev-arrow'),
        nextArrow: $('.next-arrow'),
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});
</script> -->
<!-- seemore scripy -->
<script>
    function toggleText(event, el) {
        event.preventDefault()
        let parent = el.previousElementSibling;
        let fullText = parent.querySelector(".full-text");

        if (fullText.classList.contains("d-none")) {
            fullText.classList.remove("d-none");
            el.textContent = "Read Less";
        } else {
            fullText.classList.add("d-none");
            el.textContent = "Read More";
        }
    }


    $("#loadMore").on("click", function() {
        let blogs = '<div class="col-md-6 col-lg-4 cardpm">';
        blogs += '<div class="news-card h-100 d-flex flex-column">';
        blogs += '<a href="https://www.republicworld.com/initiatives/gresham-global-helps-international-universities-expand-their-reach-through-strategic-partnerships" target="_blank">';
        blogs += '<img src="{{ asset('
        website / assets / images / art4.png ') }}" alt="News Image" class="news-card-img">';
        blogs += '</a>';
        blogs += '<div class="news-card-body d-flex flex-column flex-grow-1">';
        blogs += '<div class="d-flex align-items-center gap-2 text-muted small">';
        blogs += '<img src="{{ asset('
        website / assets / images / time.svg ') }}" alt="Time Icon" class="icon-sm">';
        blogs += '<span>14 Sept 2024 | 17:04 IST</span>';
        blogs += '</div>';
        blogs += '<img src="{{ asset('
        website / assets / icons / republic - logo2 1. png ') }}" alt="" class="repiblicimg">';
        blogs += '<a href="https://www.republicworld.com/initiatives/gresham-global-helps-international-universities-expand-their-reach-through-strategic-partnerships" target="_blank">';
        blogs += '<h5 class="news-card-title flex-grow-1">Gresham Global helps international universities expand...</h5>';
        blogs += '</a>';
        blogs += '<p class="news-card-text flex-grow-1">India, 11th September 2024: In today’s evolving education landscape,...</p>';
        blogs += '<hr class="opacity-25">';
        blogs += '<div class="mt-1 d-flex justify-content-between align-items-center w-100">';
        blogs += '<a href="https://www.republicworld.com/initiatives/gresham-global-helps-international-universities-expand-their-reach-through-strategic-partnerships" target="_blank" class="readmoreBtn">Read More</a>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '<div class="col-md-6 col-lg-4 cardpm">';
        blogs += '<div class="news-card h-100 d-flex flex-column">';
        blogs += '<a href="https://thepienews.com/international-universities-go-non-traditional-to-attract-indian-students/" target="_blank"><img src="{{ asset('
        website / assets / images / medianew33.png ') }}" alt="News Image" class="news-card-img">';
        blogs += '</a>';
        blogs += '<div class="news-card-body d-flex flex-column flex-grow-1">';
        blogs += '<div class="d-flex align-items-center gap-2 text-muted small">';
        blogs += '<img src="{{ asset('
        website / assets / images / time.svg ') }}" alt="Time Icon" class="icon-sm">';
        blogs += '<span>21 August 2024 | 5:56 IST</span>';
        blogs += '</div>';
        blogs += '<img src="{{ asset('
        website / assets / icons / Desktop.png ') }}" alt="" class="repiblicimg">';
        blogs += '<a href="https://thepienews.com/international-universities-go-non-traditional-to-attract-indian-students/" target="_blank">';
        blogs += '<h5 class="news-card-title">Global universities spotlight non-traditional pathways in India';
        blogs += '</h5>';
        blogs += '</a>';
        blogs += '<p class="news-card-text flex-grow-1">Amid a shift in course preference among Indian students, international universities ...</p>';
        blogs += '<hr class="opacity-25">';
        blogs += '<div class="mt-1 d-flex justify-content-between align-items-center w-100">';
        blogs += '<a href="https://thepienews.com/international-universities-go-non-traditional-to-attract-indian-students/" target="_blank" class="readmoreBtn">Read More</a>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '<div class="col-md-6 col-lg-4 cardpm">';
        blogs += '<div class="news-card h-100 d-flex flex-column">';
        blogs += '<a href="https://timesofindia.indiatimes.com/education/gresham-globals-gacc-2024-paving-the-way-for-new-career-pathways-in-education/articleshow/112530572.cms" target="_blank">';
        blogs += '<img src="{{ asset('
        website / assets / images / art2.png ') }}" alt="News Image" class="news-card-img">';
        blogs += '</a>';
        blogs += '<div class="news-card-body d-flex flex-column flex-grow-1">';
        blogs += '<div class="d-flex align-items-center gap-2 text-muted small">';
        blogs += '<img src="{{ asset('
        website / assets / images / time.svg ') }}" alt="Time Icon" class="icon-sm">';
        blogs += '<span>14 Aug 2024 | 20:46 IST </span>';
        blogs += '</div>';
        blogs += '<img src="{{ asset('
        website / assets / icons / Group 1000004042. png ') }}" alt="" class="repiblicimg">';
        blogs += '<a href="https://timesofindia.indiatimes.com/education/gresham-globals-gacc-2024-paving-the-way-for-new-career-pathways-in-education/articleshow/112530572.cms" target="_blank">';
        blogs += '<h5 class="news-card-title flex-grow-1">Gresham Global’s GACC 2024: Paving the way for new career pathways in education</h5>';
        blogs += '</a>';
        blogs += '<p class="news-card-text flex-grow-1">Gresham Global recently concluded the Gresham Annual Counsellors Conference (GACC) 2024 in Mumbai....</p>';
        blogs += '<hr class="opacity-25">';
        blogs += '<div class="mt-1 d-flex justify-content-between align-items-center w-100">';
        blogs += '<a href="https://timesofindia.indiatimes.com/education/gresham-globals-gacc-2024-paving-the-way-for-new-career-pathways-in-education/articleshow/112530572.cms" target="_blank" class="readmoreBtn">Read More</a>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '<div class="col-md-6 col-lg-4 cardpm">';
        blogs += '<div class="news-card h-100 d-flex flex-column">';
        blogs += ' <a href="https://thepienews.com/unified-consortium-in-india/" target="_blank">';
        blogs += '<img src="{{ asset('
        website / assets / images / art3.png ') }}" alt="News Image" class="news-card-img">';
        blogs += '</a>';
        blogs += '<div class="news-card-body d-flex flex-column flex-grow-1">';
        blogs += '<div class="d-flex align-items-center gap-2 text-muted small">';
        blogs += '<img src="{{ asset('
        website / assets / images / time.svg ') }}" alt="Time Icon" class="icon-sm">';
        blogs += '<span>8 July 2024 | 5:56 IST</span>';
        blogs += '</div>';
        blogs += '<img src="{{ asset('
        website / assets / icons / Desktop.png ') }}" alt="" class="repiblicimg">';
        blogs += '<a href="https://thepienews.com/unified-consortium-in-india/" target="_blank">';
        blogs += '<h5 class="news-card-title">We need a unified consortium for India’s int’l education industry</h5>';
        blogs += '</a>';
        blogs += "<p class='news-card-text flex-grow-1'>India's international education ecosystem, which started with a few consultants in the early 1990s...</p>";
        blogs += '<hr class="opacity-25">';
        blogs += '<div class="mt-1 d-flex justify-content-between align-items-center w-100">';
        blogs += '<a href="https://thepienews.com/unified-consortium-in-india/" target="_blank" class="readmoreBtn">Read More</a>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '<div class="col-md-6 col-lg-4 cardpm">';
        blogs += '<div class="news-card h-100 d-flex flex-column">';
        blogs += '<a href="https://www.outlookindia.com/hub4business/maintaining-excellence-gresham-globals-continued-role-as-a-leading-representative-of-international-educational-institutes-in-the-global-market" target="_blank">';
        blogs += '<img src="{{ asset('
        website / assets / images / 1. png ') }}" alt="News Image" class="news-card-img">';
        blogs += '</a>';
        blogs += '<div class="news-card-body d-flex flex-column flex-grow-1">';
        blogs += '<div class="d-flex align-items-center gap-2 text-muted small">';
        blogs += '<img src="{{ asset('
        website / assets / images / time.svg ') }}" alt="Time Icon" class="icon-sm">';
        blogs += '<span>8 July 2024 | 5:56 IST</span>';
        blogs += '</div>';
        blogs += '<img src="{{ asset('
        website / assets / icons / Outlook 1. svg ') }}" alt="" class="repiblicimg">';
        blogs += '<a href="https://www.outlookindia.com/hub4business/maintaining-excellence-gresham-globals-continued-role-as-a-leading-representative-of-international-educational-institutes-in-the-global-market" target="_blank">';
        blogs += '<h5 class="news-card-title">Maintaining Excellence: Gresham Globals Continued Role...</h5>';
        blogs += '</a>';
        blogs += '<p class="news-card-text flex-grow-1">In today’s dynamic educational landscape, international institutions are increasingly focused on growth...</p>';
        blogs += '<hr class="opacity-25">';
        blogs += '<div class="mt-1 d-flex justify-content-between align-items-center w-100">';
        blogs += '<a href="https://www.outlookindia.com/hub4business/maintaining-excellence-gresham-globals-continued-role-as-a-leading-representative-of-international-educational-institutes-in-the-global-market" target="_blank" class="readmoreBtn">Read More</a>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';
        blogs += '</div>';

        $(".addmoreBlogs").html(blogs);

    });
</script>

<!-- Evenst details page dropdown -->

<script>
    $(window).on('load', function() {
        var $slider = $("#similar_newsandblogs_event"); // <- Corrected

        if ($slider.hasClass("slick-initialized")) {
            $slider.slick("unslick");
        }

        $slider.slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $(".btn[data-bs-slide='prev']").click(function() {
            $slider.slick("slickPrev");
        });

        $(".btn[data-bs-slide='next']").click(function() {
            $slider.slick("slickNext");
        });

        setTimeout(function() {
            $slider.slick('setPosition');
        }, 300);
    });
</script>

@stack('js_code')

</html>