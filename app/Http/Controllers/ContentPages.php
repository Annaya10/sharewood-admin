<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Sitecontent;

use App\Models\Markers_model;
use App\Models\Center_categories_model;

use App\Models\Products_model;
use App\Models\Blog_categories_model;
use App\Models\Blog_model;
use App\Models\Event;

// use App\Models\Locations_model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentPages extends Controller
{
    public function website_settings(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $countries = get_countries();
        $states = get_country_states(231);
        if (empty($header) || $header == null || $header == 'null') {
            $output['not_logged'] = true;
        }
        if (!empty($member) && $member != false) {
            $this->data['site_settings']->member = $member;
        } else {
            $this->data['site_settings']->member = null;
        }
        $output['site_settings'] = $this->data['site_settings'];
        exit(json_encode($output));
    }

    // public function member_settings(Request $request)
    // {
    //     $member_obj = (object)[];
    //     $token = $request->input('token', null);
    //     $member = $this->authenticate_verify_token($token);
    //     $this->data['preferred_pharmacy'] = Preferred_pharmacy_model::orderBy('id', 'DESC')->where('status', 1)->get();
    //     if (!empty($member)) {


    //         $output['expire_time'] = format_date($member->otp_expire, 'Y-m-d H:i:s');
    //         $output['mem_image'] = $member->mem_image;
    //         $output['mem_name'] = $member->mem_fullname;
    //         $output['mem_email'] = $member->mem_email;
    //     }
    //     $output['member'] = $member;
    //     $output['preferred_pharmacy'] = $this->data['preferred_pharmacy'];

    //     exit(json_encode($output));
    // }

    public function home_page(Request $request)
    {
   
        $this->data['sitecontent'] = Sitecontent::where('ckey','home')->first();
        exit(json_encode($this->data));
    }

    public function about_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);

        $this->data['sitecontent'] = get_page('about');
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];


        $categories = Center_categories_model::orderBy('id', 'asc')->where('status', 1)->get();
        $locations = Markers_model::orderBy('id', 'DESC')->where('status', 1)->get();

        // Group locations under respective categories
        $this->data['groupedLocations'] = $categories->map(function ($category) use ($locations) {
            return [
                'category' => $category,
                'locations' => $locations->filter(function ($location) use ($category) {
                    return $location->category == $category->id; // Ensure `category_id` matches
                }),
            ];
        });

        // // pr($this->data['locations']);

        $this->data['markers'] = $locations;


        $this->data['pageView'] = 'pages.about';
        $this->data['footer'] = true;

        return view('includes.site-master', $this->data);
    }


    public function products_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $this->data['sitecontent'] = get_page('products');
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];
        $this->data['products'] = products_model::orderBy('id', 'asc')->where('status', 1)->get();
        // pr($this->data['products']);
        $this->data['pageView'] = 'pages.products';
        $this->data['footer'] = true;

        return view('includes.site-master', $this->data);
    }

    public function blog_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);

        $this->data['sitecontent'] = get_page('blog');
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];

        $this->data['blog_categories'] = Blog_categories_model::orderBy('id', 'asc')->where('status', 1)->get();
        $this->data['featured_blogs'] = Blog_model::orderBy('id', 'DESC')->where('status', 1)->where('featured', 1)->get();


        $this->data['pageView'] = 'pages.blog';
        $this->data['footer'] = true;

        return view('includes.site-master', $this->data);
    }

    public function blog_detail_page(Request $request, $slug)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);


        if (!empty($slug) && $this->data['blog_post'] = Blog_model::orderBy('id', 'DESC')->where('status', 1)->where('slug', $slug)->get()->first()) {
            $this->data['sitecontent'] = get_page('blog');
            $this->data['page_title'] = $this->data['blog_post']->title;
            $this->data['blog_post']->cat_name = !empty($this->data['blog_post']->category_row) ? $this->data['blog_post']->category_row->name : '';
            // $this->data['blog_post']->created_date = format_date($this->data['blog_post']->created_at, 'd M, Y');
        }


        $this->data['pageView'] = 'pages.blog-detail';
        $this->data['footer'] = true;
        return view('includes.site-master', $this->data);
    }


    public function contact_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);

        $this->data['sitecontent'] = get_page('contact');
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];
        $this->data['pageView'] = 'pages.contact';
        $this->data['footer'] = true;

        return view('includes.site-master', $this->data);
    }
    public function privacy_policy_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $this->data['sitecontent'] = get_page('privacy_policy');
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];
        $this->data['pageView'] = 'pages.privacy-policy';
        $this->data['footer'] = true;

        return view('includes.site-master', $this->data);
    }
    public function terms_conditions_page(Request $request)
    {

        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $this->data['sitecontent'] = get_page('terms_conditions');
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];
        $this->data['pageView'] = 'pages.terms-conditions';
        $this->data['footer'] = true;

        return view('includes.site-master', $this->data);
    }
    public function signup_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $this->data['content'] = get_page('signup');
        $this->data['page_title'] = $this->data['content']['page_title'];
        exit(json_encode($this->data));
    }
    public function login_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $this->data['content'] = get_page('login');
        $this->data['page_title'] = $this->data['content']['page_title'];
        exit(json_encode($this->data));
    }
    public function forgot_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $this->data['content'] = get_page('forgot');
        $this->data['page_title'] = $this->data['content']['page_title'];
        exit(json_encode($this->data));
    }
    public function reset_page(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $this->data['content'] = get_page('reset');
        $this->data['page_title'] = $this->data['content']['page_title'];
        exit(json_encode($this->data));
    }
}
