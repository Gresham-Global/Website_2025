@extends('admin.layout.app')
@section('content')
<section class="boardView-section">
    <div class="boardView-container">
        <div class="courses-institues-section">
            <div class="courses-institues-container">
                <div class="coursesInstitues-topContainer">
                    <div class="coursesInstitues-topContainer-leftbox">
                    </div>

                    <div class="item-alignment-right">
                        <a href="{{route('admin.publication.create')}}" 
                            class="btn btn-block bg-primary btn-width text-white">Add Publications</a>
                    </div>
                </div>

                <!-- ==========Documents============= -->
                <div class="accountsetting-form-footer-container table-responsive">
                    <table class="table table-bordered mt-1 w-100" id="publication-table">
                        <thead style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Title </th>
                                <th>Short Description</th>
                                <!-- <th>Description</th> -->
                                <th>Tags</th>
                                <th>Social link</th>
                                <th>Thumbnail Image</th>
                                <th>Banner Image</th>
                                <th>Vertical Image</th>
                                <th>Report PDF</th>
                                <th>status</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                        </tbody>
                        <!-- <tfoot style="background-color: #f5ece6 d-none">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Title </th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Tags </th>
                                <th>social link</th>
                                <th>Thumbnail Image</th>
                               <th>status</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection