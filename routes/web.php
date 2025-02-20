<?php

use App\Http\Controllers\Ajax;

use App\Http\Controllers\admin\Index;
use App\Http\Controllers\admin\Pages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Contact;

use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\Games;
use App\Http\Controllers\admin\Markers;
use App\Http\Controllers\admin\Center_categories;


use App\Http\Controllers\admin\Blog;
use App\Http\Controllers\admin\Blog_categories;
use App\Http\Controllers\admin\Member;

use App\Http\Controllers\admin\Sitecontent;
use App\Http\Controllers\admin\Subscribers;

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

    /*==============================Games & Levels =====================================*/
    Route::get('/admin/games', [Games::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/games/add', [Games::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/games/edit/{id}', [Games::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/games/delete/{id}', [Games::class, 'delete']);
    Route::match(['GET', 'POST'], '/admin/games/levels/{id}', [Games::class, 'levels']);
    Route::match(['GET', 'POST'], '/admin/games/levels/add/{id}', [Games::class, 'level_add']);
    Route::match(['GET', 'POST'], '/admin/games/levels/edit/{id}', [Games::class, 'level_edit']);
    Route::match(['GET', 'POST'], '/admin/games/levels/delete/{id}', [Games::class, 'level_delete']);


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



    /*==============================BLOG Categories Module =====================================*/
    Route::get('/admin/blog_categories', [Blog_categories::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/blog_categories/add', [Blog_categories::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/blog_categories/edit/{id}', [Blog_categories::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/blog_categories/delete/{id}', [Blog_categories::class, 'delete']);
    /*==============================BLOG =====================================*/
    Route::get('/admin/blog', [Blog::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/blog/add', [Blog::class, 'add']);
    Route::match(['GET', 'POST'], '/admin/blog/edit/{id}', [Blog::class, 'edit']);
    Route::match(['GET', 'POST'], '/admin/blog/delete/{id}', [Blog::class, 'delete']);
    /*==============================Contact =====================================*/
    Route::get('/admin/contact', [Contact::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/contact/view/{id}', [Contact::class, 'view']);
    Route::match(['GET', 'POST'], '/admin/contact/delete/{id}', [Contact::class, 'delete']);

    /*==============================Subscribers =====================================*/
    Route::get('/admin/subscribers', [Subscribers::class, 'index']);
    Route::match(['GET', 'POST'], '/admin/subscribers/view/{id}', [Subscribers::class, 'view']);
    Route::match(['GET', 'POST'], '/admin/subscribers/delete/{id}', [Subscribers::class, 'delete']);
});
