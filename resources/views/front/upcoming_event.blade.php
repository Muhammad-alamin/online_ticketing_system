@extends('front.layouts.master')
@section('content')
<!-- Start of Main -->
<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">All Upcoming Events</h1>
    </div>
</section>

<section class="section-calendar-events">
    <div class="container">
        <div class="row">
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
    </div><!-- Pagination -->
    <br>
    <br>
    <br>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <div class="gallery-pagination">
                    <ul class="pagination justify-content-center">
                        {{ $upcoming_events->links('front.custom-pagination') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-newsletter">
    <div class="container">
        <div class="section-content">
            <h2>Stay Up to date With Your Favorite Events!</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br> euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            <div class="newsletter-form clearfix">
                <input type="email" placeholder="Your Email Address">
                <input type="submit" value="Subscribe">
            </div>
        </div>
    </div>
</section>

@endsection

