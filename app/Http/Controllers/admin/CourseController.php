<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Course::orderBy('id', 'DESC')->get();
        
        return view('admin.course.index', $this->data);
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
                $image = $request->file('image')->store('public/course/');
                if (!empty(basename($image))) {
                    generateThumbnail('course', basename($image), 'square', 'large');
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
           
            $data['meta_title'] = $input['meta_title'];
            $data['meta_description'] = $input['meta_description'];
            $data['meta_keywords'] = $input['meta_keywords'];
            // $data['tags']=$input['tags'];
            $data['title'] = $input['title'];
            $data['slug'] = checkSlug(Str::slug($data['title'], '-'), 'courses');
            $data['detail'] = $input['detail'];

          

            $id = Course::create($data);
            return redirect('admin/course/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.course.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $course = Course::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/course/');
                if (!empty($image)) {
                    removeImage("course/" . $course->image);
                    generateThumbnail('course', basename($image), 'square', 'large');
                    $course->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $course->status = 1;
            } else {
                $course->status = 0;
            }
            if (!empty($input['featured'])) {
                $course->featured = 1;
            } else {
                $course->featured = 0;
            }

            $course->meta_title = $input['meta_title'];
            $course->meta_description = $input['meta_description'];
            $course->meta_keywords = $input['meta_keywords'];
            // $course->tags=$input['tags'];
            $course->title = $input['title'];
            $course->slug = checkSlug(Str::slug($course->title, '-'), 'courses', $course->id);
            $course->detail = $input['detail'];
        

            // pr($input['category']);
            $course->update();
            return redirect('admin/course/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Course::find($id);
        $this->data['enable_editor'] = true;

        return view('admin.course.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $course = Course::find($id);
        removeImage("course/" . $course->image);
        $course->delete();
        return redirect('admin/course/')
            ->with('error', 'Content deleted Successfully');
    }
}
