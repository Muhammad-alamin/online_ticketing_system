<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:statusUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tickets status update';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fetchVenue_id = DB::table('ticket_listings')
        ->join('events','ticket_listings.event_id', 'events.id')
        ->select('events.id','events.match_date_time','ticket_listings.*')
        ->where('ticket_listings.status','Active')
        ->get();

        foreach($fetchVenue_id as $singleTicket){

            $event_date = $singleTicket->match_date_time;

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

            if ($daysDifference <= 2 && empty($singleTicket->image)) {
                DB::table('ticket_listings')->where('id', $singleTicket->id)->update(['status' => 'Inactive']);
            }
            // \Log::info($daysDifference);
        }

    }
}
