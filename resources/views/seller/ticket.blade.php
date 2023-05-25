@extends('seller.layouts.master')
@section('content')
    <section class="hero-1">
        <div class="container">
            <div class="row">
                <div class="hero-content">
                    <h1 class="hero-title">Make Your Dream Come True</h1>
                    <p class="hero-caption">Meet your favorite artists, sport teams and parties</p>
                    <div class="hero-search">
                        <input type="text" placeholder="Seach Artist, Team, or Venue" name="search" id="search" onfocus="this.value=''">
                    </div>
                    <div style="background-color: white;
                    border-radius: 20px 20px; overflow-x:auto;" id="search_list">
                    </div>
                    <div class="hero-location">
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> San Francisco <a href="#">Change
                                Location</a></p>
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
                                Duration: 1 hour <br> and 30 minutes
                            </li>
                            <li>
                                <i class="fa fa-subway fa-2x" aria-hidden="true"></i>
                                Metro Line 3: stop Palau <br> Reial or Les Corts
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
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                            <li>
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                            <li>
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                            <li>
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="carousel" class="flexslider">
                                        <ul class="slides">
                                            <li>
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                            <li>
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                            <li>
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                            <li>
                                                <img src="images/event-single-slider.jpg" alt="image"/>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="event-info-about">
                                    <h2>ABOUT THIS EVENT</h2>
                                    <p>Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                                    <p>Mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                                    <p>Omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui. Mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-highlights">
                        <h2>Highlights</h2>
                        <p>Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                        <p>Omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui. Mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                        <div class="row">
                            <div class="col-md-7">
                                <ul>
                                    <li>Enjoy a self-guided tour through the home stadium of Messi, Neymar, Iniesta and Suarez, including the opportunity to walk onto the famous pitch surrounded by nearly 100,000 screaming fans (you'll need to imagine the last part)</li>
                                    <li>See 23 Liga and five Champions League trophies in a trophy cabinet that looks more like a treasure chest</li>
                                    <li> Experience the very cool and interactive museum, with touch screens, sound installations that put you at the heart of the action
                                    </li>
                                </ul>
                            </div>
                         </div>
                    </div>
                    <div class="event-location">
                        <h2>Location</h2>
                        <p><span>Camp Nou</span> C. Aristides Maillol, 12 (Av. Joan XIII) Barcelona</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
