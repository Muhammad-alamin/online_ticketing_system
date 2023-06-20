@extends('seller.layouts.master')
@section('content')
<section class="section-select-seat-featured-header">
    <div class="container">
        <div class="section-content">
            <p>{{ $event->child_sub_cat_name }}<strong>{{ $event->match_name }}</strong><span>{{ $event->venue_name }}</span> <span>{{ date('d-F-Y H:i', strtotime($event->match_date_time)) }}</span></p>
        </div>
    </div>
</section>

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Listing Your Ticket</h1>
    </div>
</section>

<section class="section-select-seat-page-content">
    <div class="container">
        <div class="row">
            @if(Session::has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><i class="fa fa-check" aria-hidden="true"></i> {{ session('success') }}</strong>
            </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><i class="fa fa-times" aria-hidden="true"></i> {{ session('error') }}</strong>
                </div>
            @endif
            <div id="secondary" class="col-md-6" id="main-content">
                <form action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="ticket-price">
                        <input type="hidden" value="{{ $event->venue_id }}" name="venue_id" id="venue_id">
                        <input type="hidden" value="{{ $event->id }}" name="event_id" id="event_id">
                        <input type="hidden" value="{{ $event->child_sub_cat_id }}" name="child_sub_cat_id" id="child_sub_cat_id">
                        <input type="hidden" value="{{ $event->sub_cat_id }}" name="sub_cat_id" id="sub_cat_id">
                        <input type="hidden" value="{{ $event->category_id }}" name="category_id" id="category_id">
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">How many tickets do you want to sell ?</label>
                            <select class="selectpicker dropdown" name="ticket_count" id="selectTicket" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="1" >1 Ticket</option>
                                <option value="2" >2 Tickets</option>
                                <option value="3" >3 Tickets</option>
                                <option value="4" >4 Tickets</option>
                                <option value="5" >5 Tickets</option>
                                <option value="6" >6 Tickets</option>
                                <option value="7" >7 Tickets</option>
                                <option value="8" >8 Tickets</option>
                                <option value="9" >9 Tickets</option>
                                <option value="10" >10 Tickets</option>
                                <option value="11" >11 Ticket</option>
                                <option value="12" >12 Tickets</option>
                                <option value="13" >13 Tickets</option>
                                <option value="14" >14 Tickets</option>
                                <option value="15" >15 Tickets</option>
                                <option value="16" >16 Tickets</option>
                                <option value="17" >17 Tickets</option>
                                <option value="18" >18 Tickets</option>
                                <option value="19" >19 Tickets</option>
                                <option value="20" >20 Tickets</option>
                                <option value="21" >21 Ticket</option>
                                <option value="22" >22 Tickets</option>
                                <option value="23" >23 Tickets</option>
                                <option value="24" >24 Tickets</option>
                                <option value="25" >25 Tickets</option>
                                <option value="26" >26 Tickets</option>
                                <option value="27" >27 Tickets</option>
                                <option value="28" >28 Tickets</option>
                                <option value="29" >29 Tickets</option>
                                <option value="30" >30 Tickets</option>
                            </select>
                            @error('ticket_count')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets" style="display: none" id="ticket_varient">
                            <label  style="font-size: 15px; font-weight:bold;">How do you want to sell your tickets ?</label>
                            <select class="selectpicker dropdown" name="ticket_varient" id="selectTicketVarient" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="Any" >ANY</option>
                                <option value="Pairs">PAIRS</option>
                                <option value="Full" >FULL</option>
                            </select>
                            @error('ticket_varient')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">What type of ticket is it ?</label>
                            <select class="selectpicker dropdown" name="ticket_types" id="mySelect" required="required">
                                <option selected disabled>Please Select</option>
                                <option value="Mobile-transfer" >Mobile Transfer</option>
                                <option value="E-ticket" >E-Ticket</option>
                                <option value="Paper" >Paper</option>
                                <option value="Membership" >Membership</option>
                            </select>
                            @error('ticket_types')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Are there any restrictions/infos with your tickets ? (if you have)</label>
                            <select multiple="multiple" name="ticket_restriction[]" class="selectpicker dropdown" >
                                <option style="width:20px" value="Restricted view (printed on ticket)" >Restricted view (printed on ticket)</option>
                                <option style="width:20px" value="Junior ticket (ages 21 and under)" >Junior ticket (ages 21 and under)</option>
                                <option style="width:20px" value="Home Supporters Only" >Home Supporters Only</option>
                                <option style="width:20px" value="Parking Pass" >Parking Pass</option>
                                <option style="width:20px" value="RIncludes unlimited food and drinks" >RIncludes unlimited food and drinks</option>
                                <option style="width:20px" value="Includes pregame food and beverage" >Includes pregame food and beverage</option>
                                <option style="width:20px" value="Padded Seats" >Padded Seats</option>
                                <option style="width:20px" value="Child ticket (ages 16 and under)" >Child ticket (ages 16 and under)*</option>
                                <option style="width:20px" value="Senior ticket (61 and older)" >Senior ticket (61 and older)</option>
                                <option style="width:20px" value="Early Access" >Early Access</option>
                                <option style="width:20px" value="Full Suite (not shared)" >Full Suite (not shared)</option>
                                <option style="width:20px" value="Includes limited complimentary food and drinks" >Includes limited complimentary food and drinks</option>
                                <option style="width:20px" value="Free Halftime drinks" >Free Halftime drinks</option>
                                <option style="width:20px" value="Standing Only" >Standing Only</option>
                                <option style="width:20px" value="Child ticket (ages 18 and under)" >Child ticket (ages 18 and under)*</option>
                                <option style="width:20px" value="Away Supporters Only" >Away Supporters Only</option>
                                <option style="width:20px" value="Vip Lounge Access" >Vip Lounge Access</option>
                                <option style="width:20px" value="Full Suite (Shared)" >Full Suite (Shared)</option>
                                <option style="width:20px" value="Food and drink voucher included" >Food and drink voucher included</option>
                                <option style="width:20px" value="Food and drink Available for Purchase" >Food and drink Available for Purchase</option>
                                <option style="width:20px" value="Complimentary matchday programme" >Complimentary matchday programme</option>
                                <option style="width:20px" value="Next to players'entrance" >Next to players' entrance</option>
                            </select>
                            @error('ticket_restriction')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Do you already have your ticket ? </label>
                            <select class="selectpicker dropdown" name="ticket_have">
                                <option selected disabled>Please Select</option>
                                <option value="Yes" >Yes</option>
                                <option value="No" >No</option>
                            </select>
                            @error('ticket_have')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets input_body" style="display: none" id="file">
                            <label  style="font-size: 15px; font-weight:bold;">Upload your E-ticket</label>
                            <div class='file-input'>
                                <input type='file' multiple name="image[]" accept="image/*">
                                <span class='button'>Choose</span>
                                <span class='label' data-js-label>No file selected</label>
                            </div>
                            <div class="append"></div>
                            @error('image')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold; color:red">SEAT DETAILS:</label>
                            <label  style="font-size: 15px; font-weight:bold;">Section : </label>
                            <select class="selectpicker dropdown" name="section" id="section">
                                <option selected disabled>Please Select</option>
                                @foreach($section as $key=>$section)
                                <option  value="{{$section->id}}">{{$section->section_name}}</option>
                                @endforeach
                            </select>
                            @error('section')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Block : </label>
                            <select class=" dropdown" name="block" id="block">
                                <option selected disabled>Please Select</option>
                            </select>
                        </div>

                        <div class="tickets">
                            <label  style="font-size: 15px; font-weight:bold;">Row : </label>
                            <input type="text" placeholder="Type Your Row" name="row" class="form-control">
                            @error('row')<i class="text-danger">{{$message}}</i>@enderror
                        </div>

                        <div class="tickets" style="border-bottom: 1px solid #cecece;">
                            <label  style="font-size: 15px; font-weight:bold; color:red">Price Per Ticket:</label>
                            <label  style="font-size: 15px; font-weight:bold;">What's the price at face value ? $ (US doller)</label>
                            <input type="number" name="price" placeholder="$ Per Ticket" class="form-control" required>
                            @error('price')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                        <div class="tickets ticket_address" style="border-bottom: 1px solid #cecece; display:none">
                            <div>
                                <label  style="font-size: 15px; font-weight:bold; color:red">ADDRESS FOR COLLECTION:</label>
                                <label  style="font-size: 15px; font-weight:bold;">Address</label>
                                <input type="text" name="address" placeholder="Address" class="form-control" >
                                @error('address')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                            <div>
                                <label  style="font-size: 15px; font-weight:bold;">Zipcode</label>
                                <input type="text" name="zipcode" placeholder="ZipCode" class="form-control" >
                                @error('zipcode')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                            <div>
                                <label  style="font-size: 15px; font-weight:bold;">City</label>
                                <input type="text" name="city" placeholder="City" class="form-control" >
                                @error('city')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <br>
                            <div>
                                <label  style="font-size: 15px; font-weight:bold;">Country</label>
                                <select id="country"name="country" class="form">
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
                        </div>
                    </div>
                    <br>
                    <button class="button" type="submit">Add Ticket</button>
                </form>
            </div>
            <div id="primary" class="col-md-6 sticky" style="margin-top: 50px;">
                    <img src="{{ asset($event->venue_image)}}">
            </div>
        </div>

    </div>
</section>
@endsection
