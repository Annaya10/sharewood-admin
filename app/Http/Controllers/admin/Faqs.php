<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq_model;
use Illuminate\Support\Str;

class Faqs extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Faq_model::orderBy('id', 'DESC')->get();
        
        return view('admin.faqs.index', $this->data);
    }
    public function add(Request $request)
    {
        has_access(17);
        $input = $request->all();
        if ($input) {
            $data = array();
          
            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
          
            $data['question'] = $input['question'];
            $data['answer'] = $input['answer'];
            $data['slug'] = checkSlug(Str::slug($data['question'], '-'), 'faqs');
          

            // pr($data);
            $id = Faq_model::create($data);
            return redirect('admin/faqs/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.faqs.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $Faq_model = Faq_model::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
           
            if (!empty($input['status'])) {
                $Faq_model->status = 1;
            } else {
                $Faq_model->status = 0;
            }
           
           
            $Faq_model->question = $input['question'];
            $Faq_model->slug = checkSlug(Str::slug($Faq_model->question, '-'), 'faqs', $Faq_model->id);
            $Faq_model->answer = $input['answer'];
          

            // pr($input['category']);
            $Faq_model->update();
            return redirect('admin/faqs/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Faq_model::find($id);
        $this->data['enable_editor'] = true;

        return view('admin.faqs.index', $this->data);
    }
    public function delete($id)
    {
        has_access(17);
        $Faq_model = Faq_model::find($id);
        $Faq_model->delete();
        return redirect('admin/faqs/')
            ->with('error', 'Content deleted Successfully');
    }
}
