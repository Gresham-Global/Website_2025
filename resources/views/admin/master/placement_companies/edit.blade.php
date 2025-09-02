@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <form name="edit_placement_companies"
                    action="{{ url('admin/master/placement-companies/' . $placement_companies['placementCompaniesId'] . '/edit') }}"
                    method="post" id="edit_placement_companies" enctype="multipart/form-data">
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
                            <label for="name" class="fullName">Placement Company Name</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{$placement_companies['placementCompaniesName']}}" required>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="details" class="fullName">Placement Company Details</label>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" placeholder="Enter details" id="details"
                                    name="details">{{$placement_companies['placementCompaniesDetail']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label class="fullName">Active Status</label>
                            <div class="input-group">
                                <div class="form-check m-3">
                                    <input class="form-check-input" type="radio" id="statusRadio" name="status"
                                        value="1" {{ $placement_companies['placementCompaniesStatus'] == 1 ? "checked" : "" }}>
                                    <label class="form-check-label" for="statusRadio"
                                        style="width: 80px; display: inline-block;">Yes</label>
                                    <input class="form-check-input" type="radio" id="statusRadio1" name="status"
                                        value="2" {{ $placement_companies['placementCompaniesStatus'] == 2 ? "checked" : "" }}>
                                    <label class="form-check-label" for="statusRadio1">No</label>
                                </div>
                                <label id="status-error" class="error" for="statusRadio"></label>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="logo" class="fullName">Placement Company Logo</label>
                            <div class="input-group">
                                <input type="file" id="logo" name="logo" class="form-control" accept=".jpeg,.png,.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="logo" class="fullName">Placement Company Logo Uploaded File Preview</label><br>
                            <div class="input-group" style="height: 100px">
                                <a href="{{$placement_companies['placementCompaniesLogoPath']}}" target="_blank">
                                    <img src="{{$placement_companies['placementCompaniesLogoPath']}}" alt="Logo"
                                        style="width: auto; height: 100px;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="logo_original" name="logo_original" class="form-control"
                        value="{{$placement_companies['placementCompaniesLogo']}}">
                    <div class="d-flex align-items-center justify-content-end mt-2">
                        <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection