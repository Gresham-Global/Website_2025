<div class="share-hit-popup" id="sharePopup">
    <div class="share-hit-popup-content">

        <!-- Header -->
        <div class="share-hit-header">
            <h3 class="share-hit-title">Share</h3>
            <span class="share-hit-popup-close">&times;</span>
        </div>

        <!-- Share Slider -->
        <div class="share-hit-slider-container">
            <button class="slider-arrow prev">&#10094;</button>
            <div class="share-hit-options">
                <a href="#" class="share-hit-option whatsapp" data-platform="whatsapp">
                    <i class="fab fa-whatsapp"></i>
                    <span class="share-hit-label">WhatsApp</span>
                </a>

                <a href="#" class="share-hit-option facebook" data-platform="facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span class="share-hit-label">Facebook</span>
                </a>

                <a href="#" class="share-hit-option linkedin" data-platform="linkedin">
                    <i class="fab fa-linkedin-in"></i>
                    <span class="share-hit-label">LinkedIn</span>
                </a>

                <a href="#" class="share-hit-option twitter" data-platform="twitter">
                    <i class="fab fa-x-twitter"></i>
                    <span class="share-hit-label">X</span>
                </a>

                <a href="#" class="share-hit-option email" data-platform="email">
                    <i class="fas fa-envelope"></i>
                    <span class="share-hit-label">Email</span>
                </a>
            </div>
            <button class="slider-arrow next">&#10095;</button>
        </div>

        <!-- Copy Link -->
        <div class="share-hit-copy">
            <input type="text" id="shareHitUrl" readonly>
            <button class="share-hit-copy-btn">Copy</button>
        </div>

    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('website/assets/share-hit/style.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('website/assets/share-hit/script.js') }}"></script>
@endpush