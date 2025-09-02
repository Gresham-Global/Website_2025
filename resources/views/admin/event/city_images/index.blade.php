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
                        <a href="{{route('admin.event.city.images.create')}}" 
                            class="btn btn-block bg-primary btn-width text-white">Add Event City Wise Images </a>
                    </div>
                </div>

                <!-- ==========Documents============= -->
                <div class="accountsetting-form-footer-container table-responsive">
                    <table class="table table-bordered mt-1 w-100" id="event-city-image-table">
                        <thead style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Event Title </th>
                                <th>City Name</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                        </tbody>
                        <!-- <tfoot style="background-color: #f5ece6 d-none">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Title </th>
                                <th>City Name</th>
                               
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