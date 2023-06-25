@extends('seller.layouts.master')
@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title page-title">Withdrawl Request</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    @if(Session::has('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ session('success') }}</strong>
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
                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-primary">
                                    <div class="card-header">Total Earnings</div>
                                    <div class="card-inner">
                                        <h5 class="card-title">$ {{ $total_earning }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-gray">
                                    <div class="card-header">Available Balance</div>
                                    <div class="card-inner">
                                        @if (isset($total_withdraw))
                                        <h5 class="card-title">$ {{ $total_earning -  $total_withdraw}}</h5>
                                        @else
                                        <h5 class="card-title">$ {{ $total_earning }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-danger">
                                    <div class="card-header">Total Withdrawl</div>
                                    <div class="card-inner">
                                        <h5 class="card-title">$ {{ $total_withdraw }}</h5>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('withdraw.request.store')}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount" id="amount" value="" placeholder="Amount you want to withdrawal">
                                                            @error('amount')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea id="description" type="text" class="form-control" placeholder="Short Description" name="description" rows="4"></textarea>
                                                            @error('description')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Send Request</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- card -->
                            </div>

                            @if (isset($account_info))

                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card text-white">
                                    <div class="card-header bg-dark">YOU WILL RECEIVE MONEY THROUGH THE INFORMATION BELOW:</div>
                                    @if (isset($account_info->card_number))
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Card Number:</span>
                                                        <span class="profile-ud-value">{{ $account_info->card_number }}</span>
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
                                                        <span class="profile-ud-value">{{ $account_info->bank_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Branch Name:</span>
                                                        <span class="profile-ud-value">{{ $account_info->branch_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Number:</span>
                                                        <span class="profile-ud-value">{{ $account_info->account_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Holder Name:</span>
                                                        <span class="profile-ud-value">{{ $account_info->account_holder_name }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Routing Number:</span>
                                                        <span class="profile-ud-value">{{ $account_info->routing_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Description:</span>
                                                        <span class="profile-ud-value">{{ $account_info->description }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
