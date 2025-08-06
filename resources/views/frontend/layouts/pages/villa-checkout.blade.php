@extends('frontend.app')

@section('title', 'Villa Checkout')

@push('styles')
@endpush

@section('content')

    @php
        $cmsNew = $cms->where('id', 10)->first();
        $banner_image = $cmsNew ? $cmsNew->banner_image : null;
        $banner_title = $cmsNew ? $cmsNew->banner_title : null;
    @endphp

    <!-- Hero start -->
    <section class="hero-sec"
        {{-- style="background-image: url('{{ asset('/frontend/assets/images/background/checkout-bg.png') }}');"> --}}
        style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/background/checkout-bg.png') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <a class="back-btn" href="{{ route('all.villas') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M5.83337 14H22.1667M5.83337 14L10.5 18.6666M5.83337 14L10.5 9.33331" stroke="white"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>{{ __('Back to All Villas') }}</span>
                </a>
                <div class="banner-breadcrumb">
                    <a href="{{ route('home') }}" class="banner-breadcrumb-item">{{ __('Home') }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                            fill="white" />
                    </svg>
                    <a href="{{ route('villa.checkout', ['slug' => $data->slug]) }}" class="banner-breadcrumb-item">{{ __('Booking details') }}</a>
                </div>
                <h1 class="hero-title-pri">
                    @if ($banner_title)
                    {{ $banner_title }}
                @else
                {{ __('Booking details') }}
                @endif

                </h1>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- main section start -->
    <main>
        @php
            use Carbon\Carbon;
            $checkIn = $checkIn;
            $checkOut = $checkOut;
            $checkInFormat = Carbon::parse($checkIn)->format('F d, Y');
            $checkInCancelFormat = Carbon::parse($checkIn)->subDays(4)->format('F d, Y');
            $checkOutFormat = Carbon::parse($checkOut)->format('F d, Y');
            $calculatedDate = Carbon::parse($checkIn)->subDays(4);
            $today = Carbon::today();
        @endphp

        <section class="section checkout-container container">
            <div class="row g-4 g-lg-5">
                <div class="col-md-6">
                    <div class="details-container">
                        <div class="top-remain">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                fill="none">
                                <path
                                    d="M15 10.5L12 12.5V7.5M3 12.5C3 13.6819 3.23279 14.8522 3.68508 15.9442C4.13738 17.0361 4.80031 18.0282 5.63604 18.864C6.47177 19.6997 7.46392 20.3626 8.55585 20.8149C9.64778 21.2672 10.8181 21.5 12 21.5C13.1819 21.5 14.3522 21.2672 15.4442 20.8149C16.5361 20.3626 17.5282 19.6997 18.364 18.864C19.1997 18.0282 19.8626 17.0361 20.3149 15.9442C20.7672 14.8522 21 13.6819 21 12.5C21 11.3181 20.7672 10.1478 20.3149 9.05585C19.8626 7.96392 19.1997 6.97177 18.364 6.13604C17.5282 5.30031 16.5361 4.63738 15.4442 4.18508C14.3522 3.73279 13.1819 3.5 12 3.5C10.8181 3.5 9.64778 3.73279 8.55585 4.18508C7.46392 4.63738 6.47177 5.30031 5.63604 6.13604C4.80031 6.97177 4.13738 7.96392 3.68508 9.05585C3.23279 10.1478 3 11.3181 3 12.5Z"
                                    stroke="#FF9D00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span id="countdown-timer">
                                {{ __('We will hold your spot for 59:59 minutes') }}
                            </span>
                        </div>
                        <div class="title">{{ __('Check your personal details') }}</div>
                        <div class="bottom-remain">
                            @if ($calculatedDate->lessThan($today))
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path
                                        d="M12.5 8.33333L10 10V5.83333M2.5 10C2.5 10.9849 2.69399 11.9602 3.0709 12.8701C3.44781 13.7801 4.00026 14.6069 4.6967 15.3033C5.39314 15.9997 6.21993 16.5522 7.12987 16.9291C8.03982 17.306 9.01509 17.5 10 17.5C10.9849 17.5 11.9602 17.306 12.8701 16.9291C13.7801 16.5522 14.6069 15.9997 15.3033 15.3033C15.9997 14.6069 16.5522 13.7801 16.9291 12.8701C17.306 11.9602 17.5 10.9849 17.5 10C17.5 9.01509 17.306 8.03982 16.9291 7.12987C16.5522 6.21993 15.9997 5.39314 15.3033 4.6967C14.6069 4.00026 13.7801 3.44781 12.8701 3.0709C11.9602 2.69399 10.9849 2.5 10 2.5C9.01509 2.5 8.03982 2.69399 7.12987 3.0709C6.21993 3.44781 5.39314 4.00026 4.6967 4.6967C4.00026 5.39314 3.44781 6.21993 3.0709 7.12987C2.69399 8.03982 2.5 9.01509 2.5 10Z"
                                        stroke="#FF2600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>{{ __('Partial refund not eligible now') }}</span>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path
                                        d="M12.5 8.33333L10 10V5.83333M2.5 10C2.5 10.9849 2.69399 11.9602 3.0709 12.8701C3.44781 13.7801 4.00026 14.6069 4.6967 15.3033C5.39314 15.9997 6.21993 16.5522 7.12987 16.9291C8.03982 17.306 9.01509 17.5 10 17.5C10.9849 17.5 11.9602 17.306 12.8701 16.9291C13.7801 16.5522 14.6069 15.9997 15.3033 15.3033C15.9997 14.6069 16.5522 13.7801 16.9291 12.8701C17.306 11.9602 17.5 10.9849 17.5 10C17.5 9.01509 17.306 8.03982 16.9291 7.12987C16.5522 6.21993 15.9997 5.39314 15.3033 4.6967C14.6069 4.00026 13.7801 3.44781 12.8701 3.0709C11.9602 2.69399 10.9849 2.5 10 2.5C9.01509 2.5 8.03982 2.69399 7.12987 3.0709C6.21993 3.44781 5.39314 4.00026 4.6967 4.6967C4.00026 5.39314 3.44781 6.21993 3.0709 7.12987C2.69399 8.03982 2.5 9.01509 2.5 10Z"
                                        stroke="#FF2600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>{{ __('Partial refund if you cancel by') }} {{$checkInCancelFormat}}</span>
                            @endif
                        </div>

                        <div class="md-title my-3 my-lg-4">{{ __('Your trip') }}</div>
                        <div class="meta-data-item">
                            <div>
                                <div class="item-title">{{ __('Dates') }}</div>
                                <div class="item-data">{{$checkInFormat}} - {{$checkOutFormat}}</div>
                            </div>
{{--                            <button type="button">Edit</button>--}}
                        </div>
                        <div class="meta-data-item">
                            <div>
                                <div class="item-title">{{ __('Guests') }}</div>
                                <div class="item-data">{{ $guests }}</div>
                            </div>
{{--                            <button type="button">Edit</button>--}}
                        </div>
                        <div class="md-title mt-5 text-end">{{ __('* Required fields') }}</div>

                        <form action="{{ route('villa.booking.store') }}" class="checkout-form" method="POST">
                            @csrf
                            @method('POST')

                            <div class="book-field">
                                <label for="fullName">{{ __('Full Name') }}</label>
                                @if(Auth::check())
                                    <input id="fullName" name="name" type="text" value="{{ Auth::user()->name }}" readonly required />
                                @else
                                    <input id="fullName" name="name" type="text" required />
                                @endif

                            </div>
                            <div class="book-field">
                                <label for="fullName">{{ __('Email') }}</label>
                                @if(Auth::check())
                                    <input id="fullName" name="email" type="email" value="{{ Auth::user()->email }}" readonly required />
                                @else
                                    <input id="fullName" name="email" type="email" required />
                                @endif
                            </div>
                            <div class="book-select select2-parent align-ltr" dir="ltr">
                                <label for="country">{{ __('Country') }}</label>
                                <select class="searchSelect" name="country" required dir="ltr">
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
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
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cabo Verde">Cabo Verde</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
                                    <option value="Congo (Congo-Kinshasa)">Congo (Congo-Kinshasa)</option>
                                    <option value="Costa Rica">Costa Rica</option>
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
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel" selected>Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="North Macedonia">North Macedonia</option>
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
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Réunion">Réunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Sint Maarten">Sint Maarten</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-Leste">Timor-Leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City">Vatican City</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                            <div class="book-field">
                                <label for="phone">{{ __('Mobile phone number') }}</label>
                                @if(Auth::check())
                                    <input id="phone" name="number" type="number" value="{{ Auth::user()->number }}" required />
                                @else
                                    <input id="phone" name="number" type="number" required />
                                @endif
                            </div>
                            @foreach($user_statements as $statement)
                                <label class="small-text checkout-checkbox">
                                    <input type="checkbox" name="user_statement_id[]" value="{{ $statement->id }}" required />
                                    <span>{{ $statement->statement ?? '' }}</span>
                                </label>
                                @error('user_statement_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="small-text">
                                {{ __('We will only contact you with essential updates or changes to your booking') }}
                            </div>

                            <button type="submit" class="button button-pri mt-2">
                                {{ __('Got to payment') }}
                            </button>

                        </form>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="summery-container">
                        <div class="title">{{ __('Order summary') }}</div>
                        <div class="villa-feature">
                            <figure>
                                <img src="{{ asset( $data->villa_images->first()->image ?? '/frontend/assets/images/villa-details-1.jpg') }}" alt="" />
                            </figure>
                            <div>
                                <div class="villa-feature-review">
                                    <span>{{ $average_rating }}</span>
                                    <span>({{number_format($rating_count)}})</span>
                                    <div class="villa-feature-ratings">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                                                 fill="none">
                                                <path
                                                    d="M6.86922 6.61666L1.55255 7.3875L1.45838 7.40666C1.31583 7.44451 1.18588 7.5195 1.08179 7.624C0.977707 7.72849 0.903219 7.85874 0.865934 8.00143C0.82865 8.14413 0.829905 8.29417 0.869572 8.43622C0.909239 8.57828 0.985896 8.70726 1.09172 8.81L4.94338 12.5592L4.03505 17.855L4.02422 17.9467C4.01549 18.0941 4.0461 18.2412 4.11292 18.3729C4.17974 18.5046 4.28037 18.6162 4.4045 18.6963C4.52862 18.7763 4.67179 18.8219 4.81934 18.8284C4.96689 18.8349 5.11352 18.8021 5.24422 18.7333L9.99922 16.2333L14.7434 18.7333L14.8267 18.7717C14.9643 18.8258 15.1138 18.8425 15.2598 18.8198C15.4059 18.7971 15.5434 18.736 15.658 18.6427C15.7727 18.5494 15.8605 18.4273 15.9124 18.2889C15.9643 18.1504 15.9785 18.0007 15.9534 17.855L15.0442 12.5592L18.8975 8.80916L18.9625 8.73833C19.0554 8.62397 19.1163 8.48704 19.139 8.34149C19.1617 8.19594 19.1454 8.04698 19.0918 7.90977C19.0382 7.77257 18.9492 7.65202 18.8338 7.56042C18.7184 7.46883 18.5808 7.40944 18.435 7.38833L13.1184 6.61666L10.7417 1.8C10.6729 1.66044 10.5665 1.54293 10.4344 1.46075C10.3023 1.37857 10.1498 1.33502 9.99422 1.33502C9.83864 1.33502 9.68616 1.37857 9.55406 1.46075C9.42195 1.54293 9.31549 1.66044 9.24672 1.8L6.86922 6.61666Z"
                                                    fill="{{ $i <= $average_rating ? '#FF9D00' : '#C4C4C4' }}" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                <div class="villa-feature-title">{{ $data->title ?? '' }}</div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="price-items">
                            <div class="price-item">
                                <span>₪{{ number_format($data->price, 2) }} x {{ $days }} {{ __('nights') }}</span>
                                <span>₪{{ number_format($subtotal, 2) }}</span>
                            </div>

                            <div class="price-item" id="loyalty_discount_section" style="display: none;">
                                <span>{{ __('Loyalty Point Discount') }}</span>
                                <span id="loyalty-discount">₪{{ number_format($loyalty_discount ?? 0, 2) }}</span>
                            </div>

                            <div class="price-item">
                                <span>{{ __('Taxes') }} ({{$taxPercent}}%)</span>
                                <span>₪{{ number_format($tax, 2) }}</span>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="info-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M9 12L11 14L15 10M3 12C3 13.1819 3.23279 14.3522 3.68508 15.4442C4.13738 16.5361 4.80031 17.5282 5.63604 18.364C6.47177 19.1997 7.46392 19.8626 8.55585 20.3149C9.64778 20.7672 10.8181 21 12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C10.8181 3 9.64778 3.23279 8.55585 3.68508C7.46392 4.13738 6.47177 4.80031 5.63604 5.63604C4.80031 6.47177 4.13738 7.46392 3.68508 8.55585C3.23279 9.64778 3 10.8181 3 12Z"
                                    stroke="#2FA75F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div>
                                <div class="info-title">{{ __('Free cancellation') }}</div>
                                @if ($calculatedDate->lessThan($today))
                                    <div class="info-name">{{ __('Free cancellation over') }}</div>
                                @else
                                    <div class="info-name">
                                        {{ __('Until 10:00 AM on') }} {{$checkInCancelFormat}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="info-item">
                            <div>
                                <div class="info-title">{{ __('Selected date') }}</div>
                                <div class="info-name">
                                    {{$checkInFormat}} - {{$checkOutFormat}}
                                </div>
                            </div>
                        </div>
                        <div class="separator" id="loyalty-point-earn-hr"></div>
                        <div class="info-item" id="loyalty-point-earn">
                            <div>
                                <div class="info-title">{{ __('Loyalty Point Earn') }}</div>
                                <div class="info-name">
                                    {{ round($loyalty_point_earn) }} {{ __('Points') }}
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <form class="coupon-form">
                            <fieldset>
                                <label for="point">{{ __('Apply Loyalty Points') }}</label>
                                <div class="input-item">
                                    <div class="points">{{ Auth::user()->loyalty_point ?? 0 }}</div>
                                    <input type="number" name="point" id="point" />
                                </div>
                            </fieldset>
                            <button type="button" id="redeem-button">{{ __('Redeem') }}</button>
                            <button type="button" class="cancel-btn" id="redeem-cancel-button">{{ __('Remove') }}</button>
                        </form>
                        <div class="separator"></div>
                        <div class="bottom-price" id="save-amount-box" style="display: none;">
                            <div class="text">{{ __('Loyalty Point Save') }}:</div>
                            @php $save_amount = 0; @endphp
                            <div class="price" id="save-amount">₪{{ number_format($save_amount, 2) }}</div>
                        </div>
                        <div class="bottom-price">
                            <div class="text">{{ __('Total Included taxes') }}:</div>
                            <div class="price" id="total-price">₪{{ number_format($total, 2) }}</div>
                        </div>
                        @if($data->payment_option == 0)
                            <div class="bottom-price">
                                <div class="text">{{ __('Hand cash') }}:</div>
                                <div class="price" id="hand-cash-total">₪{{ number_format($hand_cash, 2) }}</div>
                            </div>
                            <div class="bottom-price">
                                <div class="text">{{ __('Online payment for booking') }}:</div>
                                <div class="price" id="online-total">₪{{ number_format($online_payment, 2) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- main section end -->

@endsection

@push('scripts')

    <script>
        // Assuming `createdAt` is passed from the backend as a data attribute or JSON object
        const createdAt = "{{ Session::get('cart.created_at') }}"; // Example: '2025-01-05 12:00:00'

        // Convert `createdAt` to a JavaScript Date object
        const createdAtDate = new Date(createdAt);
        const expirationDate = new Date(createdAtDate.getTime() + 60 * 60 * 1000); // Add 1 hour

        function updateCountdown() {
            const now = new Date();
            const timeRemaining = expirationDate - now;

            if (timeRemaining <= 0) {
                // Update the countdown text
                document.getElementById("countdown-timer").innerText = "{{ __('Your reservation has expired') }}.";

                // Send an AJAX request to remove the session
                removeCartSession();

                clearInterval(intervalId); // Stop the countdown
                return;
            }

            // Calculate hours, minutes, and seconds
            const hours = Math.floor(timeRemaining / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            // Format the time
            const formattedTime = `${hours > 0 ? hours + ":" : ""}${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;

            // Update the countdown text
            document.getElementById("countdown-timer").innerText = `{{ __('We will hold your spot for') }} ${formattedTime} {{ __('minutes') }}`;
        }

        // Send AJAX request to remove the cart session after 1 hour
        function removeCartSession() {
            fetch("{{ route('cart.remove') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
                .then(response => response.json())
                .then(data => {
                    console.log("Cart session removed:", data);
                })
                .catch(error => {
                    console.error("Error removing cart session:", error);
                });
        }

        // Update the countdown every second
        const intervalId = setInterval(updateCountdown, 1000);

        // Initialize the countdown immediately
        updateCountdown();
    </script>

    <script>
        document.getElementById('redeem-button').addEventListener('click', function () {
            const pointsToRedeem = document.getElementById('point').value;

            if (!pointsToRedeem || pointsToRedeem <= 0) {
                showErrorToast("Please enter a valid amount of loyalty points.");
                return;
            }

            // Send AJAX request to check and update loyalty points
            fetch('/check-and-redeem-loyalty-points', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                },
                body: JSON.stringify({
                    points: pointsToRedeem,
                    subtotal: {{ $subtotal }},
                    tax: {{ $tax }},
                    loyalty_discount: {{ $loyalty_discount ?? 0 }},
                    save_amount: {{ $save_amount ?? 0 }},
                    villa_payment_option: {{$data->payment_option}}, // Ensure you're passing the correct payment option
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the displayed price (total price after applying the loyalty points)
                    document.getElementById('total-price').textContent = '₪' + data.new_total.toFixed(2);

                    // Update the loyalty discount section
                    const loyaltyDiscountSection = document.getElementById('loyalty_discount_section');
                    const loyaltyDiscountSpan = document.getElementById('loyalty-discount');

                    const saveAmountBox = document.getElementById('save-amount-box');
                    const saveAmount = document.getElementById('save-amount');

                    const loyaltyEarnBox = document.getElementById('loyalty-point-earn');
                    const loyaltyEarnBoxHr = document.getElementById('loyalty-point-earn-hr');

                    if (data.loyalty_discount > 0) {
                        loyaltyDiscountSection.style.display = '';  // Show the loyalty discount section
                        saveAmountBox.style.display = '';  // Show the loyalty discount section
                        loyaltyDiscountSpan.textContent = '- ' + '₪' + data.loyalty_discount.toFixed(2);
                        saveAmount.textContent = '- ' + '₪' + data.save_amount.toFixed(2);

                        // Hide loyalty point earn elements
                        loyaltyEarnBox.style.display = 'none';
                        loyaltyEarnBoxHr.style.display = 'none';
                    } else {
                        loyaltyDiscountSection.style.display = 'none';  // Hide the loyalty discount section if no discount
                    }

                    // Show success toast message
                    showSuccessToast("Loyalty points redeemed successfully!");

                    // Update the hand cash and online payment in the UI
                    if (data.hand_cash > 0 || data.online_payment > 0) {
                        document.getElementById('hand-cash-total').textContent = '₪' + data.hand_cash.toFixed(2);
                        document.getElementById('online-total').textContent = '₪' + data.online_payment.toFixed(2);
                    }

                } else {
                    // Show error toast message from backend
                    showErrorToast(data.message || "Something went wrong. Please try again.");
                }
            })
        });
    </script>

    <script>
        $('#redeem-cancel-button').on('click', function () {
            $.ajax({
                url: '{{ route('booking.remove.loyalty.points') }}', // Route to handle the request
                type: 'DELETE', // HTTP method
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function (data) {
                    if (data.success) {
                        // Reset the loyalty points input field
                        $('#point').val('');

                        // Reset the displayed price to the original subtotal + tax
                        const subtotal = {{ $subtotal }};
                        const tax = {{ $tax }};
                        const total = subtotal + tax;

                        const loyaltyEarnBox = document.getElementById('loyalty-point-earn');
                        const loyaltyEarnBoxHr = document.getElementById('loyalty-point-earn-hr');

                        // Hide loyalty point earn elements
                        loyaltyEarnBox.style.display = '';
                        loyaltyEarnBoxHr.style.display = '';

                        $('#total-price').text('₪' + total.toFixed(2));

                        // Hide the loyalty discount section
                        $('#loyalty_discount_section').hide();
                        $('#save-amount-box').hide();
                        $('#save-amount').text('');

                        // Reset hand cash and online payment values
                        const handCash = subtotal * 0.85;
                        const online = total - handCash;

                        $('#hand-cash-total').text('₪' + handCash.toFixed(2));
                        $('#online-total').text('₪' + online.toFixed(2));

                        // Show success toast message
                        showSuccessToast(data['t-success'] || "Loyalty points removed successfully!");
                    } else {
                        // Show error toast message
                        showErrorToast(data.message || "Failed to remove loyalty points. Please try again.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    showErrorToast("An error occurred while processing your request. Please try again.");
                }
            });
        });
    </script>

    <script>
        document.querySelector('.checkout-form').addEventListener('submit', function(event) {
            console.log('Form submitted!');
        });
    </script>


@endpush
