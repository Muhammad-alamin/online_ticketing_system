@extends('front.layouts.master')
@section('content')
<!-- Start of Main -->

<section class="section-event-single-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="event-features">
                    <ul>
                        <li>
                            <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>
                            Contact <br> +442587451236
                        </li>
                        <li>
                            <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
                            Email Me: <br> lastminutefootballticket@gmail.com
                        </li>
                        <li>
                            <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                            Address: <br> Manchester United Kingdom.
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
                                            <img src="{{ asset('front/assets/images/order-details-img.jpg') }}" alt="image"/>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="event-info-about">
                                <h2>CONTACT WITH US</h2>
                                <form action="{{route('front.contact.store')}}" method="post" class="gy-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="bank_info_name">Order ID:</label>
                                            <br>
                                            <br>
                                            <input id="order_id" type="text" class="form-control" name="order_id" placeholder="Enter Your Order ID" value="" required>
                                            @error('order_id')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_info_code">Ticket ID:</label>
                                            <br>
                                            <br>
                                            <input id="ticket_id" type="text" class="form-control" name="ticket_id" placeholder="Enter Your Ticket ID" value="" required>
                                            @error('ticket_id')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_info_number">Name :</label>
                                            <br>
                                            <br>
                                            <input id="name" type="text" class="form-control" placeholder="Enter Your Name" name="name" value="" required>
                                            @error('name')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_info_full_name">Email:</label>
                                            <br>
                                            <br>
                                            <input id="email" type="email" class="form-control" placeholder="Enter Your Email" name="email" value="" required>
                                            @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_info_upi_id">Phone Number:</label>
                                            <br>
                                            <br>
                                            <input id="phone" type="text" class="form-control" placeholder="Enter Your Phone number" name="phone" value="" required>
                                            @error('phone')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <br>
                                            <br>
                                            <textarea id="description" type="text" class="form-control" placeholder="Enter Your Description" name="description" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <div class="form-group submit">
                                            <div class="ps-form__submit text-center">
                                                <button type="submit" class="btn btn-lg btn-primary">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event-location">
                    <h2>Location</h2>
                    <p><span>Manchester</span> United Kingdom.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="event-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.6864762013092!2d2.1206311157511477!3d41.380895979264686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a498f576297baf%3A0x44f65330fe1b04b9!2sCamp+Nou!5e0!3m2!1sen!2sph!4v1491114335931" width="1200" height="435" allowfullscreen></iframe>
</section>


@endsection

