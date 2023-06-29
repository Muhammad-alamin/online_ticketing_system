<div class="nk-wrap "> <br><br> <div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{route('admin.dashboard')}}" class="logo-link">
                    <img class="logo-light logo-img" src="{{asset('assets/admin_logo.png')}}" srcset="{{asset('assets/admin_logo.png')}} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{asset('assets/admin_logo.png')}}" srcset="{{asset('assets/admin_logo.png')}} 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <form method="post" action="{{route('admin.cacheClear')}}">
                        @csrf
                        <div class="nk-header-search ms-3 ms-xl-0 d-mb-flex hide-mb-xs">
                            <button type="submit" class="btn btn-outline-info">Clear Cache</button>
                        </div><!-- .nk-header-news -->
                    </form>
                    {{-- <li class="dropdown chats-dropdown hide-mb-xs">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                <a href="#">Setting</a>
                            </div>
                            <div class="dropdown-body">
                                <ul class="chat-list">
                                    <li class="chat-item">
                                        <a class="chat-link" href="html/apps-chats.html">
                                            <div class="chat-media user-avatar">
                                                <span>IH</span>
                                                <span class="status dot dot-lg dot-gray"></span>
                                            </div>
                                            <div class="chat-info">
                                                <div class="chat-from">
                                                    <div class="name">Iliash Hossain</div>
                                                    <span class="time">Now</span>
                                                </div>
                                                <div class="chat-context">
                                                    <div class="text">You: Please confrim if you got my last messages.</div>
                                                    <div class="status delivered">
                                                        <em class="icon ni ni-check-circle-fill"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- .chat-item -->
                                    <li class="chat-item is-unread">
                                        <a class="chat-link" href="html/apps-chats.html">
                                            <div class="chat-media user-avatar bg-pink">
                                                <span>AB</span>
                                                <span class="status dot dot-lg dot-success"></span>
                                            </div>
                                            <div class="chat-info">
                                                <div class="chat-from">
                                                    <div class="name">Abu Bin Ishtiyak</div>
                                                    <span class="time">4:49 AM</span>
                                                </div>
                                                <div class="chat-context">
                                                    <div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>
                                                    <div class="status unread">
                                                        <em class="icon ni ni-bullet-fill"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- .chat-item -->
                                    <li class="chat-item">
                                        <a class="chat-link" href="html/apps-chats.html">
                                            <div class="chat-media user-avatar">
                                                <img src="./images/avatar/b-sm.jpg" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <div class="chat-from">
                                                    <div class="name">George Philips</div>
                                                    <span class="time">6 Apr</span>
                                                </div>
                                                <div class="chat-context">
                                                    <div class="text">Have you seens the claim from Rose?</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- .chat-item -->
                                    <li class="chat-item">
                                        <a class="chat-link" href="html/apps-chats.html">
                                            <div class="chat-media user-avatar user-avatar-multiple">
                                                <div class="user-avatar">
                                                    <img src="./images/avatar/c-sm.jpg" alt="">
                                                </div>
                                                <div class="user-avatar">
                                                    <span>AB</span>
                                                </div>
                                            </div>
                                            <div class="chat-info">
                                                <div class="chat-from">
                                                    <div class="name">Softnio Group</div>
                                                    <span class="time">27 Mar</span>
                                                </div>
                                                <div class="chat-context">
                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                    <div class="status sent">
                                                        <em class="icon ni ni-check-circle"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- .chat-item -->
                                    <li class="chat-item">
                                        <a class="chat-link" href="html/apps-chats.html">
                                            <div class="chat-media user-avatar">
                                                <img src="./images/avatar/a-sm.jpg" alt="">
                                                <span class="status dot dot-lg dot-success"></span>
                                            </div>
                                            <div class="chat-info">
                                                <div class="chat-from">
                                                    <div class="name">Larry Hughes</div>
                                                    <span class="time">3 Apr</span>
                                                </div>
                                                <div class="chat-context">
                                                    <div class="text">Hi Frank! How is you doing?</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- .chat-item -->
                                    <li class="chat-item">
                                        <a class="chat-link" href="html/apps-chats.html">
                                            <div class="chat-media user-avatar bg-purple">
                                                <span>TW</span>
                                            </div>
                                            <div class="chat-info">
                                                <div class="chat-from">
                                                    <div class="name">Tammy Wilson</div>
                                                    <span class="time">27 Mar</span>
                                                </div>
                                                <div class="chat-context">
                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                    <div class="status sent">
                                                        <em class="icon ni ni-check-circle"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- .chat-item -->
                                </ul><!-- .chat-list -->
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="html/apps-chats.html">View All</a>
                            </div>
                        </div>
                    </li> --}}
                    <li class="">
                        <a href="{{route('Home')}}" class=" nk-quick-nav-icon" >
                            <div class="icon-status icon-status-na"><em class="icon ni ni-globe"></em></div>
                        </a>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img src="{{asset('images/profile/'.auth()->user()->avatar)}}">
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    @if(auth()->user()->role_as == 'admin')
                                    <div class="user-status user-status-active">Administator</div>
                                    @elseif(auth()->user()->role_as == 'vendor')
                                        <div class="user-status user-status-active">Vendor</div>
                                    @elseif(auth()->user()->role_as == 'customer')
                                        <div class="user-status user-status-active">Customer</div>
                                    @elseif(auth()->user()->role_as == 'manager')
                                        <div class="user-status user-status-active">Manager</div>
                                    @endif
                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <img src="{{asset('images/profile/'.auth()->user()->avatar)}}">
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{route('admin.view.profile')}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a class="dark-switch" id="darkSwitch" href=""><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a class="" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            <em class="icon ni ni-signout"></em><span>Sign out</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
<!-- main header @e
