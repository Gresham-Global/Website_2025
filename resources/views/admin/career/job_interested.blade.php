@extends('admin.layout.app')
@section('content')
<section class="boardView-section">
    <div class="boardView-container">
        <div class="courses-institues-section">
            <div class="courses-institues-container">
                <div class="coursesInstitues-topContainer">
                    <div class="coursesInstitues-topContainer-leftbox">
                        <?php
                                // Calculate current date
                                $currentDate = date('Y-m-d');

                                // Calculate default start date (7 days ago)
                                $defaultStartDate = date('Y-m-d', strtotime('-7 days'));
                            ?>
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" value="" max="<?= $currentDate; ?>">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" value="<?= $currentDate; ?>" max="<?= $currentDate; ?>">
                        <button id="downloadBtn" class="ml-2 btn bg-primary btn-width text-white">Dowload Job Entries
                            Data</button>
                        <span id="error-download" class="text-red font-weight-bold hide"></span>
                    </div>

                    <div class="item-alignment-right">
                    </div>
                </div>

                <!-- ==========Documents============= -->
                <div class="accountsetting-form-footer-container table-responsive">
                    <table class="table table-bordered mt-1 w-100" id="job-table">
                        <thead style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Full Name </th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Job Position Applied</th>
                                <th>Created At</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                        </tbody>
                        <tfoot style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. Number</th>
                                <th>Full Name </th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Job Position Applied</th>
                                <th>Created At</th>
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