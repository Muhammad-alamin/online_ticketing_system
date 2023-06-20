@extends('front.layouts.master')
@section('content')
<!-- Start of Main -->
<main class="main order">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                <li class="passed"><a href="checkout.html">Checkout</a></li>
                <li class="active"><a href="order.html">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="order-success text-center font-weight-bolder text-dark">
                <i class="w-icon-exclamation-triangle"></i>
                <p class="text-danger">Opps! sorry. Your order has been canceled.</p>
            </div>

            <a href="{{route('Home')}}" class="btn btn-danger btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
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
