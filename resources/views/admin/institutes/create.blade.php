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
                <form name="add-institute" id="add-institute" method="post"
                    action="{{route('admin.institutes.store')}}">
                    @csrf

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="name" class="fullName">Institute Name</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <label for="name_ban"  class="fullName">Institute Name / Ban</label>
                            <div class="input-group">
                                <input type="text" id="name" name="name_ban" class="form-control" value="{{ old('name_ban')}}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name_ban') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                        <label for="email"  class="fullName">Institute Email</label>
                        <div class="input-group">
                            <input type="text" id="email" name="email" class="form-control"
                            value="{{ old('email')}}" required>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group w-48 form-group-box">
                        <label for="phoneNumber"  class="fullName">Institute mobile number</label>
                        <div class="input-group">
                            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                value="{{ old('phoneNumber')}}" required>
                                @if ($errors->has('phoneNumber'))
                                <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                                @endif
                        </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="website"  class="fullName">Websiter URL</label>
                            <div class="input-group">
                                <input type="text" id="website" name="website" class="form-control"
                                    value="{{ old('website')}}" required>
                                @if ($errors->has('website'))
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <label  class="fullName">Establish Date</label>
                            <div class="input-group">
                                <input type="date" id="establish_date" name="establish_date" class="form-control"
                                    value="{{ old('establish_date') }}" max="{{ date('Y-m-d') }}" required>
                                @if ($errors->has('establish_date'))
                                <span class="text-danger">{{ $errors->first('establish_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Institute Type</label>
                            <div class="input-group">
                                <div class="form-check m-3">
                                    <input class="form-check-input" type="radio" id="privateRadio" name="institute_type"
                                            value="private" {{(old('institute_type')=='private')?'checked':'' }}>
                                    <label class="form-check-label" for="privateRadio"
                                            style="width: 80px;display: inline-block;">Private</label>
                                    <input class="form-check-input" type="radio" id="publicRadio" name="institute_type"
                                            value="public" {{(old('institute_type')=='public')?'checked':'' }}>
                                    <label class="form-check-label" for="publicRadio">Public</label>
                                </div>
                                </div>
                            <label id="institute_type-error" name="institute_type-error" class="error"
                                    for="institute_type"></label>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Coed Status</label>
                            <div class="input-group">
                                <div class="form-check m-3">
                                    <input class="form-check-input" type="radio" id="coedRadio" name="coed_status"
                                        value="girls" {{(old('coed_status')=='girls')?'checked':'' }}>
                                    <label class="form-check-label" for="coedRadio"
                                        style="width: 80px;display: inline-block;">Girls</label>
                                    <input class="form-check-input" type="radio" id="coedRadio1" name="coed_status"
                                        value="boys" {{(old('coed_status')=='boys')?'checked':'' }}>
                                    <label class="form-check-label" for="coedRadio1"
                                        style="width: 80px;display: inline-block;">Boys</label>
                                    <input class="form-check-input" type="radio" id="coedRadio2" name="coed_status"
                                        value="coed" {{(old('coed_status')=='coed')?'checked':'' }}>
                                    <label class="form-check-label" for="coedRadio2">Coed</label>
                                </div>
                                </div>
                                <label id="coed_status-error" class="error" for="coed_status" name="coed-status-error"></label>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 m-0">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Pre Interview</label>
                            <div class="input-group">
                                <div class="form-check m-3">
                                    <input class="form-check-input" type="radio" id="preRadio" name="pre_interview"
                                        value="Yes" {{(old('pre_interview')=='Yes')?'checked':'' }}>
                                    <label class="form-check-label" for="preRadio"
                                        style="width: 80px;display: inline-block;">Yes</label>
                                    <input class="form-check-input" type="radio" id="preRadio1" name="pre_interview"
                                        value="No" {{(old('pre_interview')=='No')?'checked':'' }}>
                                    <label class="form-check-label" for="preRadio1">No</label>
                                </div>
                            </div>
                            <label id="pre_interview-error" class="error" for="pre_interview"></label>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Is university?</label>
                            <div class="input-group">
                                <div class="form-check m-3">
                                    <input class="form-check-input" type="radio" id="universityRadio"
                                        name="is_university" value="1" {{(old('is_university')=='1')?'checked':'' }}
                                        onchange="toggleUniversityDiv(1)">
                                    <label class="form-check-label" for="universityRadio"
                                        style="width: 80px;display: inline-block;">Yes</label>
                                    <input class="form-check-input" type="radio" id="universityRadio1"
                                        name="is_university" value="2"
                                        {{(old('is_university')=='2' || !old('is_university'))?'checked':'' }}
                                        onchange="toggleUniversityDiv(0)">
                                    <label class="form-check-label" for="universityRadio1">No</label>
                                </div>
                            </div>
                            <label id="is_university-error" class="error" for="is_university"></label>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 m-0">
                        <div class="form-group w-48 form-group-box">
                            <label for="university_id" class="fullName">Select University</label>
                            <div class="input-group">
                                <select class="form-control" name="university_id" id="university_id" style="height:50px">
                                    <option value="0">Select University</option>
                                    @foreach($universityData as $university)
                                    <option value="{{ $university['id'] }}">{{ $university['name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <label for="sequence" class="fullName">Institute sequence</label>
                            <div class="input-group">
                                <input type="number" id="sequence" name="sequence" class="form-control"
                                    value="{{ old('sequence')??0}}" min="0" max="10">
                                @if ($errors->has('sequence'))
                                <span class="text-danger">{{ $errors->first('sequence') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="meta_title" class="fullName">Meta Title</label>
                            <div class="input-group">
                                <input type="text" id="meta_title" name="meta_title" class="form-control"
                                    value="{{ old('meta_title')}}">
                                @if ($errors->has('meta_title'))
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <label for="meta_description" class="fullName">Meta Description</label>
                            <div class="input-group">
                                <input type="text" id="meta_description" name="meta_description" class="form-control"
                                    value="{{ old('meta_description')}}">
                                @if ($errors->has('meta_description'))
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box">
                            <label for="meta_keyword" class="fullName">Meta Keyword</label>
                            <div class="input-group">
                                <input type="text" id="meta_keyword" name="meta_keyword" class="form-control"
                                    value="{{ old('meta_keyword')}}">
                                @if ($errors->has('meta_keyword'))
                                <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group w-48 form-group-box">
                            <label for="schema_description" class="fullName">Schema Description</label>
                            <div class="input-group">
                                <input type="text" id="schema_description" name="schema_description"
                                    class="form-control" value="{{ old('schema_description')}}">
                                @if ($errors->has('schema_description'))
                                <span class="text-danger">{{ $errors->first('schema_description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection