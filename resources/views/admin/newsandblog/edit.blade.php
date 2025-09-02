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

                    <!-- Title & Short Description -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName">News and Blogs Title</label>
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
                            <label for="thumbnail_image" class="fullName">Update Thumbnail Image (Max: 500KB, Recommended: 640x360px)</label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control" accept=".png, .jpg, .jpeg, .webp, .svg, image/png, image/jpeg, image/webp, image/svg+xml">
                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box {{ $errors->has('published_date') ? 'has-error' : '' }}">
                            <label for="published_date" class="fullName">Published Date</label>
                            <div class="input-group">
                                <!-- <input type="date" id="published_date" name="published_date" class="form-control" required value="{{ old('published_date', $newsblogData['published_date']) }}"> -->
                                <input type="datetime-local" id="published_date" name="published_date" class="form-control" required value="{{ old('published_date', \Carbon\Carbon::parse($newsblogData['published_date'])->format('Y-m-d\TH:i')) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnail Preview & Video Link -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Uploaded Thumbnail Image Preview</label><br>
                            <div class="input-group">
                                @if ($newsblogData['thumbnailImagePath'])
                                <a href="{{ $newsblogData['thumbnailImagePath'] }}" target="_blank">
                                    <img src="{{ $newsblogData['thumbnailImagePath'] }}" alt="Image Preview"
                                        style="max-width: auto; max-height: 100px;">
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('share_link') ? 'has-error' : '' }}">
                            <!-- <label for="share_link" class="fullName">Social Link</label>
                            <div class="input-group">
                                <input type="text" id="share_link" name="share_link" class="form-control"
                                    value="{{ old('share_link', $newsblogData['share_link'] ?? '') }}">
                            </div> -->
                        </div>
                    </div>

                    <!-- Social Link -->
                    <div class="form-flex-box p-0 mt-3">

                    </div>

                    <!-- Description -->
                    <div class="form-flex-box p-0 mt-3 desc_section">
                        <div class="form-group w-100 form-group-box {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description" class="description">Description (Upload image Max: 500KB, Dimensions: 1280x720px)</label>
                            <div class="input-group">
                                <textarea id="description" name="description" rows="10" class="form-control" required>{{ old('description', $newsblogData['description']) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3 desc_section statuswdth">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <!-- For Create: Default to 'active' if no status is provided in the form -->
                                <option value="active" {{ old('status', $new_and_blog->status ?? 'active') == 'active' ? 'selected' : '' }}>Published</option>
                                <option value="inactive" {{ old('status', $new_and_blog->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                    </div>

                    <!-- Hidden Original Image -->
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

@endsection