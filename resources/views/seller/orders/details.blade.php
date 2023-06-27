@extends('seller.layouts.master')
@section('content')
<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>Order Details</h1>
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
                    <label><a href="{{route('seller.payout.info')}}" class="@if (request()->routeIs('seller.payout.info')) menu-active-color @endif">Payment</a></label>
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
                            <h3>Order Details</h3>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Order ID</span>
                                    {{ $orders->order_id }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Invoice ID</span>
                                    {{ $orders->invoice_id }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Match Name</span>
                                    {{ $orders->match_name }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Ticket ID</span>
                                    {{ $orders->order_ticket_id }}
                                </li>
                                @if (isset($orders->row))
                                <li class="col-sm-4">
                                    <span>Row</span>
                                    {{ $orders->row }}
                                </li>
                                @endif
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Vanue Name</span>
                                    {{ $orders->venue_name }}
                                </li>
                                @if (isset($orders->section_name))
                                <li class="col-sm-4">
                                    <span>Section Name</span>
                                    {{ $orders->section_name }}
                                </li>
                                @endif
                                @if (isset($orders->block_number))
                                <li class="col-sm-3">
                                    <span>Block Number</span>
                                    {{ $orders->block_number }}
                                </li>
                                @endif
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Ticket Types</span>
                                    {{ $orders->ticket_types }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Ticket Varient</span>
                                    {{ $orders->ticket_varient }}
                                </li>
                                @if (isset($orders->ticket_restriction))
                                <li class="col-sm-3">
                                    <span>Ticket Restriction</span>
                                    <?php $ticket_restriction = json_decode($orders->ticket_restriction) ?>
                                    @foreach ($ticket_restriction as $ticket)
                                    {{ $ticket }}
                                    @endforeach
                                </li>
                                @endif
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Ticket Quantity</span>
                                    {{ $orders->ticket_quantity }}
                                </li>
                                @if (isset($orders->ticket_image))
                                <li class="col-sm-4">
                                    <span>Download Ticket</span>
                                    <a href="{{ route('download.images',encrypt($orders->id)) }}" class="btn btn-primary">Download</a>
                                </li>
                                @endif
                                <li class="col-sm-3">
                                    <span>Commission</span>
                                    £ {{ number_format($orders->fee,2) }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Total price</span>
                                    £ {{ number_format($orders->total_price,2) }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Status</span>
                                    <span style="color: green">{{ $orders->status }}</span>
                                </li>
                                <li class="col-sm-3">
                                    <span>Purchasing date</span>
                                    {{$orders->order_date}}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <br>
                            <h3>Billing Address Details</h3>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>First Name</span>
                                    {{ $orders->first_name }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Last Name</span>
                                    {{ $orders->last_name }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Email</span>
                                    {{ $orders->email }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Address</span>
                                    {{ $orders->address }}
                                </li>
                                <li class="col-sm-4">
                                    <span>City</span>
                                    {{ $orders->city }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Country</span>
                                    {{ $orders->country }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>State</span>
                                    {{ $orders->state }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Phone</span>
                                    {{ $orders->phone }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Post Code</span>
                                    {{ $orders->post_code }}
                                </li>
                            </ul>

                            @if ($orders->ticket_types == 'Membership' || $orders->ticket_types == 'Paper')
                            <br>
                            <br>
                            <br>
                            <h3>Address For Collection</h3>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Address</span>
                                    {{ $orders->address_for_collection }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Zip Code</span>
                                    {{ $orders->zip_code_for_collection }}
                                </li>
                                <li class="col-sm-3">
                                    <span>City</span>
                                    {{ $orders->city_for_collection }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Country</span>
                                    {{ $orders->country_for_collection }}
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
