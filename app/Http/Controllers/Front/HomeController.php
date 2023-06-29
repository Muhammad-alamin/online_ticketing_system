<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\TicketListing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $right_time = Carbon::now()->format('Y/m/d H:i');
        $data['upcoming_events'] = DB::table('events')
        ->join('venues','events.venue_id', 'venues.id')
        ->select('venues.*','events.*')
        ->where('events.match_date_time','>=',$right_time)
        ->limit(6)
        ->get();
        return view('front.home',$data);
    }

    public function upcoming_event(){
        $right_time = Carbon::now()->format('Y/m/d H:i');
        $data['upcoming_events'] = DB::table('events')
        ->join('venues','events.venue_id', 'venues.id')
        ->select('venues.*','events.*')
        ->where('events.match_date_time','>=',$right_time)
        ->paginate(6);
        return view('front.upcoming_event',$data);
    }

   
}
