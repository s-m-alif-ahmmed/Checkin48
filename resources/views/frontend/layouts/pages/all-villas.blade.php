@extends('frontend.app')

@section('title', 'Villas List')

@push('styles')
@endpush

@section('content')

    @php
        $cmsNew = $cms->where('id', 9)->first();
        $banner_image = $cmsNew ? $cmsNew->banner_image : null;
        $banner_title = $cmsNew ? $cmsNew->banner_title : null;
        $page_image = $cmsNew ? $cmsNew->page_image : null;
        $page_title = $cmsNew ? $cmsNew->page_title : null;
        $button_title = $cmsNew ? $cmsNew->button_title : null; // Ensure cmsHeroBanner is not null
        $button_url = $cmsNew ? $cmsNew->button_url : null; // Ensure cmsHeroBanner is not null
    @endphp

    <!-- Hero start -->
    <section class="hero-sec" {{-- style="background-image: url('{{ asset('/frontend/assets/images/home-banner-bg.png') }}')"> --}}
        style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/home-banner-bg.png') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="banner-breadcrumb">
                    <a href="{{ route('home') }}" class="banner-breadcrumb-item">{{ __('Home') }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                            fill="white" />
                    </svg>
                    <a href="{{ route('all.villas') }}" class="banner-breadcrumb-item">{{ __('All Villas') }}</a>
                </div>
                <h1 class="hero-title-pri">
                    @if ($banner_title)
                        {{ $banner_title }}
                    @else
                        {{ __('Discover your perfect') }} <br>
                        {{ __('getaway') }}
                    @endif

                </h1>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- main section start -->
    <main>
        <!-- all villas section start -->
        <section class="section all-villas-section container">
            <div class="section-box">
                <h2 class="section-title">{{ __('Explore our all villas') }}</h2>
                <div class="top-filter">
                    <button class="filter-search-button" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M1.89844 5.0445H12.957C13.3024 6.63975 14.7231 7.839 16.4201 7.839C18.1172 7.839 19.5379 6.63975 19.8832 5.0445H22.1008C22.2997 5.0445 22.4905 4.96548 22.6311 4.82483C22.7718 4.68418 22.8508 4.49341 22.8508 4.2945C22.8508 4.09559 22.7718 3.90482 22.6311 3.76417C22.4905 3.62352 22.2997 3.5445 22.1008 3.5445H19.8832C19.5379 1.94925 18.1172 0.75 16.4201 0.75C14.7231 0.75 13.3024 1.94925 12.957 3.5445H1.89844C1.69953 3.5445 1.50876 3.62352 1.36811 3.76417C1.22746 3.90482 1.14844 4.09559 1.14844 4.2945C1.14844 4.49341 1.22746 4.68418 1.36811 4.82483C1.50876 4.96548 1.69953 5.0445 1.89844 5.0445ZM16.4201 2.25C17.5476 2.25 18.4646 3.16725 18.4646 4.2945C18.4646 5.42175 17.5474 6.339 16.4201 6.339C15.2929 6.339 14.3756 5.42175 14.3756 4.2945C14.3756 3.16725 15.2927 2.25 16.4201 2.25ZM22.1008 11.25H11.0423C10.6969 9.65475 9.27619 8.4555 7.57913 8.4555C5.88206 8.4555 4.46138 9.65475 4.116 11.25H1.89844C1.69953 11.25 1.50876 11.329 1.36811 11.4697C1.22746 11.6103 1.14844 11.8011 1.14844 12C1.14844 12.1989 1.22746 12.3897 1.36811 12.5303C1.50876 12.671 1.69953 12.75 1.89844 12.75H4.116C4.46138 14.3453 5.88206 15.5445 7.57913 15.5445C9.27619 15.5445 10.6969 14.3453 11.0423 12.75H22.1008C22.2997 12.75 22.4905 12.671 22.6311 12.5303C22.7718 12.3897 22.8508 12.1989 22.8508 12C22.8508 11.8011 22.7718 11.6103 22.6311 11.4697C22.4905 11.329 22.2997 11.25 22.1008 11.25ZM7.57913 14.0445C6.45169 14.0445 5.53463 13.1272 5.53463 12C5.53463 10.8728 6.45188 9.9555 7.57913 9.9555C8.70638 9.9555 9.62362 10.8726 9.62362 12C9.62362 13.1274 8.70656 14.0445 7.57913 14.0445ZM22.1008 18.9555H19.8832C19.5379 17.3603 18.1172 16.161 16.4201 16.161C14.7231 16.161 13.3024 17.3603 12.957 18.9555H1.89844C1.69953 18.9555 1.50876 19.0345 1.36811 19.1752C1.22746 19.3158 1.14844 19.5066 1.14844 19.7055C1.14844 19.9044 1.22746 20.0952 1.36811 20.2358C1.50876 20.3765 1.69953 20.4555 1.89844 20.4555H12.957C13.3024 22.0508 14.7231 23.25 16.4201 23.25C18.1172 23.25 19.5379 22.0508 19.8832 20.4555H22.1008C22.2997 20.4555 22.4905 20.3765 22.6311 20.2358C22.7718 20.0952 22.8508 19.9044 22.8508 19.7055C22.8508 19.5066 22.7718 19.3158 22.6311 19.1752C22.4905 19.0345 22.2997 18.9555 22.1008 18.9555ZM16.4201 21.75C15.2927 21.75 14.3756 20.8328 14.3756 19.7055C14.3756 18.5783 15.2929 17.661 16.4201 17.661C17.5474 17.661 18.4646 18.5783 18.4646 19.7055C18.4646 20.8328 17.5476 21.75 16.4201 21.75Z"
                                fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="listing-filters responsive-filters">
                <div class="filter-search">
                    <img src="{{ asset('/frontend/assets/images/icons/search.svg') }}" alt="search icon" />
                    <input type="text" class="search-keyword-input" placeholder="{{ __('Search keyword') }}" />
                </div>
                <div class="filter-location">
                    <input type="text" class="location-search-input" placeholder="{{ __('Location name') }}" />
                    <img src="{{ asset('/frontend/assets/images/icons/current-location.svg') }}" alt="location icon" />
                </div>
                <div class="filter-select select2-parent">
                    <select class="select2 property-type-select">
                        <option value="" disabled>{{ __('Type') }}</option>
                        <option value="Villa">{{ __('Villa') }}</option>
                        <option value="Apartment">{{ __('Apartment') }}</option>
                    </select>
                </div>
                {{-- <div class="filter-range" dir="ltr">
                    <div class="filter-range-label">
                        <label>Price:</label>
                        <div class="filter-range-value">
                            $<span id="minPrice">100</span> - $<span id="maxPrice">50000</span>
                        </div>
                    </div>
                    <div class="range-wrapper" dir="ltr">
                        <input type="range" class="range-input min-range" min="100" max="650000" step="100"
                            value="100" data-target="#minPrice" dir="ltr" />
                        <input type="range" class="range-input max-range" min="100" max="650000" step="100"
                            value="650000" data-target="#maxPrice" dir="ltr" />

                        <div class="range-slider">
                            <div class="range-bg"></div>
                            <div class="range-active"></div>
                            <div class="thumb thumb-min"></div>
                            <div class="thumb thumb-max"></div>
                        </div>
                    </div>
                </div> --}}

                <div class="filter-range" dir="ltr">
                    <div class="filter-range-label">
                        <label>{{ __('Price') }}:</label>
                        <div class="filter-range-value">
                            $<span id="minPrice">100</span> - $<span id="maxPrice">100000</span>
                        </div>
                    </div>
                    <div class="range-wrapper" dir="ltr">
                        <input type="range" class="range-input min-range" min="100" max="100000" step="100"
                            value="100" data-target="#minPrice" dir="ltr" />
                        <input type="range" class="range-input max-range" min="100" max="100000" step="100"
                            value="100000" data-target="#maxPrice" dir="ltr" />

                        <div class="range-slider">
                            <div class="range-bg"></div>
                            <div class="range-active"></div>
                            <div class="thumb thumb-min"></div>
                            <div class="thumb thumb-max"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="filter-range" dir="ltr">
                    <div class="filter-range-label">
                        <label>Size:</label>
                        <div class="filter-range-value">
                            <span id="minSize">500</span> SqFt to
                            <span id="maxSize">1,500</span> SqFt
                        </div>
                    </div>
                    <div class="range-wrapper" dir="ltr">
                        <input type="range" class="range-input min-range" min="100" max="1500" step="10"
                            value="100" data-target="#minSize" dir="ltr" />
                        <input type="range" class="range-input max-range" min="100" max="1500" step="10"
                            value="1500" data-target="#maxSize" dir="ltr" />

                        <div class="range-slider">
                            <div class="range-bg"></div>
                            <div class="range-active"></div>
                            <div class="thumb thumb-min"></div>
                            <div class="thumb thumb-max"></div>
                        </div>
                    </div>
                </div> --}}

                {{-- Rooms filter frontend start --}}
                <div class="filter-range">
                    <div class="filter-range-label">
                        <label>{{ __('Rooms') }}:</label>
                        <div class="filter-range-value">
                            <span id="roomMinSize">1</span> {{ __('to') }} <span
                                id="roomMaxSize">100</span>
                        </div>
                    </div>
                    <div class="range-wrapper">
                        <!-- Min Range Slider -->
                        <input type="range" class="range-input min-range" id="min-room" min="1" max="100"
                            max="100" step="1" value="1" data-target="#roomMinSize" />
                        <!-- Max Range Slider -->
                        <input type="range" class="range-input max-range" id="max-room" min="1"
                            max="100" step="1" value="100" data-target="#roomMaxSize" />

                        <div class="range-slider">
                            <div class="range-bg"></div>
                            <div class="range-active"></div>
                            <div class="thumb thumb-min"></div>
                            <div class="thumb thumb-max"></div>
                        </div>
                    </div>
                </div>
                {{-- Rooms filter frontend start --}}

                {{-- Amenities filter frontend start --}}
                <div class="filter-selects">
                    <div class="filter-select-label">{{ __('Amenities') }}</div>
                    @foreach ($Amenity as $amenity)
                        <div class="filter-selects-wrapper">
                            <div class="filter-selects">
                                <label class="filter-checkbox checkbox">
                                    <input type="checkbox" class="amenity-checkbox" value="{{ $amenity->id }}" />
                                    <span class="checkbox-mark"></span>
                                    <span>{{ $amenity->name ?? '' }}</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="button button-pri filter-button mt-5" id="findVillasButton">
                        <span>{{ __('Find villas') }}</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 16 16" fill="none">
                            <path d="M9.61935 3.95331L13.666 7.99998L9.61935 12.0466" stroke="white" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M2.33273 8H13.5527" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
                {{-- Amenities filter frontend end --}}
            </div>
            <div class="all-villas" id="shows-villa">
                @foreach ($villas as $villa)
                    <div class="villa-item">
                        <div class="villa-item-top">
                            <div class="tag">{{ __('For Rent') }}</div>

                            @if (Auth::check())
                                <button class="bookmark-btn" type="button"
                                    onclick="toggleBookmark({{ $villa->id }}, this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16"
                                        fill="{{ $villa->favouritedByUsers->contains(auth()->id()) ? '#1E84FE' : 'none' }}"
                                        class="wishlist-icon {{ $villa->favouritedByUsers->contains(auth()->id()) ? 'active' : '' }}">
                                        <path
                                            d="M8.59399 3.91992H3.40731C2.26731 3.91992 1.33398 4.85325 1.33398 5.99325V13.5666C1.33398 14.5333 2.02732 14.9466 2.87398 14.4732L5.49398 13.0132C5.77398 12.8599 6.22732 12.8599 6.50065 13.0132L9.12065 14.4732C9.96731 14.9466 10.6606 14.5333 10.6606 13.5666V5.99325C10.6673 4.85325 9.73399 3.91992 8.59399 3.91992Z"
                                            stroke="#1E84FE" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M10.6673 5.99325V13.5666C10.6673 14.5333 9.97399 14.9399 9.12732 14.4732L6.50732 13.0132C6.22732 12.8599 5.77398 12.8599 5.49398 13.0132L2.87398 14.4732C2.02732 14.9399 1.33398 14.5333 1.33398 13.5666V5.99325C1.33398 4.85325 2.26731 3.91992 3.40731 3.91992H8.59399C9.73399 3.91992 10.6673 4.85325 10.6673 5.99325Z"
                                            stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M14.6673 3.40667V10.98C14.6673 11.9467 13.974 12.3533 13.1273 11.8867L10.6673 10.5133V5.99334C10.6673 4.85334 9.73399 3.92001 8.59399 3.92001H5.33398V3.40667C5.33398 2.26667 6.26731 1.33334 7.40731 1.33334H12.594C13.734 1.33334 14.6673 2.26667 14.6673 3.40667Z"
                                            stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            @else
                                <button class="bookmark-btn" type="button" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none" class="wishlist-icon">
                                        <path
                                            d="M8.59399 3.91992H3.40731C2.26731 3.91992 1.33398 4.85325 1.33398 5.99325V13.5666C1.33398 14.5333 2.02732 14.9466 2.87398 14.4732L5.49398 13.0132C5.77398 12.8599 6.22732 12.8599 6.50065 13.0132L9.12065 14.4732C9.96731 14.9466 10.6606 14.5333 10.6606 13.5666V5.99325C10.6673 4.85325 9.73399 3.91992 8.59399 3.91992Z"
                                            stroke="#1E84FE" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M10.6673 5.99325V13.5666C10.6673 14.5333 9.97399 14.9399 9.12732 14.4732L6.50732 13.0132C6.22732 12.8599 5.77398 12.8599 5.49398 13.0132L2.87398 14.4732C2.02732 14.9399 1.33398 14.5333 1.33398 13.5666V5.99325C1.33398 4.85325 2.26731 3.91992 3.40731 3.91992H8.59399C9.73399 3.91992 10.6673 4.85325 10.6673 5.99325Z"
                                            stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M14.6673 3.40667V10.98C14.6673 11.9467 13.974 12.3533 13.1273 11.8867L10.6673 10.5133V5.99334C10.6673 4.85334 9.73399 3.92001 8.59399 3.92001H5.33398V3.40667C5.33398 2.26667 6.26731 1.33334 7.40731 1.33334H12.594C13.734 1.33334 14.6673 2.26667 14.6673 3.40667Z"
                                            stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            @endif
                            <figure class="villa-item-img">
                                <img src="{{ asset($villa->villa_images->first()->image ?? '') }}"
                                    alt="{{ __($villa->title) ?? '' }}" />
                            </figure>
                        </div>
                        <div class="villa-item-content">
                            <div class="villa-item-header">
                                <div class="tag">{{ __($villa->property_type) ?? '' }}</div>
                                <div class="review">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                        viewBox="0 0 21 21" fill="none">
                                        <path
                                            d="M7.20222 6.61666L1.88556 7.3875L1.79139 7.40666C1.64884 7.44451 1.51889 7.5195 1.4148 7.624C1.31071 7.72849 1.23623 7.85874 1.19894 8.00143C1.16166 8.14413 1.16291 8.29417 1.20258 8.43622C1.24225 8.57828 1.3189 8.70726 1.42472 8.81L5.27639 12.5592L4.36806 17.855L4.35722 17.9467C4.3485 18.0941 4.37911 18.2412 4.44593 18.3729C4.51275 18.5046 4.61338 18.6162 4.7375 18.6963C4.86163 18.7763 5.0048 18.8219 5.15235 18.8284C5.2999 18.8349 5.44653 18.8021 5.57722 18.7333L10.3322 16.2333L15.0764 18.7333L15.1597 18.7717C15.2973 18.8258 15.4468 18.8425 15.5929 18.8198C15.7389 18.7971 15.8764 18.736 15.9911 18.6427C16.1057 18.5494 16.1935 18.4273 16.2454 18.2889C16.2973 18.1504 16.3115 18.0007 16.2864 17.855L15.3772 12.5592L19.2306 8.80916L19.2956 8.73833C19.3884 8.62397 19.4493 8.48704 19.472 8.34149C19.4947 8.19594 19.4784 8.04698 19.4248 7.90977C19.3712 7.77257 19.2822 7.65202 19.1668 7.56042C19.0514 7.46883 18.9138 7.40944 18.7681 7.38833L13.4514 6.61666L11.0747 1.8C11.006 1.66044 10.8995 1.54293 10.7674 1.46075C10.6353 1.37857 10.4828 1.33502 10.3272 1.33502C10.1716 1.33502 10.0192 1.37857 9.88707 1.46075C9.75496 1.54293 9.64849 1.66044 9.57972 1.8L7.20222 6.61666Z"
                                            fill="#FF9D00" />
                                    </svg>
                                    <span>{{ $villa->average_rating }}</span>
                                    <span class="reviews">({{ number_format($villa->reviews->count()) }})</span>
                                </div>
                            </div>


                            <h6 class="villa-item-title">{{ $villa->title ?? '' }}</h6>
                            <div class="villa-item-location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                    viewBox="0 0 20 21" fill="none">
                                    <path
                                        d="M9.96402 19.6811L9.43108 19.2242C8.69638 18.6091 2.28125 13.0687 2.28125 9.01608C2.28125 4.77301 5.72095 1.33331 9.96402 1.33331C14.2071 1.33331 17.6468 4.77301 17.6468 9.01608C17.6468 13.0687 11.2317 18.6091 10.5 19.2273L9.96402 19.6811ZM9.96402 2.99455C6.64 2.99831 3.94629 5.69203 3.94252 9.01605C3.94252 11.562 7.88936 15.6291 9.96402 17.4906C12.0387 15.6284 15.9855 11.5589 15.9855 9.01605C15.9817 5.69203 13.2881 2.99835 9.96402 2.99455Z"
                                        fill="#798090" />
                                    <path
                                        d="M9.96335 12.0615C8.28144 12.0615 6.91797 10.698 6.91797 9.01609C6.91797 7.33417 8.28144 5.9707 9.96335 5.9707C11.6453 5.9707 13.0087 7.33417 13.0087 9.01609C13.0087 10.698 11.6453 12.0615 9.96335 12.0615ZM9.96335 7.49336C9.12239 7.49336 8.44066 8.17509 8.44066 9.01605C8.44066 9.85701 9.12239 10.5387 9.96335 10.5387C10.8043 10.5387 11.486 9.85701 11.486 9.01605C11.486 8.17509 10.8043 7.49336 9.96335 7.49336Z"
                                        fill="#798090" />
                                </svg>
                                <span>{{ $villa->full_address ?? '' }}</span>
                            </div>
                            <div class="villa-item-details">
                                <div class="villa-details-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                        viewBox="0 0 20 21" fill="none">
                                        <path
                                            d="M19.9675 13.4958C19.9983 13.4133 20.0092 13.3225 19.9808 13.2308L18.3333 7.87668V2.93672C18.3333 1.78839 17.3992 0.853394 16.25 0.853394H3.75C2.60082 0.853394 1.66668 1.78839 1.66668 2.93672V7.87671L0.0191797 13.2308C-0.00914067 13.3217 0.00167969 13.4125 0.0325 13.4958C0.0125 13.5842 0 13.675 0 13.77V17.1033V18.77C0 19 0.18668 19.1867 0.41668 19.1867H2.08336C2.31332 19.1867 2.5 19 2.5 18.77V17.52H17.5V18.77C17.5 19 17.6867 19.1867 17.9167 19.1867H19.5833C19.8133 19.1867 20 19 20 18.77V17.1033V13.77C20 13.675 19.9875 13.5842 19.9675 13.4958ZM2.5 2.93672C2.5 2.24754 3.06082 1.68672 3.75 1.68672H16.25C16.9392 1.68672 17.5 2.24754 17.5 2.93672V7.52004H16.3675L15.9792 5.96671C15.8392 5.40921 15.34 5.02004 14.7658 5.02004H12.0833C11.3942 5.02004 10.8333 5.58085 10.8333 6.27004V7.52004H9.16667V6.27085C9.16667 5.58168 8.60583 5.02085 7.91664 5.02085H5.23414C4.65996 5.02085 4.16082 5.41085 4.02082 5.96754L3.6325 7.52004H2.5V2.93672ZM15.5117 8.19335C15.4317 8.29504 15.3117 8.35334 15.1825 8.35334H12.0833C11.8542 8.35334 11.6667 8.16668 11.6667 7.93668V6.27004C11.6667 6.04004 11.8542 5.85335 12.0833 5.85335H14.7667C14.9583 5.85335 15.1242 5.98254 15.1708 6.16835L15.5875 7.83504C15.6192 7.96085 15.5917 8.09085 15.5117 8.19335ZM8.33417 6.27004V7.93254C8.33417 7.93421 8.33333 7.93504 8.33333 7.93671C8.33333 7.93754 8.33333 7.93839 8.33333 7.93839C8.33254 8.16758 8.14586 8.35343 7.91754 8.35343H4.81836C4.68836 8.35343 4.56918 8.29508 4.48918 8.19339C4.40918 8.09089 4.38168 7.96008 4.41336 7.83508L4.83004 6.16839C4.87672 5.98339 5.04254 5.85339 5.23504 5.85339H7.91754C8.14668 5.85335 8.33417 6.04004 8.33417 6.27004ZM2.39082 8.35334H3.645C3.68918 8.47834 3.74668 8.59834 3.83082 8.70668C4.07082 9.01168 4.43 9.18668 4.8175 9.18668H7.91668C8.45917 9.18668 8.9175 8.83668 9.09 8.35334H10.91C11.0825 8.83751 11.5408 9.18668 12.0833 9.18668H15.1825C15.57 9.18668 15.9283 9.01168 16.1683 8.70668C16.2525 8.59918 16.31 8.47834 16.3542 8.35334H17.6092L18.8958 12.535C18.8475 12.5292 18.8 12.52 18.75 12.52H1.25C1.2 12.52 1.1525 12.5292 1.105 12.535L2.39082 8.35334ZM1.66668 18.3533H0.83332V17.52H1.66664L1.66668 18.3533ZM19.1667 18.3533H18.3333V17.52H19.1667V18.3533ZM19.1667 16.6867H0.83332V13.77C0.83332 13.54 1.02082 13.3533 1.25 13.3533H18.75C18.9792 13.3533 19.1667 13.54 19.1667 13.77V16.6867Z"
                                            fill="#1E84FE" />
                                    </svg>
                                    <span>{{ $villa->room ?? '' }} {{ __('Rooms') }}</span>
                                </div>
                                <div class="villa-details-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M18.75 9.16665H18.3333V2.5C18.3333 1.58081 17.5858 0.833313 16.6667 0.833313C15.7474 0.833313 15 1.58077 15 2.49917L14.9992 2.91667C14.9987 3.14699 15.1847 3.33375 15.415 3.33417C15.6453 3.33417 15.8321 3.14824 15.8325 2.91831L15.8333 2.50003C15.8333 2.04065 16.2072 1.66671 16.6667 1.66671C17.126 1.66671 17.5 2.04058 17.5 2.5V9.16665H1.25C0.560703 9.16665 0 9.7274 0 10.4166C0 10.9591 0.349375 11.4173 0.83332 11.5899V12.9166C0.83332 14.8292 1.83231 16.5096 3.33332 17.4737V19.5833C3.33332 19.8136 3.51969 20 3.75 20H4.58332C4.74121 20 4.88523 19.9109 4.95606 19.7696L5.68902 18.3041C5.87352 18.3231 6.06058 18.3333 6.25 18.3333H13.75C13.9394 18.3333 14.1265 18.3231 14.311 18.3041L15.0439 19.7696C15.1147 19.9109 15.2587 20 15.4167 20H16.25C16.4803 20 16.6667 19.8136 16.6667 19.5833V17.4736C18.1677 16.5096 19.1667 14.8291 19.1667 12.9166V11.5899C19.6506 11.4173 20 10.9591 20 10.4166C20 9.7274 19.4393 9.16665 18.75 9.16665ZM5 9.99998H9.16667V14.0914L5 13.3972V9.99998ZM0.83332 10.4166C0.83332 10.1867 1.02012 9.99998 1.25 9.99998H4.16668V10.8333H1.25C1.02012 10.8333 0.83332 10.6466 0.83332 10.4166ZM4.32578 19.1666H4.16668V17.9154C4.38344 18.0061 4.60914 18.0781 4.83903 18.1404L4.32578 19.1666ZM15.8333 19.1666H15.6742L15.161 18.1404C15.3908 18.0782 15.6166 18.0061 15.8333 17.9154V19.1666ZM18.3333 12.9166C18.3333 15.4439 16.2773 17.5 13.75 17.5H6.25C3.72273 17.5 1.66668 15.4439 1.66668 12.9166V11.6666H4.16668V13.75C4.16668 13.9538 4.31398 14.1276 4.515 14.161L9.515 14.9943C9.53775 14.998 9.56058 15 9.58333 15C9.68142 15 9.777 14.9654 9.85275 14.9011C9.94633 14.8221 10 14.7058 10 14.5833V11.6666H18.3333V12.9166ZM18.75 10.8333H10V9.99998H18.75C18.9799 9.99998 19.1667 10.1867 19.1667 10.4166C19.1667 10.6466 18.9799 10.8333 18.75 10.8333Z"
                                            fill="#1E84FE" />
                                    </svg>
                                    <span>{{ $villa->bathroom ?? '' }} {{ __('Baths') }}</span>
                                </div>
                                <div class="villa-details-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                        viewBox="0 0 20 21" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.25 4.77502V1.27502H4.75V4.77502H1.25ZM0 0.858358C0 0.39812 0.373096 0.0250244 0.833333 0.0250244H5.16667C5.6269 0.0250244 6 0.39812 6 0.858358V5.19169C6 5.65192 5.6269 6.02502 5.16667 6.02502H3.625V14.025H5.16667C5.6269 14.025 6 14.3981 6 14.8584V19.1917C6 19.6519 5.6269 20.025 5.16667 20.025H0.833333C0.373096 20.025 0 19.6519 0 19.1917V14.8584C0 14.3981 0.373096 14.025 0.833333 14.025H2.375V6.02502H0.833333C0.373096 6.02502 0 5.65192 0 5.19169V0.858358ZM15.25 1.27502H18.75V4.77502H15.25V1.27502ZM14 0.858358C14 0.39812 14.3731 0.0250244 14.8333 0.0250244H19.1667C19.6269 0.0250244 20 0.39812 20 0.858358V5.19169C20 5.65192 19.6269 6.02502 19.1667 6.02502H17.625V14.025H19.1667C19.6269 14.025 20 14.3981 20 14.8584V19.1917C20 19.6519 19.6269 20.025 19.1667 20.025H14.8333C14.3731 20.025 14 19.6519 14 19.1917V17.65H6V16.4H14V14.8584C14 14.3981 14.3731 14.025 14.8333 14.025H16.375V6.02502H14.8333C14.3731 6.02502 14 5.65192 14 5.19169V3.65002H6V2.40002H14V0.858358ZM18.75 15.275H15.25V18.775H18.75V15.275ZM1.25 18.775V15.275H4.75V18.775H1.25Z"
                                            fill="#1E84FE" />
                                    </svg>
                                    <span>{{ $villa->pool ?? '' }} {{ __('sq Pool') }}</span>
                                </div>
                            </div>
                            <div class="villa-item-bottom">
                                <div class="price">
                                    <span>₪{{ $villa->price ?? '' }}</span>
                                </div>
                                <a class="button button-pri button-sm"
                                    href="{{ route('villas.details', ['slug' => $villa->slug]) }}"><span>{{ __('View Details') }}</span>
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path d="M9.61935 3.95331L13.666 7.99998L9.61935 12.0466" stroke="white"
                                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M2.33273 8H13.5527" stroke="white" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- pagination start --}}
            @if ($villas->count() > 0)
                <div class="pagination-wrapper mt-4 mt-lg-5">
                    <!-- Previous Button -->
                    @if ($villas->onFirstPage())
                        <span class="pagination-item pagination-item-prev disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $villas->previousPageUrl() }}" class="pagination-item pagination-item-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </a>
                    @endif

                    <!-- Pagination Numbers -->
                    @php
                        $currentPage = $villas->currentPage();
                        $lastPage = $villas->lastPage();
                        $start = max(1, $currentPage - 2);
                        $end = min($lastPage, $currentPage + 2);
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $villas->url(1) }}" class="pagination-item">1</a>
                        @if ($start > 2)
                            <span class="pagination-item pagination-more">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $currentPage)
                            <span class="pagination-item active">{{ $i }}</span>
                        @else
                            <a href="{{ $villas->url($i) }}" class="pagination-item">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($end < $lastPage)
                        @if ($end < $lastPage - 1)
                            <span class="pagination-item pagination-more">...</span>
                        @endif
                        <a href="{{ $villas->url($lastPage) }}" class="pagination-item">{{ $lastPage }}</a>
                    @endif

                    <!-- Next Button -->
                    @if ($villas->hasMorePages())
                        <a href="{{ $villas->nextPageUrl() }}" class="pagination-item pagination-item-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </a>
                    @else
                        <span class="pagination-item pagination-item-next disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </span>
                    @endif
                </div>
            @else
            @endif
            {{-- pagination end --}}
        </section>
        <!-- all villas section end -->

        <!-- cta section start -->
        <section class="section container">
            <div class="cta-section">
                <img class="cta-img" src="{{ asset($page_image ?? '/frontend/assets/images/home-banner-bg.png') }}"
                    alt="background image" />
                <div class="overlay"></div>
                <div class="content">
                    <h3 class="cta-title">
                        @if ($page_title)
                            {{ $page_title }}
                        @else
                            {{ __("Don't miss your chance") }} <br />
                            {{ __('for a luxury vacation') }}
                        @endif

                    </h3>
                    @if($button_url)
                        <a href="{{ $button_url }}" class="button button-pri">
                            @else
                                <a href="{{ route('villas') }}" class="button button-pri">
                                    @endif
                                    <span>
                            @if($button_title)
                                            {{ $button_title }}
                                        @else
                                            {{ __('Explore now') }}
                                        @endif
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M14.43 5.92969L20.5 11.9997L14.43 18.0697" stroke="white" stroke-width="1.8"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.50008 12H20.3301" stroke="white" stroke-width="1.8" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <!-- cta section end -->

        <!-- travelers section start -->
        @include('frontend.partials.popular-villa-info')
        <!-- travelers section End -->

    </main>
    <!-- main section end -->

