<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $sellers['sellers'] = User::where('role_as', '=', null)
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.users.index',$sellers);
    }
    public function details($id){
        $d_id = decrypt($id);
        $data['sellers'] = User::where('id',$d_id)->first();
        return view('admin.users.details',$data);
    }


}
