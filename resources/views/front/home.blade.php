@extends('front.layouts.master')
@section('content')
    <section class="hero-1">
        <div class="container">
            <div class="row">
                <div class="hero-content">
                    <h1 class="hero-title">BUY & SELL TICKETS</h1>
                    <p class="hero-caption">Buy and sell sports tickets and cultural events</p>
                    <div class="hero-search">
                        <input type="text" placeholder="Seach Event, or Venue" name="search" id="search" onfocus="this.value=''">
                    </div>
                    <div style="background-color: white;
                    border-radius: 20px 20px; overflow-x:auto;" id="search_list">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-todays-schedule">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2>Today's Schedule</h2>
                    <span class="todays-date"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>12</strong> August
                        2016 </span>
                </div>
                <div class="section-content">
                    <ul class="clearfix">
                        <li class="event-1">
                            <span class="event-time">08:00 <strong>AM</strong></span>
                            <strong class="event-name">Kiai Kanjeng Orchestra</strong>
                            <a href="#" class="get-ticket">Get Ticket</a>
                        </li>
                        <li class="event-2">
                            <span class="event-time">08:00 <strong>AM</strong></span>
                            <strong class="event-name">Envato Author Meetup</strong>
                            <a href="#" class="get-ticket">Get Ticket</a>
                        </li>
                        <li class="event-3">
                            <span class="event-time">10:00 <strong>AM</strong></span>
                            <strong class="event-name">BMW Open Championship</strong>
                            <a href="#" class="sold-ticket">Sold Out</a>
                        </li>
                        <li class="event-4">
                            <span class="event-time">09:00 <strong>PM</strong></span>
                            <strong class="event-name">UEFA Champions League: Barca v Arsenal</strong>
                            <a href="#" class="sold-ticket">Sold Out</a>
                        </li>
                    </ul>
                    <strong class="event-list-label">Full Event <span>Schedules</span></strong>
                </div>
            </div>
        </div>
    </section>

    <section class="section-upcoming-events">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2>Upcoming Events</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                        ullamcorper suscipit lobortis nisl ut.</p>
                    <a href="#">See all upcoming events</a>
                </div>
                <div class="section-content">
                    <ul class="clearfix">
                        <li>
                            <div class="date">
                                <a href="#">
                                    <span class="day">25</span>
                                    <span class="month">August</span>
                                    <span class="year">2016</span>
                                </a>
                            </div>
                            <a href="#">
                                <img src="images/upcoming-event-1.jpg" alt="image">
                            </a>
                            <div class="info">
                                <p>BMW Open Championship <span>San Francisco</span></p>
                                <a href="#" class="get-ticket">Get Ticket</a>
                            </div>
                        </li>
                        <li>
                            <div class="date">
                                <a href="#">
                                    <span class="day">26</span>
                                    <span class="month">August</span>
                                    <span class="year">2016</span>
                                </a>
                            </div>
                            <a href="#">
                                <img src="images/upcoming-event-2.jpg" alt="image">
                            </a>
                            <div class="info">
                                <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                                <a href="#" class="get-ticket">Get Ticket</a>
                            </div>
                        </li>
                        <li>
                            <div class="date">
                                <a href="#">
                                    <span class="day">27</span>
                                    <span class="month">August</span>
                                    <span class="year">2016</span>
                                </a>
                            </div>
                            <a href="#">
                                <img src="images/upcoming-event-3.jpg" alt="image">
                            </a>
                            <div class="info">
                                <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                <a href="#" class="get-ticket">Get Ticket</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-event-category">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2>Event by Categories</h2>
                </div>
                <div class="section-content">
                    <ul class="row clearfix">
                        <li class="category-1 col-sm-4">
                            <img src="images/event-category-1.jpg" alt="image">
                            <a href="#"><span>Concerts</span></a>
                        </li>
                        <li class="category-2 col-sm-4">
                            <img src="images/event-category-2.jpg" alt="image">
                            <a href="#"><span>Sports</span></a>
                        </li>
                        <li class="category-3 col-sm-4">
                            <img src="images/event-category-3.jpg" alt="image">
                            <a href="#"><span>Threaters</span></a>
                        </li>
                        <li class="category-4 col-sm-4">
                            <img src="images/event-category-4.jpg" alt="image">
                            <a href="#"><span>Parties</span></a>
                        </li>
                        <li class="category-5 col-sm-4">
                            <img src="images/event-category-5.jpg" alt="image">
                            <a href="#"><span>Communities</span></a>
                        </li>
                        <li class="category-6 col-sm-4">
                            <img src="images/event-category-6.jpg" alt="image">
                            <a href="#"><span>Classes</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-stats">
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <ul class="row clearfix">
                        <li class="col-sm-4">
                            <span class="count">598</span>
                            <hr>
                            <p>Events Active</p>
                        </li>
                        <li class="col-sm-4">
                            <span class="count">16,173</span>
                            <hr>
                            <p>Active User</p>
                        </li>
                        <li class="col-sm-4">
                            <span class="count">136,874</span>
                            <hr>
                            <p>Ticket Sold</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-recent-videos">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2>Recent Videos</h2>
                </div>
                <div class="section-content">
                    <ul class="row clearfix">
                        <li class="col-sm-3">
                            <div class="video">
                                <img src="images/recent-video-1.jpg" alt="image">
                                <div class="video-player">
                                    <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a>
                                    <span>2:33</span>
                                </div>
                            </div>
                            <h3 class="video-title">
                                <a href="#">Envato Author Community Fun Hiking at Semeru Mountaint</a>
                            </h3>
                        </li>
                        <li class="col-sm-3">
                            <div class="video">
                                <img src="images/recent-video-2.jpg" alt="image">
                                <div class="video-player">
                                    <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a>
                                    <span>2:33</span>
                                </div>
                            </div>
                            <h3 class="video-title">
                                <a href="#">Nike Urban Running Chalenge with Kobe 2016</a>
                            </h3>
                        </li>
                        <li class="col-sm-3">
                            <div class="video">
                                <img src="images/recent-video-3.jpg" alt="image">
                                <div class="video-player">
                                    <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a>
                                    <span>2:33</span>
                                </div>
                            </div>
                            <h3 class="video-title">
                                <a href="#">Entrepreneurial Think Thank: Shifting the Education Paradigm</a>
                            </h3>
                        </li>
                        <li class="col-sm-3">
                            <div class="video">
                                <img src="images/recent-video-4.jpg" alt="image">
                                <div class="video-player">
                                    <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a>
                                    <span>2:33</span>
                                </div>
                            </div>
                            <h3 class="video-title">
                                <a href="#">Southeast Asia Weekend Festival 2016</a>
                            </h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-call-to-action">
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <ul class="row clearfix">
                        <li class="col-sm-12 col-md-9">
                            <h3>Share experiences with your friends</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                        </li>
                        <li class="col-sm-12 col-md-3">
                            <a href="#" class="action-btn">Learn More</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-latest">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="latest-news">
                        <div class="section-header">
                            <h2>Latest News</h2>
                        </div>
                        <div class="section-content">
                            <ul class="clearfix">
                                <li class="row news-item">
                                    <div class="col-sm-5 news-item-img">
                                        <div class="date">
                                            <a href="#">
                                                <span class="day">25</span>
                                                <span class="month">August</span>
                                                <span class="year">2016</span>
                                            </a>
                                        </div>
                                        <a href="#"><img src="images/latest-news-1.jpg" alt="image"></a>
                                    </div>
                                    <div class="col-sm-7 news-item-info">
                                        <h3><a href="#">Attending the Indonesian Envato Authors National Meetup</a>
                                        </h3>
                                        <span class="meta-data">6 hours ago | By <a href="#">Admin</a></span>
                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                            consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                            et iusto odio dignissim qui blandit praesenlup.</p>
                                    </div>
                                </li>
                                <li class="row news-item">
                                    <div class="col-sm-5 news-item-img">
                                        <div class="date">
                                            <a href="#">
                                                <span class="day">25</span>
                                                <span class="month">August</span>
                                                <span class="year">2016</span>
                                            </a>
                                        </div>
                                        <a href="#"><img src="images/latest-news-2.jpg" alt="image"></a>
                                    </div>
                                    <div class="col-sm-7 news-item-info">
                                        <h3><a href="#">How to Join The Biggest Event Total Transverse Half
                                                Marathon</a></h3>
                                        <span class="meta-data">08:00 AM | By <a href="#">Admin</a></span>
                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                            consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                            et iusto odio dignissim qui blandit praesenlup.</p>
                                    </div>
                                </li>
                                <li class="row news-item">
                                    <div class="col-sm-5 news-item-img">
                                        <div class="date">
                                            <a href="#">
                                                <span class="day">25</span>
                                                <span class="month">August</span>
                                                <span class="year">2016</span>
                                            </a>
                                        </div>
                                        <a href="#"><img src="images/latest-news-3.jpg" alt="image"></a>
                                    </div>
                                    <div class="col-sm-7 news-item-info">
                                        <h3><a href="#">Ramayana Ballet at Prambanan Temple Klaten, Central of
                                                Java</a></h3>
                                        <span class="meta-data">10:00 AM | By <a href="#">Admin</a></span>
                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                            consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                            et iusto odio dignissim qui blandit praesenlup.</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="new-item-pagination">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="latest-tweets">
                        <div class="section-header">
                            <h2>Latest Tweets</h2>
                        </div>
                        <div class="section-content">
                            <div class="twitter-header clearfix">
                                <div class="twitter-name">
                                    <a href="#">
                                        <img src="images/twitter-avatar.png" alt="image">
                                        <strong>myticket.com</strong>
                                        <span>@myticket</span>
                                    </a>
                                </div>
                                <div class="twitter-btn">
                                    <a href="#">Follow</a>
                                </div>
                            </div>
                            <div class="tweet-list clearfix">
                                <ul class="clearfix">
                                    <li class="row tweet-item">
                                        <div class="col-sm-10">
                                            <p><a href="#">@myticket</a> Lorem ipsum dolor sit amet, consecter
                                                adipiscing elit, sed diam nonummy nibh euismod dolore magna aliquam <a
                                                    href="#">#EratVolutpat</a>.</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>17 min</span>
                                        </div>
                                    </li>
                                    <li class="row tweet-item">
                                        <div class="col-sm-10">
                                            <p><a href="#">@myticket</a>Lorem ipsum dolor sit amet, consecter
                                                adipiscing elit, sed diam<a href="#">#EratVolutpat</a>.</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>18 min</span>
                                        </div>
                                    </li>
                                    <li class="row tweet-item">
                                        <div class="col-sm-10">
                                            <p><a href="#">@myticket</a> Lorem ipsum dolor sit amet, consecter
                                                adipiscing elit, sed diam nonummy nibh euismod dolore magna aliquam <a
                                                    href="#">#EratVolutpat</a>.</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>19 min</span>
                                        </div>
                                    </li>
                                    <li class="row tweet-item">
                                        <div class="col-sm-10">
                                            <p><a href="#">@myticket</a>Lorem ipsum dolor sit amet, consecter
                                                adipiscing elit, sed diam<a href="#">#EratVolutpat</a>.</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>19 min</span>
                                        </div>
                                    </li>
                                    <li class="row tweet-item">
                                        <div class="col-sm-10">
                                            <p><a href="#">@myticket</a> Lorem ipsum dolor sit amet, consecter
                                                adipiscing elit, sed diam nonummy nibh euismod dolore magna aliquam <a
                                                    href="#">#EratVolutpat</a>.</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>20 min</span>
                                        </div>
                                    </li>
                                    <li class="row tweet-item">
                                        <div class="col-sm-10">
                                            <p><a href="#">@myticket</a>Lorem ipsum dolor sit amet, consecter
                                                adipiscing elit, sed diam<a href="#">#EratVolutpat</a>.</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>22 min</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-video-parallax">
        <div class="container">
            <div class="section-content">
                <h2>LIVE THERE</h2>
                <p>Book events from anywhere in 191+ countries and get awesome experience Lorem ipsum dolor sit amet,
                    consectetuer adipiscing elit,</p>
                <a href="#"><img src="images/play-btn.png" alt="image"></a>
            </div>
        </div>
    </section>

    <section class="section-sponsors">
        <div class="container">
            <div class="section-content">
                <ul class="row">
                    <li class="col-sm-3">
                        <a href="#">
                            <img src="images/sponsor-1.png" alt="image">
                        </a>
                    </li>
                    <li class="col-sm-3">
                        <a href="#">
                            <img src="images/sponsor-2.png" alt="image">
                        </a>
                    </li>
                    <li class="col-sm-3">
                        <a href="#">
                            <img src="images/sponsor-3.png" alt="image">
                        </a>
                    </li>
                    <li class="col-sm-3">
                        <a href="#">
                            <img src="images/sponsor-4.png" alt="image">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section-newsletter">
        <div class="container">
            <div class="section-content">
                <h2>Stay Up to date With Your Favorite Events!</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br> euismod tincidunt ut
                    laoreet dolore magna aliquam erat volutpat.</p>
                <div class="newsletter-form clearfix">
                    <input type="email" placeholder="Your Email Address">
                    <input type="submit" value="Subscribe">
                </div>
            </div>
        </div>
    </section>
@endsection
