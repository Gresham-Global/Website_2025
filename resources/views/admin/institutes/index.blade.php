@extends('admin.layout.app')
@section('content')
<section class="boardView-section">
    <div class="boardView-container">
        <div class="courses-institues-section">
            <div class="courses-institues-container">
                <!-- <div class="coursesInstitues-topContainer">
              <div class="coursesInstitues-topContainer-leftbox">
                <p class="m-0">Show</p>
                <select class="">
                  <option value="">10</option>
                </select>
                <p class="m-0">Entries</p>
              </div>

              <form class="form-inline">
                <span class="material-symbols-outlined searchicon">
                  search
                </span>
                <input
                  class="form-control input-box"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                  id="searchcollege"
                />
              </form>
            </div> -->
                <div class="coursesInstitues-topContainer">
                    <div class="coursesInstitues-topContainer-leftbox">
                    </div>

                    <div class="item-alignment-right">
                        <a href="{{route('admin.institutes.create')}}"
                            class="btn btn-block bg-primary btn-width text-white">Add Institutes</a>
                    </div>
                </div>

                <!-- ==========Documents============= -->
                <div class="accountsetting-form-footer-container  table-responsive">
                    <table class="table table-bordered mt-1 border w-100" id="institutes-table">
                        <thead style="background-color: #f5ece6">
                            <tr>
                                <th scope="col" class="text-center">Sr. Number</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Phone</th>
                                <th scope="col" class="text-center">Sequence</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                        </tbody>
                        <tfoot style="background-color: #f5ece6">
                            <tr>
                                <th scope="col" class="text-center">Sr. Number</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Phone</th>
                                <th scope="col" class="text-center">Sequence</th>
                                <th valign="center" width="10%" scope="col" class="text-center">Action</th>
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