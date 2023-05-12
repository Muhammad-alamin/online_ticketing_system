<!-- Start of Header -->
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to Multi vendor E-commerce!</p>
            </div>
            <div class="header-right">
                <!-- End of DropDown Menu -->

                <!-- End of Dropdown Menu -->
                <span class="divider d-lg-show"></span>
                @if (auth()->check())
                    @if (Route::has('login'))
                        @if (auth()->user()->role_as == 'admin')
                            <a href="{{ route('admin.dashboard') }}"><em
                                    class="icon ni ni-signout"></em><span>Dashboard</span></a>
                        @elseif(auth()->user()->role_as == 'vendor')
                            <a href="{{ route('vendor.dashboard') }}"><em
                                    class="icon ni ni-signout"></em><span>Dashboard</span></a>
                        @endif
                    @endif
                @endif
                <a href="blog.html" class="d-lg-show">Blog</a>
                <a href="contact-us.html" class="d-lg-show">Contact Us</a>
                @if (Route::has('login'))
                    @auth()
                        <a href="{{ route('customer.dashboard', \Illuminate\Support\Facades\Crypt::encryptString(\Illuminate\Support\Facades\Auth::user()->id)) }}"
                            class="d-lg-show">My Account</a>
                        <a href="" class="d-lg-show">{{ auth()->user()->name }}</a>
                        <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <em class="icon ni ni-signout"></em><span>Sign out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class=""><i class="w-icon-account"></i>Sign In</a>
                        <span class="delimiter">/</span>
                        <a href="{{ route('customer.create') }}" class="ml-0">Register</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{ route('Home') }}" class="logo ml-lg-0">
                    <img src="{{ asset('front/assets/images/logo.png') }}" alt="logo" width="300"
                        height="45" />
                </a>
                <form method="get" action="{{ route('front.product.search') }}"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">

                    <input type="text" class="form-control" name="product_search" id="product_search"
                        placeholder="Search in..." value="{{ request('product_search') }}" required />
                    <button class="btn btn-search" name="searchBtn" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:#" class="text-capitalize">Live Chat</a> or :
                        </h4>
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist') }}">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                <a class="compare label-down link d-xs-show" href="{{ route('compares') }}">
                    <i class="w-icon-compare"></i>
                    <span class="compare-label d-lg-show">Compare</span>
                </a>
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="javascript:void(0)" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">0</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header" id="cartBox">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="itemCart align-center cart-empty">
                            {{--                                                            <div class="product-detail"> --}}
                            {{--                                                                <a href="product-default.html" class="product-name">Beige knitted --}}
                            {{--                                                                    elas<br>tic --}}
                            {{--                                                                    runner shoes</a> --}}
                            {{--                                                                <div class="price-box"> --}}
                            {{--                                                                    <span class="product-quantity">1</span> --}}
                            {{--                                                                    <span class="product-price">$25.68</span> --}}
                            {{--                                                                </div> --}}
                            {{--                                                            </div> --}}
                            {{--                                                            <figure class="product-media"> --}}
                            {{--                                                                <a href="product-default.html"> --}}
                            {{--                                                                    <img src="assets/images/cart/product-1.jpg" alt="product" height="84" --}}
                            {{--                                                                         width="94" /> --}}
                            {{--                                                                </a> --}}
                            {{--                                                            </figure> --}}
                            {{--                                                            <button class="btn btn-link btn-close" aria-label="button"> --}}
                            {{--                                                                <i class="fas fa-times"></i> --}}
                            {{--                                                            </button> --}}
                        </div>

                        {{--                        <div class="products"> --}}
                        {{--                            <div class="cart-total priceCart"> --}}
                        {{--                                <label>Subtotal:</label> --}}
                        {{--                                <span class="price gTotal">$58.67</span> --}}
                        {{--                            </div> --}}

                        {{--                            <div class="cart-action"> --}}
                        {{--                                <a href="" class="btn btn-dark btn-outline btn-rounded">View Cart</a> --}}
                        {{--                                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a> --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box text-default">
                            <ul class="menu vertical-menu category-menu">
                                @foreach (mainNavCategories() as $category)
                                    <li>
                                        <a href="{{ route('category.product', encrypt($category->id)) }}">
                                            {{ $category->category_name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('front.shop') }}"
                                        class="font-weight-bold text-uppercase ls-25">
                                        View All Categories<i class="w-icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu">
                            <li class="active">
                                <a href="{{ route('Home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('front.shop') }}">Shop</a>

                            </li>
                            <li>
                                <a href="{{ route('all.brands') }}">All Brands</a>
                            </li>
                            <li>
                                <a href="{{ route('all.categories') }}">All Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('front-campaign-lst') }}">Campaign</a>
                            </li>
                            <li>
                                <a href="{{ route('registration.create') }}">Become seller</a>
                            </li>
                            <li>
                                <a href="elements.html">Blogs</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="{{ route('trackOrder') }}" class="d-xl-show"><i
                            class="w-icon-map-marker mr-1"></i>Track Order</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->
