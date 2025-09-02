<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Admin\InstituteController;
// use App\Http\Controllers\Admin\DisciplineController;
// use App\Http\Controllers\Admin\SpecializationMasterController;
// use App\Http\Controllers\Admin\FacilityCategoryController;
// use App\Http\Controllers\Admin\FacilityController;
// use App\Http\Controllers\Admin\CourseController;
// use App\Http\Controllers\Admin\CourseFaqController;
// use App\Http\Controllers\Admin\PlacementCompaniesController;
// use App\Http\Controllers\Admin\AdsController;
// use App\Http\Controllers\Common\EnquiryController;
use App\Http\Controllers\Common\MediaController;
use App\Http\Controllers\Common\EventController;
use App\Http\Controllers\Common\CareerController;
use App\Http\Controllers\Common\EnquiryController;
use App\Http\Controllers\Common\NewsBlogsController;
use App\Http\Controllers\Common\NewsCityController;
use App\Http\Controllers\Common\PublicationController;
use App\Http\Controllers\Common\EventCityController;
use App\Http\Controllers\Common\EventCityImageController;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|   
*/

Route::get('admin', function () {
    return redirect()->route('admin.dashboard');
});

Route::prefix('admin')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'login');
        Route::get('/login', 'login')->name('admin.login');
        Route::post('/login', 'verify_login');
        Route::get("/forgot-password", "ForgotPassword")->name('admin.forgotPassword');
        Route::post("/forgot-password", "ForgotPasswordByMail");
        Route::get("/reset-password", "ResetPassword");
        Route::post("/reset-password", "ResetPasswordNew");
        Route::get('/logout', 'logout')->name('admin.logout');
    });
    ///Route::get('/dashboard', [AdminController::class, 'dashboard']);
    // Route::middleware([
    //     'admin.auth',
    //     config('jetstream.auth_session'),
    //     'verified',
    // ])->group(function () {
    // Route::middleware([
    //     AdminAuthenticate::class, // Use the full class path
    //     config('jetstream.auth_session'),
    //     'verified',
    // ])->group(function () {
    Route::middleware([AdminAuthenticate::class])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');;
        // Add other admin routes here that need authentication and verification
        Route::controller(MediaController::class)->group(function () {
            Route::get('/media', 'index')->name('admin.media');
            Route::get('/media-all', 'allMedia');
            Route::get('/media/create', 'create')->name('admin.media.create');
            Route::post('/media/store', 'store')->name('admin.media.store');
            Route::post('/media/delete', 'delete')->name('admin.media.delete');
            Route::get('/media/edit/{id}', 'media_edit');
            Route::post('/media/edit/{id}', 'media_update');
        });

        Route::controller(EventController::class)->group(function () {
            Route::get('/event', 'index')->name('admin.event');
            Route::get('/event-all', 'allEvent');
            Route::get('/event/create', 'create')->name('admin.event.create');
            Route::post('/event/store', 'store')->name('admin.event.store');
            Route::post('/event/delete', 'delete')->name('admin.event.delete');
            Route::get('/event/edit/{id}', 'event_edit');
            Route::post('/event/edit/{id}', 'event_update');
        });

        // Existing News & Blog CMS routes
        Route::controller(NewsBlogsController::class)->group(function () {
            Route::get('/newsandblog', 'index')->name('admin.newsandblog');
            Route::get('/newsandblog-all', 'allNewsAndBlog');
            Route::get('/newsandblog/create', 'create')->name('admin.newsandblog.create');
            Route::post('/newsandblog/store', 'store')->name('admin.newsandblog.store');
            Route::post('/newsandblog/delete', 'delete')->name('admin.newsandblog.delete');
            Route::get('/newsandblog/edit/{id}', 'newsandblog_edit');
            Route::post('/newsandblog/edit/{id}', 'newsandblog_update');
        });
 
        // City Management Routes under Events section Cities
        Route::prefix('/event/cities')->name('admin.event.cities.')->controller(EventCityController::class)->group(function () {
            Route::get('/', 'index')->name('index');          // admin.newsandblog.cities.index
            Route::get('/cities-all', 'allCities');
            Route::get('/create', 'create')->name('create');  // admin.newsandblog.cities.create
            Route::post('/store', 'store')->name('store');    // admin.newsandblog.cities.store
            Route::get('/edit/{id}', 'edit')->name('edit');   // admin.newsandblog.cities.edit
            Route::post('/update/{id}', 'update')->name('update'); // admin.newsandblog.cities.update
            Route::post('/delete', 'delete')->name('delete'); // admin.newsandblog.cities.delete
            
        });
        Route::controller(EventCityImageController::class)->group(function () {
            Route::get('/event/city/images', 'index')->name('admin.event.city.images');
            Route::get('/event/city/images-all', 'allEventCityImages');
            Route::get('/event/city/images/create', 'create')->name('admin.event.city.images.create');
            Route::post('/event/city/images/store', 'store')->name('admin.event.city.images.store');
            Route::post('/event/city/images/delete', 'delete')->name('admin.event.city.images.delete');
            Route::get('/event/city/images/edit/{event_id}/{city_id}', 'edit');
            Route::post('/event/city/images/edit/{event_id}/{city_id}', 'update')->name('admin.event.city.images.edit');
            Route::get('/event/cities/{id}', 'getCitiesByEvent');
        });

        // Route::controller(controller: EventCityController::class)->group(function () {
        //     Route::get('/event/cities', 'index')->name('admin.event.cities');
        //     Route::get('/event/cities/cities-all', 'allCities');
        //     Route::get('/event/cities/create', 'create')->name('admin.event.cities.create');
        //     Route::post('/event/cities/store', 'store')->name('admin.event.cities.store');
        //     Route::post('/event/cities/delete', 'delete')->name('admin.event.cities.delete');
        //     Route::get('/event/cities/edit/{id}', 'edit');
        //     Route::post('/event/cities/update/{id}', 'update');
        // });

        // City Images Management Routes under Events section
        // Route::prefix('event/city_images')->name('admin.event.city_images.')->controller(EventCityController::class)->group(function () {
        //     Route::get('/', 'index')->name('index');               // admin.newsandblog.city_images.index
        //     Route::get('/create', 'create')->name('create');       // admin.newsandblog.city_images.create
        //     Route::post('/store', 'store')->name('store');         // admin.newsandblog.city_images.store
        //     Route::get('/edit/{id}', 'edit')->name('edit');        // admin.newsandblog.city_images.edit
        //     Route::post('/update/{id}', 'update')->name('update'); // admin.newsandblog.city_images.update
        //     Route::post('/delete', 'delete')->name('delete');      // admin.newsandblog.city_images.delete
        // });


        // Existing Publications CMS routes
        Route::controller(PublicationController::class)->group(function () {
            Route::get('/publication', 'index')->name('admin.publication');
            Route::get('/publication-all', 'allpublication');
            Route::get('/publication/create', 'create')->name('admin.publication.create');
            Route::post('/publication/store', 'store')->name('admin.publication.store');
            Route::post('/publication/delete', 'delete')->name('admin.publication.delete');
            Route::get('/publication/edit/{id}', 'publication_edit');
            Route::post('/publication/edit/{id}', 'publication_update');
            Route::get('/publication-report', 'publication_report')->name('admin.publication-report');
            Route::get('/publication-report-all', 'publication_report_all')->name('admin.fetch-publication-report');
            Route::get('/publication-download', 'downloadPublication');
            Route::get('/publication-form-list', 'publication_form_list')->name('admin.publication-form-list');
            Route::get('/publication-form-list-all', 'publication_form_list_all')->name('admin.fetch-publication-form-list');
            Route::get('/publication-form-list-download', 'downloadPublicationFormList');

        });

        Route::controller(CareerController::class)->group(function () {
            Route::get('/career', 'index')->name('admin.career');
            Route::get('/career-all', 'allCareer');
            Route::get('/career/create', 'create')->name('admin.career.create');
            Route::post('/career/store', 'store')->name('admin.career.store');
            Route::post('/career/delete', 'delete')->name('admin.career.delete');
            Route::get('/career/edit/{id}', 'career_edit');
            Route::post('/career/edit/{id}', 'career_update');

            Route::get('/job-interested', 'jobInterested')->name('admin.job_interested');
            Route::get('/job-interested-all', 'allJobInterested');
            Route::post('/job-interested/delete', 'delete_job');
            Route::get('/job-interested/view/{id}', 'job_view');
            Route::get('/job-download', 'downloadJob');

            Route::get('/view-resume/{fileName}', function ($fileName) {
                $filePath = public_path('resume/' . $fileName);

                if (!file_exists($filePath)) {
                    abort(404); // File not found
                }

                return response()->file($filePath);
            })->name('view.resume');
        });

        Route::controller(EnquiryController::class)->group(function () {
            Route::get('/enquires', 'index')->name('admin.enquires');
            Route::get('/contact-all', 'contact_all')->name('admin.fetch-enquiries');
            Route::get('/contact-download', 'downloadContact');
            Route::get('/subscribe-list', 'subscribe_index')->name('admin.subscribe');
            Route::get('/subscribe-all', 'subscribe_all')->name('admin.fetch-subscribe');
            Route::get('/subscribe-download', 'downloadSubscribe');
        });
    });
});
