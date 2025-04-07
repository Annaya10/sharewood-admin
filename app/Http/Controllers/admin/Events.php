<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Events extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Event::orderBy('id', 'DESC')->get();
        
        return view('admin.event.index', $this->data);
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
                $image = $request->file('image')->store('public/event/');
                if (!empty(basename($image))) {
                    generateThumbnail('event', basename($image), 'square', 'large');
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
            if (!empty($input['popular'])) {
                $data['popular'] = 1;
            } else {
                $data['popular'] = 0;
            }
            $data['meta_title'] = $input['meta_title'];
            $data['meta_description'] = $input['meta_description'];
            $data['meta_keywords'] = $input['meta_keywords'];
            // $data['tags']=$input['tags'];
            $data['title'] = $input['title'];
            $data['slug'] = checkSlug(Str::slug($data['title'], '-'), 'events');
            $data['detail'] = $input['detail'];

            $data['blog_date'] = $input['blog_date'];
            $data['e_time'] = $input['e_time'];
            $data['s_time'] = $input['s_time'];
            $data['location'] = $input['location'];

            // pr($data);
            $id = Event::create($data);
            return redirect('admin/event/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.event.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $event = Event::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/event/');
                if (!empty($image)) {
                    removeImage("event/" . $event->image);
                    generateThumbnail('event', basename($image), 'square', 'large');
                    $event->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $event->status = 1;
            } else {
                $event->status = 0;
            }
            if (!empty($input['featured'])) {
                $event->featured = 1;
            } else {
                $event->featured = 0;
            }
            if (!empty($input['popular'])) {
                $event->popular = 1;
            } else {
                $event->popular = 0;
            }
            $event->meta_title = $input['meta_title'];
            $event->meta_description = $input['meta_description'];
            $event->meta_keywords = $input['meta_keywords'];
            // $event->tags=$input['tags'];
            $event->title = $input['title'];
            $event->slug = checkSlug(Str::slug($event->title, '-'), 'events', $event->id);
            $event->detail = $input['detail'];
            // pr($event->category);
            $event->blog_date = $input['blog_date'];
            $event->e_time = $input['e_time'];
            $event->s_time = $input['s_time'];
            $event->location = $input['location'];

            // pr($input['category']);
            $event->update();
            return redirect('admin/event/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Event::find($id);
        $this->data['enable_editor'] = true;

        return view('admin.event.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $event = Event::find($id);
        removeImage("event/" . $event->image);
        $event->delete();
        return redirect('admin/event/')
            ->with('error', 'Content deleted Successfully');
    }

}
