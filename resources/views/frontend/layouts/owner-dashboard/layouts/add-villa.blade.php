@extends('frontend.layouts.owner-dashboard.app')

@section('title', 'Add Villa')

@push('styles')
    {{-- Add flatpickr CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/css/intlTelInput.css">
    <style>
        .signup-form select {
            width: 100%;
            padding: 24px 12px;
            border: none;
            border-bottom: 1px solid #f0f0fa;
            outline: none;
            transition: border 0.3s;
            color: #666;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
        }
    </style>
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.owner-dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">

            <form class="add-villa-form" action="{{ route('owner.villa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="dashboard-title">{{ __('Upload Media') }}</div>
                <div class="dashboard-card">
                    <p class="text-danger pb-2">* {{ __('Insert all images here') }}</p>
                    <div class="media-upload-container" data-multiple="multiple">
                        <input type="file" name="villa_image[]" hidden multiple />
                        <div class="media-uploads">
                            <button type="button" class="button button-pri">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M12.5 6.66667H12.5083M2.5 13.3333L6.66667 9.16663C7.44 8.42246 8.39333 8.42246 9.16667 9.16663L13.3333 13.3333M11.6667 11.6666L12.5 10.8333C13.2733 10.0891 14.2267 10.0891 15 10.8333L17.5 13.3333M2.5 5C2.5 4.33696 2.76339 3.70107 3.23223 3.23223C3.70107 2.76339 4.33696 2.5 5 2.5H15C15.663 2.5 16.2989 2.76339 16.7678 3.23223C17.2366 3.70107 17.5 4.33696 17.5 5V15C17.5 15.663 17.2366 16.2989 16.7678 16.7678C16.2989 17.2366 15.663 17.5 15 17.5H5C4.33696 17.5 3.70107 17.2366 3.23223 16.7678C2.76339 16.2989 2.5 15.663 2.5 15V5Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>{{ __('Select Photos') }}</span>
                            </button>
                            <div class="text">
                                {{ __('or drag photos here') }} <br />
                                {{ __('(Up to 10 photos)') }}
                            </div>
                        </div>
                        <div class="media-upload-images"></div>
                    </div>
                    @error('villa_image[]')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="dashboard-title">{{ __('Villa Information') }}</div>
                <div class="dashboard-card info-form">

                    <fieldset class="dashboard-input-wrapper w-mid">
                        <label for="title_en">*{{ __('Title(English)') }}:</label>
                        <input type="text" name="title[en]" id="title_en" value="{{ old('title.en') }}" />
                        @error('title.en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper w-mid">
                        <label for="title_ar">*{{ __('Title(Arabic)') }}:</label>
                        <input type="text" name="title[ar]" id="title_ar" value="{{ old('title.ar') }}" />
                        @error('title.ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper w-mid">
                        <label for="country_id">*{{ __('Country') }}:</label>
                        <select class="searchSelect" name="country_id" id="country_id">
                            <option value="">{{ __('Select Country') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper w-mid">
                        <label for="state">{{ __('City') }}:</label>
                        <select class="searchSelect" name="city_id" id="city_id">
                            <option value="">{{ __('Select City') }}</option>
                        </select>
                        @error('city_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="des_en">*{{ __('Description(English)') }}:</label>
                        <textarea id="des_en" name="description[en]" class="h-100">{{ old('description.en') }}</textarea>
                        @error('description.en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="des_ar">*{{ __('Description(Arabic)') }}:</label>
                        <textarea id="des_ar" name="description[ar]" class="h-100">{{ old('description.ar') }}</textarea>
                        @error('description.ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="villa_rules_en">*{{ __('Villa Rules(English)') }}:</label>
                        <textarea id="villa_rules_en" name="villa_rules[en]" class="h-100">{{ old('villa_rules.en') }}</textarea>
                        @error('villa_rules.en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="villa_rules_ar">*{{ __('Villa Rules(Arabic)') }}:</label>
                        <textarea id="villa_rules_ar" name="villa_rules[ar]" class="h-100">{{ old('villa_rules.ar') }}</textarea>
                        @error('villa_rules.ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="address_en">*{{ __('Full Address(English)') }}:</label>
                        <input type="text" name="full_address[en]" id="address_en"
                            value="{{ old('full_address.en') }}" />
                        @error('full_address.en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="address_ar">*{{ __('Full Address(Arabic)') }}:</label>
                        <input type="text" name="full_address[ar]" id="address_ar"
                            value="{{ old('full_address.ar') }}" />
                        @error('full_address.ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    {{-- Price type start --}}
                    <div>
                        <label class="mb-4" style="font-weight: bold;"
                            for="price_type_id">*{{ __('Price Type') }}:</label>
                        <div style="display: flex; flex-direction: column; gap: 20px;">
                            {{-- @dd($price_types) --}}
                            @foreach ($price_types as $index => $price)
                                <div class="custom-control custom-checkbox"
                                    style="display: flex; align-items: center; flex-wrap: nowrap;">
                                    <label class="checkbox" for="price_type_id_{{ $price->id }}"
                                        style="white-space: nowrap; display: flex; align-items: center; color: black;">
                                        <input type="checkbox" class="custom-control-input price-checkbox"
                                            name="price_type_id[]" value="{{ $price->id }}"
                                            id="price_type_id_{{ $price->id }}"
                                            data-price-field="price_field_{{ $index }}" />
                                        <span class="checkbox-mark" style="margin-left: 5px;"></span>
                                        {{ $price->name ?? '' }}
                                    </label>
                                </div>

                                {{-- Hidden Price Input Field --}}
                                <fieldset class="dashboard-input-wrapper full price-field"
                                    id="price_field_{{ $index }}" style="display: none;">
                                    <label for="price_input_{{ $price->id }}">*{{ __('Price in Shekel') }}:</label>
                                    <input type="text" name="price[]" id="price_input_{{ $price->id }}"
                                        class="price-input" data-index="{{ $index+1 }}" />
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    {{-- Calculation Fields --}}
                                    <fieldset class="dashboard-input-wrapper full user-show-price-field"
                                        style="display: none;">
                                        <label>{{ __('User Show Price without Tax') }}:</label>
                                        <input type="text" class="user_show_price" disabled />
                                    </fieldset>

                                    <fieldset class="dashboard-input-wrapper full villa-owner-price-field"
                                        style="display: none;">
                                        <label>{{ __('Villa Owner Get Price (85%)') }}:</label>
                                        <input type="text" class="villa_owner_price" disabled />
                                    </fieldset>

                                    <fieldset class="dashboard-input-wrapper full platform-fee-field"
                                        style="display: none;">
                                        <label>{{ __('Platform Fee (15%)') }}:</label>
                                        <input type="text" class="platform_fee" disabled />
                                    </fieldset>
                                </fieldset>
                            @endforeach
                        </div>
                    </div>
                    {{-- Price type end --}}

                </div>

                <div class="dashboard-title">{{ __('Additional Information') }}</div>
                <div class="dashboard-card additional-info-form">
                    <fieldset class="dashboard-input-wrapper w-mid">
                        <label>*{{ __('Property Type') }}:</label>
                        <select class="searchSelect" name="property_type">
                            <option value="Villa">{{ __('Villa') }}</option>
                            {{--                            <option value="Hotel">Hotel</option> --}}
                            <option value="Apartment">{{ __('Apartment') }}</option>
                        </select>
                        @error('property_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper w-mid">
                        <label>*{{ __('Property Label') }}:</label>
                        <select class="searchSelect" name="property_label_id">
                            @foreach ($property_labels as $label)
                                <option value="{{ $label->id }}">{{ $label->name }}</option>
                            @endforeach
                        </select>
                        @error('property_label_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper">
                        <label>*{{ __('Total Rooms') }}:</label>
                        <input type="number" name="room" value="{{ old('room') }}" />
                        @error('room')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label>*{{ __('Total Bathrooms') }}:</label>
                        <input type="number" name="bathroom" value="{{ old('bathroom') }}" />
                        @error('bathroom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('Balconys') }}:</label>
                        <input type="number" name="balcony" value="{{ old('balcony') }}" />
                        @error('balcony')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('kitchens') }}:</label>
                        <input type="number" name="kitchen" value="{{ old('kitchen') }}" />
                        @error('kitchen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('Living Rooms') }}:</label>
                        <input type="number" name="living_room" value="{{ old('living_room') }}" />
                        @error('living_room')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('Bars') }}:</label>
                        <input type="number" name="bar" value="{{ old('bar') }}" />
                        @error('bar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('Pool Size (Sqft)') }}:</label>
                        <input type="number" name="pool" value="{{ old('pool') }}" />
                        @error('pool')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('Garages') }}:</label>
                        <input type="number" name="garage" value="{{ old('garage') }}" />
                        @error('garage')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('Max Adults') }}:</label>
                        <input type="number" name="adults" value="{{ old('adults') }}" />
                        @error('adults')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label>{{ __('Booking Off Dates') }}:</label>
                        <input type="text" name="date_calendar[]" id="date_calendar" />
                        @error('date_calendar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper">
                        <label>*{{ __('Checkin Time') }}:</label>
                        <input type="time" name="check_in_time" value="{{ old('check_in_time') }}" />
                        @error('check_in_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper">
                        <label>*{{ __('Checkout Time') }}:</label>
                        <input type="time" name="check_out_time" value="{{ old('check_out_time') }}" />
                        @error('check_out_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>

                </div>

                <div class="dashboard-title">{{ __('Amenities') }}</div>
                <div class="dashboard-card amenities-select-form">
                    @foreach ($amenities as $amenity)
                        <label class="amenities-checkbox">
                            <input type="checkbox" name="amenity_id[]" value="{{ $amenity->id }}" />
                            @if ($amenity->image)
                                <img src="{{ asset($amenity->image ?? '/frontend/assets/images/icons/bed-icon.svg') }}"
                                    alt="">
                            @endif
                            <span>{{ $amenity->name }}</span>
                        </label>
                    @endforeach
                    @error('amenity_id[]')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="payment_option" value="1" hidden />

                <div class="Payment-options">
                    <div class="title">*{{ __('Payment Options') }}</div>
                    {{--                    <label class="radio-input w-100"> --}}
                    {{--                        <input type="radio" name="payment_option" value="1" --}}
                    {{--                            {{ old('payment_option') == '1' ? 'checked' : '' }} /> --}}
                    {{--                        <span class="radio-check-mark"></span> --}}
                    {{--                        <span>{{ __('Pay full amount via website') }}</span> --}}
                    {{--                    </label> --}}
                    <label class="radio-input w-100">
                        <input type="radio" name="payment_option" value="0"
                            {{ old('payment_option') == '0' ? 'checked' : '' }} required />
                        <span class="radio-check-mark"></span>
                        <span>{{ __('Pay 15% online and 85% in cash on arrival') }}</span>
                    </label>
                    @error('payment_option')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="Payment-options">
                    <div class="title">*{{ __('Terms and Conditions') }}</div>
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        @foreach ($owner_statements as $statement)
                            <label class="checkbox">
                                <input type="checkbox" name="owner_statement_id[]" value="{{ $statement->id }}"
                                    required />
                                <span class="checkbox-mark"></span>
                                <span>{{ $statement->statement ?? '' }}</span>
                                @error('owner_statement_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="dashboard-title">*{{ __('Owner Signature') }}</div>
                <div class="dashboard-card signature-box">
                    <img id="signatureImage" src="" />
                    <input type="hidden" name="signature" id="signature" value="{{ old('signature') }}" required>
                    <div id="signatureImageSubmitDiv">
                        <canvas id="signature-pad" class="signature-pad" style="border: 1px solid black;"></canvas>
                        <br />
                        <button type="button" id="clear"
                            style="background-color: red; color: white; padding: 5px 12px; margin: 8px 0; border: none; border-radius: 5px; cursor: pointer;">{{ __('Clear') }}</button>
                        <button type="button" id="save"
                            style="background-color: #1E84FE; color: white; padding: 5px 12px; margin: 8px 0; border: none; border-radius: 5px; cursor: pointer;">{{ __('Save') }}</button>
                    </div>
                    @error('signature')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="d-flex gap-3 justify-content-center align-items-center ">
                    <button type="submit" class="button button-pri">
                        {{ __('Add Property') }}
                    </button>
                </div>

            </form>

        </main>
        <!-- main section end -->
    </div>
    <!-- Main layout end -->

@endsection

@push('scripts')
    {{-- price type javascript part start --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all checkboxes
            const checkboxes = document.querySelectorAll('.price-checkbox');

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', function() {
                    let priceFieldId = this.getAttribute('data-price-field');
                    let priceField = document.getElementById(priceFieldId);

                    if (this.checked) {
                        priceField.style.display = 'block';
                    } else {
                        priceField.style.display = 'none';
                        priceField.querySelector('.price-input').value = '';
                        hideCalculationFields(priceField);
                    }
                });
            });

            // Price calculation function
            document.querySelectorAll('.price-input').forEach((input) => {
                input.addEventListener('input', function() {
                    let price = parseFloat(this.value);
                    let parentFieldset = this.closest('.price-field');

                    if (!isNaN(price) && price > 0) {
                        showCalculationFields(parentFieldset);

                        let userShowPrice = price;
                        parentFieldset.querySelector('.user_show_price').value = userShowPrice
                            .toFixed(2);

                        let villaOwnerPrice = price * 0.85;
                        parentFieldset.querySelector('.villa_owner_price').value = villaOwnerPrice
                            .toFixed(2);

                        let platformFee = price * 0.15;
                        parentFieldset.querySelector('.platform_fee').value = platformFee.toFixed(
                            2);
                    } else {
                        hideCalculationFields(parentFieldset);
                    }
                });
            });

            function showCalculationFields(parent) {
                parent.querySelector('.user-show-price-field').style.display = 'block';
                parent.querySelector('.villa-owner-price-field').style.display = 'block';
                parent.querySelector('.platform-fee-field').style.display = 'block';
            }

            function hideCalculationFields(parent) {
                parent.querySelector('.user-show-price-field').style.display = 'none';
                parent.querySelector('.villa-owner-price-field').style.display = 'none';
                parent.querySelector('.platform-fee-field').style.display = 'none';
            }
        });
    </script>
    {{-- price type javascript part end --}}

    <!-- Include the SignaturePad library -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const canvas = document.getElementById('signature-pad');
            const signatureImage = document.getElementById('signatureImage');
            const signatureImageSubmitDiv = document.getElementById('signatureImageSubmitDiv');
            const signature = document.getElementById('signature');
            const signaturePad = new SignaturePad(canvas);

            document.getElementById('clear').addEventListener('click', () => {
                signaturePad.clear();
            });

            document.getElementById('save').addEventListener('click', () => {
                if (signaturePad.isEmpty()) {
                    alert("Please provide a signature first.");
                } else {
                    const dataURL = signaturePad.toDataURL();
                    console.log(dataURL);
                    const img = new Image();
                    signatureImageSubmitDiv.style.display = 'none';
                    signatureImage.src = dataURL;
                    signature.value = dataURL;
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Country Dropdown Change
            $('#country_id').change(function() {
                var countryId = $(this).val();

                // Reset city and state dropdowns
                $('#city_id').html('<option value="">{{ __('Select City') }}</option>');
                $('#state_id').html('<option value="">{{ __('Select State') }}</option>');

                if (!countryId) return;

                // Fetch cities for the selected country
                $.ajax({
                    url: '{{ route('getCitiesByCountry') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        country_id: countryId
                    },
                    success: function(cities) {
                        var options = '<option value="">{{ __('Select City') }}</option>';
                        cities.forEach(function(city) {
                            options +=
                                `<option value="${city.id}">${city.name}</option>`;
                        });
                        $('#city_id').html(options);
                    },
                    error: function(xhr) {
                        console.error("Error fetching cities:", xhr.responseJSON.message);
                        // Optionally, you can add a notification for the user
                        showErrorToast("Error fetching cities. Please try again later.");
                    }
                });
            });

            // City Dropdown Change
            $('#city_id').change(function() {
                var cityId = $(this).val();

                // Reset state dropdown
                $('#state_id').html('<option value="">{{ __('Select State') }}</option>');

                if (!cityId) return;

                // Fetch states for the selected city
                $.ajax({
                    url: '{{ route('getStatesByCity') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        city_id: cityId
                    },
                    success: function(states) {
                        var options = '<option value="">{{ __('Select State') }}</option>';
                        states.forEach(function(state) {
                            options +=
                                `<option value="${state.id}">${state.name}</option>`;
                        });
                        $('#state_id').html(options);
                    },
                    error: function(xhr) {
                        console.error("Error fetching states:", xhr.responseJSON.message);
                        // Optionally, you can add a notification for the user
                        showErrorToast("Error fetching states. Please try again later.");
                    }
                });
            });
        });
    </script>

    {{-- Add flatpickr JS --}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

    {{--    <script> --}}
    {{--        document.addEventListener("DOMContentLoaded", function() { --}}
    {{--            flatpickr("#date_calendar", { --}}
    {{--                mode: "multiple", // Allows multiple date selections --}}
    {{--                dateFormat: "Y-m-d", // Date format --}}
    {{--                altInput: true, // Show alternate input format --}}
    {{--                altFormat: "F j, Y", // Alt format for the displayed date --}}
    {{--            }); --}}
    {{--        }); --}}
    {{--    </script> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Detect user language preference (you can replace this with your app's language logic)
            const userLang = document.documentElement.lang || "en"; // Default to English if no lang is set

            flatpickr("#date_calendar", {
                mode: "multiple", // Allows multiple date selections
                dateFormat: "Y-m-d", // Date format
                altInput: true, // Show alternate input format
                altFormat: "F j, Y", // Alt format for the displayed date
                locale: userLang === "ar" ? "ar" : "en" // Dynamically set the locale
            });
        });
    </script>
@endpush
