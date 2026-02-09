@extends('website.layout.master')
@section('content')

@section('css_files')
<link rel="stylesheet" href="{{ asset('website/assets/css/publication.css') }}">
@endsection

<section class="publicationBannerSection firstSection">
    <div class="customContainer pt-sm-5">
        <img src="website/assets/images/publications/publicationBanner.webp" alt="Publication Banner" class="w-100 d-none d-md-block" />
        <img src="website/assets/images/publications/publicationBannerMb.webp" alt="Publication Banner" class="w-100 d-block d-md-none" />
    </div>
</section>
<section class="middleContentSection">
    <div class="customContainer">
        <div class="row gap-xl-4">
            <div class="col-sm-4 col-xl-3">
                <img src="website/assets/images/publications/downloadBrochure.webp" alt="Download Brochure" class="w-100 downloadBrochureImg mb-3" />
                <button type="button" aria-label="Download Brochure" class="downloadBtn mb-3">
                    Download Report <img src="website/assets/images/publications/downloadArrow.svg" alt="" />
                </button>
            </div>
            <div class="col-sm-8 col-xl-8">
                <h1 class="mainHeadingSection">Lorem Ipsum is simply dummy text of the printing</h1>
                <p>India's engineering and technology sector is a rapidly expanding force, driving economic growth and offering a wealth of opportunities across diverse industries. The country's prestigious institutions produce a large pool of skilled graduates annually. As India invests heavily in infrastructure, renewable energy, and digital transformation, the sector is projected to become the 3rd largest globally by 2030. This growth, coupled with increasing adoption of AI, creates a dynamic landscape for global collaboration and talent acquisition.</p>
                <p>Explore the full report to identify strategic opportunities for engaging with India's talent pool and expanding your institution's reach. Understanding these trends is crucial for universities aiming to attract top Indian students and build lasting partnerships.</p>
            </div>
        </div>
    </div>
</section>
<section class="reportSection">
    <div class="customContainer">
        <h2 class="mainHeadingSection text-center mb-5">What the Report Includesg</h2>
        <div class="row justify-content-center gy-4">
            <div class="col-lg-4 col-sm-6">
                <div class="reportCard">
                    <div class="frontView">
                        <img src="website/assets/images/publications/report1.webp" alt="Report Card" class="w-100" />
                        <div class="overlay">
                            <h4>Introduction</h4>
                            <button type="button" aria-label="Repeat Button" class="reapeatButton">
                                <img src="website/assets/images/publications/repeat.svg" alt="Repeat" />
                            </button>
                        </div>
                    </div>
                    <div class="backView">
                        <h5>Introduction</h5>
                        <ul>
                            <li>Overview of India’s engineering and technology sector</li>
                            <li>Economic impact</li>
                            <li>Key market size statistics</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="reportCard">
                    <div class="frontView">
                        <img src="website/assets/images/publications/report1.webp" alt="Report Card" class="w-100" />
                        <div class="overlay">
                            <h4>Sector Developments</h4>
                            <button type="button" aria-label="Repeat Button" class="reapeatButton">
                                <img src="website/assets/images/publications/repeat.svg" alt="Repeat" />
                            </button>
                        </div>
                    </div>
                    <div class="backView">
                        <h5>Sector Developments</h5>
                        <ul>
                            <li>Recent trends</li>
                            <li>Major government initiatives</li>
                            <li>Notable industry partnerships</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="reportCard">
                    <div class="frontView">
                        <img src="website/assets/images/publications/report1.webp" alt="Report Card" class="w-100" />
                        <div class="overlay">
                            <h4>Engineering Education</h4>
                            <button type="button" aria-label="Repeat Button" class="reapeatButton">
                                <img src="website/assets/images/publications/repeat.svg" alt="Repeat" />
                            </button>
                        </div>
                    </div>
                    <div class="backView">
                        <h5>Engineering Education</h5>
                        <ul>
                            <li>Structure of engineering education</li>
                            <li>Major specializations</li>
                            <li>Emerging trends</li>
                            <li>Snapshot of top institutes.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="keyHightSection">
    <h2 class="mainHeadingSection text-center mb-5">Key Highlights</h2>
    <div class="keyHightSectionMain">
        <div class="customContainer">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <div class="keyHightCard">
                        <img src="website/assets/images/publications/keyPoint1.svg" alt="">
                        <p><span><strong>India ranked 6th</strong> globally</span> in Patent Applications in 2023</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="keyHightCard">
                        <img src="website/assets/images/publications/keyPoint2.svg" alt="">
                        <p><span><strong>₹273.89 crores</strong> allocated under the FIST-2024</span> <span>Program to enhance research infrastructure</span> across academic institutions.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="keyHightCard">
                        <img src="website/assets/images/publications/keyPoint3.svg" alt="">
                        <p><span>India is home to <strong>143,695</strong> startups</span> <span>as of August 2024, up from just</span> 350 in 2014</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <button type="button" aria-label="Download Brochure" class="downloadBtn mb-3">
                Download Report <img src="website/assets/images/publications/downloadArrow.svg" alt="download icon" />
            </button>
        </div>
    </div>
