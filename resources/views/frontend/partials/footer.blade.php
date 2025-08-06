<!-- footer section start -->

@php
    $twitter = $socialMediaLinks[1] ?? null;
    $linkdin = $socialMediaLinks[2] ?? null;
    $instagram = $socialMediaLinks[3] ?? null;
    $facebook = $socialMediaLinks[4] ?? null;
    $tiktok = $socialMediaLinks[5] ?? null;

    $systemSetting = App\Models\SystemSetting::first();
    $dynamic_pages = App\Models\DynamicPage::where('status','active')->get();
    $footer_button = \App\Models\FooterButton::first();
@endphp

<footer>
    <div class="container">
        <h2>{{ __('Subscribe a Newsletter') }}</h2>
        <div class="footer-join">
            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="{{ __('Enter your email') }}" required>
                <button type="submit" class="button join-btn">{{ __('Join Now') }}</button>
            </form>
        </div>
        <div class="footer-element">
            <div class="footer-logo">
                <img class="img-fluid" src="{{ asset($systemSetting->logo ?? '/frontend/eVento_logo.png') }}" alt="{{ $systemSetting->title }}" />
                <p>
                    {!! $systemSetting->description !!}
                </p>

                <div class="social-icons footer-icons">
                    @if($instagram)
                        <a href="{{ $instagram ?? '#' }}"
                           target="_blank"
                           class="social-icon" >
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
                            href="{{ $facebook ?? '#'}}"
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
                            href="{{ $tiktok ?? '#'}}"
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
                    @if($linkdin)
                        <a
                            href="{{ $linkdin ?? '#'}}"
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
                                    d="M4.37732 2.57128C4.37732 3.43908 3.62128 4.14256 2.68866 4.14256C1.75604 4.14256 1 3.43908 1 2.57128C1 1.70349 1.75604 1 2.68866 1C3.62128 1 4.37732 1.70349 4.37732 2.57128Z"
                                    fill="white"
                                />
                                <path
                                    d="M1.23093 5.29752H4.11753V14H1.23093V5.29752Z"
                                    fill="white"
                                />
                                <path
                                    d="M8.76495 5.29752H5.87835V14H8.76495C8.76495 14 8.76495 11.2603 8.76495 9.54737C8.76495 8.51922 9.11781 7.48657 10.5258 7.48657C12.1169 7.48657 12.1074 8.83207 12.0999 9.87444C12.0902 11.237 12.1134 12.6274 12.1134 14H15V9.40703C14.9756 6.47428 14.2074 5.12293 11.6804 5.12293C10.1797 5.12293 9.24946 5.80077 8.76495 6.41403V5.29752Z"
                                    fill="white"
                                />
                            </svg>
                        </a>
                    @endif
                    @if($twitter)
                        <a
                            href="{{ $twitter ?? '#'}}"
                            target="_blank"
                            class="social-icon"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="17"
                                viewBox="0 0 16 17"
                                fill="none"
                            >
                                <path
                                    d="M9.34076 7.39625L14.5862 1.29883H13.3432L8.78858 6.59313L5.15081 1.29883H0.955078L6.4561 9.30475L0.955078 15.6988H2.19815L7.00796 10.1079L10.8497 15.6988H15.0454L9.34045 7.39625H9.34076ZM7.6382 9.37528L7.08083 8.57807L2.64605 2.23459H4.55534L8.13426 7.35399L8.69163 8.1512L13.3438 14.8056H11.4345L7.6382 9.37559V9.37528Z"
                                    fill="white"
                                />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
            <div class="quick-link">
                <h4>
                    @if($footer_button->title ?? '')
                        {{ $footer_button->title ?? '' }}
                    @else
                        {{ __('Quick Link') }}
                    @endif
                </h4>
                <ul>
                    <li>
                        @if($footer_button->button_one_url ?? '')
                            <a href="{{ $footer_button->button_one_url ?? '' }}">
                        @else
                            <a href="{{ route('home') }}">
                        @endif
                            @if($footer_button->button_one ?? '')
                                {{ $footer_button->button_one ?? '' }}
                            @else
                                {{ __('Home') }}
                            @endif
                        </a>
                    </li>
                    <li>
                        @if($footer_button->button_two_url ?? '')
                            <a href="{{ $footer_button->button_two_url ?? '' }}">
                        @else
                            <a href="{{ route('villas') }}">
                        @endif
                            @if($footer_button->button_two ?? '')
                                {{ $footer_button->button_two ?? '' }}
                            @else
                                {{ __('Villas') }}
                            @endif
                        </a>
                    </li>
                    <li>
                        @if($footer_button->button_three_url ?? '')
                            <a href="{{ $footer_button->button_three_url ?? '' }}">
                        @else
                            <a href="{{ route('loyalty') }}">
                        @endif
                            @if($footer_button->button_three ?? '')
                                {{ $footer_button->button_three ?? '' }}
                            @else
                                {{ __('Loyalty Program') }}
                            @endif
                        </a>
                    </li>
                    <li>
                        @if($footer_button->button_four_url ?? '')
                            <a href="{{ $footer_button->button_four_url ?? '' }}">
                        @else
                            <a href="{{ route('blog') }}">
                        @endif
                            @if($footer_button->button_four ?? '')
                                {{ $footer_button->button_four ?? '' }}
                            @else
                                {{ __('Blog') }}
                            @endif
                        </a>
                    </li>
                    <li>
                        @if($footer_button->button_five_url ?? '')
                            <a href="{{ $footer_button->button_five_url ?? '' }}">
                        @else
                            <a href="{{ route('contact') }}">
                        @endif
                            @if($footer_button->button_five ?? '')
                                {{ $footer_button->button_five ?? '' }}
                            @else
                                {{ __('Contact Us') }}
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
            <div class="work-with-us">
                <h4>{{ __('Work with us') }}</h4>
                <ul>
                    @if($dynamic_pages->count() > 0)
                        @foreach($dynamic_pages as $page)
                            <li><a href="{{ route('dynamic.page', $page->page_slug) }}">{{ $page->page_title }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="payment-methods">
                <h4>{{ __('Payment methods') }}</h4>
                <img src="{{asset('/frontend/assets/images/payments.png')}}" alt="" />
            </div>
        </div>
    </div>
    <hr />
    <div class="low-footer">
        <p>{{ $systemSetting->copyright_text }}</p>
    </div>
</footer>
<!-- footer section end -->
