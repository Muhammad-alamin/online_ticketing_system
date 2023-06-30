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
                                <h3 class="nk-block-title page-title">Ticket / <strong class="text-primary small">Details</strong></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('admin.ticket.listing')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{route('admin.ticket.listing')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
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
                                                <h5 class="title">Ticket Details</h5>
                                                <p></p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket ID</span>
                                                        <span class="profile-ud-value">{{$tickets->ticket_id}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Match Name</span>
                                                        <span class="profile-ud-value">{{$tickets->match_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Venue Name</span>
                                                        <span class="profile-ud-value">{{$tickets->venue_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Section Name</span>
                                                        <span class="profile-ud-value">{{$tickets->section_name}}</span>
                                                    </div>
                                                </div>
                                                @if (isset($tickets->block_number))
                                                <div class="profile-ud-item col-lg-12">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Block Number</span>
                                                        <span class="profile-ud-value">{{$tickets->block_number}}</span>
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
                                                        <span class="profile-ud-value">{{$tickets->ticket_count}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Varient</span>
                                                        <span class="profile-ud-value">{{$tickets->ticket_varient}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Types</span>
                                                        <span class="profile-ud-value">{{$tickets->ticket_types}}</span>
                                                    </div>
                                                </div>
                                                @if (isset($tickets->ticket_restriction))
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Restriction</span>
                                                        <?php $ticket_restriction = json_decode($tickets->ticket_restriction) ?>
                                                        @foreach ($ticket_restriction as $ticket)
                                                        <span class="profile-ud-value">{{$ticket}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                @if (isset($tickets->image) && $tickets->ticket_types == 'E-ticket')
                                                <?php $ticket_image = json_decode($tickets->image) ?>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket Image</span>
                                                        @foreach ($ticket_image as $image)
                                                        <img src="{{ asset('images/selling/tickets/'.$image) }}" class="image-fluid" style="height: 60px; width:60px">
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Row</span>
                                                        <span class="profile-ud-value">{{$tickets->row}}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Price</span>
                                                        <span class="profile-ud-value">£ {{ number_format($tickets->price,2)}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ticket status</span>
                                                        @if($tickets->status == 'Active')
                                                            <span class="profile-ud-value text-success">{{$tickets->status}}</span>
                                                        @else
                                                            <span class="profile-ud-value text-danger">Declined</span>
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
                    @if ($tickets->ticket_types == 'Membership' || $tickets->ticket_types == 'Paper')
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
                                                        <span class="profile-ud-value">{{ $tickets->address_for_collection }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">City</span>
                                                        <span class="profile-ud-value">{{ $tickets->zip_code_for_collection }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Zip Code</span>
                                                        <span class="profile-ud-value">{{ $tickets->city_for_collection }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Country</span>
                                                        <span class="profile-ud-value">{{ $tickets->country_for_collection }}</span>
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
