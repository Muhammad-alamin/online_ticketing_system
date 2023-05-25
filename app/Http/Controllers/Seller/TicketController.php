<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\ChildSubCategory;
use App\Models\Event;
use App\Models\Section;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(){
        return  view('seller.ticket');
    }

    public function search(Request $request){

        if($request->ajax()){
            $right_time = Carbon::now()->format('Y/m/d H:i:s');
            $data=Event::where('match_name','like','%'.$request->search.'%')
            // ->where('location','like','%'.$request->search.'%')
            ->where('match_date_time','>=',$right_time)
            ->get();

            $output='';
            if(count($data)>0){
                $output ='
                    <table class="styled-table">
                    <thead>
                    <tr>
                        <th scope="col" style="font-size: 15px;">Event</th>
                    </tr>
                    </thead>
                    <tbody>';
                        foreach($data as $row){
                            $d_id = encrypt($row->id);
                            $output .='
                            <tr>
                            <td style="padding:20px; font-size: 15px; font-weight:bold; border: none">
                                <a href="/add/ticket/'.$d_id.'">
                                    <div class="full-event-info">
                                        <div class="full-event-info-header">
                                            <h4>'.$row->match_name.'</h4>
                                            <br>
                                            <div class="clearfix"></div>
                                            <span class="event-date-info">'.date('d-F-Y H:i', strtotime($row->match_date_time)).'</span>
                                            <span class="event-venue-info">'.$row->location.'</span>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            ';
                        }
                $output .= '
                    </tbody>
                    </table>
                    ';
            }
            // else{
            //     $output .='No results';
            // }
            return $output;
        }
    }

    public function addTicket(Request $request , $id){

        $d_id = decrypt($id);
        $event = DB::table('events')->where('id',$d_id)->first();
        $event_date = $event->match_date_time;

        //current time
        $currentDate = Carbon::now();
        //current time format
        $currentDateformat = $currentDate->format('Y-m-d H:i');
        //database time
        $eventDatedb = Carbon::parse($event_date);
        //database time before 2 days
        $twoDaysBefore = $eventDatedb->copy()->subDays(2);
        //database time before 2 days format
        $formattedDate = $twoDaysBefore->format('Y-m-d H:i');

        if ($currentDateformat >= $formattedDate) {

            $data['event'] = DB::table('events')
            ->join('child_sub_categories','events.child_sub_cat_id', 'child_sub_categories.id')
            ->select('child_sub_categories.child_sub_cat_name','events.*')
            ->where('events.id',$d_id)
            ->first();
            return view('Seller.notEligibleListingTicket',$data);
        } else {

            $data['event'] = DB::table('events')
            ->join('child_sub_categories','events.child_sub_cat_id', 'child_sub_categories.id')
            ->select('child_sub_categories.child_sub_cat_name','events.*')
            ->where('events.id',$d_id)
            ->first();

            $data['section'] = Section::where('event_id',$data['event']->id)->get();
            return view('Seller.addTicket',$data);
        }

    }

    public function getChildSubCat($id){
        $block = Block::where('section_id',$id)->get();
        return response()->json($block);
    }

    public function store(Request $request){

        $request->validate([
            'ticket_count' => 'required',
            'ticket_types' => 'required',
            'ticket_have' => 'required',
            'price' => 'required',
        ]);

        $data = array();

        $data['category_id'] = $request->category_id;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['child_sub_cat_id'] = $request->child_sub_cat_id;
        $data['event_id'] = $request->event_id;
        $data['seller_id'] = auth()->user()->id;
        $data['section_id'] = $request->section;
        $data['block_id'] = $request->block;
        $data['ticket_count'] = $request->ticket_count;
        $data['ticket_varient'] = $request->ticket_varient;
        $data['ticket_types'] = $request->ticket_types;
        $data['ticket_restriction'] = json_encode($request->ticket_restriction);
        $data['ticket_have'] = $request->ticket_have;
        $data['row'] = $request->row;
        $data['price'] = $request->price;

        $getProduct=[];
        if($request->hasFile('image'))
        {

            $products = $request->file('image');

            foreach ( $products as $eachProduct) {
                $path = 'images/selling/tickets/';
                $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                $eachProduct->move($path,$file_name);
                //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);

                $getProduct[] = $file_name;

            }

            $singleProduct = json_encode($getProduct);

            $data['image'] = $singleProduct;

        }
        DB::table('ticket_listings')->insert($data);
        session()->flash('success', 'Your Ticket Listed Successfully');
        return redirect()->back();
    }
}