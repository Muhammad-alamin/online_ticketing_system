@extends('admin.layouts.master')

@section('content')


    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Order / <strong class="text-primary small">Details</strong></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('admin.order.listing')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{route('admin.order.listing')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Details</span></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Order Details</h5>
                                                <p></p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Order ID</span>
                                                        <span class="profile-ud-value">{{$orders->order_id}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Invoice ID</span>
                                                        <span class="profile-ud-value">{{$orders->match_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Match Name</span>
                                                        <span class="profile-ud-value">{{$orders->venue_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Venue Name</span>
                                                        <span class="profile-ud-value">{{$orders->venue_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Section Name</span>
                                                        <span class="profile-ud-value">{{$orders->section_name}}</span>
                                                    </div>
                                                </div>
                                                @if (isset($orders->block_number))
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Block Number</span>
                                                        <span class="profile-ud-value">{{$orders->block_number}}</span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Quantity</span>
                                                        <span class="profile-ud-value">{{$orders->ticket_count}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Varient</span>
                                                        <span class="profile-ud-value">{{$orders->ticket_varient}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Types</span>
                                                        <span class="profile-ud-value">{{$orders->ticket_types}}</span>
                                                    </div>
                                                </div>
                                                @if (isset($orders->ticket_restriction))
                                                <div class="profile-ud-item col-lg-12">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Restriction</span>
                                                        <?php $ticket_restriction = json_decode($orders->ticket_restriction) ?>
                                                        @foreach ($ticket_restriction as $ticket)
                                                        <span class="profile-ud-value">{{$ticket}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Row</span>
                                                        <span class="profile-ud-value">{{$orders->row}}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Price</span>
                                                        <span class="profile-ud-value">£ {{ number_format($orders->price,2)}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Commission</span>
                                                        <span class="profile-ud-value">£ {{ number_format($orders->fee,2)}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Purchasing Date</span>
                                                        <span class="profile-ud-value">{{$orders->order_date}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket status</span>
                                                        @if($orders->status == 'Paid')
                                                            <span class="profile-ud-value text-success">{{$orders->status}}</span>
                                                        @else
                                                            <span class="profile-ud-value text-danger">Cancel</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Billing Details</span></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Billing Address Details</h5>
                                                <p></p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">First Name</span>
                                                        <span class="profile-ud-value">{{ $orders->first_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Last Name</span>
                                                        <span class="profile-ud-value">{{ $orders->last_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Email</span>
                                                        <span class="profile-ud-value">{{ $orders->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Address</span>
                                                        <span class="profile-ud-value">{{ $orders->address }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">City</span>
                                                        <span class="profile-ud-value">{{ $orders->city }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Country</span>
                                                        <span class="profile-ud-value">{{ $orders->country }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">State</span>
                                                        <span class="profile-ud-value">{{ $orders->state }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Phone</span>
                                                        <span class="profile-ud-value">{{ $orders->phone }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Post code</span>
                                                        <span class="profile-ud-value">{{ $orders->post_code }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Seller Details</span></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Seller Details</h5>
                                                <p></p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Seller Name</span>
                                                        <span class="profile-ud-value">{{ $orders->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Seller Email</span>
                                                        <span class="profile-ud-value">{{ $orders->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Seller Mobile No</span>
                                                        <span class="profile-ud-value">{{ $orders->mobile }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Seller Address</span>
                                                        <span class="profile-ud-value">{{ $orders->address }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->

                    @if ($orders->ticket_types == 'Membership' || $orders->ticket_types == 'Paper')
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Address For Collection</span></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Address For Collection</h5>
                                                <p></p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Address</span>
                                                        <span class="profile-ud-value">{{ $orders->address_for_collection }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">City</span>
                                                        <span class="profile-ud-value">{{ $orders->zip_code_for_collection }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Zip Code</span>
                                                        <span class="profile-ud-value">{{ $orders->city_for_collection }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Country</span>
                                                        <span class="profile-ud-value">{{ $orders->country_for_collection }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
