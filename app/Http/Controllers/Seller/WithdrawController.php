<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\BankInfo;
use App\Models\VendorProfit;
use App\Models\Withdraw;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function info(){
        $data ['total_earning'] = VendorProfit::where('seller_id',auth()->user()->id)->where('status','Paid')->sum('profit_amount');
        $data ['total_withdraw'] = Withdraw::where('seller_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data['account_info'] = BankInfo::where('seller_id',auth()->user()->id)->first();
        return view('seller.pay_out.view',$data);
    }

    public function store(Request $request){

        $bank_info = new BankInfo();
           $bank_info->seller_id = auth()->user()->id;
           $bank_info->bank_name = $request->bank_name;
           $bank_info->branch_name = $request->branch_name;
           $bank_info->account_number = $request->account_number;
           $bank_info->account_holder_name = $request->account_holder_name;
           $bank_info->routing_number = $request->routing_number;
           $bank_info->card_number = $request->card_number;
           $bank_info->description = $request->description;
           $bank_info->save();

           Toastr::success('Information updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
           return redirect()->back();
    }

    public function edit($id)
    {
        $d_id = decrypt($id);
        $data ['total_earning'] = VendorProfit::where('seller_id',auth()->user()->id)->where('status','Paid')->sum('profit_amount');
        $data ['total_withdraw'] = Withdraw::where('seller_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data['account_info']= BankInfo::find($d_id);
        return view('seller.pay_out.edit',$data);
    }

    public function update(Request $request, $id){

        $d_id = decrypt($id);
        $bank_info = BankInfo::find($d_id);
           $bank_info->seller_id = auth()->user()->id;
           $bank_info->bank_name = $request->bank_name;
           $bank_info->branch_name = $request->branch_name;
           $bank_info->account_number = $request->account_number;
           $bank_info->account_holder_name = $request->account_holder_name;
           $bank_info->routing_number = $request->routing_number;
           $bank_info->card_number = $request->card_number;
           $bank_info->description = $request->description;
           $bank_info->save();

           session()->flash('success', 'Account Info Updated Successfully');
           return redirect()->route('seller.payout.info');
    }


}
