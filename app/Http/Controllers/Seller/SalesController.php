<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index(){
        $data['sales'] = DB::table('orders')
        ->join('ticket_listings', 'orders.ticket_id', '=', 'ticket_listings.id')
        ->join('users', 'orders.seller_id', '=', 'users.id')
        ->join('child_sub_categories', 'orders.child_sub_cat_id', '=', 'child_sub_categories.id')
        ->join('sections', 'orders.section_id', '=', 'sections.id')
        ->leftJoin('blocks', 'orders.block_id', '=', 'blocks.id')
        ->join('events', 'orders.event_id', '=', 'events.id')
        ->join('venues', 'orders.venue_id', '=', 'venues.id')
        ->select('users.*', 'child_sub_categories.*', 'blocks.*', 'sections.*', 'venues.*', 'events.*', 'ticket_listings.*', 'orders.*')
        ->where('orders.status', 'Paid')
        ->where('orders.seller_id', auth()->user()->id)
        ->orderBy('orders.id', 'DESC')
        ->distinct()
        ->get();
        return view('seller.sales.index',$data);
    }


    public function details($id){
        $d_id = decrypt($id);
        $data['sales'] = DB::table('orders')
        ->join('users','orders.seller_id','orders.seller_id','users.id')
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
        return view('seller.sales.details',$data);
    }
}
