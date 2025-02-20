<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tournamnet_model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Tournaments extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Tournamnet_model::orderBy('id', 'DESC')->get();
        
        return view('admin.tournament.index', $this->data);
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
                $image = $request->file('image')->store('public/blog/');
                if (!empty(basename($image))) {
                    generateThumbnail('blog', basename($image), 'square', 'large');
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
                $data['featured'] = 0;
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
            $data['slug'] = checkSlug(Str::slug($data['title'], '-'), 'blog');
            $data['detail'] = $input['detail'];

            $data['blog_date'] = $input['blog_date'];
            $data['e_time'] = $input['e_time'];
            $data['s_time'] = $input['s_time'];

            // pr($data);
            $id = Tournamnet_model::create($data);
            return redirect('admin/tournament/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.tournament.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $tournament = Tournamnet_model::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/tournament/');
                if (!empty($image)) {
                    removeImage("tournament/" . $tournament->image);
                    generateThumbnail('tournament', basename($image), 'square', 'large');
                    $tournament->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $tournament->status = 1;
            } else {
                $tournament->status = 0;
            }
            if (!empty($input['featured'])) {
                $tournament->featured = 1;
            } else {
                $tournament->featured = 0;
            }
            if (!empty($input['popular'])) {
                $tournament->popular = 1;
            } else {
                $tournament->popular = 0;
            }
            $tournament->meta_title = $input['meta_title'];
            $tournament->meta_description = $input['meta_description'];
            $tournament->meta_keywords = $input['meta_keywords'];
            // $tournament->tags=$input['tags'];
            $tournament->title = $input['title'];
            $tournament->slug = checkSlug(Str::slug($tournament->title, '-'), 'blog', $tournament->id);
            $tournament->detail = $input['detail'];
            // pr($tournament->category);
            $tournament->blog_date = $input['blog_date'];
            $tournament->e_time = $input['e_time'];
            $tournament->s_time = $input['s_time'];

            // pr($input['category']);
            $tournament->update();
            return redirect('admin/tournament/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Tournamnet_model::find($id);
        $this->data['enable_editor'] = true;

        return view('admin.tournament.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $tournament = Tournamnet_model::find($id);
        removeImage("tournament/" . $tournament->image);
        $tournament->delete();
        return redirect('admin/tournament/')
            ->with('error', 'Content deleted Successfully');
    }
}
