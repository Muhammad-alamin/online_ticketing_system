<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\VendorProfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $data['orders'] = DB::table('orders')
        ->join('ticket_listings', 'orders.ticket_id', '=', 'ticket_listings.id')
        ->join('users', 'orders.customer_id', '=', 'users.id')
        ->join('child_sub_categories', 'orders.child_sub_cat_id', '=', 'child_sub_categories.id')
        ->join('sections', 'orders.section_id', '=', 'sections.id')
        ->leftJoin('blocks', 'orders.block_id', '=', 'blocks.id')
        ->join('events', 'orders.event_id', '=', 'events.id')
        ->join('venues', 'orders.venue_id', '=', 'venues.id')
        ->select('users.*', 'child_sub_categories.*', 'blocks.*', 'sections.*', 'venues.*', 'events.*', 'ticket_listings.*', 'orders.*')
        ->where(function ($query) {
            $query->where('orders.status', 'Paid')->orWhere('orders.status', 'Cancel');
        })
        ->orderBy('orders.id', 'DESC')
        ->distinct()
        ->get();
        return view('admin.orders.index',$data);
    }
    public function details($id){
        $d_id = decrypt($id);
        $data['orders'] = DB::table('orders')
        ->join('users','orders.customer_id','orders.seller_id','users.id')
        ->join('ticket_listings','orders.ticket_id', 'ticket_listings.id')
        ->join('child_sub_categories','orders.child_sub_cat_id', 'child_sub_categories.id')
        ->join('sections','orders.section_id', 'sections.id')
        ->leftJoin('blocks','orders.block_id', 'blocks.id')
        ->join('events','orders.event_id', 'events.id')
        ->join('venues','orders.venue_id', 'venues.id')
        ->select('users.*','ticket_listings.*','child_sub_categories.*','blocks.*','sections.*','venues.*','events.*','ticket_listings.*','orders.*')
        ->where('orders.id',$d_id)
        ->orderBy('orders.id', 'DESC')
        ->first();
        return view('admin.orders.details',$data);
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['orders'] = DB::table('orders')->where('orders.id', $d_id)->first();

        return view('admin.orders.edit',$data);
    }

    public function update(Request $request, $id){

        $d_id = decrypt($id);
        $data = Order::find($d_id);

        $data->status = $request->status;
        $data->save();

        $vebdor_profit = VendorProfit::where('order_id',$d_id)->first();

        $vebdor_profit->status = $request->status;
        $vebdor_profit->save();
        session()->flash('success', 'Your Order Update Successfully');

        return redirect()->route('admin.order.listing');
    }

    public function delete($id){
        $d_id = decrypt($id);
            $order = Order::find($d_id);

            if(!empty($order->ticket_image)){
                $images = json_decode($order->ticket_image);
                $path = 'images/selling/tickets/';

                foreach ($images as $eachImage) {
                    unlink($path . $eachImage);
                }
            }

            Order::destroy($d_id);
            session()->flash('success', 'Order Deleted Successfully');
            return redirect()->route('admin.order.listing');
    }
}
