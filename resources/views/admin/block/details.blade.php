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
                                <h3 class="nk-block-title page-title">Products / <strong class="text-primary small">Details</strong></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('products.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{route('products.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
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
                                                <h5 class="title">Product Details</h5>
                                                <p></p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product name</span>
                                                        <span class="profile-ud-value">{{$product->product_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Category name</span>
                                                        <span class="profile-ud-value">{{$product->category_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">User name</span>
                                                        <span class="profile-ud-value">{{$product->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Brand name</span>
                                                        <span class="profile-ud-value">{{$product->brand_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product Description</span>
                                                        <span class="profile-ud-value">{{$product->product_description}}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product sku</span>
                                                        <span class="profile-ud-value">{{$product->product_sku}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product code</span>
                                                        <span class="profile-ud-value">{{$product->product_code}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product colour</span>
                                                        @php($colour = json_decode($product->product_colour))
                                                        @foreach($colour as $eachcolour)
                                                        <span class="profile-ud-value">{{$eachcolour}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product buying date</span>
                                                        <span class="profile-ud-value">{{$product->product_buying_date}}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product image</span>
                                                        @php($images = json_decode($product->product_image))
                                                        @foreach($images as $eachimage)

                                                            <img src="{{asset('images/products/'.$eachimage)}}" class="img-fluid " alt="" style="height: 40px; width: 40px;">

                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product regular price</span>
                                                        <span class="profile-ud-value">{{$product->product_regular_price}}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product discount price</span>
                                                        <span class="profile-ud-value">{{$product->product_discount_price}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product quantity</span>
                                                        <span class="profile-ud-value">{{$product->product_quantity}}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product Stock</span>
                                                        <span class="profile-ud-value">{{$product->product_stock}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product Discount %</span>
                                                        <span class="profile-ud-value">{{$product->product_discount_price}}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product discount amount</span>
                                                        <span class="profile-ud-value">{{$product->product_discount_amount}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product size</span>
                                                        @php($size = json_decode($product->product_size))
                                                        @foreach($size as $eachsize)
                                                        <span class="profile-ud-value">{{$eachsize}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product status</span>
                                                        @if($product->product_status == 'Active')
                                                            <span class="profile-ud-value text-success">{{$product->product_status}}</span>
                                                        @else
                                                            <span class="profile-ud-value text-danger">{{$product->product_status}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Product approval</span>
                                                        @if($product->product_approval == 'Approved')
                                                            <span class="profile-ud-value text-success">{{$product->product_approval}}</span>
                                                        @else
                                                            <span class="profile-ud-value text-danger">{{$product->product_approval}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                                <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                                    <div class="card-inner-group" data-simplebar>
                                        <div class="card-inner">
                                            <div class="user-card user-card-s2">
                                                <div class="user-avatar lg bg-primary">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <div class="badge badge-outline-light badge-pill ucap">Investor</div>
                                                    <h5>Abu Bin Ishtiyak</h5>
                                                    <span class="sub-text">info@softnio.com</span>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner card-inner-sm">
                                            <ul class="btn-toolbar justify-center gx-1">
                                                <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-shield-off"></em></a></li>
                                                <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail"></em></a></li>
                                                <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-download-cloud"></em></a></li>
                                                <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-bookmark"></em></a></li>
                                                <li><a href="#" class="btn btn-trigger btn-icon text-danger"><em class="icon ni ni-na"></em></a></li>
                                            </ul>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="overline-title-alt mb-2">In Account</div>
                                            <div class="profile-balance">
                                                <div class="profile-balance-group gx-4">
                                                    <div class="profile-balance-sub">
                                                        <div class="profile-balance-amount">
                                                            <div class="number">2,500.00 <small class="currency currency-usd">USD</small></div>
                                                        </div>
                                                        <div class="profile-balance-subtitle">Invested Amount</div>
                                                    </div>
                                                    <div class="profile-balance-sub">
                                                        <span class="profile-balance-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                        <div class="profile-balance-amount">
                                                            <div class="number">1,643.76</div>
                                                        </div>
                                                        <div class="profile-balance-subtitle">Profit Earned</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">23</span>
                                                        <span class="sub-text">Total Order</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">20</span>
                                                        <span class="sub-text">Complete</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">3</span>
                                                        <span class="sub-text">Progress</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <h6 class="overline-title-alt mb-2">Additional</h6>
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <span class="sub-text">User ID:</span>
                                                    <span>UD003054</span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="sub-text">Last Login:</span>
                                                    <span>15 Feb, 2019 01:02 PM</span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="sub-text">KYC Status:</span>
                                                    <span class="lead-text text-success">Approved</span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="sub-text">Register At:</span>
                                                    <span>Nov 24, 2019</span>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <h6 class="overline-title-alt mb-3">Groups</h6>
                                            <ul class="g-1">
                                                <li class="btn-group">
                                                    <a class="btn btn-xs btn-light btn-dim" href="#">investor</a>
                                                    <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
                                                </li>
                                                <li class="btn-group">
                                                    <a class="btn btn-xs btn-light btn-dim" href="#">support</a>
                                                    <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
                                                </li>
                                                <li class="btn-group">
                                                    <a class="btn btn-xs btn-light btn-dim" href="#">another tag</a>
                                                    <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
                                                </li>
                                            </ul>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-aside -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
