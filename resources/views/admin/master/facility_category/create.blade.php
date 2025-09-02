@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <form name="add_facility_category" id="add_facility_category"
                    action="{{ url('admin/master/facility-category/create') }}" method="post">
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
                            <label for="name_bn" class="fullName">Name / BN</label>
                            <div class="input-group">
                                <input type="text" id="name_bn" name="name_bn" class="form-control" required>
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
                            <label for="description_bn" class="fullName">Description / BN</label>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" placeholder="Enter Description"
                                    id="description_bn" name="description_bn"></textarea>
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