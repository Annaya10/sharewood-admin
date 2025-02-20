<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member_model;

class Member extends Controller
{

    public function index()
    {
        has_access(17);
        $this->data['rows'] = Member_model::where('mem_type', '1')->orderBy('id', 'ASC')->get();
        return view('admin.boosters', $this->data);
        
    }


    public function users()
    {
        has_access(17);
        $this->data['rows'] = Member_model::where('mem_type', '2')->orderBy('id', 'ASC')->get();
        return view('admin.boosters', $this->data);
    }


    public function edit(Request $request, $id)
    {
        has_access(17);
        $members = Member_model::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();

            if (!empty($input['mem_status'])) {
                $members->mem_status = 1;
            } else {
                $members->mem_status = 0;
            }

            // $members->title = $input['title'];
            $members->mem_fullname = $input['mem_fullname'];
            $members->mem_email = $input['mem_email'];
            $members->mem_verified = $input['mem_verified'];
          



        

            $members->update();

            if($members->mem_type == 1){
                return redirect('admin/manage-boosters/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
               }else{
                return redirect('admin/manage-users/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
               }
          
        }
        $this->data['row'] = Member_model::find($id);
        $this->data['enable_editor'] = true;
        return view('admin.boosters', $this->data);
    }



    public function delete($id)
    {
        has_access(17);
        $members = Member_model::find($id);
        $members->delete();
        if($members->mem_type == 1){
            return redirect('admin/manage-boosters')
            ->with('error', 'Content deleted Successfully');
           }else{
            return redirect('admin/manage-users/edit/')
            ->with('error', 'Content deleted Successfully');
           }
     
    }
}
