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
                <form name="edit_media" action="{{ url('admin/media/edit/'.$mediaData['id'])}}" method="post"
                    id="edit_media" enctype="multipart/form-data">
                    @csrf

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="title" class="fullName">Media Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required
                                    value="{{ old('title') ? old('title') : $mediaData['title'] }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="short_description" class="fullName">Short Description</label>
                            <div class="input-group">
                                <input type="text" id="short_description" name="short_description" class="form-control"
                                    required
                                    value="{{ old('short_description') ? old('short_description') : $mediaData['short_description'] }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="thumbnail_image" class="fullName">Update Thumbnail image (Max: 500KB, Recommended: 640x360px) </label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image[]" class="form-control" multiple>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="logo_image" class="fullName">Update Logo image (Max: 500KB, Recommended: 640x360px)</label>
                            <div class="input-group">
                                <input type="file" id="logo_image" name="logo_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="image" class="fullName">Uploaded thumbnail image preview</label><br>

                            @php
                            $images = is_string($mediaData['thumbnailImagePath'])
                            ? json_decode($mediaData['thumbnailImagePath'], true)
                            : $mediaData['thumbnailImagePath'];
                            @endphp

                            <input type="hidden" name="removed_images" id="removed_images">

                            @if (!empty($images))
                            <div id="thumbnail-wrapper" style="display:flex; gap:15px; flex-wrap:wrap;">
                                @foreach ($images as $image)
                                <div class="thumb-box" data-image="{{ $image }}"
                                    style="position:relative; width:100px;">

                                    <img src="{{ asset($image) }}"
                                        style="height:100px; width:100px; object-fit:cover; border-radius:6px;">

                                    <button type="button"
                                        onclick="removeThumbnail(this)"
                                        style="
                        position:absolute;
                        top:-8px;
                        right:-8px;
                        background:red;
                        color:#fff;
                        border:none;
                        border-radius:50%;
                        width:24px;
                        height:24px;
                        cursor:pointer;
                        font-size:16px;
                    ">
                                        ×
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="input-group">
                                <!-- @if ($mediaData['thumbnailImagePath'])
                                <a href="{{ $mediaData['thumbnailImagePath'] }}" target="_blank">
                                    <img src="{{ $mediaData['thumbnailImagePath'] }}" alt="Image Preview"
                                        style="max-width: auto; max-height: 100px;">
                                </a>
                                @endif -->
                                @php
                                $images = is_string($mediaData['thumbnailImagePath'])
                                ? json_decode($mediaData['thumbnailImagePath'], true)
                                : $mediaData['thumbnailImagePath'];
                                @endphp

                                @if (!empty($images))
                                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                                    @foreach ($images as $image)
                                    <a href="{{ asset($image) }}" target="_blank">
                                        <img src="{{ asset($image) }}"
                                            alt="Image Preview"
                                            style="height:100px; width:100px; object-fit:cover; border-radius:6px;">
                                    </a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group w-48 form-group-box">
                            <label for="cover_image" class="fullName">Uploaded logo image file preview</label><br>
                            <div class="input-group">
                                @if ($mediaData['logoImagePath'])
                                <a href="{{ $mediaData['logoImagePath'] }}" target="_blank">
                                    <img src="{{ $mediaData['logoImagePath'] }}" alt="Cover Image Preview"
                                        style="max-width: auto; max-height: 100px;">
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('media_link') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="media_link" class="fullName">Media link</label>
                            <div class="input-group">
                                <input type="text" id="media_link" name="media_link" class="form-control" required
                                    value="{{ old('media_link') ? old('media_link') : $mediaData['media_link'] }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="publish_date" class="fullName">Publish Date</label>
                            <div class="input-group">
                                <input type="datetime-local" id="publish_date" name="publish_date" class="form-control" required value="{{ old('publish_date',$mediaData['publish_date'])}}">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="thumbnail_image_url_original" name="thumbnail_image_url_original"
                        class="form-control" value="{{$mediaData['thumbnail_image']}}">
                    <input type="hidden" id="logo_image_url_original" name="logo_image_url_original"
                        class="form-control" value="{{$mediaData['logo_image']}}">
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('Status') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="Status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status',$mediaData['status']) == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status',$mediaData['status']) == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mt-1">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    let removedImages = [];

    function removeThumbnail(button) {
        const box = button.closest('.thumb-box');
        const imagePath = box.getAttribute('data-image');

        removedImages.push(imagePath);
        document.getElementById('removed_images').value = JSON.stringify(removedImages);

        box.remove();
    }
</script>
@endsection