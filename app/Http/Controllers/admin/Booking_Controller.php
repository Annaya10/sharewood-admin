<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class Booking_Controller extends Controller
{
    public function index(){
        has_access(5);
        $this->data['rows']=Booking::orderBy('id', 'DESC')->get();
        return view('admin.booking',$this->data);
    }
    public function view($id){
        has_access(5);
        $contact=Booking::find($id);
        $contact->status=1;
        $contact->update();
        $this->data['row']=$contact;
        return view('admin.booking',$this->data);
    }
    public function delete($id){
        has_access(5);
        $faq = Booking::find($id);
        $faq->delete();
        return redirect('admin/booking/')
                ->with('error','Request deleted Successfully');
    }
}
