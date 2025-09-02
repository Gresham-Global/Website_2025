@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <form name="add_discipline" action="{{ url('admin/master/discipline/create') }}" method="post"
                    id="add_discipline" enctype="multipart/form-data">
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
                            <label for="description" class="fullName">Description / EN</label>
                            <div class="input-group">
                                <textarea id="description" name="description" class="form-control" rows="2"
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-group-box w-48">
                            <label for="description_bn" class="fullName">Description / BN</label>
                            <div class="input-group">
                                <textarea id="description_bn" name="description_bn" class="form-control" rows="2"
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group form-group-box w-48">
                            <label for="discipline_icon_url" class="fullName">Discipline Icon</label>
                            <div class="input-group">
                                <input type="file" id="discipline_icon_url" name="discipline_icon_url"
                                    class="form-control" accept=".svg,.webp" required>
                            </div>
                        </div>

                        <div class="form-group form-group-box w-48">
                            <label for="schema_description" class="fullName">Schema Description</label>
                            <div class="input-group">
                                <input type="text" id="schema_description" name="schema_description"
                                    class="form-control" value="{{ old('schema_description') }}">
                            </div>
                            @if ($errors->has('schema_description'))
                            <span class="text-danger">{{ $errors->first('schema_description') }}</span>
                            @endif
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