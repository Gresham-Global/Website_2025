@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">


                <form name="add-event" id="add-event" method="POST" action="{{ route('admin.event.store') }}"
                    enctype="multipart/form-data">
                    @csrf
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
                    <!-- Event Title & Short Description -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName">Event Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required
                                    value="{{ old('title') }}">
                            </div>
                            <span id="title-error" class="error" for="name" style="display: none;"></span>
                        </div>

                        <div
                            class="form-group w-48 form-group-box {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description" class="fullName">Short Description</label>
                            <div class="input-group">
                                <input type="text" id="short_description" name="short_description" class="form-control"
                                    required value="{{ old('short_description') }}">
                            </div>
                            <span id="short_description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Thumbnail Image & Video Link -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="thumbnail_image" class="fullName">Add Thumbnail Image (Max: 500KB, Recommended: 640x360px)</label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control" onchange="previewImage(event)" required accept=".png, .jpg, .jpeg, .webp, .svg, image/png, image/jpeg, image/webp, image/svg+xml">
                            </div>
                            <span id="thumbnail_image-error" class="error" for="name" style="display: none;"></span>
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('video_link') ? 'has-error' : '' }}">
                            <label for="video_link" class="fullName">Video Link</label>
                            <div class="input-group">
                                <input type="text" id="video_link" name="video_link" class="form-control" required
                                    value="{{ old('video_link') }}">
                            </div>
                            <span id="video_link-error" class="error" for="name" style="display: none;"></span>
                        </div>
                        <!-- <div class="form-group w-48 form-group-box {{ $errors->has('video_link') ? 'has-error' : '' }}">
                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Published</option>        
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Uploaded Thumbnail Image Preview</label><br>
                            <div class="input-group">
                                <img id="thumbnail_preview" src="#" alt="Image Preview" accept=".png, .jpg, .jpeg,.webp" style="display:none; height: 16rem;display: block;width: 100%;object-fit: fill;" />

                            </div>
                        </div>

                    </div>
                    <!-- <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control" style="height:50px">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div> -->

                    <!-- Social Link -->
                    <!-- <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-100 form-group-box {{ $errors->has('share_link') ? 'has-error' : '' }}">
                            <label for="share_link" class="fullName">Social Link</label>
                            <div class="input-group">
                                <input type="text" id="share_link" name="share_link" class="form-control" value="{{ old('share_link') }}">
                            </div>
                        </div>
                    </div> -->

                    <!-- Description -->
                    <div class="form-flex-box p-0 mt-3 desc_section">
                        <div
                            class="form-group w-100 form-group-box {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description" class="description">Description (Upload image Max: 500KB, Dimensions: 1280x720px)</label>
                            <div class="input-group">
                                <textarea id="description" name="description" rows="20" class="form-control w-100"
                                    required>{{ old('description') }}</textarea>
                            </div>
                            <span id="description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3 desc_section statuswdth">
                        <div class="form-group">
                            <!-- <label for="status">Status</label> -->
                            <!-- <select name="status" class="form-control" required>
                                <option value="active" {{ old('status', $event_status->status ?? '') == '1' ? 'selected' : '' }}>Published</option>
                                <option value="inactive" {{ old('status', $event_status->status ?? '') == '0' ? 'selected' : '' }}>Draft</option>
                            </select> -->
                            <!-- <select name="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="1" {{ old('status', $event_status->status ?? '') == '1' ? 'selected' : '' }}>Published</option>
                                <option value="0" {{ old('status', $event_status->status ?? '') == '0' ? 'selected' : '' }}>Draft</option>
                            </select> -->

                        </div>
                        <!-- <span id="status-error" class="error" for="name" style="display: none;"></span> -->
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex align-items-center justify-content-between mt-1">
                        <div class="form-group form-group-box w-48 d-flex justify-content-start statuswdth">
                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control" style="height:50px">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48 d-flex justify-content-end">
                            <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection


<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnail_preview');

        if (!input || !input.files || input.files.length === 0) {
            preview.src = '#';
            preview.style.display = 'none';
            return;
        }

        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }
</script>