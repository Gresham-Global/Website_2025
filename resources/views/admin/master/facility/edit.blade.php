@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <form name="add_discipline" action="{{ url('admin/master/facility/' . $facility['id'] . '/edit') }}"
                    method="post" id="add_discipline" enctype="multipart/form-data">
                    @csrf
                    @if(session('status'))
                        <div class="col-12 alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('error_message_catch'))
                        <div class="col-12 alert alert-danger">
                            {{ session('error_message_catch') }}
                        </div>
                    @endif
                    <br>
                    <input type="hidden" id="course_level_id" name="course_level_id" value="{{$facility['id']}}">



                    <div class="form-flex-box p-0">
                        <div class="form-group form-group-box w-48">
                            <label for="name" class="fullName">Name</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $facility['facilityName'] }}" required>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="name_ban" class="fullName">Name / Ban</label>
                            <div class="input-group">
                                <input type="text" id="name_ban" name="name_ban" class="form-control"
                                    value="{{ $facility['facilityName_ban'] }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="description" class="fullName">Description</label>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" placeholder="Enter Description" id="description"
                                    name="description">{{ $facility['facilityDescription'] }}</textarea>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="description_ban" class="fullName">Description / Ban</label>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" placeholder="Enter Description"
                                    id="description_ban"
                                    name="description_ban">{{ $facility['facilityDescription_ban'] }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="facility_category_id" class="fullName">Facility Category</label>
                            <div class="input-group">
                                <select id="facility_category_id" name="facility_category_id" class="form-control" style="height: 50px">
                                    <option value="">Select Facility Category</option>
                                    @foreach($facilityCategories as $facilityCategory)
                                        <option value="{{ $facilityCategory['id'] }}"
                                            {{ $facilityCategory['id'] == $facility['facilityCategoryId'] ? 'selected' : '' }}>
                                            {{ $facilityCategory['facilityCategoryName'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="facility_icon_url" class="fullName">Facility Icon</label>
                            <div class="input-group">
                                <input type="file" id="facility_icon_url" name="facility_icon_url" class="form-control"
                                    accept=".jpeg,.png,.jpg">
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="facility_icon_url" class="fullName">Facility Icon Uploaded File
                                Preview</label>
                            <div class="input-group" style="height: 100px">
                                <a href="{{ $facility['facilityIconUrlPath'] }}" target="blank">
                                    <img src="{{ $facility['facilityIconUrlPath'] }}" alt="Icon"
                                        style="width: auto; height: 100px;">
                                </a>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="facility_icon_url_original" name="facility_icon_url_original"
                        class="form-control" value="{{$facility['facilityIconUrl']}}">
                    <div class="d-flex align-items-center justify-content-end">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection