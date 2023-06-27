<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data['contacts'] = Contact::all();
        return view('admin.contact.index',$data);
    }

    public function details($id)
    {
        $d_id = decrypt($id);
        $data['contact_details'] = Contact::where('id',$d_id)->first();
        return view('admin.contact.details',$data);
    }
}
