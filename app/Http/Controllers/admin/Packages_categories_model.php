<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages_categories;
use Illuminate\Support\Str;


class Packages_categories_model extends Controller
{
    public function index(){
        has_access(18);
        $this->data['rows']=Packages_categories::orderBy('id', 'DESC')->get();
        return view('admin.packages.category',$this->data);
    }
    public function add(Request $request){
        has_access(18);
        $input = $request->all();
        if($input){
            $data=array();
            if(!empty($input['status'])){
                $data['status']=1;
            }
            else{
                $data['status']=0;
            }
            $data['name']=$input['name'];
            $data['slug'] = checkSlug(Str::slug($data['name'], '-'),'packages_categories');
            // pr($data);
            $id = Packages_categories::create($data);
            return redirect('admin/package_categories')
                ->with('success','Content Updated Successfully');
        }

        return view('admin.packages.category',$this->data);
    }
    public function edit(Request $request, $id){
        has_access(18);
        $category=Packages_categories::find($id);
        $input = $request->all();
        if($input){
            $data=array();
            // pr($input['status']);
            if(!empty($input['status'])){
                $category->status=1;
            }
            else{
                $category->status=0;
            }
            $category->name=$input['name'];
            $category->slug = checkSlug(Str::slug($category->name, '-'),'packages_categories',$category->id);

            // pr($category);
            $category->update();
            return redirect('admin/package_categories/edit/'.$request->segment(4))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Packages_categories::find($id);
        return view('admin.packages.category',$this->data);
    }
    public function delete($id){
        has_access(18);
        $category = Packages_categories::find($id);
        $category->delete();
        return redirect('admin/package_categories')
                ->with('error','Content deleted Successfully');
    }
}
