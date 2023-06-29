@extends('front.layouts.master')
@section('content')

<section class="section-select-seat-featured-header">
    <div class="container">
        <div class="section-content">
            <p>{{ $event->child_sub_cat_name }}<strong>{{ $event->match_name }}</strong><span>{{ $event->venue_name }}</span> <span>{{ date('d-F-Y H:i', strtotime($event->match_date_time)) }}</span>@if($left_ticket > 0) <span> <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $left_ticket }} tickets left </span> @endif</p>
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
            <div id="primary" class="col-md-7 col-lg-7">
                <div class="search-result-header">
                    <div class="row">
                        <div class="col-sm-5">
                            <label>Sort By Location</label>
                            <br>
                            <br>
                            <form name="shortSection" id="shortSection">
                                <div class="custom-select">
                                    <select class="dropdown" name="section" id="section">
                                        <option value="all" selected>Any Tickets</option>
                                        @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-5">
                            <label>Sort By Tickets</label>
                            <br>
                            <br>
                            <form name="sortProducts" id="shortProducts">
                                <div class="custom-select">
                                    <select class="dropdown" name="ticket" id="sort">
                                        <option selected disabled>Any Tickets</option>
                                        <option value="1" @if(isset($_GET['sort']) && $_GET['sort']== "1") selected="selected" @endif>1</option>
                                        <option value="2" @if(isset($_GET['sort']) && $_GET['sort']== "2") selected="selected" @endif>2</option>
                                        <option value="3" @if(isset($_GET['sort']) && $_GET['sort']== "3") selected="selected" @endif>3</option>
                                        <option value="4" @if(isset($_GET['sort']) && $_GET['sort']== "4") selected="selected" @endif>4</option>
                                        <option value="5+" @if(isset($_GET['sort']) && $_GET['sort']== "5+") selected="selected" @endif>5+</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br>
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
