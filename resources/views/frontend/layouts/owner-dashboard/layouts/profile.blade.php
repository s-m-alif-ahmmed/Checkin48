@extends('frontend.layouts.owner-dashboard.app')

@section('title', 'Profile')

@push('styles')
    <style>
        .dashboard-content-password {
            width: 100%;
            min-height: calc(100% - 504px);
            background-color: #f5f6f7;
            padding: 20px;
        }
    </style>
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header--}}
        @include('frontend.layouts.owner-dashboard.partials.header')


        <!-- main section start -->
        <main class="dashboard-content">
            <form action="{{ route('owner.update.profile', $data->id) }}" class="profile-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="dashboard-card profile-update-form">

                    <div class="profile-upload-container">
                        <div class="profile-image">
                            <img
                                src="{{ asset(Auth::user()->avatar ?? 'frontend/default-avatar-profile.jpg') }}"
                                alt="profile image"
                                class="profile-img-main"
                            />
                        </div>
                        <input
                            type="file"
                            accept="image/*"
                            class="file-input"
                            name="avatar"
                            id="profile_picture_input"
                            style="display: none"
                        />
                        <button class="button button-sec upload-btn" type="button" id="uploadImageBtn">
                            {{ __('Upload Photo') }}
                        </button>
                        <button class="button button-ghost delete-btn" type="button" id="deleteImageBtn">
                            {{ __('Delete') }}
                        </button>
                    </div>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="username">{{ __('Username') }}:</label>
                        <input type="text" name="username" id="userName" value="{{ $data->username }}" />
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label for="name"> {{ __('Name') }}:</label>
                        <input type="text" id="name" name="name" value="{{ $data->name }}" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label for="email">{{ __('Email') }}:</label>
                        <input type="email" id="email" name="email" value="{{ $data->email }}" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label for="phoneNumber">{{ __('Phone Number') }}:</label>
                        <input type="number" id="phoneNumber" name="number" value="{{ $data->number }}" />
                        @error('number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper">
                        <label for="position">{{ __('Position') }}:</label>
                        <select class="select2" id="position" disabled>
                            @if($data->role == 'owner')
                                <option value="">{{ __('Villa owner') }}</option>
                            @elseif($data->role == 'user')
                                <option value="">{{ __('Buyer') }}</option>
                            @endif
                        </select>
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper full">
                        <label for="website">{{ __('Website') }}:</label>
                        <input type="url" id="website" name="website" value="{{ $data->website }}" />
                        @error('website')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper full">
                        <label for="about">{{ __('About') }}:</label>
                        <textarea id="about" name="about">{{ $data->about }}</textarea>
                        @error('about')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>

                <div class="dashboard-title">{{ __('Address & Location') }}</div>
                <div class="dashboard-card address-form">

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="address">{{ __('Address') }}:</label>
                        <input type="text" id="address" name="address" value="{{ $data->address }}"/>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="country_id">{{ __('Country') }}:</label>
                        <select class="searchSelect" name="country_id" id="country_id">
                            <option value="">{{ __('Select Country') }}</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $country->id == $data->country_id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="city_id">{{ __('City') }}:</label>
                        <select class="searchSelect" name="city_id" id="city_id">
                            @if($data->city_id)
                                <option value="{{ $data->city_id }}">{{ $data->city->name }}</option>
                            @else
                                <option value="">{{ __('Select City') }}</option>
                            @endif
                        </select>
                        @error('city_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="map_location">{{ __('Map Location') }}:</label>
                        <div class="location-field">
                            <input type="text" id="map_location" name="map_location" value="{{ $data->map_location }}" />
                            @error('map_location')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                            >
                                <mask id="path-1-inside-1_13457_3417" fill="white">
                                    <path
                                        d="M10 6.25C7.9325 6.25 6.25 7.9325 6.25 10C6.25 12.0675 7.9325 13.75 10 13.75C12.0675 13.75 13.75 12.0675 13.75 10C13.75 7.9325 12.0675 6.25 10 6.25ZM10 12.5C8.62125 12.5 7.5 11.3787 7.5 10C7.5 8.62125 8.62125 7.5 10 7.5C11.3787 7.5 12.5 8.62125 12.5 10C12.5 11.3787 11.3787 12.5 10 12.5Z"
                                    />
                                </mask>
                                <path
                                    d="M10 6.25C7.9325 6.25 6.25 7.9325 6.25 10C6.25 12.0675 7.9325 13.75 10 13.75C12.0675 13.75 13.75 12.0675 13.75 10C13.75 7.9325 12.0675 6.25 10 6.25ZM10 12.5C8.62125 12.5 7.5 11.3787 7.5 10C7.5 8.62125 8.62125 7.5 10 7.5C11.3787 7.5 12.5 8.62125 12.5 10C12.5 11.3787 11.3787 12.5 10 12.5Z"
                                    fill="#292D32"
                                />
                                <path
                                    d="M10 4.75C7.10407 4.75 4.75 7.10407 4.75 10H7.75C7.75 8.76093 8.76093 7.75 10 7.75V4.75ZM4.75 10C4.75 12.8959 7.10407 15.25 10 15.25V12.25C8.76093 12.25 7.75 11.2391 7.75 10H4.75ZM10 15.25C12.8959 15.25 15.25 12.8959 15.25 10H12.25C12.25 11.2391 11.2391 12.25 10 12.25V15.25ZM15.25 10C15.25 7.10407 12.8959 4.75 10 4.75V7.75C11.2391 7.75 12.25 8.76093 12.25 10H15.25ZM10 11C9.44968 11 9 10.5503 9 10H6C6 12.2072 7.79282 14 10 14V11ZM9 10C9 9.44968 9.44968 9 10 9V6C7.79282 6 6 7.79282 6 10H9ZM10 9C10.5503 9 11 9.44968 11 10H14C14 7.79282 12.2072 6 10 6V9ZM11 10C11 10.5503 10.5503 11 10 11V14C12.2072 14 14 12.2072 14 10H11Z"
                                    fill="#1D2635"
                                    mask="url(#path-1-inside-1_13457_3417)"
                                />
                                <path
                                    d="M18.5934 9.42773H16.846C16.5687 6.09336 13.907 3.43159 10.5726 3.1543V1.4069C10.5726 1.09065 10.3159 0.833984 9.99967 0.833984C9.68342 0.833984 9.42676 1.09065 9.42676 1.4069V3.1543C6.09238 3.43159 3.43061 6.0945 3.15332 9.42773H1.40592C1.08967 9.42773 0.833008 9.6844 0.833008 10.0007C0.833008 10.3169 1.08967 10.5736 1.40592 10.5736H3.15332C3.43061 13.9079 6.09238 16.5697 9.42676 16.847V18.5944C9.42676 18.9107 9.68342 19.1673 9.99967 19.1673C10.3159 19.1673 10.5726 18.9107 10.5726 18.5944V16.847C13.907 16.5697 16.5687 13.9079 16.846 10.5736H18.5934C18.9097 10.5736 19.1663 10.318 19.1663 10.0007C19.1663 9.68555 18.9097 9.42773 18.5934 9.42773ZM9.99967 15.7298C6.84061 15.7298 4.27051 13.1597 4.27051 10.0007C4.27051 6.84159 6.84061 4.27148 9.99967 4.27148C13.1587 4.27148 15.7288 6.84159 15.7288 10.0007C15.7288 13.1597 13.1587 15.7298 9.99967 15.7298Z"
                                    fill="#292D32"
                                />
                            </svg>
                        </div>
                    </fieldset>
                    <div class="location-map full">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108513.62076051172!2d35.0194686164434!3d31.79636954764663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502d7d634c1fc4b%3A0xd96f623e456ee1cb!2sJerusalem%2C%20Israel!5e0!3m2!1sen!2sbd!4v1739356206969!5m2!1sen!2sbd"
                            width="100%"
                            height="100%"
                            style="border: 0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        >
                        </iframe>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <button type="submit" class="button button-pri">{{ __('Save') }}</button>
                        <button type="reset" class="button button-sec">{{ __('Cancel') }}</button>
                    </div>
                </div>

            </form>

        </main>
        <!-- main section end -->


        <!-- Change Password start -->
        <div class="dashboard-content-password">
            <form action="{{ route('owner.update.profile.password', $data->id) }}" class="profile-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="dashboard-title">{{ __('Change Password') }}</div>
                <div class="dashboard-card profile-update-form">

                    <fieldset class="dashboard-input-wrapper full">
                        <label for="old_password">{{ __('Current Password') }}:</label>
                        <input type="password" name="old_password" id="old_password" />
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper full">
                        <label for="password">{{ __('Password') }}:</label>
                        <input type="password" name="password" id="password" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="dashboard-input-wrapper full">
                        <label for="password_confirmation">{{ __('Confirm Password') }}:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"/>
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <div class="d-flex gap-3 align-items-center">
                        <button type="submit" class="button button-pri">{{ __('Save') }}</button>
                        <button type="reset" class="button button-sec">{{ __('Cancel') }}</button>
                    </div>
                </div>

            </form>

        </div>
        <!-- Change Password end -->


    </div>
    <!-- Main layout end -->

@endsection

@push('scripts')

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
                            options += `<option value="${city.id}">${city.name}</option>`;
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
                            options += `<option value="${state.id}">${state.name}</option>`;
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

    <script>
        $(document).ready(function () {
            // Handle file input change and automatically upload the image
            $('#profile_picture_input').change(function () {
                var formData = new FormData();
                formData.append('avatar', $(this)[0].files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route('owner.update.profile.photo') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            // Update the profile picture in all places
                            $('.profile-img-main').attr('src', response.image_url);
                            showSuccessToast("{{ __('Profile picture updated successfully.') }}");
                        } else {
                            showErrorToast(response.message || "{{ __('Failed to update profile picture.') }}");
                        }
                    },
                    error: function (xhr) {
                        showErrorToast(xhr.responseJSON.message || "{{ __('An error occurred.') }}");
                    }
                });
            });

            // Delete profile picture on button click
            $('#deleteImageBtn').click(function () {
                $.ajax({
                    url: '{{ route('owner.delete.profile.photo') }}',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        if (response.success) {
                            // Reset the profile picture to the default avatar
                            $('.profile-img-main').attr('src', '{{ asset("frontend/default-avatar-profile.jpg") }}');
                            showSuccessToast("{{ __('Profile picture removed successfully.') }}");
                        } else {
                            showErrorToast(response.message || "{{ __('Failed to delete profile picture.') }}");
                        }
                    },
                    error: function (xhr) {
                        showErrorToast(xhr.responseJSON.message || "{{ __('An error occurred.') }}");
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Check for success message
            @if(session('t-success'))
            showSuccessToast("{{ session('t-success') }}", "Success");
            @endif

            // Check for error message
            @if(session('t-error'))
            showErrorToast("{{ session('t-error') }}", "Error");
            @endif
        });

    </script>
@endpush
