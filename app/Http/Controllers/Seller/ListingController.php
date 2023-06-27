<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TicketListing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $request->validate([
            'ticket_count' => 'required',
            'ticket_types' => 'required',
            'ticket_have' => 'required',
            'price' => 'required',
        ]);

        $d_id = decrypt($id);
        $data = TicketListing::find($d_id);

        $data->category_id = $request->category_id;
        $data->sub_cat_id = $request->sub_cat_id;
        $data->child_sub_cat_id = $request->child_sub_cat_id;
        $data->event_id = $request->event_id;
        $data->venue_id = $request->venue_id;
        $data->seller_id = auth()->user()->id;
        $data->ticket_id = time();
        $data->section_id = $request->section;
        $data->block_id = $request->block;
        $data->ticket_count = $request->ticket_count;
        $data->ticket_varient = $request->ticket_varient;
        $data->ticket_types = $request->ticket_types;
        $data->ticket_restriction = json_encode($request->ticket_restriction);
        $data->ticket_have = $request->ticket_have;
        $data->row = $request->row;
        $data->price = $request->price;

        if ($request->ticket_types == 'Paper' || $request->ticket_types == 'Membership') {
            $validator = Validator::make($request->all(), [
                'address' => 'required',
                'zipcode' => 'required',
                'city' => 'required',
                'country' => 'required',
            ]);

            if ($validator->fails()) {
                session()->flash('error', 'Please Input Your Address to collect the ticket.');
                return redirect()->back();
            }

            $data->address_for_collection = $request->address;
            $data->zip_code_for_collection = $request->zipcode;
            $data->city_for_collection = $request->city;
            $data->country_for_collection = $request->country;
        }

        $fetchVenue_id = DB::table('events')
        ->join('venues','events.venue_id', 'venues.id')
        ->select('venues.*','events.*')
        ->where('events.id',$request->event_id)
        ->first();

        $event_date = $fetchVenue_id->match_date_time;

        //current time
        $currentDate = Carbon::now();
        //current time format
        $currentDateformat = $currentDate->format('Y-m-d H:i');
        //database time
        $eventDatedb = Carbon::parse($event_date);
        $formattedEventDate = $eventDatedb ->format('Y-m-d H:i');
        //database time before 2 days
        // $twoDaysBefore = $eventDatedb->copy()->subDays(2);
        //database time before 2 days format
        // $formattedDate = $twoDaysBefore->format('Y-m-d H:i');

        $daysDifference = $currentDate->diffInDays($formattedEventDate);
        // dd($daysDifference,$formattedEventDate,$currentDate);

        if ($daysDifference <= 2) {
            $getProduct = [];
            if ($request->hasFile('image')) {
                $uploadedImages = $request->file('image');
                $imageCount = count($uploadedImages);

                if ($request->ticket_count == $imageCount) {
                    $validatedImages = $request->validate([
                        'image.*' => 'required|mimes:jpg,jpeg,png,webp|max:4096'
                    ]);

                    foreach ($validatedImages['image'] as $eachProduct) {
                        $path = 'images/selling/tickets/';
                        $file_name = rand(0000, 9999) . '-' . $eachProduct->getClientOriginalName();
                        $eachProduct->move($path, $file_name);
                        $getProduct[] = $file_name;
                    }

                    $singleProduct = json_encode($getProduct);

                    $data->image = $singleProduct;

                    // Further logic or actions can be added here for successful image upload
                } else {
                    session()->flash('error', 'Number of uploaded images does not match the ticket count.');
                    // Toastr::error('Number of uploaded images does not match the ticket count.', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            } else {
                session()->flash('error', 'No image files uploaded.');
                // Toastr::error('No image files uploaded.', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        }
        elseif($daysDifference >= 2){

            if ($request->hasFile('image')) {
                $uploadedImages = $request->file('image');
                $imageCount = count($uploadedImages);

                if ($request->ticket_count == $imageCount) {
                    $validatedImages = $request->validate([
                        'image.*' => 'required|mimes:jpg,jpeg,png,webp|max:4096'
                    ]);

                    foreach ($validatedImages['image'] as $eachProduct) {
                        $path = 'images/selling/tickets/';
                        $file_name = rand(0000, 9999) . '-' . $eachProduct->getClientOriginalName();
                        $eachProduct->move($path, $file_name);
                        $getProduct[] = $file_name;
                    }

                    $singleProduct = json_encode($getProduct);

                    $data->image = $singleProduct;

                    // Further logic or actions can be added here for successful image upload
                } else {
                    session()->flash('error', 'Number of uploaded images does not match the ticket count.');
                    // Toastr::error('Number of uploaded images does not match the ticket count.', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            }

        } else {
            session()->flash('error', 'Please upload image. The event is within 2 days.');
            // Toastr::error('Please upload image. The event is within 2 days.', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        $data->save();
        session()->flash('success', 'Your Ticket Update Successfully');

        return redirect()->route('seller.ticket.listing');
    }

    public function delete($id){
        $d_id = decrypt($id);

        $order_ticket = Order::where('ticket_id',$d_id)->get();

        if($order_ticket->count() > 0){
            session()->flash('error', 'You Can Not Delete The Ticket Because Some Ticket already Sold. If you want to Hide rest of the ticket please change the Ticket "Live Mode". Thanks');
            return redirect()->route('seller.ticket.listing');
        }
        else{
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
            return redirect()->route('seller.ticket.listing');
        }

    }

    public function updateLiveMode(Request $request)
    {
        $id = $request->input('id');
        $liveMode = $request->input('live_mode');

        // Debugging statements
        \Log::info('ID: '.$id);
        \Log::info('Live Mode: '.$liveMode);

        $ticket = TicketListing::find($id);
        if ($ticket) {
            $ticket->live_mode = $liveMode;
            $ticket->save();

            \Log::info('Live mode updated successfully');

            return response()->json(['status' => 'success']);
        }

        \Log::info('Error updating live mode: Ticket not found');

        return response()->json(['status' => 'error'], 404);
    }


}
