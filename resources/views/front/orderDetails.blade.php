@extends('front.layouts.master')
@section('content')

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Order Details</h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-md-6">
                <div class="section-order-details-event-title">
                    <span class="event-caption">{{ $ticket_details->child_sub_cat_name }}</span>
                    <h2 class="event-title" style="font-weight: bold">{{ $ticket_details->match_name }}</h2>
                    @if(!empty($ticket_details->block_image))
                    <img class="event-img" src="{{ asset($ticket_details->block_image) }}" alt="image">
                    @elseif (!empty($ticket_details->section_image))
                    <img class="event-img" src="{{ asset($ticket_details->section_image) }}" alt="image">
                    @else
                    <img class="event-img" src="{{ asset($ticket_details->venue_image) }}" alt="image">
                    @endif
                </div>
            </div>

        <form id="form1" action="{{ route('order_review', encrypt($ticket_details->id)) }}" method="get" enctype="multipart/form-data">
            <div id="secondary" class="col-md-6">
                <div class="section-order-details-event-info">
                    <div class="venue-details">
                        <h3>Venue & Event Information</h3>
                        <div class="venue-details-info">
                            <p>{{ $ticket_details->venue_name }}</p>
                            <p>{{ date('d-F-Y H:i', strtotime($ticket_details->match_date_time)) }}</p>
                        </div>
                    </div>
                    <?php
                    $ticket_restriction = json_decode($ticket_details->ticket_restriction);
                    ?>
                    @if(!empty($ticket_restriction))
                    <div class="venue-details">
                        <h3>Ticket Restriction</h3>
                        <div class="venue-details-info">
                            @foreach ($ticket_restriction as $eachRestriction)
                            <p style="color:grey">{{ $eachRestriction }}</p>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="seat-details">
                        <h3>Seats Order Information</h3>
                        <div class="seat-details-info">
                            <table class="table seat-row">
                                <thead>
                                    <tr>
                                        <th>Section</th>
                                        @if (!empty($ticket_details->block_number))
                                        <th>Row</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $ticket_details->section_name }}</td>
                                        <td>{{ $ticket_details->block_number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table number-tickets">
                                <thead>
                                    <tr>
                                        <th>Delivery</th>
                                        <th>Number of Tickets</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Instant Download</td>
                                        <td>
                                            <?php $n = $ticket_details->ticket_count;
                                            ?>
                                            <select class="selectpicker dropdown" name="quantity">
                                                @if ($ticket_details->ticket_varient == 'Pairs')
                                                    @for ($i= 2; $i <= $n; $i +=2)
                                                        <option value="{{ encrypt($i) }}" @if($i == $n) selected @endif>{{ $i }}</option>
                                                    @endfor
                                                @elseif($ticket_details->ticket_varient == "Any")
                                                    @for ($i= 1; $i <= $n; ++$i)
                                                    <option value="{{ encrypt($i) }}" @if($i == $n) selected @endif>{{ $i }}</option>
                                                    @endfor
                                                @else
                                                <option value="{{ encrypt($ticket_details->ticket_count) }}" @if($ticket_details->ticket_count) selected @endif>{{ $ticket_details->ticket_count }}</option>
                                                @endif
                                            </select>
                                            @error('ticket_have')<i class="text-danger">{{$message}}</i>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="seat-details-info-price">
                            <table class="table total-price">
                                <tbody>
                                    <tr>
                                        <td>Ticket Per Price</td>
                                        <td class="price">USD ${{ $ticket_details->price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="section-order-details-event-action">
                    <ul class="row">
                        <li class="col-xs-6 col-sm-6">
                            <a class="secondary-link" href="#">Back</a>
                        </li>
                        <li class="col-xs-6 col-sm-6">
                            <a style="cursor: pointer" onclick="document.getElementById('form1').submit();" class="primary-link" >Place Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>

@endsection
