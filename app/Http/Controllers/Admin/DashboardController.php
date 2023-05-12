<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }

    public function viewProfile(){
        $profileInformation = User::where('id',auth()->user()->id)->first();
        return view('admin.profileInformation.view',compact('profileInformation'));
    }

    public function viewProfileImage(){
        $profileInformation = User::where('id',auth()->user()->id)->first();
        return view('admin.profileInformation.image');
    }

    public function editProInfo($id){
        $decrypt_id = decrypt($id);
        $data ['user'] = User::where('id',$decrypt_id)->first();
        return view('admin.profileInformation.editProfile' ,$data);
    }

    public function updateProInfo(Request $request, $id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.view.profile');
        }
        else
        {
            $decrypt_id = decrypt($id);
            $request->validate([
                'name' => 'required',
                'country' => 'required',
                'city' => 'required',
                'email' => 'required|unique:users,email,'.$decrypt_id,
                'mobile' => 'required|unique:users,mobile,'.$decrypt_id,
                'password' => 'confirmed'
            ]);

            $user = User::findOrFail($decrypt_id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip = $request->zip;
//        $user->role_as = $request->role_as;
            $user->nid = $request->nid;
            $user->status = $request->status;
            if ($request->has('password') && $request->password != null ){

                $user->password = Hash::make($request->password);
            }
            $user->save();
            session()->flash('success', 'Update Information Successfully');
            return redirect()->route('admin.view.profile');
        }
    }

    public function proImageStore(Request $request){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.view.profile');
        }
        else
        {
            $request->validate([
                'image' => 'mimes:jpeg,png',
            ]);

            $auth_id = auth()->user()->id;
            $user = User::findOrFail($auth_id);

            if ($request->hasFile('image')){

                $path = 'images/profile/';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                // Image::make($img)->resize(100, 100)->save(public_path('images/profile/').$file_name);
                $img->move($path,$file_name);

                $user->avatar = $file_name;

            }
            $user->save();
            session()->flash('success', 'Upload Image Successfully');
            return redirect()->route('admin.view.profile');
        }
    }
}