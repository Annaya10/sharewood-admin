<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponser;

class Sponsership extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Sponser::orderBy('id', 'ASC')->get();
        return view('admin.sponsership.index', $this->data);
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
                $image = $request->file('image')->store('public/sponsership/');
                if (!empty(basename($image))) {
                    generateThumbnail('sponsership', basename($image), 'square', 'large');
                    $data['image'] = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }

            if (!empty($input['featured'])) {
                $data['is_featured'] = 1;
            } else {
                $data['is_featured'] = 0;
            }


            $data['title'] = $input['title'];
         
     

            $id = Sponser::create($data);
            return redirect('admin/sponsership/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.sponsership.index', $this->data);
    }


    
    public function edit(Request $request, $id)
    {
        has_access(17);
        $Games = Sponser::find($id);
        $input = $request->all();
        if ($input) {

            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/sponsership/');
                if (!empty($image)) {
                    removeImage("sponsership/" . $Games->image);
                    generateThumbnail('sponsership', basename($image), 'square', 'large');
                    $Games->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $Games->status = 1;
            } else {
                $Games->status = 0;
            }

            if (!empty($input['featured'])) {
                $Games->is_featured = 1;
            } else {
                $Games->is_featured = 0;
            }

            $Games->title = $input['title'];
         
        
            

            // pr($input['category']);
            $Games->update();
            return redirect('admin/sponsership/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Sponser::find($id);
        $this->data['enable_editor'] = true;
        // $this->data['categories'] = Games_categories_model::where('status', 1)->get();

        return view('admin.sponsership.index', $this->data);
    }


    

    public function orderAll(Request $request)
    {
        $rows = Sponser::all();
        foreach ($rows as $row) {
            $orderId = $request->input('orderid' . $row->id);
            $type = $request->input('type' . $row->id);
            if ($orderId !== null) {
                $row->order_no = $orderId;
                $row->save();
            }
        }

        return redirect('admin/sponsership/' . $type)
            ->with('success', 'Order updated Successfully');
    }

    public function delete($id)
    {
        has_access(17);
        $Games = Sponser::find($id);
        removeImage("sponsership/" . $Games->image);
        $Games->delete();
        return redirect('admin/sponsership/')
            ->with('error', 'Content deleted Successfully');
    }
}
