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

                <form name="edit_newsandblog" id="edit_newsandblog" method="POST" action="{{ url('admin/newsandblog/edit/'.$newsblogData['id']) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- News / Blog Type -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label class="fullName">Content Type</label>


                            <div class="input-group d-flex gap-4" style="height:50px; align-items:center; border: none; padding-left: 15px;">
                                <label class="d-flex align-items-center gap-4">
                                    <input type="radio" name="type" value="news"
                                       {{ old('type', $newsblogData['type'] ?? 'news') == 'news' ? 'checked' : '' }}>
                                    News
                                </label>


                                <label class="d-flex align-items-center gap-4" style="margin-left: 20px;">
                                    <input type="radio" name="type" value="blogs"
                                      {{ old('type', $newsblogData['type'] ?? 'blogs') == 'blogs' ? 'checked' : '' }}>
                                    Blog
                                </label>
                            </div>


                            <span id="type-error" class="error" style="display:none;"></span>
                        </div>
                    </div>
                    <!-- Title & Short Description -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName" id="titleLabel">News and Blogs Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required
                                    value="{{ old('title', $newsblogData['title']) }}">
                            </div>
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description" class="fullName">Short Description</label>
                            <div class="input-group">
                                <input type="text" id="short_description" name="short_description" class="form-control" required
                                    value="{{ old('short_description', $newsblogData['short_description']) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnail Upload -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="thumbnail_image" class="fullName">Update Thumbnail Image <small class="text-muted ">(Max: 500KB, Recommended: 640x360px)</small></label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control"
                                    accept=".png, .jpg, .jpeg, .webp, .svg, image/png, image/jpeg, image/webp, image/svg+xml"
                                    onchange="previewImage(event)">
                            </div>
                            <img id="thumbnail_preview" src="{{ !empty($newsblogData['thumbnailImagePath']) ? $newsblogData['thumbnailImagePath'] : '#' }}" alt="Image Preview" style="{{ !empty($newsblogData['thumbnailImagePath']) ? '' : 'display:none;' }}; width:100%; margin-top:5px;">
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('published_date') ? 'has-error' : '' }}">
                            <label for="published_date" class="fullName">Published Date</label>
                            <div class="input-group">
                                <input type="datetime-local" id="published_date" name="published_date" class="form-control" required
                                    value="{{ old('published_date', \Carbon\Carbon::parse($newsblogData['published_date'])->format('Y-m-d\TH:i')) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Banner Upload & Preview -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="banner_image" class="fullName">Update Banner Image <small class="text-muted ">(Upload image Max: 500KB, Dimensions: 1280x720px) / (Recommended format: <strong>.webp</strong>)</small></label>
                            <div class="input-group">
                                <input type="file" id="banner_image" name="banner_image" class="form-control" accept=".png,.jpg,.jpeg,.webp"
                                    onchange="previewBanner(event)">
                            </div>
                            <img id="banner_preview" src="{{ !empty($newsblogData['banner_image']) ? asset($newsblogData['banner_image']) : '#' }}"
                                style="max-height:100px; margin-top: 5px; {{ empty($newsblogData['banner_image']) ? 'display:none;' : '' }}" />
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    <div class="form-flex-box p-0 mt-3 template-gallery">
                        <div class="form-group w-100 form-group-box">
                            <label class="fullName">Gallery Images
                                <small class="text-muted ">
                                    (Upload image Max: 500KB, Dimensions: 1280x720px) / (Recommended format: <strong>.webp</strong>)
                                </small>
                            </label>

                            <div id="gallery-wrapper">
                                @php
                                $galleryImages = !empty($newsblogData['gallery_images']) ? json_decode($newsblogData['gallery_images'], true) : [];
                                @endphp

                                @if(!empty($galleryImages))
                                @foreach($galleryImages as $image)
                                <div class="input-group mb-2 gallery-row" style="min-height: 50px;">
                                    <input type="file" name="gallery_images[]" class="form-control"
                                        accept=".png,.jpg,.jpeg,.webp"
                                        onchange="validateGalleryImage(this)"
                                        data-max-size="512000" data-width="1280" data-height="720">

                                    <button type="button" class="btn btn-danger ms-2" onclick="removeGalleryImage(this)">Remove</button>
                                    <span class="text-danger small image-error d-block mt-1"></span>

                                    <!-- Existing Image Preview -->
                                    <div class="mt-1 existing-gallery">
                                        <img src="{{ asset($image) }}" style="max-height:100px;">
                                        <input type="hidden" name="existing_gallery_images[]" value="{{ $image }}">
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>

                            <button type="button" class="btn btn-primary mt-2" onclick="addGalleryImage()">+ Add Image</button>
                        </div>
                    </div>

                    <!-- Template Selection -->
                    <!-- <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="template" class="fullName">Select Template</label>
                            <select name="template" id="template" class="form-control" required>
                                <option value="classic" {{ old('template', $newsblogData['template'] ?? 'classic') == 'classic' ? 'selected' : '' }}>Classic</option>
                                <option value="media" {{ old('template', $newsblogData['template'] ?? 'classic') == 'media' ? 'selected' : '' }}>Media Focused</option>
                                <option value="split" {{ old('template', $newsblogData['template'] ?? 'classic') == 'split' ? 'selected' : '' }}>Split Layout</option>
                                <option value="story" {{ old('template', $newsblogData['template'] ?? 'classic') == 'story' ? 'selected' : '' }}>Story Layout</option>
                            </select>
                        </div>
                    </div> -->


                    <!-- Description -->
                    <div class="form-flex-box p-0 mt-3 desc_section">
                        <div class="form-group w-100 form-group-box {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description" class="description">Description </label>
                            <div class="input-group">
                                <textarea id="description" name="description" rows="10" class="form-control" required>{{ old('description', $newsblogData['description']) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Template Selection -->
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
                                $currentTemplate = old('template', $newsblogData['template'] ?? 'classic');
                                @endphp

                                @foreach($templates as $template)
                                <label class="template-card">
                                    <input type="radio" name="template" value="{{ $template['value'] }}" {{ $currentTemplate == $template['value'] ? 'checked' : '' }}>
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

                    <!-- Status -->
                    <div class="form-flex-box p-0 mt-3 desc_section statuswdth">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ old('status', $newsblogData['status'] ?? 1) == 1 ? 'selected' : '' }}>Published</option>
                                <option value="0" {{ old('status', $newsblogData['status'] ?? 1) == 0 ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                    </div>

                    <!-- Hidden Original Thumbnail -->
                    <input type="hidden" id="thumbnail_image_url_original" name="thumbnail_image_url_original"
                        class="form-control" value="{{ $newsblogData['thumbnail_image'] }}">

                    <!-- Submit Button -->
                    <div class="d-flex align-items-center justify-content-end mt-1">
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
    // Thumbnail preview
    function previewImage(event) {
        const preview = document.getElementById('thumbnail_preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.style.display = 'block';
    }

    // Banner preview
    function previewBanner(event) {
        const preview = document.getElementById('banner_preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.style.display = 'block';
    }

    // Gallery functions
    function validateGalleryImage(input) {
        const file = input.files[0];
        const errorBox = input.parentNode.querySelector('.image-error');
        errorBox.innerText = '';

        if (!file) return;

        const maxSize = parseInt(input.dataset.maxSize);
        if (file.size > maxSize) {
            errorBox.innerText = 'Image size must be less than 500KB';
            input.value = '';
            return;
        }

        const img = new Image();
        img.src = URL.createObjectURL(file);

        img.onload = function() {
            const requiredWidth = parseInt(input.dataset.width);
            const requiredHeight = parseInt(input.dataset.height);

            if (img.width !== requiredWidth || img.height !== requiredHeight) {
                errorBox.innerText = `Image dimensions must be ${requiredWidth}×${requiredHeight}px`;
                input.value = '';
                return;
            }

            showGalleryPreview(input, img.src);
        };
    }

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

    function addGalleryImage() {
        const wrapper = document.getElementById('gallery-wrapper');
        const row = document.createElement('div');
        row.className = 'input-group mb-2 gallery-row';

        row.innerHTML = `
            <input type="file" name="gallery_images[]" class="form-control"
                   accept=".png,.jpg,.jpeg,.webp"
                   onchange="validateGalleryImage(this)"
                   data-max-size="512000" data-width="1280" data-height="720" required>
            <button type="button" class="btn btn-danger ms-2" onclick="removeGalleryImage(this)">Remove</button>
            <span class="text-danger small image-error d-block mt-1"></span>
        `;
        wrapper.appendChild(row);
    }

    function removeGalleryImage(btn) {
        btn.closest('.gallery-row').remove();
    }
    document.addEventListener('DOMContentLoaded', function() {

        // Thumbnail preview
        window.previewImage = function(event) {
            const preview = document.getElementById('thumbnail_preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.style.display = 'block';
        };

        // Preview modal
        const modal = document.getElementById('templateModal');
        const modalImg = document.getElementById('modalImage');
        const closeModal = modal.querySelector('.modal-close');

        document.querySelectorAll('.btn-preview').forEach(btn => {
            btn.addEventListener('click', function() {
                const src = btn.dataset.preview;
                modalImg.src = src;
                modal.style.display = 'flex';
            });
        });

        closeModal.addEventListener('click', () => modal.style.display = 'none');
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.style.display = 'none';
        });

    });
</script>

@endsection