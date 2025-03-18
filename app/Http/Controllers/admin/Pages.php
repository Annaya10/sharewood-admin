<?php

namespace App\Http\Controllers\admin;
use App\Models\Sitecontent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Pages extends Controller
{

    public function home(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){
            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 9; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();
        $this->data['sitecontent']=unserialize($this->data['row']->code);
        return view('admin.website_pages.site_home',$this->data);
    }
    public function courses(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){
            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 7; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            // pr($input);
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }

        return view('admin.website_pages.site_courses',$this->data);
    }


    public function corporate_retreats_meetings(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){
            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 15; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            // pr($input);
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }

        return view('admin.website_pages.site_corporate_retreats_meetings',$this->data);
    }


    public function tournaments(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){
            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 15; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            // pr($input);
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }

        return view('admin.website_pages.site_tournaments',$this->data);
    }
   
    public function course_guide_scorecard(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){
            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 7; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            // pr($input);
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }

        return view('admin.website_pages.site_courses_guide',$this->data);
    }

    public function rates(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){
            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 7; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            // pr($input);
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }

        return view('admin.website_pages.site_rates',$this->data);
    }
    public function about(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 7; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_about',$this->data);
    }



    public function proshop_boutique(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 10; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_proshop_boutique',$this->data);
    }


    public function hospitality_group_commitments(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 7; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_hospitality_group_commitments',$this->data);
    }


    public function wedding_at_sherwood_golf(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 30; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_wedding_at_sherwood_golf',$this->data);
    }


    public function memberships_overview(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 30; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_memberships_overview',$this->data);
    }

    public function memberships_application(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 30; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_memberships_application',$this->data);
    }

    public function accommodations(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 30; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_accommodations',$this->data);
    }


    public function stay_play_packages(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 30; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_stay_play_packages',$this->data);
    }



    public function blog(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 7; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_blog',$this->data);
    }

    public function booking_requests(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_booking_requests',$this->data);
    }
    public function privacy_policy(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_privacy',$this->data);
    }

    public function reviews(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_reviews',$this->data);
    }
    public function terms_conditions(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_terms_conditions',$this->data);
    }
    public function signup(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_signup',$this->data);
    }
    public function login(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_login',$this->data);
    }
    public function forgot(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_forgot',$this->data);
    }
    public function reset(Request $request){
        has_access(12);
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/pages/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_reset',$this->data);
    }


}
