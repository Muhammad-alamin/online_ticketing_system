<header id="masthead" class="site-header">
    <div class="top-header top-header-bg">
        <div class="container">
            <div class="row">
                <div class="top-left">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-phone"></i>
                                +62274 889767
                            </a>
                        </li>
                        <li>
                            <a href="mailto:hello@myticket.com">
                                <i class="fa fa-envelope-o"></i>
                                hello@myticket.com
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="top-right">
                    <ul>
                        @if (Route::has('login'))
                        @auth()
                        <li>
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}">Sign In</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Sign Up</a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="main-header main-header-bg">
        <div class="container">
            <div class="row">
                <div class="site-branding col-md-3">
                    <h1 class="site-title"><a href="{{ route('Home') }}" title="myticket" rel="home"><img src="{{ asset('front/assets/images/last-minute-football-tickets-logo.png') }}" alt="logo"></a></h1>
                </div>

                <div class="col-md-9">
                    <nav id="site-navigation" class="navbar">
                        <div class="navbar-header">
                            @if (Route::has('login') && Auth::check())
                                <div class="mobile-cart" style="margin-right: 5px">
                                    <ul class="cart-dropdown">
                                        <li><a href="javascript:void(0)">{{ substr(Auth::user()->name, 0,  6) }}</a></li>
                                        @if (auth()->user()->role_as == 'admin')
                                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        @endif
                                        <li><a href="{{ route('seller.payout.info') }}">Payments</a></li>
                                        <li><a href="{{ route('seller.orders') }}">Orders</a></li>
                                        <li><a href="{{ route('seller.ticket.listing') }}">Listing</a></li>
                                        <li><a href="{{ route('seller.sales') }}">Sales</a></li>
                                        <li><a href="{{ route('user.details') }}">Account</a></li>
                                        <li>
                                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        </li>
                                      </ul>
                                </div>
                                @else
                                <div class="mobile-cart" style="margin-right: 5px">
                                    <ul class="cart-dropdown">
                                        <li><a href="{{ route('login') }}">Sign In</a></li>
                                      </ul>
                                </div>
                            @endif
                            <button type="button" class="navbar-toggle offcanvas-toggle pull-right"
                                data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-right"
                            id="js-bootstrap-offcanvas">
                            <button type="button" class="offcanvas-toggle closecanvas" data-toggle="offcanvas"
                                data-target="#js-bootstrap-offcanvas">
                                <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                            </button>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="javascript:void(0)">Concert</a></li>
                                <li><a href="{{ route('upcoming_event') }}">Sport</a></li>
                                @if (Route::has('login'))
                                @auth()
                                <li><a href="{{ route('sellTicket') }}">Sell Ticekts</a></li>
                                @endauth
                                @endif
                                @if (Route::has('login') && Auth::check())
                                <li class="cart" style="margin-right: 5px">
                                    <ul class="cart-dropdown">
                                        <li><a href="javascript:void(0)">{{ substr(Auth::user()->name, 0,  6) }}</a></li>
                                        @if (auth()->user()->role_as == 'admin')
                                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        @endif
                                        <li><a href="{{ route('seller.payout.info') }}">Payments</a></li>
                                        <li><a href="{{ route('seller.orders') }}">Orders</a></li>
                                        <li><a href="{{ route('seller.ticket.listing') }}">Listing</a></li>
                                        <li><a href="{{ route('seller.sales') }}">Sales</a></li>
                                        <li><a href="{{ route('user.details') }}">Account</a></li>
                                        <li>
                                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        </li>
                                      </ul>
                                </li>
                                @else
                                <li class="cart" style="margin-right: 5px">
                                    <ul class="cart-dropdown">
                                        <li><a href="{{ route('login') }}">Sign In</a></li>
                                      </ul>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->

