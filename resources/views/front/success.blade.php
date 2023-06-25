@extends('front.layouts.master')
@section('content')
<!-- Start of Main -->

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                @if (session()->has('order_id'))
                <div class="section-download-ticket" style="padding-top:0px;">
                    {{-- <img src="images/download-ticket-img.png" alt="image"> --}}
                    <section class="section-artist-content" style="background-color: white; padding-top:0px;">
                        <div class="container">
                            <div class="row">
                                <div id="primary" class="col-sm-12 col-md-12">
                                    <div class="artist-event-item">
                                        <div class="row">
                                            <div class="artist-event-item-info col-sm-12">
                                                <h3>Order Details</h3>
                                                <ul class="row">
                                                    <li class="col-sm-5">
                                                        <span>Order number</span>
                                                        {{session()->get('order_id')}}
                                                    </li>
                                                    <li class="col-sm-4">
                                                        <span>Ticket Number</span>
                                                        {{session()->get('ticket_id')}}
                                                    </li>
                                                    <li class="col-sm-3">
                                                        <span>Order Status</span>
                                                        {{session()->get('status')}}
                                                    </li>
                                                </ul>
                                                <br>
                                                <br>
                                                <br>
                                                <ul class="row">
                                                    <li class="col-sm-5">
                                                        <span>Purchasing Date</span>
                                                        {{session()->get('purchasing_date')}}
                                                    </li>
                                                    <li class="col-sm-4">
                                                        <span>Total Price</span>
                                                        £ {{number_format(session()->get('grand_total',2))}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <p>Thanks for purchasing ticket. </p>
                    <p>You can easily manage your ticket by Dashboard.</p>
                    @if (session()->has('ticket_image'))
                    <div id="primary" class="col-sm-12 col-md-12">
						<div class="section-select-payment-method">
							<div class="section-select-payment-method-action">
								<div class="row">
									<div class="col-xs-6 col-sm-6">
                                        <a href="{{ route('download.images',encrypt(session()->get('ticket_image'))) }}" class="secondary-link">Download Ticket</a>
									</div>
									<div class="col-xs-6 col-sm-6">
                                        <a href="{{ route('Home') }}" class="secondary-link">Go to Home Page</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @else
                    <div id="primary" class="col-sm-12 col-md-12">
						<div class="section-select-payment-method">
							<div class="section-select-payment-method-action">
								<div class="row">
									<div class="col-xs-6 col-sm-6">
                                        <a href="{{ route('seller.orders') }}" class="secondary-link">See Details</a>
									</div>
									<div class="col-xs-6 col-sm-6">
                                        <a href="{{ route('Home') }}" class="secondary-link">Go to Home Page</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endif
                </div>
                @else
                <p>Purchase Your Ticket & Enjoy Your Live Match!!!</p>
                <div class="section-download-ticket">
                    <a href="{{ route('Home') }}" class="primary-link">Go to Home Page</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

<?php
use Illuminate\Support\Facades\Session;

Session::forget('order_id');
Session::forget('ticket_id');
Session::forget('status');
Session::forget('purchasing_date');
Session::forget('grand_total');

if (Session::has('ticket_image')) {
    Session::forget('ticket_image');
}
?>

