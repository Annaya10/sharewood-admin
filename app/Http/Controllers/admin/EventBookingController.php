<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventBooking;


class EventBookingController extends Controller
{
    public function index(){
        has_access(5);
        $this->data['rows']=EventBooking::orderBy('id', 'DESC')->get();
        return view('admin.reservation',$this->data);
    }
    public function view($id){
        has_access(5);
        $contact=EventBooking::find($id);
        $contact->status=1;
        $contact->update();
        $this->data['row']=$contact;
        return view('admin.reservation',$this->data);
    }
    public function delete($id){
        has_access(5);
        $faq = EventBooking::find($id);
        $faq->delete();
        return redirect('admin/reservation/')
                ->with('error','Request deleted Successfully');
    }
}
