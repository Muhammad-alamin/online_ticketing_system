@extends('admin.layouts.master')

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
                                    <h4 class="nk-block-title">Orders List</h4>
                                </div>
                            </div>
                            @if(Session::has('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                            @elseif(Session::has('warning'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{ session('warning') }}</strong>
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
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Order ID</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Match Name</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Ticket Quantity</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Total Price</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Purchasing date</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key=>$order )
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$order->order_id}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                <span>{{$order->match_name}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>{{$order->ticket_quantity}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>£ {{ number_format($order->total_price,2) }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>{{ $order->order_date }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($order->status == 'Paid')
                                                    <span class="tb-status text-success">{{$order->status}}</span>
                                                @else
                                                    <span class="tb-status text-danger">Cancel</span>
                                                @endif
                                            </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('admin.order.details',encrypt($order->id))}}"><em class="icon ni ni-eye"></em><span>Details</span></a></li>
                                                                        <li><a href="{{route('admin.order.edit',encrypt($order->id))}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                        <li><a href="{{route('admin.order.delete', encrypt($order->id))}}"  onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-eye"></em><span>Delete</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
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
<script>
    import App from "../../../../public/js/app";
    export default {
        components: {App}
    }
</script>
