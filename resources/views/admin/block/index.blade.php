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
                                    <h4 class="nk-block-title">Product  List</h4>
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
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Product name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category name</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Brand name</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Price</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Stock</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Image</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Approval</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $key=>$product )
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$product->product_name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                <span>{{$product->category_name}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{$product->brand_name}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                <span>{{$product->product_regular_price}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>{{$product->product_stock}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                @php($images = json_decode($product->product_image))
                                                @foreach($images as $eachimage)

                                                    <img src="{{asset('images/products/'.$eachimage)}}" class="img-fluid" alt="" style="height: 20px; width: 20px;">

                                                @endforeach
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($product->product_approval == 'Approved')
                                                    <span class="tb-status text-success">{{$product->product_approval}}</span>
                                                @else
                                                    <span class="tb-status text-danger">{{$product->product_approval}}</span>
                                                @endif
                                            </td>
                                            @if($product->product_approval == 'Unapproved')
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#" class="disabled"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="{{route('products.edit',$product->id)}}" class="disabled"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="{{route('products.destroy',$product->id)}}" class="disabled"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
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
                                                                        <li><a href="{{route('vendor.product.create.attributes',$product->id)}}"><em class="icon ni ni-eye"></em><span>Add Attributes</span></a></li>
                                                                        <li><a href="{{route('vendor.product.details',$product->id)}}"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                        <li><a href="{{route('products.edit',$product->id)}}"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                        <li>
                                                                            <form action="{{route('products.destroy',$product->id)}}" method="post" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button class="" onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-crush"></em><span>Delete Product</span></button>
                                                                            </form>
                                                                        </li>
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
<script>
    import App from "../../../../public/js/app";
    export default {
        components: {App}
    }
</script>