</section>
<section class="similarProductSection">
    <div class="customContainer">
        <h2 class="mainHeadingSection mb-5">Similar publications</h2>
        <div class="row publicationSlider">
            <div class="publicationCard">
                <img src="website/assets/images/publications/publicationCard.webp" alt="publications" class="w-100">
                <div class="bodyContent">
                    <h4>Maintaining Excellence: Gresham Global's Continued Role As A Leading...</h4>
                    <p>GACC is an annual conference for counsellors supporting high school students in their
                        career transitions. This flagship event aimed to provide counsellors with insights and
                        information on new career options, empowering them with diverse pathways from top UK,
                        Canada and European universities.
                </div>
                <div class="tagDiv"><span>Tags : </span> AI, Technology, Industry</div>
                <hr />
                <div class="d-flex justify-content-between">
                    <button type="button" aria-label="Read More" class="readMoreBtn">
                        Read More
                    </button>
                    <img src="website/assets/images/publications/share.svg" alt="Share Icon" />
                </div>
            </div>
            <div class="publicationCard">
                <img src="website/assets/images/publications/publicationCard.webp" alt="publications" class="w-100">
                <div class="bodyContent">
                    <h4>Maintaining Excellence: Gresham Global's Continued Role As A Leading...</h4>
                    <p>GACC is an annual conference for counsellors supporting high school students in their
                        career transitions. This flagship event aimed to provide counsellors with insights and
                        information on new career options, empowering them with diverse pathways from top UK,
                        Canada and European universities.
                </div>
                <div class="tagDiv"><span>Tags : </span> AI, Technology, Industry</div>
                <hr />
                <div class="d-flex justify-content-between">
                    <button type="button" aria-label="Read More" class="readMoreBtn">
                        Read More
                    </button>
                    <img src="website/assets/images/publications/share.svg" alt="Share Icon" />
                </div>
            </div>
            <div class="publicationCard">
                <img src="website/assets/images/publications/publicationCard.webp" alt="publications" class="w-100">
                <div class="bodyContent">
                    <h4>Maintaining Excellence: Gresham Global's Continued Role As A Leading...</h4>
                    <p>GACC is an annual conference for counsellors supporting high school students in their
                        career transitions. This flagship event aimed to provide counsellors with insights and
                        information on new career options, empowering them with diverse pathways from top UK,
                        Canada and European universities.
                </div>
                <div class="tagDiv"><span>Tags : </span> AI, Technology, Industry</div>
                <hr />
                <div class="d-flex justify-content-between">
                    <button type="button" aria-label="Read More" class="readMoreBtn">
                        Read More
                    </button>
                    <img src="website/assets/images/publications/share.svg" alt="Share Icon" />
                </div>
            </div>
            <div class="publicationCard">
                <img src="website/assets/images/publications/publicationCard.webp" alt="publications" class="w-100">
                <div class="bodyContent">
                    <h4>Maintaining Excellence: Gresham Global's Continued Role As A Leading...</h4>
                    <p>GACC is an annual conference for counsellors supporting high school students in their
                        career transitions. This flagship event aimed to provide counsellors with insights and
                        information on new career options, empowering them with diverse pathways from top UK,
                        Canada and European universities.
                </div>
                <div class="tagDiv"><span>Tags : </span> AI, Technology, Industry</div>
                <hr />
                <div class="d-flex justify-content-between">
                    <button type="button" aria-label="Read More" class="readMoreBtn">
                        Read More
                    </button>
                    <img src="website/assets/images/publications/share.svg" alt="Share Icon" />
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection