@extends('frontend.app')

@section('title', 'Villas details')

@push('styles')
    <style>
        /* Hide images beyond the 5th one */
        .villa-feature-images .small-img:nth-child(n+6) {
            display: none;
        }
    </style>
@endpush

@section('content')

    @php
        // Filter the collection to get the CMS entry with id = 6
        $cmsNew = $cms->where('id', 7)->first(); // Use first() instead of get()
        $banner_image = $cmsNew ? $cmsNew->banner_image : null; // Ensure cmsHeroBanner is not null
        $banner_title = $cmsNew ? $cmsNew->banner_title : null; // Ensure cmsHeroBanner is not null
        $bottom_image = $cmsNew ? $cmsNew->page_image : null; // Ensure cmsHeroBanner is not null
        $bottom_title = $cmsNew ? $cmsNew->page_title : null; // Ensure cmsHeroBanner is not null
        $button_title = $cmsNew ? $cmsNew->button_title : null; // Ensure cmsHeroBanner is not null
        $button_url = $cmsNew ? $cmsNew->button_url : null; // Ensure cmsHeroBanner is not null
    @endphp

    <!-- Hero start -->
    <section class="hero-sec"
        style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/background/villa-details-bg.png') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <a class="back-btn" href="{{ route('villas') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M5.83337 14H22.1667M5.83337 14L10.5 18.6666M5.83337 14L10.5 9.33331" stroke="white"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>  {{ __('Back to All Villas') }}</span>
                </a>
                <div class="banner-breadcrumb">
                    <a href="{{ route('home') }}" class="banner-breadcrumb-item">  {{ __('Home') }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                            fill="white" />
                    </svg>
                    <a href="{{ route('villas') }}" class="banner-breadcrumb-item">  {{ __('Details') }}</a>
                </div>
                <h1 class="hero-title-pri">{{ $banner_title ?? __('Seaside luxury villa') }}</h1>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- main section start -->
    <main>
        <div class="container villa-details">
            <a class="back-btn" href="{{ route('all.villas') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M5.83337 14H22.1667M5.83337 14L10.5 18.6667M5.83337 14L10.5 9.33334" stroke="#1D2635"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>{{ __('Back to All Villas') }}</span>
            </a>
            <div class="top-tag">{{ __($data->property_type) ?? '' }}</div>
            <div class="title">{{ $data->title }}</div>
            <div class="villa-location">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                    <path
                        d="M9.96402 19.6811L9.43108 19.2242C8.69638 18.6091 2.28125 13.0687 2.28125 9.01608C2.28125 4.77301 5.72095 1.33331 9.96402 1.33331C14.2071 1.33331 17.6468 4.77301 17.6468 9.01608C17.6468 13.0687 11.2317 18.6091 10.5 19.2273L9.96402 19.6811ZM9.96402 2.99455C6.64 2.99831 3.94629 5.69203 3.94252 9.01605C3.94252 11.562 7.88936 15.6291 9.96402 17.4906C12.0387 15.6284 15.9855 11.5589 15.9855 9.01605C15.9817 5.69203 13.2881 2.99835 9.96402 2.99455Z"
                        fill="#798090" />
                    <path
                        d="M9.96335 12.0615C8.28144 12.0615 6.91797 10.698 6.91797 9.01609C6.91797 7.33417 8.28144 5.9707 9.96335 5.9707C11.6453 5.9707 13.0087 7.33417 13.0087 9.01609C13.0087 10.698 11.6453 12.0615 9.96335 12.0615ZM9.96335 7.49336C9.12239 7.49336 8.44066 8.17509 8.44066 9.01605C8.44066 9.85701 9.12239 10.5387 9.96335 10.5387C10.8043 10.5387 11.486 9.85701 11.486 9.01605C11.486 8.17509 10.8043 7.49336 9.96335 7.49336Z"
                        fill="#798090" />
                </svg>
                <span>{{ $data->full_address ?? '' }}</span>
            </div>
            <div class="villa-ratings">
                <div class="villa-rating-starts">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                         viewBox="0 0 21 21" fill="none">
                        <path
                            d="M7.20222 6.61666L1.88556 7.3875L1.79139 7.40666C1.64884 7.44451 1.51889 7.5195 1.4148 7.624C1.31071 7.72849 1.23623 7.85874 1.19894 8.00143C1.16166 8.14413 1.16291 8.29417 1.20258 8.43622C1.24225 8.57828 1.3189 8.70726 1.42472 8.81L5.27639 12.5592L4.36806 17.855L4.35722 17.9467C4.3485 18.0941 4.37911 18.2412 4.44593 18.3729C4.51275 18.5046 4.61338 18.6162 4.7375 18.6963C4.86163 18.7763 5.0048 18.8219 5.15235 18.8284C5.2999 18.8349 5.44653 18.8021 5.57722 18.7333L10.3322 16.2333L15.0764 18.7333L15.1597 18.7717C15.2973 18.8258 15.4468 18.8425 15.5929 18.8198C15.7389 18.7971 15.8764 18.736 15.9911 18.6427C16.1057 18.5494 16.1935 18.4273 16.2454 18.2889C16.2973 18.1504 16.3115 18.0007 16.2864 17.855L15.3772 12.5592L19.2306 8.80916L19.2956 8.73833C19.3884 8.62397 19.4493 8.48704 19.472 8.34149C19.4947 8.19594 19.4784 8.04698 19.4248 7.90977C19.3712 7.77257 19.2822 7.65202 19.1668 7.56042C19.0514 7.46883 18.9138 7.40944 18.7681 7.38833L13.4514 6.61666L11.0747 1.8C11.006 1.66044 10.8995 1.54293 10.7674 1.46075C10.6353 1.37857 10.4828 1.33502 10.3272 1.33502C10.1716 1.33502 10.0192 1.37857 9.88707 1.46075C9.75496 1.54293 9.64849 1.66044 9.57972 1.8L7.20222 6.61666Z"
                            fill="#FF9D00" />
                    </svg>
                </div>
                <div class="villa-rating">{{ number_format($averageRating ?? 0, 1) }} / 5</div>
                <div class="villa-reviews">{{ $allReview->count() }} {{ __('reviews') }}</div>
                <button class="action-btn" type="button">
                    @if (Auth::check())
                        <button class="bookmark-btn border-0" type="button"
                            onclick="toggleBookmark({{ $data->id }}, this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="{{ $data->favouritedByUsers->contains(auth()->id()) ? '#1E84FE' : 'none' }}"
                                class="wishlist-icon {{ $data->favouritedByUsers->contains(auth()->id()) ? 'active' : '' }}">
                                <path
                                    d="M8.59399 3.91992H3.40731C2.26731 3.91992 1.33398 4.85325 1.33398 5.99325V13.5666C1.33398 14.5333 2.02732 14.9466 2.87398 14.4732L5.49398 13.0132C5.77398 12.8599 6.22732 12.8599 6.50065 13.0132L9.12065 14.4732C9.96731 14.9466 10.6606 14.5333 10.6606 13.5666V5.99325C10.6673 4.85325 9.73399 3.91992 8.59399 3.91992Z"
                                    stroke="#1E84FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10.6673 5.99325V13.5666C10.6673 14.5333 9.97399 14.9399 9.12732 14.4732L6.50732 13.0132C6.22732 12.8599 5.77398 12.8599 5.49398 13.0132L2.87398 14.4732C2.02732 14.9399 1.33398 14.5333 1.33398 13.5666V5.99325C1.33398 4.85325 2.26731 3.91992 3.40731 3.91992H8.59399C9.73399 3.91992 10.6673 4.85325 10.6673 5.99325Z"
                                    stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M14.6673 3.40667V10.98C14.6673 11.9467 13.974 12.3533 13.1273 11.8867L10.6673 10.5133V5.99334C10.6673 4.85334 9.73399 3.92001 8.59399 3.92001H5.33398V3.40667C5.33398 2.26667 6.26731 1.33334 7.40731 1.33334H12.594C13.734 1.33334 14.6673 2.26667 14.6673 3.40667Z"
                                    stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    @else
                        <button class="bookmark-btn" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" class="wishlist-icon">
                                <path
                                    d="M8.59399 3.91992H3.40731C2.26731 3.91992 1.33398 4.85325 1.33398 5.99325V13.5666C1.33398 14.5333 2.02732 14.9466 2.87398 14.4732L5.49398 13.0132C5.77398 12.8599 6.22732 12.8599 6.50065 13.0132L9.12065 14.4732C9.96731 14.9466 10.6606 14.5333 10.6606 13.5666V5.99325C10.6673 4.85325 9.73399 3.91992 8.59399 3.91992Z"
                                    stroke="#1E84FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10.6673 5.99325V13.5666C10.6673 14.5333 9.97399 14.9399 9.12732 14.4732L6.50732 13.0132C6.22732 12.8599 5.77398 12.8599 5.49398 13.0132L2.87398 14.4732C2.02732 14.9399 1.33398 14.5333 1.33398 13.5666V5.99325C1.33398 4.85325 2.26731 3.91992 3.40731 3.91992H8.59399C9.73399 3.91992 10.6673 4.85325 10.6673 5.99325Z"
                                    stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M14.6673 3.40667V10.98C14.6673 11.9467 13.974 12.3533 13.1273 11.8867L10.6673 10.5133V5.99334C10.6673 4.85334 9.73399 3.92001 8.59399 3.92001H5.33398V3.40667C5.33398 2.26667 6.26731 1.33334 7.40731 1.33334H12.594C13.734 1.33334 14.6673 2.26667 14.6673 3.40667Z"
                                    stroke="#1E84FE" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    @endif
                </button>
                <button class="copy-btn" data-link="{{ request()->url() }}">
                    <span class="copy-tooltip">{{ __('Copied!') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <path
                            d="M16 12.9V17.1C16 20.6 14.6 22 11.1 22H6.9C3.4 22 2 20.6 2 17.1V12.9C2 9.4 3.4 8 6.9 8H11.1C14.6 8 16 9.4 16 12.9Z"
                            stroke="#0B0B0B" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M22 6.9V11.1C22 14.6 20.6 16 17.1 16H16V12.9C16 9.4 14.6 8 11.1 8H8V6.9C8 3.4 9.4 2 12.9 2H17.1C20.6 2 22 3.4 22 6.9Z"
                            stroke="#0B0B0B" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <div class="villa-feature-images">
                <figure class="villa-feature-image big-img">
                    <img class="feature-img-box" src="{{ asset($data->villa_images->first()->image ?? '') }}"
                        alt="Item image" />
                </figure>
                @foreach ($data->villa_images->skip(1) as $index => $image)
                    <figure
                        class="villa-feature-image small-img {{ $index <= 4 ? '' : 'hidden' }} {{ $index == 4 ? 'last-img' : '' }}">
                        <img class="feature-img-box" src="{{ asset($image->image ?? '') }}" alt="Villa images" />
                        <button class="show-more-btn" type="button">
                            <img src="{{ asset('/frontend/assets/images/icons/show-more-img-icon.svg') }}"
                                alt="" />
                            <span>  {{ __('Show all images') }}</span>
                        </button>
                    </figure>
                @endforeach
            </div>

            <div class="villa-item-details">
                @if ($data->room)
                    <div class="villa-details-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                            fill="none">
                            <path
                                d="M19.9675 13.4958C19.9983 13.4133 20.0092 13.3225 19.9808 13.2308L18.3333 7.87668V2.93672C18.3333 1.78839 17.3992 0.853394 16.25 0.853394H3.75C2.60082 0.853394 1.66668 1.78839 1.66668 2.93672V7.87671L0.0191797 13.2308C-0.00914067 13.3217 0.00167969 13.4125 0.0325 13.4958C0.0125 13.5842 0 13.675 0 13.77V17.1033V18.77C0 19 0.18668 19.1867 0.41668 19.1867H2.08336C2.31332 19.1867 2.5 19 2.5 18.77V17.52H17.5V18.77C17.5 19 17.6867 19.1867 17.9167 19.1867H19.5833C19.8133 19.1867 20 19 20 18.77V17.1033V13.77C20 13.675 19.9875 13.5842 19.9675 13.4958ZM2.5 2.93672C2.5 2.24754 3.06082 1.68672 3.75 1.68672H16.25C16.9392 1.68672 17.5 2.24754 17.5 2.93672V7.52004H16.3675L15.9792 5.96671C15.8392 5.40921 15.34 5.02004 14.7658 5.02004H12.0833C11.3942 5.02004 10.8333 5.58085 10.8333 6.27004V7.52004H9.16667V6.27085C9.16667 5.58168 8.60583 5.02085 7.91664 5.02085H5.23414C4.65996 5.02085 4.16082 5.41085 4.02082 5.96754L3.6325 7.52004H2.5V2.93672ZM15.5117 8.19335C15.4317 8.29504 15.3117 8.35334 15.1825 8.35334H12.0833C11.8542 8.35334 11.6667 8.16668 11.6667 7.93668V6.27004C11.6667 6.04004 11.8542 5.85335 12.0833 5.85335H14.7667C14.9583 5.85335 15.1242 5.98254 15.1708 6.16835L15.5875 7.83504C15.6192 7.96085 15.5917 8.09085 15.5117 8.19335ZM8.33417 6.27004V7.93254C8.33417 7.93421 8.33333 7.93504 8.33333 7.93671C8.33333 7.93754 8.33333 7.93839 8.33333 7.93839C8.33254 8.16758 8.14586 8.35343 7.91754 8.35343H4.81836C4.68836 8.35343 4.56918 8.29508 4.48918 8.19339C4.40918 8.09089 4.38168 7.96008 4.41336 7.83508L4.83004 6.16839C4.87672 5.98339 5.04254 5.85339 5.23504 5.85339H7.91754C8.14668 5.85335 8.33417 6.04004 8.33417 6.27004ZM2.39082 8.35334H3.645C3.68918 8.47834 3.74668 8.59834 3.83082 8.70668C4.07082 9.01168 4.43 9.18668 4.8175 9.18668H7.91668C8.45917 9.18668 8.9175 8.83668 9.09 8.35334H10.91C11.0825 8.83751 11.5408 9.18668 12.0833 9.18668H15.1825C15.57 9.18668 15.9283 9.01168 16.1683 8.70668C16.2525 8.59918 16.31 8.47834 16.3542 8.35334H17.6092L18.8958 12.535C18.8475 12.5292 18.8 12.52 18.75 12.52H1.25C1.2 12.52 1.1525 12.5292 1.105 12.535L2.39082 8.35334ZM1.66668 18.3533H0.83332V17.52H1.66664L1.66668 18.3533ZM19.1667 18.3533H18.3333V17.52H19.1667V18.3533ZM19.1667 16.6867H0.83332V13.77C0.83332 13.54 1.02082 13.3533 1.25 13.3533H18.75C18.9792 13.3533 19.1667 13.54 19.1667 13.77V16.6867Z"
                                fill="#1E84FE" />
                        </svg>
                        <span>{{ $data->room ?? '' }}   {{ __('Rooms') }}</span>
                    </div>
                @endif
                @if ($data->bathroom)
                    <div class="villa-details-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M18.75 9.16665H18.3333V2.5C18.3333 1.58081 17.5858 0.833313 16.6667 0.833313C15.7474 0.833313 15 1.58077 15 2.49917L14.9992 2.91667C14.9987 3.14699 15.1847 3.33375 15.415 3.33417C15.6453 3.33417 15.8321 3.14824 15.8325 2.91831L15.8333 2.50003C15.8333 2.04065 16.2072 1.66671 16.6667 1.66671C17.126 1.66671 17.5 2.04058 17.5 2.5V9.16665H1.25C0.560703 9.16665 0 9.7274 0 10.4166C0 10.9591 0.349375 11.4173 0.83332 11.5899V12.9166C0.83332 14.8292 1.83231 16.5096 3.33332 17.4737V19.5833C3.33332 19.8136 3.51969 20 3.75 20H4.58332C4.74121 20 4.88523 19.9109 4.95606 19.7696L5.68902 18.3041C5.87352 18.3231 6.06058 18.3333 6.25 18.3333H13.75C13.9394 18.3333 14.1265 18.3231 14.311 18.3041L15.0439 19.7696C15.1147 19.9109 15.2587 20 15.4167 20H16.25C16.4803 20 16.6667 19.8136 16.6667 19.5833V17.4736C18.1677 16.5096 19.1667 14.8291 19.1667 12.9166V11.5899C19.6506 11.4173 20 10.9591 20 10.4166C20 9.7274 19.4393 9.16665 18.75 9.16665ZM5 9.99998H9.16667V14.0914L5 13.3972V9.99998ZM0.83332 10.4166C0.83332 10.1867 1.02012 9.99998 1.25 9.99998H4.16668V10.8333H1.25C1.02012 10.8333 0.83332 10.6466 0.83332 10.4166ZM4.32578 19.1666H4.16668V17.9154C4.38344 18.0061 4.60914 18.0781 4.83903 18.1404L4.32578 19.1666ZM15.8333 19.1666H15.6742L15.161 18.1404C15.3908 18.0782 15.6166 18.0061 15.8333 17.9154V19.1666ZM18.3333 12.9166C18.3333 15.4439 16.2773 17.5 13.75 17.5H6.25C3.72273 17.5 1.66668 15.4439 1.66668 12.9166V11.6666H4.16668V13.75C4.16668 13.9538 4.31398 14.1276 4.515 14.161L9.515 14.9943C9.53775 14.998 9.56058 15 9.58333 15C9.68142 15 9.777 14.9654 9.85275 14.9011C9.94633 14.8221 10 14.7058 10 14.5833V11.6666H18.3333V12.9166ZM18.75 10.8333H10V9.99998H18.75C18.9799 9.99998 19.1667 10.1867 19.1667 10.4166C19.1667 10.6466 18.9799 10.8333 18.75 10.8333Z"
                                fill="#1E84FE" />
                        </svg>
                        <span>{{ $data->bathroom ?? '' }} {{ __('Baths') }}</span>
                    </div>
                @endif

                @if ($data->pool)
                    <div class="villa-details-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.25 4.77502V1.27502H4.75V4.77502H1.25ZM0 0.858358C0 0.39812 0.373096 0.0250244 0.833333 0.0250244H5.16667C5.6269 0.0250244 6 0.39812 6 0.858358V5.19169C6 5.65192 5.6269 6.02502 5.16667 6.02502H3.625V14.025H5.16667C5.6269 14.025 6 14.3981 6 14.8584V19.1917C6 19.6519 5.6269 20.025 5.16667 20.025H0.833333C0.373096 20.025 0 19.6519 0 19.1917V14.8584C0 14.3981 0.373096 14.025 0.833333 14.025H2.375V6.02502H0.833333C0.373096 6.02502 0 5.65192 0 5.19169V0.858358ZM15.25 1.27502H18.75V4.77502H15.25V1.27502ZM14 0.858358C14 0.39812 14.3731 0.0250244 14.8333 0.0250244H19.1667C19.6269 0.0250244 20 0.39812 20 0.858358V5.19169C20 5.65192 19.6269 6.02502 19.1667 6.02502H17.625V14.025H19.1667C19.6269 14.025 20 14.3981 20 14.8584V19.1917C20 19.6519 19.6269 20.025 19.1667 20.025H14.8333C14.3731 20.025 14 19.6519 14 19.1917V17.65H6V16.4H14V14.8584C14 14.3981 14.3731 14.025 14.8333 14.025H16.375V6.02502H14.8333C14.3731 6.02502 14 5.65192 14 5.19169V3.65002H6V2.40002H14V0.858358ZM18.75 15.275H15.25V18.775H18.75V15.275ZM1.25 18.775V15.275H4.75V18.775H1.25Z"
                                fill="#1E84FE" />
                        </svg>
                        <span>{{ $data->pool ?? '' }}   {{ __('sq Pool') }}</span>
                    </div>
                @endif
            </div>
            @if ($data->description)
                <p class="villa-text">
                    {{ $data->description ?? '' }}
                </p>
            @endif
            <div class="book-section">
                <div class="row gx-2 gy-3">
                    <div class="col-md-7">

{{--                        <div class="author">--}}
{{--                            <figure>--}}
{{--                                <img src="{{ $data->user->avatar ? url($data->user->avatar) : asset('/frontend/assets/images/client-1.png') }}"--}}
{{--                                    alt="Owner Image" />--}}
{{--                            </figure>--}}
{{--                            <div>--}}
{{--                                <div class="name">  {{ __('Hosted by') }} {{ $data->user->name ?? '' }}</div>--}}
{{--                                <div class="time">--}}
{{--                                    {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}--}}
{{--                                    {{ __('hosted') }}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        @if ($data->balcony)
                            <div class="villa-feature-item">
                                <img src="{{ asset('/frontend/assets/images/icons/balcony.svg') }}" alt="" />
                                <div>
                                    <div class="feature-details">
                                        {{ __('Number of Balcony') }} : <span class="fw-bold text-dark">{{ $data->balcony }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($data->kitchen)
                            <div class="villa-feature-item">
                                <img src="{{ asset('/frontend/assets/images/icons/kitchen.svg') }}" alt="" />
                                <div>
                                    <div class="feature-details">
                                        {{ __('Number of Kitchen') }} : <span class="fw-bold text-dark">{{ $data->kitchen }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($data->living_room)
                            <div class="villa-feature-item">
                                <img src="{{ asset('/frontend/assets/images/icons/living_room.svg') }}" alt="" />
                                <div>
                                    <div class="feature-details">
                                        {{ __('Number of Living Room') }} : <span
                                            class="fw-bold text-dark">{{ $data->living_room }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($data->bar)
                            <div class="villa-feature-item">
                                <img src="{{ asset('/frontend/assets/images/icons/bar.svg') }}" alt="" />
                                <div>
                                    <div class="feature-details">
                                        {{ __('Bars') }} : <span class="fw-bold text-dark">{{ $data->bar }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($data->garage)
                            <div class="villa-feature-item">
                                <img src="{{ asset('/frontend/assets/images/icons/garage.svg') }}" alt="" />
                                <div>
                                    <div class="feature-details">
                                        {{ __('Garages') }} : <span class="fw-bold text-dark">{{ $data->garage }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($data->amenities->count() > 0)
                            <div class="details-title">{{ __('Amenities') }}</div>
                            <div class="facilities">
                                @foreach ($data->amenities as $amenity)
                                    <div class="facilities-item">
                                        @if($amenity->image)
                                            <figure class="facility-icon">
                                                <img src="{{ asset($amenity->image ?? '/frontend/assets/images/icons/calendar.svg') }}"
                                                     alt="{{ $amenity->name }}" width="24" height="25" />
                                            </figure>
                                        @endif
                                        <span>{{ $amenity->name ?? '' }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

{{--                        <div class="details-title">{{ __('Where you will be') }}</div>--}}
{{--                        <div class="w-100">--}}
{{--                            <iframe width="100%" height="376" frameborder="0" scrolling="no" marginheight="0"--}}
{{--                                marginwidth="0"--}}
{{--                                src="https://maps.google.com/maps?width=100%25&amp;height=376&amp;hl=en&amp;q={{ urlencode($data->map_location) }}&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">--}}
{{--                                <a href="https://www.gps.ie/">{{ __('gps systems') }}</a>--}}
{{--                            </iframe>--}}
{{--                        </div>--}}
                        <div class="details-title">{{ __('Villa rules') }}</div>
                        <div class="villa-text d-flex gap-5 mb-3">
                            <span>{{ __('Check in after') }} {{ \Carbon\Carbon::parse($data->check_in_time)->format('h:i a') }}</span>
                            <span>{{ __('Check out before') }}
                                {{ \Carbon\Carbon::parse($data->check_out_time)->format('h:i a') }}</span>
                        </div>
                        <div class="villa-text mb-3">{{ __('Minimum age to rent: 18') }}</div>
                        <div class="villa-text">
                            *{!! $data->villa_rules !!}
                        </div>
                        <div class="details-title">{{ __('Damage and incidentals') }}</div>
                        <div class="villa-text">
                            {{ __('You will be responsible for any damage to the rental villa caused by you or your party during your stay.') }}
                        </div>
                        <div class="details-title">{{ __('Cancellation Policy') }}</div>
                        <div class="details-title-2 mt-4">{{ __('No Refund') }}:</div>
                        <div class="villa-text my-2">{{ __('Refunds are not available after : 7 days prior to check-in') }}</div>
                       {{--  <div class="villa-text my-2">{{ __('Refunds are not available after') }}: <b>{{ __('7 days prior to check-in') }}</b></div>
                        <div class="villa-text">{{ __('Once this period has passed, the reservation becomes non-refundable.') }}</div> --}}
                    </div>

                    {{-- Checkout start --}}
                    <div class="col-md-5">
                        <div class="book-form-container">
                            <div class="inner">

                                <div class="top">
                                    <span>₪<span id="day_price">{{ $data->price ?? 0 }}</span> </span>{{ __('per night') }}
                                </div>

                                <form action="{{ route('villa.store.session') }}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <input type="hidden" name="villa_id" value="{{ $data->id }}">

                                    <div class="book-field mb-2">
                                        <img src="{{ asset('/frontend/assets/images/icons/profile.svg') }}" alt="" />
                                        <label>{{ __('Type') }}</label>
                                        <select name="price_type_id" id="price-type" required class="form-control select-time">
                                            @foreach($price_types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('people')
                                        <p class="text-sm text-danger mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-column flex-lg-row align-items-center gap-2 gap-xl-4">
                                        <div class="book-field">
                                            <img src="{{ asset('/frontend/assets/images/icons/calendar-due.svg') }}"
                                                alt="" />
                                            <label>{{ __('CHECK IN') }}</label>
                                            <input id="checkIn" name="check_in" placeholder="{{ __('Add Date') }}" type="text"
                                                value="{{ old('check_in') }}" required />
                                            @error('check_in')
                                                <p class="text-sm text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="book-field">
                                            <img src="{{ asset('/frontend/assets/images/icons/calendar-due.svg') }}"
                                                alt="" />
                                            <label>{{ __('CHECK OUT') }}</label>
                                            <input id="checkOut" name="check_out" placeholder="{{ __('Add Date') }}" type="text"
                                                value="{{ old('check_out') }}" required />
                                            @error('check_out')
                                                <p class="text-sm text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="book-field mt-2 people-form-element">
                                        <img src="{{ asset('/frontend/assets/images/icons/profile.svg') }}"
                                            alt="" />
                                        <label>{{ __('GUESTS') }}</label>
                                        <input type="text" id="people" class="people-input" name="people"
                                            placeholder="{{ __('Add guests') }}" value="{{ old('people') }}" required />
                                        @error('people')
                                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                                        @enderror

                                        <div class="people-dropdown">
                                            <div class="people-dropdown-content">
                                                <div class="people-dropdown-item adults-item" data-item-name="adults">
                                                    <div>
                                                        <div class="item-title">{{ __('Adults') }}</div>
                                                        <div class="item-tagline">{{ __('Ages 13 or above') }}</div>
                                                    </div>
                                                    <div class="item-counters">
                                                        <button type="button" class="item-counter decrement-count"
                                                            data-limit="0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="2" viewBox="0 0 10 2" fill="none">
                                                                <path d="M1 1H9" stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <div class="item-count">0</div>
                                                        <button type="button" class="item-counter increment-count"
                                                            data-limit="16">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="10" viewBox="0 0 10 10" fill="none">
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
                                                        <button type="button" class="item-counter decrement-count"
                                                            data-limit="0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="2" viewBox="0 0 10 2" fill="none">
                                                                <path d="M1 1H9" stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <div class="item-count">0</div>
                                                        <button type="button" class="item-counter increment-count"
                                                            data-limit="15">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="10" viewBox="0 0 10 10" fill="none">
                                                                <path d="M1 5H9M5 1V9" stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    @if(Auth::check())
                                        <button class="button button-pri w-100 mt-4" type="submit">{{ __('Book Now') }}</button>
                                    @else
                                        <button class="button button-pri w-100 mt-4" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('Book Now') }}</button>
                                    @endif

                                    <div class="text">{{ __('You would not be charged yet') }}</div>
                                    <div class="book-price-table">
                                        <div class="book-price-top">
                                            <div class="book-price-item">
                                                <div class="book-price-left">
                                                    ₪{{ $data->price ?? 'N/A' }} x <span id="nights">0</span> {{ __('nights') }}
                                                </div>
                                                <div class="book-price-right">₪<span id="subtotal">0.00</span></div>
                                            </div>
                                            @foreach ($taxes->take(1) as $tax)
                                                <div class="book-price-item">
                                                    <div class="book-price-left">{{ __('Taxes') }} (<span
                                                            id="tax_percent">{{ $tax->tax }}</span>%)</div>
                                                    <div class="book-price-right">
                                                        ₪<span id="tax">0</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="book-price-separator"></div>
                                        <div class="book-price-footer">
                                            <div class="book-price-footer-left">{{ __('Total Included taxes') }}:</div>
                                            <div class="book-price-footer-right">₪<span id="total">0</span></div>
                                        </div>
                                        @if($data->payment_option == 0)
                                            <div class="book-price-separator" id="payment-option"></div>
                                            <div class="book-price-footer" id="payment-option">
                                                <div class="book-price-footer-left">{{ __('Hand cash') }}:</div>
                                                <div class="book-price-footer-right">₪<span id="hash_cash_total">0</span></div>
                                            </div>
                                            <div class="book-price-separator" id="payment-option"></div>
                                            <div class="book-price-footer" id="payment-option">
                                                <div class="book-price-footer-left">{{ __('Online payment for booking') }}:</div>
                                                <div class="book-price-footer-right">₪<span id="online_total">0</span></div>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>

{{--                            <button type="button" class="form-bottom-btn">--}}
{{--                                <img src="{{ asset('/frontend/assets/images/icons/whatsapp.svg') }}" alt="" />--}}
{{--                                <span>WhatsApp </span>--}}
{{--                            </button>--}}
                        </div>
                    </div>
                    {{-- Checkout end --}}
                </div>
                <div class="details-title">{{ __('Customer reviews') }}</div>
                <div class="row mt-5 gx-lg-5">
                    <div class="col-md-5">
                        <div class="rating-title">{{ __('Overall rating') }}</div>
                        <div class="ratings">
                            <div>
                                <!-- Display the average rating dynamically -->
                                <span class="text-rating"><span>{{ number_format($averageRating ?? 0, 1) }} / </span>5</span>
                            </div>
                            <div class="stars">
                                <!-- Loop to display the stars based on the average rating -->
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" id="custom-star"
                                        viewBox="0 0 48 48" fill="none">
                                        <path
                                            d="M16.4865 14.6798L3.72651 16.5298L3.50051 16.5758C3.15839 16.6667 2.8465 16.8467 2.59669 17.0974C2.34689 17.3482 2.16812 17.6608 2.07863 18.0033C1.98915 18.3458 1.99216 18.7059 2.08736 19.0468C2.18256 19.3877 2.36654 19.6973 2.62051 19.9438L11.8645 28.9418L9.68451 41.6518L9.65851 41.8718C9.63757 42.2257 9.71104 42.5787 9.87141 42.8949C10.0318 43.211 10.2733 43.4788 10.5712 43.6709C10.8691 43.863 11.2127 43.9724 11.5668 43.9881C11.9209 44.0037 12.2728 43.9249 12.5865 43.7598L23.9985 37.7598L35.3845 43.7598L35.5845 43.8518C35.9146 43.9819 36.2734 44.0217 36.624 43.9674C36.9746 43.913 37.3045 43.7663 37.5797 43.5424C37.8549 43.3185 38.0656 43.0253 38.1902 42.6931C38.3147 42.3609 38.3487 42.0015 38.2885 41.6518L36.1065 28.9418L45.3545 19.9418L45.5105 19.7718C45.7334 19.4974 45.8795 19.1688 45.9339 18.8194C45.9884 18.4701 45.9494 18.1126 45.8207 17.7833C45.692 17.454 45.4784 17.1647 45.2015 16.9449C44.9246 16.725 44.5944 16.5825 44.2445 16.5318L31.4845 14.6798L25.7805 3.11985C25.6155 2.78491 25.3599 2.50288 25.0429 2.30565C24.7258 2.10843 24.3599 2.00391 23.9865 2.00391C23.6131 2.00391 23.2472 2.10843 22.9301 2.30565C22.6131 2.50288 22.3576 2.78491 22.1925 3.11985L16.4865 14.6798Z"
                                            fill="{{ $i <= round($averageRating ?? 0) ? '#FF8C32' : '#e0e0e0' }}" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <div class="villa-text mt-2">
                            {{ __('based on') }} {{ $allReview->count() }} {{ __('reviews') }}
                        </div>
                    </div>
                </div>


                <div class="row mt-5 gx-xl-5 position-relative">
                    <div class="col-md-5">
                        <div class="rating-title">{{ __('Filter') }}:</div>
                        <div class="filter-container mt-4">
                            <div class="rating-title">{{ __('By star rating') }}</div>
                            <div class="my-2">
                                @foreach (range(5, 1) as $rating)
                                    <label class="checkbox my-1">
                                        <input type="checkbox" class="rating-checkbox" name="rating"
                                               value="{{ $rating }}">
                                        <span class="checkbox-mark"></span>
                                        <span class="rating-stars">
                                            @for ($i = 0; $i < $rating; $i++)
                                                <img src="{{ asset('/frontend/assets/images/icons/small-star.svg') }}" alt="star">
                                            @endfor
                                            @for ($i = $rating; $i < 5; $i++)
                                                <img src="{{ asset('/frontend/assets/images/icons/small-none-star.svg') }}" alt="none star">
                                            @endfor
                                        </span>
                                        <span class="ml-2">({{ $starCounts[$rating] }})</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="review-search">
                            <div>

                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="villa-review-items">
                            @if ($reviews->count() > 0)
                                @foreach ($reviews as $review)
                                    <div class="villa-review-item">
                                        <div class="top">
                                            <div class="review-stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <img src="{{ asset($i <= $review->rating ? '/frontend/assets/images/icons/mid-star.svg' : '/frontend/assets/images/icons/mid-none-star.svg') }}" alt="star">
                                                @endfor
                                            </div>
                                            <div class="time">{{ $review->created_at->format('m/d/y') }}</div>
                                        </div>
                                        <div class="author">
                                            <figure>
                                                <img src="{{ $review->user->avatar ? asset($review->user->avatar) : asset('/frontend/assets/images/client-1.png') }}"
                                                     alt="author">
                                            </figure>
                                            <div>
                                                <div class="name">{{ $review->user->name ?? 'Anonymous' }}</div>
                                                <div class="tagline">
                                                    {{ $review->villa->title ?? 'Verified Booking' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-details">
                                            {{ $review->comment }}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="no-reviews-found text-center py-4">
                                    @if (request('rating'))
                                        <p>No {{ request('rating') }}-{{ __('star reviews found') }}</p>
                                        <a href="{{ request()->fullUrlWithQuery(['rating' => null]) }}"
                                           class="btn btn-outline-secondary mt-2">
                                           {{ __('Show All Reviews') }}
                                        </a>
                                    @else
                                        <p>{{ __('No reviews found.') }}</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- related items section start -->
        <section class="section container">
            <div class="section-box">
                <h2 class="section-title">{{ __('You might also like') }}</h2>
            </div>
            <div class="related-items">

                @foreach ($villas as $villa)
                    <div class="villa-item">
                        <div class="villa-item-top">
                            <div class="tag">{{ __('For Rent') }}</div>
                            <!-- villa bookmark -->
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
                                <img src="{{ asset($villa->villa_images->first()->image ?? '') }}" alt="Item image" />
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
                                    <span>{{ number_format($villa->average_rating, 1) }}</span>
                                    <span class="reviews">({{ $villa->reviews->count() }})</span>
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
                                    href="{{ route('villas.details', ['slug' => $villa->slug]) }}">
                                    <span>
                                        {{ __('view details') }}
                                    </span>
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
        </section>
        <!-- related items section end -->

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
    <!-- main section end -->
@endsection

@push('scripts')

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function () {
            const priceTypeSelect = document.getElementById("price-type");
            const dayPriceElement = document.getElementById("day_price");

            // Store prices as strings to prevent calculation issues
            const prices = {
                1: "{{ number_format($data->price ?? 0, 2) }}",
                2: "{{ number_format($data->price_two ?? 0, 2) }}",
                3: "{{ number_format($data->price_three ?? 0, 2) }}",
                4: "{{ number_format($data->price_four ?? 0, 2) }}"
            };

            // Change price when selecting price type
            priceTypeSelect.addEventListener("change", function () {
                const selectedValue = this.value;
                dayPriceElement.textContent = prices[selectedValue] ?? "0.00"; // Default to "0.00"

                // Reset all calculated values
                resetCalculations();
            });
        });

        function resetCalculations(){
            // If dates are invalid or check-out is before check-in, reset the nights
            night.innerHTML = 0;
            subtotal.innerHTML = '0.00';
            total.innerHTML = '0.00';
            taxElement.innerHTML = '0.00';
            hashCashTotal.innerHTML = '0.00';
            onlineTotal.innerHTML = '0.00';
        }

        // Variables
        const dayPrice = document.getElementById("day_price");
        const checkIn = document.getElementById("checkIn");
        const checkOut = document.getElementById("checkOut");
        const night = document.getElementById("nights");
        const price = document.getElementById("day_price");
        const subtotal = document.getElementById("subtotal");
        const taxPercentElement = document.getElementById("tax_percent");
        const taxElement = document.getElementById("tax");
        const totalElement = document.getElementById("total");
        const onlineTotal = document.getElementById("online_total");
        const hashCashTotal = document.getElementById("hash_cash_total");
        const paymentOptionDiv = document.getElementById("payment-option");
        const paymentOption = {{ $data->payment_option }};

        // Event listener for changes in Check-Out or Check-In date
        // checkIn.addEventListener("change", displayNight);
        checkOut.addEventListener("change", displayNight);

        // Function to calculate the number of nights between check-in and check-out
        function displayNight() {
            const checkInDate = new Date(checkIn.value);
            const checkOutDate = new Date(checkOut.value);

            // Ensure price is a number and correctly fetched
            const priceValue = parseFloat(price.textContent.replace(/,/g, '')) || parseFloat(price.innerText.replace(/,/g, ''));

            // Ensure taxPercent is a number and correctly fetched
            const taxPercent = parseFloat(taxPercentElement.textContent.replace(/,/g, '')) || parseFloat(taxPercentElement.innerText.replace(/,/g, ''));


            // Ensure both dates are valid and check-out is after or same as check-in
            if (checkInDate && checkOutDate && checkOutDate >= checkInDate) {
                // Calculate the difference in time
                const timeDiff = checkOutDate - checkInDate;

                // Calculate the number of nights (days)
                let nights = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

                // If the same day is selected for both check-in and check-out, set nights to 1
                if (nights === 0) {
                    nights = 1;
                }

                // Display the number of nights
                night.innerHTML = nights;

                // Calculate the subtotal (nights * price per night)
                const subtotalCalculation = nights * priceValue;

                // Update the subtotal on the page
                subtotal.innerHTML = subtotalCalculation.toFixed(2);

                // Calculate the tax amount
                const taxAmount = (subtotalCalculation * taxPercent) / 100;

                // Update the tax amount on the page
                taxElement.innerText = taxAmount.toFixed(2);

                // Calculate the total (subtotal + tax)
                const totalCalculation = subtotalCalculation + taxAmount;

                // Update the total on the page
                totalElement.innerHTML = totalCalculation.toFixed(2);

                if (paymentOption === 0){
                    const hashCashTotalAmount = subtotalCalculation * 0.85;

                    // Update the total on the page
                    hashCashTotal.innerHTML = hashCashTotalAmount.toFixed(2);

                    const onlineTotalAmount = totalCalculation - hashCashTotalAmount;

                    // Update the total on the page
                    onlineTotal.innerHTML = onlineTotalAmount.toFixed(2);

                }else{
                    // Hide the payment option section if paymentOption is 1
                    paymentOptionDiv.style.display = 'none';
                }

            } else {
                resetCalculations();
            }
        }
    </script>

    <script type="text/javascript">
        const checkInElement = document.getElementById('checkIn');
        const checkOutElement = document.getElementById('checkOut');

        // Fetch the data passed from PHP to JavaScript
        const offDates = @json($data->dateOffs->pluck('off_date')->toArray());
        const checkInDate = @json($data->bookings->pluck('check_in_date')->toArray());
        const checkOutDate = @json($data->bookings->pluck('check_out_date')->toArray());

        // Function to format date as YYYY-MM-DD
        function formatDate(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Add leading zero for month
            const day = String(date.getDate()).padStart(2, '0'); // Add leading zero for day
            return `${year}-${month}-${day}`;
        }

        // Combine offDates and bookings into bookedDates
        const bookedDates = [
            // Convert offDates to easepick.DateTime objects
            ...offDates.map(date => new easepick.DateTime(date)),

            // Convert bookings to date ranges (check-in and check-out)
            ...checkInDate.map((date, index) => [
                new easepick.DateTime(date), // check-in date
                new easepick.DateTime(checkOutDate[index]) // check-out date
            ])
        ];

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

        const checkInDatePicker = new easepick.create({
            element: checkInElement,
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
                elementEnd: checkOutElement,
            },
            lang: currentLocale === "ar" ? 'ar' : 'en',
            LockPlugin: {
                selectForward: true,
                minDate: new Date(),
                minDays: 1,
                inseparable: true,
                filter(date, picked) {
                    if (picked.length === 1) {
                        const incl = date.isBefore(picked[0]) ? '[)' : '(]';
                        return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
                    }
                    return date.inArray(bookedDates, '[)');
                },
            },
            setup(picker) {
                picker.on('show', () => {
                    const container = picker.ui.container;
                    const htmlElement = document.documentElement
                    const dirAttr = htmlElement.getAttribute("dir")
                    // Update language dynamically based on the current locale (language)
                    checkInDatePicker.options.lang = dirAttr === "ltr" ? "en" : "ar";
                    container.classList.add(dirAttr === "ltr" ? 'md-ltr-right-aligned' : "");
                });
                picker.on('select', (e) => {
                    const {
                        view,
                        date,
                        target
                    } = e.detail;
                    const changeEvent = new Event("change", {
                        bubbles: false,
                        cancelable: false
                    });
                    checkOutElement.dispatchEvent(changeEvent);
                });
            },
        });

        // Reset both date pickers when price type changes
        const priceTypeSelect = document.getElementById("price-type");

        priceTypeSelect.addEventListener("change", function () {
            // Reset both check-in and check-out date pickers
            checkInDatePicker.clear();
            checkOutElement.value = ''; // Reset check-out date field

            // Optionally, you can also reset the check-in date picker to its initial state
            checkInElement.value = ''; // Reset check-in date field
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

    {{-- rating star wise filter start --}}
    <script>
        $(document).on('change', '.rating-checkbox', function() {
            // Uncheck other checkboxes
            $('.rating-checkbox').not(this).prop('checked', false);

            let selectedRating = $(this).val();
            let villaSlug = "{{ $data->slug }}";  // Get the villa slug dynamically
            let url = "{{ route('reviews.filter', ':slug') }}".replace(':slug', villaSlug);

            // Set the base URL for your images
            let fullStarUrl = "{{ asset('/frontend/assets/images/icons/mid-star.svg') }}";
            let emptyStarUrl = "{{ asset('/frontend/assets/images/icons/mid-none-star.svg') }}";

            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    rating: selectedRating,
                },
                success: function(response) {
                    let reviewsContainer = $('.villa-review-items');
                    reviewsContainer.empty();

                    if (response.reviews.length > 0) {
                        response.reviews.forEach(review => {
                            let stars = '';
                            // Loop through and display the rating as images
                            for (let i = 1; i <= 5; i++) {
                                let starImage = i <= review.rating
                                    ? `<img src="${fullStarUrl}" alt="star">`
                                    : `<img src="${emptyStarUrl}" alt="none star">`;
                                stars += starImage;
                            }

                            let reviewHTML = `
                        <div class="villa-review-item">
                            <div class="top">
                                <div class="review-stars">${stars}</div>
                                <div class="time">${new Date(review.created_at).toLocaleDateString()}</div>
                            </div>
                            <div class="author">
                                <figure>
                                    <img src="${review.user.avatar ? review.user.avatar : '/frontend/assets/images/client-1.png'}" alt="author">
                                </figure>
                                <div>
                                    <div class="name">${review.user.name || 'Anonymous'}</div>
                                    <div class="tagline">${review.villa.title || 'Verified Booking'}</div>
                                </div>
                            </div>
                            <div class="review-details">${review.comment}</div>
                        </div>
                    `;

                            reviewsContainer.append(reviewHTML);
                        });
                    } else {
                        reviewsContainer.html(
                            `<div class="no-reviews-found text-center py-4">No reviews found.</div>`
                        );
                    }
                },
                error: function() {
                    showErrorToast('t-error', 'Failed to load reviews.');
                }
            });
        });
    </script>

    {{-- rating star wise filter start --}}
@endpush
