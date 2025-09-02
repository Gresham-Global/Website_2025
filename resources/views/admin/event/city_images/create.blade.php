@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">

                @if(session('error_message_catch'))
                <div class="alert alert-danger">{{ session('error_message_catch') }}</div>
                @endif

                @if(session('status'))
                <div class="col-12 alert alert-success">{{ session('status') }}</div>
                @endif

                <form name="add-city-image" id="add-city-image" method="POST"
                    action="{{ route('admin.event.city.images.store') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-flex-box p-0 mt-3">
                        {{-- Event Dropdown --}}
                        <div class="form-group form-group-box w-48">
                            <label for="event_id" class="fullName">Event</label>
                            <div class="input-group">
                                <select name="event_id" id="event_id" class="form-control" style="height:50px">
                                    <option value="">Select Event</option>
                                    @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="event_id-error" class="error" style="display: none;"></span>
                        </div>

                        {{-- City Select2 Multi + Tag Support --}}
                        <div class="form-group form-group-box w-48">
                            <label for="city_id" class="fullName">City</label>
                            <div class="input-group">
                                <select name="city_id" id="city_id" class="form-control" style="height:50px">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <span id="city_id-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3 row" id="image-upload-container">
                        <div class="form-group w-48 form-group-box image-upload-div">
                            <label class="fullName">Upload City Image (Max: 500KB, Recommended: 640x360px)</label>
                            <div class="input-group">
                                <!-- <input type="file" name="city_images[]" class="form-control city-image-input" accept="image/png, image/jpeg, image/jpg, image/webp" required onchange="previewImageEdit(this)" style="width: 100%"> -->

                                <input type="file" name="city_images[]" class="form-control city-image-input" accept="image/png, image/jpeg, image/jpg, image/webp" required multiple onchange="previewImageEdit(this)" style="width: 100%">
                            </div>
                            <span id="city_images-error" class="error" style="display: none;"></span>
                            <div class="image-preview-container d-none" style="height: 20rem;display: block;width: 100%;object-fit: fill;"></div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <!-- <button class="btn btn-primary" type="button" id="add-image-btn" style="height: 50px">Add Image</button>
                    <div class="d-flex align-items-center justify-content-end mt-4"> -->

                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection