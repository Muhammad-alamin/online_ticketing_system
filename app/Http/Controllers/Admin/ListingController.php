<?php

namespace App\Http\Controllers\Admin;

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
            // ->where('ticket_listings.ticket_count','>=', 1)
            ->orderBy('ticket_listings.id', 'DESC')
            ->get();
        return view('admin.ticketListing.index',$data);
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
        return view('admin.ticketListing.details',$data);
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['tickets'] = DB::table('ticket_listings')->where('ticket_listings.id', $d_id)->first();

        return view('admin.ticketListing.edit',$data);
    }

    public function update(Request $request, $id){

        $d_id = decrypt($id);
        $data = TicketListing::find($d_id);

        $data->status = $request->status;
        $data->save();
        session()->flash('success', 'Your Ticket Update Successfully');

        return redirect()->route('admin.ticket.listing');
    }

    public function delete($id){
        $d_id = decrypt($id);
            $ticket = TicketListing::find($d_id);

            if(!empty($ticket->image)){
                $images = json_decode($ticket->image);
                $path = 'images/selling/tickets/';

                foreach ($images as $eachImage) {
                    unlink($path . $eachImage);
                }
            }

            TicketListing::destroy($d_id);
            session()->flash('success', 'Ticket Deleted Successfully');
            return redirect()->route('admin.ticket.listing');
    }
}
