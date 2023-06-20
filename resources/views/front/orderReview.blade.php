@extends('front.layouts.master')
@section('content')

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Review Order</h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <p><i class="fa fa-check" aria-hidden="true"></i> Ticket price has been confirmed. Check your order review below and click Checkout to continue.</p>
                </div>
            </div>
            <form id="form2" action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="primary" class="col-md-6">
                    <div class="section-order-details-event-info">
                        <div class="venue-details">
                            <h3>Venue & Event Information</h3>
                            <div class="venue-details-info">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="section-order-review-event-img">
                                            @if(!empty($ticket_details->block_image))
                                            <a href="{{ asset($ticket_details->block_image) }}" data-featherlight="image"><img class="event-img" src="{{ asset($ticket_details->block_image) }}" alt="image"></a>
                                            @elseif (!empty($ticket_details->section_image))
                                            <a href="{{ asset($ticket_details->section_image) }}" data-featherlight="image"><img class="event-img" src="{{ asset($ticket_details->section_image) }}" alt="image"></a>
                                            @else
                                            <a href="{{ asset($ticket_details->venue_image) }}" data-featherlight="image"><img class="event-img" src="{{ asset($ticket_details->venue_image) }}" alt="image"></a>
                                            @endif
                                            <span>
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                Click to enlarge
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="section-order-review-event">
                                            <span class="event-caption">{{ $ticket_details->child_sub_cat_name }}</span>
                                            <h2 class="event-title">{{ $ticket_details->match_name }}</h2>
                                            <p>{{ $ticket_details->venue_name }}</p>
                                            <p>{{ date('d-F-Y H:i', strtotime($ticket_details->match_date_time)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="seat-details">
                            <h3>Seats Order Information</h3>
                            <div class="seat-details-info">
                                <table class="table seat-row">
                                    <thead>
                                        <tr>
                                            <th>Section</th>
                                            @if (!empty($ticket_details->block_number))
                                            <th>Block</th>
                                            @endif
                                            {{-- <th>Seats</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $ticket_details->section_name }}</td>
                                            <td>{{ $ticket_details->block_number }}</td>
                                            {{-- <td>10-12</td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table number-tickets">
                                    <thead>
                                        <tr>
                                            <th>Delivery</th>
                                            <th>Number of Tickets</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Instant Download</td>
                                            <td>{{ $quantity }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="secondary" class="col-md-6">
                    <div class="section-order-review-pricing">
                        <div class="pricing-coupon">
                            <h3>Pricing</h3>
                            <div class="coupon">
                                {{-- <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="coupon-title">
                                            <span>Enter Coupon Code Here</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-8">
                                        <div class="coupon-form">
                                            <input type="text" placeholder="Code">
                                            <input type="submit" value="Update">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="pricing">
                                <table class="table pricing-review">
                                    <tbody>
                                        <tr>
                                            <td>Ticket price ({{ $quantity }} x $ {{ number_format($ticket_details->price,2) }})</td>
                                            <td>${{ number_format($ticket_price = $quantity * $ticket_details->price,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Fee</td>
                                            <td>${{ number_format( $fee = $ticket_details->price * $quantity * 20/100 ,2 ) }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total Price</td>
                                            <td class="total-price">USD ${{ number_format( $total_price = $ticket_price +  $fee ,2 ) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="delivery-method">
                            <h3>Billing Details</h3>
                                <div class="delivery-info col-md-12">
                                    <div class="col-md-6">
                                        <span>First Name</span>
                                        <input placeholder="Enter First Name" name="first_name" class="form-control">
                                        @error('first_name')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <span>Last Name</span>
                                        <input placeholder="Enter Last Name" name="last_name" class="form-control">
                                        @error('last_name')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <span>Email</span>
                                        <input class="form-control" name="email" placeholder="Enter Email Address">
                                        @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <span>Address</span>
                                        <input class="form-control" name="address" placeholder="Enter Address">
                                        @error('address')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <span>City</span>
                                        <input class="form-control" name="city" placeholder="Enter City">
                                        @error('city')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <span>Country</span>
                                        <select id="country" style="margin-top: 10px;" name="country" class="form-control">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option selected value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        @error('country')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-6" style="margin-top: 10px;">
                                        <span>State</span>
                                        <input class="form-control" name="state" placeholder="Enter State">
                                        @error('state')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-6" style="margin-top: 10px;">
                                        <span>Post Code</span>
                                        <input class="form-control" name="post_code" placeholder="Enter Post Code">
                                        @error('post_code')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="col-md-6" style="margin-top: 10px;">
                                        <span>Phone Nuumber</span>
                                        <input class="form-control" id="mobile_code" name="phone" placeholder="Phone Number">
                                        @error('phone')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                </div>
                        </div>
                        <input type="hidden" name="ticket_id" value="{{ $ticket_details->id }}">
                        <input type="hidden" name="category_id" value="{{ $ticket_details->category_id }}">
                        <input type="hidden" name="sub_cat_id" value="{{ $ticket_details->sub_cat_id }}">
                        <input type="hidden" name="child_sub_cat_id" value="{{ $ticket_details->child_sub_cat_id }}">
                        <input type="hidden" name="venue_id" value="{{ $ticket_details->venue_id }}">
                        <input type="hidden" name="event_id" value="{{ $ticket_details->event_id }}">
                        <input type="hidden" name="seller_id" value="{{ $ticket_details->seller_id }}">
                        <input type="hidden" name="section_id" value="{{ $ticket_details->section_id }}">
                        <input type="hidden" name="block_id" value="{{ $ticket_details->block_id }}">
                        <input type="hidden" name="quantity" value="{{ $quantity }}">
                        <input type="hidden" name="fee" value="{{ $fee }}">
                        <input type="hidden" name="ticket_price" value="{{ $ticket_details->price }}">
                        <input type="hidden" name="total_price" value="{{ $total_price }}">

                        <div class="section-order-details-event-action">
                            <div class="row">
                                <div class="col-sm-offset-5 col-sm-7 col-lg-offset-6 col-lg-6">
                                    <a class="primary-link" style="cursor: pointer" onclick="document.getElementById('form2').submit();">Proceed Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
