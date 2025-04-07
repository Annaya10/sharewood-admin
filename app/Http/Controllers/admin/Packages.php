<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Packages_model;
use App\Models\Packages_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class Packages extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Packages_model::orderBy('id', 'DESC')->get();
        
        return view('admin.packages.index', $this->data);
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
                $image = $request->file('image')->store('public/packages/');
                if (!empty(basename($image))) {
                    generateThumbnail('packages', basename($image), 'square', 'large');
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
            
            // $data['meta_title'] = $input['meta_title'];
            // $data['meta_description'] = $input['meta_description'];
            // $data['meta_keywords'] = $input['meta_keywords'];
            // $data['tags']=$input['tags'];
            $data['title'] = $input['title'];
            $data['slug'] = checkSlug(Str::slug($data['title'], '-'), 'packages');
            $data['detail'] = $input['detail'];

            $data['short_detail'] = $input['short_detail'];
            $data['duration'] = $input['duration'];
            $data['fee_duration'] = $input['fee_duration'];
            $data['type'] = $input['type'];
            $data['category'] = $input['category'];

            // pr($data);
            $id = Packages_model::create($data);
            return redirect('admin/packages/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        $this->data['categories'] = Packages_categories::where('status', 1)->get();
        return view('admin.packages.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $packages = Packages_model::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/packages/');
                if (!empty($image)) {
                    removeImage("packages/" . $packages->image);
                    generateThumbnail('packages', basename($image), 'square', 'large');
                    $packages->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $packages->status = 1;
            } else {
                $packages->status = 0;
            }
            if (!empty($input['featured'])) {
                $packages->featured = 1;
            } else {
                $packages->featured = 0;
            }
            
            // $packages->meta_title = $input['meta_title'];
            // $packages->meta_description = $input['meta_description'];
            // $packages->meta_keywords = $input['meta_keywords'];
            // $packages->tags=$input['tags'];
            $packages->title = $input['title'];
            $packages->slug = checkSlug(Str::slug($packages->title, '-'), 'packages', $packages->id);
            $packages->detail = $input['detail'];
            // pr($packages->category);
            $packages->category = $input['category'];
            $packages->short_detail = $input['short_detail'];
            $packages->duration = $input['duration'];
            $packages->type = $input['type'];
            $packages->fee_duration = $input['fee_duration'];

            // pr($input['category']);
            $packages->update();
            return redirect('admin/packages/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Packages_model::find($id);
        $this->data['enable_editor'] = true;
        $this->data['categories'] = Packages_categories::where('status', 1)->get();


        return view('admin.packages.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $packages = Packages_model::find($id);
        removeImage("packages/" . $packages->image);
        $packages->delete();
        return redirect('admin/packages/')
            ->with('error', 'Content deleted Successfully');
    }
}
