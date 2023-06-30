<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ZipArchive;


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
        ->where('orders.status', 'Paid')
        ->where('orders.customer_id', auth()->user()->id)
        ->orderBy('orders.id', 'DESC')
        ->distinct()
        ->get();
        return view('seller.orders.index',$data);
    }

    public function downloadImages($id)
    {
        $d_id = decrypt($id);

        // Retrieve the image filenames from the database
        $order_details = Order::where('id',$d_id)->first();
        if(!empty($order_details->ticket_image)){
            $imageFilenames = json_decode($order_details->ticket_image);

        // Zip the images into a temporary file
        $zipFile = tempnam(sys_get_temp_dir(), 'images');
        $zip = new \ZipArchive();
        $zip->open($zipFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($imageFilenames as $filename) {
            // Get the path to the image file
            $imagePath = public_path('images/selling/tickets/' . $filename);

            // Add the image file to the zip archive
            $zip->addFile($imagePath, $filename);
        }

        $zip->close();

        // Set the appropriate headers for the download
        return response()->download($zipFile, 'Ticket-image.zip')->deleteFileAfterSend();
        }
        else{
            session()->flash('error', 'Seller are not added the ticket Image. Please contact the Customer Support. Thanks');
            return redirect()->route('seller.orders');
        }

    }

    public function details($id){
        $d_id = decrypt($id);
        $data['orders'] = DB::table('orders')
        ->join('users','orders.customer_id','users.id')
        ->join('ticket_listings','orders.ticket_id', 'ticket_listings.id')
        ->join('child_sub_categories','orders.child_sub_cat_id', 'child_sub_categories.id')
        ->join('sections','orders.section_id', 'sections.id')
        ->leftJoin('blocks','orders.block_id', 'blocks.id')
        ->join('events','orders.event_id', 'events.id')
        ->join('venues','orders.venue_id', 'venues.id')
        ->select('users.*','ticket_listings.*','child_sub_categories.*','blocks.*','sections.*','venues.*','events.*','ticket_listings.*','orders.*')
        ->where('orders.id',$d_id)
        ->first();
        return view('seller.orders.details',$data);
    }
}
