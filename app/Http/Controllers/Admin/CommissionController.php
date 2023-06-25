<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index(){
        $data ['commissions'] = Commission::first();
        return view('admin.commissions.create',$data);
    }

    public function store(Request $request)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.category.index');
        }
        else
        {
            $request->validate([
                'percentage' => 'required',
            ]);

            $commission = new Commission();

            $commission->percentage = $request->percentage;


            $commission->save();
            session()->flash('success', 'Commission Added Successfully');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.category.index');
        }
        else
        {
            $d_id = decrypt($id);
            $request->validate([
                'percentage' => 'required',
            ]);

            $commission = Commission::find($d_id);
            $commission->percentage = $request->percentage;


            $commission->save();
            session()->flash('success', 'Commission Updated Successfully');
            return redirect()->back();
        }
    }
}
