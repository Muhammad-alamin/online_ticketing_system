@extends('seller.layouts.master')
@section('content')
    <section class="hero-1">
        <div class="container">
            <div class="row">
                <div class="hero-content">
                    <h1 class="hero-title">Welcome On TicketMarket !</h1>
                    <p class="hero-caption">The Platform with the easiest way to sell tickets</p>
                    <div class="hero-search">
                        <input type="text" placeholder="Seach Event or Venue" name="search" id="search" onfocus="this.value=''">
                    </div>
                    <div style="background-color: white;
                    border-radius: 20px 20px; overflow-x:auto;" id="search_list">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-event-single-content">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-sm-12 col-md-12">
                    <div class="event-features">
                        <ul>
                            <li>
                                <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>
                                Smartphone <br> tickets accepted
                            </li>
                            <li>
                                <i class="fa fa-hourglass-o fa-2x" aria-hidden="true"></i>
                                Duration: <br> Short Duration
                            </li>
                            <li>
                                <i class="fa fa-subway fa-2x" aria-hidden="true"></i>
                                Metro Line : <br> Metro Services
                            </li>
                            <li>
                                <i class="fa fa-car fa-2x" aria-hidden="true"></i>

                                Car Parking:<br> Available
                            </li>
                        </ul>
                    </div>
                    <div class="event-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="event-info-img">
                                    <div id="slider" class="flexslider">
                                        <ul class="slides">
                                            <li>
                                                <img src="{{ asset('front/assets/images/event-single-slider.jpg') }}" alt="image"/>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="event-info-about">
                                    <h2>ABOUT US</h2>
                                    <p>LastMinuteFootballTicket is a dynamic and innovative platform that caters to the passionate football fans who live for the excitement and thrill of the game. We understand the exhilaration of attending a live football match, being part of the roaring crowd, and witnessing the drama unfold right before your eyes. That's why we are dedicated to providing fans with an unmatched experience of securing last-minute football tickets to their favorite matches.</p>
                                    <p>At LastMinuteFootballTicket, we pride ourselves on being the go-to destination for football enthusiasts seeking tickets to sold-out games or those looking for spontaneous football adventures. We believe that every fan deserves a chance to witness their beloved team in action, regardless of the time constraints or limited ticket availability. With our user-friendly platform and extensive network of trusted sellers, we strive to bridge the gap between fans and their dream football experiences.</p>
                                    <p>Our mission is simple: to connect fans with the best possible last-minute football ticket options, ensuring that no one misses out on the electrifying atmosphere of a live football match. We work tirelessly to source tickets from reliable vendors, ensuring their authenticity and providing a seamless and secure purchasing process for our customers. With our quick and convenient service, fans can find and purchase tickets with ease, even at the eleventh hour.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-location">
                        <h2>Location</h2>
                        <p><span>United Kingdom</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
