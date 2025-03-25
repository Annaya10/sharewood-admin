<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class Testimonials extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Testimonial::orderBy('id', 'DESC')->get();
        return view('admin.testimonials.index', $this->data);
    }
    public function add(Request $request)
    {
        has_access(17);
        $input = $request->all();
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/Testimonial/');
                if (!empty(basename($image))) {
                    generateThumbnail('Testimonial', basename($image), 'square', 'large');
                    $data['image'] = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
            if (!empty($input['featured'])) {
                $data['featured'] = 1;
            } else {
                $data['featured']  
                = 0;
            }
            
            
            $data['name'] = $input['name'];
            $data['post'] = $input['post'];
            $data['message'] = $input['message'];
       

            

            // pr($data);
            $id = Testimonial::create($data);
            return redirect('admin/testimonials/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.testimonials.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $testimonial = Testimonial::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/Testimonial/');
                if (!empty($image)) {
                    removeImage("Testimonial/" . $testimonial->image);
                    generateThumbnail('Testimonial', basename($image), 'square', 'large');
                    $testimonial->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $testimonial->status = 1;
            } else {
                $testimonial->status = 0;
            }
            if (!empty($input['featured'])) {
                $testimonial->featured = 1;
            } else {
                $testimonial->featured = 0;
            }
           
            $testimonial->name = $input['name'];
            $testimonial->post = $input['post'];
            $testimonial->message = $input['message'];
           
           

            // pr($input['category']);
            $testimonial->update();
            return redirect('admin/testimonials/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Testimonial::find($id);
        $this->data['enable_editor'] = true;

        return view('admin.testimonials.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $testimonial = Testimonial::find($id);
        removeImage("testimonials/" . $testimonial->image);
        $testimonial->delete();
        return redirect('admin/testimonials/')
            ->with('error', 'Content deleted Successfully');
    }
}
