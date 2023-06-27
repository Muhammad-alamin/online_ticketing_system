<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact_us');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'order_id' => 'required',
            'ticket_id' => 'required',
            'phone' => 'required',
        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->order_id = $request->order_id;
        $contact->ticket_id = $request->ticket_id;
        $contact->mobile = $request->phone;
        $contact->description = $request->description;
        $contact->submitting_date = date('d/m/Y');

        $contact->save();
        Toastr::success('Message Send Successfully. Admin contact with you via Email or Phone Number.', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
