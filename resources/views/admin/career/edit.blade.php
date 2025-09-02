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
                <form name="edit_career" action="{{ url('admin/career/edit/'.$careerData['id'])}}" method="post"
                    id="edit_career" enctype="multipart/form-data">
                    @csrf

                    <!-- <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <div class="input-group">

                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <div class="input-group">

                            </div>
                        </div>
                    </div> -->


                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="title" class="fullName">Career Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required
                                    value="{{ old('title',$careerData['title'])}}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }} w-48 form-group-box">

                            <label for="status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control" style="height:50px">
                                    <option value="">Select Status</option>
                                    <option value="active"
                                        {{ old('status',$careerData['status']) == "active" ? 'selected' : '' }}>
                                        Published
                                    </option>
                                    <option value="inactive"
                                        {{ old('status',$careerData['status']) == "inactive" ? 'selected' : '' }}>Draft
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-md-12 desc_section">
                        <div class="form-group">
                            <label for="short_description" class="description">Short Description </label>
                            <div class="input-group w-100">
                                <textarea id="short_description" rows="20" name="short_description"
                                    class="form-control">{{ old('short_description',$careerData['short_description']) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-md-12 desc_section">
                        <div class="form-group">
                            <label for="thumbnail_image" class="description">Description (Upload image Max: 500KB,
                                Dimensions: 1280x720px)</label>
                            <div class="input-group w-100">
                                <textarea id="description" rows="20" name="description" class="form-control w-100"
                                    required>{{ old('description',$careerData['description']) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="cover_image" class="fullName">Add Cover Image (Max: 500KB, Recommended:
                                1920x560px)</label>
                            <div class="input-group">
                                <input type="file" id="cover_image" name="cover_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Uploaded Thumbnail Image Preview</label><br>
                            <div class="input-group">
                                @if ($careerData['coverImagePath'])
                                <a href="{{ $careerData['coverImagePath'] }}" target="_blank">
                                    <img src="{{ $careerData['coverImagePath'] }}" alt="Image Preview"
                                        style="max-width: auto; max-height: 100px;">
                                </a>
                                @endif
                            </div>
                        </div>

                        
                    </div>



                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection