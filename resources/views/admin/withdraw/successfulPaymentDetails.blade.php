@extends('admin.layouts.master')
@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title page-title">Transection Details</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card text-white">
                                    <div class="card-header bg-dark">Withdrawl Details Info:</div>
                                    @if (isset($withdrawRequest->card_number))
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Card Number:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->card_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Transaction ID:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->transaction_id }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Withdraw Amount:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->withdraw_amount }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Transaction Complete Date:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->vendor_message }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Your Message:</span>
                                                        <span class="profile-ud-value">{{$product->product_discount_price}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Admin Message:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->admin_message }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Status:</span>
                                                        @if($withdrawRequest->status == 'Pending')
                                                            <span class="badge rounded-pill text-white bg-warning">{{$withdrawRequest->status}}</span>
                                                        @elseif ($withdrawRequest->status == 'Processing')
                                                            <span class="badge rounded-pill text-white bg-secondary">{{$withdrawRequest->status}}</span>
                                                        @elseif ($withdrawRequest->status == 'Canceled')
                                                            <span class="badge rounded-pill text-white bg-danger">{{$withdrawRequest->status}}</span>
                                                        @elseif ($withdrawRequest->status == 'Complete')
                                                            <span class="badge rounded-pill text-white bg-success">{{$withdrawRequest->status}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Withdraw Request Date:</span>
                                                            <span class="profile-ud-value">{{date('Y-m-d',strtotime($withdrawRequest->created_at))}}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    @else
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Bank Name:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->bank_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Branch Name:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->branch_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Number:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->account_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Holder name:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->account_holder_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Routing Number:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->routing_number }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Description:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->description }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Transaction ID:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->transaction_id }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Withdraw Amount:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->withdraw_amount }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Transaction Complete Date:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->complete_date }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Vendor Message:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->vendor_message }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Admin Message:</span>
                                                        <span class="profile-ud-value">{{ $withdrawRequest->admin_message }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Status:</span>
                                                        @if($withdrawRequest->status == 'Pending')
                                                            <span class="badge rounded-pill text-white bg-warning">{{$withdrawRequest->status}}</span>
                                                        @elseif ($withdrawRequest->status == 'Processing')
                                                            <span class="badge rounded-pill text-white bg-secondary">{{$withdrawRequest->status}}</span>
                                                        @elseif ($withdrawRequest->status == 'Canceled')
                                                            <span class="badge rounded-pill text-white bg-danger">{{$withdrawRequest->status}}</span>
                                                        @elseif ($withdrawRequest->status == 'Complete')
                                                            <span class="badge rounded-pill text-white bg-success">{{$withdrawRequest->status}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Withdraw Request Date:</span>
                                                            <span class="profile-ud-value">{{date('Y-m-d',strtotime($withdrawRequest->created_at))}}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
