@extends('seller.layouts.master')
@section('content')
<section class="section-select-seat-featured-header">
    <div class="container">
        <div class="section-content">
            <p>{{ $event->child_sub_cat_name }}<strong>{{ $event->match_name }}</strong> <span>{{ date('d-F-Y H:i', strtotime($event->match_date_time)) }}</span></p>
        </div>
    </div>
</section>

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Listing Your Ticket</h1>
    </div>
</section>

<section class="section-select-seat-page-content">
    <div class="container">
        <div class="row">
            <div id="secondary" class="col-md-10" id="main-content">
                <div class="alert alert-info" role="alert">
                    <p><i class="fa fa-times" aria-hidden="true"></i>You are not eligible to listing your ticket on this event. Make sure you listing your ticket 2 days before match time.</p>
                </div>
            </div>
            <div id="primary" class="col-md-2">
                <a class="primary-link" href="{{ route('sellTicket') }}">Go Back</a>
            </div>
        </div>

    </div>
</section>
@endsection
