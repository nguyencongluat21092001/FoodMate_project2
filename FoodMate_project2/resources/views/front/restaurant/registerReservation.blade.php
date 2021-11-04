@extends('front.layout.master')
@section('title','FoodChow - Cloud Kitchen')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Register Reservation</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block top-padd30 gray-bg">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="reservation-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-lg-3">
                                        <div class="reservation-tabs-list brd-rd5">
                                            <ul class="nav nav-tabs brd-rd5">
                                                @if($restaurant_status == 1)
                                                    <li id="tab1" >
                                                        <a style="cursor: pointer">
                                                            <span class="brd-rd50">1</span> Register information</a>
                                                    </li>
                                                    <li id="tab2" class="active">
                                                        <a href="#reservation-tab2" data-toggle="tab">
                                                            <span class="brd-rd50">2</span> Pending
                                                        </a>
                                                    </li>
                                                    <li id="tab3"><a href="#reservation-tab3" data-toggle="tab"><span class="brd-rd50">3</span>  Select Package</a></li>
                                                    <li id="tab4"><a style="cursor: pointer"  ><span class="brd-rd50">4</span> Activation</a></li>
                                                @elseif($restaurant_status >= 2 && $restaurant_status < 5)
                                                    <li id="tab1">
                                                        <a style="cursor: pointer" >
                                                            <span class="brd-rd50">1</span> Register information</a>
                                                    </li>
                                                    <li id="tab2">
                                                        <a style="cursor: pointer">
                                                            <span class="brd-rd50">2</span> Pending
                                                        </a>
                                                    </li>
                                                    <li id="tab3" class="active"><a href="#reservation-tab3" data-toggle="tab"><span class="brd-rd50">3</span>  Select Package</a></li>
                                                    <li id="tab4"><a style="cursor: pointer"  ><span class="brd-rd50">4</span> Activation</a></li>
                                                @else
                                                    <li id="tab1" class="active">
                                                        <a href="#reservation-tab1" data-toggle="tab">
                                                            <span class="brd-rd50">1</span> Register information</a>
                                                    </li>
                                                    <li id="tab2">
                                                        <a style="cursor: pointer">
                                                            <span class="brd-rd50">2</span> Pending
                                                        </a>
                                                    </li>
                                                    <li id="tab3"><a href="#reservation-tab3" data-toggle="tab"><span class="brd-rd50">3</span>  Select Package</a></li>
                                                    <li id="tab4"><a style="cursor: pointer"  ><span class="brd-rd50">4</span> Activation</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-lg-9">
                                        <div class="reservation-tab-content">
                                            <div class="tab-content">
                                                @if($restaurant_status == 0 || $restaurant_status >= 5 )
                                                    <div class="tab-pane fade active in" id="reservation-tab1">
                                                        @else
                                                            <div class="tab-pane fade" id="reservation-tab1">
                                                                @endif
                                                                <div class="">
                                                                    <form class="restaurant-form-new " action="./register-reservation/add" enctype="multipart/form-data" method="post" >
                                                                        {{csrf_field()}}
                                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                                                        @endif

                                                                        <div class="form-style-2">
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="form-style-2-heading">INFORMATION RESTAURANT</h4>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <label for="field1"><span>Restaurant Name <span class="required">*</span></span>
                                                                                    <input type="text" id="name_restaurant" class="input-field" name="name_restaurant" value="" />
                                                                                    <span class="error" id="name_restaurant_error" ></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <label for="field2"><span>Phone Restaurant <span class="required">*</span></span>
                                                                                    <input type="text" class="input-field" id="phone_restaurant" name="phone_restaurant" value="" />
                                                                                    <span class="error" id="phone_restaurant_error"></span>

                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <label for="field3"><span>Manager Name <span class="required">*</span></span>
                                                                                    <input type="text" class="input-field" id="name_manager" name="name_manager" value="" />
                                                                                    <span class="error" id="name_manager_error"></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <label for="field4"><span>Manager Contact phone <span class="required">*</span></span>
                                                                                    <input type="text" class="input-field" id="phone_manager" name="phone_manager" value="" />
                                                                                    <span class="error" id="phone_manager_error"></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label for="field5"><span>Contact Email <span class="required">*</span></span>
                                                                                    <input type="email" class="input-field" id="email_restaurant" name="email_restaurant" value="" />
                                                                                    <span class="error" id="email_restaurant_error"></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="form-style-2-heading" style="padding-top: 15px">LOCATION</div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label for="field6"><span>Country </span>
                                                                                    <select name="country_restaurant" class="select-field" required>
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
                                                                                        <option value="United Kingdom">United Kingdom</option>
                                                                                        <option value="United States">United States</option>
                                                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                                        <option value="Uruguay">Uruguay</option>
                                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                                        <option value="Venezuela">Venezuela</option>
                                                                                        <option selected="selected" value="Viet Nam">Viet Nam</option>
                                                                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                                        <option value="Western Sahara">Western Sahara</option>
                                                                                        <option value="Yemen">Yemen</option>
                                                                                        <option value="Zambia">Zambia</option>
                                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                                    </select>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <label for="field7"><span>City </span>
                                                                                    <select onchange="print_district('district')" id="city_restaurant" name="city_restaurant" class="select-field" required>
                                                                                        <option value="0">Select City</option>
                                                                                        <option  value="An Giang">An Giang</option>
                                                                                        <option  value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                                                                        <option value="Bạc Liêu">Bạc Liêu</option>
                                                                                        <option value="Bắc Kạn">Bắc Kạn</option>
                                                                                        <option value="Bắc Giang">Bắc Giang</option>
                                                                                        <option value="Bắc Ninh">Bắc Ninh</option>
                                                                                        <option value="Bến Tre">Bến Tre</option>
                                                                                        <option value="Bình Dương">Bình Dương</option>
                                                                                        <option value="Bình Định">Bình Định</option>
                                                                                        <option value="Bình Phước">Bình Phước</option>
                                                                                        <option value="Bình Thuận">Bình Thuận</option>
                                                                                        <option value="Cà Mau">Cà Mau</option>
                                                                                        <option value="Cao Bằng">Cao Bằng</option>
                                                                                        <option value="Cần Thơ">Cần Thơ</option>
                                                                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                                                                        <option value="Đắk Lắk">Đắk Lắk</option>
                                                                                        <option value="Đắk Nông">Đắk Nông</option>
                                                                                        <option value="Đồng Nai">Đồng Nai</option>
                                                                                        <option value="Đồng Tháp">Đồng Tháp</option>
                                                                                        <option value="Điện Biên">Điện Biên</option>
                                                                                        <option value="Gia Lai">Gia Lai</option>
                                                                                        <option value="Hà Giang">Hà Giang</option>
                                                                                        <option value="Hà Nam">Hà Nam</option>
                                                                                        <option value="Hà Nội">Hà Nội</option>
                                                                                        <option value="Hà Tĩnh">Hà Tĩnh</option>
                                                                                        <option value="Hải Dương">Hải Dương</option>
                                                                                        <option value="Hải Phòng">Hải Phòng</option>
                                                                                        <option value="Hòa Bình">Hòa Bình</option>
                                                                                        <option value="Hậu Giang">Hậu Giang</option>
                                                                                        <option value="Hưng Yên">Hưng Yên</option>
                                                                                        <option value="Thành phố Hồ Chí Minh">Thành phố Hồ Chí Minh</option>
                                                                                        <option value="Khánh Hòa">Khánh Hòa</option>
                                                                                        <option value="Kiên Giang">Kiên Giang</option>
                                                                                        <option value="Kon Tum">Kon Tum</option>
                                                                                        <option value="Lai Châu">Lai Châu</option>
                                                                                        <option value="Lào Cai">Lào Cai</option>
                                                                                        <option value="Lạng Sơn">Lạng Sơn</option>
                                                                                        <option value="Lâm Đồng">Lâm Đồng</option>
                                                                                        <option value="Long An">Long An</option>
                                                                                        <option value="Nam Định">Nam Định</option>
                                                                                        <option value="Nghệ An">Nghệ An</option>
                                                                                        <option value="Ninh Bình">Ninh Bình</option>
                                                                                        <option value="Ninh Thuận">Ninh Thuận</option>
                                                                                        <option value="Phú Thọ">Phú Thọ</option>
                                                                                        <option value="Phú Yên">Phú Yên</option>
                                                                                        <option value="Quảng Bình">Quảng Bình</option>
                                                                                        <option value="Quảng Nam">Quảng Nam</option>
                                                                                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                                                        <option value="Quảng Ninh">Quảng Ninh</option>
                                                                                        <option value="Quảng Trị">Quảng Trị</option>
                                                                                        <option value="Sóc Trăng">Sóc Trăng</option>
                                                                                        <option value="Sơn La">Sơn La</option>
                                                                                        <option value="Tây Ninh">Tây Ninh</option>
                                                                                        <option value="Thái Bình">Thái Bình</option>
                                                                                        <option value="Thái Nguyên">Thái Nguyên</option>
                                                                                        <option value="Thanh Hóa">Thanh Hóa</option>
                                                                                        <option value="Thừa Thiên - Huế">Thừa Thiên - Huế</option>
                                                                                        <option value="Tiền Giang">Tiền Giang</option>
                                                                                        <option value="Trà Vinh">Trà Vinh</option>
                                                                                        <option value="Tuyên Quang">Tuyên Quang</option>
                                                                                        <option value="Vĩnh Long">Vĩnh Long</option>
                                                                                        <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                                                                        <option value="Yên Bái">Yên Bái</option>
                                                                                    </select>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-ld-6">
                                                                                <label for="field8"><span>District </span>
                                                                                    <select  id="district" name="district" class="select-field" >
                                                                                    </select>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label for="field9"><span>No./Street <span class="required">*</span></span>
                                                                                    <input type="text" class="input-field" id="street_restaurant" name="street_restaurant" value="" />
                                                                                    <span class="error" id="street_restaurant_error"></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="form-style-2-heading" style="padding-top: 15px">CATEGORY</div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">

                                                                                        @foreach($category as $cate)
                                                                                            <label class="container-checkbox" style="float: left;margin-right: 20px">{{$cate->cate_name}}
                                                                                                <input type="checkbox" name="category[]" value="{{$cate->id}}">
                                                                                                <span class="checkmark"></span>
                                                                                            </label>
                                                                                        @endforeach

                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="form-style-2-heading" style="padding-top: 15px">UPLOAD AVATAR AND FILE BUSINESS LICENSE</div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="profile-img-upload-btn">
                                                                                    <label class="fileContainer brd-rd5 yellow-bg">Upload Images
                                                                                        <input type="file" id="images" name="avatar_restaurant" required="true" onchange="loadImage(event)">
                                                                                    </label>
                                                                                </div>
                                                                                <img id="output"/>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="profile-img-upload-btn">
                                                                                    <label class="fileContainer brd-rd5 yellow-bg">Upload File
                                                                                        <input type="file" id="uploadBtn" name="file_restaurant[]" multiple onchange="loadFile(event)">
                                                                                    </label>
                                                                                    <input id="uploadFile" type="hidden"  disabled="disabled" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="form-style-2-heading" style="padding-top: 15px">TERMS AND CONDITIONS </div>
                                                                            </div>
                                                                            <div id="show-text" class="col-md-12 col-sm-12 col-lg-12" >
                                                                                <div style="">
                                                                                    <b>1. </b> The restaurant must have all kinds of legal papers on business and trade, the papers must be appropriate and still valid.
                                                                                    <br> <b>2. </b> Increase the trust of new customers through extremely honest and vivid reviews of existing customers.
                                                                                    <br><b>3. </b> Penalties for breach of contract include: fines for late delivery, fines for unsuitable delivery in terms of quantity and quality, fines for unsuitable delivery, fines for late payment, fines in case of contract cancellation, etc.
                                                                                    <br><b>4. </b> We hereby commit that the above registered information is completely true and fully responsible before the law.
                                                                                    <br><b>5. </b> If a restaurant package is expired for more than 12 months, we will delete the restaurant from our website and the owner of that restaurant must register  new restaurant if he want to sell food online.
                                                                                </div>
                                                                                <div class="" style="padding-top: 15px">
                                                                                    <label class="container-checkbox" style="float: left;margin-right: 20px;width: 100% ">Accept Terms and conditions
                                                                                        <input  type="checkbox" id="agrement">
                                                                                        <span class="checkmark"></span>
                                                                                        <div> <span class="error" id="agrement_error"></span></div>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="step-buttons">
                                                                                    <button onclick="return validate();" class="brd-rd3 red-bg" type="submit" >Send</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            @if($restaurant_status == 1)
                                                                <div class="tab-pane fade active in" id="reservation-tab2">
                                                                    @else
                                                                        <div class="tab-pane fade" id="reservation-tab2">
                                                                            @endif
                                                                            @if(isset($restaurant))
                                                                                <div class="form-style-2">
                                                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                        <div class="form-style-2-heading">INFORMATION RESTAURANT</h4>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                            <label for="field1"><span>Restaurant Name <span class="required">*</span></span><input type="text" class="input-field" name="name_restaurant" value="{{$restaurant->restaurant_name}}" readonly /></label>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                            <label for="field2"><span>Phone Restaurant <span class="required">*</span></span><input type="text" class="input-field" name="phone_restaurant" value="{{$restaurant->telephone}}" readonly/></label>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                            <label for="field3"><span>Manager Name <span class="required">*</span></span>
                                                                                                <input type="text" class="input-field" name="name_manager" value="{{$restaurant->owner_name}}"  readonly/>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                            <label for="field4"><span>Manager Contact phone <span class="required">*</span></span>
                                                                                                <input type="text" class="input-field" name="phone_manager" value="{{$restaurant->tel_owner}}" readonly />
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                            <label for="field5"><span>Contact Email <span class="required">*</span></span>
                                                                                                <input type="email" class="input-field" name="email_restaurant" value="{{$restaurant->email}}" readonly />
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                            <div class="form-style-2-heading" style="padding-top: 15px">LOCATION</div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                            <label for="field6"><span>Address </span>
                                                                                                <input type="text" class="input-field" value="{{$restaurant->address}}" readonly>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                            <div class="form-style-2-heading" style="padding-top: 15px">CATEGORY</div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                            <label for="field10"><span>Category <span class="required">*</span></span>
{{--                                                                                                {{dd($restaurant_menu)}}--}}
                                                                                                @foreach($category as $cate)
                                                                                                    @foreach($restaurant_menu as $menu)
                                                                                                        @if($cate->id == $menu->cate_id)
                                                                                                        <div style="float: left;margin-right: 20px"><input type="checkbox" checked name="category[]" value="{{$cate->id}}" readonly>{{$cate->cate_name}}</div>
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endforeach
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                            <div class="form-style-2-heading" style="padding-top: 15px">TERMS AND CONDITIONS </div>
                                                                                        </div>
                                                                                        <div id="show-text" class="col-md-12 col-sm-12 col-lg-12" >
                                                                                            <div style="">
                                                                                                <b>1. </b> The restaurant must have all kinds of legal papers on business and trade, the papers must be appropriate and still valid.
                                                                                                <br> <b>2. </b> Increase the trust of new customers through extremely honest and vivid reviews of existing customers.
                                                                                                <br><b>3. </b> Penalties for breach of contract include: fines for late delivery, fines for unsuitable delivery in terms of quantity and quality, fines for unsuitable delivery, fines for late payment, fines in case of contract cancellation, etc.
                                                                                                <br><b>4. </b> We hereby commit that the above registered information is completely true and fully responsible before the law.
                                                                                                <br><b>5. </b> If a restaurant package is expired for more than 12 months, we will delete the restaurant from our website and the owner of that restaurant must register  new restaurant if he want to sell food online.
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                            <div class="step-buttons">
                                                                                                <a class="btn btn dark-bg" href="./">Back</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <div class="form-new">

                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        @if($restaurant_status >= 2 && $restaurant_status < 5)
                                                                        <div class="tab-pane fade active in" id="reservation-tab3">
                                                                            @else
                                                                                <div class="tab-pane fade" id="reservation-tab3">
                                                                            @endif
                                                                            <div class="select-package-wrapper">
                                                                                <h4 itemprop="headline">BUY MEMBERSHIP</h4>
                                                                                <div class="remove-ext3">
                                                                                    <div class="row mrg10">
                                                                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                                                                            <div class="packege-box brd-rd5 text-center">
                                                                                                <div class="package-header brd-rd5">
                                                                                                    <h4 itemprop="headline"><span id="span1" style="color: lawngreen;display: none" class="fa fa-check-circle"></span>  THREE MONTHS</h4>
                                                                                                    <input type="hidden" id="input1">
                                                                                                    <span class="red-clr">$15.00</span>
                                                                                                </div>
                                                                                                <ul class="package-body">
                                                                                                    <li>Membership Duration</li>
                                                                                                    <li>Restaurant Duration</li>
                                                                                                    <li>Number of Tags</li>
                                                                                                    <li>Reviews</li>
                                                                                                    <li>Phone Number</li>
                                                                                                    <li>Website Link</li>
                                                                                                </ul>
                                                                                                <a class="brd-rd2" style="cursor: pointer" onclick="return package(1);"  title="" itemprop="url">SELECT PACKAGE </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                                                                            <div class="packege-box brd-rd5 text-center">
                                                                                                <div class="package-header brd-rd5">
                                                                                                    <h4 itemprop="headline"><span id="span2" style="color: lawngreen;display: none" class="fa fa-check-circle"></span>  SIX MONTHS</h4>
                                                                                                    <input type="hidden" id="input2">
                                                                                                    <span class="red-clr">$29.00</span>
                                                                                                </div>
                                                                                                <ul class="package-body">
                                                                                                    <li>Membership Duration</li>
                                                                                                    <li>Restaurant Duration</li>
                                                                                                    <li>Number of Tags</li>
                                                                                                    <li>Reviews</li>
                                                                                                    <li>Phone Number</li>
                                                                                                    <li>Website Link</li>
                                                                                                </ul>
                                                                                                <a class="brd-rd2"  style="cursor: pointer" onclick="return package(2);" title="" itemprop="url">SELECT PACKAGE </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                                                                            <div class="packege-box brd-rd5 text-center">
                                                                                                <div class="package-header brd-rd5">
                                                                                                    <h4 itemprop="headline"><span id="span3" style="color: lawngreen;display: none" class="fa fa-check-circle"></span>  ONE YEAR</h4>
                                                                                                    <span class="red-clr">$55.00</span>
                                                                                                </div>
                                                                                                <ul class="package-body">
                                                                                                    <li>Membership Duration</li>
                                                                                                    <li>Restaurant Duration</li>
                                                                                                    <li>Number of Tags</li>
                                                                                                    <li>Reviews</li>
                                                                                                    <li>Phone Number</li>
                                                                                                    <li>Website Link</li>
                                                                                                </ul>
                                                                                                <a class="brd-rd2"  style="cursor: pointer" onclick="return package(3);" title="" itemprop="url">SELECT PACKAGE </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                               @if($restaurant_id != 0 && 2 <= $restaurant_status && $restaurant_status < 5 )
                                                                                    <div id="next_step" class="step-buttons">
                                                                                        {{--                                                                                    <a class="brd-rd3" href="#reservation-tab1"  data-toggle="tab" title="" itemprop="url">Back Step</a>--}}
                                                                                        <div><span class="error" id="package_error"></span></div>
                                                                                        <a  style="cursor: pointer" class="brd-rd3 red-bg" onclick="return choicePackage();"  data-toggle="tab" title="" itemprop="url">Next Step</a>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="reservation-tab4">
                                                                            <div class="order-wrapper2 brd-rd5">
                                                                                <h4 itemprop="headlie">YOUR ORDER</h4>
                                                                                <form action="./register-reservation/package" method="POST">
                                                                                    {{csrf_field()}}
                                                                                    <ul class="ordr-lst brd-rd5">
                                                                                        <li class="lst-hed">PACKAGE <span>TOTAL</span></li>
                                                                                        <li>Three months <span>$15.00</span></li>
                                                                                        <li>Subtotal <span>$15.00</span></li>
                                                                                        <li>Gov Tax <span>$1.50</span></li>
                                                                                        <li class="red-bg">Total <span>$16.50</span></li>
                                                                                        <input type="hidden" name="package" value="3">
                                                                                        <input type="hidden" name="restaurant_id" value="{{$restaurant_id}}">
                                                                                    </ul>
                                                                                    <div class="pay-mnt">
                                                                                        <span class="radio-box">
                                                                                        <input type="radio" name="pay-mthd" id="mthd3" checked>
                                                                                        <label for="mthd3">Cash on delivery</label>
                                                                                    </span>
                                                                                    </div>
                                                                                    <div class="step-buttons">
                                                                                        <button class="brd-rd3 red-bg" type="submit" >Place Order</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                        <div class="tab-pane fade" id="reservation-tab5">
                                                                            <div class="order-wrapper2 brd-rd5">
                                                                                <h4 itemprop="headlie">YOUR ORDER</h4>
                                                                                <form action="./register-reservation/package" method="post">
                                                                                    {{csrf_field()}}
                                                                                   <ul class="ordr-lst brd-rd5">
                                                                                       <li class="lst-hed">PACKAGE <span>TOTAL</span></li>
                                                                                       <li>Six months <span>$29.00</span></li>
                                                                                       <li>Subtotal <span>$29.00</span></li>
                                                                                       <li>Gov Tax <span>$2.90</span></li>
                                                                                       <li class="red-bg">Total <span>$31.90</span></li>
                                                                                       <input type="hidden" name="package" value="6">
                                                                                       <input type="hidden" name="restaurant_id" value="{{$restaurant_id}}">
                                                                                   </ul>
                                                                                   <div class="pay-mnt">
                                                                                       <span class="radio-box">
                                                                                        <input type="radio" name="pay-mthd" id="mthd3" checked>
                                                                                        <label for="mthd3">Cash on delivery</label>
                                                                                    </span>
                                                                                   </div>
                                                                                    <div class="step-buttons">
                                                                                        <button class="brd-rd3 red-bg" type="submit" >Place Order</button>
                                                                                    </div>
                                                                               </form>
                                                                            </div>
                                                                        </div>

                                                                        <div class="tab-pane fade" id="reservation-tab6">
                                                                            <div class="order-wrapper2 brd-rd5">
                                                                                <h4 itemprop="headlie">YOUR ORDER</h4>
                                                                                <form action="./register-reservation/package" method="post">
                                                                                    {{csrf_field()}}
                                                                                    <ul class="ordr-lst brd-rd5">
                                                                                        <li class="lst-hed">PACKAGE <span>TOTAL</span></li>
                                                                                        <li>One year <span>$55.00</span></li>
                                                                                        <li>Subtotal <span>$55.00</span></li>
                                                                                        <li>Gov Tax <span>$5.50</span></li>
                                                                                        <li class="red-bg">Total <span>$60.50</span></li>
                                                                                        <input type="hidden" name="package" value="12">
                                                                                        <input type="hidden" name="restaurant_id" value="{{$restaurant_id}}">
                                                                                    </ul>
                                                                                    <div class="pay-mnt">
                                                                                        <span class="radio-box">
                                                                                        <input type="radio" name="pay-mthd" id="mthd3" checked>
                                                                                        <label for="mthd3">Cash on delivery</label>
                                                                                    </span>
                                                                                    </div>
                                                                                    <div class="step-buttons">
                                                                                        <button class="brd-rd3 red-bg" type="submit" >Place Order</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Section Box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var loadImage = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
            $(this).addClass('image_upload');
        };

        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
            $('#uploadFile').attr('type','text');
        };
        // validate form restaurant
        function getValue(id){
            return document.getElementById(id).value.trim();
        }

        function showError(key, mess){
            document.getElementById(key+'_error').innerHTML = mess;
        }

        function validate(){
            var flag = true;

            // name_restaurant
            var name_restaurant = getValue('name_restaurant');
            if (name_restaurant == '' ){
                flag = false;
                document.getElementById('name_restaurant').style.border = '1px solid red';
                showError('name_restaurant','Enter restaurant name!');
            }else {
                showError('name_restaurant','');
                document.getElementById('name_restaurant').style.border = '1px solid #333';
            }

            //phone_restaurant
            var phone_restaurant = getValue('phone_restaurant');
            if (phone_restaurant == ''){
                flag = false;
                showError('phone_restaurant','Enter phone restaurant!');
                document.getElementById('phone_restaurant').style.border = '1px solid red';
            }else if (!/^[0-9]{10}$/.test(phone_restaurant)){
                flag = false;
                showError('phone_restaurant','Phone number is not in the correct format!');
                document.getElementById('phone_restaurant').style.border = '1px solid red';
            }else {
                showError('phone_restaurant','');
                document.getElementById('phone_restaurant').style.border = '1px solid #333';
            }

            // name_manager
            var name_manager = getValue('name_manager');
            if (name_manager == '' ){
                flag = false;
                showError('name_manager','Enter manager name!');
                document.getElementById('name_manager').style.border = '1px solid red';
            }else {
                showError('name_manager','');
                document.getElementById('name_manager').style.border = '1px solid #333';
            }

            //phone_manager
            var phone_manager = getValue('phone_manager');
            if (phone_manager == ''){
                flag = false;
                showError('phone_manager','Enter phone restaurant!');
                document.getElementById('phone_manager').style.border = '1px solid red';
            }else if (!/^[0-9]{10}$/.test(phone_restaurant)){
                flag = false;
                showError('phone_manager','Phone number is not in the correct format!');
                document.getElementById('phone_manager').style.border = '1px solid red';
            }else {
                showError('phone_manager','');
                document.getElementById('phone_manager').style.border = '1px solid #333';
            }


            // email_restaurant
            var email_restaurant = getValue('email_restaurant');
            var format_mail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/
            if (email_restaurant == '' ){
                flag = false;
                showError('email_restaurant','Enter email restaurant!');
                document.getElementById('email_restaurant').style.border = '1px solid red';
            }else if (!format_mail.test(email_restaurant)){
                flag = false;
                showError('email_restaurant','The email entered is not in the correct format! ')
                document.getElementById('email_restaurant').style.border = '1px solid red';
            }
            else {
                showError('email_restaurant','');
                document.getElementById('email_restaurant').style.border = '1px solid #333';
            }

            // street_restaurant
            var street_restaurant = getValue('street_restaurant');
            if (street_restaurant == '' ){
                flag = false;
                showError('street_restaurant','Enter No./Street restaurant!');
                document.getElementById('street_restaurant').style.border = '1px solid red';
            }else {
                showError('street_restaurant','');
                document.getElementById('street_restaurant').style.border = '1px solid #333';
            }

            //checkbox
            var agrement = document.getElementById('agrement').checked;
            if (agrement == false ){
                flag = false;
                showError('agrement','You have not accepted the condition !');
                document.getElementById('agrement').style.border = '1px solid red';
            }else {
                showError('agrement','');
                document.getElementById('agrement').style.border = '1px solid #333';
            }

            return flag;
        }

        //onclick select package
        function package(i){
            if (i == 1){
                document.getElementById('span1').style.display = 'block';
                document.getElementById('span2').style.display = 'none';
                document.getElementById('span3').style.display = 'none';
                document.getElementById('next_step').innerHTML = '<a class="brd-rd3 red-bg" href="#reservation-tab4" onclick="tabColor();"  data-toggle="tab" title="" itemprop="url">Next Step</a>';
            }else if (i == 2){
                document.getElementById('span1').style.display = 'none';
                document.getElementById('span2').style.display = 'block';
                document.getElementById('span3').style.display = 'none';
                document.getElementById('next_step').innerHTML = '<a class="brd-rd3 red-bg" href="#reservation-tab5" onclick="tabColor();"  data-toggle="tab" title="" itemprop="url">Next Step</a>';
            }else if (i == 3){
                document.getElementById('span1').style.display = 'none';
                document.getElementById('span2').style.display = 'none';
                document.getElementById('span3').style.display = 'block';
                document.getElementById('next_step').innerHTML = '<a class="brd-rd3 red-bg" href="#reservation-tab6" onclick="tabColor();"  data-toggle="tab" title="" itemprop="url">Next Step</a>';
            }
        }

        function choicePackage(){
            // var falg = true;
            showError('package','You must choice one package!');
            return true;
        }

        function tabColor(){
            document.getElementById('tab4').classList.add('active');
            document.getElementById('tab3').classList.remove('active');
        }
    </script>
@endsection
