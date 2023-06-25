@extends('seller.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Withdraw Request List</h4>
                                    <div class="nk-block-des">
                                    </div>
                                </div>
                            </div>

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
                                </div>
                            </div>
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Account Number / Card Number</span></th>
                                            @if (isset($withdrawRequest->transaction_id))
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Transection ID</span></th>
                                            @endif
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Withdraw amount</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Created Date</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($withdrawRequest as $key=>$withdraw )
                                        <tr class="nk-tb-item">
                                            @if (isset($withdrawRequest->card_number))
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$withdraw->card_number}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            @else
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$withdraw->account_number}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif

                                            @if (isset($withdrawRequest->transaction_id))
                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                <span class="tb-amount">{{$withdraw->transaction_id}}<span class="currency"></span></span>
                                            </td>
                                            @endif
                                            <td class="nk-tb-col tb-col-md">
                                                <span>$ {{$withdraw->withdraw_amount}}</span>
                                            </td>

                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{date('Y-m-d',strtotime($withdraw->created_at))}}</span>
                                            </td>

                                            <td class="nk-tb-col tb-col-md">
                                                @if ($withdraw->status == 'Pending')
                                                <span class="badge rounded-pill text-white bg-warning">{{$withdraw->status}}</span>
                                                @elseif ($withdraw->status == 'Processing')
                                                <span class="badge rounded-pill text-white bg-secondary">{{$withdraw->status}}</span>
                                                @elseif ($withdraw->status == 'Canceled')
                                                <span class="badge rounded-pill text-white bg-danger">{{$withdraw->status}}</span>
                                                @elseif ($withdraw->status == 'Complete')
                                                <span class="badge rounded-pill text-white bg-success">{{$withdraw->status}}</span>
                                                @endif
                                            </td>

                                            @if($withdraw->status == 'Pending')
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('vendor.withdrawl.details',encrypt($withdraw->id))}}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                        <li><a href="{{route('vendor.withdrawl.edit',encrypt($withdraw->id))}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            @else
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{route('vendor.withdrawl.details',encrypt($withdraw->id))}}" ><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endif
                                        </tr><!-- .nk-tb-item  -->
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
