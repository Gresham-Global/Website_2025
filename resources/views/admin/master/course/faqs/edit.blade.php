@extends('admin.layout.app')
@section('content')
<!-- Main Content Section -->
<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                <div class="coursesInstitues-topContainer">
                    <div class="coursesInstitues-topContainer-leftbox">
                    </div>

                    <div class="item-alignment-right">
                        <a href="{{ url('admin/master/course/'.$courseId.'/faq/') }}"
                            class="btn bg-primary btn-width text-white">View Course FAQ's</a>
                    </div>
                </div>
                <form name="add_faqs" action="{{ url('admin/master/course/'.$courseId. '/faq/' . $courseFaqs['id'] . '/edit') }}" method="post"
                    id="add_faqs" enctype="multipart/form-data">
                    @csrf

                    @if (session('status'))
                    <div class="col-12 alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('error_message_catch'))
                    <div class="col-12 alert alert-danger">
                        {{ session('error_message_catch') }}
                    </div>
                    @endif
                    <br>



                    <div class="form-flex-box p-0 mt-4">
                        <div class="form-group form-group-box">
                            <label for="question" class="fullName">Question <span
                                    class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="question" name="question"
                                    value="{{ $courseFaqs['question'] }}" />
                            </div>
                            <label id="question-error" class="error" for="question"></label>
                        </div>
                        <div class="form-group form-group-box">
                            <label for="question_ban" class="fullName">Question Ban<span
                                    class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="question_ban" name="question_ban"
                                    value="{{ $courseFaqs['questionBan'] }}" />
                            </div>
                            <label id="question_ban-error" class="error" for="question_ban"></label>
                        </div>
                    </div>
                    <div class="form-flex-box p-0 mt-4">
                        <div class="form-group form-group-box">
                            <label for="fullName" class="fullName">Answer<span class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="answer" name="answer"
                                    value="{{ $courseFaqs['answer'] }}" />
                            </div>
                            <label id="answer-error" class="error" for="answer"></label>
                        </div>
                        <div class="form-group form-group-box">
                            <label for="answer_ban" class="fullName">Answer Ban<span class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="answer_ban" name="answer_ban"
                                    value="{{ $courseFaqs['answerBan'] }}" />
                            </div>
                            <label id="answer_ban-error" class="error" for="answer_ban"></label>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-4">
                        <div class="form-group form-group-box">
                            <label for="qualifications" class="fullName">Content type <span
                                    class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="content_type" name="content_type"
                                    value="{{ $courseFaqs['contentType'] }}" />
                            </div>
                            <label id="content_type-error" class="error" for="content_type"></label>
                        </div>
                        <div class="form-group form-group-box">
                            <label for="content_type_ban" class="fullName">Content type Ban<span
                                    class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="content_type_ban" name="content_type_ban"
                                    value="{{ $courseFaqs['contentTypeBan'] }}" />
                            </div>
                            <label id="content_type_ban-error" class="error" for="content_type_ban"></label>
                        </div>
                    </div>



                    <div class="devider mt-3" style="border-color: #bfb5b5"></div>

                    <div class="d-flex align-items-center justify-content-end mt-4 mb-2">
                        <button class="view-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection