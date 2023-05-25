@extends('front.layouts.master')
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
@endsection
