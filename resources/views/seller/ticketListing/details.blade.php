@extends('seller.layouts.master')
@section('content')
<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>Ticket Details</h1>
        </div>
    </div>
</section>

<section class="section-refine-search">
    <div class="container">
        <div class="row">
            <form>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.orders') }}" class="@if (request()->routeIs('seller.orders')) menu-active-color @endif">Orders</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.ticket.listing') }}" class="@if (request()->routeIs('seller.ticket.listing')) menu-active-color @endif">Listing</a></label>
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
                            <h3>Ticket Listing Details</h3>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Ticket ID</span>
                                    {{ $tickets->ticket_id }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Match Name</span>
                                    {{ $tickets->match_name }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Venue Name</span>
                                    {{ $tickets->venue_name }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Section Name</span>
                                    {{ $tickets->section_name }}
                                </li>
                                @if (isset($tickets->block_number))
                                <li class="col-sm-4">
                                    <span>Block Number</span>
                                    {{ $tickets->block_number }}
                                </li>
                                @endif
                                <li class="col-sm-3">
                                    <span>Ticket Quantity</span>
                                    {{ $tickets->ticket_count }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Ticket Varient</span>
                                    {{ $tickets->ticket_varient }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Ticket Types</span>
                                    {{ $tickets->ticket_types }}
                                </li>
                                @if (isset($tickets->ticket_restriction))
                                <li class="col-sm-3">
                                    <?php $ticket_restriction = json_decode($tickets->ticket_restriction) ?>
                                    <span>Ticket Restriction</span>
                                    @foreach ($ticket_restriction as $ticket)
                                    {{ $ticket }}
                                    @endforeach
                                </li>
                                @endif
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                @if (isset($tickets->image))
                                <?php $ticket_image = json_decode($tickets->image) ?>
                                <li class="col-sm-5">
                                    <span>Ticket Image</span>
                                    @foreach ($ticket_image as $image)
                                    <img src="{{ asset('images/selling/tickets/'.$image) }}" style="height: 60px; width:60px">
                                    @endforeach
                                </li>
                                @endif
                                <li class="col-sm-4">
                                    <span>Row</span>
                                    <span style="color: green">{{ $tickets->row }}</span>
                                </li>
                                <li class="col-sm-3">
                                    <span>Price</span>
                                    £ {{ number_format($tickets->price,2)}}
                                </li>
                            </ul>
                            @if ($tickets->ticket_types == 'Membership' || $tickets->ticket_types == 'Paper')
                            <br>
                            <br>
                            <br>
                            <h3>Address For Collection</h3>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Address</span>
                                    {{ $tickets->address_for_collection }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Zip Code</span>
                                    {{ $tickets->zip_code_for_collection }}
                                </li>
                                <li class="col-sm-3">
                                    <span>City</span>
                                    {{ $tickets->city_for_collection }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Country</span>
                                    {{ $tickets->country_for_collection }}
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
