<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Event;
use App\Models\Section;
use App\Models\TicketListing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function search(Request $request){

        if($request->ajax()){

            // $right_time = Carbon::now()->format('Y/m/d H:i');
            // $db_time  = Event::where('match_date_time', '>', $right_time)->get();

            // foreach ($db_time as $event) {
            // $db_carbon_time = Carbon::parse($event->match_date_time);
            // if ($db_carbon_time->isAfter($right_time)) {
            //     echo "The event is after the current time.";
            // } else {
            //     echo "The event is before or at the current time.";
            // }
            // }

            $right_time = Carbon::now()->format('Y/m/d H:i');
            $data = DB::table('events')
            ->join('venues','events.venue_id', 'venues.id')
            ->select('venues.*','events.*')
            ->where('match_name','like','%'.$request->search.'%')
            // ->where('location','like','%'.$request->search.'%')
            ->where('events.match_date_time','>=',$right_time)
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
                                    <a href="/list/ticket/'.$d_id.'">
                                        <div class="full-event-info">
                                            <div class="full-event-info-header">
                                                <h4>'.$row->match_name.'</h4>
                                                <br>
                                                <div class="clearfix"></div>
                                                <span class="event-date-info">'.date('d-F-Y H:i', strtotime($row->match_date_time)).'</span>
                                                <span class="event-venue-info">'.$row->venue_name.'</span>
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

    public function ticketList($id){
            $d_id = decrypt($id);
            $data['event'] = DB::table('events')
            ->join('child_sub_categories','events.child_sub_cat_id', 'child_sub_categories.id')
            ->join('venues','events.venue_id', 'venues.id')
            ->select('child_sub_categories.child_sub_cat_name','venues.*','events.*')
            ->where('events.id',$d_id)
            ->first();

            $data['tickets'] = DB::table('ticket_listings')
            ->join('sections','ticket_listings.section_id', 'sections.id')
            ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
            ->join('events','ticket_listings.event_id', 'events.id')
            ->join('venues','ticket_listings.venue_id', 'venues.id')
            ->select('blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
            ->where('ticket_listings.event_id',$d_id)
            ->where('ticket_listings.live_mode','On')
            ->get();
            return view('front.ticketList',$data);
    }

    public function hover($imageId)
    {
        $ticket_listing_id = TicketListing::where('id',$imageId)->first();
        $block_image = Block::where('id',$ticket_listing_id->block_id)->first();
        $section_image = Section::where('id',$ticket_listing_id->section_id)->first();

        if(!empty($block_image->block_image)){
            $block_image = asset($block_image->block_image);
           // Return the image data
            return response()->json(['image_path' => $block_image]);
        }
        else{
            $section_image = asset($section_image->section_image);
           // Return the image data
            return response()->json(['image_path' => $section_image]);
        }
    }

    public function section_hover($imageId)
    {
        $event_id = DB::table('events')
        ->join('venues','events.venue_id', 'venues.id')
        ->select('venues.*','events.*')
        ->where('events.id',$imageId)
        ->first();

        if(!empty($event_id->venue_image)){
            $event_image = asset($event_id->venue_image);
           // Return the image data
            return response()->json(['image_path' => $event_image]);
        }
    }
}
