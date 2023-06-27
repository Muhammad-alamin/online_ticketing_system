@extends('front.layouts.master')
@section('content')

<section class="section-select-seat-featured-header">
    <div class="container">
        <div class="section-content">
            <p>{{ $event->child_sub_cat_name }}<strong>{{ $event->match_name }}</strong><span>{{ $event->venue_name }}</span> <span>{{ date('d-F-Y H:i', strtotime($event->match_date_time)) }}</span></p>
        </div>
    </div>
</section>

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Availabe Ticket</h1>
    </div>
</section>
<section class="section-artist-content">
    <div class="container">
        <div class="row">
                <div id="primary" class="col-sm-12 col-md-7">
                @foreach ($tickets as $ticket)
                    @if ($ticket->ticket_count >= 1 && $ticket->status == 'Active')
                    <div class="artist-event-item hover_div" data-ticket_id="{{ $ticket->id }}" style="border: 1px solid grey; margin-bottom:10px; padding-bottom:15px;">
                        <div class="row">
                            <div class="artist-event-item-info col-sm-9">
                                <ul class="row">
                                    <li class="col-sm-5">
                                        <span><h4>{{ $ticket->section_name }}</h4></span>
                                        @if(isset($ticket->block_number))
                                        Block: {{ $ticket->block_number }}
                                        @endif
                                        @if(isset($ticket->row))
                                        <span class="location">Row: {{ $ticket->row }}</span>
                                        @endif
                                    </li>
                                    <li class="col-sm-4">
                                        <span><h4>{{ $ticket->ticket_count }} Tickets</h4></span>
                                        {{ $ticket->ticket_types }}
                                    </li>
                                    <li class="col-sm-3">
                                        <span>Restriction</span>
                                        YES
                                    </li>
                                </ul>
                            </div>
                            <div class="artist-event-item-price col-sm-3">
                                <strong>£{{ $ticket->price }}</strong>
                                <a href="{{ route('order_details', encrypt($ticket->id)) }}">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div  class="col-sm-12 col-md-5 sticky hover_section" data-event_id="{{ $event->id }}" id="image-container">
                <img src="{{ asset($event->venue_image)}}">
            </div>
        </div>
    </div>
</section>

@endsection
