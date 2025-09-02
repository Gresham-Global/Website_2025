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
                <form name="add-institute" action="{{ url('admin/institutes/edit/'.$institute['id']) }}" method="post"
                    id="add-institute">

                    @csrf

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="name" class="fullName">Institute Name</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name')?old('name'):$institute['name']}}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="name" class="fullName">Institute Name / Ban</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name_ban" class="form-control"
                                    value="{{ old('name_ban')?old('name_ban'):$institute['name_ban']}}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="email" class="fullName">Institute Email</label>
                            <div class="input-group">
                                <input type="text" id="email" name="email" class="form-control" value="{{ $institute['user']['email']}}" disabled>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('phoneNumber') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="phoneNumber" class="fullName">Institute Mobile Number</label>
                            <div class="input-group">
                                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" 
                                    value="{{ old('phoneNumber') ? old('phoneNumber') : $institute['user']['phone'] }}" required>
                                @if ($errors->has('phoneNumber'))
                                <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="website" class="fullName">Website URL</label>
                            <div class="input-group">
                                <input type="text" id="website" name="website" class="form-control" 
                                    value="{{ old('website') ? old('website') : $institute['website'] }}" required>
                                @if ($errors->has('website'))
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('establish_date') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="establish_date" class="fullName">Establish Date</label>
                            <div class="input-group">
                                <input type="date" id="establish_date" name="establish_date" class="form-control" 
                                    value="{{ old('establish_date') ? old('establish_date') : $institute['establish_date'] }}" 
                                    max="{{ date('Y-m-d') }}" required>
                                @if ($errors->has('establish_date'))
                                <span class="text-danger">{{ $errors->first('establish_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('institute_type') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="institute_type" class="fullName">Institute Type</label>
                            <div class="input-group">
                                <div class="form-check form-check-inline m-3">
                                    <input class="form-check-input" type="radio" id="privateRadio" name="institute_type" value="private"
                                        {{ ((old('institute_type') == 'private') || ($institute['institute_type'] == 'private')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="privateRadio">Private</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="publicRadio" name="institute_type" value="public"
                                        {{ ((old('institute_type') == 'public') || ($institute['institute_type'] == 'public')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="publicRadio">Public</label>
                                </div>
                            </div>
                            @if ($errors->has('institute_type'))
                            <span class="text-danger">{{ $errors->first('institute_type') }}</span>
                            @endif
                            <label id="institute_type-error" class="error" for="institute_type"></label>
                        </div>

                        <div class="form-group {{ $errors->has('coed_status') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="coed_status" class="fullName">Coed Status</label>
                            <div class="input-group">
                                <div class="form-check form-check-inline m-3">
                                    <input class="form-check-input" type="radio" id="girlsRadio" name="coed_status" value="girls"
                                        {{ ((old('coed_status') == 'girls') || ($institute['coed_status'] == 'girls')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="girlsRadio">Girls</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="boysRadio" name="coed_status" value="boys"
                                        {{ ((old('coed_status') == 'boys') || ($institute['coed_status'] == 'boys')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="boysRadio">Boys</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="coedRadio" name="coed_status" value="coed"
                                        {{ ((old('coed_status') == 'coed') || ($institute['coed_status'] == 'coed')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="coedRadio">Coed</label>
                                </div>
                            </div>
                            @if ($errors->has('coed_status'))
                            <span class="text-danger">{{ $errors->first('coed_status') }}</span>
                            @endif
                            <label id="coed_status-error" class="error" for="coed_status"></label>
                        </div>

                    </div>

                    <div class="form-flex-box p-0 m-0">
                        <div class="form-group {{ $errors->has('pre_interview') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="pre_interview" class="fullName">Pre Interview</label>
                            <div class="input-group">
                                <div class="form-check form-check-inline m-3">
                                    <input class="form-check-input" type="radio" id="preRadioYes" name="pre_interview" value="Yes"
                                        {{ ((old('pre_interview') == 'Yes') || ($institute['pre_interview'] == 'Yes')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="preRadioYes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="preRadioNo" name="pre_interview" value="No"
                                        {{ ((old('pre_interview') == 'No') || ($institute['pre_interview'] == 'No')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="preRadioNo">No</label>
                                </div>
                            </div>
                            @if ($errors->has('pre_interview'))
                            <span class="text-danger">{{ $errors->first('pre_interview') }}</span>
                            @endif
                            <label id="pre_interview-error" class="error" for="pre_interview"></label>
                        </div>

                        <div class="form-group {{ $errors->has('is_university') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="is_university" class="fullName">Is University?</label>
                            <div class="input-group">
                                <div class="form-check form-check-inline m-3">
                                    <input class="form-check-input" type="radio" id="universityRadioYes" name="is_university" value="1"
                                        {{ ((old('is_university') == '1') || ($institute['is_university'] == '1')) ? 'checked' : '' }}
                                        onchange="toggleUniversityDiv(1)">
                                    <label class="form-check-label" for="universityRadioYes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="universityRadioNo" name="is_university" value="2"
                                        {{ ((old('is_university') == '2') || ($institute['is_university'] == '2')) ? 'checked' : '' }}
                                        onchange="toggleUniversityDiv(0)">
                                    <label class="form-check-label" for="universityRadioNo">No</label>
                                </div>
                            </div>
                            @if ($errors->has('is_university'))
                            <span class="text-danger">{{ $errors->first('is_university') }}</span>
                            @endif
                            <label id="is_university-error" class="error" for="is_university"></label>
                        </div>

                    </div>

                    <div class="form-flex-box p-0 m-0">
                        <div class="form-group {{ $errors->has('university_id') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="university_id" class="fullName">Select University</label>
                            <div class="input-group">
                                <select class="form-control" name="university_id" id="university_id" style="height:50px">
                                        <option value="0" {{ (old('university_id') == '0' || $institute['parent_university'] == '0') ? 'selected' : '' }}>
                                            Select University
                                        </option>
                                        @foreach($universityData as $university)
                                            @if($university['id'] != $institute['id'])
                                                <option value="{{ $university['id'] }}" {{ (old('university_id') == $university['id'] || $institute['parent_university'] == $university['id']) ? 'selected' : '' }}>
                                                    {{ $university['name'] }}
                                                </option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            @if ($errors->has('university_id'))
                                <span class="text-danger">{{ $errors->first('university_id') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('sequence') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="sequence" class="fullName">Institute Sequence</label>
                            <div class="input-group">
                            <input type="number" id="sequence" name="sequence" class="form-control"
                                value="{{ old('sequence') ? old('sequence') : $institute['sequence'] }}" min="0" max="10">
                            @if ($errors->has('sequence'))
                                <span class="text-danger">{{ $errors->first('sequence') }}</span>
                            @endif
                            </div>
                            <!-- <label id="sequence-error" class="error" for="sequence"></label> -->
                            <input type="hidden" name="original_sequence" id="original_sequence" value="{{ ($institute['sequence'])??0}}">
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="meta_title" class="fullName">Meta Title</label>
                            <div class="input-group">
                            <input type="text" id="meta_title" name="meta_title" class="form-control"
                                value="{{ old('meta_title') ? old('meta_title') : $institute['meta_title'] }}">
                            @if ($errors->has('meta_title'))
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                            @endif
                            </div>
                            <label id="meta_title-error" class="error" for="meta_title"></label>
                        </div>

                        <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="meta_description" class="fullName">Meta Description</label>
                            <div class="input-group">
                            <input type="text" id="meta_description" name="meta_description" class="form-control"
                                value="{{ old('meta_description') ? old('meta_description') : $institute['meta_description'] }}">
                            @if ($errors->has('meta_description'))
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                            @endif
                            </div>
                            <label id="meta_description-error" class="error" for="meta_description"></label>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-0">
                        <div class="form-group {{ $errors->has('meta_keyword') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="meta_keyword" class="fullName">Meta Keyword</label>
                            <div class="input-group">
                                <input type="text" id="meta_keyword" name="meta_keyword" class="form-control"
                                    value="{{ old('meta_keyword') ? old('meta_keyword') : $institute['meta_keyword'] }}">
                                @if ($errors->has('meta_keyword'))
                                    <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                                @endif
                            </div>
                            <label id="meta_keyword-error" class="error" for="meta_keyword"></label>
                        </div>

                        <div class="form-group {{ $errors->has('schema_description') ? 'has-error' : '' }} w-48 form-group-box">
                            <label for="schema_description" class="fullName">Schema Description</label>
                            <div class="input-group">
                                <input type="text" id="schema_description" name="schema_description" class="form-control"
                                    value="{{ old('schema_description') ? old('schema_description') : $institute['schema_description'] }}">
                                @if ($errors->has('schema_description'))
                                    <span class="text-danger">{{ $errors->first('schema_description') }}</span>
                                @endif
                            </div>
                            <label id="schema_description-error" class="error" for="schema_description"></label>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end mt-0">
                        <button class="view-btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection