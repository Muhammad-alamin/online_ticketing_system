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
                    <label><a href="{{ route('seller.orders') }}" class="@if (request()->routeIs('seller.orders')) menu-active-color @endif">Orders</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.ticket.listing') }}" class="@if (request()->routeIs('seller.ticket.listing')) menu-active-color @endif">Listing</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="">Payment</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="">Sales</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="">Account</a></label>
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
                            <th>Status</th>
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
                            <td><span style="color: green">{{ $ticket->status }}</span></td>
                            <td>£ {{ number_format($ticket->price,2) }}</td>
                            <td>
                                <a href="{{ route('seller.listing.details',encrypt($ticket->id)) }}" style="color: green">Details</a>
                                <br>
                                <br>
                                <a href="{{ route('seller.listing.edit',encrypt($ticket->id)) }}" style="color: orange">Edit</a>
                                <br>
                                <br>
                                <a href="{{ route('seller.listing.delete',encrypt($ticket->id)) }}" onclick="return confirm('Are You Confirm to Delete?')" style="color: red">Delete</a>
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