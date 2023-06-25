<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function details(){
        $data ['users'] = User::where('id',auth()->user()->id)->first();
        return view('seller.usersAccount.edit',$data);
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->demo_id == 1) {
            Toastr::error('Demo account are not change anything!', 'error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        else
        {
            $d_id = decrypt($id);
            $request->validate([
                'name' => 'required|max:20',
                'email' => 'required|unique:users,email,'.$d_id,
                'mobile' => 'required|unique:users,mobile,'.$d_id,
            ]);

            $data = User::find($d_id);
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->email = $request->email;
            $data->address = $request->address;
            $data->country = $request->country;
            $data->city = $request->city;
            $data->zip = $request->zip;

            $db_pass = auth()->user()->password;
            $old_pass = $request->cur_password;
            $new_pass = $request->new_password;
            $confirm_pass = $request->conf_password;
            if(!empty($old_pass)){
                if (Hash::check($old_pass, $db_pass)){
                    if ($new_pass == $confirm_pass){
                        $data->update([
                            'password' => Hash::make($request->new_password)
                        ]);
                        auth()->logout();
                        return redirect()->route('login');
                    }
                    else{
                        Toastr::error('New password and confirm password does not match', 'error', ["positionClass" => "toast-top-right"]);
                        return redirect()->back();
                    }

                }
                else{
                    Toastr::error('Old password not match', 'error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            }
            $data->save();
            Toastr::success('Information updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

}
