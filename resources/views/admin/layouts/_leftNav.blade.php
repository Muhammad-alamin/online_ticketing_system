<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content menu-active" data-content="navDashboards">
                <img class="text-center" src="{{ asset('front/assets/images/logo_here.png') }}" style="width: 180px; padding-left:60px">
                <br>
                <br>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nk-menu-link @if (request()->routeIs('admin.dashboard')) active @endif">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="ni ni-menu-squared"></em></span>
                            <span class="nk-menu-text">Category</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.category.create') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.category.create')) active @endif">
                                    <span class="nk-menu-text">Category Create</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.category.index') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.category.index')) active @endif">
                                    <span class="nk-menu-text">Category List</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-dribbble"></em></span>
                            <span class="nk-menu-text">Sports</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.parent-sub-category') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.parent-sub-category')) active @endif">
                                    <span class="nk-menu-text">Create Sports</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.parent-sub-category.list') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.parent-sub-category.list')) active @endif">
                                    <span class="nk-menu-text">Sports List</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-shield-star-fill"></em></span>
                            <span class="nk-menu-text">Leauge</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.child-sub-category') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.child-sub-category')) active @endif">
                                    <span class="nk-menu-text">Create League</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.child-sub-category.list') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.child-sub-category.list')) active @endif">
                                    <span class="nk-menu-text">League List</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-alarm-alt"></em></span>
                            <span class="nk-menu-text">Event/Match</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.event.create') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.event.create')) active @endif">
                                    <span class="nk-menu-text">Create Event</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.event.index') }}"
                                    class="nk-menu-link @if (request()->routeIs('admin.event.index')) active @endif">
                                    <span class="nk-menu-text">Event List</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    {{-- <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="ni ni-view-x7"></em></span>
                            <span class="nk-menu-text">Slider</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('slider.create')}}" class="nk-menu-link @if (request()->routeIs('slider.create'))  active @endif"><span class="nk-menu-text">Slider Create</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('slider.index')}}" class="nk-menu-link @if (request()->routeIs('slider.index'))  active @endif"><span class="nk-menu-text">Slider List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                            <span class="nk-menu-text">Brand</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('Brand.create')}}" class="nk-menu-link @if (request()->routeIs('Brand.create'))  active @endif"><span class="nk-menu-text">Brand Create</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('Brand.index')}}" class="nk-menu-link @if (request()->routeIs('Brand.index'))  active @endif"><span class="nk-menu-text">Brand List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                            <span class="nk-menu-text">Product</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.products.create')}}" class="nk-menu-link @if (request()->routeIs('admin.products.create'))  active @endif"><span class="nk-menu-text">Product Create</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.products.index')}}" class="nk-menu-link @if (request()->routeIs('admin.products.index'))  active @endif"><span class="nk-menu-text">Product List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="ni ni-money"></em></span>
                            <span class="nk-menu-text">Vendor Commission</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('brand-commission.create')}}" class="nk-menu-link @if (request()->routeIs('brand-commission.create'))  active @endif"><span class="nk-menu-text">Set Commission</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('brand-commission.index')}}" class="nk-menu-link @if (request()->routeIs('brand-commission.index'))  active @endif"><span class="nk-menu-text">Commission List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="ni ni-offer"></em></span>
                            <span class="nk-menu-text">Coupon</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('add-coupon')}}" class="nk-menu-link @if (request()->routeIs('add-coupon'))  active @endif"><span class="nk-menu-text">Add Coupon</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('view-coupons')}}" class="nk-menu-link @if (request()->routeIs('view-coupons'))  active @endif"><span class="nk-menu-text">View Coupon</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="ni ni-view-panel-fill"></em></span>
                            <span class="nk-menu-text">Marketing</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('advertisement-banner.create')}}" class="nk-menu-link @if (request()->routeIs('advertisement-banner.create'))  active @endif"><span class="nk-menu-text">Banner Create</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('advertisement-banner.index')}}" class="nk-menu-link @if (request()->routeIs('advertisement-banner.index'))  active @endif"><span class="nk-menu-text">Banner List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="ni ni-user-add-fill"></em></span>
                            <span class="nk-menu-text">Subscriber</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.subscriber')}}" class="nk-menu-link @if (request()->routeIs('admin.subscriber'))  active @endif"><span class="nk-menu-text">Subscriber list</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">User Management</span>
                        </a>
                        <ul class="nk-menu-sub">

                            <li class="nk-menu-item">
                                <a href="{{route('admin.new.user')}}" class="nk-menu-link "><span class="nk-menu-text">Add user</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.userList')}}" class="nk-menu-link "><span class="nk-menu-text">User list</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.customerList')}}" class="nk-menu-link "><span class="nk-menu-text">Manage Customer</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.sellerList')}}" class="nk-menu-link"><span class="nk-menu-text ">Manage Seller</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-check-fill-c"></em></span>
                            <span class="nk-menu-text">Approval</span>
                        </a>
                        <ul class="nk-menu-sub">

                            <li class="nk-menu-item">
                                <a href="{{route('admin.brand.approval')}}" class="nk-menu-link "><span class="nk-menu-text">Brand - Approval</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.product.approval')}}" class="nk-menu-link "><span class="nk-menu-text">Product - Approval</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.rating.approval')}}" class="nk-menu-link "><span class="nk-menu-text">Rating - Approval</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('user.index')}}" class="nk-menu-link"><span class="nk-menu-text ">Vendor - Approval</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-move"></em></span>
                            <span class="nk-menu-text">Delivery Charge</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('delivery_charge.create')}}" class="nk-menu-link @if (request()->routeIs('delivery_charge.create'))  active @endif"><span class="nk-menu-text">Set Charge</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('delivery_charge.index')}}" class="nk-menu-link @if (request()->routeIs('delivery_charge.index'))  active @endif"><span class="nk-menu-text">Charge List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span>
                            <span class="nk-menu-text">Withdraw</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('withdraw.index')}}" class="nk-menu-link @if (request()->routeIs('withdraw.index'))  active @endif"><span class="nk-menu-text">Approved Withdraw</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->


                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-note-add-fill"></em></span>
                            <span class="nk-menu-text">Campaign</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('campaign.create')}}" class="nk-menu-link @if (request()->routeIs('campaign.create'))  active @endif"><span class="nk-menu-text">Add Campaign</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('campaign.index')}}" class="nk-menu-link @if (request()->routeIs('campaign.index'))  active @endif"><span class="nk-menu-text">Campaign List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                    <a href="{{route('order.index')}}" class="nk-menu-link @if (request()->routeIs('order.index'))  active @endif">
                        <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                        <span class="nk-menu-text">Orders</span>
                    </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.stock.product')}}" class="nk-menu-link @if (request()->routeIs('admin.stock.product'))  active @endif">
                            <span class="nk-menu-icon"><em class="icon ni ni-folder-fill"></em></span>
                            <span class="nk-menu-text">Stock Management</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-report-fill"></em></span>
                            <span class="nk-menu-text">Sales Report</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('daily.report')}}" class="nk-menu-link @if (request()->routeIs('daily.report'))  active @endif"><span class="nk-menu-text">Daily Report</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('monthly.report')}}" class="nk-menu-link @if (request()->routeIs('monthly.report'))  active @endif"><span class="nk-menu-text">Monthly Report</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('yearly.report')}}" class="nk-menu-link @if (request()->routeIs('yearly.report'))  active @endif"><span class="nk-menu-text">Yearly Report</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{route('backups.index')}}" class="nk-menu-link @if (request()->routeIs('backups.index'))  active @endif">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text">Backups</span>
                        </a>
                    </li><!-- .nk-menu-item --> --}}
                </ul><!-- .nk-menu -->
            </div>
        </div>
    </div>
</div>
