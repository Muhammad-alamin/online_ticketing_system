@extends('front.layouts.master')
@section('content')
    <section class="hero-1">
        <div class="container">
            <div class="row">
                <div class="hero-content">
                    <h1 class="hero-title">BUY & SELL TICKETS</h1>
                    <p class="hero-caption">Buy and sell sports tickets and cultural events</p>
                    <div class="hero-search">
                        <input type="text" placeholder="Seach Event, or Venue" name="search" id="search" onfocus="this.value=''">
                    </div>
                    <div style="background-color: white;
                    border-radius: 20px 20px; overflow-x:auto;" id="search_list">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-upcoming-events">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2>Upcoming Events</h2>
                    <p>Upcoming football events promise thrilling matches, from prestigious club competitions like the UEFA Champions League and English Premier League to international tournaments like the FIFA World Cup and UEFA European Championship. The football world eagerly awaits the action, anticipating moments of skill, excitement, and intense competition.</p>
                    <a href="{{ route('upcoming_event') }}">See all upcoming events</a>
                </div>
                <div class="section-content">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <ul class="clearfix">
                                @foreach ($upcoming_events as $upcoming_event)
                                <li class="col-sm-4" style="padding-right: 0px;">
                                    <div class="date">
                                        <a href="{{ route('listTicket',encrypt($upcoming_event->id)) }}">
                                            <span class="day">{{ date('d', strtotime($upcoming_event->match_date_time)) }}</span>
                                            <span class="month">{{ date('F', strtotime($upcoming_event->match_date_time)) }}</span>
                                            <span class="year">{{ date('Y', strtotime($upcoming_event->match_date_time)) }}</span>
                                        </a>
                                    </div>
                                    <a href="{{ route('listTicket',encrypt($upcoming_event->id)) }}">
                                        <img src="{{ asset($upcoming_event->image) }}" alt="image" style="height: 300px;">
                                    </a>
                                    <div class="info">
                                        <p>{{ $upcoming_event->match_name }}<span>{{ $upcoming_event->venue_name }}</span></p>
                                        <a href="{{ route('listTicket',encrypt($upcoming_event->id)) }}" class="get-ticket">Get Ticket</a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-stats">
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <ul class="row clearfix">
                        <li class="col-sm-4">
                            <span class="count">598</span>
                            <hr>
                            <p>Active Ticket</p>
                        </li>
                        <li class="col-sm-4">
                            <span class="count">16,173</span>
                            <hr>
                            <p>Active User</p>
                        </li>
                        <li class="col-sm-4">
                            <span class="count">136,874</span>
                            <hr>
                            <p>Ticket Sold</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-newsletter">
        <div class="container">
            <div class="section-content">
                <h2>Stay Up to date With Your Favorite Events!</h2>
                <p>Stay updated on your favorite events! Don't miss out!</p>
                <div class="newsletter-form clearfix">
                    <input type="email" placeholder="Your Email Address">
                    <input type="submit" value="Subscribe">
                </div>
            </div>
        </div>
    </section>
@endsection
