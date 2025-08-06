@extends('frontend.app')

@section('title', 'Home Page')

@push('styles')
    <style>
        .testimonial-item {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: stretch;
            min-height: 200px;
            max-height: 200px;
            overflow-y: auto;
        }

        .testimonial-details {
            flex-grow: 1;
        }

        ::-webkit-scrollbar {
            width: 0;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /*.hero{*/
        /*    position: relative;*/
        /*}*/

        /*.banner-bgImg{*/
        /*    position: absolute;*/
        /*    top: 0;*/
        /*    left: 0;*/
        /*    height: 100%;*/
        /*    width: 100%;*/
        /*    z-index: -1;*/
        /*}*/
        /*.banner-bgImg img{*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    object-fit: cover;*/
        /*    object-position: center;*/
        /*}*/



    </style>
@endpush

@section('content')

    @php
        // Filter the collection to get the CMS entry with id = 1
        $cmsNew = $cms->where('id', 1)->first(); // Use first() instead of get()
        $banner_image = $cmsNew ? $cmsNew->banner_image : null; // Ensure cmsHeroBanner is not null
        $banner_image_mobile = $cmsNew ? $cmsNew->banner_image_mobile : null; // Ensure cmsHeroBanner is not null
        $banner_title = $cmsNew ? $cmsNew->banner_title : null; // Ensure cmsHeroBanner is not null
        $sub_title = $cmsNew ? $cmsNew->sub_title : null; // Ensure cmsHeroBanner is not null
        $bottom_image = $cmsNew ? $cmsNew->page_image : null; // Ensure cmsHeroBanner is not null
        $bottom_title = $cmsNew ? $cmsNew->page_title : null; // Ensure cmsHeroBanner is not null
        $button_title = $cmsNew ? $cmsNew->button_title : null; // Ensure cmsHeroBanner is not null
        $button_url = $cmsNew ? $cmsNew->button_url : null; // Ensure cmsHeroBanner is not null
    @endphp

    <!-- Hero start -->
    <section class="hero" id="bigDevice-hero"
        style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/home-banner-bg.png') }}')"
    >
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title-pri">
                    @if ($banner_title)
                        {{ $banner_title }}
                    @else
                        {{ __('Experience luxury and comfort tailored to you') }}
                    @endif
                </h1>
                {{-- search start --}}
                <form class="booking-form" action="{{ route('villa.search') }}" method="GET">
                    @csrf
                    <!-- Check-in Location Field -->
                    <div class="form-element search-element">
                        <label for="location" class="where-label">{{ __('Where') }}</label>
                        <input type="text" id="location" name="location" placeholder="{{ __('Search destinations') }}"
                            class="search-inputt" />
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="31"
                            viewBox="0 0 20 21" fill="none">
                            <path
                                d="M17.5 18L12.5 13M2.5 8.83333C2.5 9.59938 2.65088 10.3579 2.94404 11.0657C3.23719 11.7734 3.66687 12.4164 4.20854 12.9581C4.75022 13.4998 5.39328 13.9295 6.10101 14.2226C6.80875 14.5158 7.56729 14.6667 8.33333 14.6667C9.09938 14.6667 9.85792 14.5158 10.5657 14.2226C11.2734 13.9295 11.9164 13.4998 12.4581 12.9581C12.9998 12.4164 13.4295 11.7734 13.7226 11.0657C14.0158 10.3579 14.1667 9.59938 14.1667 8.83333C14.1667 8.06729 14.0158 7.30875 13.7226 6.60101C13.4295 5.89328 12.9998 5.25022 12.4581 4.70854C11.9164 4.16687 11.2734 3.73719 10.5657 3.44404C9.85792 3.15088 9.09938 3 8.33333 3C7.56729 3 6.80875 3.15088 6.10101 3.44404C5.39328 3.73719 4.75022 4.16687 4.20854 4.70854C3.66687 5.25022 3.23719 5.89328 2.94404 6.60101C2.65088 7.30875 2.5 8.06729 2.5 8.83333Z"
                                stroke="#1D2635" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <button type="button" class="filter-icon">
                            <img src="{{ asset('/frontend/assets/images/Filters-icon.png') }}" alt="filter-icon" width="30" height="30" />
                        </button>
                    </div>

                    <div class="separator"></div>

                    <!-- Check-in Date Field -->
                    <div class="form-element showAble">
                        <label for="checkIn">  {{ __('Check-in') }}</label>
                        <input type="text" id="checkIn" name="checkIn" placeholder="{{ __('Add dates') }}" />
                    </div>

                    <div class="separator"></div>

                    <!-- Check-out Date Field -->
                    <div class="form-element showAble">
                        <label for="checkOut">{{ __('Check-out') }}</label>
                        <input type="text" id="checkOut" name="checkOut" placeholder="{{ __('Add dates') }}" />
                    </div>

                    <div class="separator"></div>

                    <!-- Number of People Field -->
                    <div class="form-element people-form-element showAble">
                        <label for="people">{{ __('Who') }}</label>
                        <input type="text" id="people" class="people-input" name="people" placeholder="{{ __('Add guests') }}" />
                        <div class="people-dropdown">
                            <div class="people-dropdown-content">
                                <div class="people-dropdown-item adults-item" data-item-name="adults">
                                    <div>
                                        <div class="item-title">{{ __('Adults') }}</div>
                                        <div class="item-tagline">{{ __('Ages 13 or above') }}</div>
                                    </div>
                                    <div class="item-counters">
                                        <button type="button" class="item-counter decrement-count" data-limit="0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="2"
                                                viewBox="0 0 10 2" fill="none">
                                                <path d="M1 1H9" stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <div class="item-count">0</div>
                                        <button type="button" class="item-counter increment-count" data-limit="16">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none">
                                                <path d="M1 5H9M5 1V9" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="people-dropdown-item children-item" data-item-name="children">
                                    <div>
                                        <div class="item-title">{{ __('Children') }}</div>
                                        <div class="item-tagline">{{ __('Ages 2 – 12') }}</div>
                                    </div>
                                    <div class="item-counters">
                                        <button type="button" class="item-counter decrement-count" data-limit="0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="2"
                                                viewBox="0 0 10 2" fill="none">
                                                <path d="M1 1H9" stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <div class="item-count">0</div>
                                        <button type="button" class="item-counter increment-count" data-limit="15">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none">
                                                <path d="M1 5H9M5 1V9" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button class="button button-pri" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32"
                            fill="none">
                            <path
                                d="M28.5 28L20.5 20M4.5 13.3333C4.5 14.559 4.74141 15.7727 5.21046 16.905C5.6795 18.0374 6.36699 19.0663 7.23367 19.933C8.10035 20.7997 9.12925 21.4872 10.2616 21.9562C11.394 22.4253 12.6077 22.6667 13.8333 22.6667C15.059 22.6667 16.2727 22.4253 17.405 21.9562C18.5374 21.4872 19.5663 20.7997 20.433 19.933C21.2997 19.0663 21.9872 18.0374 22.4562 16.905C22.9253 15.7727 23.1667 14.559 23.1667 13.3333C23.1667 12.1077 22.9253 10.894 22.4562 9.76162C21.9872 8.62925 21.2997 7.60035 20.433 6.73367C19.5663 5.86699 18.5374 5.1795 17.405 4.71046C16.2727 4.24141 15.059 4 13.8333 4C12.6077 4 11.394 4.24141 10.2616 4.71046C9.12925 5.1795 8.10035 5.86699 7.23367 6.73367C6.36699 7.60035 5.6795 8.62925 5.21046 9.76162C4.74141 10.894 4.5 12.1077 4.5 13.3333Z"
                                stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{ __('Search') }}
                    </button>
                </form>
                {{-- search end --}}
            </div>
        </div>

    </section>

    <!-- Hero start -->
    <section class="hero" id="mobile-hero"
        style="background-image: url('{{ asset($banner_image_mobile ?? '/frontend/assets/images/home-banner-bg.png') }}')"
    >
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title-pri">
                    @if ($banner_title)
                        {{ $banner_title }}
                    @else
                        {{ __('Experience luxury and comfort tailored to you') }}
                    @endif
                </h1>
                {{-- search start --}}
                <form class="booking-form" action="{{ route('villa.search') }}" method="GET">
                    @csrf
                    <!-- Check-in Location Field -->
                    <div class="form-element search-element">
                        <label for="location" class="where-label">{{ __('Where') }}</label>
                        <input type="text" id="location" name="location" placeholder="{{ __('Search destinations') }}"
                            class="search-inputt" />
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="31"
                            viewBox="0 0 20 21" fill="none">
                            <path
                                d="M17.5 18L12.5 13M2.5 8.83333C2.5 9.59938 2.65088 10.3579 2.94404 11.0657C3.23719 11.7734 3.66687 12.4164 4.20854 12.9581C4.75022 13.4998 5.39328 13.9295 6.10101 14.2226C6.80875 14.5158 7.56729 14.6667 8.33333 14.6667C9.09938 14.6667 9.85792 14.5158 10.5657 14.2226C11.2734 13.9295 11.9164 13.4998 12.4581 12.9581C12.9998 12.4164 13.4295 11.7734 13.7226 11.0657C14.0158 10.3579 14.1667 9.59938 14.1667 8.83333C14.1667 8.06729 14.0158 7.30875 13.7226 6.60101C13.4295 5.89328 12.9998 5.25022 12.4581 4.70854C11.9164 4.16687 11.2734 3.73719 10.5657 3.44404C9.85792 3.15088 9.09938 3 8.33333 3C7.56729 3 6.80875 3.15088 6.10101 3.44404C5.39328 3.73719 4.75022 4.16687 4.20854 4.70854C3.66687 5.25022 3.23719 5.89328 2.94404 6.60101C2.65088 7.30875 2.5 8.06729 2.5 8.83333Z"
                                stroke="#1D2635" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <button type="button" class="filter-icon">
                            <img src="{{ asset('/frontend/assets/images/Filters-icon.png') }}" alt="filter-icon" width="30" height="30" />
                        </button>
                    </div>

                    <div class="separator"></div>

                    <!-- Check-in Date Field -->
                    <div class="form-element showAble">
                        <label for="checkIn">  {{ __('Check-in') }}</label>
                        <input type="text" id="checkIn" name="checkIn" placeholder="{{ __('Add dates') }}" />
                    </div>

                    <div class="separator"></div>

                    <!-- Check-out Date Field -->
                    <div class="form-element showAble">
                        <label for="checkOut">{{ __('Check-out') }}</label>
                        <input type="text" id="checkOut" name="checkOut" placeholder="{{ __('Add dates') }}" />
                    </div>

                    <div class="separator"></div>

                    <!-- Number of People Field -->
                    <div class="form-element people-form-element showAble">
                        <label for="people">{{ __('Who') }}</label>
                        <input type="text" id="people" class="people-input" name="people" placeholder="{{ __('Add guests') }}" />
                        <div class="people-dropdown">
                            <div class="people-dropdown-content">
                                <div class="people-dropdown-item adults-item" data-item-name="adults">
                                    <div>
                                        <div class="item-title">{{ __('Adults') }}</div>
                                        <div class="item-tagline">{{ __('Ages 13 or above') }}</div>
                                    </div>
                                    <div class="item-counters">
                                        <button type="button" class="item-counter decrement-count" data-limit="0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="2"
                                                viewBox="0 0 10 2" fill="none">
                                                <path d="M1 1H9" stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <div class="item-count">0</div>
                                        <button type="button" class="item-counter increment-count" data-limit="16">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none">
                                                <path d="M1 5H9M5 1V9" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="people-dropdown-item children-item" data-item-name="children">
                                    <div>
                                        <div class="item-title">{{ __('Children') }}</div>
                                        <div class="item-tagline">{{ __('Ages 2 – 12') }}</div>
                                    </div>
                                    <div class="item-counters">
                                        <button type="button" class="item-counter decrement-count" data-limit="0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="2"
                                                viewBox="0 0 10 2" fill="none">
                                                <path d="M1 1H9" stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <div class="item-count">0</div>
                                        <button type="button" class="item-counter increment-count" data-limit="15">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none">
                                                <path d="M1 5H9M5 1V9" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button class="button button-pri" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32"
                            fill="none">
                            <path
                                d="M28.5 28L20.5 20M4.5 13.3333C4.5 14.559 4.74141 15.7727 5.21046 16.905C5.6795 18.0374 6.36699 19.0663 7.23367 19.933C8.10035 20.7997 9.12925 21.4872 10.2616 21.9562C11.394 22.4253 12.6077 22.6667 13.8333 22.6667C15.059 22.6667 16.2727 22.4253 17.405 21.9562C18.5374 21.4872 19.5663 20.7997 20.433 19.933C21.2997 19.0663 21.9872 18.0374 22.4562 16.905C22.9253 15.7727 23.1667 14.559 23.1667 13.3333C23.1667 12.1077 22.9253 10.894 22.4562 9.76162C21.9872 8.62925 21.2997 7.60035 20.433 6.73367C19.5663 5.86699 18.5374 5.1795 17.405 4.71046C16.2727 4.24141 15.059 4 13.8333 4C12.6077 4 11.394 4.24141 10.2616 4.71046C9.12925 5.1795 8.10035 5.86699 7.23367 6.73367C6.36699 7.60035 5.6795 8.62925 5.21046 9.76162C4.74141 10.894 4.5 12.1077 4.5 13.3333Z"
                                stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{ __('Search') }}
                    </button>
                </form>
                {{-- search end --}}
            </div>
        </div>

    </section>
    <!-- Hero end -->

    <!-- main Section Start -->
    <main class="home-main-container">


        @if ($villas->count() > 0)
            <!-- explore section start -->
            <section class="section container">
                <div class="section-box">
                    <h2 class="section-title">{{ __('Explore our all villas') }}</h2>
                    <a class="link section-link" href="{{ route('all.villas') }}">{{ __('View all') }}</a>
                </div>
                <div class="exp-items">
                    @foreach ($villas->take(3) as $villa)
                        <div class="villa-item">
                            <div class="villa-item-top">
                                <div class="tag">{{ __('For Rent') }}</div>
                                @if(Auth::check())
                                    <button class="bookmark-btn" type="button"
                                            onclick="toggleBookmark({{ $villa->id }}, this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="{{ $villa->favouritedByUsers->contains(auth()->id()) ? '#1E84FE' : 'none' }}"
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
                                    <button class="bookmark-btn" type="button" data-bs-toggle="modal" data-bs-target="#loginModal" >
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
                                    <img src="{{ asset($villa->villa_images->first()->image ?? '') }}" alt="Item image" />
                                </figure>
                            </div>
                            <div class="villa-item-content">
                                <div class="villa-item-header">
                                    <div class="tag">{{ __($villa->property_type) ?? '' }}</div>
                                    <div class="review">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                                                 fill="none">
                                                <path
                                                    d="M6.86922 6.61666L1.55255 7.3875L1.45838 7.40666C1.31583 7.44451 1.18588 7.5195 1.08179 7.624C0.977707 7.72849 0.903219 7.85874 0.865934 8.00143C0.82865 8.14413 0.829905 8.29417 0.869572 8.43622C0.909239 8.57828 0.985896 8.70726 1.09172 8.81L4.94338 12.5592L4.03505 17.855L4.02422 17.9467C4.01549 18.0941 4.0461 18.2412 4.11292 18.3729C4.17974 18.5046 4.28037 18.6162 4.4045 18.6963C4.52862 18.7763 4.67179 18.8219 4.81934 18.8284C4.96689 18.8349 5.11352 18.8021 5.24422 18.7333L9.99922 16.2333L14.7434 18.7333L14.8267 18.7717C14.9643 18.8258 15.1138 18.8425 15.2598 18.8198C15.4059 18.7971 15.5434 18.736 15.658 18.6427C15.7727 18.5494 15.8605 18.4273 15.9124 18.2889C15.9643 18.1504 15.9785 18.0007 15.9534 17.855L15.0442 12.5592L18.8975 8.80916L18.9625 8.73833C19.0554 8.62397 19.1163 8.48704 19.139 8.34149C19.1617 8.19594 19.1454 8.04698 19.0918 7.90977C19.0382 7.77257 18.9492 7.65202 18.8338 7.56042C18.7184 7.46883 18.5808 7.40944 18.435 7.38833L13.1184 6.61666L10.7417 1.8C10.6729 1.66044 10.5665 1.54293 10.4344 1.46075C10.3023 1.37857 10.1498 1.33502 9.99422 1.33502C9.83864 1.33502 9.68616 1.37857 9.55406 1.46075C9.42195 1.54293 9.31549 1.66044 9.24672 1.8L6.86922 6.61666Z"
                                                    fill="{{ $i <= $villa->average_rating ? '#FF9D00' : '#C4C4C4' }}" />
                                            </svg>
                                        @endfor
                                        <span>{{ $villa->average_rating }}</span>
                                        <span class="reviews">({{ number_format($villa->reviews->count()) }})
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
                                    @if($villa->room)
                                        <div class="villa-details-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                 viewBox="0 0 20 21" fill="none">
                                                <path
                                                    d="M19.9675 13.4958C19.9983 13.4133 20.0092 13.3225 19.9808 13.2308L18.3333 7.87668V2.93672C18.3333 1.78839 17.3992 0.853394 16.25 0.853394H3.75C2.60082 0.853394 1.66668 1.78839 1.66668 2.93672V7.87671L0.0191797 13.2308C-0.00914067 13.3217 0.00167969 13.4125 0.0325 13.4958C0.0125 13.5842 0 13.675 0 13.77V17.1033V18.77C0 19 0.18668 19.1867 0.41668 19.1867H2.08336C2.31332 19.1867 2.5 19 2.5 18.77V17.52H17.5V18.77C17.5 19 17.6867 19.1867 17.9167 19.1867H19.5833C19.8133 19.1867 20 19 20 18.77V17.1033V13.77C20 13.675 19.9875 13.5842 19.9675 13.4958ZM2.5 2.93672C2.5 2.24754 3.06082 1.68672 3.75 1.68672H16.25C16.9392 1.68672 17.5 2.24754 17.5 2.93672V7.52004H16.3675L15.9792 5.96671C15.8392 5.40921 15.34 5.02004 14.7658 5.02004H12.0833C11.3942 5.02004 10.8333 5.58085 10.8333 6.27004V7.52004H9.16667V6.27085C9.16667 5.58168 8.60583 5.02085 7.91664 5.02085H5.23414C4.65996 5.02085 4.16082 5.41085 4.02082 5.96754L3.6325 7.52004H2.5V2.93672ZM15.5117 8.19335C15.4317 8.29504 15.3117 8.35334 15.1825 8.35334H12.0833C11.8542 8.35334 11.6667 8.16668 11.6667 7.93668V6.27004C11.6667 6.04004 11.8542 5.85335 12.0833 5.85335H14.7667C14.9583 5.85335 15.1242 5.98254 15.1708 6.16835L15.5875 7.83504C15.6192 7.96085 15.5917 8.09085 15.5117 8.19335ZM8.33417 6.27004V7.93254C8.33417 7.93421 8.33333 7.93504 8.33333 7.93671C8.33333 7.93754 8.33333 7.93839 8.33333 7.93839C8.33254 8.16758 8.14586 8.35343 7.91754 8.35343H4.81836C4.68836 8.35343 4.56918 8.29508 4.48918 8.19339C4.40918 8.09089 4.38168 7.96008 4.41336 7.83508L4.83004 6.16839C4.87672 5.98339 5.04254 5.85339 5.23504 5.85339H7.91754C8.14668 5.85335 8.33417 6.04004 8.33417 6.27004ZM2.39082 8.35334H3.645C3.68918 8.47834 3.74668 8.59834 3.83082 8.70668C4.07082 9.01168 4.43 9.18668 4.8175 9.18668H7.91668C8.45917 9.18668 8.9175 8.83668 9.09 8.35334H10.91C11.0825 8.83751 11.5408 9.18668 12.0833 9.18668H15.1825C15.57 9.18668 15.9283 9.01168 16.1683 8.70668C16.2525 8.59918 16.31 8.47834 16.3542 8.35334H17.6092L18.8958 12.535C18.8475 12.5292 18.8 12.52 18.75 12.52H1.25C1.2 12.52 1.1525 12.5292 1.105 12.535L2.39082 8.35334ZM1.66668 18.3533H0.83332V17.52H1.66664L1.66668 18.3533ZM19.1667 18.3533H18.3333V17.52H19.1667V18.3533ZM19.1667 16.6867H0.83332V13.77C0.83332 13.54 1.02082 13.3533 1.25 13.3533H18.75C18.9792 13.3533 19.1667 13.54 19.1667 13.77V16.6867Z"
                                                    fill="#1E84FE" />
                                            </svg>
                                            <span>{{ $villa->room ?? '' }} {{ __('Rooms') }}</span>
                                        </div>
                                    @endif
                                    @if($villa->bathroom)
                                        <div class="villa-details-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M18.75 9.16665H18.3333V2.5C18.3333 1.58081 17.5858 0.833313 16.6667 0.833313C15.7474 0.833313 15 1.58077 15 2.49917L14.9992 2.91667C14.9987 3.14699 15.1847 3.33375 15.415 3.33417C15.6453 3.33417 15.8321 3.14824 15.8325 2.91831L15.8333 2.50003C15.8333 2.04065 16.2072 1.66671 16.6667 1.66671C17.126 1.66671 17.5 2.04058 17.5 2.5V9.16665H1.25C0.560703 9.16665 0 9.7274 0 10.4166C0 10.9591 0.349375 11.4173 0.83332 11.5899V12.9166C0.83332 14.8292 1.83231 16.5096 3.33332 17.4737V19.5833C3.33332 19.8136 3.51969 20 3.75 20H4.58332C4.74121 20 4.88523 19.9109 4.95606 19.7696L5.68902 18.3041C5.87352 18.3231 6.06058 18.3333 6.25 18.3333H13.75C13.9394 18.3333 14.1265 18.3231 14.311 18.3041L15.0439 19.7696C15.1147 19.9109 15.2587 20 15.4167 20H16.25C16.4803 20 16.6667 19.8136 16.6667 19.5833V17.4736C18.1677 16.5096 19.1667 14.8291 19.1667 12.9166V11.5899C19.6506 11.4173 20 10.9591 20 10.4166C20 9.7274 19.4393 9.16665 18.75 9.16665ZM5 9.99998H9.16667V14.0914L5 13.3972V9.99998ZM0.83332 10.4166C0.83332 10.1867 1.02012 9.99998 1.25 9.99998H4.16668V10.8333H1.25C1.02012 10.8333 0.83332 10.6466 0.83332 10.4166ZM4.32578 19.1666H4.16668V17.9154C4.38344 18.0061 4.60914 18.0781 4.83903 18.1404L4.32578 19.1666ZM15.8333 19.1666H15.6742L15.161 18.1404C15.3908 18.0782 15.6166 18.0061 15.8333 17.9154V19.1666ZM18.3333 12.9166C18.3333 15.4439 16.2773 17.5 13.75 17.5H6.25C3.72273 17.5 1.66668 15.4439 1.66668 12.9166V11.6666H4.16668V13.75C4.16668 13.9538 4.31398 14.1276 4.515 14.161L9.515 14.9943C9.53775 14.998 9.56058 15 9.58333 15C9.68142 15 9.777 14.9654 9.85275 14.9011C9.94633 14.8221 10 14.7058 10 14.5833V11.6666H18.3333V12.9166ZM18.75 10.8333H10V9.99998H18.75C18.9799 9.99998 19.1667 10.1867 19.1667 10.4166C19.1667 10.6466 18.9799 10.8333 18.75 10.8333Z"
                                                    fill="#1E84FE" />
                                            </svg>
                                            <span>{{ $villa->bathroom ?? '' }} {{ __('Baths') }}</span>
                                        </div>
                                    @endif
                                    @if($villa->pool)
                                        <div class="villa-details-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                 viewBox="0 0 20 21" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M1.25 4.77502V1.27502H4.75V4.77502H1.25ZM0 0.858358C0 0.39812 0.373096 0.0250244 0.833333 0.0250244H5.16667C5.6269 0.0250244 6 0.39812 6 0.858358V5.19169C6 5.65192 5.6269 6.02502 5.16667 6.02502H3.625V14.025H5.16667C5.6269 14.025 6 14.3981 6 14.8584V19.1917C6 19.6519 5.6269 20.025 5.16667 20.025H0.833333C0.373096 20.025 0 19.6519 0 19.1917V14.8584C0 14.3981 0.373096 14.025 0.833333 14.025H2.375V6.02502H0.833333C0.373096 6.02502 0 5.65192 0 5.19169V0.858358ZM15.25 1.27502H18.75V4.77502H15.25V1.27502ZM14 0.858358C14 0.39812 14.3731 0.0250244 14.8333 0.0250244H19.1667C19.6269 0.0250244 20 0.39812 20 0.858358V5.19169C20 5.65192 19.6269 6.02502 19.1667 6.02502H17.625V14.025H19.1667C19.6269 14.025 20 14.3981 20 14.8584V19.1917C20 19.6519 19.6269 20.025 19.1667 20.025H14.8333C14.3731 20.025 14 19.6519 14 19.1917V17.65H6V16.4H14V14.8584C14 14.3981 14.3731 14.025 14.8333 14.025H16.375V6.02502H14.8333C14.3731 6.02502 14 5.65192 14 5.19169V3.65002H6V2.40002H14V0.858358ZM18.75 15.275H15.25V18.775H18.75V15.275ZM1.25 18.775V15.275H4.75V18.775H1.25Z"
                                                      fill="#1E84FE" />
                                            </svg>
                                            <span>{{ $villa->pool ?? '' }} {{ __('sq pool') }}</span>
                                        </div>
                                    @endif
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
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- explore section end -->
        @endif

        @if ($whyChooseUs->count() > 0)
            <!-- choose section start -->
            <section class="section container">
                <div class="section-box">
                    <h2 class="section-title">{{ __('Why choose us') }}</h2>
                </div>
                <div class="choose-items">
                    @foreach ($whyChooseUs as $item)
                        <div class="choose-item">
                            <img class="choose-item-icon" src="{{ asset($item?->image ?? '') }}" alt="icon" />
                            <h4 class="choose-item-title">{{ $item?->title ?? '' }}</h4>
                            <p class="choose-item-text">
                                {{ $item?->description ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- choose section end -->
        @endif

        <!-- type section start -->
        <section class="section container">
            <div class="section-box">
                <h2 class="section-title">{{ __('Browse by Villa & Apartment type in Arab') }}</h2>
            </div>
            <div class="type-items">
                <div class="type-item">
                    <div class="type-item-img"
                        style="background-image: url('{{ asset('/frontend/assets/images/type-img-1.png') }}')">
                        <div class="text">{{ __('Villa') }}</div>
                        <div class="overlay"></div>
                    </div>
                    <div class="text">
                        {{ $villas->where('property_type', 'Villa')->count() }} {{ __('available now') }}
                    </div>
                </div>
                <div class="type-item">
                    <div class="type-item-img"
                        style="background-image: url('{{ asset('/frontend/assets/images/type-img-3.png') }}')">
                        <div class="text">{{ __('Apartments') }}</div>
                        <div class="overlay"></div>
                    </div>
                    <div class="text">
                        {{ $villas->where('property_type', 'Apartment')->count() }} {{ __('available now') }}
                    </div>
                </div>
            </div>
        </section>
        <!-- type section end -->

        @if ($whyBookVilla->count() > 0)
            <!-- feature section start -->
            <section class="section container">
                <div class="section-box">
                    <h2 class="section-title">{{ __('Why book our villas?') }}</h2>
                </div>
                <div class="feature-items">
                    @foreach ($whyBookVilla as $item)
                        <div class="feature-item">
                            <img class="feature-item-icon" src="{{ asset($item->icon ?? '') }}" alt="feature icon" />
                            <h4 class="feature-title">{{ $item->title ?? '' }}</h4>
                            <p class="feature-text">
                                {{ $item->description ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- feature section end -->
        @endif

        @if ($reviews->count() > 0)
            <!-- testimonial section start -->
            <section class="section container">
                <div class="section-box">
                    <h2 class="section-title">{{ __('What our guests are saying') }}</h2>
                    <div class="testimonial-naves" dir="ltr">
                        <button class="testimonial-nav prev-nav" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M19 12L5 12M5 12L11 6M5 12L11 18" stroke="#1E84FE" stroke-width="2.25"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <button class="testimonial-nav next-nav" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M5 12L19 12M19 12L13 6M19 12L13 18" stroke="white" stroke-width="2.25"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="testimonial-carousel owl-carousel owl-theme" dir="ltr">
                    @foreach ($reviews as $review)
                        <div class="testimonial-item flex-column h-100 d-flex" >
                            <div>
                                <div class="testimonial-header">
                                    <figure class="client-img">
                                        <img src="{{ $review->user->avatar ? asset($review->user->avatar) : asset('/frontend/assets/images/client-1.png') }}"
                                            alt="Client image" />
                                    </figure>
                                    <div class="client-details">
                                        <div class="client-name">{{ $review->user->name ?? 'Anonymous' }}</div>
                                        <div class="client-job">Villa: {{ $review->villa->title }}</div>
                                    </div>
                                </div>
                                <div class="testimonial-ratings-container">
                                    <div class="ratings">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.9999 17.0741L14.2425 19.3574C14.4762 19.4832 14.7423 19.5273 15.0018 19.4831C15.6702 19.3692 16.1236 18.7111 16.0145 18.0132L15.2457 13.0947L18.6365 9.5873C18.8234 9.39412 18.9457 9.14338 18.9856 8.87209C19.0884 8.17316 18.6292 7.51957 17.9598 7.41222L13.2421 6.65573L11.0952 2.20471C10.9768 1.95957 10.7863 1.76058 10.5515 1.63711C9.94663 1.31905 9.20935 1.57317 8.90474 2.20471L6.75781 6.65573L2.04009 7.41222C1.78026 7.45389 1.54012 7.58165 1.3551 7.77664C0.878471 8.279 0.882117 9.08966 1.36324 9.5873L4.75409 13.0947L3.9853 18.0132C3.94295 18.2841 3.98512 18.5621 4.10555 18.806C4.41584 19.4346 5.15538 19.6814 5.75734 19.3574L9.9999 17.0741Z"
                                                    fill="{{ $i <= $review->rating ? '#FF8C32' : '#DFE0E4' }}" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <div class="time">{{ $review->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                            <div class="testimonial-details">
                                <p>{{ $review->comment ?? 'No comment provided.' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- testimonial section end -->
        @endif

        @if ($faqs->count() > 0)
            <!-- faq section start -->
            <section class="section container">
                <div class="section-box justify-content-center">
                    <h2 class="section-title text-center">{{ __('Frequently Asked Question') }}</h2>
                </div>
                <div class="accordion faq-accordion" id="faq">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="faq{{ $faq->id }}">
                                    {{ $loop->iteration }}. {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faq{{ $faq->id }}"
                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                data-bs-parent="#faq">
                                <div class="accordion-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- faq section end -->
        @endif

        @if ($our_latest_blogs->count() > 0)
            <!-- blog section start -->
            <section class="section container">
                <div class="section-box">
                    <h2 class="section-title">{{ __('Our latest blog') }}</h2>
                    <a href="{{ route('blog') }}" class="link section-link">{{ __('View all') }}</a>
                </div>
                <div class="blog-items">
                    @foreach ($our_latest_blogs as $blog)
                        <div class="blog-item">
                            <figure class="blog-img">
                                <img src="{{ asset($blog->image ? $blog->image : '/frontend/assets/images/blog-1.png') }}"
                                    alt="{{ $blog->title }}" />
                            </figure>
                            <div class="blog-content">
                                <div class="blog-time">
                                    <img src="{{ asset('/frontend/assets/images/icons/calendar.svg') }}"
                                        alt="calendar icon" />
                                    <span>{{ $blog->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="details">
                                    {{ $blog->title }}
                                </div>
                                <div class="blog-footer">
                                    <div class="client-details">
                                        <figure class="client-img">
                                            <img src="{{ asset($blog->user->image ? $blog->user->image : '/frontend/default-avatar-profile.jpg') }}"
                                                alt="client image" />
                                        </figure>
                                        <span>{{ $blog->user_id ? $blog->user->name : 'N/A' }}</span>
                                    </div>
                                    <a href="{{ route('blogs.details', ['slug' => $blog->slug]) }}"
                                        class="button button-pri button-sm"><span>{{ __('Read More') }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                            viewBox="0 0 21 20" fill="none">
                                            <path
                                                d="M13.6711 7.845L6.49865 15.0175L5.32031 13.8392L12.492 6.66667H6.17115V5H15.3378V14.1667H13.6711V7.845Z"
                                                fill="white" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- blog section end -->
        @endif

        <!-- cta section start -->
        <section class="section container">
            <div class="cta-section">
                <img class="cta-img" src="{{ asset($bottom_image ?? '/frontend/assets/images/home-banner-bg.png') }}"
                    alt="background image" />
                <div class="overlay"></div>
                <div class="content">
                    <h3 class="cta-title">
                        @if ($bottom_title)
                            {{ $bottom_title }}
                        @else
                        {{ __('Do not miss your chance for a luxury vacation') }}
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
    <!-- main Section end -->

@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
            $('#bookingSuccessModal').modal('show');
            // console.log('echo');
        });
    </script>

    <script type="text/javascript">
        // Define the translations for Arabic and English
        const arabic = {
            months: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            weekday: ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
            weekdaysShort: ["أحد", "اثن", "ثلث", "أرب", "خم", "جم", "سبت"],
            today: "اليوم",
            clear: "مسح",
            titleFormat: "MMMM yyyy"
        };

        const english = {
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            weekday: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            weekdaysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            today: "Today",
            clear: "Clear",
            titleFormat: "MMMM yyyy"
        };

        // Determine the current locale (assuming your application sets the locale dynamically)
        const currentLocale = document.documentElement.getAttribute("lang"); // "ar" or "en"

        // Choose the appropriate translation based on the current locale
        const currentLang = currentLocale === "ar" ? arabic : english;

        const picker = new easepick.create({
            element: '#checkIn',
            css: [
                '{{ asset('/frontend/assets/css/plugins/easepick-1.2.1.css') }}',
                '{{ asset('/frontend/assets/css/easepick-edit.css') }}',
            ],
            plugins: ['AmpPlugin', 'RangePlugin', 'LockPlugin'],
            zIndex: 50,
            AmpPlugin: {
                dropdown: {
                    months: true,
                    years: true,
                },
                resetButton: true,
                darkMode: false,
            },
            RangePlugin: {
                elementEnd: '#checkOut',
            },
            lang: currentLocale === "ar" ? 'ar' : 'en', // Use the locale directly for the lang property
            LockPlugin: {
                selectForward: true,
            },
            setup(picker) {
                picker.on('show', () => {
                    const container = picker.ui.container;
                    const htmlElement = document.documentElement;
                    const dirAttr = htmlElement.getAttribute("dir");
                    // Update language dynamically based on the current locale (language)
                    checkInDatePicker.options.lang = dirAttr === "ltr" ? "en" : "ar";
                    container.classList.add(dirAttr === "ltr" ? 'md-ltr-right-aligned' : "");
                });
                picker.on('select', (e) => {
                    const { view, date, target } = e.detail;
                    const changeEvent = new Event("change", {
                        bubbles: false,
                        cancelable: false
                    });
                    checkOutElement.dispatchEvent(changeEvent);
                });
            },
        });
    </script>


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

@endpush
