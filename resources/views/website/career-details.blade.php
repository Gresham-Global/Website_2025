@extends('website.layout.master')
@section('content')



<!-- 1st Section -->
@php
$image_path = $career['cover_image']??'website/assets/images/career/career_currentopening.webp';
@endphp
<div class="career-current-opening-internal">
  <img src="{{ asset($image_path) }}" alt="">
  <div class="customContainer justify-content-center">
    <div class="textWrapper">
      <h1 class="jobtitle">{{$career['title']}}</h1>

    </div>
  </div>
</div>


<!-- Job Description Section -->
<section class="customSection mb-5">
  <div class="customContainer mediaCon">
    <div class="row">
      <!-- Job Description Column -->
      <div id="career-description" class="col-lg-7 job-description-section">
        {!!$career['description']!!}
        <!-- <h2 class="section-title">About this Role</h2>
         <p class="description-text">
          The Electronics Design Engineer will assist in the design and engineering solutions for medical device
          products.
          (S)he, under the mentorship of a lead/principal engineer, will deliver relevant solutions to new and existing
          products through design iterations, risk retirement using first principles engineering, technical analysis and
          verification of the design. The Design Engineer will learn and utilize InnAccel's stage gate Product
          Development
          System and use relevant engineering tools to deliver a high-quality, robust, and cost-effective design and
          will
          partner cross-functionally to execute all aspects of product development. They will also ensure successful
          design transfer into manufacturing.
        </p>

        <h3 class="section-subtitle">Qualification</h3>
        <div class="bebtech-electronicseeeeni-parent">
          <div class="bebtech-electronicseeeeni">BE/B.Tech Electronics/EEE/ENI</div>
        </div>

        <h3 class="section-subtitle">Skills and requirements (desired):</h3>
        <ul class="skills-list">
          <li>Understand firmware design, flow charts, unit test protocols</li>
          <li>Familiarity with different IDEs like VSCode, Keil, etc.</li>
          <li>Experience with writing code in C for microcontrollers like STM32, nRF, Espressif, etc.</li>
          <li>Good understanding of communication protocols like USB, I2C, SPI, etc.</li>
          <li>Experience in medical device development or in a regulated industry</li>
          <li>Should be a fast learner</li>
        </ul>

        <h3 class="section-subtitle">Education & Experience:</h3>
        <ul class="education-list">
          <li>Bachelors in Electronics/Computer Science/ BioMedical/Medical Electronics Engineering or equivalent</li>
          <li>2-3 years of experience in Medical device sector or other regulated electronics sector</li>
        </ul>

        <h3 class="section-subtitle">Compensation:</h3>
        <p class="compensation-text">As per industry standards</p> -->

        <!-- <h3 class="section-subtitle">About Gresham Global:</h3>
        <p class="description-text">
        With a focus on international education, we empower international universities to thrive and expand in the rapidly evolving Indian and South Asian markets. Our comprehensive suite of services is designed to elevate your institution’s presence, attract top-tier students, and drive significant recruitment growth.

From in-country representation and market development to hands-on execution and admissions support, we offer everything your university needs to succeed. We don’t just consult; we integrate as an extension of your team, managing local operations with precision, supported by our in-depth regional expertise.
        </p> -->
      </div>

      <!-- Application Form Column -->
      <div class="col-lg-5 application-form-section mt-3 mb-3">
        <div class="application-form customCard">
          <div class="form-wrapper">
            <h2 class="form-title">Interested in this job?</h2>
            <form id="jobApplicationForm" enctype="multipart/form-data">
              <div id="allerror" class="font-weight-bold text-danger custom-formset"></div>
              <input type="hidden" name="career_id" id="career_id" value="{{$career['id']}}" />

              <div class="mb-3">Full Name*
                <input type="text" name="fullname" id="fullname" class="form-control text-dark " placeholder="" required />
              </div>
              <div class="mb-3">
                Email*
                <input type="email" name="email" id="email" class="form-control text-dark" placeholder="" required />
              </div>
              <div class="mb-3">
                Phone Number*
                <input type="tel" name="phone_no" id="phone_no" class="form-control text-dark" placeholder="" required />
              </div>
              <div class="mb-3">
                City*
                <input type="text" name="city" id="city" class="form-control text-dark" placeholder="" required />
              </div>
              <div class="mb-3">
                <p>Work Experience*</p>
                <select class="form-control  text-dark" name="work_experience" id="work_experience">
                  <option value="">Select Experience</option>
                  <option value="0-2_years">0-2 years</option>
                  <option value="2-5_years">2-5 years</option>
                  <option value="5-8_years">5-8 years</option>
                  <option value="8_years">8+ years</option>
                </select>
              </div>
              <div class="mb-3">
                <p>Tell us about yourself*</p>
                <textarea class="form-control" name="tellus_yourself" id="tellus_yourself" rows="4" placeholder=""
                  required></textarea>
              </div>
              <div class="mb-3">
                <label class="upload-label">Upload CV/Resume*</label>
                <input type="file" name="resume" id="resume" class="form-control" accept=".pdf, .doc, .docx, .ppt, .pptx" required />

                <small class="file-info">Maximum allowed file size: 10 MB. Allowed types: PDF, DOC, DOCX, PPT, PPTX</small>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="termsCheck" name="termsCheck" value="1" required />
                <label class="form-check-label" for="termsCheck">
                  By using this form you agree with the storage and handling of your data by this website.
                </label>
              </div>
              <button type="submit" id="job-submit-button" class="submit-button">
                Submit <!--  <img src="{{ asset('website/assets/icons/arrowBlack.svg') }}" /> -->
              </button>
            </form>
          </div>
        </div>
      </div>

    </div>
</section>
<style>
  p,
  span,
  .mediaCon span {
    font-family: "Poppins", sans-serif !important;
    font-size: 18px !important;
    line-height: 28px !important;
  }
</style>