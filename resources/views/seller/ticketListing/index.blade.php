@extends('seller.layouts.master')
@section('content')
<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>Ticket List</h1>
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
            <div id="primary" class="col-md-12 col-lg-12">
                <table id="example" class="display " style="width:100%">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Match Name</th>
                            <th>Section Name</th>
                            <th>Block Number</th>
                            <th>Ticket Quantity</th>
                            <th>Ticket Varient</th>
                            <th>Ticket Types</th>
                            <th>Created Date</th>
                            <th>Live</th>
                            <th>Price</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->ticket_id }}</td>
                            <td>{{ $ticket->match_name }}</td>
                            @if (isset($ticket->section_name))
                            <td>{{ $ticket->section_name }}</td>
                            @else
                            <td>None</td>
                            @endif
                            @if (isset($ticket->block_number))
                            <td>{{ $ticket->block_number }}</td>
                            @else
                            <td>None</td>
                            @endif
                            <td>{{ $ticket->ticket_count }}</td>
                            <td>{{ $ticket->ticket_varient }}</td>
                            <td>{{ $ticket->ticket_types }}</td>
                            <td>{{date('d-F-Y H:i', strtotime($ticket->created_at))}}</td>
                            <td>
                                <input class="input-switch" type="checkbox" id="demo{{ $ticket->id }}" data-id="{{ $ticket->id }}" data-live_mode="{{ $ticket->live_mode }}" {{ $ticket->live_mode ? 'checked' : '' }}/>
                                <label class="label-switch" for="demo{{ $ticket->id }}"></label>
                                <span class="info-text">{{ $ticket->live_mode ? 'On' : 'Off' }}</span>
                            </td>
                            <td>£ {{ number_format($ticket->price,2) }}</td>
                            <td>
                                <a href="{{ route('seller.listing.details',encrypt($ticket->id)) }}" style="color: green">Details</a>
                                <br>
                                <br>
                                <a href="{{ route('seller.listing.edit',encrypt($ticket->id)) }}" style="color: orange">Edit</a>
                                <br>
                                <br>
                                <a href="{{ route('seller.replicate.ticket',encrypt($ticket->id)) }}" style="color: blue">Duplicate</a>
                                <br>
                                <br>
                                @if(isset($orders_tickets))
                                etc
                                @else
                                <a href="{{ route('seller.listing.delete',encrypt($ticket->id)) }}" onclick="return confirm('Are You Confirm to Delete?')" style="color: red">Delete</a>
                                @endif
                            </td>
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
