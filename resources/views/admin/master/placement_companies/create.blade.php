@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <form name="add_placement_companies" id="add_placement_companies"
                    action="{{ url('admin/master/placement-companies/create') }}" method="post"
                    enctype="multipart/form-data">
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

                    <div class="form-flex-box p-0 mt-1">
                        <div class="form-group form-group-box w-48">
                            <label for="name" class="fullName">Placement Company Name</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="details" class="fullName">Placement Company Details</label>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" placeholder="Enter details" id="details"
                                    name="details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-1">
                        <div class="form-group form-group-box w-48">
                            <label class="fullName">Active Status</label>
                            <div class="input-group">
                                <div class="form-check m-3">
                                    <input class="form-check-input" type="radio" id="statusRadioYes" name="status"
                                        value="1">
                                    <label class="form-check-label" for="statusRadioYes"
                                        style="width: 80px; display: inline-block;">Yes</label>
                                    <input class="form-check-input" type="radio" id="statusRadioNo" name="status"
                                        value="2">
                                    <label class="form-check-label" for="statusRadioNo">No</label>
                                </div>
                                <label id="status-error" class="error" for="statusRadioYes"></label>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="logo" class="fullName">Placement Company Logo</label>
                            <div class="input-group">
                                <input type="file" id="logo" name="logo" class="form-control" accept=".jpeg,.png,.jpg"
                                    required>
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