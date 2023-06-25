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
                    <label><a href="{{route('seller.payout.info')}}" class="@if (request()->routeIs('seller.payout.info')) menu-active-color @endif">Payment</a></label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label><a href="{{ route('seller.sales') }}">Sales</a></label>
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
        <h1 class="entry-title">Account Info</h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="section-select-payment-method">
                    <!-- Tab panes -->
                    <div class="tab-content clearfix">
                        <div role="tabpanel" class="tab-pane active" id="credit-card">
                            <form method="post" action="{{ route('user.details.update', encrypt($users->id)) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name', isset($users)?$users->name:null)}}" placeholder="Enter Your Name">
                                        @error('name')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{old('email', isset($users)?$users->email:null)}}" placeholder="Enter Your Email">
                                        @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" value="{{old('mobile', isset($users)?$users->mobile:null)}}" placeholder="Enter Your Mobile Number">
                                        @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="{{old('address', isset($users)?$users->address:null)}}" placeholder="Enter Your Address">
                                        @error('address')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country" value="{{old('country', isset($users)?$users->country:null)}}" placeholder="Enter Your Country">
                                        @error('country')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{old('city', isset($users)?$users->city:null)}}" placeholder="Enter Your City">
                                        @error('city')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Zip Code</label>
                                        <input type="text" class="form-control" name="zip" value="{{old('city', isset($users)?$users->zip:null)}}" placeholder="Enter Your Zip Code">
                                        @error('zip')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <hr>
                                        <label><h4 style="color: #ff6600">Change Password: </h4></label>
                                        <hr>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Current Password</label>
                                        <br>
                                        <input type="password" class="form-control" name="cur_password" placeholder="Enter Your Current Password">
                                        <br>
                                        <br>
                                        @if(session('warning'))
                                            <span class="text-danger" style="color: red">{{session('warning')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <label>New Password</label>
                                        <br>
                                        <input type="password" class="form-control" name="new_password"  placeholder="Enter Your New Password">
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Confirm Password</label>
                                        <br>
                                        <input type="password" class="form-control" name="conf_password" placeholder="Confirm Your Password">
                                        <br>
                                        <br>
                                        @if(session('danger'))
                                            <span class="text-danger" style="color: red">{{session('danger')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-12">
                                            <button type="submit" class="primary-link">Update Info</button>
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
