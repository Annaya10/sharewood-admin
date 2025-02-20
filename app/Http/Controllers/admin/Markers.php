<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Markers_model;
use App\Models\Center_categories_model;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Markers extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Markers_model::orderBy('id', 'DESC')->get();
        // foreach ($this->data['rows'] as $row) {
        //     $row->center_cat = $row->category_row->center_cat;
        // }

        return view('admin.markers.index', $this->data);
    }
    public function add(Request $request)
    {
        has_access(17);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();

            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }


            $data['name'] = $input['name'];
            $data['top'] = $input['top'];
            $data['left'] = $input['left'];
            $data['city_name'] = $input['city_name'];
            $data['office_name'] = $input['office_name'];
            $data['category'] = $input['category'];





            // pr($data);
            $id = Markers_model::create($data);
            return redirect('admin/markers/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        $this->data['categories'] = Center_categories_model::where('status', 1)->get();
        return view('admin.markers.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $markers = Markers_model::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();

            if (!empty($input['status'])) {
                $markers->status = 1;
            } else {
                $markers->status = 0;
            }

            // $markers->title = $input['title'];
            $markers->name = $input['name'];
            $markers->top = $input['top'];
            $markers->left = $input['left'];
            $markers->city_name = $input['city_name'];
            $markers->office_name = $input['office_name'];
            $markers->category = $input['category'];





            // pr($markers->top);
            $markers->update();
            // pr($markers);
            return redirect('admin/markers/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Markers_model::find($id);
        $this->data['enable_editor'] = true;
        $this->data['categories'] = Center_categories_model::where('status', 1)->get();
        return view('admin.markers.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $markers = Markers_model::find($id);
        // removeImage("markers/" . $markers->image);
        $markers->delete();
        return redirect('admin/markers/')
            ->with('error', 'Content deleted Successfully');
    }
}