@endsection

@push('scripts')
    <script>
        function toggleBookmark(id, button) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/villa/bookmark/' + id,
                type: 'POST',
                data: {
                    _token: csrfToken,
                },
                success: function(response) {
                    if (response.success) {
                        var svg = $(button).find('.wishlist-icon');
                        if (response.is_bookmarked) {
                            svg.attr('fill', '#1E84FE'); // Change fill color
                            svg.addClass('active'); // Add active class
                        } else {
                            svg.attr('fill', 'none'); // Change fill to none
                            svg.removeClass('active'); // Remove active class
                        }

                        showSuccessToast(response.message);
                    } else {
                        showErrorToast('Unexpected error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showErrorToast('An error occurred while processing your request.');
                }
            });
        }
    </script>




    {{-- villa page all type of filters start --}}
    <script>
        $(document).ready(function() {

            /* amenity wise filter start */
            $('#findVillasButton').on('click', function() {
                // Get the selected amenities
                let selectedAmenities = [];
                $(".amenity-checkbox:checked").each(function() {
                    selectedAmenities.push($(this).val());
                });

                // Check if at least one amenity is selected
                if (selectedAmenities.length === 0) {
                    showErrorToast("{{ __('Please select at least one amenity.') }}");
                    return;
                }

                // Make the AJAX request with the selected amenities
                $.ajax({
                    url: "{{ route('amenity.search.villa') }}",
                    type: "GET",
                    data: {
                        amenities: selectedAmenities,
                    },
                    success: function(data) {
                        let villasList = $("#shows-villa");
                        villasList.empty(); // Clear existing villas before appending new ones

                        if (data.success === false || data.villas.length === 0) {
                            villasList.append(
                                '<p>{{ __('No villas found with the selected amenities.') }}</p>'
                                );
                            return;
                        }

                        // Loop through the villas and display them dynamically
                        data.villas.forEach(function(villa) {
                            let villaHTML = getVillaHTML(villa); // Generate villa HTML
                            villasList.append(villaHTML);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: ", xhr.responseText); // Log detailed error
                        showErrorToast("{{ __('Something went wrong. Please try again later.') }}");
                    }
                });
            });
            /* amenity wise filter end  */


            /* price wise filter start */
            $(".range-input").on("input", function() {
                const target = $(this).data("target");
                const value = $(this).val();
                $(target).text(value);

                // Ensure min price is always less than max price
                const minPrice = parseInt($(".min-range").val());
                const maxPrice = parseInt($(".max-range").val());

                if (minPrice > maxPrice) {
                    $(".min-range").val(maxPrice);
                    $(".max-range").val(minPrice);
                }
            });
            // Trigger Ajax search on price range change
            $(".range-input").on("change", function() {
                const minPrice = $(".min-range").val();
                const maxPrice = $(".max-range").val();

                $.ajax({
                    url: "{{ route('price.search.villa') }}",
                    method: "GET",
                    data: {
                        minPrice: minPrice,
                        maxPrice: maxPrice
                    },
                    success: function(data) {
                        let villasList = $("#shows-villa");
                        villasList.empty(); // Clear existing villas before appending new ones

                        if (data.villas.length === 0) {
                            villasList.append(
                                '<p>{{ __('No villas found with the selected Price Range.') }}</p>'
                            );
                            return;
                        }

                        // Loop through the villas and display them dynamically
                        data.villas.forEach(function(villa) {
                            let villaDetailsPage =
                                "{{ route('villas.details', ['slug' => '__slug__']) }}";
                            villaDetailsPage = villaDetailsPage.replace('__slug__',
                                villa.slug);

                            let villaHTML = getVillaHTML(villa);
                            villasList.append(villaHTML);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + ": " + error);
                        showErrorToast("{{ __('Something went wrong. Please try again later.') }}");
                    }
                });
            });
            /* price wise filter end */


            /*   Room wise filter start */
            $("#min-room, #max-room").on("input", function() {
                const target = $(this).data("target");
                const value = $(this).val();
                $(target).text(value);

                // Ensure min is always less than or equal to max
                const minRoom = parseInt($("#min-room").val());
                const maxRoom = parseInt($("#max-room").val());

                if (minRoom > maxRoom) {
                    $("#min-room").val(maxRoom);
                    $("#max-room").val(minRoom);
                }
            });

            // Trigger AJAX search on room range change
            $("#min-room, #max-room").on("change", function() {
                const minRoom = $("#min-room").val();
                const maxRoom = $("#max-room").val();

                $.ajax({
                    url: "{{ route('rooms.search.villa') }}", // Room search route
                    method: "GET",
                    data: {
                        minRooms: minRoom,
                        maxRooms: maxRoom,
                    },
                    success: function(data) {
                        let villasList = $("#shows-villa");
                        villasList.empty(); // Clear previous villas

                        if (data.villas.length === 0) {
                            villasList.append(
                                '<p class="text-center">{{ __('No villas found with the selected Rooms Range.') }}</p>'
                            );
                            return;
                        }

                        // Loop through the villas and display them dynamically
                        data.villas.forEach(function(villa) {
                            let villaDetailsPage =
                                "{{ route('villas.details', ['slug' => '__slug__']) }}";
                            villaDetailsPage = villaDetailsPage.replace('__slug__',
                                villa.slug);

                            let villaHTML = getVillaHTML(villa);
                            villasList.append(villaHTML);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + ": " + error);
                        showErrorToast("{{ __('Something went wrong. Please try again later.') }}");
                    }
                });
            });
            /*   Room wise filter end */

            /* property_type wise filter start */
            $(".property-type-select").on("change", function() {
                const propertyType = $(this).val();

                $.ajax({
                    url: "{{ route('rooms.search.type') }}", // Use the correct route
                    method: "GET",
                    data: {
                        propertyType: propertyType, // Pass the selected property type
                    },
                    success: function(data) {
                        let villasList = $("#shows-villa");
                        villasList.empty(); // Clear previous results

                        if (data.villas.length === 0) {
                            villasList.append(
                                '<p>{{ __('No villas found for the selected property type.') }}</p>'
                            );
                            return;
                        }
                        // Loop through the villas and display them dynamically
                        data.villas.forEach(function(villa) {
                            let villaDetailsPage =
                                "{{ route('villas.details', ['slug' => '__slug__']) }}";
                            villaDetailsPage = villaDetailsPage.replace('__slug__',
                                villa.slug);

                            let villaHTML = getVillaHTML(villa);
                            villasList.append(villaHTML);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + ": " + error);
                        showErrorToast("{{ __('Something went wrong. Please try again later.') }}");
                    }
                });
            });
            /* property_type wise filter end */

            /* map location wise filter start */
            $(".location-search-input").on("input", function() {
                const mapLocation = $(this).val();

                // Trigger the AJAX request
                $.ajax({
                    url: "{{ route('rooms.search.location') }}", // Use the correct route
                    method: "GET",
                    data: {
                        mapLocation: mapLocation, // Send the input value
                    },
                    success: function(data) {
                        let villasList = $("#shows-villa");
                        villasList.empty(); // Clear previous results

                        if (data.villas.length === 0) {
                            villasList.append(
                                '<p>{{ __('No villas found for the entered location.') }}</p>'
                            );
                            return;
                        }
                        // Loop through the villas and display them dynamically
                        data.villas.forEach(function(villa) {
                            let villaDetailsPage =
                                "{{ route('villas.details', ['slug' => '__slug__']) }}";
                            villaDetailsPage = villaDetailsPage.replace('__slug__',
                                villa.slug);

                            let villaHTML = getVillaHTML(villa);
                            villasList.append(villaHTML);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + ": " + error);
                        showErrorToast("{{ __('Something went wrong. Please try again later.') }}");
                    }
                });
            });
            /* map location wise filter end */

            /* title and best keyword wise filter start */
            $(".search-keyword-input").on("input", function() {
                const searchKeyword = $(this).val();

                // Trigger AJAX request
                $.ajax({
                    url: "{{ route('rooms.search.title') }}",
                    method: "GET",
                    data: {
                        search: searchKeyword, // Send the search keyword to the backend
                    },
                    success: function(data) {
                        let villasList = $("#shows-villa");
                        villasList.empty(); // Clear previous results

                        if (data.villas.length === 0) {
                            villasList.append(
                                '<p>{{ __('No villas found for the entered keyword.') }}</p>'
                            );
                            return;
                        }
                        // Loop through the villas and display them dynamically
                        data.villas.forEach(function(villa) {
                            let villaDetailsPage =
                                "{{ route('villas.details', ['slug' => '__slug__']) }}";
                            villaDetailsPage = villaDetailsPage.replace('__slug__',
                                villa.slug);

                            let villaHTML = getVillaHTML(villa);
                            villasList.append(villaHTML);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + ": " + error);
                        showErrorToast("{{ __('Something went wrong. Please try again later.') }}");
                    }
                });
            });

            /* title and best keyword wise filter end */

            /* popularity type wise filter start */
            $(".villa-sort-option").on("change", function() {
                const sortOption = $(this).val();

                $.ajax({
                    url: "{{ route('rooms.search.popularity') }}",
                    method: "GET",
                    data: {
                        sort: sortOption
                    },
                    success: function(data) {
                        let villasList = $("#shows-villa");
                        villasList.empty(); // Clear previous results

                        if (data.villas.length === 0) {
                            villasList.append(
                                '<p>{{ __('No villas found for the selected option.') }}.</p>'
                            );
                            return;
                        }
                        // Loop through the villas and display them dynamically
                        data.villas.forEach(function(villa) {
                            let villaDetailsPage =
                                "{{ route('villas.details', ['slug' => '__slug__']) }}";
                            villaDetailsPage = villaDetailsPage.replace('__slug__',
                                villa.slug);

                            let villaHTML = getVillaHTML(villa);
                            villasList.append(villaHTML);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + ": " + error);
                        showErrorToast("{{ __('Something went wrong. Please try again later.') }}");
                    }
                });
            });
            /* popularity type wise filter end */



            // Function to generate the villa HTML (common function for all filters)
            function getVillaHTML(villa) {

                let villaDetailsPage = "{{ route('villas.details', ['slug' => '__slug__']) }}";
                villaDetailsPage = villaDetailsPage.replace('__slug__', villa.slug);

                // Assuming `villa.isBookmarked` indicates if the villa is bookmarked by the current user.
                const isBookmarked = villa.isBookmarked ? 'active' : '';
                const bookmarkFill = villa.isBookmarked ? '#1E84FE' : 'none';

                return `
                <div class="villa-item">
                    <div class="villa-item-top">
                        <div class="tag">{{ __('For Rent') }}</div>
                        @if (Auth::check())
                            <button class="bookmark-btn" type="button"
                                onclick="toggleBookmark(${villa.id}, this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16"
                                    fill="${bookmarkFill}"
                                    class="wishlist-icon ${isBookmarked}">
                                    <path
                                        d="M8.59399 3.91992H3.40731C2.26731 3.91992 1.33398 4.85325 1.33398 5.99325V13.5666C1.33398 14.5333 2.02732 14.9466 2.87398 14.4732L5.49398 13.0132C5.77398 12.8599 6.22732 12.8599 6.50065 13.0132L9.12065 14.4732C9.96731 14.9466 10.6606 14.5333 10.6606 13.5666V5.99325C10.6673 4.85325 9.73399 3.91992 8.59399 3.91992Z"
                                        stroke="#1E84FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10.6673 5.99325V13.5666C10.6673 14.5333 9.97399 14.9399 9.12732 14.4732L6.50732 13.0132C6.22732 12.8599 5.77398 12.8599 5.49398 13.0132L2.87398 14.4732C2.02732 14.9399 1.33398 14.5333 1.33398 13.5666V5.99325C1.33398 4.85325 2.26731 3.91992 3.40731 3.91992H8.59399C9.73399 3.91992 10.6673 4.85325 10.6673 5.99325Z"
                                        stroke="#1E84FE" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M14.6673 3.40667V10.98C14.6673 11.9467 13.974 12.3533 13.1273 11.8867L10.6673 10.5133V5.99334C10.6673 4.85334 9.73399 3.92001 8.59399 3.92001H5.33398V3.40667C5.33398 2.26667 6.26731 1.33334 7.40731 1.33334H12.594C13.734 1.33334 14.6673 2.26667 14.6673 3.40667Z"
                                        stroke="#1E84FE" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        @else
                            <button class="bookmark-btn" type="button" data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none" class="wishlist-icon">
                                    <path
                                        d="M8.59399 3.91992H3.40731C2.26731 3.91992 1.33398 4.85325 1.33398 5.99325V13.5666C1.33398 14.5333 2.02732 14.9466 2.87398 14.4732L5.49398 13.0132C5.77398 12.8599 6.22732 12.8599 6.50065 13.0132L9.12065 14.4732C9.96731 14.9466 10.6606 14.5333 10.6606 13.5666V5.99325C10.6673 4.85325 9.73399 3.91992 8.59399 3.91992Z"
                                        stroke="#1E84FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10.6673 5.99325V13.5666C10.6673 14.5333 9.97399 14.9399 9.12732 14.4732L6.50732 13.0132C6.22732 12.8599 5.77398 12.8599 5.49398 13.0132L2.87398 14.4732C2.02732 14.9399 1.33398 14.5333 1.33398 13.5666V5.99325C1.33398 4.85325 2.26731 3.91992 3.40731 3.91992H8.59399C9.73399 3.91992 10.6673 4.85325 10.6673 5.99325Z"
                                        stroke="#1E84FE" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M14.6673 3.40667V10.98C14.6673 11.9467 13.974 12.3533 13.1273 11.8867L10.6673 10.5133V5.99334C10.6673 4.85334 9.73399 3.92001 8.59399 3.92001H5.33398V3.40667C5.33398 2.26667 6.26731 1.33334 7.40731 1.33334H12.594C13.734 1.33334 14.6673 2.26667 14.6673 3.40667Z"
                                        stroke="#1E84FE" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        @endif
                        <figure class="villa-item-img">
                            <img src="${villa.image_url}" alt="${villa.title.{{ app()->getLocale() }} }" />
                        </figure>
                    </div>
                    <div class="villa-item-content">
                        <div class="villa-item-header">
                            <div class="tag">${villa.property_type}</div>
                            <div class="review">
                                <img src="{{ asset('/frontend/assets/images/icons/mid-star.svg') }}" alt="star">
                                <span>${villa.average_rating}</span>
                                <span class="reviews">(${villa.reviews_count})</span>
                            </div>
                        </div>
                        <h6 class="villa-item-title">${villa.title.{{ app()->getLocale() }} }</h6>
                        <div class="villa-item-location">
                            <img src="{{ asset('/frontend/assets/images/icons/map.svg') }}" alt="location">
                            <span>${villa.full_address.{{ app()->getLocale() }}}</span>
                        </div>
                        <div class="villa-item-details">
                            <div class="villa-details-item">
                               <img src="{{ asset('/frontend/assets/images/icons/bed.svg') }}" alt="bed icon" />
                                <span>${villa.room} {{ __('Rooms') }}</span>
                            </div>
                            <div class="villa-details-item">
                                <img src="{{ asset('/frontend/assets/images/icons/bathroom.svg') }}" alt="bathtub icon" />
                                <span>${villa.bathroom} {{ __('Baths') }}</span>
                            </div>
                            <div class="villa-details-item">
                                <img src="{{ asset('/frontend/assets/images/icons/pool.svg') }}" alt="pool icon" />
                                <span>${villa.pool} {{ __('sq Pool') }}</span>
                            </div>
                        </div>
                        <div class="villa-item-bottom">
                            <div class="price">
                                <span>$${villa.price}</span>
                            </div>
                            <a class="button button-pri button-sm" href="${villaDetailsPage}"><span>{{ __('View Details') }}</span></a>
                        </div>
                    </div>
                </div>
            `;
            }

        });
    </script>
    {{-- villa page all type of filters end --}}
@endpush
