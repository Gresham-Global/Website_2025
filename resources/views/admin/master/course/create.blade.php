@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <form name="add_course" id="add_course" action="{{ url('admin/master/course/create') }}" method="post"
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
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="name" class="fullName">Name / EN</label>
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
                            <label for="short_name" class="fullName">Short Name / EN</label>
                            <div class="input-group">
                                <input type="text" id="short_name" name="short_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="short_name_bn" class="fullName">Short Name / BN</label>
                            <div class="input-group">
                                <input type="text" id="short_name_bn" name="short_name_bn" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="discipline_id" class="fullName">Discipline</label>
                            <div class="input-group">
                                <select class="form-control" name="discipline_id" id="discipline_id"
                                    style="height:50px">
                                    <option value="">Select Discipline</option>
                                    @foreach($disciplineData as $discipline)
                                    <option value="{{ $discipline['id'] }}">{{ $discipline['disciplineName'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="specialization_master_id" class="fullName">Specialization</label>
                            <div class="input-group">
                                <select class="form-control" name="specialization_master_id[]"
                                    id="specialization_master_id" multiple style="height:50px">
                                    @foreach($specializationMasterData as $specializationMaster)
                                    <option value="{{ $specializationMaster['id'] }}">
                                        {{ $specializationMaster['specializationMasterName'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="program_level" class="fullName">Program Level</label>
                            <div class="input-group">
                                <select class="form-control" name="program_level" id="program_level"
                                    style="height:50px">
                                    <option value="">Select Program Level</option>
                                    <option value="1">Ph.D</option>
                                    <option value="2">Post Graduate</option>
                                    <option value="3">Under Graduate</option>
                                    <option value="4">Diploma</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="eligibility" class="fullName">Eligibility / EN</label>
                            <div class="input-group">
                                <input type="text" id="eligibility" name="eligibility" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48">
                            <label for="eligibility_bn" class="fullName">Eligibility / BN</label>
                            <div class="input-group">
                                <input type="text" id="eligibility_bn" name="eligibility_bn" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="subject" class="fullName">Subject / EN</label>
                            <div class="input-group">
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48">
                            <label for="subject_bn" class="fullName">Subject / BN</label>
                            <div class="input-group">
                                <input type="text" id="subject_bn" name="subject_bn" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0">
                        <div class="form-group form-group-box w-48">
                            <label for="description" class="fullName">Description / EN</label>
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
                    <div class="form-flex-box p-0 m-0">
                        <div class="form-group w-48 form-group-box">
                            <label class="fullName">Show in the menu</label>
                            <div class="input-group">
                                <div class="form-check m-3">
                                    <input class="form-check-input" type="radio" id="show_in_menu" name="show_in_menu"
                                        value="1" {{(old('show_in_menu')=='1')?'checked':'' }}>
                                    <label class="form-check-label" for="show_in_menu"
                                        style="width: 80px;display: inline-block;">Yes</label>
                                    <input class="form-check-input" type="radio" id="show_in_menu1" name="show_in_menu"
                                        value="0"
                                        {{(old('show_in_menu')=='0')?'checked':((old('show_in_menu')=='1')?'':'checked') }}>
                                    <label class="form-check-label" for="show_in_menu1">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48">
                            <label for="banner_image" class="fullName">Banner image</label>
                            <div class="input-group">
                                <input type="file" id="banner_image" name="banner_image" class="form-control"
                                    accept=".jpeg,.png,.jpg,.webp">
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48">
                            <label for="mb_banner_image" class="fullName">Mobile Banner image</label>
                            <div class="input-group">
                                <input type="file" id="mb_banner_image" name="mb_banner_image" class="form-control"
                                    accept=".jpeg,.png,.jpg,.webp">
                            </div>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 m-0">
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