<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorProfit;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function index(){
        $sellers['sellers'] = User::where('role_as', '=', null)->get();

        foreach($sellers['sellers'] as $key=>$seller){
            $vendor_profits = DB::table('vendor_profits')
            ->join('users','vendor_profits.seller_id', 'users.id')
            ->select('users.*','vendor_profits.*')
            ->where('seller_id',$seller->id)
            ->where('vendor_profits.status','Paid')
            ->sum('profit_amount');

            $withdraw_amount = DB::table('withdraws')
            ->join('users','withdraws.seller_id', 'users.id')
            ->select('users.*','withdraws.*')
            ->where('seller_id',$seller->id)
            ->where('withdraws.status','=','Complete')
            ->sum('withdraw_amount');

            $sellers['sellers'][$key]->name = $seller->name;
            $sellers['sellers'][$key]->id = $seller->id;
            $sellers['sellers'][$key]->payable_balance = $vendor_profits - $withdraw_amount;
        }

        return view('admin.withdraw.index',$sellers);
    }

    public function pay($id)
    {
        $d_id = decrypt($id);

        $data['users'] = User::where('id',$d_id)->first();

        $vendor_profits = DB::table('vendor_profits')
            ->join('users','vendor_profits.seller_id', 'users.id')
            ->select('users.*','vendor_profits.*')
            ->where('seller_id',$data['users']->id)
            ->where('vendor_profits.status','Paid')
            ->sum('profit_amount');

            $withdraw_amount = DB::table('withdraws')
            ->join('users','withdraws.seller_id', 'users.id')
            ->select('users.*','withdraws.*')
            ->where('seller_id',$data['users']->id)
            ->where('withdraws.status','=','Complete')
            ->sum('withdraw_amount');

            $bankInfo['bankInfo'] = DB::table('bank_infos')
            ->join('users','bank_infos.seller_id', 'users.id')
            ->select('users.*','bank_infos.*')
            ->where('bank_infos.seller_id',$data['users']->id)
            ->first();

            $data['users']->name = $data['users']->name;
            $data['users']->id = $data['users']->id;
            $data['users']->availabe_balance = $vendor_profits - $withdraw_amount;
            $data['users']->total_income = $vendor_profits;
            $data['users']->withdraw_balance = $withdraw_amount;

        return view('admin.withdraw.edit',$data,$bankInfo);
    }


    public function store(Request $request){

        $withdraw_info = new Withdraw();

        $withdraw_info->seller_id = $request->seller_id;
        $withdraw_info->bank_info_id = $request->bank_info_id;
        $withdraw_info->withdraw_amount = $request->amount;
        $withdraw_info->transaction_id = $request->transaction_id;
        $withdraw_info->complete_date = $request->complete_date;
        $withdraw_info->status = $request->status;
        $withdraw_info->save();

        session()->flash('success', 'Payment Successfully');
        return redirect()->route('admin.successfulPayment.list');


    }

    public function successfulPaymentList(){
        $data ['withdraws'] = DB::table('withdraws')
        ->join('bank_infos','withdraws.bank_info_id','bank_infos.id')
        ->join('users','withdraws.seller_id', 'users.id')
        ->select('bank_infos.*','users.*','withdraws.*')
        ->orderBy('withdraws.id', 'DESC')
        ->get();

        return view('admin.withdraw.successfulPaymentList',$data);
    }

    public function withdrawUpdate(Request $request ,$id){

        $d_id = decrypt($id);

        $withdraw_info = Withdraw::find($d_id);
        $withdraw_info->transaction_id = $request->transaction_id;
        $withdraw_info->complete_date = $request->complete_date;
        $withdraw_info->admin_message = $request->admin_message;
        $withdraw_info->status = $request->status;
        $withdraw_info->save();

        session()->flash('success', 'Withdraw Request Approved Successfully');
        return redirect()->route('withdraw.index');


    }

    public function successfulPaymentDetails($id){
        $d_id = decrypt($id);

        $data ['withdrawRequest'] = DB::table('withdraws')
        ->join('bank_infos','withdraws.bank_info_id','bank_infos.id')
        ->join('users','withdraws.seller_id', 'users.id')
        ->select('bank_infos.*','users.*','withdraws.*')
        ->where('withdraws.id',$d_id)->first();

        return view('admin.withdraw.successfulPaymentDetails',$data);
    }
}
