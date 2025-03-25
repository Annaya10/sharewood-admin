<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitecontent;


class ContentPages extends Controller
{
    
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
        return $this->fetchPageContent('home');
    }

    public function about_page(Request $request) {
        return $this->fetchPageContent('about');
    }

    public function memberships_overview(Request $request) {
        return $this->fetchPageContent('memberships-overview');
    }

    public function courses(Request $request) {
        return $this->fetchPageContent('courses');
    }

    public function rates(Request $request) {
        return $this->fetchPageContent('rates');
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
        return $this->fetchPageContent('proshop-boutique');
    }

    public function hospitality_group_commitments(Request $request) {
        return $this->fetchPageContent('hospitality-group-commitments');
    }

    public function course_guide_scorecard(Request $request) {
        return $this->fetchPageContent('course-guide-scorecard');
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
}
