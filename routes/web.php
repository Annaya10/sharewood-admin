<?php

use App\Http\Controllers\Ajax;

use App\Http\Controllers\admin\Index;
use App\Http\Controllers\admin\Pages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Contact;

use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\Gallery;
use App\Http\Controllers\admin\Markers;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\Testimonials;


use App\Http\Controllers\admin\Tournaments;
use App\Http\Controllers\admin\Packages;
use App\Http\Controllers\admin\Packages_categories_model;
use App\Http\Controllers\admin\Sponsership;
use App\Http\Controllers\admin\Member;

use App\Http\Controllers\admin\Sitecontent;
use App\Http\Controllers\admin\Subscribers;
use App\Http\Controllers\admin\CourseController;

use App\Http\Controllers\ContentPages;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*==============================API POST  Routes =====================================*/
/*==============================Ajax Routes =====================================*/
// Route::post('newsletter', [Ajax::class,'newsletter']);
Route::get('get_states/{country_id}', [Ajax::class, 'get_states']);
Route::get('json_object', [Ajax::class, 'json_object']);

Route::match(['GET', 'POST'], 'get_data', [Ajax::class, 'get_data']);
Route::match(['GET', 'POST'], 'upload-editor-image', [Ajax::class, 'upload_editor_image']);
Route::post('post_data', [Ajax::class, 'post_data']);

// Route::match(['GET','POST'], '/get_data', [Ajax::class,'get_data']);

Route::post('newsletter', [Ajax::class, 'newsletter']);
Route::post('contact_us', [Ajax::class, 'contact_us']);



////////////////////////////////////////////////////////////////////////////////////
////////////////////////// Front-End Routes/////////////////////////////////////////

Route::get('/', [ContentPages::class, 'home_page']);
Route::get('about', [ContentPages::class, 'about_page']);
Route::get('products', [ContentPages::class, 'products_page']);

Route::get('blog', [ContentPages::class, 'blog_page']);
Route::get('blog-detail/{slug}', [ContentPages::class, 'blog_detail_page']);

Route::get('get_blogs', [Ajax::class, 'get_blogs']);

// Route::get('get_blogs/{category_id}', [Ajax::class, 'get_blogs']);



Route::get('contact', [ContentPages::class, 'contact_page']);
Route::get('privacy-policy', [ContentPages::class, 'privacy_policy_page']);
Route::get('terms-conditions', [ContentPages::class, 'terms_conditions_page']);





/*==============================Admin Routes =====================================*/
Route::controller(Index::class)->group(function () {
    Route::get('/admin/register', 'register');
    Route::post('/admin/register', 'store');
});
Route::get('/admin/login', [Index::class, 'admin_login'])->middleware('admin_logged_in');
Route::get('/admin/login', [Index::class, 'admin_login'])->middleware('admin_logged_in');
Route::post('/admin/login', [Index::class, 'login'])->middleware('admin_logged_in');
Route::get('/admin/logout', [Index::class, 'logout']);

// /////////jan 15////////////////

Route::get('admin/forgot-password', [Index::class, 'forgot_password'])->name('admin.forgot_password');
Route::post('admin/forgot-password', [Index::class, 'send_reset_link'])->name('admin.send_reset_link');


