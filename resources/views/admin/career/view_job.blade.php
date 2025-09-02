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
                <!-- <form name="edit_career" 
                    id="view_job" enctype="multipart/form-data">
                    @csrf


                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="title" class="fullName">Full Name</label>
                            <div class="input-group">
                            <input type="text" name="fullname" id="fullname" value="{{$jobData['fullname']}}" class="form-control" placeholder="Full Name*" required />

                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="short_description" class="fullName">Email</label>
                            <div class="input-group">
                            <input type="email" name="email" id="email" value="{{$jobData['email']}}" class="form-control" placeholder="Email*" required />

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 ">
                        <div class="form-group">
                            <label for="description" class="description">Phone No</label>
                            <div class="input-group">
                            <input type="tel" name="phone_no"  id="phone_no" value="{{$jobData['phone_no']}}" class="form-control" placeholder="Phone Number*" required />

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">

                        <div class="form-group">
                            <label for="logo_image" class="education-experience">Interest Description</label>
                            <div class="input-group">
                            <textarea class="form-control" name="interest_description"  id="interest_description" rows="4" placeholder="Why are you interested working at InnAccel?*"
                  required>{{$jobData['interest_description']}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logo_image" class="education-experience">Role Description</label>
                            <div class="input-group">
                            <textarea class="form-control" name="role_description"  id="role_description" rows="4" placeholder="What makes you a good fit for this role?*"
                            required>{{$jobData['role_description']}}</textarea>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-12 col-sm-12 ">
                                    <div class="form-group">
                                        <label for="status">Resume</label>
                                        <a href="{{ asset('resume/' . basename($jobData['resume'])) }}" target="_blank">
                                            View Resume
                                        </a>
                                    </div>
                                  
                                    
                    </div>

                </form> -->

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 25%;">Full Name</th>
                            <td>{{ $jobData['fullname'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $jobData['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Phone No</th>
                            <td>{{ $jobData['phone_no'] }}</td>
                        </tr>
                        <tr>
                            <th>Job Position Applied</th>
                            <td>{{ $jobData['career_title'] }}</td>
                        </tr>
                        <tr>
                            <th>Interest Description</th>
                            <td>{{ $jobData['interest_description'] }}</td>
                        </tr>
                        <tr>
                            <th>Role Description</th>
                            <td>{{ $jobData['role_description'] }}</td>
                        </tr>
                        <tr>
                            <th>Resume</th>
                            <td>
                                <a href="{{ asset('resume/' . basename($jobData['resume'])) }}" target="_blank">
                                    View Resume
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
@endsection