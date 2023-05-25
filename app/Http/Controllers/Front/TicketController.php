<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function search(Request $request){

        if($request->ajax()){
            $right_time = Carbon::now()->format('Y/m/d H:i:s');
            $data = Event::where('match_name','like','%'.$request->search.'%')
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
                                <a href="/list/ticket/'.$d_id.'">
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

    public function ticketList($id){
            $d_id = decrypt($id);
            $data['event'] = DB::table('events')
            ->join('child_sub_categories','events.child_sub_cat_id', 'child_sub_categories.id')
            ->select('child_sub_categories.child_sub_cat_name','events.*')
            ->where('events.id',$d_id)
            ->first();

            $data['tickets'] = DB::table('ticket_listings')
            ->join('events','ticket_listings.event_id', 'events.id')
            ->join('sections','ticket_listings.section_id', 'sections.id')
            ->join('blocks','ticket_listings.block_id', 'blocks.id')
            ->select('events.*','sections.*','blocks.*','ticket_listings.*')
            ->where('ticket_listings.event_id',$d_id)
            ->get();
            
            return view('front.ticketList',$data);
    }
}