Route::get('admin/reset-password/{token}', [Index::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('admin/submit-password', [Index::class, 'resetPassword'])->name('password.update');


// /////////////////////////



Route::middleware(['is_admin'])->group(function () {
    Route::get('/admin/dashboard', [Dashboard::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/change-password', [Dashboard::class, 'change_password']);
    Route::get('/admin/site_settings', [Dashboard::class, 'settings']);
    Route::post('/admin/settings', [Dashboard::class, 'settings_update']);
    Route::get('/admin/sitecontent', [Sitecontent::class, 'index']);

    /*==============================Website Textual Pages =====================================*/
    Route::match(['GET', 'POST'], '/admin/pages/home', [Pages::class, 'home']);
    Route::match(['GET', 'POST'], '/admin/pages/about', [Pages::class, 'about']);
    Route::match(['GET', 'POST'], '/admin/pages/memberships-overview', [Pages::class, 'memberships_overview']);
    Route::match(['GET', 'POST'], '/admin/pages/courses', [Pages::class, 'courses']);
    Route::match(['GET', 'POST'], '/admin/pages/rates', [Pages::class, 'rates']);
    Route::match(['GET', 'POST'], '/admin/pages/booking-requests', [Pages::class, 'booking_requests']);
    Route::match(['GET', 'POST'], '/admin/pages/privacy_policy', [Pages::class, 'privacy_policy']);
    Route::match(['GET', 'POST'], '/admin/pages/terms_conditions', [Pages::class, 'terms_conditions']);
    Route::match(['GET', 'POST'], '/admin/pages/proshop-boutique', [Pages::class, 'proshop_boutique']);
    Route::match(['GET', 'POST'], '/admin/pages/hospitality-group-commitments', [Pages::class, 'hospitality_group_commitments']);
    Route::match(['GET', 'POST'], '/admin/pages/course-guide-scorecard', [Pages::class, 'course_guide_scorecard']);
    Route::match(['GET', 'POST'], '/admin/pages/corporate-retreats-meetings', [Pages::class, 'corporate_retreats_meetings']);
    Route::match(['GET', 'POST'], '/admin/pages/tournaments', [Pages::class, 'tournaments']);
    Route::match(['GET', 'POST'], '/admin/pages/wedding-at-sherwood-golf', [Pages::class, 'wedding_at_sherwood_golf']);
    Route::match(['GET', 'POST'], '/admin/pages/memberships-application', [Pages::class, 'memberships_application']);
    Route::match(['GET', 'POST'], '/admin/pages/accommodations', [Pages::class, 'accommodations']);
    Route::match(['GET', 'POST'], '/admin/pages/stay-play-packages', [Pages::class, 'stay_play_packages']);
    Route::match(['GET', 'POST'], '/admin/pages/reviews', [Pages::class, 'reviews']);

    /*==============================Gallerys =====================================*/
    Route::get('/admin/gallery', [Gallery::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/gallery/add', [Gallery::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/gallery/edit/{id}', [Gallery::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/gallery/delete/{id}', [Gallery::class, 'delete']);



        /*==============================Sponsership =====================================*/
    Route::get('/admin/sponsership', [Sponsership::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/sponsership/add', [Sponsership::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/sponsership/edit/{id}', [Sponsership::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/sponsership/delete/{id}', [Sponsership::class, 'delete']);



    // Route::post('/admin/products/orderAll', [Products::class, 'orderAll']);
    // Route::match(['GET', 'POST'], '/admin/products/orderAll', [Products::class, 'add']);


    /*==============================Map Locations =====================================*/

    Route::get('/map', [Markers::class, 'index'])->name('map');
    Route::post('/save-marker', [Markers::class, 'saveMarker'])->name('save-marker');

    Route::get('/admin/markers', [Markers::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/markers/add', [Markers::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/markers/edit/{id}', [Markers::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/markers/delete/{id}', [Markers::class, 'delete']);




    
    /*==============================Center Categories Module =====================================*/
    Route::get('/admin/manage-boosters', [Member::class, 'index']);
    Route::get('/admin/manage-users', [Member::class, 'users']);
    Route::match(['GET', 'POST'], '/admin/manage-boosters/edit/{id}', [Member::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/manage-users/edit/{id}', [Member::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/manage-boosters/delete/{id}', [Member::class, 'delete']);
    Route::match(['GET', 'POST'], '/admin/manage-users/delete/{id}', [Member::class, 'delete']);



    /*==============================Tournaments  Module =====================================*/
    Route::get('/admin/tournament', [Tournaments::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/tournament/add', [Tournaments::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/tournament/edit/{id}', [Tournaments::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/tournament/delete/{id}', [Tournaments::class, 'delete']);


    /*==============================Packages  Module =====================================*/
    Route::get('/admin/packages', [Packages::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/packages/add', [Packages::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/packages/edit/{id}', [Packages::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/packages/delete/{id}', [Packages::class, 'delete']);

       /*==============================Packages Categories  Module =====================================*/

       Route::get('/admin/package_categories', [Packages_categories_model::class, 'index']);
       Route::match(['GET', 'POST'], '/admin/package_categories/add', [Packages_categories_model::class, 'add']);
       Route::match(['GET', 'POST'], '/admin/package_categories/edit/{id}', [Packages_categories_model::class, 'edit']);
       Route::match(['GET', 'POST'], '/admin/package_categories/delete/{id}', [Packages_categories_model::class, 'delete']);

      /*==============================Courses  Module =====================================*/

    Route::get('/admin/course', [CourseController::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/course/add', [CourseController::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/course/edit/{id}', [CourseController::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/course/delete/{id}', [CourseController::class, 'delete']);

   /*==============================TEAM  Module =====================================*/
   Route::get('/admin/team', [TeamController::class, 'index']);
   Route::match(['GET', 'POST'], '/admin/team/add', [TeamController::class, 'add']);
   Route::match(['GET', 'POST'], '/admin/team/edit/{id}', [TeamController::class, 'edit']);
   Route::match(['GET', 'POST'], '/admin/team/delete/{id}', [TeamController::class, 'delete']);


     /*==============================testimonials  Module =====================================*/
     Route::get('/admin/testimonials', [Testimonials::class, 'index']);
     Route::match(['GET', 'POST'], '/admin/testimonials/add', [Testimonials::class, 'add']);
     Route::match(['GET', 'POST'], '/admin/testimonials/edit/{id}', [Testimonials::class, 'edit']);
     Route::match(['GET', 'POST'], '/admin/testimonials/delete/{id}', [Testimonials::class, 'delete']);
    
    /*==============================fdghfghfg =====================================*/
    Route::get('/admin/contact', [Contact::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/contact/view/{id}', [Contact::class, 'view']);
    Route::match(['GET', 'POST'], '/admin/contact/delete/{id}', [Contact::class, 'delete']);

    /*==============================Subscribers =====================================*/
    Route::get('/admin/subscribers', [Subscribers::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/subscribers/view/{id}', [Subscribers::class, 'view']);
    Route::match(['GET', 'POST'], '/admin/subscribers/delete/{id}', [Subscribers::class, 'delete']);
});
