@extends('frontend.app')

@section('title', 'Loyalty Page')

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
        width: 0px;
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
</style>
@endpush

@section('content')

    @php
        // Filter the collection to get the CMS entry with id = 4
        $cmsNew = $cms->where('id', 4)->first(); // Use first() instead of get()
        $banner_image = $cmsNew ? $cmsNew->banner_image : null; // Ensure cmsHeroBanner is not null
        $banner_title = $cmsNew ? $cmsNew->banner_title : null; // Ensure cmsHeroBanner is not null
        $sub_title = $cmsNew ? $cmsNew->sub_title : null; // Ensure cmsHeroBanner is not null
        $bottom_image = $cmsNew ? $cmsNew->page_image : null; // Ensure cmsHeroBanner is not null
        $bottom_title = $cmsNew ? $cmsNew->page_title : null; // Ensure cmsHeroBanner is not null
        $button_title = $cmsNew ? $cmsNew->button_title : null; // Ensure cmsHeroBanner is not null
        $button_url = $cmsNew ? $cmsNew->button_url : null; // Ensure cmsHeroBanner is not null
    @endphp

    <!-- main Section Start -->
    <main>
        <!-- Hero start -->
        <section class="hero-sec" style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/loyality-banner-bg.png') }}')">
            <div class="overlay"></div>
            <div class="container">
                <div class="hero-content">
                    <div class="banner-breadcrumb">
                        <a href="{{ route('home') }}" class="banner-breadcrumb-item">
                            {{ __('Home') }}
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                                fill="white" />
                        </svg>
                        <a href="{{ route('loyalty') }}" class="banner-breadcrumb-item">
                            {{ __('Loyalty Program') }}
                        </a>
                    </div>
                    <h1 class="hero-title-pri loyalty-hero-title">
                        @if ($banner_title)
                            {{ $banner_title }}
                        @else
                        {{ __('Join our loyalty program and Earn exclusive rewards') }}
                        @endif
                    </h1>
                    <p class="hero-lower-title">
                        @if ($sub_title)
                            {{ $sub_title }}
                        @else
                        {{ __('Earn points every time you book and enjoy exclusive benefits.') }}

                        @endif
                    </p>
                    @if(Auth::check())
                        <a href="{{ route('user.loyalty.points') }}" class="button button-pri" >
                            {{ __('Loyalty Point') }}
                        </a>
                    @else
                        <button class="button button-pri" data-bs-toggle="modal" data-bs-target="#registerModal">
                            {{ __('Sign up – it is free') }}
                        </button>
                    @endif
                </div>
            </div>
        </section>
        <!-- Hero end -->

        <!-- join-benefits start -->
        <section class="join-benefits container section">
            <div class="join-benefits-container">
                <div class="join-benefits-left flex-shrink-0">
                    <figure class="join-benefits-imgae-container">
                        <img src="{{ isset($benefitsOfJoining) && $benefitsOfJoining->image ? asset($benefitsOfJoining->image) : asset('frontend/assets/images/loyality-join-benefit.png') }}"
                            class="join-benefits-imgae" alt="" />
                    </figure>
                </div>

                <div class="join-benefits-right flex-shrink-0">
                    <h3 class="section-title">
                        @if (isset($benefitsOfJoining) && !empty($benefitsOfJoining->title))
                            {{ $benefitsOfJoining->title }}
                        @else
                        {{ __('Benefits of joining') }}
                        @endif
                    </h3>
                    <p class="section-title-description">
                        @if (isset($benefitsOfJoining) && !empty($benefitsOfJoining->sub_title))
                            {{ $benefitsOfJoining->sub_title }}
                        @else
                        {{ __('Join our Rewards Program to earn points with every booking. Enjoy exclusive discounts, priority booking, and special offers. Sign up now to enhance your travel experience with amazing rewards!') }}
                        @endif
                    </p>
                    <div class="benefits">
                        <div class="benefit">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                    fill="none">
                                    <g clip-path="url(#clip0_13134_22830)">
                                        <path
                                            d="M6.375 13.1562C5.98706 13.1562 5.67188 13.4714 5.67188 13.8594V16.6719C5.67188 17.0598 5.98706 17.375 6.375 17.375C6.76294 17.375 7.07812 17.0598 7.07812 16.6719V13.8594C7.07812 13.4714 6.76294 13.1562 6.375 13.1562ZM12 4.71875C11.6121 4.71875 11.2969 5.03394 11.2969 5.42188V8.23438C11.2969 8.62231 11.6121 8.9375 12 8.9375C12.3879 8.9375 12.7031 8.62231 12.7031 8.23438V5.42188C12.7031 5.03394 12.3879 4.71875 12 4.71875Z"
                                            fill="#1E84FE" />
                                        <path
                                            d="M20.4375 0.5H3.5625C2.39934 0.5 1.45312 1.44622 1.45312 2.60938V24.5L12 21.6219L22.5469 24.5V2.60938C22.5469 1.44622 21.6007 0.5 20.4375 0.5ZM15.5156 3.3125H16.9219V4.71875H15.5156V3.3125ZM8.48438 16.6719C8.48438 17.835 7.53816 18.7812 6.375 18.7812C5.21184 18.7812 4.26562 17.835 4.26562 16.6719V13.8594C4.26562 12.6962 5.21184 11.75 6.375 11.75C7.53816 11.75 8.48438 12.6962 8.48438 13.8594V16.6719ZM8.48438 4.71875H5.67188V6.125H6.375C7.53816 6.125 8.48438 7.07122 8.48438 8.23438C8.48438 9.39753 7.53816 10.3438 6.375 10.3438H4.26562V8.9375H6.375C6.76294 8.9375 7.07812 8.62231 7.07812 8.23438C7.07812 7.84644 6.76294 7.53125 6.375 7.53125H4.26562V3.3125H8.48438V4.71875ZM14.1094 13.1562H11.2969V14.5625H14.1094V15.9688H11.2969V18.0781H9.89062V11.75H14.1094V13.1562ZM14.1094 8.23438C14.1094 9.39753 13.1632 10.3438 12 10.3438C10.8368 10.3438 9.89062 9.39753 9.89062 8.23438V5.42188C9.89062 4.25872 10.8368 3.3125 12 3.3125C13.1632 3.3125 14.1094 4.25872 14.1094 5.42188V8.23438ZM19.7344 13.1562H16.9219V14.5625H19.7344V15.9688H16.9219V18.0781H15.5156V11.75H19.7344V13.1562ZM19.7344 10.3438H18.3281V8.9375H19.7344V10.3438ZM16.5332 10.5841L15.2753 9.95511L18.7168 3.07217L19.9747 3.70114L16.5332 10.5841Z"
                                            fill="#1E84FE" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_13134_22830">
                                            <rect width="24" height="24" fill="white"
                                                transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="">
                                <p>
                                    @if (isset($benefitsOfJoining->title_two) && !empty($benefitsOfJoining->title_two))
                                        {{ $benefitsOfJoining->title_two }}
                                    @else
                                    {{ __('Discount') }}
                                    @endif

                                </p>
                            </div>
                        </div>
                        <div class="benefit">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="33" viewBox="0 0 24 33"
                                    fill="none">
                                    <path
                                        d="M19.0647 1.46875H4.93538C2.214 1.46875 0 4.42075 0 8.04925C0 11.6953 2.23702 14.6298 4.90594 14.6298H7.12266V9.47388C7.12266 7.16488 8.53148 5.28638 10.2632 5.28638H10.27C11.9981 5.29131 13.4039 7.16981 13.4039 9.47388V14.6298H19.0647C21.786 14.6298 24 11.6777 24 8.04925C24 4.42075 21.786 1.46875 19.0647 1.46875ZM20.4613 7.13163L17.6488 10.8816C17.3742 11.2478 16.929 11.2478 16.6544 10.8816L15.2482 9.00663C14.9736 8.6405 14.9736 8.04694 15.2482 7.68081C15.5227 7.31469 15.9679 7.31469 16.2425 7.68081L17.1516 8.89287L19.467 5.80581C19.7415 5.43969 20.1867 5.43969 20.4613 5.80581C20.7359 6.17194 20.7359 6.76556 20.4613 7.13163Z"
                                        fill="#1E84FE" />
                                    <path
                                        d="M16.5248 17.268L11.9984 16.6406V9.47364C11.9984 8.19839 11.2242 7.16389 10.2677 7.16114C9.30843 7.15839 8.52965 8.19451 8.52965 9.47364V21.4686H8.5139L6.80188 19.5623C6.07977 18.7583 5.00221 18.9091 4.42096 19.8954C3.86357 20.8413 3.9712 22.2066 4.66387 22.9773L8.13885 26.8436H18.3734V20.0588C18.3734 18.64 17.5807 17.4433 16.5248 17.268ZM8.5296 30.5936C8.5296 31.1113 8.84441 31.5311 9.23273 31.5311H17.6702C18.0585 31.5311 18.3734 31.1113 18.3734 30.5936V28.7186H8.5296V30.5936Z"
                                        fill="#1E84FE" />
                                </svg>
                            </div>
                            <div class="">
                                <p>
                                    @if (isset($benefitsOfJoining->title_three) && !empty($benefitsOfJoining->title_three))
                                        {{ $benefitsOfJoining->title_three }}
                                    @else
                                    {{ __('Priority booking') }}
                                    @endif

                                </p>
                            </div>
                        </div>
                        <div class="benefit">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33"
                                    fill="none">
                                    <path
                                        d="M28.6499 16.878C28.592 16.7605 28.5618 16.6311 28.5618 16.5001C28.5618 16.369 28.592 16.2397 28.6499 16.1221L29.7382 13.8957C30.3442 12.656 29.8641 11.1785 28.6452 10.5318L26.4561 9.37028C26.3401 9.30922 26.2398 9.22232 26.1627 9.11629C26.0857 9.01027 26.034 8.88796 26.0118 8.7588L25.5837 6.31784C25.3453 4.95879 24.0881 4.04553 22.7222 4.2388L20.2684 4.58588C20.1387 4.60463 20.0064 4.59332 19.8818 4.55281C19.7572 4.51231 19.6435 4.44369 19.5496 4.35227L17.7685 2.62925C16.7768 1.66983 15.2231 1.66978 14.2314 2.62925L12.4503 4.35244C12.3564 4.44384 12.2427 4.51244 12.1181 4.55295C11.9934 4.59345 11.8612 4.60478 11.7314 4.58605L9.27773 4.23897C7.91132 4.04559 6.65462 4.95896 6.41622 6.31802L5.98809 8.75886C5.96584 8.88801 5.9142 9.01033 5.83717 9.11636C5.76014 9.22239 5.65978 9.30931 5.54383 9.37039L3.35473 10.5319C2.13587 11.1786 1.65576 12.6562 2.26171 13.8959L3.34999 16.1222C3.40792 16.2398 3.43805 16.3691 3.43805 16.5002C3.43805 16.6313 3.40792 16.7606 3.34999 16.8781L2.26166 19.1045C1.65571 20.3442 2.13581 21.8217 3.35467 22.4684L5.54377 23.6299C5.65973 23.691 5.76011 23.7779 5.83715 23.8839C5.91419 23.9899 5.96583 24.1123 5.98809 24.2414L6.41622 26.6824C6.63325 27.9196 7.69412 28.7872 8.91337 28.7871C9.03345 28.7871 9.15531 28.7787 9.27778 28.7614L11.7315 28.4143C11.8612 28.3955 11.9935 28.4068 12.1182 28.4473C12.2428 28.4878 12.3565 28.5565 12.4504 28.6479L14.2314 30.3709C14.7274 30.8507 15.3636 31.0905 15.9999 31.0904C16.6362 31.0904 17.2727 30.8506 17.7684 30.3709L19.5496 28.6479C19.7418 28.462 20.0037 28.3771 20.2684 28.4143L22.7222 28.7614C24.0887 28.9547 25.3453 28.0414 25.5837 26.6823L26.0119 24.2415C26.0341 24.1123 26.0857 23.99 26.1628 23.884C26.2398 23.7779 26.3402 23.691 26.4561 23.6299L28.6452 22.4684C29.8641 21.8218 30.3442 20.3441 29.7382 19.1045L28.6499 16.878ZM12.6339 8.92653C14.3352 8.92653 15.7194 10.3107 15.7194 12.0121C15.7194 13.7134 14.3352 15.0976 12.6339 15.0976C10.9325 15.0976 9.54833 13.7134 9.54833 12.0121C9.54833 10.3107 10.9325 8.92653 12.6339 8.92653ZM11.0413 22.6487C10.877 22.8131 10.6616 22.8952 10.4463 22.8952C10.2309 22.8952 10.0155 22.8131 9.85125 22.6487C9.52263 22.3201 9.52263 21.7873 9.85125 21.4587L20.9586 10.3514C21.2871 10.0227 21.82 10.0227 22.1486 10.3514C22.4773 10.68 22.4773 11.2128 22.1486 11.5414L11.0413 22.6487ZM19.3659 24.0737C17.6645 24.0737 16.2803 22.6895 16.2803 20.9881C16.2803 19.2868 17.6645 17.9026 19.3659 17.9026C21.0672 17.9026 22.4514 19.2868 22.4514 20.9881C22.4514 22.6895 21.0672 24.0737 19.3659 24.0737Z"
                                        fill="#1E84FE" />
                                    <path
                                        d="M19.365 19.5855C18.5916 19.5855 17.9624 20.2146 17.9624 20.988C17.9624 21.7613 18.5916 22.3905 19.365 22.3905C20.1383 22.3905 20.7675 21.7613 20.7675 20.988C20.7675 20.2146 20.1383 19.5855 19.365 19.5855ZM12.633 10.6094C11.8596 10.6094 11.2305 11.2385 11.2305 12.0119C11.2305 12.7852 11.8596 13.4144 12.633 13.4144C13.4063 13.4144 14.0355 12.7853 14.0355 12.0119C14.0354 11.2386 13.4063 10.6094 12.633 10.6094Z"
                                        fill="#1E84FE" />
                                </svg>
                            </div>
                            <div class="">
                                <p>
                                    @if (isset($benefitsOfJoining->title_four) && !empty($benefitsOfJoining->title_four))
                                        {{ $benefitsOfJoining->title_four }}
                                    @else
                                    {{ __('Special offers') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- join-benefits end -->

        <!-- earn-points start -->
        <section class="earn-points-section container">
            <h3 class="section-title"> {{ __('How to earn points') }}</h3>
            <p class="section-title-description w-60">
                {{ __('Join our Rewards Program to earn points with every booking. Enjoy exclusive discounts, priority booking, and special offers. Sign up now to enhance your travel experience with amazing rewards!') }}
            </p>
            <div class="earn-points">
                <div class="earn-point">
                    <div class="earn-point-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            fill="none">
                            <g clip-path="url(#clip0_13134_22859)">
                                <path
                                    d="M25.4196 0.96875H6.5805C2.952 0.96875 0 3.92075 0 7.54925C0 11.1953 2.98269 14.1298 6.54125 14.1298H9.49687V8.97388C9.49687 6.66488 11.3753 4.78638 13.6842 4.78638H13.6934C15.9974 4.79131 17.8719 6.66981 17.8719 8.97388V14.1298H25.4196C29.0481 14.1298 32 11.1777 32 7.54925C32 3.92075 29.0481 0.96875 25.4196 0.96875ZM27.2817 6.63163L23.5317 10.3816C23.1656 10.7478 22.572 10.7478 22.2059 10.3816L20.3309 8.50663C19.9648 8.1405 19.9648 7.54694 20.3309 7.18081C20.6969 6.81469 21.2906 6.81469 21.6567 7.18081L22.8688 8.39287L25.9559 5.30581C26.322 4.93969 26.9156 4.93969 27.2817 5.30581C27.6478 5.67194 27.6478 6.26556 27.2817 6.63163Z"
                                    fill="#1E84FE" />
                                <path
                                    d="M22.0317 16.768L15.9966 16.1406V8.97364C15.9966 7.69839 14.9643 6.66389 13.689 6.66114C12.4099 6.65839 11.3716 7.69451 11.3716 8.97364V20.9686H11.3506L9.06787 19.0623C8.10506 18.2583 6.66831 18.4091 5.89331 19.3954C5.15013 20.3413 5.29363 21.7066 6.21719 22.4773L10.8505 26.3436H24.4965V19.5588C24.4965 18.14 23.4397 16.9433 22.0317 16.768ZM11.3715 30.0936C11.3715 30.6113 11.7912 31.0311 12.309 31.0311H23.559C24.0767 31.0311 24.4965 30.6113 24.4965 30.0936V28.2186H11.3715V30.0936Z"
                                    fill="#1E84FE" />
                            </g>
                            <defs>
                                <clipPath id="clip0_13134_22859">
                                    <rect width="32" height="32" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <h5 class="section-title-sec"> {{ __('Book a stay') }}</h5>
                    </div>
                    <p> {{ __('Earn points for every successful booking.') }}</p>
                </div>
            </div>
            @if(Auth::check())
                <a href="{{ route('user.loyalty.points') }}" class="button button-pri">
                    {{ __('Loyalty Point') }}
                </a>
            @else
                <button class="button button-pri" data-bs-toggle="modal" data-bs-target="#registerModal">
                    {{ __('Sign up – it is free') }}
                </button>
            @endif
        </section>
        <!-- earn-points end -->

        <!-- testimonial section start -->
        @if ($reviews->count() > 0)
            <!-- testimonial section start -->
            <section class="section container">
                <div class="section-box">
                    <h2 class="section-title"> {{ __('What our guests are saying') }}</h2>
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
                        <div class="testimonial-item flex-column h-100 d-flex " dir="ltr">
                            <div>
                                <div class="testimonial-header">
                                    <figure class="client-img">
                                        <img src="{{ $review->user->avatar ? asset($review->user->avatar) : asset('/frontend/assets/images/client-1.png') }}"
                                            alt="Client image" />
                                    </figure>
                                    <div class="client-details">
                                        <div class="client-name">{{ $review->user->name ?? 'Anonymous' }}</div>
                                        <div class="client-job">{{ __('Villa') }}: {{ $review->villa->title }}</div>
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
        <!-- testimonial section end -->

        <!-- rewards start -->
        <section class="rewards-section container section">
            <h2 class="section-title">{{ __('Rewards catalog') }}</h2>
            <div class="rewards-cards">
                <div class="rewards-card">
                    <figure class="rewards-card-image">
                        <img src="{{ asset('/frontend/assets/images/reward-img-1.png') }}" alt="" />
                    </figure>
                    <div class="reward-card-content">
                        <h4 class="section-title-sec">{{ __('Free night stay') }}</h4>
                        <p>{{ __('Use Points') }}</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                @if(Auth::check())
                    <a href="{{ route('user.loyalty.points') }}" class="button button-pri text-center">
                        {{ __('Loyalty Point') }}
                    </a>
                @else
                    <button class="button button-pri text-center" data-bs-toggle="modal" data-bs-target="#registerModal">
                        {{ __('Sign up – it is free') }}
                    </button>
                @endif
            </div>
        </section>
        <!-- rewards end -->

        @if($faqs->count() > 0 )
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
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="faq{{ $faq->id }}">
                                    {{ $loop->iteration }}. {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
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
    </main>
    <!-- main Section end -->

@endsection

@push('scripts')
@endpush
