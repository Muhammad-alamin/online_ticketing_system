<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        $result = DB::table('orders')
            ->select(DB::raw('count(*) as total_orders, status'))
            ->groupBy('status')
            ->get();
        $chartData ="";
        foreach ($result as $list){
            $chartData.="['".$list->status."',     ".$list->total_orders."],";
        }
        $arr['chartData'] = rtrim($chartData,",");

        //monthly report
        $m_o_result = DB::table('orders')
            ->select(DB::raw('count(*) as total_monthly_orders, order_month'))
            ->groupBy('order_month')
            ->get();
        $chartData ="";
        foreach ($m_o_result as $list){
            $chartData.="['".$list->order_month."',     ".$list->total_monthly_orders."],";
        }
        $arr['monthly_orders'] = rtrim($chartData,",");

        //yearly report
        $y_o_result = DB::table('orders')
            ->select(DB::raw('count(*) as total_monthly_orders, order_year'))
            ->groupBy('order_year')
            ->get();
        $chartData ="";
        foreach ($y_o_result as $list){
            $chartData.="['".$list->order_year."',     ".$list->total_monthly_orders."],";
        }
        $arr['yearly_orders'] = rtrim($chartData,",");

        // //today sales
        // $date = date('d/m/Y');
        // $today_sale =  DB::table('orders')
        //     ->where('order_date',$date)
        //     ->where('status','Delivered')
        //     ->sum('grand_total','-','delivery_charge');

        // //today orders
        // $today_orders =  DB::table('orders')
        //     ->where('order_date',$date)
        //     ->where('status','Delivered')
        //     ->count('id');

        // //today customers
        // $today_customers =  DB::table('orders')
        //     ->where('order_date',$date)
        //     ->count('user_id');

        // //today subscription
        // $today_subscription =  DB::table('subscribes')
        //     ->where('date',$date)
        //     ->count('id');

        // //stock out product list
        // $products = DB::table('products')
        //     ->join('categories','products.category_id', 'categories.id')
        //     ->join('users','products.user_id', 'users.id')
        //     ->join('brands','products.brand_id', 'brands.id')
        //     ->where('products.product_quantity','<', '1')
        //     ->select('categories.category_name','users.name','brands.brand_name','products.*')
        //     ->orderBy('products.id','DESC')
        //     ->get();

        //     $notifications = DB::table('notifications')->orderBy('notifications.id','DESC')
        //     ->get();


        return view('admin.dashboard',$arr);
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
