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

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Edit Your Ticket</h1>
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
                    <strong><i class="fa fa-times" aria-hidden="true"></i> {{ session('error') }}</strong>
                </div>
            @endif
            <div id="secondary" class="col-md-6" id="main-content">
                <form action="{{ route('seller.listing.update', encrypt($tickets->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="ticket-price">
                        <input type="hidden" value="{{ $tickets->venue_id }}" name="venue_id" id="venue_id">
                        <input type="hidden" value="{{ $tickets->event_id }}" name="event_id" id="event_id">
                        <input type="hidden" value="{{ $tickets->child_sub_cat_id }}" name="child_sub_cat_id" id="child_sub_cat_id">
                        <input type="hidden" value="{{ $tickets->sub_cat_id }}" name="sub_cat_id" id="sub_cat_id">
                        <input type="hidden" value="{{ $tickets->category_id }}" name="category_id" id="category_id">
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">How many tickets do you want to sell ?</label>
                            <select class="selectpicker dropdown" name="ticket_count" id="selectTicket" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="1" {{ old('ticket_count', $tickets->ticket_count) == 1 ? 'selected' : '' }}>1 Ticket</option>
                                <option value="2" {{ old('ticket_count', $tickets->ticket_count) == 2 ? 'selected' : '' }}>2 Tickets</option>
                                <option value="3" {{ old('ticket_count', $tickets->ticket_count) == 3 ? 'selected' : '' }}>3 Tickets</option>
                                <option value="4" {{ old('ticket_count', $tickets->ticket_count) == 4 ? 'selected' : '' }}>4 Tickets</option>
                                <option value="5" {{ old('ticket_count', $tickets->ticket_count) == 5 ? 'selected' : '' }}>5 Tickets</option>
                                <option value="6" {{ old('ticket_count', $tickets->ticket_count) == 6 ? 'selected' : '' }}>6 Tickets</option>
                                <option value="7" {{ old('ticket_count', $tickets->ticket_count) == 7 ? 'selected' : '' }}>7 Tickets</option>
                                <option value="8" {{ old('ticket_count', $tickets->ticket_count) == 8 ? 'selected' : '' }}>8 Tickets</option>
                                <option value="9" {{ old('ticket_count', $tickets->ticket_count) == 9 ? 'selected' : '' }}>9 Tickets</option>
                                <option value="10" {{ old('ticket_count', $tickets->ticket_count) == 10 ? 'selected' : '' }}>10 Tickets</option>
                                <option value="11" {{ old('ticket_count', $tickets->ticket_count) == 11 ? 'selected' : '' }}>11 Ticket</option>
                                <option value="12" {{ old('ticket_count', $tickets->ticket_count) == 12 ? 'selected' : '' }}>12 Tickets</option>
                                <option value="13" {{ old('ticket_count', $tickets->ticket_count) == 13 ? 'selected' : '' }}>13 Tickets</option>
                                <option value="14" {{ old('ticket_count', $tickets->ticket_count) == 14 ? 'selected' : '' }}>14 Tickets</option>
                                <option value="15" {{ old('ticket_count', $tickets->ticket_count) == 15 ? 'selected' : '' }}>15 Tickets</option>
                                <option value="16" {{ old('ticket_count', $tickets->ticket_count) == 16 ? 'selected' : '' }}>16 Tickets</option>
                                <option value="17" {{ old('ticket_count', $tickets->ticket_count) == 17 ? 'selected' : '' }}>17 Tickets</option>
                                <option value="18" {{ old('ticket_count', $tickets->ticket_count) == 18 ? 'selected' : '' }}>18 Tickets</option>
                                <option value="19" {{ old('ticket_count', $tickets->ticket_count) == 19 ? 'selected' : '' }}>19 Tickets</option>
                                <option value="20" {{ old('ticket_count', $tickets->ticket_count) == 20 ? 'selected' : '' }}>20 Tickets</option>
                                <option value="21" {{ old('ticket_count', $tickets->ticket_count) == 21 ? 'selected' : '' }}>21 Ticket</option>
                                <option value="22" {{ old('ticket_count', $tickets->ticket_count) == 22 ? 'selected' : '' }}>22 Tickets</option>
                                <option value="23" {{ old('ticket_count', $tickets->ticket_count) == 23 ? 'selected' : '' }}>23 Tickets</option>
                                <option value="24" {{ old('ticket_count', $tickets->ticket_count) == 24 ? 'selected' : '' }}>24 Tickets</option>
                                <option value="25" {{ old('ticket_count', $tickets->ticket_count) == 25 ? 'selected' : '' }}>25 Tickets</option>
                                <option value="26" {{ old('ticket_count', $tickets->ticket_count) == 26 ? 'selected' : '' }}>26 Tickets</option>
                                <option value="27" {{ old('ticket_count', $tickets->ticket_count) == 27 ? 'selected' : '' }}>27 Tickets</option>
                                <option value="28" {{ old('ticket_count', $tickets->ticket_count) == 28 ? 'selected' : '' }}>28 Tickets</option>
                                <option value="29" {{ old('ticket_count', $tickets->ticket_count) == 29 ? 'selected' : '' }}>29 Tickets</option>
                                <option value="30" {{ old('ticket_count', $tickets->ticket_count) == 30 ? 'selected' : '' }}>30 Tickets</option>
                            </select>
                            @error('ticket_count')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets" id="ticket_varient">
                            <label  style="font-size: 15px; font-weight:bold;">How do you want to sell your tickets ?</label>
                            <select class="selectpicker dropdown" name="ticket_varient" id="selectTicketVarient" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="Any" {{ old('ticket_varient', $tickets->ticket_varient) == "Any" ? 'selected' : '' }}>ANY</option>
                                <option value="Pairs"{{ old('ticket_varient', $tickets->ticket_varient) == "Pairs" ? 'selected' : '' }}>PAIRS</option>
                                <option value="Full" {{ old('ticket_varient', $tickets->ticket_varient) == "Full" ? 'selected' : '' }}>FULL</option>
                            </select>
                            @error('ticket_varient')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">What type of ticket is it ?</label>
                            <select class="selectpicker dropdown" name="ticket_types" id="mySelect" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="Mobile-transfer" {{ old('ticket_types', $tickets->ticket_types) == "Mobile-transfer" ? 'selected' : '' }}>Mobile Transfer</option>
                                <option value="E-ticket" {{ old('ticket_types', $tickets->ticket_types) == "E-ticket" ? 'selected' : '' }}>E-Ticket</option>
                                <option value="Paper" {{ old('ticket_types', $tickets->ticket_types) == "Paper" ? 'selected' : '' }}>Paper</option>
                                <option value="Membership"{{ old('ticket_types', $tickets->ticket_types) == "Membership" ? 'selected' : '' }} >Membership</option>
                            </select>
                            @error('ticket_types')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <?php $restiction = json_decode($tickets->ticket_restriction) ?>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Are there any restrictions/infos with your tickets ? (if you have)</label>
                            <select multiple="multiple" name="ticket_restriction[]" class="selectpicker dropdown" >
                                @if(isset($restiction))
                                @foreach ($restiction as $eachRestriction)
                                <option style="width:20px" value="Restricted view (printed on ticket)" {{ old('ticket_restriction', $eachRestriction) == "Restricted view (printed on ticket)" ? 'selected' : '' }}>Restricted view (printed on ticket)</option>
                                <option style="width:20px" value="Junior ticket (ages 21 and under)" {{ old('ticket_restriction', $tickets->ticket_types) == "Junior ticket (ages 21 and under)" ? 'selected' : '' }}>Junior ticket (ages 21 and under)</option>
                                <option style="width:20px" value="Home Supporters Only" {{ old('ticket_restriction', $eachRestriction) == "Home Supporters Only" ? 'selected' : '' }}>Home Supporters Only</option>
                                <option style="width:20px" value="Parking Pass" {{ old('ticket_restriction', $eachRestriction) == "Parking Pass" ? 'selected' : '' }}>Parking Pass</option>
                                <option style="width:20px" value="RIncludes unlimited food and drinks" {{ old('ticket_restriction', $eachRestriction) == "RIncludes unlimited food and drinks" ? 'selected' : '' }}>RIncludes unlimited food and drinks</option>
                                <option style="width:20px" value="Includes pregame food and beverage" {{ old('ticket_restriction', $eachRestriction) == "Includes pregame food and beverage" ? 'selected' : '' }}>Includes pregame food and beverage</option>
                                <option style="width:20px" value="Padded Seats" {{ old('ticket_restriction', $eachRestriction) == "Padded Seats" ? 'selected' : '' }}>Padded Seats</option>
                                <option style="width:20px" value="Child ticket (ages 16 and under)" {{ old('ticket_restriction', $eachRestriction) == "Child ticket (ages 16 and under)" ? 'selected' : '' }}>Child ticket (ages 16 and under)*</option>
                                <option style="width:20px" value="Senior ticket (61 and older)" {{ old('ticket_restriction', $eachRestriction) == "Senior ticket (61 and older)" ? 'selected' : '' }}>Senior ticket (61 and older)</option>
                                <option style="width:20px" value="Early Access" {{ old('ticket_restriction', $eachRestriction) == "Early Access" ? 'selected' : '' }}>Early Access</option>
                                <option style="width:20px" value="Full Suite (not shared)" {{ old('ticket_restriction', $eachRestriction) == "Full Suite (not shared)" ? 'selected' : '' }}>Full Suite (not shared)</option>
                                <option style="width:20px" value="Includes limited complimentary food and drinks" {{ old('ticket_restriction', $eachRestriction) == "Includes limited complimentary food and drinks" ? 'selected' : '' }}>Includes limited complimentary food and drinks</option>
                                <option style="width:20px" value="Free Halftime drinks" {{ old('ticket_restriction', $eachRestriction) == "Free Halftime drinks" ? 'selected' : '' }}>Free Halftime drinks</option>
                                <option style="width:20px" value="Standing Only" {{ old('ticket_restriction', $eachRestriction) == "Standing Only" ? 'selected' : '' }}>Standing Only</option>
                                <option style="width:20px" value="Child ticket (ages 18 and under)" {{ old('ticket_restriction', $eachRestriction) == "Child ticket (ages 18 and under)" ? 'selected' : '' }}>Child ticket (ages 18 and under)*</option>
                                <option style="width:20px" value="Away Supporters Only" {{ old('ticket_restriction', $eachRestriction) == "Away Supporters Only" ? 'selected' : '' }}>Away Supporters Only</option>
                                <option style="width:20px" value="Vip Lounge Access" {{ old('ticket_restriction', $eachRestriction) == "Vip Lounge Access" ? 'selected' : '' }}>Vip Lounge Access</option>
                                <option style="width:20px" value="Full Suite (Shared)" {{ old('ticket_restriction', $eachRestriction) == "Full Suite (Shared)" ? 'selected' : '' }}>Full Suite (Shared)</option>
                                <option style="width:20px" value="Food and drink voucher included" {{ old('ticket_restriction', $eachRestriction) == "Food and drink voucher included" ? 'selected' : '' }}>Food and drink voucher included</option>
                                <option style="width:20px" value="Food and drink Available for Purchase" {{ old('ticket_restriction', $eachRestriction) == "Food and drink Available for Purchase" ? 'selected' : '' }}>Food and drink Available for Purchase</option>
                                <option style="width:20px" value="Complimentary matchday programme" {{ old('ticket_restriction', $eachRestriction) == "Complimentary matchday programme" ? 'selected' : '' }}>Complimentary matchday programme</option>
                                <option style="width:20px" value="Next to players'entrance" {{ old('ticket_restriction', $eachRestriction) == "Next to players'entrance" ? 'selected' : '' }}>Next to players' entrance</option>
                                @endforeach
                                @else
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
                                @endif
                            </select>
                            @error('ticket_restriction')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Do you already have your ticket ? </label>
                            <select class="selectpicker dropdown" name="ticket_have">
                                <option selected disabled>Please Select</option>
                                <option value="Yes" {{ old('ticket_have', $tickets->ticket_have) == "Yes" ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('ticket_have', $tickets->ticket_have) == "No" ? 'selected' : '' }}>No</option>
                            </select>
                            @error('ticket_have')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        @if ($tickets->ticket_types  == 'E-ticket')
                        <div class="tickets input_body" id="file">
                            <label  style="font-size: 15px; font-weight:bold;">Upload your E-ticket</label>
                            <div class='file-input'>
                                <input type='file' multiple name="image[]" accept="image/*">
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                            </div>
                            <div class="append"></div>
                            <?php $images = json_decode($tickets->image) ?>
                            @if(isset($images))
                            @foreach ($images as $image)
                            <img src="{{ asset('images/selling/tickets/'.$image) }}" style="height: 60px; width:60px">
                            @endforeach
                            @endif
                            @error('image')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        @else
                        <div class="tickets input_body" style="display: none" id="file">
                            <label  style="font-size: 15px; font-weight:bold;">Upload your E-ticket</label>
                            <div class='file-input'>
                                <input type='file' multiple name="image[]" accept="image/*">
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                            </div>
                            <div class="append"></div>
                            <?php $images = json_decode($tickets->image) ?>
                            @if(isset($images))
                            @foreach ($images as $image)
                            <img src="{{ asset('images/selling/tickets/'.$image) }}" style="height: 60px; width:60px">
                            @endforeach
                            @endif
                            @error('image')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        @endif

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold; color:red">SEAT DETAILS:</label>
                            <label  style="font-size: 15px; font-weight:bold;">Section : </label>
                            <select class="selectpicker dropdown" name="section" id="section">
                                <option selected disabled>Please Select</option>
                                @foreach($sections as $key=>$section)
                                <option  @if(old('section_id',isset($tickets)?$tickets->section_id:null)  == $section->id) selected @endif value="{{$section->id}}">{{$section->section_name}}</option>
                                @endforeach
                            </select>
                            @error('section')<i class="text-danger">{{$message}}</i>@enderror
                         </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Block : </label>
                            <select class=" dropdown" name="block" id="block">
                                <option selected disabled>Please Select</option>
                                @if (isset($tickets->block_number))
                                @foreach($blocks as $key=>$block)
                                <option  @if(old('block_id',isset($tickets)?$tickets->block_id:null)  == $block->id) selected @endif value="{{$block->id}}">{{$block->block_number}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Row : </label>
                            <input type="text" placeholder="Type Your Row" name="row" value="{{old('row', isset($tickets)?$tickets->row:null)}}" class="form-control">
                            @error('row')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        <div class="tickets" style="border-bottom: 1px solid #cecece;">
                            <label  style="font-size: 15px; font-weight:bold; color:red">Price Per Ticket:</label>
                            <label  style="font-size: 15px; font-weight:bold;">What's the price at face value ? $ (US doller)</label>
                            <input type="number" name="price" value="{{old('price', isset($tickets)?$tickets->price:null)}}" placeholder="$ Per Ticket" class="form-control" required>
                            @error('price')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        @if($tickets->ticket_types  == 'Paper' || $tickets->ticket_types  == 'Membership')

                        <div class="tickets ticket_address" style="border-bottom: 1px solid #cecece;">
                            <div>
                                <label  style="font-size: 15px; font-weight:bold; color:red">ADDRESS FOR COLLECTION:</label>
                                <label  style="font-size: 15px; font-weight:bold;">Address</label>
                                <input type="text" name="address" value="{{old('address', isset($tickets)?$tickets->address_for_collection:null)}}" placeholder="Address" class="form-control" >
                                @error('address')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                            <div>
                                <label  style="font-size: 15px; font-weight:bold;">Zipcode</label>
                                <input type="text" name="zipcode" value="{{old('zipcodde', isset($tickets)?$tickets->zip_code_for_collection:null)}}" placeholder="ZipCode" class="form-control" >
                                @error('zipcode')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                            <div>
                                <label  style="font-size: 15px; font-weight:bold;">City</label>
                                <input type="text" name="city" value="{{old('city', isset($tickets)?$tickets->city_for_collection:null)}}" placeholder="City" class="form-control" >
                                @error('city')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                           <div>
                                <label  style="font-size: 15px; font-weight:bold;">Country</label>
                                <select id="country"name="country" class="form">
                                    <option value="Afghanistan"{{ old('country', $tickets->country_for_collection) == "Afghanistan" ? 'selected' : '' }}>Afghanistan</option>
                                    <option value="Åland Islands"{{ old('country', $tickets->country_for_collection) == "Åland Islands" ? 'selected' : '' }}>Åland Islands</option>
                                    <option value="Albania"{{ old('country', $tickets->country_for_collection) == "Albania" ? 'selected' : '' }}>Albania</option>
                                    <option value="Algeria"{{ old('country', $tickets->country_for_collection) == "Algeria" ? 'selected' : '' }}>Algeria</option>
                                    <option value="American Samoa"{{ old('country', $tickets->country_for_collection) == "American Samoa" ? 'selected' : '' }}>American Samoa</option>
                                    <option value="Andorra"{{ old('country', $tickets->country_for_collection) == "Andorra" ? 'selected' : '' }}>Andorra</option>
                                    <option value="Angola"{{ old('country', $tickets->country_for_collection) == "Angola" ? 'selected' : '' }}>Angola</option>
                                    <option value="Anguilla"{{ old('country', $tickets->country_for_collection) == "Anguilla" ? 'selected' : '' }}>Anguilla</option>
                                    <option value="Antarctica"{{ old('country', $tickets->country_for_collection) == "Antarctica" ? 'selected' : '' }}>Antarctica</option>
                                    <option value="Antigua and Barbuda"{{ old('country', $tickets->country_for_collection) == "Antigua and Barbuda" ? 'selected' : '' }}>Antigua and Barbuda</option>
                                    <option value="Argentina"{{ old('country', $tickets->country_for_collection) == "Argentina" ? 'selected' : '' }}>Argentina</option>
                                    <option value="Armenia"{{ old('country', $tickets->country_for_collection) == "Armenia" ? 'selected' : '' }}>Armenia</option>
                                    <option value="Aruba"{{ old('country', $tickets->country_for_collection) == "Aruba" ? 'selected' : '' }}>Aruba</option>
                                    <option value="Australia"{{ old('country', $tickets->country_for_collection) == "Australia" ? 'selected' : '' }}>Australia</option>
                                    <option value="Austria"{{ old('country', $tickets->country_for_collection) == "Austria" ? 'selected' : '' }}>Austria</option>
                                    <option value="Azerbaijan"{{ old('country', $tickets->country_for_collection) == "Azerbaijan" ? 'selected' : '' }}>Azerbaijan</option>
                                    <option value="Bahamas"{{ old('country', $tickets->country_for_collection) == "Bahamas" ? 'selected' : '' }}>Bahamas</option>
                                    <option value="Bahrain"{{ old('country', $tickets->country_for_collection) == "Bahrain" ? 'selected' : '' }}>Bahrain</option>
                                    <option value="Bangladesh"{{ old('country', $tickets->country_for_collection) == "Bangladesh" ? 'selected' : '' }}>Bangladesh</option>
                                    <option value="Barbados"{{ old('country', $tickets->country_for_collection) == "Barbados" ? 'selected' : '' }}>Barbados</option>
                                    <option value="Belarus"{{ old('country', $tickets->country_for_collection) == "Belarus" ? 'selected' : '' }}>Belarus</option>
                                    <option value="Belgium"{{ old('country', $tickets->country_for_collection) == "Belgium" ? 'selected' : '' }}>Belgium</option>
                                    <option value="Belize"{{ old('country', $tickets->country_for_collection) == "Belize" ? 'selected' : '' }}>Belize</option>
                                    <option value="Benin"{{ old('country', $tickets->country_for_collection) == "Benin" ? 'selected' : '' }}>Benin</option>
                                    <option value="Bermuda"{{ old('country', $tickets->country_for_collection) == "Bermuda" ? 'selected' : '' }}>Bermuda</option>
                                    <option value="Bhutan"{{ old('country', $tickets->country_for_collection) == "Bhutan" ? 'selected' : '' }}>Bhutan</option>
                                    <option value="Bolivia"{{ old('country', $tickets->country_for_collection) == "Bolivia" ? 'selected' : '' }}>Bolivia</option>
                                    <option value="Bosnia and Herzegovina"{{ old('country', $tickets->country_for_collection) == "Bosnia and Herzegovina" ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                    <option value="Botswana"{{ old('country', $tickets->country_for_collection) == "Botswana" ? 'selected' : '' }}>Botswana</option>
                                    <option value="Bouvet Island"{{ old('country', $tickets->country_for_collection) == "Bouvet Island" ? 'selected' : '' }}>Bouvet Island</option>
                                    <option value="Brazil"{{ old('country', $tickets->country_for_collection) == "Brazil" ? 'selected' : '' }}>Brazil</option>
                                    <option value="British Indian Ocean Territory"{{ old('country', $tickets->country_for_collection) == "British Indian Ocean Territory" ? 'selected' : '' }}>British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam"{{ old('country', $tickets->country_for_collection) == "Brunei Darussalam" ? 'selected' : '' }}>Brunei Darussalam</option>
                                    <option value="Bulgaria"{{ old('country', $tickets->country_for_collection) == "Bulgaria" ? 'selected' : '' }}>Bulgaria</option>
                                    <option value="Burkina Faso"{{ old('country', $tickets->country_for_collection) == "Burkina Faso" ? 'selected' : '' }}>Burkina Faso</option>
                                    <option value="Burundi"{{ old('country', $tickets->country_for_collection) == "Burundi" ? 'selected' : '' }}>Burundi</option>
                                    <option value="Cambodia"{{ old('country', $tickets->country_for_collection) == "Cambodia" ? 'selected' : '' }}>Cambodia</option>
                                    <option value="Cameroon"{{ old('country', $tickets->country_for_collection) == "Cameroon" ? 'selected' : '' }}>Cameroon</option>
                                    <option value="Canada"{{ old('country', $tickets->country_for_collection) == "Canada" ? 'selected' : '' }}>Canada</option>
                                    <option value="Cape Verde"{{ old('country', $tickets->country_for_collection) == "Cape Verde" ? 'selected' : '' }}>Cape Verde</option>
                                    <option value="Cayman Islands"{{ old('country', $tickets->country_for_collection) == "Cayman Islands" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Cayman Islands</option>
                                    <option value="Central African Republic"{{ old('country', $tickets->country_for_collection) == "Central African Republic" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Central African Republic</option>
                                    <option value="Chad"{{ old('country', $tickets->country_for_collection) == "Chad" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Chad</option>
                                    <option value="Chile"{{ old('country', $tickets->country_for_collection) == "Chile" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Chile</option>
                                    <option value="China"{{ old('country', $tickets->country_for_collection) == "China" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>China</option>
                                    <option value="Christmas Island"{{ old('country', $tickets->country_for_collection) == "Christmas Island" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands"{{ old('country', $tickets->country_for_collection) == "Cocos (Keeling) Islands" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
                                    <option value="Colombia"{{ old('country', $tickets->country_for_collection) == "Colombia" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Colombia</option>
                                    <option value="Comoros"{{ old('country', $tickets->country_for_collection) == "Comoros" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Comoros</option>
                                    <option value="Congo"{{ old('country', $tickets->country_for_collection) == "Congo" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Congo</option>
                                    <option value="Congo, The Democratic Republic of The"{{ old('country', $tickets->country_for_collection) == "Congo, The Democratic Republic of The" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands"{{ old('country', $tickets->country_for_collection) == "Cook Islands" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Cook Islands</option>
                                    <option value="Costa Rica"{{ old('country', $tickets->country_for_collection) == "Costa Rica" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Costa Rica</option>
                                    <option value="Cote D'ivoire"{{ old('country', $tickets->country_for_collection) == "Cote D'ivoire" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Cote D'ivoire</option>
                                    <option value="Croatia"{{ old('country', $tickets->country_for_collection) == "Croatia" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Croatia</option>
                                    <option value="Cuba"{{ old('country', $tickets->country_for_collection) == "Cuba" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Cuba</option>
                                    <option value="Cyprus"{{ old('country', $tickets->country_for_collection) == "Cyprus" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Cyprus</option>
                                    <option value="Czech Republic"{{ old('country', $tickets->country_for_collection) == "Czech Republic" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Czech Republic</option>
                                    <option value="Denmark"{{ old('country', $tickets->country_for_collection) == "Denmark" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Denmark</option>
                                    <option value="Djibouti"{{ old('country', $tickets->country_for_collection) == "Djibouti" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Djibouti</option>
                                    <option value="Dominica"{{ old('country', $tickets->country_for_collection) == "Dominica" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Dominica</option>
                                    <option value="Dominican Republic"{{ old('country', $tickets->country_for_collection) == "Dominican Republic" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Dominican Republic</option>
                                    <option value="Ecuador"{{ old('country', $tickets->country_for_collection) == "Ecuador" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Ecuador</option>
                                    <option value="Egypt"{{ old('country', $tickets->country_for_collection) == "Egypt" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>Egypt</option>
                                    <option value="El Salvador"{{ old('country', $tickets->country_for_collection) == "El Salvador" ? 'selected' : '' }}{{ old('country', $tickets->country_for_collection) == "contry_name" ? 'selected' : '' }}>El Salvador</option>
                                    <option value="Equatorial Guinea"{{ old('country', $tickets->country_for_collection) == "Equatorial Guinea" ? 'selected' : '' }}>Equatorial Guinea</option>
                                    <option value="Eritrea"{{ old('country', $tickets->country_for_collection) == "Eritrea" ? 'selected' : '' }}>Eritrea</option>
                                    <option value="Estonia"{{ old('country', $tickets->country_for_collection) == "Estonia" ? 'selected' : '' }}>Estonia</option>
                                    <option value="Ethiopia"{{ old('country', $tickets->country_for_collection) == "Ethiopia" ? 'selected' : '' }}>Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)"{{ old('country', $tickets->country_for_collection) == "Falkland Islands (Malvinas)" ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands"{{ old('country', $tickets->country_for_collection) == "Faroe Islands" ? 'selected' : '' }}>Faroe Islands</option>
                                    <option value="Fiji"{{ old('country', $tickets->country_for_collection) == "Fiji" ? 'selected' : '' }}>Fiji</option>
                                    <option value="Finland"{{ old('country', $tickets->country_for_collection) == "Finland" ? 'selected' : '' }}>Finland</option>
                                    <option value="France"{{ old('country', $tickets->country_for_collection) == "France" ? 'selected' : '' }}>France</option>
                                    <option value="French Guiana"{{ old('country', $tickets->country_for_collection) == "French Guiana" ? 'selected' : '' }}>French Guiana</option>
                                    <option value="French Polynesia"{{ old('country', $tickets->country_for_collection) == "French Polynesia" ? 'selected' : '' }}>French Polynesia</option>
                                    <option value="French Southern Territories"{{ old('country', $tickets->country_for_collection) == "French Southern Territories" ? 'selected' : '' }}>French Southern Territories</option>
                                    <option value="Gabon"{{ old('country', $tickets->country_for_collection) == "Gabon" ? 'selected' : '' }}>Gabon</option>
                                    <option value="Gambia"{{ old('country', $tickets->country_for_collection) == "Gambia" ? 'selected' : '' }}>Gambia</option>
                                    <option value="Georgia"{{ old('country', $tickets->country_for_collection) == "Georgia" ? 'selected' : '' }}>Georgia</option>
                                    <option value="Germany"{{ old('country', $tickets->country_for_collection) == "Germany" ? 'selected' : '' }}>Germany</option>
                                    <option value="Ghana"{{ old('country', $tickets->country_for_collection) == "Ghana" ? 'selected' : '' }}>Ghana</option>
                                    <option value="Gibraltar"{{ old('country', $tickets->country_for_collection) == "Gibraltar" ? 'selected' : '' }}>Gibraltar</option>
                                    <option value="Greece"{{ old('country', $tickets->country_for_collection) == "Greece" ? 'selected' : '' }}>Greece</option>
                                    <option value="Greenland"{{ old('country', $tickets->country_for_collection) == "Greenland" ? 'selected' : '' }}>Greenland</option>
                                    <option value="Grenada"{{ old('country', $tickets->country_for_collection) == "Grenada" ? 'selected' : '' }}>Grenada</option>
                                    <option value="Guadeloupe"{{ old('country', $tickets->country_for_collection) == "Guadeloupe" ? 'selected' : '' }}>Guadeloupe</option>
                                    <option value="Guam"{{ old('country', $tickets->country_for_collection) == "Guam" ? 'selected' : '' }}>Guam</option>
                                    <option value="Guatemala"{{ old('country', $tickets->country_for_collection) == "Guatemala" ? 'selected' : '' }}>Guatemala</option>
                                    <option value="Guernsey"{{ old('country', $tickets->country_for_collection) == "Guernsey" ? 'selected' : '' }}>Guernsey</option>
                                    <option value="Guinea"{{ old('country', $tickets->country_for_collection) == "Guinea" ? 'selected' : '' }}>Guinea</option>
                                    <option value="Guinea-bissau"{{ old('country', $tickets->country_for_collection) == "Guinea-bissau" ? 'selected' : '' }}>Guinea-bissau</option>
                                    <option value="Guyana"{{ old('country', $tickets->country_for_collection) == "Guyana" ? 'selected' : '' }}>Guyana</option>
                                    <option value="Haiti"{{ old('country', $tickets->country_for_collection) == "Haiti" ? 'selected' : '' }}>Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands"{{ old('country', $tickets->country_for_collection) == "Heard Island and Mcdonald Islands" ? 'selected' : '' }}>Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)"{{ old('country', $tickets->country_for_collection) == "Holy See (Vatican City State)" ? 'selected' : '' }}>Holy See (Vatican City State)</option>
                                    <option value="Honduras"{{ old('country', $tickets->country_for_collection) == "Honduras" ? 'selected' : '' }}>Honduras</option>
                                    <option value="Hong Kong"{{ old('country', $tickets->country_for_collection) == "Hong Kong" ? 'selected' : '' }}>Hong Kong</option>
                                    <option value="Hungary"{{ old('country', $tickets->country_for_collection) == "Hungary" ? 'selected' : '' }}>Hungary</option>
                                    <option value="Iceland"{{ old('country', $tickets->country_for_collection) == "Iceland" ? 'selected' : '' }}>Iceland</option>
                                    <option value="India"{{ old('country', $tickets->country_for_collection) == "India" ? 'selected' : '' }}>India</option>
                                    <option value="Indonesia"{{ old('country', $tickets->country_for_collection) == "Indonesia" ? 'selected' : '' }}>Indonesia</option>
                                    <option value="Iran, Islamic Republic of"{{ old('country', $tickets->country_for_collection) == "Iran, Islamic Republic of" ? 'selected' : '' }}>Iran, Islamic Republic of</option>
                                    <option value="Iraq"{{ old('country', $tickets->country_for_collection) == "Iraq" ? 'selected' : '' }}>Iraq</option>
                                    <option value="Ireland"{{ old('country', $tickets->country_for_collection) == "Ireland" ? 'selected' : '' }}>Ireland</option>
                                    <option value="Isle of Man"{{ old('country', $tickets->country_for_collection) == "Isle of Man" ? 'selected' : '' }}>Isle of Man</option>
                                    <option value="Israel"{{ old('country', $tickets->country_for_collection) == "Israel" ? 'selected' : '' }}>Israel</option>
                                    <option value="Italy"{{ old('country', $tickets->country_for_collection) == "Italy" ? 'selected' : '' }}>Italy</option>
                                    <option value="Jamaica"{{ old('country', $tickets->country_for_collection) == "Jamaica" ? 'selected' : '' }}>Jamaica</option>
                                    <option value="Japan"{{ old('country', $tickets->country_for_collection) == "Japan" ? 'selected' : '' }}>Japan</option>
                                    <option value="Jersey"{{ old('country', $tickets->country_for_collection) == "Jersey" ? 'selected' : '' }}>Jersey</option>
                                    <option value="Jordan"{{ old('country', $tickets->country_for_collection) == "Jordan" ? 'selected' : '' }}>Jordan</option>
                                    <option value="Kazakhstan"{{ old('country', $tickets->country_for_collection) == "Kazakhstan" ? 'selected' : '' }}>Kazakhstan</option>
                                    <option value="Kenya"{{ old('country', $tickets->country_for_collection) == "Kenya" ? 'selected' : '' }}>Kenya</option>
                                    <option value="Kiribati"{{ old('country', $tickets->country_for_collection) == "Kiribati" ? 'selected' : '' }}>Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of"{{ old('country', $tickets->country_for_collection) == "Korea, Democratic People's Republic of" ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of"{{ old('country', $tickets->country_for_collection) == "Korea, Republic of" ? 'selected' : '' }}>Korea, Republic of</option>
                                    <option value="Kuwait"{{ old('country', $tickets->country_for_collection) == "Kuwait" ? 'selected' : '' }}>Kuwait</option>
                                    <option value="Kyrgyzstan"{{ old('country', $tickets->country_for_collection) == "Kyrgyzstan" ? 'selected' : '' }}>Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic"{{ old('country', $tickets->country_for_collection) == "Lao People's Democratic Republic" ? 'selected' : '' }}>Lao People's Democratic Republic</option>
                                    <option value="Latvia"{{ old('country', $tickets->country_for_collection) == "Latvia" ? 'selected' : '' }}>Latvia</option>
                                    <option value="Lebanon"{{ old('country', $tickets->country_for_collection) == "Lebanon" ? 'selected' : '' }}>Lebanon</option>
                                    <option value="Lesotho"{{ old('country', $tickets->country_for_collection) == "Lesotho" ? 'selected' : '' }}>Lesotho</option>
                                    <option value="Liberia"{{ old('country', $tickets->country_for_collection) == "Liberia" ? 'selected' : '' }}>Liberia</option>
                                    <option value="Libyan Arab Jamahiriya"{{ old('country', $tickets->country_for_collection) == "Libyan Arab Jamahiriya" ? 'selected' : '' }}>Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein"{{ old('country', $tickets->country_for_collection) == "Liechtenstein" ? 'selected' : '' }}>Liechtenstein</option>
                                    <option value="Lithuania"{{ old('country', $tickets->country_for_collection) == "Lithuania" ? 'selected' : '' }}>Lithuania</option>
                                    <option value="Luxembourg"{{ old('country', $tickets->country_for_collection) == "Luxembourg" ? 'selected' : '' }}>Luxembourg</option>
                                    <option value="Macao"{{ old('country', $tickets->country_for_collection) == "Macao" ? 'selected' : '' }}>Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of"{{ old('country', $tickets->country_for_collection) == "Macedonia, The Former Yugoslav Republic of" ? 'selected' : '' }}>Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar"{{ old('country', $tickets->country_for_collection) == "Madagascar" ? 'selected' : '' }}>Madagascar</option>
                                    <option value="Malawi"{{ old('country', $tickets->country_for_collection) == "Malawi" ? 'selected' : '' }}>Malawi</option>
                                    <option value="Malaysia"{{ old('country', $tickets->country_for_collection) == "Malaysia" ? 'selected' : '' }}>Malaysia</option>
                                    <option value="Maldives"{{ old('country', $tickets->country_for_collection) == "Maldives" ? 'selected' : '' }}>Maldives</option>
                                    <option value="Mali"{{ old('country', $tickets->country_for_collection) == "Mali" ? 'selected' : '' }}>Mali</option>
                                    <option value="Malta"{{ old('country', $tickets->country_for_collection) == "Malta" ? 'selected' : '' }}>Malta</option>
                                    <option value="Marshall Islands"{{ old('country', $tickets->country_for_collection) == "Marshall Islands" ? 'selected' : '' }}>Marshall Islands</option>
                                    <option value="Martinique"{{ old('country', $tickets->country_for_collection) == "Martinique" ? 'selected' : '' }}>Martinique</option>
                                    <option value="Mauritania"{{ old('country', $tickets->country_for_collection) == "Mauritania" ? 'selected' : '' }}>Mauritania</option>
                                    <option value="Mauritius"{{ old('country', $tickets->country_for_collection) == "Mauritius" ? 'selected' : '' }}>Mauritius</option>
                                    <option value="Mayotte"{{ old('country', $tickets->country_for_collection) == "Mayotte" ? 'selected' : '' }}>Mayotte</option>
                                    <option value="Mexico"{{ old('country', $tickets->country_for_collection) == "Mexico" ? 'selected' : '' }}>Mexico</option>
                                    <option value="Micronesia, Federated States of"{{ old('country', $tickets->country_for_collection) == "Micronesia, Federated States of" ? 'selected' : '' }}>Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of"{{ old('country', $tickets->country_for_collection) == "Moldova, Republic of" ? 'selected' : '' }}>Moldova, Republic of</option>
                                    <option value="Monaco"{{ old('country', $tickets->country_for_collection) == "Monaco" ? 'selected' : '' }}>Monaco</option>
                                    <option value="Mongolia"{{ old('country', $tickets->country_for_collection) == "Mongolia" ? 'selected' : '' }}>Mongolia</option>
                                    <option value="Montenegro"{{ old('country', $tickets->country_for_collection) == "Montenegro" ? 'selected' : '' }}>Montenegro</option>
                                    <option value="Montserrat"{{ old('country', $tickets->country_for_collection) == "Montserrat" ? 'selected' : '' }}>Montserrat</option>
                                    <option value="Morocco"{{ old('country', $tickets->country_for_collection) == "Morocco" ? 'selected' : '' }}>Morocco</option>
                                    <option value="Mozambique"{{ old('country', $tickets->country_for_collection) == "Mozambique" ? 'selected' : '' }}>Mozambique</option>
                                    <option value="Myanmar"{{ old('country', $tickets->country_for_collection) == "Myanmar" ? 'selected' : '' }}>Myanmar</option>
                                    <option value="Namibia"{{ old('country', $tickets->country_for_collection) == "Namibia" ? 'selected' : '' }}>Namibia</option>
                                    <option value="Nauru"{{ old('country', $tickets->country_for_collection) == "Nauru" ? 'selected' : '' }}>Nauru</option>
                                    <option value="Nepal"{{ old('country', $tickets->country_for_collection) == "Nepal" ? 'selected' : '' }}>Nepal</option>
                                    <option value="Netherlands"{{ old('country', $tickets->country_for_collection) == "Netherlands" ? 'selected' : '' }}>Netherlands</option>
                                    <option value="Netherlands Antilles"{{ old('country', $tickets->country_for_collection) == "Netherlands Antilles" ? 'selected' : '' }}>Netherlands Antilles</option>
                                    <option value="New Caledonia"{{ old('country', $tickets->country_for_collection) == "New Caledonia" ? 'selected' : '' }}>New Caledonia</option>
                                    <option value="New Zealand"{{ old('country', $tickets->country_for_collection) == "New Zealand" ? 'selected' : '' }}>New Zealand</option>
                                    <option value="Nicaragua"{{ old('country', $tickets->country_for_collection) == "Nicaragua" ? 'selected' : '' }}>Nicaragua</option>
                                    <option value="Niger"{{ old('country', $tickets->country_for_collection) == "Niger" ? 'selected' : '' }}>Niger</option>
                                    <option value="Nigeria"{{ old('country', $tickets->country_for_collection) == "Nigeria" ? 'selected' : '' }}>Nigeria</option>
                                    <option value="Niue"{{ old('country', $tickets->country_for_collection) == "Niue" ? 'selected' : '' }}>Niue</option>
                                    <option value="Norfolk Island"{{ old('country', $tickets->country_for_collection) == "Norfolk Island" ? 'selected' : '' }}>Norfolk Island</option>
                                    <option value="Northern Mariana Islands"{{ old('country', $tickets->country_for_collection) == "Northern Mariana Islands" ? 'selected' : '' }}>Northern Mariana Islands</option>
                                    <option value="Norway"{{ old('country', $tickets->country_for_collection) == "Norway" ? 'selected' : '' }}>Norway</option>
                                    <option value="Oman"{{ old('country', $tickets->country_for_collection) == "Oman" ? 'selected' : '' }}>Oman</option>
                                    <option value="Pakistan"{{ old('country', $tickets->country_for_collection) == "Pakistan" ? 'selected' : '' }}>Pakistan</option>
                                    <option value="Palau"{{ old('country', $tickets->country_for_collection) == "Palau" ? 'selected' : '' }}>Palau</option>
                                    <option value="Palestinian Territory, Occupied"{{ old('country', $tickets->country_for_collection) == "Palestinian Territory, Occupied" ? 'selected' : '' }}>Palestinian Territory, Occupied</option>
                                    <option value="Panama"{{ old('country', $tickets->country_for_collection) == "Panama" ? 'selected' : '' }}>Panama</option>
                                    <option value="Papua New Guinea"{{ old('country', $tickets->country_for_collection) == "Papua New Guinea" ? 'selected' : '' }}>Papua New Guinea</option>
                                    <option value="Paraguay"{{ old('country', $tickets->country_for_collection) == "Paraguay" ? 'selected' : '' }}>Paraguay</option>
                                    <option value="Peru"{{ old('country', $tickets->country_for_collection) == "Peru" ? 'selected' : '' }}>Peru</option>
                                    <option value="Philippines"{{ old('country', $tickets->country_for_collection) == "Philippines" ? 'selected' : '' }}>Philippines</option>
                                    <option value="Pitcairn"{{ old('country', $tickets->country_for_collection) == "Pitcairn" ? 'selected' : '' }}>Pitcairn</option>
                                    <option value="Poland"{{ old('country', $tickets->country_for_collection) == "Poland" ? 'selected' : '' }}>Poland</option>
                                    <option value="Portugal"{{ old('country', $tickets->country_for_collection) == "Portugal" ? 'selected' : '' }}>Portugal</option>
                                    <option value="Puerto Rico"{{ old('country', $tickets->country_for_collection) == "Puerto Rico" ? 'selected' : '' }}>Puerto Rico</option>
                                    <option value="Qatar"{{ old('country', $tickets->country_for_collection) == "Qatar" ? 'selected' : '' }}>Qatar</option>
                                    <option value="Reunion"{{ old('country', $tickets->country_for_collection) == "Reunion" ? 'selected' : '' }}>Reunion</option>
                                    <option value="Romania"{{ old('country', $tickets->country_for_collection) == "Romania" ? 'selected' : '' }}>Romania</option>
                                    <option value="Russian Federation"{{ old('country', $tickets->country_for_collection) == "Russian Federation" ? 'selected' : '' }}>Russian Federation</option>
                                    <option value="Rwanda"{{ old('country', $tickets->country_for_collection) == "Rwanda" ? 'selected' : '' }}>Rwanda</option>
                                    <option value="Saint Helena"{{ old('country', $tickets->country_for_collection) == "Saint Helena" ? 'selected' : '' }}>Saint Helena</option>
                                    <option value="Saint Kitts and Nevis"{{ old('country', $tickets->country_for_collection) == "Saint Kitts and Nevis" ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia"{{ old('country', $tickets->country_for_collection) == "Saint Lucia" ? 'selected' : '' }}>Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon"{{ old('country', $tickets->country_for_collection) == "Saint Pierre and Miquelon" ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines"{{ old('country', $tickets->country_for_collection) == "Saint Vincent and The Grenadines" ? 'selected' : '' }}>Saint Vincent and The Grenadines</option>
                                    <option value="Samoa"{{ old('country', $tickets->country_for_collection) == "Samoa" ? 'selected' : '' }}>Samoa</option>
                                    <option value="San Marino"{{ old('country', $tickets->country_for_collection) == "San Marino" ? 'selected' : '' }}>San Marino</option>
                                    <option value="Sao Tome and Principe"{{ old('country', $tickets->country_for_collection) == "Sao Tome and Principe" ? 'selected' : '' }}>Sao Tome and Principe</option>
                                    <option value="Saudi Arabia"{{ old('country', $tickets->country_for_collection) == "Saudi Arabia" ? 'selected' : '' }}>Saudi Arabia</option>
                                    <option value="Senegal"{{ old('country', $tickets->country_for_collection) == "Senegal" ? 'selected' : '' }}>Senegal</option>
                                    <option value="Serbia"{{ old('country', $tickets->country_for_collection) == "Serbia" ? 'selected' : '' }}>Serbia</option>
                                    <option value="Seychelles"{{ old('country', $tickets->country_for_collection) == "Seychelles" ? 'selected' : '' }}>Seychelles</option>
                                    <option value="Sierra Leone"{{ old('country', $tickets->country_for_collection) == "Sierra Leone" ? 'selected' : '' }}>Sierra Leone</option>
                                    <option value="Singapore"{{ old('country', $tickets->country_for_collection) == "Singapore" ? 'selected' : '' }}>Singapore</option>
                                    <option value="Slovakia"{{ old('country', $tickets->country_for_collection) == "Slovakia" ? 'selected' : '' }}>Slovakia</option>
                                    <option value="Slovenia"{{ old('country', $tickets->country_for_collection) == "Slovenia" ? 'selected' : '' }}>Slovenia</option>
                                    <option value="Solomon Islands"{{ old('country', $tickets->country_for_collection) == "Solomon Islands" ? 'selected' : '' }}>Solomon Islands</option>
                                    <option value="Somalia"{{ old('country', $tickets->country_for_collection) == "Somalia" ? 'selected' : '' }}>Somalia</option>
                                    <option value="South Africa"{{ old('country', $tickets->country_for_collection) == "South Africa" ? 'selected' : '' }}>South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands"{{ old('country', $tickets->country_for_collection) == "South Georgia and The South Sandwich Islands" ? 'selected' : '' }}>South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain"{{ old('country', $tickets->country_for_collection) == "Spain" ? 'selected' : '' }}>Spain</option>
                                    <option value="Sri Lanka"{{ old('country', $tickets->country_for_collection) == "Sri Lanka" ? 'selected' : '' }}>Sri Lanka</option>
                                    <option value="Sudan"{{ old('country', $tickets->country_for_collection) == "Sudan" ? 'selected' : '' }}>Sudan</option>
                                    <option value="Suriname"{{ old('country', $tickets->country_for_collection) == "Suriname" ? 'selected' : '' }}>Suriname</option>
                                    <option value="Svalbard and Jan Mayen"{{ old('country', $tickets->country_for_collection) == "Svalbard and Jan Mayen" ? 'selected' : '' }}>Svalbard and Jan Mayen</option>
                                    <option value="Swaziland"{{ old('country', $tickets->country_for_collection) == "Swaziland" ? 'selected' : '' }}>Swaziland</option>
                                    <option value="Sweden"{{ old('country', $tickets->country_for_collection) == "Sweden" ? 'selected' : '' }}>Sweden</option>
                                    <option value="Switzerland"{{ old('country', $tickets->country_for_collection) == "Switzerland" ? 'selected' : '' }}>Switzerland</option>
                                    <option value="Syrian Arab Republic"{{ old('country', $tickets->country_for_collection) == "Syrian Arab Republic" ? 'selected' : '' }}>Syrian Arab Republic</option>
                                    <option value="Taiwan"{{ old('country', $tickets->country_for_collection) == "Taiwan" ? 'selected' : '' }}>Taiwan</option>
                                    <option value="Tajikistan"{{ old('country', $tickets->country_for_collection) == "Tajikistan" ? 'selected' : '' }}>Tajikistan</option>
                                    <option value="Tanzania, United Republic of"{{ old('country', $tickets->country_for_collection) == "Tanzania, United Republic of" ? 'selected' : '' }}>Tanzania, United Republic of</option>
                                    <option value="Thailand"{{ old('country', $tickets->country_for_collection) == "Thailand" ? 'selected' : '' }}>Thailand</option>
                                    <option value="Timor-leste"{{ old('country', $tickets->country_for_collection) == "Timor-leste" ? 'selected' : '' }}>Timor-leste</option>
                                    <option value="Togo"{{ old('country', $tickets->country_for_collection) == "Togo" ? 'selected' : '' }}>Togo</option>
                                    <option value="Tokelau"{{ old('country', $tickets->country_for_collection) == "Tokelau" ? 'selected' : '' }}>Tokelau</option>
                                    <option value="Tonga"{{ old('country', $tickets->country_for_collection) == "Tonga" ? 'selected' : '' }}>Tonga</option>
                                    <option value="Trinidad and Tobago"{{ old('country', $tickets->country_for_collection) == "Trinidad and Tobago" ? 'selected' : '' }}>Trinidad and Tobago</option>
                                    <option value="Tunisia"{{ old('country', $tickets->country_for_collection) == "Tunisia" ? 'selected' : '' }}>Tunisia</option>
                                    <option value="Turkey"{{ old('country', $tickets->country_for_collection) == "Turkey" ? 'selected' : '' }}>Turkey</option>
                                    <option value="Turkmenistan"{{ old('country', $tickets->country_for_collection) == "Turkmenistan" ? 'selected' : '' }}>Turkmenistan</option>
                                    <option value="Turks and Caicos Islands"{{ old('country', $tickets->country_for_collection) == "Turks and Caicos Islands" ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                    <option value="Tuvalu"{{ old('country', $tickets->country_for_collection) == "Tuvalu" ? 'selected' : '' }}>Tuvalu</option>
                                    <option value="Uganda"{{ old('country', $tickets->country_for_collection) == "Uganda" ? 'selected' : '' }}>Uganda</option>
                                    <option value="Ukraine"{{ old('country', $tickets->country_for_collection) == "Ukraine" ? 'selected' : '' }}>Ukraine</option>
                                    <option value="United Arab Emirates"{{ old('country', $tickets->country_for_collection) == "United Arab Emirates" ? 'selected' : '' }}>United Arab Emirates</option>
                                    <option selected value="United Kingdom"{{ old('country', $tickets->country_for_collection) == "United Kingdom" ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="United States"{{ old('country', $tickets->country_for_collection) == "United States" ? 'selected' : '' }}>United States</option>
                                    <option value="United States Minor Outlying Islands"{{ old('country', $tickets->country_for_collection) == "United States Minor Outlying Islands" ? 'selected' : '' }}>United States Minor Outlying Islands</option>
                                    <option value="Uruguay"{{ old('country', $tickets->country_for_collection) == "Uruguay" ? 'selected' : '' }}>Uruguay</option>
                                    <option value="Uzbekistan"{{ old('country', $tickets->country_for_collection) == "Uzbekistan" ? 'selected' : '' }}>Uzbekistan</option>
                                    <option value="Vanuatu"{{ old('country', $tickets->country_for_collection) == "Vanuatu" ? 'selected' : '' }}>Vanuatu</option>
                                    <option value="Venezuela"{{ old('country', $tickets->country_for_collection) == "Venezuela" ? 'selected' : '' }}>Venezuela</option>
                                    <option value="Viet Nam"{{ old('country', $tickets->country_for_collection) == "Viet Nam" ? 'selected' : '' }}>Viet Nam</option>
                                    <option value="Virgin Islands, British"{{ old('country', $tickets->country_for_collection) == "Virgin Islands, British" ? 'selected' : '' }}>Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S."{{ old('country', $tickets->country_for_collection) == "Virgin Islands, U.S." ? 'selected' : '' }}>Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna"{{ old('country', $tickets->country_for_collection) == "Wallis and Futuna" ? 'selected' : '' }}>Wallis and Futuna</option>
                                    <option value="Western Sahara"{{ old('country', $tickets->country_for_collection) == "Western Sahara" ? 'selected' : '' }}>Western Sahara</option>
                                    <option value="Yemen"{{ old('country', $tickets->country_for_collection) == "Yemen" ? 'selected' : '' }}>Yemen</option>
                                    <option value="Zambia"{{ old('country', $tickets->country_for_collection) == "Zambia" ? 'selected' : '' }}>Zambia</option>
                                    <option value="Zimbabwe"{{ old('country', $tickets->country_for_collection) == "Zimbabwe" ? 'selected' : '' }}>Zimbabwe</option>
                                </select>
                                @error('country')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                        </div>
                        @else
                        <div class="tickets ticket_address" style="border-bottom: 1px solid #cecece; display:none">
                            <div>
                                <label  style="font-size: 15px; font-weight:bold; color:red">ADDRESS FOR COLLECTION:</label>
                                <label  style="font-size: 15px; font-weight:bold;">Address</label>
                                <input type="text" name="address" placeholder="Address" class="form-control" >
                                @error('address')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                            <div>
                                <label  style="font-size: 15px; font-weight:bold;">Zipcode</label>
                                <input type="text" name="zipcode" placeholder="ZipCode" class="form-control" >
                                @error('zipcode')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                            <div>
                                <label  style="font-size: 15px; font-weight:bold;">City</label>
                                <input type="text" name="city" placeholder="City" class="form-control" >
                                @error('city')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                           <div>
                                <label  style="font-size: 15px; font-weight:bold;">Country</label>
                                <select id="country"name="country" class="form">
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option selected value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                                @error('country')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                        </div>
                        @endif

                    </div>
                    <br>
                    <button class="button" type="submit">Update Ticket</button>
                </form>
            </div>
            <div id="primary" class="col-md-6 sticky" style="margin-top: 50px;">
                    <img src="{{ asset($tickets->venue_image)}}">
            </div>
        </div>

    </div>
</section>

@endsection
