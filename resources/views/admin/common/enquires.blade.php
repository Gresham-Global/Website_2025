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
                        <button id="downloadBtn" class="ml-2 btn bg-primary btn-width text-white">Dowload enquiry
                            data</button>
                        <span id="error-download" class="text-red font-weight-bold hide"></span>
                    </div>

                    <div class="item-alignment-right">
                    </div>
                </div>

                <!-- ==========Documents============= -->
                <div class="accountsetting-form-footer-container table-responsive">
                    <table class="table table-bordered mt-1 w-100" id="enquiries-table">
                        <thead style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Institute name</th>
                                <th>Course</th>
                                <th>City</th>
                                <th>Message</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                        </tbody>
                        <tfoot style="background-color: #f5ece6">
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Institute name</th>
                                <th>Course</th>
                                <th>City</th>
                                <th>Message</th>
                                <th>Created at</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- paginatoin box -->
                <!-- <div class="header-container m-0 padding-side">
              <p class="font-weight-bold m-0 text-secondary">
                Showing 1-10 of 1285 Colleges
              </p>
              <div class="pagination">
                <a class="pgn-btn previous" href="#">
                  <span class="material-symbols-outlined"> chevron_left </span>
                </a>
                <a class="active" href="#" onclick="changePage(1)">1</a>
                <a href="#" onclick="changePage(2)">2</a>
                <a href="#" onclick="changePage(3)">3</a>
                <a href="#">...</a>
                <a href="#" onclick="changePage(161)">161</a>
                <a class="pgn-btn next" href="#">
                  <span class="material-symbols-outlined"> chevron_right </span>
                </a>
              </div>
            </div> -->
            </div>
        </div>
    </div>
</section>
@endsection