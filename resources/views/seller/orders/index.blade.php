@extends('seller.layouts.master')
@section('content')
<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>Order List</h1>
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
                    <label><a href="{{route('seller.payout.info')}}" class="@if (request()->routeIs('seller.payout.info')) menu-active-color @endif">Payment</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.sales') }}" class="@if (request()->routeIs('seller.sales')) menu-active-color @endif">Sales</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('user.details') }}" class="@if (request()->routeIs('user.details')) menu-active-color @endif">Account</a></label>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="section-search-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-md-12 col-lg-12">
                @if(Session::has('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('error') }}</strong>
                </div>
                @endif
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Match Name</th>
                            <th>Ticket Quantity</th>
                            <th>Ticket Types</th>
                            <th>Total Price</th>
                            <th>Download Ticket</th>
                            <th>Purchasing date</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->match_name }}</td>
                            <td>{{ $order->ticket_quantity }}</td>
                            <td>{{ $order->ticket_types }}</td>
                            <td>£ {{ $order->total_price }}</td>
                            @if ($order->ticket_types == 'E-ticket')
                            <td><a href="{{ route('download.images',encrypt($order->id)) }}" class="btn btn-primary">Download</a></td>
                            @else
                            <td>No Ticket Image</td>
                            @endif
                            <td>{{ $order->order_date}}</td>
                            <td><a href="{{ route('seller.order.details',encrypt($order->id)) }}" style="color: green">Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>Seq.</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
