@extends('seller.layouts.master')
@section('content')

<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>Edit Payment Info</h1>
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
                    <label><a href="{{ route('seller.sales') }}" class="@if (request()->routeIs('seller.sales')) menu-active-color @endif">Sales</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('user.details') }}" class="@if (request()->routeIs('user.details')) menu-active-color @endif">Account</a></label>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Payment Details</h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="section-choose-how-many-tickets">
                    <ul class="ticket-nav">
                        <li class="selected"><a href="#"><span>£ {{ $total_earning }}</span> Total Earnings</a></li>
                        @if (isset($total_withdraw))
                        <li class="selected"><a href="#"><span>£ {{ $total_earning -  $total_withdraw}}</span> Availabe Balance</a></li>
                        @else
                        <li class="selected"><a href="#"><span>£ {{ $total_earning }}</span> Availabe Balance</a></li>
                        @endif
                        <li class="selected"><a href="#"><span>£ {{ $total_withdraw }}</span> Received Amount</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-artist-content">
    <div class="container">
        <div class="row">
            @if (isset($account_info))
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="artist-event-item">
                    <div class="row">
                        @if (isset($account_info->card_number))
                        <div class="artist-event-item-info col-sm-9">
                            <h3>Bank Info Details</h3>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Card Number</span>
                                    {{ $account_info->card_number }}
                                </li>
                            </ul>
                        </div>
                        @else
                        <div class="artist-event-item-info col-sm-9">
                            <h3>Bank Info Details</h3>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Bank Name</span>
                                    {{ $account_info->bank_name }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Branch Name</span>
                                    {{ $account_info->branch_name }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Acount Number</span>
                                    {{ $account_info->account_number }}
                                </li>
                            </ul>
                            <br>
                            <br>
                            <ul class="row">
                                <li class="col-sm-5">
                                    <span>Account Holder Name</span>
                                    {{ $account_info->account_holder_name }}
                                </li>
                                <li class="col-sm-4">
                                    <span>Routing Number</span>
                                    {{ $account_info->routing_number }}
                                </li>
                                <li class="col-sm-3">
                                    <span>Description</span>
                                    {{ $account_info->description }}
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="section-select-payment-method">
                    <div class="tab-content clearfix">
                        <div role="tabpanel" class="tab-pane active" id="credit-card">
                            <form action="{{route('bank_info.update', encrypt($account_info->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                @csrf
                                @if (isset($account_info->card_number))

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bank_info_paypal_id">Card Number :</label>
                                        <input id="bank_info_paypal_id" type="text" class="form-control" placeholder="Card Number" name="card_number"  value="{{old('card_number', isset($account_info)?$account_info->card_number:null)}}">
                                    </div>
                                </div>
                                @else

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bank_info_name">Bank Name:</label>
                                        <input id="bank_info_name" type="text" class="form-control" name="bank_name" placeholder="Bank Name"  value="{{old('bank_name', isset($account_info)?$account_info->bank_name:null)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_info_code">Branch Name:</label>
                                        <input id="bank_info_code" type="text" class="form-control" name="branch_name" placeholder="Barnch name"  value="{{old('branch_name', isset($account_info)?$account_info->branch_name:null)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_info_number">Account Number:</label>
                                        <input id="bank_info_number" type="text" class="form-control" placeholder="Bank Account number" name="account_number"  value="{{old('account_number', isset($account_info)?$account_info->account_number:null)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_info_full_name">Account Holder Name:</label>
                                        <input id="bank_info_full_name" type="text" class="form-control" placeholder="Full name" name="account_holder_name"  value="{{old('account_holder_name', isset($account_info)?$account_info->account_holder_name:null)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_info_upi_id">Routing Number:</label>
                                        <input id="bank_info_upi_id" type="text" class="form-control" placeholder="Routing Number" name="routing_number"  value="{{old('routing_number', isset($account_info)?$account_info->routing_number:null)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_info_description">Description:</label>
                                        <textarea id="bank_info_description" type="text" class="form-control" placeholder="Description" name="description"  rows="4">{{old('description', isset($account_info)?$account_info->description:null)}}</textarea>
                                    </div>
                                </div>
                                @endif
                            <div class="form-group text-center">
                                <div class="form-group submit">
                                    <div class="ps-form__submit text-center">
                                        <button type="submit" class="btn btn-lg btn-primary">Update info</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
