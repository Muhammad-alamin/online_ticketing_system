@extends('seller.layouts.master')
@section('content')
<section class="section-select-seat-featured-header">
    <div class="container">
        <div class="section-content">
            <p>{{ $event->child_sub_cat_name }}<strong>{{ $event->match_name }}</strong><span>{{ $event->venue_name }}</span> <span>{{ date('d-F-Y H:i', strtotime($event->match_date_time)) }}</span></p>
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
            @if(Session::has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><i class="fa fa-check" aria-hidden="true"></i> {{ session('success') }}</strong>
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
            <div id="secondary" class="col-md-6" id="main-content">
                <form action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="ticket-price">
                        <input type="hidden" value="{{ $event->venue_id }}" name="venue_id" id="venue_id">
                        <input type="hidden" value="{{ $event->id }}" name="event_id" id="event_id">
                        <input type="hidden" value="{{ $event->child_sub_cat_id }}" name="child_sub_cat_id" id="child_sub_cat_id">
                        <input type="hidden" value="{{ $event->sub_cat_id }}" name="sub_cat_id" id="sub_cat_id">
                        <input type="hidden" value="{{ $event->category_id }}" name="category_id" id="category_id">
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">How many tickets do you want to sell ?</label>
                            <select class="selectpicker dropdown" name="ticket_count" id="selectTicket" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="1" >1 Ticket</option>
                                <option value="2" >2 Tickets</option>
                                <option value="3" >3 Tickets</option>
                                <option value="4" >4 Tickets</option>
                                <option value="5" >5 Tickets</option>
                                <option value="6" >6 Tickets</option>
                                <option value="7" >7 Tickets</option>
                                <option value="8" >8 Tickets</option>
                                <option value="9" >9 Tickets</option>
                                <option value="10" >10 Tickets</option>
                                <option value="11" >11 Ticket</option>
                                <option value="12" >12 Tickets</option>
                                <option value="13" >13 Tickets</option>
                                <option value="14" >14 Tickets</option>
                                <option value="15" >15 Tickets</option>
                                <option value="16" >16 Tickets</option>
                                <option value="17" >17 Tickets</option>
                                <option value="18" >18 Tickets</option>
                                <option value="19" >19 Tickets</option>
                                <option value="20" >20 Tickets</option>
                                <option value="21" >21 Ticket</option>
                                <option value="22" >22 Tickets</option>
                                <option value="23" >23 Tickets</option>
                                <option value="24" >24 Tickets</option>
                                <option value="25" >25 Tickets</option>
                                <option value="26" >26 Tickets</option>
                                <option value="27" >27 Tickets</option>
                                <option value="28" >28 Tickets</option>
                                <option value="29" >29 Tickets</option>
                                <option value="30" >30 Tickets</option>
                            </select>
                            @error('ticket_count')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets" style="display: none" id="ticket_varient">
                            <label  style="font-size: 15px; font-weight:bold;">How do you want to sell your tickets ?</label>
                            <select class="selectpicker dropdown" name="ticket_varient" id="selectTicketVarient" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="Any" >ANY</option>
                                <option value="Pairs">PAIRS</option>
                                <option value="Full" >FULL</option>
                            </select>
                            @error('ticket_varient')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">What type of ticket is it ?</label>
                            <select class="selectpicker dropdown" name="ticket_types" id="mySelect" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="Mobile-transfer" >Mobile Transfer</option>
                                <option value="E-ticket" >E-Ticket</option>
                                <option value="Paper" >Paper</option>
                                <option value="Membership" >Membership</option>
                            </select>
                            @error('ticket_types')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Are there any restrictions/infos with your tickets ? (if you have)</label>
                            <select multiple="multiple" name="ticket_restriction[]" class="selectpicker dropdown" >
                                <option style="width:20px" value="Restricted view (printed on ticket)" >Restricted view (printed on ticket)</option>
                                <option style="width:20px" value="Junior ticket (ages 21 and under)" >Junior ticket (ages 21 and under)</option>
                                <option style="width:20px" value="Home Supporters Only" >Home Supporters Only</option>
                                <option style="width:20px" value="Parking Pass" >Parking Pass</option>
                                <option style="width:20px" value="RIncludes unlimited food and drinks" >RIncludes unlimited food and drinks</option>
                                <option style="width:20px" value="Includes pregame food and beverage" >Includes pregame food and beverage</option>
                                <option style="width:20px" value="Padded Seats" >Padded Seats</option>
                                <option style="width:20px" value="Child ticket (ages 16 and under)" >Child ticket (ages 16 and under)*</option>
                                <option style="width:20px" value="Senior ticket (61 and older)" >Senior ticket (61 and older)</option>
                                <option style="width:20px" value="Early Access" >Early Access</option>
                                <option style="width:20px" value="Full Suite (not shared)" >Full Suite (not shared)</option>
                                <option style="width:20px" value="Includes limited complimentary food and drinks" >Includes limited complimentary food and drinks</option>
                                <option style="width:20px" value="Free Halftime drinks" >Free Halftime drinks</option>
                                <option style="width:20px" value="Standing Only" >Standing Only</option>
                                <option style="width:20px" value="Child ticket (ages 18 and under)" >Child ticket (ages 18 and under)*</option>
                                <option style="width:20px" value="Away Supporters Only" >Away Supporters Only</option>
                                <option style="width:20px" value="Vip Lounge Access" >Vip Lounge Access</option>
                                <option style="width:20px" value="Full Suite (Shared)" >Full Suite (Shared)</option>
                                <option style="width:20px" value="Food and drink voucher included" >Food and drink voucher included</option>
                                <option style="width:20px" value="Food and drink Available for Purchase" >Food and drink Available for Purchase</option>
                                <option style="width:20px" value="Complimentary matchday programme" >Complimentary matchday programme</option>
                                <option style="width:20px" value="Next to players'entrance" >Next to players' entrance</option>
                            </select>
                            @error('ticket_restriction')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Do you already have your ticket ? </label>
                            <select class="selectpicker dropdown" name="ticket_have">
                                <option selected disabled>Please Select</option>
                                <option value="Yes" >Yes</option>
                                <option value="No" >No</option>
                            </select>
                            @error('ticket_have')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets input_body" style="display: none" id="file">
                            <label  style="font-size: 15px; font-weight:bold;">Upload your E-ticket</label>
                            <div class='file-input'>
                                <input type='file' multiple name="image[]" accept="image/*">
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                            </div>
                            <div class="append"></div>
                            @error('image')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold; color:red">SEAT DETAILS:</label>
                            <label  style="font-size: 15px; font-weight:bold;">Section : </label>
                            <select class="selectpicker dropdown" name="section" id="section">
                                <option selected disabled>Please Select</option>
                                @foreach($section as $key=>$section)
                                <option  value="{{$section->id}}">{{$section->section_name}}</option>
                                @endforeach
                            </select>
                            @error('section')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Block : </label>
                            <select class=" dropdown" name="block" id="block">
                                <option selected disabled>Please Select</option>
                            </select>
                        </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Row : </label>
                            <input type="text" placeholder="Type Your Row" name="row" class="form-control">
                            @error('row')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        <div class="tickets" style="border-bottom: 1px solid #cecece;">
                            <label  style="font-size: 15px; font-weight:bold; color:red">Price Per Ticket:</label>
                            <label  style="font-size: 15px; font-weight:bold;">What's the price at face value ? $ (US doller)</label>
                            <input type="number" name="price" placeholder="$ Per Ticket" class="form-control" required>
                            @error('price')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                    </div>

                    <br>
                    <button class="button" type="submit">Add Ticket</button>
                </form>
            </div>
            <div id="primary" class="col-md-6 sticky" style="margin-top: 50px;">
                    <img src="{{ asset($event->venue_image)}}">
            </div>
        </div>

    </div>
</section>
@endsection
