@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                @if(session('error_message_catch'))
                <div class="alert alert-danger">
                    {{ session('error_message_catch') }}
                </div>
                @endif

                @if(session('status'))
                <div class="col-12 alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form name="add-newsandblog" id="add-newsandblog" method="POST" action="{{ route('admin.newsandblog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- News / Blog Type -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label class="fullName">Content Type</label>


                            <div class="input-group d-flex gap-4" style="height:50px; align-items:center; border: none; padding-left: 15px;">
                                <label class="d-flex align-items-center gap-4" >
                                    <input type="radio" name="type" value="news"
                                        {{ old('type', 'news') == 'news' ? 'checked' : '' }}>
                                    News
                                </label>


                                <label class="d-flex align-items-center gap-4" style="margin-left: 20px;">
                                    <input type="radio" name="type" value="blogs"
                                        {{ old('type') == 'blogs' ? 'checked' : '' }}>
                                    Blog
                                </label>
                            </div>


                            <span id="type-error" class="error" style="display:none;"></span>
                        </div>
                    </div>
                    <!-- Event Title & Short Description -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName" id="titleLabel">News and Blogs Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required value="{{ old('title') }}">
                            </div>
                            <span id="title-error" class="error" for="name" style="display: none;"></span>
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description" class="fullName">Short Description</label>
                            <div class="input-group">
                                <input type="text" id="short_description" name="short_description" class="form-control" required value="{{ old('short_description') }}">
                            </div>
                            <span id="short_description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Thumbnail Image & Video Link -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="thumbnail_image" class="fullName">Add Thumbnail Image <small class="text-muted ">(Max: 500KB, Recommended: 640x360px)</small></label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control"
                                    accept=".png, .jpg, .jpeg, .webp, .svg, image/png, image/jpeg, image/webp, image/svg+xml" onchange="previewImage(event)" required>
                            </div>
                            <span id="thumbnail_image-error" class="error" for="name" style="display: none;"></span>
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('published_date') ? 'has-error' : '' }}">
                            <label for="published_date" class="fullName">Published Date</label>
                            <div class="input-group">
                                <!-- <input type="date" id="published_date" name="published_date" class="form-control" required value="{{ old('published_date') }}"> -->
                                <input type="datetime-local" id="published_date" name="published_date" class="form-control" required value="{{ old('published_date') }}">

                            </div>
                            <span id="published_date-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Social Link -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Uploaded Thumbnail Image Preview</label><br>
                            <div class="input-group">
                                <img id="thumbnail_preview" src="#" alt="Image Preview" style="display:none; width: 100%" />
                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box {{ $errors->has('share_link') ? 'has-error' : '' }}">
                            <!-- <label for="share_link" class="fullName">Social Link</label>
                            <div class="input-group">
                                <input type="text" id="share_link" name="share_link" class="form-control" value="{{ old('share_link') }}">
                            </div>
                            <span id="share_link-error" class="error" for="name" style="display: none;"></span> -->
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="banner_image" class="fullName">
                                Banner Image <small class="text-muted ">(Upload image Max: 500KB, Dimensions: 1280x720px) / (Recommended format: <strong>.webp</strong>)</small>
                            </label>
                            <div class="input-group">
                                <input type="file" accept=".png,.jpg,.jpeg,.webp" id="banner_image" name="banner_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    {{-- Gallery Images --}}
                    <div class="form-flex-box p-0 mt-3 template-gallery">
                        <div class="form-group w-100 form-group-box">

                            <label class="fullName">
                                Gallery Images
                                <small class="text-muted ">
                                    (Upload image Max: 500KB, Dimensions: 1280x720px) / (Recommended format: <strong>.webp</strong>)
                                </small>
                            </label>

                            <div id="gallery-wrapper">
                                <div class="input-group mb-2 gallery-row">
                                    <input type="file"
                                        name="gallery_images[]"
                                        class="form-control"
                                        accept=".png,.jpg,.jpeg,.webp"
                                        onchange="validateGalleryImage(this)"
                                        data-max-size="512000"
                                        data-width="1280"
                                        data-height="720"
                                        required>

                                    <span class="text-danger small image-error d-block mt-1"></span>

                                    <button type="button"
                                        class="btn btn-danger ms-2 remove-gallery"
                                        style="display:none"
                                        onclick="removeGalleryImage(this)">
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <button type="button"
                                class="btn btn-primary mt-2"
                                onclick="addGalleryImage()">
                                + Add Image
                            </button>

                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-flex-box p-0 mt-3 desc_section">
                        <div class="form-group w-100 form-group-box {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description" class="description">Description </label>
                            <div class="input-group">
                                <textarea id="description" name="description" rows="20" class="form-control w-100" required>{{ old('description') }}</textarea>
                            </div>
                            <span id="description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>
                    {{--
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="template" class="description">Page Template</label>
                            <div class="input-group">
                                <select name="template" id="template" class="form-control">
                                    <option value="classic">Classic (Default)</option>
                                    <option value="media">Media Focused</option>
                                    <option value="split">Split Layout</option>
                                    <option value="story">Story Layout</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    --}}
                    <!-- Page Template Selection -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-100 form-group-box ">
                            <label for="template" class="description ">Select Template</label>
                            <div class="template-grid">

                                @php
                                $templates = [
                                ['value' => 'classic', 'name' => 'Classic', 'img' => '/website/assets/images/templates/classic-template.webp'],
                                ['value' => 'media', 'name' => 'Media Focused', 'img' => '/website/assets/images/templates/media-template.webp'],
                                ['value' => 'split', 'name' => 'Split Layout', 'img' => '/website/assets/images/templates/split-template.webp'],
                                ['value' => 'story', 'name' => 'Story Layout', 'img' => '/website/assets/images/templates/story-template.webp'],
                                ];
                                @endphp

                                @foreach($templates as $template)
                                <label class="template-card">
                                    <input type="radio" name="template" value="{{ $template['value'] }}" {{ $loop->first ? 'checked' : '' }}>
                                    <div class="card-body">
                                        <h4>{{ $template['name'] }}</h4>
                                        <img src="{{ $template['img'] }}">

                                        <div class="selected-tick">&#10004;</div>

                                        <!-- <div class="btn-row">
                                        <button type="button"
                                            class="btn-preview"
                                            data-preview="{{ $template['img'] }}">
                                            Preview
                                        </button>
                                    </div> -->
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">

                        <div class="form-group form-group-box w-25 statuswdth">
                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control" style="height:50px">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Preview Modal -->
<!-- <div id="templateModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <img src="" id="modalImage" style="width:100%; max-height:80vh; object-fit:contain;">
    </div>
</div> -->
<style>
    .template-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 16px;
    }

    .template-card input {
        display: none;
    }

    .card-body {
        border: 2px solid #eee;
        border-radius: 10px;
        padding: 6px;
        text-align: center;
        transition: 0.25s;
        position: relative;
        cursor: pointer;
    }

    .template-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .template-card .selected-tick {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #28a745;
        color: #fff;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: none;
        justify-content: center;
        align-items: center;
        font-weight: bold;
    }

    .template-card input:checked+.card-body {
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, .15);
    }

    .template-card input:checked+.card-body .selected-tick {
        display: flex;
    }

    /* Modal styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-content {
        background: #fff;
        padding: 16px;
        border-radius: 10px;
        position: relative;
        max-width: 90%;
    }

    .modal-close {
        position: absolute;
        top: 8px;
        right: 12px;
        font-size: 24px;
        cursor: pointer;
        color: #333;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleLabel = document.getElementById('titleLabel');
        const typeRadios = document.querySelectorAll('input[name="type"]');


        function updateTitleLabel() {
            const selectedType = document.querySelector('input[name="type"]:checked')?.value;


            if (selectedType === 'news') {
                titleLabel.innerText = 'News Title';
            } else if (selectedType === 'blogs') {
                titleLabel.innerText = 'Blog Title';
            } else {
                titleLabel.innerText = 'News and Blogs Title';
            }
        }


        // Initial load
        updateTitleLabel();


        // On change
        typeRadios.forEach(radio => {
            radio.addEventListener('change', updateTitleLabel);
        });
    });

    function validateGalleryImage(input) {
        const file = input.files[0];
        const errorBox = input.parentNode.querySelector('.image-error');
        errorBox.innerText = '';

        if (!file) return;

        /* ---------- SIZE VALIDATION ---------- */
        const maxSize = parseInt(input.dataset.maxSize); // 500KB
        if (file.size > maxSize) {
            errorBox.innerText = 'Image size must be less than 500KB';
            input.value = '';
            return;
        }

        /* ---------- DIMENSION VALIDATION ---------- */
        const img = new Image();
        img.src = URL.createObjectURL(file);

        img.onload = function() {
            const requiredWidth = parseInt(input.dataset.width);
            const requiredHeight = parseInt(input.dataset.height);

            if (img.width !== requiredWidth || img.height !== requiredHeight) {
                errorBox.innerText =
                    `Image dimensions must be ${requiredWidth}×${requiredHeight}px`;
                input.value = '';
                return;
            }

            // SUCCESS → show preview
            showGalleryPreview(input, img.src);
        };
    }

    /* ---------- PREVIEW ---------- */
    function showGalleryPreview(input, src) {
        let preview = input.parentNode.querySelector('img');

        if (!preview) {
            preview = document.createElement('img');
            preview.style.maxHeight = '100px';
            preview.style.marginTop = '8px';
            input.parentNode.appendChild(preview);
        }

        preview.src = src;
    }

    /* ---------- ADD / REMOVE ---------- */
    function addGalleryImage() {
        const wrapper = document.getElementById('gallery-wrapper');

        const row = document.createElement('div');
        row.className = 'input-group mb-2 gallery-row';

        row.innerHTML = `
        <input type="file"
               name="gallery_images[]"
               class="form-control"
               accept=".png,.jpg,.jpeg,.webp"
               onchange="validateGalleryImage(this)"
               data-max-size="512000"
               data-width="1280"
               data-height="720"
               required>

        <button type="button"
                class="btn btn-danger ms-2"
                onclick="removeGalleryImage(this)">
            Remove
        </button>
        <span class="text-danger small image-error d-block mt-1"></span>
    `;

        wrapper.appendChild(row);
    }

    function removeGalleryImage(btn) {
        btn.closest('.gallery-row').remove();
    }
    // document.addEventListener('DOMContentLoaded', function() {

    //     // Thumbnail preview
    //     window.previewImage = function(event) {
    //         const preview = document.getElementById('thumbnail_preview');
    //         preview.src = URL.createObjectURL(event.target.files[0]);
    //         preview.style.display = 'block';
    //     };

    //     // Preview modal
    //     const modal = document.getElementById('templateModal');
    //     const modalImg = document.getElementById('modalImage');
    //     const closeModal = modal.querySelector('.modal-close');

    //     document.querySelectorAll('.btn-preview').forEach(btn => {
    //         btn.addEventListener('click', function() {
    //             const src = btn.dataset.preview;
    //             modalImg.src = src;
    //             modal.style.display = 'flex';
    //         });
    //     });

    //     closeModal.addEventListener('click', () => modal.style.display = 'none');
    //     modal.addEventListener('click', (e) => {
    //         if (e.target === modal) modal.style.display = 'none';
    //     });

    // });
</script>
@endsection