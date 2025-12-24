@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">

                {{-- Error & Success Messages --}}
                @if(session('error_message_catch'))
                <div class="alert alert-danger">{{ session('error_message_catch') }}</div>
                @endif
                @if(session('status'))
                <div class="col-12 alert alert-success">{{ session('status') }}</div>
                @endif

                <form name="edit-banner" id="edit-banner" method="post" action="{{ url('admin/banner/edit/'.$bannerData['id']) }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Banner Title --}}
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName">Banner Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title', $bannerData['title']) }}" required>
                            </div>
                        </div>
                        {{-- Banner Type --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="banner_type" class="fullName">Banner Type</label>
                            <div class="input-group">
                                <select name="banner_type" id="banner_type" class="form-control" required>
                                    <option value="">Select Banner Type</option>
                                    <option value="event" {{ old('banner_type', $bannerData['banner_type']) == 'event' ? 'selected' : '' }}>Event Banner</option>
                                    <option value="media" {{ old('banner_type', $bannerData['banner_type']) == 'media' ? 'selected' : '' }}>Media Banner</option>
                                    <option value="publication" {{ old('banner_type', $bannerData['banner_type']) == 'publication' ? 'selected' : '' }}>Publication Banner</option>
                                </select>
                            </div>
                        </div>


                    </div>

                    {{-- Banner Type + Status --}}
                    <div class="form-flex-box p-0 mt-3">
                        {{-- Banner Image --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="image" class="fullName">Banner Image (Max: 1MB, Recommended: 1920x600px)</label>
                            <div class="input-group">
                                @if($bannerData['image'])
                                <a href="{{ asset($bannerData['image']) }}" target="_blank">
                                    <img src="{{ asset($bannerData['image']) }}" alt="Banner Image" style="max-height:100px;">
                                </a>
                                @endif
                                <input type="file" id="image" name="image" class="form-control mt-2">
                                <input type="hidden" name="image_original" value="{{ $bannerData['image'] }}">
                            </div>
                        </div>
                        {{-- Mobile Banner --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="mobile_image" class="fullName">
                                Mobile Banner Image (Max: 1MB, Recommended: 600X800px)
                            </label>
                            <div class="input-group">
                                @if($bannerData['mobile_image'])
                                <a href="{{ asset($bannerData['mobile_image']) }}" target="_blank">
                                    <img src="{{ asset($bannerData['mobile_image']) }}" alt="Banner Image" style="max-height:100px;">
                                </a>
                                @endif
                                <input type="file" id="mobile_image" name="mobile_image" class="form-control mt-2">
                                <input type="hidden" name="mobile_image_original" value="{{ $bannerData['mobile_image'] }}">
                            </div>
                        </div>


                    </div>

                    {{-- Order --}}
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="order" class="fullName">Order / Position Number</label>
                            <div class="input-group">
                                <input type="number" id="order" name="order" class="form-control"
                                    value="{{ old('order', $bannerData['order']) }}" min="0">
                            </div>
                        </div>
                        {{-- Status --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select id="status" name="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status', $bannerData['status']) == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status', $bannerData['status']) == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Redirect URL --}}
                    <!-- <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="redirect_url" class="fullName">Redirect URL (Optional)</label>
                            <div class="input-group">
                                <input type="url" id="redirect_url" name="redirect_url" class="form-control"
                                    value="{{ old('redirect_url', $bannerData['redirect_url']) }}">
                            </div>
                        </div>
                    </div> -->

                    {{-- Submit --}}
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit" style="height:50px;">Update Banner</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

@endsection