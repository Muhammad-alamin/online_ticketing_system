@extends('front.layouts.master')
@section('content')
<!-- Start of Main -->
<main class="main order">

    <!-- Start of PageContent -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="order-success text-center font-weight-bolder text-dark">
                <i class="fas fa-check"></i>
                Thank you. Your order has been received.
            </div>
            <!-- End of Order Success -->

            <ul class="order-view list-style-none">
                <li>
                    <label>Order number</label>
                    <strong>{{Session::get('order_id')}}</strong>
                </li>
                <li>
                    <label>Status</label>
                    <strong>{{Session::get('status')}}</strong>
                </li>
                <li>
                    <label>Date</label>
                    <strong>{{Session::get('date')}}</strong>
                </li>
                <li>
                    <label>Total</label>
                    <strong>{{number_format(Session::get('grand_total'))}}</strong>
                </li>
                <li>
                    <label>Payment method</label>

                    <strong>{{Session::get('payment_method')}}</strong>
                </li>
            </ul>
            <!-- End of Order View -->

            <a href="{{route('Home')}}" class="btn btn-success btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->
@endsection

<?php

Session::forget('order_id');
Session::forget('status');
Session::forget('date');
Session::forget('grand_total');
Session::forget('payment_method');

?>
