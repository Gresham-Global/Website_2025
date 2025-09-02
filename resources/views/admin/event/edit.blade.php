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

                <form name="edit_event" id="edit_event" method="POST"
                    action="{{ url('admin/event/edit/'.$eventData['id']) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Title & Short Description -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName">Event Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required
                                    value="{{ old('title', $eventData['title']) }}">
                            </div>
                            <span id="title-error" class="error" for="name" style="display: none;"></span>
                        </div>

                        <div
                            class="form-group w-48 form-group-box {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description" class="fullName">Short Description</label>
                            <div class="input-group">
                                <input type="text" id="short_description" name="short_description" class="form-control"
                                    required value="{{ old('short_description', $eventData['short_description']) }}">
                            </div>
                            <span id="short_description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Thumbnail Upload -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="thumbnail_image" class="fullName">Update Thumbnail Image (Max: 500KB, Recommended: 640x360px)</label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control" accept=".png, .jpg, .jpeg, .webp, .svg, image/png, image/jpeg, image/webp, image/svg+xml">
                            </div>
                            <span id="thumbnail_image-error" class="error" for="name" style="display: none;"></span>
                        </div>
                        <div class="form-group w-48 form-group-box {{ $errors->has('video_link') ? 'has-error' : '' }}">
                            <label for="video_link" class="fullName">Video Link</label>
                            <div class="input-group">
                                <input type="text" id="video_link" name="video_link" class="form-control" required
                                    value="{{ old('video_link', $eventData['video_link']) }}">
                            </div>
                            <span id="video_link-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Thumbnail Preview & Video Link -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Uploaded Thumbnail Image Preview</label><br>
                            <div class="input-group">
                                @if ($eventData['thumbnailImagePath'])
                                <a href="{{ $eventData['thumbnailImagePath'] }}" target="_blank">
                                    <img src="{{ $eventData['thumbnailImagePath'] }}" alt="Image Preview"
                                        style="max-width: auto; max-height: 100px;">
                                </a>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group w-48 form-group-box {{ $errors->has('share_link') ? 'has-error' : '' }}">
                            <label for="share_link" class="fullName">Social Link</label>
                            <div class="input-group">
                                <input type="text" id="share_link" name="share_link" class="form-control"
                                    value="{{ old('share_link', $eventData['share_link'] ?? '') }}">
                            </div>
                        </div> -->

                        <div class="form-group form-group-box w-25 statuswdth">
                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control" style="height:50px">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status', $eventData['status'])  == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status', $eventData['status']) == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Social Link -->
                    <div class="form-flex-box p-0 mt-3">

                    </div>

                    <!-- Description -->
                    <div class="form-flex-box p-0 mt-3 desc_section">
                        <div
                            class="form-group w-100 form-group-box {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description" class="description">Description (Upload image Max: 500KB, Dimensions: 1280x720px)</label>
                            <div class="input-group">
                                <textarea id="description" name="description" rows="10" class="form-control"
                                    required>{{ old('description', $eventData['description']) }}</textarea>
                            </div>
                            <span id="description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Hidden Original Image -->
                    <input type="hidden" id="thumbnail_image_url_original" name="thumbnail_image_url_original"
                        class="form-control" value="{{ $eventData['thumbnail_image'] }}">

                    <!-- Submit Button -->
                    <div class="d-flex align-items-center justify-content-end mt-1">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection