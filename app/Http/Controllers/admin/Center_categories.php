<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Center_categories_model;
use App\Http\Controllers\Controller;

class Center_categories extends Controller
{

    public function index()
    {
        has_access(18);
        $this->data['rows'] = Center_categories_model::orderBy('id', 'DESC')->get();
        return view('admin.markers.center_categories', $this->data);
    }
    public function add(Request $request)
    {
        has_access(18);
        $input = $request->all();
        if ($input) {
            $data = array();
            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
            $data['center_cat'] = $input['center_cat'];
            $data['slug'] = checkSlug(Str::slug($data['center_cat'], '-'), 'center_categories');
            // pr($data);
            $id = Center_categories_model::create($data);
            return redirect('admin/center_categories/')
                ->with('success', 'Content Updated Successfully');
        }

        return view('admin.markers.center_categories', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(18);
        $category = Center_categories_model::find($id);
        $input = $request->all();
        if ($input) {
            $data = array();
            // pr($input['status']);
            if (!empty($input['status'])) {
                $category->status = 1;
            } else {
                $category->status = 0;
            }
            $category->center_cat = $input['center_cat'];
            $category->slug = checkSlug(Str::slug($category->center_cat, '-'), 'center_categories', $category->id);

            // pr($category);
            $category->update();
            return redirect('admin/center_categories/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Center_categories_model::find($id);
        return view('admin.markers.center_categories', $this->data);
    }
    public function delete($id)
    {
        has_access(18);
        $category = Center_categories_model::find($id);
        $category->delete();
        return redirect('admin/center_categories/')
            ->with('error', 'Content deleted Successfully');
    }
}
