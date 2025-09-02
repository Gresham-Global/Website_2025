@extends('admin.layout.app')
@section('content')
<!-- dashboard======== -->
<section class="boardView-section">
    <div class="boardView-container">
        <div class="dashboard-section">
            <div class="admissionTimeline-container">
                <div class="admitionTimeline-box">
                   <!--  <p class="admitionTimeline-title">
                        Admission Timeline & Key Dates
                    </p> -->
                    <p class="admitionTimeline-para">{{ date('d M l') }}</p>
                    <a href="" class="arrow-round-button">
                        <span class="material-symbols-outlined btn-arw-icon">
                            east
                        </span>
                    </a>
                </div>
            </div>

            <div class="dashboard-mid-container">
               <!--  <div class="left-container-dashboard">
                    <div class="dashboard-itemContainer">
                        <img src="{{ asset('panel/icons/searicon.svg') }}" alt="" class="itemContainer-icon" />
                        <h3 class="itemContainer-h3">
                            {{ isset($instituteData['enquiry']) && $instituteData['enquiry'] ? $instituteData['enquiry'] : "0" }}
                        </h3>
                        <p class="itemContainer-p">Enquiries</p>
                        <a href="" class="arrow-round-button">
                            <span class="material-symbols-outlined btn-arw-icon">
                                east
                            </span>
                        </a>
                    </div>
                    {{-- <div class="dashboard-itemContainer">
                        <img src="{{ asset('panel/icons/searicon.svg') }}" alt="" class="itemContainer-icon" />
                        <h3 class="itemContainer-h3">50</h3>
                        <p class="itemContainer-p">Applications</p>
                        <a href="" class="arrow-round-button">
                            <span class="material-symbols-outlined btn-arw-icon">
                                east
                            </span>
                        </a>
                    </div> --}}
                    <div class="dashboard-itemContainer">
                        <img src="{{ asset('panel/icons/searicon.svg') }}" alt="" class="itemContainer-icon" />
                        <h3 class="itemContainer-h3">
                            {{ isset($instituteData['course']) && $instituteData['course'] ? $instituteData['course'] : "0" }}
                        </h3>
                        <p class="itemContainer-p">Courses</p>
                        <a href="{{-- route('institute.course') --}}" class="arrow-round-button">
                            <span class="material-symbols-outlined btn-arw-icon">
                                east
                            </span>
                        </a>
                    </div>
                    <div class="dashboard-itemContainer">
                        <img src="{{ asset('panel/icons/searicon.svg') }}" alt="" class="itemContainer-icon" />
                        <h3 class="itemContainer-h3">
                            {{ isset($instituteData['placementComapnies']) && $instituteData['placementComapnies'] ? $instituteData['placementComapnies'] : "0" }}
                        </h3>
                        <p class="itemContainer-p">Placement Partners</p>
                        <a href="{{-- route('institute.placement-companies') --}}" class="arrow-round-button">
                            <span class="material-symbols-outlined btn-arw-icon">
                                east
                            </span>
                        </a>
                    </div>
                </div> -->
                <!-- <div class="right-container-dashboard">
                    <h3 class="studentEnrollmentTitle">Annual Student Enrollment</h3>
                    <div class="devider"></div>

                    <div class="chartbox-container">
                        <canvas id="myChart" class="myChart"></canvas>
                    </div>
                </div> -->
            </div>

            {{-- <div class="dashboard-footer-container">
                <div class="footerContainer-itembox">
                    <h3 class="itemContainer-h3">150</h3>
                    <p class="itemContainer-p">Research Paper Produced</p>
                    <a href="" class="arrow-round-button">
                        <span class="material-symbols-outlined btn-arw-icon">
                            east
                        </span>
                    </a>
                </div>

                <div class="footerContainer-itembox">
                    <h3 class="itemContainer-h3">500</h3>
                    <p class="itemContainer-p">This Year's International Admissions</p>
                    <a href="" class="arrow-round-button">
                        <span class="material-symbols-outlined btn-arw-icon">
                            east
                        </span>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection

<!-- ChartJs -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById("myChart");
  
      new Chart(ctx, {
        type: "bar",
        data: {
          labels: [
            "2017",
            "2018",
            "2019",
            "2020",
            "2021",
            "2022",
            "2023",
            "2024",
          ],
          datasets: [
            {
              label: "Students",
              data: [500, 1000, 2000, 3000, 4000, 5000, 6050, 6500],
              backgroundColor: "rgba(27, 172, 153, 1)",
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    </script> -->