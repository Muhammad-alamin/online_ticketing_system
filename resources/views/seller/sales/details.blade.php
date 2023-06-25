@extends('seller.layouts.master')
@section('content')
<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>All Sports Events</h1>
        </div>
    </div>
</section>

<section class="section-refine-search">
    <div class="container">
        <div class="row">
            <form>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.orders') }}">Orders</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.ticket.listing') }}">Listing</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{route('seller.payout.info')}}" class="@if (request()->routeIs('user.details')) menu-active-color @endif">Payment</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.sales') }}">Sales</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('user.details') }}">Account</a></label>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="section-artist-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="artist-event-item">
                    <div class="row">
                        <div class="artist-event-item-info col-sm-9">
                            <h3>Ticket Details</h3>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Ticket ID</span>
                                    {{ $sales->order_ticket_id }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Match Name</span>
                                    {{ $sales->match_name }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Ticket Quantity</span>
                                    {{ $sales->ticket_quantity }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Vanue Name</span>
                                    {{ $sales->venue_name }}
                                </li>
                                @if (isset($sales->section_name))
                                <li class="col-sm-4">
                                    <span>Section Name</span>
                                    {{ $sales->section_name }}
                                </li>
                                @endif
                                @if (isset($sales->block_number))
                                <li class="col-sm-3">
                                    <span>Block Number</span>
                                    {{ $sales->block_number }}
                                </li>
                                @endif
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Ticket price</span>
                                    £ {{ number_format($sales->ticket_price,2) }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Status</span>
                                    <span style="color: green">{{ $sales->status }}</span>
                                </li>
                                <li class="col-sm-3">
                                    <span>Selling date</span>
                                    {{ date('d-F', strtotime($sales->order_date))}}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <br>
                            @if ($sales->ticket_types == 'Membership' || $sales->ticket_types == 'Paper')
                            <br>
                            <br>
                            <br>
                            <h3>Address For Collection</h3>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Address</span>
                                    {{ $sales->address_for_collection }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Zip Code</span>
                                    {{ $sales->zip_code_for_collection }}
                                </li>
                                <li class="col-sm-3">
                                    <span>City</span>
                                    {{ $sales->city_for_collection }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Country</span>
                                    {{ $sales->country_for_collection }}
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
