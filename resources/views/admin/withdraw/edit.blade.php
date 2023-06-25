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
                                <h4 class="nk-block-title page-title">Pay Out</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->

                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-primary">
                                    <div class="card-header">Total Earnings</div>
                                    <div class="card-inner">
                                        <h5 class="card-title">£ {{ $users->total_income }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-gray">
                                    <div class="card-header">Available Balance</div>
                                    <div class="card-inner">
                                        <h5 class="card-title">£ {{ $users->availabe_balance }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card text-white bg-danger">
                                    <div class="card-header">Total Withdrawl</div>
                                    <div class="card-inner">
                                        <h5 class="card-title">£ {{ $users->withdraw_balance }}</h5>
                                    </div>
                                </div>
                            </div>
                            @if (isset($bankInfo))
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('admin.withdraw.store')}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="seller_id" value="{{ $users->id}}">
                                            <input type="hidden" name="bank_info_id" value="{{ $bankInfo->id}}">
                                            <input type="hidden" name="amount" value="{{$users->availabe_balance}}">
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="amount" class="form-label">Withdraw Amount</label>
                                                            <input type="number" class="form-control" name="withdraw_amount" id="withdraw_amount" disabled value="{{$users->availabe_balance}}" placeholder="Amount you want to withdrawal">
                                                            @error('withdraw_amount')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="transaction_id" class="form-label">Transaction ID</label>
                                                            <input type="text" class="form-control" name="transaction_id" id="transaction_id"  value="" placeholder="Type Your Transaction ID">
                                                            @error('transaction_id')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="complete_date" class="form-label">Complete Date</label>
                                                            <input type="complete_date" id="transaction_complete_date" class="form-control" name="complete_date"  value="" placeholder="Please Select Transaction Date">
                                                            @error('complete_date')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select form-control form-control-lg" name="status" id="status" data-search="on">
                                                                <option selected="" disabled="" >Select Status</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Complete">Complete</option>
                                                            </select>
                                                            @error('status')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Pay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- <form action="{{route('admin.withdrawl.update', encrypt($withdraw->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="amount" class="form-label">Withdraw Amount</label>
                                                            <input type="number" class="form-control" name="amount" id="amount" disabled value="{{old('amount', isset($withdraw)?$withdraw->withdraw_amount:null)}}" placeholder="Amount you want to withdrawal">
                                                            @error('amount')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="description" class="form-label">Seller Message</label>
                                                            <textarea id="description" type="text" class="form-control" disabled placeholder="Short Description" name="description" rows="4">{{old('vendor_message', isset($withdraw)?$withdraw->vendor_message:null)}}</textarea>
                                                            @error('description')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="transaction_id" class="form-label">Transaction ID</label>
                                                            <input type="text" class="form-control" name="transaction_id" id="transaction_id"  value="{{old('transaction_id', isset($withdraw)?$withdraw->transaction_id:null)}}" placeholder="Type Your Transaction ID">
                                                            @error('transaction_id')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="complete_date" class="form-label">Complete Date</label>
                                                            <input type="complete_date" id="transaction_complete_date" class="form-control" name="complete_date"  value="{{old('complete_date', isset($withdraw)?$withdraw->complete_date:null)}}" placeholder="Please Select Transaction Date">
                                                            @error('complete_date')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select form-control form-control-lg" name="status" id="status" data-search="on">
                                                                <option selected="" disabled="" >Select Status</option>
                                                                <option value="Pending" <?= $withdraw->status === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                                <option value="Processing" <?= $withdraw->status === 'Processing' ? 'selected' : '' ?>>Processing</option>
                                                                <option value="Canceled" <?= $withdraw->status === 'Canceled' ? 'selected' : '' ?>>Canceled</option>
                                                                <option value="Complete" <?= $withdraw->status === 'Complete' ? 'selected' : '' ?>>Complete</option>
                                                            </select>
                                                            @error('status')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="admin_message" class="form-label">Admin Message</label>
                                                            <textarea id="admin_message" type="text" class="form-control"  placeholder="Short Description" name="admin_message" rows="4">{{old('vendor_message', isset($withdraw)?$withdraw->admin_message:null)}}</textarea>
                                                            @error('admin_message')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Approve</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form> --}}
                                    </div>
                                </div><!-- card -->
                            </div>
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card text-white">
                                    <div class="card-header bg-dark">SELLER WILL RECEIVE MONEY THROUGH THE INFORMATION BELOW:</div>
                                    @if (isset($bankInfo->card_number))
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Card Number:</span>
                                                        <span class="profile-ud-value">{{ $bankInfo->card_number }}</span>
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
                                                        <span class="profile-ud-value">{{ $bankInfo->bank_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Branch Name:</span>
                                                        <span class="profile-ud-value">{{ $bankInfo->branch_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Number:</span>
                                                        <span class="profile-ud-value">{{ $bankInfo->account_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Account Holder Name:</span>
                                                        <span class="profile-ud-value">{{ $bankInfo->account_holder_name }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Routing Number:</span>
                                                        <span class="profile-ud-value">{{ $bankInfo->routing_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Description:</span>
                                                        <span class="profile-ud-value">{{ $bankInfo->description }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @else
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card text-white">
                                    <div class="card-header bg-blue">SELLER STILL NOT ADDED HIS PAYMENT INFO:</div>
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Seller Name:</span>
                                                        <span class="profile-ud-value">{{ $users->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Seller Email:</span>
                                                        <span class="profile-ud-value">{{ $users->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item " >
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Seller Mobile Number:</span>
                                                        <span class="profile-ud-value">{{ $users->mobile }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
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
