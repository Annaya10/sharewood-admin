<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitecontent;
use App\Models\Admin;
use App\Models\Tournamnet_model;
use App\Models\Testimonial;
use App\Models\Gallery_model;
use App\Models\Team;
use App\Models\Sponser;
use App\Models\Packages_model;


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
        $this->data['teams']=Team::orderBy('id', 'DESC')->where('featured',1)->get(); 


           
          
        exit(json_encode($this->data));
    }

    public function memberships_overview(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('memberships-overview');     
        $this->data['page_title']=$this->data['content']['page_title'];
   
        exit(json_encode($this->data));
    }

    public function courses(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('courses');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
        
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
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('booking-requests');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
    }

    public function privacy_policy(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('privacy_policy');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
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
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('corporate-retreats-meetings');     
        $this->data['page_title']=$this->data['content']['page_title'];
        $this->data['gallery']=Gallery_model::orderBy('id', 'DESC')->where('is_featured',1)->get(); 
        $this->data['packages'] = Packages_model::where('status', 1)
        ->where('featured', 1)
        ->where('category', 1)
        ->orderBy('id', 'DESC')
        ->get();


           
          
        exit(json_encode($this->data));
    }

    public function tournaments(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('tournaments');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
    }

    public function wedding_at_sherwood_golf(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('wedding-at-sherwood-golf');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
    }

    public function memberships_application(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('memberships-application');     
        $this->data['page_title']=$this->data['content']['page_title'];
   
        exit(json_encode($this->data));
    }

    public function accommodations(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('accommodations');     
        $this->data['page_title']=$this->data['content']['page_title'];

           
          
        exit(json_encode($this->data));
    }

    public function stay_play_packages(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('stay-play-packages');     
        $this->data['page_title']=$this->data['content']['page_title'];
        $this->data['packages'] = Packages_model::where('status', 1)
        ->where('featured', 1)
        ->where('category', 4)
        ->where('duration', 1)
        ->orderBy('id', 'DESC')
        ->get();
        $this->data['packages_wed'] = Packages_model::where('status', 1)
        ->where('featured', 1)
        ->where('category', 4)
        ->where('duration', 2)
        ->orderBy('id', 'DESC')
        ->get();
           
          
        exit(json_encode($this->data));
     
    }

    public function reviews(Request $request) {
        $token=$request->input('token', null);
        $member=$this->authenticate_verify_token($token);
        $this->data['content']=get_page('reviews');     
        $this->data['page_title']=$this->data['content']['page_title'];
        $this->data['testimonials']=Testimonial::orderBy('id', 'DESC')->where('status',1)->get(); 

           
          
        exit(json_encode($this->data));
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