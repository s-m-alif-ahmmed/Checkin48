@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ asset($systemSetting->logo ?? 'frontend/eVento_logo.png') }}"
                    class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset($systemSetting->favcion ?? 'frontend/eVento_Favicon.png') }}"
                    class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset($systemSetting->favicon ?? 'frontend/eVento_Favicon.png') }}"
                    class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset($systemSetting->logo ?? 'frontend/eVento_logo.png') }}"
                    class="header-brand-img light-logo1" alt="logo">
            </a>
        </div>

        <div class="main-sidemenu" style="margin-bottom: 100px;">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>

            <ul class="side-menu">

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z" />
                        </svg>
                        <span class="side-menu__label">Back To Home</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z" />
                        </svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('user.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="side-menu__label">Users</span>
                    </a>
                </li>

                <li class="slide {{ request()->is('admin/faq*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/faq*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('faq.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                            viewBox="0 0 512 512">
                            <path
                                d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3l58.3 0c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24l0-13.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1l-58.3 0c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                        </svg>
                        <span class="side-menu__label">Faq's</span>
                    </a>
                </li>

                <li class="slide {{ request()->is('admin/country-management*') ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->is('admin/country-management*') ? 'active is-expanded' : '' }}"
                       data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 512 512">
                            <path
                                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                        </svg>
                        <span class="side-menu__label">Country Management</span><i class="angle fa fa-angle-right"></i>
                    </a>

                    <ul class="slide-menu">
                        <li><a href="{{ route('country.index') }}" class="slide-item {{ request()->is('admin/country-management/country*') ? 'active' : '' }}">Countries</a></li>
                        <li><a href="{{ route('city.index') }}" class="slide-item {{ request()->is('admin/country-management/city*') ? 'active' : '' }}">Cities</a></li>
                        <li><a href="{{ route('state.index') }}" class="slide-item {{ request()->is('admin/country-management/state*') ? 'active' : '' }}">States</a></li>
                    </ul>
                </li>

                {{-- why choose us start --}}
                <li class="slide {{ request()->is('admin/why-choose-us*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/why-choose-us*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ route('why-choose-us.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                            viewBox="0 0 512 512">
                            <path
                                d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3l58.3 0c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24l0-13.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1l-58.3 0c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                        </svg>
                        <span class="side-menu__label">Why Choose Us</span>
                    </a>
                </li>
                 {{-- why choose us start --}}

                {{-- why choose our villa start --}}
                <li class="slide {{ request()->is('admin/why-choose-villa*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/why-choose-villa*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ route('why-choose-villa.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                            viewBox="0 0 512 512">
                            <path
                                d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3l58.3 0c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24l0-13.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1l-58.3 0c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                        </svg>
                        <span class="side-menu__label">Why Choose Our Villas</span>
                    </a>
                </li>
                {{-- why choose our villa end --}}

                {{-- our mission start --}}
                <li class="slide {{ request()->is('admin/our-mission*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/our-mission*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ route('our-mission.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                            viewBox="0 0 512 512">
                            <path
                                d="M256 448a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm-64 0a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm192 0a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM320 416a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM416 272a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM320 272a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM256 320a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM192 272a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM128 272a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM0 272a32 32 0 1 1 0-64 32 32 0 1 1 0 64z" />
                        </svg>
                        <span class="side-menu__label">Our Mission</span>
                    </a>
                </li>
                {{-- our mission end --}}

                {{-- our client start --}}
                <li class="slide {{ request()->is('admin/our-clients*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/our-clients*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ route('our-clients.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                            viewBox="0 0 512 512">
                            <path
                                d="M256 448a192 192 0 1 0 192-192 192 192 0 0 0 -192 192zm0-64a64 64 0 1 1 0-128 64 64 0 0 1 0 128zm0-96a32 32 0 1 1 0-64 32 32 0 0 1 0 64z" />
                        </svg>
                        <span class="side-menu__label">Our Clients</span>
                    </a>
                </li>
                {{-- our client end --}}

                {{-- our Expert start --}}
                <li class="slide {{ request()->is('admin/expert-team*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/expert-team*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ route('expert-team.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4zm0 14a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm0-2a6 6 0 1 1 0-12a6 6 0 0 1 0 12z" />
                        </svg>
                        <span class="side-menu__label">Our Experts</span>
                    </a>
                </li>
                {{-- our Expert end --}}

                {{-- Benefits of joining start --}}
                <li class="slide {{ request()->is('admin/benefits-of-joining*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/benefits-of-joining*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ route('benefits-of-joining.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-6 14h-2v-2h2v2zm0-4h-2V7h2v6z" />
                        </svg>
                        <span class="side-menu__label">Benefits of joining</span>
                    </a>
                </li>
                {{-- Benefits of joining end --}}

                {{-- topbar start --}}
                <li class="slide {{ request()->is('admin/top-bar*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('admin/top-bar*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ route('top-bar.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        <span class="side-menu__label">Top Bar</span>
                    </a>
                </li>
                {{-- topbar end --}}
                {{-- newsletter start --}}
                <li class="slide {{ request()->is('news.letter.index*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('news.letter.index*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href='{{route('news.letter.index')}}'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1 0 2-.5 2-1V2c0-1-.5-2-2-2H4c-1 0-2 .5-2 1v2c0 1 .5 2 2 2zm2 4h12v10l-4-4-4 4V8zm-2 0v10l4-4 4 4V8z"/></svg>
                        <span class="side-menu__label">Newsletter</span>
                    </a>
                </li>
                {{-- newsletter end --}}
                {{-- reviews start --}}
                <li class="slide {{ request()->is('reviews.index*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('reviews.index*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href='{{route('reviews.index')}}'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 2L7 8 3 8 3 2 7 2zm0 10l4 4 4-4M3 18h18" /></svg>
                        <span class="side-menu__label">Reviews</span>
                    </a>
                </li>
                {{-- reviews end --}}
                {{-- bookings start --}}
                <li class="slide {{ request()->is('bookings.index*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('bookings.index*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href='{{route('bookings.index')}}'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L12 6 17 6 17 12 12 12 12 2zM7 2L7 6 2 6 2 12 7 12 7 2zM9 2L9 6 4 6 4 12 9 12 9 2z"/></svg>
                        <span class="side-menu__label">Bookings</span>
                    </a>
                </li>
                {{-- bookings end --}}
                {{-- bookings start --}}
                <li class="slide {{ request()->is('withdraw.index*') ? 'active' : '' }}">
                    <a class="side-menu__item has-link {{ request()->is('withdraw.index*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href='{{route('withdraw.index')}}'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 1v2M12 21v2M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14zM12 5v14M8 10h8"/>
                          </svg>

                        <span class="side-menu__label">Withdraw Request</span>
                    </a>
                </li>
                {{-- bookings end --}}

                <hr>
                {{-- villa property , amenities start --}}
                <li class="slide {{ request()->is('villas.index || property.levels.index || amenities.index || room.types.index || taxes.index || price.types.index ') ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->is('property.levels.index || amenities.index || room.types.index || taxes.index || price.types.index ') ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2zM8 9h8v10H8V9z"/></svg>
                        <span class="side-menu__label">Villa Relates</span><i class="angle fa fa-angle-right"></i>
                    </a>

                    <ul class="slide-menu">
                        <li><a href="{{ route('villas.index') }}" class="slide-item {{ request()->is('villas.index') ? 'active' : '' }}">Villa List</a></li>
                        <li><a href="{{ route('property.levels.index') }}" class="slide-item {{ request()->is('property.levels.index') ? 'active' : '' }}">Property Label</a></li>
                        <li><a href="{{ route('amenities.index') }}" class="slide-item {{ request()->is('amenities.index') ? 'active' : '' }}">Amenities</a></li>
                        <li><a href="{{ route('owner.statement.index') }}" class="slide-item {{ request()->is('owner.statement.index') ? 'active' : '' }}">Owner Statement</a></li>
                        <li><a href="{{ route('user.statement.index') }}" class="slide-item {{ request()->is('user.statement.index') ? 'active' : '' }}">User Statement</a></li>
                        <li><a href="{{ route('taxes.index') }}" class="slide-item {{ request()->is('taxes.index') ? 'active' : '' }}">Taxes</a></li>
                        <li><a href="{{ route('price.types.index') }}" class="slide-item {{ request()->is('price.types.index') ? 'active' : '' }}">Price Types</a></li>
                    </ul>
                </li>
                <hr>
               {{-- villa property , amenities start --}}

                {{-- Blogs start --}}
                <li class="slide {{ request()->is('admin/blogs*') ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->is('admin/blogs*') ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" /><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5" /><path d="M10 13H14M12 3v10m-2 8h4" /></svg>
                        <span class="side-menu__label">Blogs</span><i class="angle fa fa-angle-right"></i>
                    </a>

                    <ul class="slide-menu">
                        <li><a href="{{ route('blog.index') }}" class="slide-item {{ request()->is('admin/blogs/blog*') ? 'active' : '' }}">Blogs</a></li>
                        <li><a href="{{ route('tag.index') }}" class="slide-item {{ request()->is('admin/blogs/tags*') ? 'active' : '' }}">Tags</a></li>

                    </ul>
                </li>
                <hr>
                {{-- Blogs end --}}

                {{-- cms start --}}
                <li class="slide {{ request()->is('admin/cms*') ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->is('admin/cms*') ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path
                                d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm-1 17.93V19h2v.93a8.066 8.066 0 0 1-2 0zM4.07 13H5v-2H4.07a8.066 8.066 0 0 1 0-2H5v2zm15.93 0h-.93v-2h.93a8.066 8.066 0 0 1 0 2zM12 4.07V5h-2v-.93a8.066 8.066 0 0 1 2 0zM8.66 5.34l.71.71-1.42 1.42-.71-.71zM18.36 15.66l-.71-.71 1.42-1.42.71.71zM15.66 18.36l-.71-.71 1.42-1.42.71.71zM5.34 8.66l-.71-.71 1.42-1.42.71.71zM19 11h-2V9h2zm-6 0h-2V9h2zm-6 0H5V9h2zm3 6h-2v-2h2zm6 0h-2v-2h2z" />
                        </svg>
                        <span class="side-menu__label">CMS</span><i class="angle fa fa-angle-right"></i>
                    </a>

                    <ul class="slide-menu">
                        <li><a href="{{ route('cms.footer.button') }}" class="slide-item">Footer Buttons</a></li>
                        <li><a href="{{ route('cms.home.header') }}" class="slide-item">Home Banner</a></li>
                        <li><a href="{{ route('cms.aboutus.header') }}" class="slide-item">About Us Banner</a></li>
                        <li><a href="{{ route('cms.villa.header') }}" class="slide-item">Villa page Banner</a></li>
                        <li><a href="{{ route('cms.villa-detail.header') }}" class="slide-item">Villa Detail page Banner</a></li>
                        <li><a href="{{ route('cms.loyalty.header') }}" class="slide-item">Loyalty page Banner</a></li>
                        <li><a href="{{ route('cms.blog.header') }}" class="slide-item">Blog page Banner</a></li>
                        <li><a href="{{ route('cms.blog-detail.header') }}" class="slide-item">Blog Detail page Banner</a></li>
                        <li><a href="{{ route('cms.contact.header') }}" class="slide-item">Contact us Banner</a></li>
                        <li><a href="{{ route('cms.contact.header') }}" class="slide-item">Contact us Banner</a></li>
                        <li><a href="{{ route('cms.all.villa.header') }}" class="slide-item">All Villa Banner</a></li>
                        <li><a href="{{ route('cms.checkout.header') }}" class="slide-item">Checkout Banner</a></li>
                        <li><a href="{{ route('cms.search.header') }}" class="slide-item">Search Banner</a></li>

                    </ul>
                </li>
                <hr>
                {{-- cms end --}}


                <li class="slide {{ request()->is('admin/settings*') ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->is('admin/settings*') ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 512 512">
                            <path
                                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                        </svg>
                        <span class="side-menu__label">Settings</span><i class="angle fa fa-angle-right"></i>
                    </a>

                    <ul class="slide-menu">
                        <li><a href="{{ route('profile.setting') }}" class="slide-item">Profile Settings</a></li>
                        <li><a href="{{ route('system.index') }}" class="slide-item">System Settings</a></li>
                        <li><a href="{{ route('mail.setting') }}" class="slide-item">Mail Settings</a></li>
                        <li><a href="{{ route('social.media') }}" class="slide-item">Social Media</a></li>
                        <li><a href="{{ route('google.index') }}" class="slide-item">Google Settings</a></li>
                        <li><a href="{{ route('facebook.index') }}" class="slide-item">Facebook Settings</a></li>
                        <li>
                            <a href="{{ route('settings.dynamic_page.index') }}"
                                class="slide-item {{ request()->is('admin/settings/dynamic-page*') ? 'active' : '' }}">Dynamic
                                Page Settings
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>
                <li class="slide {{ request()->is('admin/settings*') ? 'active is-expanded' : '' }}">
                    <a class="side-menu__item"
                        data-bs-toggle="slide" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="side-menu__icon" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.85633 16.8146V17.8114C9.85633 18.6107 9.45797 19.3007 8.76574 19.7003C8.4327 19.8926 8.06098 19.9998 7.67559 20C7.28984 20.0002 6.91824 19.8928 6.58496 19.7003L2.15309 17.1416C1.46078 16.7419 1.0625 16.052 1.0625 15.2526V2.18117C1.0625 0.978398 2.04094 0 3.24367 0H13.0043C14.2071 0 15.1856 0.97832 15.1856 2.18117V4.9366C15.1856 5.33187 14.8646 5.65281 14.4694 5.65281C14.074 5.65281 13.7533 5.33191 13.7533 4.9366V2.18117C13.7533 1.76816 13.4173 1.43211 13.0043 1.43211H4.45145L8.76574 3.9234C9.45773 4.32301 9.85633 5.01285 9.85633 5.81195V15.3824H13.0043C13.4172 15.3824 13.7533 15.0465 13.7533 14.6335V12.218C13.7533 11.8225 14.0738 11.5018 14.4694 11.5018C14.8648 11.5018 15.1856 11.8225 15.1856 12.218V14.6335C15.1856 15.8363 14.2071 16.8146 13.0043 16.8146H9.85633ZM16.4924 9.12336L15.7037 9.91207C15.424 10.1917 15.4241 10.6451 15.7037 10.9248C15.7701 10.9913 15.8491 11.0441 15.936 11.08C16.0229 11.116 16.116 11.1344 16.21 11.1343C16.3041 11.1345 16.3973 11.1161 16.4842 11.0801C16.5712 11.0441 16.6501 10.9914 16.7166 10.9248L18.7275 8.91352C19.0071 8.63391 19.0071 8.18078 18.7275 7.90117L16.7166 5.89023C16.4369 5.61055 15.9835 5.61066 15.7037 5.8902C15.4241 6.16957 15.4242 6.62312 15.7037 6.90258L16.4924 7.69109H11.2088C10.8131 7.69109 10.4927 8.01172 10.4927 8.40734C10.4927 8.80297 10.8132 9.1234 11.2088 9.1234H16.4924V9.12336Z"
                                  fill="#798090" />
                        </svg>
                        <span class="side-menu__label">Log out</span>
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </li>
            </ul>

            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
