@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <form name="add_facility" id="add_facility" action="{{ url('admin/master/facility/create') }}"
                    method="post" enctype="multipart/form-data">
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

                    <div class="form-flex-box p-0">
                        <div class="form-group form-group-box w-48">
                            <label for="name" class="fullName">Name</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="name_ban" class="fullName">Name / Ban</label>
                            <div class="input-group">
                                <input type="text" id="name_ban" name="name_ban" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="description" class="fullName">Description</label>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" placeholder="Enter Description" id="description"
                                    name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="description_ban" class="fullName">Description / Ban</label>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" placeholder="Enter Description"
                                    id="description_ban" name="description_ban"></textarea>
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
                                        <option value="{{ $facilityCategory['id'] }}">
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
                                    accept=".jpeg,.png,.jpg" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end mt-2">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection