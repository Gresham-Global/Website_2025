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
                <form name="edit_life" id="edit_life" method="post" action="{{ url('admin/life/edit/'.$lifeData['id'])}}"
                    enctype="multipart/form-data">
                    @csrf




                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="title" class="fullName">Life Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required
                                    value="{{ old('title') ? old('title') : $lifeData['title'] }}">
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48">
                            <label for="thumbnail_image" class="fullName">Add thumbnail image (Max: 500KB, Recommended:
                                640x360px)</label>
                            <div class="input-group">
                                @if ($lifeData['thumbnailImagePath'])
                                <a href="{{ $lifeData['thumbnailImagePath'] }}" target="_blank">
                                    <img src="{{ $lifeData['thumbnailImagePath'] }}" alt="Image Preview"
                                        style="max-width: auto; max-height: 100px;">
                                </a>
                                @endif
                            </div>
                        </div>


                    </div>


                    <div class="form-flex-box p-0 mt-3">

                        <div class="form-group w-48 form-group-box">
                            <label for="order" class="fullName">Order / Position Number</label>
                            <div class="input-group">
                                <input type="number" id="order" name="order" class="form-control"
                                    value="{{ old('order') ? old('order') : $lifeData['order'] }}" min="0">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('Status') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="Status" class="fullName">Status</label>
                            <div class="input-group">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <<option value="1" {{ old('status',$lifeData['status']) == 1 ? 'selected' : '' }}>Published</option>
                                        <option value="0" {{ old('status',$lifeData['status']) == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <input type="hidden" id="thumbnail_image_url_original" name="thumbnail_image_url_original"
                        class="form-control" value="{{$lifeData['thumbnail_image']}}">
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection