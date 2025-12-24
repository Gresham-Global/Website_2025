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
                <form name="add-media" id="add-media" method="post" action="{{route('admin.life.store')}}"
                    enctype="multipart/form-data">
                    @csrf




                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="title" class="fullName">Life Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required
                                    value="{{ old('title')}}">
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48">
                            <label for="thumbnail_image" class="fullName">Add thumbnail image (Max: 500KB, Recommended:
                                640x360px)</label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control">
                            </div>
                        </div>

                        <!-- <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="short_description" class="fullName">Short Description</label>
                            <div class="input-group">
                                <input type="text" id="short_description" name="short_description" class="form-control"
                                    required value="{{ old('short_description')}}">
                            </div>
                        </div> -->
                    </div>


                    <div class="form-flex-box p-0 mt-3">


                        <!-- <div class="form-group form-group-box w-48">
                            <label for="logo_image" class="fullName">Add logo image (Max: 500KB, 500x500px)</label>
                            <div class="input-group">
                                <input type="file" id="logo_image" name="logo_image" class="form-control">
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('life_link') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="life_link" class="fullName">Life link</label>
                            <div class="input-group">
                                <input type="text" id="life_link" name="life_link" class="form-control" required
                                    value="{{ old('life_link')}}">
                            </div>
                        </div>
                        <div
                            class="form-group {{ $errors->has('publish_date') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="publish_date" class="fullName">Publish Date</label>
                            <div class="input-group">
                                <input type="datetime-local" id="publish_date" name="publish_date" class="form-control"
                                    required value="{{ old('publish_date')}}">
                            </div>
                        </div>
                    </div> -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="order" class="fullName">Order / Position Number</label>
                            <div class="input-group">
                                <input type="number" id="order" name="order" class="form-control"
                                    value="{{ old('order', $field->order ?? 0) }}" min="0">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('Status') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="Status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
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