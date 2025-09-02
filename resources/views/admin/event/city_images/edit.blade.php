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

                <form name="edit-city-image" id="edit-city-image" method="POST"
                    action="{{ url('admin/event/city/images/edit/'.$event->id.'/'.$city->id) }}"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-flex-box p-0 mt-3">
                        {{-- Event Dropdown --}}
                        <div class="form-group form-group-box w-48">
                            <label for="event_id" class="fullName">Event</label>
                            <div class="input-group">
                                <input type="text" name="event" id="event" class="form-control boxline"
                                    value="{{ $event->title }}" readonly>
                                <input type="hidden" name="event_id" id="event_id" class="form-control"
                                    value="{{ $event->id }}">
                            </div>
                        </div>

                        {{-- City Select2 Multi + Tag Support --}}
                        <div class="form-group form-group-box w-48">
                            <label for="city_id" class="fullName">City</label>
                            <div class="input-group">
                                <input type="text" name="city" id="city" class="form-control boxline"
                                    value="{{ $city->city_name }}" readonly>
                                <input type="hidden" name="city_id" id="city_id" class="form-control"
                                    value="{{ $city->id }}" readonly>
                            </div>
                        </div>
                    </div>

                    {{-- Hidden field to store deleted image IDs --}}
                    <input type="hidden" name="delete_image_ids" id="delete_image_ids" value="">

                    {{-- Existing Images --}}
                    <div class="form-flex-box p-0 mt-3 " id="existing-images-wrapper" >
                        @foreach($eventCityImage as $img)
                        <div class="form-group w-48 form-group-box image-upload-div existing-image"
                            data-id="{{ $img->id }}">
                            <label class="fullName">Change Image (Max: 500KB, Recommended: 640x360px)</label>

                            {{-- File input field shown first --}}
                            <input type="file" name="city_images[{{ $img->id }}]" class="form-control city-image-input boxline"
                                id="new_image_{{ $img->id }}" accept="image/png, image/jpeg, image/jpg, image/webp" multiple
                                onchange="previewImageEdit(this)">

                            {{-- Image preview or existing image shown in same spot --}}
                            <div class="image-preview-container mt-2 boxline">
                                <img src="{{ asset($img->image_path) }}" alt="City Image" class=""
                                    style="width: 100%; object-fit: cover;">
                            </div>

                            {{-- Delete Button for the Existing Image --}}
                            <button type="button" class="btn btn-danger btn-sm mt-2 delete-existing-image"
                                data-image-id="{{ $img->id }}">Delete</button>

                            {{-- Hidden original image path --}}
                            <input type="hidden" name="existing_image_paths[{{ $img->id }}]"
                                value="{{ $img->image_path }}">
                        </div>
                        @endforeach
                    </div>
                    <hr width="90%" size="10" class="text-center divideline">
                    <p class="notetxt"><strong>Note:</strong> <span class="notesubtxt">Upload images</span> </p>
                    <div class="form-flex-box p-0 mt-3 row  " id="image-upload-container">
                        <!-- <div class="form-group w-48 form-group-box image-upload-div">
                            <label class="fullName">Upload City Image</label>
                            <div class="input-group">
                                <input type="file" name="city_images[]" class="form-control city-image-input"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" required multiple
                                    onchange="previewImageEdit(this)">
                            </div>
                            <div class="image-preview-container"></div>
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-new-image">Remove</button>
                        </div> -->
                    </div>

                    <!-- Submit -->
                    <button class="btn btn-primary" type="button" id="add-image-btn" style="height: 50px">Add Image</button>
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection

