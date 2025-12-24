@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">

                {{-- Error & Success Message --}}
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

                <form name="add-banner" id="add-banner" method="post" action="{{route('admin.banner.store')}}" enctype="multipart/form-data">
                    @csrf

                    {{-- Banner Title --}}
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName">Banner Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title') }}" required>
                            </div>
                        </div>

                        {{-- Banner Type --}}
                        <div class="form-group w-48 form-group-box {{ $errors->has('banner_type') ? 'has-error' : '' }}">
                            <label for="banner_type" class="fullName">Page</label>
                            <div class="input-group">
                                <select name="banner_type" id="banner_type" class="form-control" required>
                                    <option value="">Select Banner Page</option>
                                    <option value="event" {{ old('banner_type') == 'home' ? 'selected' : '' }}>Event Banner</option>
                                    <option value="media" {{ old('banner_type') == 'about' ? 'selected' : '' }}>Media Banner</option>
                                    <option value="publication" {{ old('banner_type') == 'service' ? 'selected' : '' }}>Publication Banner</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">

                        {{-- Desktop Banner --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="image" class="fullName">
                                Desktop Banner Image (Max: 1MB, Recommended: 1920x600px)
                            </label>
                            <div class="input-group">
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>
                        </div>

                        {{-- Mobile Banner --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="mobile_image" class="fullName">
                                Mobile Banner Image (Max: 1MB, Recommended: 600x800px)
                            </label>
                            <div class="input-group">
                                <input type="file" id="mobile_image" name="mobile_image" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    {{-- Banner Type + Status --}}
                    <div class="form-flex-box p-0 mt-3">

                        {{-- Status --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select id="status" name="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                        {{-- Order --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="order" class="fullName">Order / Position Number</label>
                            <div class="input-group">
                                <input type="number" id="order" name="order" class="form-control"
                                    value="{{ old('order', 0) }}" min="0">
                            </div>
                        </div>

                    </div>




                    {{-- Submit --}}
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection