@if(!empty($images))
<div class="image-gallery" id="image-gallery">
    @foreach($images as $image)
    <img src="{{ asset(trim($image, '/')) }}" alt="Gallery image">
    @endforeach
</div>
@endif

@push('scripts')
<script>
    function shuffleImages() {
        const gallery = document.getElementById("image-gallery");
        if (!gallery) return;

        const images = Array.from(gallery.children);
        for (let i = images.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            gallery.appendChild(images[j]);
        }
    }
    window.addEventListener('load', shuffleImages);
</script>
@endpush