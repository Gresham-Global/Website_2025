<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\EnquiryController;
use App\Http\Controllers\Common\CareerController;
use App\Http\Controllers\Common\EventController;
use App\Http\Controllers\Common\NewsBlogsController;
use App\Http\Controllers\Common\EventCityController;
use App\Http\Controllers\Common\PublicationController;
use App\Http\Controllers\Common\MediaController;
use App\Http\Controllers\Common\CareerOpeningsController;

require base_path('routes/admin.php');

// Route::get('/', function () {
//     return view('website.home');
// });

Route::get('/', [NewsBlogsController::class, 'homepage'])->name('website.home');


Route::get('/about', function () {
    return view('website.about');
});

Route::get('/approach', function () {
    return view('website.approach');
});

Route::get('/research-assessment', function () {
    return view('website.research-assessment');
});

Route::get('/incountry-representation', function () {
    return view('website.country-representation');
});

Route::get('/academic-collaborations', function () {
    return view('website.academic-collaborations');
});

Route::get('/admission-compliance', function () {
    return view('website.admission-compliance');
});

Route::get('/strategic-marketing', function () {
    return view('website.strategic-marketing');
});

Route::get('/operational-support', function () {
    return view('website.operational-support');
});

Route::get('/contact', function () {
    return view('website.contact');
});

Route::get('/media1', function () {
    return view('website.media');
});
Route::get('/media', [MediaController::class, 'media_display']);


Route::get('/events1', function () {
    return view('website.events');
});

Route::get('/events1/gacc-events', function () {
    return view('website.events/gacc-events');
});
Route::get('/events1/gresham-connect-bangladesh', function () {
    return view('website.events/bangladesh');
});

Route::get('/privacy-policy', function () {
    return view('website.privacy-policy');
});

// Route::get('/careers-listing', function () {
//     return view('website.careers-listing');
// });

// Route::get('/news-and-blogs', function () {
//     return view('website.news-and-blogs');
// });

// Route::get('/publications', function () {
//     return view('website.publications');
// });

//  Route::get('/careers', function () {
//     return view('website.careers');
// });

Route::get('/careers', [CareerController::class, 'all_career_frontend']);
Route::get('/career-details/{id}', [CareerController::class, 'career_details_frontend']);
Route::post('job-interest', [CareerController::class, 'submitJobInterest']);
Route::get('/careers-openings', [CareerController::class, 'careers_openings']);

// Route::get('/careers-openings', [CareerOpeningsController::class, 'index']);

// Route::get('/careers-openings/search', [CareerOpeningsController::class, 'search'])->name('career-openings.search');

Route::get('/events', [EventController::class, 'events_display']);
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

// Route::get('/events/details/', [EventController::class, 'events_display']);


Route::get('/news-and-blogs', [NewsBlogsController::class, 'news_and_blogs_display']);
Route::get('/news-and-blogs/{slug}', [NewsBlogsController::class, 'show'])->name('news-and-blogs.show');

// routes/web.php
Route::put('admin/event/cities/{id}', [EventCityController::class, 'update'])->name('admin.event.cities.update');


Route::get('/publications', [PublicationController::class, 'publications_display']);
Route::get('/publications/{slug}', [PublicationController::class, 'show'])->name('publications.show');

Route::post('/submit-enquiry', [EnquiryController::class, 'submitEnquiry']);
Route::post('/subscribe-newsletter', [EnquiryController::class, 'subscribeToNewsletter']);


Route::get('/publication-details', function () {
    return view('website.publication-details');
});

// Route::post('/publications/download-report', [PublicationController::class, 'downloadReportSubmit'])->name('publications.download.report');
// web.php
Route::post('/publications/download-report', [PublicationController::class, 'downloadReportSubmit']);



Route::get('/preview-email', function () {
    $data = [
        'full_name' => 'Dipesh',
        'title' => 'Emerging Trends in Global Education',
    ];

    return view('emails.pdf', $data);
});