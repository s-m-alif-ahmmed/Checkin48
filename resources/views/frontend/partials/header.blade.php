<!-- header start -->
@php
    $twitter = $socialMediaLinks[1] ?? null;
    $linkdin = $socialMediaLinks[2] ?? null;
    $instagram = $socialMediaLinks[3] ?? null;
    $facebook = $socialMediaLinks[4] ?? null;
    $tiktok = $socialMediaLinks[5] ?? null;

    $topbar = App\Models\Topbar::first();
    $topbarPhone = $topbar ? $topbar->phone : null;
    $topbarEmail = $topbar ? $topbar->email : null;
@endphp


<header>
    <!-- nav-top start -->
    <section class="nav-top">
        <div class="container">
            <div class="left">
                <a class="left-contact" href="tel:{{ $topbarPhone }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                    >
                        <path
                            d="M18.3087 15.2748C18.3087 15.5748 18.242 15.8832 18.1003 16.1832C17.9587 16.4832 17.7753 16.7665 17.5337 17.0332C17.1253 17.4832 16.6753 17.8082 16.167 18.0165C15.667 18.2248 15.1253 18.3332 14.542 18.3332C13.692 18.3332 12.7837 18.1332 11.8253 17.7248C10.867 17.3165 9.90866 16.7665 8.95866 16.0748C8.00033 15.3748 7.09199 14.5998 6.22533 13.7415C5.36699 12.8748 4.59199 11.9665 3.90033 11.0165C3.21699 10.0665 2.66699 9.1165 2.26699 8.17484C1.86699 7.22484 1.66699 6.3165 1.66699 5.44984C1.66699 4.88317 1.76699 4.3415 1.96699 3.8415C2.16699 3.33317 2.48366 2.8665 2.92533 2.44984C3.45866 1.92484 4.04199 1.6665 4.65866 1.6665C4.89199 1.6665 5.12533 1.7165 5.33366 1.8165C5.55033 1.9165 5.74199 2.0665 5.89199 2.28317L7.82533 5.00817C7.97533 5.2165 8.08366 5.40817 8.15866 5.5915C8.23366 5.7665 8.27533 5.9415 8.27533 6.09984C8.27533 6.29984 8.21699 6.49984 8.10033 6.6915C7.99199 6.88317 7.83366 7.08317 7.63366 7.28317L7.00033 7.9415C6.90866 8.03317 6.86699 8.1415 6.86699 8.27484C6.86699 8.3415 6.87533 8.39984 6.89199 8.4665C6.91699 8.53317 6.94199 8.58317 6.95866 8.63317C7.10866 8.90817 7.36699 9.2665 7.73366 9.69984C8.10866 10.1332 8.50866 10.5748 8.94199 11.0165C9.39199 11.4582 9.82533 11.8665 10.267 12.2415C10.7003 12.6082 11.0587 12.8582 11.342 13.0082C11.3837 13.0248 11.4337 13.0498 11.492 13.0748C11.5587 13.0998 11.6253 13.1082 11.7003 13.1082C11.842 13.1082 11.9503 13.0582 12.042 12.9665L12.6753 12.3415C12.8837 12.1332 13.0837 11.9748 13.2753 11.8748C13.467 11.7582 13.6587 11.6998 13.867 11.6998C14.0253 11.6998 14.192 11.7332 14.3753 11.8082C14.5587 11.8832 14.7503 11.9915 14.9587 12.1332L17.717 14.0915C17.9337 14.2415 18.0837 14.4165 18.1753 14.6248C18.2587 14.8332 18.3087 15.0415 18.3087 15.2748Z"
                            stroke="white"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                        />
                    </svg>
                    <span>{{ $topbarPhone ?? '(+966) 0116514' }}</span>
                </a>
                <a class="left-mail" href="mailto:{{ $topbarEmail }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                    >
                        <path
                            d="M1.66699 7.08317C1.66699 4.1665 3.33366 2.9165 5.83366 2.9165H14.167C16.667 2.9165 18.3337 4.1665 18.3337 7.08317V12.9165C18.3337 15.8332 16.667 17.0832 14.167 17.0832H5.83366"
                            stroke="white"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M14.1663 7.5L11.558 9.58333C10.6997 10.2667 9.29134 10.2667 8.433 9.58333L5.83301 7.5"
                            stroke="white"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M1.66699 13.75H6.66699"
                            stroke="white"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M1.66699 10.4165H4.16699"
                            stroke="white"
                            stroke-width="1.5"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    <span translate="no">{{ $topbarEmail ?? 'info@companyname.ar' }}</span>
                </a>
            </div>

            <div class="right">
                <div class="social-icons">
                    @if($instagram)
                        <a
                            href="{{ $instagram ?? '#' }}"
                            target="_blank"
                            class="social-icon"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                            >
                                <g clip-path="url(#clip0_13134_13110)">
                                    <path
                                        d="M12 0H4C1.8002 0 0 1.8002 0 4V12.0004C0 14.1996 1.8002 16.0004 4 16.0004H12C14.1998 16.0004 16 14.1996 16 12.0004V4C16 1.8002 14.1998 0 12 0ZM14.6666 12.0004C14.6666 13.4704 13.4708 14.667 12 14.667H4C2.5298 14.667 1.3334 13.4704 1.3334 12.0004V4C1.3334 2.52961 2.5298 1.3334 4 1.3334H12C13.4708 1.3334 14.6666 2.52961 14.6666 4V12.0004Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M12.3359 4.66797C12.8882 4.66797 13.3359 4.22025 13.3359 3.66797C13.3359 3.11568 12.8882 2.66797 12.3359 2.66797C11.7837 2.66797 11.3359 3.11568 11.3359 3.66797C11.3359 4.22025 11.7837 4.66797 12.3359 4.66797Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M8 4C5.79039 4 4 5.79059 4 8C4 10.2086 5.79039 12.0004 8 12.0004C10.209 12.0004 12 10.2086 12 8C12 5.79059 10.209 4 8 4ZM8 10.667C6.52738 10.667 5.3334 9.47301 5.3334 8C5.3334 6.52699 6.52738 5.3334 8 5.3334C9.47262 5.3334 10.6666 6.52699 10.6666 8C10.6666 9.47301 9.47262 10.667 8 10.667Z"
                                        fill="white"
                                    />
                                </g>
                                <defs>
                                    <clippath id="clip0_13134_13110">
                                        <rect width="16" height="16" fill="white" />
                                    </clippath>
                                </defs>
                            </svg>
                        </a>
                    @endif
                    @if($facebook)
                        <a
                            href="{{ $facebook ?? '#' }}"
                            target="_blank"
                            class="social-icon"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                            >
                                <path
                                    d="M6.46395 8.83221H4.87995C4.62395 8.83221 4.54395 8.73621 4.54395 8.49621V6.56021C4.54395 6.30421 4.63995 6.22421 4.87995 6.22421H6.46395V4.81621C6.46395 4.17621 6.57595 3.56821 6.89595 3.00821C7.23195 2.43221 7.71195 2.04821 8.31995 1.82421C8.71995 1.68021 9.11995 1.61621 9.55195 1.61621H11.1199C11.3439 1.61621 11.4399 1.71221 11.4399 1.93621V3.76021C11.4399 3.98421 11.3439 4.08021 11.1199 4.08021C10.6879 4.08021 10.2559 4.08021 9.82395 4.09621C9.39195 4.09621 9.16795 4.30421 9.16795 4.75221C9.15195 5.23221 9.16795 5.69621 9.16795 6.19221H11.0239C11.2799 6.19221 11.3759 6.28821 11.3759 6.54421V8.48021C11.3759 8.73621 11.2959 8.81621 11.0239 8.81621H9.16795V14.0322C9.16795 14.3042 9.08795 14.4002 8.79995 14.4002H6.79995C6.55995 14.4002 6.46395 14.3042 6.46395 14.0642V8.83221Z"
                                    fill="white"
                                />
                            </svg>
                        </a>
                    @endif
                    @if($tiktok)
                        <a
                            href="{{ $tiktok ?? '#' }}"
                            target="_blank"
                            class="social-icon"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                            >
                                <g clip-path="url(#clip0_13134_13120)">
                                    <path
                                        d="M15.0105 4.01221C14.0973 4.01221 13.2548 3.70971 12.5783 3.19939C11.8023 2.61439 11.2448 1.75627 11.048 0.767207C10.9986 0.518516 10.9726 0.265743 10.9705 0.012207H8.36203V7.13971L8.3589 11.0438C8.3589 12.0875 7.67921 12.9725 6.73703 13.2838C6.45481 13.3771 6.15756 13.4165 5.86077 13.4C5.46828 13.3785 5.10046 13.26 4.78077 13.0688C4.10046 12.6619 3.63921 11.9238 3.62671 11.0794C3.60702 9.75971 4.6739 8.68377 5.99265 8.68377C6.25296 8.68377 6.50296 8.72627 6.73703 8.80346V6.15502C6.49015 6.11846 6.2389 6.09939 5.98484 6.09939C4.5414 6.09939 3.1914 6.69939 2.2264 7.78033C1.49702 8.59721 1.05952 9.63939 0.992025 10.7322C0.903587 12.1678 1.4289 13.5325 2.44765 14.5394C2.59734 14.6872 2.75452 14.8244 2.9189 14.951C3.79234 15.6231 4.86015 15.9875 5.98484 15.9875C6.2389 15.9875 6.49015 15.9688 6.73703 15.9322C7.78765 15.7766 8.75703 15.2956 9.52203 14.5394C10.462 13.6103 10.9814 12.3769 10.987 11.0641L10.9736 5.23408C11.4231 5.58079 11.9155 5.86796 12.4386 6.08846C13.257 6.43377 14.1248 6.60877 15.018 6.60846V4.01158C15.0186 4.01221 15.0111 4.01221 15.0105 4.01221Z"
                                        fill="white"
                                    />
                                </g>
                                <defs>
                                    <clippath id="clip0_13134_13120">
                                        <rect width="16" height="16" fill="white" />
                                    </clippath>
                                </defs>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- nav top end -->

    @php
        $systemSetting = App\Models\SystemSetting::first();
    @endphp

    <!-- nav-main start -->
    <nav class="nav-main" id="navbar">
        <div class="container">
            <div class="nav-main-container">
                <div class="left">
                    <a class="site-logo" href="{{ route('home') }}">
                        <img class="img-fluid" src="{{ asset($systemSetting->logo ?? '/frontend/eVento_logo.png') }}" alt="{{ $systemSetting->title }}">
                    </a>
                </div>

                <div class="middle">
                    <ul class="nav-items">
                        <li>
                            <a class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                {{ __('About Us') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item {{ request()->is('villas*') ? 'active' : '' }}" href="{{ route('villas') }}">
                                {{ __('Villas') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item {{ request()->routeIs('loyalty') ? 'active' : '' }}" href="{{ route('loyalty') }}">
                                {{ __('Loyalty Program') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item {{ request()->is('blogs*') ? 'active' : '' }}" href="{{ route('blog') }}">
                                {{ __('Blog') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">

                                {{ __('Contact Us') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav-actions">
                    <div class="lang-select">
                        <input  type="text" class="lang-value" value="{{app()->getLocale()}}" hidden />
                        <button translate="no" class="change-btn" type="button">
                            <span>{{strtoupper(app()->getLocale())}}</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                viewBox="0 0 32 32"
                                fill="none"
                            >
                                <path
                                    d="M16 1C13.0333 1 10.1332 1.87973 7.66645 3.52796C5.19972 5.17618 3.27713 7.51886 2.14181 10.2597C1.0065 13.0006 0.709449 16.0166 1.28823 18.9264C1.86701 21.8361 3.29562 24.5088 5.3934 26.6066C7.49119 28.7044 10.1639 30.133 13.0737 30.7118C15.9834 31.2906 18.9994 30.9935 21.7403 29.8582C24.4812 28.7229 26.8238 26.8003 28.4721 24.3336C30.1203 21.8668 31 18.9667 31 16C30.9955 12.0231 29.4137 8.21044 26.6016 5.39837C23.7896 2.5863 19.9769 1.0045 16 1ZM16 29C13.935 29 11.773 26.338 10.7 22H21.3C20.227 26.338 18.065 29 16 29ZM10.294 20C9.90201 17.3477 9.90201 14.6523 10.294 12H21.706C21.9043 13.3241 22.0026 14.6612 22 16C22.0026 17.3388 21.9043 18.6759 21.706 20H10.294ZM3.00001 16C3.00073 14.6415 3.21536 13.2917 3.63601 12H8.28601C7.90467 14.653 7.90467 17.347 8.28601 20H3.63601C3.21536 18.7083 3.00073 17.3585 3.00001 16ZM16 3C18.065 3 20.227 5.662 21.3 10H10.7C11.773 5.662 13.935 3 16 3ZM23.714 12H28.364C29.2118 14.5993 29.2118 17.4007 28.364 20H23.714C23.9036 18.6751 23.9992 17.3384 24 16C23.9992 14.6616 23.9036 13.3249 23.714 12ZM27.521 10H23.354C22.909 7.82502 22.0364 5.76008 20.787 3.925C23.6852 5.0808 26.0739 7.23577 27.521 10ZM11.213 3.925C9.96357 5.76008 9.09103 7.82502 8.64601 10H4.47901C5.92613 7.23577 8.31486 5.0808 11.213 3.925ZM4.47901 22H8.64601C9.09103 24.175 9.96357 26.2399 11.213 28.075C8.31486 26.9192 5.92613 24.7642 4.47901 22ZM20.787 28.075C22.0364 26.2399 22.909 24.175 23.354 22H27.521C26.0739 24.7642 23.6852 26.9192 20.787 28.075Z"
                                    fill="#1D2635"
                                />
                            </svg>
                        </button>
                        <div class="lang-dropdown">
                            <button @if(app()->getLocale() !== 'ar') @endif class="lang-item @if(app()->getLocale() !== 'ar') active @endif" data-lang="en" type="button">
                                <span translate="no">English</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 32 32"
                                    fill="none"
                                >
                                    <path
                                        d="M16 1C13.0333 1 10.1332 1.87973 7.66645 3.52796C5.19972 5.17618 3.27713 7.51886 2.14181 10.2597C1.0065 13.0006 0.709449 16.0166 1.28823 18.9264C1.86701 21.8361 3.29562 24.5088 5.3934 26.6066C7.49119 28.7044 10.1639 30.133 13.0737 30.7118C15.9834 31.2906 18.9994 30.9935 21.7403 29.8582C24.4812 28.7229 26.8238 26.8003 28.4721 24.3336C30.1203 21.8668 31 18.9667 31 16C30.9955 12.0231 29.4137 8.21044 26.6016 5.39837C23.7896 2.5863 19.9769 1.0045 16 1ZM16 29C13.935 29 11.773 26.338 10.7 22H21.3C20.227 26.338 18.065 29 16 29ZM10.294 20C9.90201 17.3477 9.90201 14.6523 10.294 12H21.706C21.9043 13.3241 22.0026 14.6612 22 16C22.0026 17.3388 21.9043 18.6759 21.706 20H10.294ZM3.00001 16C3.00073 14.6415 3.21536 13.2917 3.63601 12H8.28601C7.90467 14.653 7.90467 17.347 8.28601 20H3.63601C3.21536 18.7083 3.00073 17.3585 3.00001 16ZM16 3C18.065 3 20.227 5.662 21.3 10H10.7C11.773 5.662 13.935 3 16 3ZM23.714 12H28.364C29.2118 14.5993 29.2118 17.4007 28.364 20H23.714C23.9036 18.6751 23.9992 17.3384 24 16C23.9992 14.6616 23.9036 13.3249 23.714 12ZM27.521 10H23.354C22.909 7.82502 22.0364 5.76008 20.787 3.925C23.6852 5.0808 26.0739 7.23577 27.521 10ZM11.213 3.925C9.96357 5.76008 9.09103 7.82502 8.64601 10H4.47901C5.92613 7.23577 8.31486 5.0808 11.213 3.925ZM4.47901 22H8.64601C9.09103 24.175 9.96357 26.2399 11.213 28.075C8.31486 26.9192 5.92613 24.7642 4.47901 22ZM20.787 28.075C22.0364 26.2399 22.909 24.175 23.354 22H27.521C26.0739 24.7642 23.6852 26.9192 20.787 28.075Z"
                                        fill="#1D2635"
                                    />
                                </svg>
                            </button>
                            <button @if(app()->getLocale() === 'ar') @endif class="lang-item @if(app()->getLocale() === 'ar') active @endif" data-lang="ar" type="button">
                                <span translate="no">Arabic</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 32 32"
                                    fill="none"
                                >
                                    <path
                                        d="M16 1C13.0333 1 10.1332 1.87973 7.66645 3.52796C5.19972 5.17618 3.27713 7.51886 2.14181 10.2597C1.0065 13.0006 0.709449 16.0166 1.28823 18.9264C1.86701 21.8361 3.29562 24.5088 5.3934 26.6066C7.49119 28.7044 10.1639 30.133 13.0737 30.7118C15.9834 31.2906 18.9994 30.9935 21.7403 29.8582C24.4812 28.7229 26.8238 26.8003 28.4721 24.3336C30.1203 21.8668 31 18.9667 31 16C30.9955 12.0231 29.4137 8.21044 26.6016 5.39837C23.7896 2.5863 19.9769 1.0045 16 1ZM16 29C13.935 29 11.773 26.338 10.7 22H21.3C20.227 26.338 18.065 29 16 29ZM10.294 20C9.90201 17.3477 9.90201 14.6523 10.294 12H21.706C21.9043 13.3241 22.0026 14.6612 22 16C22.0026 17.3388 21.9043 18.6759 21.706 20H10.294ZM3.00001 16C3.00073 14.6415 3.21536 13.2917 3.63601 12H8.28601C7.90467 14.653 7.90467 17.347 8.28601 20H3.63601C3.21536 18.7083 3.00073 17.3585 3.00001 16ZM16 3C18.065 3 20.227 5.662 21.3 10H10.7C11.773 5.662 13.935 3 16 3ZM23.714 12H28.364C29.2118 14.5993 29.2118 17.4007 28.364 20H23.714C23.9036 18.6751 23.9992 17.3384 24 16C23.9992 14.6616 23.9036 13.3249 23.714 12ZM27.521 10H23.354C22.909 7.82502 22.0364 5.76008 20.787 3.925C23.6852 5.0808 26.0739 7.23577 27.521 10ZM11.213 3.925C9.96357 5.76008 9.09103 7.82502 8.64601 10H4.47901C5.92613 7.23577 8.31486 5.0808 11.213 3.925ZM4.47901 22H8.64601C9.09103 24.175 9.96357 26.2399 11.213 28.075C8.31486 26.9192 5.92613 24.7642 4.47901 22ZM20.787 28.075C22.0364 26.2399 22.909 24.175 23.354 22H27.521C26.0739 24.7642 23.6852 26.9192 20.787 28.075Z"
                                        fill="#1D2635"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="right-end">
                        @if(Auth::check())
                            @if(Auth::user()->role == 'user')
                            @elseif(Auth::user()->role == 'owner')
                            @elseif(Auth::user()->role == 'admin')
                            @endif
                        @else
                            <button type="button" class="signup-btn" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('Sign in') }}</button>
                        @endif

                        @if(Auth::check())
                            @if(Auth::user()->role == 'user')
                                <a href="{{ route('user.dashboard') }}" class="button button-pri">
                                    {{ __('Dashboard') }}
                                </a>
                            @elseif(Auth::user()->role == 'owner')
                                <a href="{{ route('owner.dashboard') }}" class="button button-pri">
                                    {{ __('Villa Owner Dashboard') }}
                                </a>
                            @elseif(Auth::user()->role == 'admin')
                                <a href="{{ route('dashboard') }}" class="button button-pri">
                                    {{ __('Admin Dashboard') }}
                                </a>
                            @endif
                        @else
                            <button type="button" data-bs-toggle="modal" data-bs-target="#registerVillaModal" class="button button-pri">
                                {{ __('List Your Villas?') }}
                            </button>
                        @endif
                    </div>

                    <button class="button mob-menu-toggle p-0">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="14"
                            viewBox="0 0 20 14"
                            fill="none"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M0 6H20V8H0V6ZM0 0H20V2H0V0ZM0 12H20V14H0V12Z"
                                fill="#1D2635"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav-main end -->

    <!-- Mobile nav start -->
    <div class="mob-nav">
        <div class="mob-nav-header position-relative">
            <a class="site-logo" href="{{ route('home') }}">
                <img class="img-fluid" style="height: 50px;" src="{{ asset($systemSetting->logo ?? '/frontend/eVento_logo.png') }}" alt="">
            </a>
            <button class="mobile-nav-close-btn">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <path
                        d="M12 5V19M5 12H19"
                        stroke="white"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
        </div>
        <ul class="nav-items">
            <li><a class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                {{ __('Home') }}
            </a></li>
            <li><a class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                {{ __('About Us') }}

            </a></li>
            <li><a class="nav-item {{ request()->routeIs('villas') ? 'active' : '' }}" href="{{ route('villas') }}">
                {{ __('Villas') }}
            </a></li>
            <li>
                <a class="nav-item {{ request()->routeIs('loyalty') ? 'active' : '' }}" href="{{ route('loyalty') }}">
                    {{ __('Loyalty Program') }}
                </a>
            </li>
            <li><a class="nav-item {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">
                {{ __('Blog') }}
            </a></li>
            <li>
                <a class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                    {{ __('Contact Us') }}
                </a>
            </li>
        </ul>
        <div class="nav-actions">
            @if(Auth::check())
                @if(Auth::user()->role == 'user')
                    <a href="{{ route('user.dashboard') }}" class="signup-btn">{{ __('Dashboard') }}</a>
                @elseif(Auth::user()->role == 'owner')
{{--                    <button type="button" class="signup-btn" data-bs-toggle="modal" data-bs-target="#loginModal">--}}
{{--                        {{ __('Sign in') }}--}}
{{--                        </button>--}}
                @elseif(Auth::user()->role == 'admin')
                    <a href="{{ route('dashboard') }}" class="signup-btn">{{ __('Dashboard') }}</a>
                @endif
            @else
                <button type="button" class="signup-btn" data-bs-toggle="modal" data-bs-target="#loginModal">  {{ __('Sign in') }}</button>
            @endif
            @if(Auth::check())
                @if(Auth::user()->role == 'user')
{{--                    <button type="button" data-bs-toggle="modal" data-bs-target="#registerVillaModal" class="button button-pri"> {{ __('List Your Villas?') }}</button>--}}
                @elseif(Auth::user()->role == 'owner')
                    <a href="{{ route('owner.dashboard') }}" class="button button-pri"> {{ __('Villa Owner Dashboard') }}</a>
                @elseif(Auth::user()->role == 'admin')
{{--                    <a href="{{ route('dashboard') }}" class="button button-pri"> {{ __('List Your Villas?') }}</a>--}}
                @endif
            @else
                <button type="button" data-bs-toggle="modal" data-bs-target="#registerVillaModal" class="button button-pri"> {{ __('List Your Villas?') }}</button>
            @endif
        </div>
    </div>
    <div class="nav-overlay"></div>
    <!-- Mobile nav end -->
</header>
<!-- header end -->

<script>

    function langChange(value) {
        var url = '{{ route('setLocale', ':code') }}';
        $.ajax({
            type: "POST",
            url: url.replace(':code', value),
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(resp) {
                //handle success
                window.location.reload();
            },
            error: function(error) {
                //handle error
            }
        })
        return false;
    }
    document.querySelector(".lang-value").addEventListener("input", (e) => {
        console.log("lang-value")
        langChange(e.target.value);
    })

</script>
