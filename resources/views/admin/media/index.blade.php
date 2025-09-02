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
                        <a href="{{route('admin.media.create')}}"
                            class="btn btn-block bg-primary btn-width text-white">Add Media</a>
                    </div>
                </div>

                <!-- ==========Documents============= -->
                <div class="accountsetting-form-footer-container table-responsive">
                    <table class="table table-bordered mt-1 w-100" id="media-table">
                        <thead style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Title </th>
                                <th>Short Description</th>
                                <th>Media Link</th>
                                <th>Thumbnail Image</th>
                                <th>Media Image</th>
                                <th>Publish Date</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                        </tbody>
                        <tfoot style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Title </th>
                                <th>Short Description</th>
                                <th>Media Link</th>
                                <th>Thumbnail Image</th>
                                <th>Media Image</th>
                                <th>Publish Date</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection