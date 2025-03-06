<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Team::orderBy('id', 'DESC')->get();
        
        return view('admin.team.index', $this->data);
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
                $image = $request->file('image')->store('public/team/');
                if (!empty(basename($image))) {
                    generateThumbnail('team', basename($image), 'square', 'large');
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
            $data['title'] = $input['title'];
            $data['slug'] = checkSlug(Str::slug($data['title'], '-'), 'team');
            $data['detail'] = $input['detail'];
            $data['content'] = $input['content'];

            

            // pr($data);
            $id = Team::create($data);
            return redirect('admin/team/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.team.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $team = Team::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/team/');
                if (!empty($image)) {
                    removeImage("team/" . $team->image);
                    generateThumbnail('team', basename($image), 'square', 'large');
                    $team->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $team->status = 1;
            } else {
                $team->status = 0;
            }
            if (!empty($input['featured'])) {
                $team->featured = 1;
            } else {
                $team->featured = 0;
            }
           
            $team->meta_title = $input['meta_title'];
            $team->meta_description = $input['meta_description'];
            $team->meta_keywords = $input['meta_keywords'];
            $team->title = $input['title'];
            $team->slug = checkSlug(Str::slug($team->title, '-'), 'team', $team->id);
            $team->detail = $input['detail'];
            $team->content = $input['content'];
           

            // pr($input['category']);
            $team->update();
            return redirect('admin/team/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Team::find($id);
        $this->data['enable_editor'] = true;

        return view('admin.team.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $team = Team::find($id);
        removeImage("team/" . $team->image);
        $team->delete();
        return redirect('admin/team/')
            ->with('error', 'Content deleted Successfully');
    }
}
