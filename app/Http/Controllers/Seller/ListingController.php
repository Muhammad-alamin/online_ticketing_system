<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\TicketListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    public function index(){
        $data['tickets'] = DB::table('ticket_listings')
            ->join('sections','ticket_listings.section_id', 'sections.id')
            ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
            ->join('events','ticket_listings.event_id', 'events.id')
            ->join('venues','ticket_listings.venue_id', 'venues.id')
            ->select('blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
            ->where('ticket_listings.status','Active')->where('ticket_listings.ticket_count','>=', 1)
            ->where('ticket_listings.seller_id',auth()->user()->id)
            ->orderBy('ticket_listings.id', 'DESC')
            ->get();
        return view('seller.ticketListing.index',$data);
    }
    public function details($id){
        $d_id = decrypt($id);
        $data['tickets'] = DB::table('ticket_listings')
            ->join('sections','ticket_listings.section_id', 'sections.id')
            ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
            ->join('events','ticket_listings.event_id', 'events.id')
            ->join('venues','ticket_listings.venue_id', 'venues.id')
            ->select('blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
            ->where('ticket_listings.id',$d_id)
            ->orderBy('ticket_listings.id', 'DESC')
            ->first();
        return view('seller.ticketListing.details',$data);
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['tickets'] = DB::table('ticket_listings')
            ->join('categories','ticket_listings.category_id', 'categories.id')
            ->join('parent_sub_categories','ticket_listings.sub_cat_id', 'parent_sub_categories.id')
            ->join('child_sub_categories','ticket_listings.child_sub_cat_id', 'child_sub_categories.id')
            ->join('sections','ticket_listings.section_id', 'sections.id')
            ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
            ->join('events','ticket_listings.event_id', 'events.id')
            ->join('venues','ticket_listings.venue_id', 'venues.id')
            ->select('categories.*','parent_sub_categories.*','child_sub_categories.*','blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
            ->where('ticket_listings.id', $d_id)
            ->first();
            $data['sections'] = DB::table('sections')->get();
            $data['blocks'] = DB::table('blocks')->where('section_id',$data['tickets']->section_id)->get();
            return view('seller.ticketListing.edit',$data);
    }

    public function update(Request $request, $id){
        $d_id = decrypt($id);
        dd($request);

        return redirect()->route('seller.ticket.listing');
    }

    public function delete($id){
        $d_id = decrypt($id);
            $ticket = TicketListing::find($d_id);

            $images = json_decode($ticket->image);
                $path = 'images/selling/tickets/';

                foreach ($images as $eachImage) {
                    unlink($path . $eachImage);
                }

            TicketListing::destroy($d_id);
            session()->flash('success', 'Ticket Deleted Successfully');
            return redirect()->route('seller.ticket.listing');
    }

}
