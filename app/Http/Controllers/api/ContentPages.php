<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitecontent;
use App\Models\Admin;
use App\Models\Tournamnet_model;
use App\Models\Testimonial;
use App\Models\Gallery_model;
use App\Models\Sponser;


class ContentPages extends Controller
{
     /**
     * Fetch site content based on route.
     */
    private function fetchPageContent($ckey)
    {
        $content = Sitecontent::where('ckey', $ckey)->first();

        if ($content) {
            return response()->json([
                'status' => 'success',
                'data' => unserialize($content->code) ?? []
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Page content not found'
            ], 404);
        }
    }

    public function home_page(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('home');     
        $this->data['page_title']=$this->data['content']['page_title'];
       $this->data['tournaments']=Tournamnet_model::orderBy('id', 'ASC')->where('featured',1)->get(); 

           
        $this->data['testimonials']=Testimonial::orderBy('id', 'DESC')->where('featured',1)->get(); 
        $this->data['gallery']=Gallery_model::orderBy('id', 'DESC')->where('is_featured',1)->get(); 
          
        exit(json_encode($this->data));
     }

    public function about_page(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('about');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
    }

    public function memberships_overview(Request $request) {
        return $this->fetchPageContent('memberships-overview');
    }

    public function courses(Request $request) {
        return $this->fetchPageContent('courses');
    }

    public function rates(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('rates');     
        $this->data['page_title']=$this->data['content']['page_title'];
        $this->data['testimonials']=Testimonial::orderBy('id', 'DESC')->where('featured',1)->get(); 

           
          
        exit(json_encode($this->data));
     
    }

    public function booking_requests(Request $request) {
        return $this->fetchPageContent('booking-requests');
    }

    public function privacy_policy(Request $request) {
        return $this->fetchPageContent('privacy_policy');
    }

    public function terms_conditions(Request $request) {
        return $this->fetchPageContent('terms_conditions');
    }

    public function proshop_boutique(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('proshop-boutique');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
    }

    public function hospitality_group_commitments(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('hospitality-group-commitments');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
        $this->data['sponsers']=Sponser::orderBy('id', 'DESC')->where('is_featured',1)->get(); 
          
        exit(json_encode($this->data));
    }

    public function course_guide_scorecard(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('course-guide-scorecard');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
    }

    public function corporate_retreats_meetings(Request $request) {
        return $this->fetchPageContent('corporate-retreats-meetings');
    }

    public function tournaments(Request $request) {
        return $this->fetchPageContent('tournaments');
    }

    public function wedding_at_sherwood_golf(Request $request) {
        return $this->fetchPageContent('wedding-at-sherwood-golf');
    }

    public function memberships_application(Request $request) {
        return $this->fetchPageContent('memberships-application');
    }

    public function accommodations(Request $request) {
        return $this->fetchPageContent('accommodations');
    }

    public function stay_play_packages(Request $request) {
        return $this->fetchPageContent('stay-play-packages');
    }

    public function reviews(Request $request) {
        return $this->fetchPageContent('reviews');
    }

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
}