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


use App\Http\Controllers\admin\Tournaments;
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
    Route::match(['GET', 'POST'], '/admin/pages/blog', [Pages::class, 'blog']);
    Route::match(['GET', 'POST'], '/admin/pages/courses', [Pages::class, 'courses']);
    Route::match(['GET', 'POST'], '/admin/pages/rates', [Pages::class, 'rates']);
    Route::match(['GET', 'POST'], '/admin/pages/contact', [Pages::class, 'contact']);
    Route::match(['GET', 'POST'], '/admin/pages/privacy_policy', [Pages::class, 'privacy_policy']);
    Route::match(['GET', 'POST'], '/admin/pages/terms_conditions', [Pages::class, 'terms_conditions']);
    Route::match(['GET', 'POST'], '/admin/pages/proshop-boutique', [Pages::class, 'proshop_boutique']);
    Route::match(['GET', 'POST'], '/admin/pages/hospitality-group-commitments', [Pages::class, 'hospitality_group_commitments']);
    Route::match(['GET', 'POST'], '/admin/pages/course-guide-scorecard', [Pages::class, 'course_guide_scorecard']);
    Route::match(['GET', 'POST'], '/admin/pages/corporate-events', [Pages::class, 'corporate_events']);
    Route::match(['GET', 'POST'], '/admin/pages/tournaments', [Pages::class, 'tournaments']);

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
    
    /*==============================fdghfghfg =====================================*/
    Route::get('/admin/contact', [Contact::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/contact/view/{id}', [Contact::class, 'view']);
    Route::match(['GET', 'POST'], '/admin/contact/delete/{id}', [Contact::class, 'delete']);

    /*==============================Subscribers =====================================*/
    Route::get('/admin/subscribers', [Subscribers::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/subscribers/view/{id}', [Subscribers::class, 'view']);
    Route::match(['GET', 'POST'], '/admin/subscribers/delete/{id}', [Subscribers::class, 'delete']);
});
