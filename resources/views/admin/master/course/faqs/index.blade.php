@extends('admin.layout.app')
@section('content')
<section class="boardView-section">
    <div class="boardView-container">
        <div class="courses-institues-section">
            <div class="courses-institues-container">


                <!-- <div class="item-alignment-right">
                    <a href="{{ route('institute.faqs.create') }}"
                        class="btn btn-block bg-primary btn-width text-white">Add
                        faqs</a>
                </div> -->
                <div class="coursesInstitues-topContainer">
                    <div class="coursesInstitues-topContainer-leftbox">
                    </div>

                    <div class="item-alignment-right">
                        <a href="{{ url('admin/master/course/'.$courseId.'/faq/create') }}"
                            class="btn bg-primary btn-width text-white">Add Course FAQ's</a>
                    </div>
                </div>

                <!-- ==========Documents============= -->
                <div class="accountsetting-form-footer-container">
                    <table class="table table-bordered mt-1" id="course-faqs-table">
                        <thead style="background-color: #f5ece6">
                            <tr>
                                <th>No</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Content type</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection