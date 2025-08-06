<!-- Register Modal start -->
<div class="auth-modal modal fade" id="registerModal" aria-hidden="true" aria-labelledby="registerModalLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body auth-modal-body">
                <div class="modal-content-left">
                    <figure class="modal-img">
                        <img src="{{ asset('/frontend/assets/images/register.png') }}" alt="Image" />
                    </figure>
                </div>
                <div class="modal-content-right position-relative">
                    <div class="modal-content-element">
                        <h2 class="modal-content-title">{{ __('Register') }}</h2>
                        <p class="modal-content-title-des">
                           {{ __('You can sign in using your company .com account to access our services.') }}
                        </p>
                    </div>

                    <div class="modal-content-element">
                        <form action="{{ route('register') }}" class="auth-form" method="POST">
                            @csrf

                            <input type="hidden" name="role" value="user">

                            <fieldset>
                                <label>{{ __('User name') }}</label>
                                <div>
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M12.1197 12.78C12.0497 12.77 11.9597 12.77 11.8797 12.78C10.1197 12.72 8.71973 11.28 8.71973 9.50998C8.71973 7.69998 10.1797 6.22998 11.9997 6.22998C13.8097 6.22998 15.2797 7.69998 15.2797 9.50998C15.2697 11.28 13.8797 12.72 12.1197 12.78Z"
                                            stroke="#6A7283" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18.7398 19.38C16.9598 21.01 14.5998 22 11.9998 22C9.39977 22 7.03977 21.01 5.25977 19.38C5.35977 18.44 5.95977 17.52 7.02977 16.8C9.76977 14.98 14.2498 14.98 16.9698 16.8C18.0398 17.52 18.6398 18.44 18.7398 19.38Z"
                                            stroke="#6A7283" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            stroke="#6A7283" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="text" name="name" placeholder="{{ __('Name') }}" required />
                                </div>
                            </fieldset>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <fieldset>
                                <label>{{ __('Email Address') }}</label>
                                <div>
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="16" viewBox="0 0 20 16" fill="none">
                                        <path
                                            d="M1 3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3M1 3V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V3M1 3L10 9L19 3"
                                            stroke="#6A7283" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="email" name="email" placeholder="{{ __('Enter email') }}" required />
                                </div>
                            </fieldset>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <fieldset>
                                <label>{{ __('Password') }}</label>
                                <div class="password-wrapper">
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="20" viewBox="0 0 16 20" fill="none">
                                        <path
                                            d="M4 9V5C4 3.93913 4.42143 2.92172 5.17157 2.17157C5.92172 1.42143 6.93913 1 8 1C9.06087 1 10.0783 1.42143 10.8284 2.17157C11.5786 2.92172 12 3.93913 12 5V9M1 11C1 10.4696 1.21071 9.96086 1.58579 9.58579C1.96086 9.21071 2.46957 9 3 9H13C13.5304 9 14.0391 9.21071 14.4142 9.58579C14.7893 9.96086 15 10.4696 15 11V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V11ZM7 14C7 14.2652 7.10536 14.5196 7.29289 14.7071C7.48043 14.8946 7.73478 15 8 15C8.26522 15 8.51957 14.8946 8.70711 14.7071C8.89464 14.5196 9 14.2652 9 14C9 13.7348 8.89464 13.4804 8.70711 13.2929C8.51957 13.1054 8.26522 13 8 13C7.73478 13 7.48043 13.1054 7.29289 13.2929C7.10536 13.4804 7 13.7348 7 14Z"
                                            stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="password" name="password" placeholder="{{ __('Your password') }}" required />
                                    <button type="button">
                                        <svg class="pass-off show" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10.5851 10.5869C10.21 10.9621 9.99942 11.4708 9.99951 12.0013C9.99961 12.5317 10.2104 13.0404 10.5856 13.4154C10.9607 13.7904 11.4695 14.0011 11.9999 14.001C12.5304 14.0009 13.039 13.7901 13.4141 13.4149M16.681 16.673C15.2782 17.5507 13.6547 18.0109 12 18C8.4 18 5.4 16 3 12C4.272 9.88003 5.712 8.32203 7.32 7.32603M10.18 6.18003C10.779 6.05876 11.3888 5.99845 12 6.00003C15.6 6.00003 18.6 8.00003 21 12C20.334 13.11 19.621 14.067 18.862 14.87M3 3L21 21"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <svg class="pass-on" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10 12C10 12.5304 10.2107 13.0391 10.5858 13.4142C10.9609 13.7893 11.4696 14 12 14C12.5304 14 13.0391 13.7893 13.4142 13.4142C13.7893 13.0391 14 12.5304 14 12C14 11.4696 13.7893 10.9609 13.4142 10.5858C13.0391 10.2107 12.5304 10 12 10C11.4696 10 10.9609 10.2107 10.5858 10.5858C10.2107 10.9609 10 11.4696 10 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M21 12C18.6 16 15.6 18 12 18C8.4 18 5.4 16 3 12C5.4 8 8.4 6 12 6C15.6 6 18.6 8 21 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </fieldset>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <fieldset>
                                <label>{{ __('Confirm Password') }}</label>
                                <div class="password-wrapper">
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="20" viewBox="0 0 16 20" fill="none">
                                        <path
                                            d="M4 9V5C4 3.93913 4.42143 2.92172 5.17157 2.17157C5.92172 1.42143 6.93913 1 8 1C9.06087 1 10.0783 1.42143 10.8284 2.17157C11.5786 2.92172 12 3.93913 12 5V9M1 11C1 10.4696 1.21071 9.96086 1.58579 9.58579C1.96086 9.21071 2.46957 9 3 9H13C13.5304 9 14.0391 9.21071 14.4142 9.58579C14.7893 9.96086 15 10.4696 15 11V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V11ZM7 14C7 14.2652 7.10536 14.5196 7.29289 14.7071C7.48043 14.8946 7.73478 15 8 15C8.26522 15 8.51957 14.8946 8.70711 14.7071C8.89464 14.5196 9 14.2652 9 14C9 13.7348 8.89464 13.4804 8.70711 13.2929C8.51957 13.1054 8.26522 13 8 13C7.73478 13 7.48043 13.1054 7.29289 13.2929C7.10536 13.4804 7 13.7348 7 14Z"
                                            stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="password" name="password_confirmation"
                                        placeholder="{{ __('Confirm Password') }}" required />
                                    <button type="button">
                                        <svg class="pass-off show" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10.5851 10.5869C10.21 10.9621 9.99942 11.4708 9.99951 12.0013C9.99961 12.5317 10.2104 13.0404 10.5856 13.4154C10.9607 13.7904 11.4695 14.0011 11.9999 14.001C12.5304 14.0009 13.039 13.7901 13.4141 13.4149M16.681 16.673C15.2782 17.5507 13.6547 18.0109 12 18C8.4 18 5.4 16 3 12C4.272 9.88003 5.712 8.32203 7.32 7.32603M10.18 6.18003C10.779 6.05876 11.3888 5.99845 12 6.00003C15.6 6.00003 18.6 8.00003 21 12C20.334 13.11 19.621 14.067 18.862 14.87M3 3L21 21"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <svg class="pass-on" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10 12C10 12.5304 10.2107 13.0391 10.5858 13.4142C10.9609 13.7893 11.4696 14 12 14C12.5304 14 13.0391 13.7893 13.4142 13.4142C13.7893 13.0391 14 12.5304 14 12C14 11.4696 13.7893 10.9609 13.4142 10.5858C13.0391 10.2107 12.5304 10 12 10C11.4696 10 10.9609 10.2107 10.5858 10.5858C10.2107 10.9609 10 11.4696 10 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M21 12C18.6 16 15.6 18 12 18C8.4 18 5.4 16 3 12C5.4 8 8.4 6 12 6C15.6 6 18.6 8 21 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </fieldset>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button class="button button-pri w-100" type="submit">
                                {{ __('Sign up') }}
                            </button>
                        </form>
                        <p class="auth-change-des">
                            {{ __('Do you have an account?') }}

                            <button class="auth-hyper-btn" type="button" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            {{ __('Sign In') }}
                            </button>
                        </p>
                    </div>

                    <div class="or-separator">
                        <span class="bar"></span>
                        <span>{{ __('OR') }}</span>
                        <span class="bar"></span>
                    </div>

                    <div class="">
                        <div class="auth-socials">
                            <a class="auth-social" href="{{ route('auth.google', ['role' => 'user']) }}">
                                <img src="{{ asset('/frontend/assets/images/icons/google.svg') }}" alt="">
                                <span>{{ __('Google') }}</span>
                            </a>
                            <a class="auth-social" href="{{ route('auth.facebook', ['role' => 'user']) }}">
                                <img src="{{ asset('/frontend/assets/images/icons/facebook.svg') }}" alt="">
                                <span>{{ __('Facebook') }}</span>
                            </a>
                        </div>
                        <div class="">
                            <p class="auth-change-des">
                               {{ __('By creating an account, you agree to our') }}
                                <a href="#" class="auth-hyper-btn">
                                   {{ __('Terms and Conditions.') }}</a>
                               {{ __('View our') }}
                                <a href="#" class="auth-hyper-btn">{{ __('Privacy Policy.') }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Modal end -->

<!-- Villa Owner Register Modal start -->
<div class="auth-modal modal fade" id="registerVillaModal" aria-hidden="true"
    aria-labelledby="registerVillaModalLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body auth-modal-body">
                <div class="modal-content-left">
                    <figure class="modal-img">
                        <img src="{{ asset('/frontend/assets/images/register.png') }}" alt="Image" />
                    </figure>
                </div>
                <div class="modal-content-right position-relative">
                    <div class="modal-content-element">
                        <h2 class="modal-content-title">{{ __('Villa Owner Register') }}</h2>
                        <p class="modal-content-title-des">
                            {{ __('You can sign in using your company .com account to access our services.') }}
                        </p>
                    </div>

                    <div class="modal-content-element">
                        <form class="auth-form" action="{{ route('register') }}" method="POST">
                            @csrf
                            @method('POST')

                            <input type="hidden" name="role" value="owner">

                            <fieldset>
                                <label>{{ __('User name') }}</label>
                                <div>
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M12.1197 12.78C12.0497 12.77 11.9597 12.77 11.8797 12.78C10.1197 12.72 8.71973 11.28 8.71973 9.50998C8.71973 7.69998 10.1797 6.22998 11.9997 6.22998C13.8097 6.22998 15.2797 7.69998 15.2797 9.50998C15.2697 11.28 13.8797 12.72 12.1197 12.78Z"
                                            stroke="#6A7283" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18.7398 19.38C16.9598 21.01 14.5998 22 11.9998 22C9.39977 22 7.03977 21.01 5.25977 19.38C5.35977 18.44 5.95977 17.52 7.02977 16.8C9.76977 14.98 14.2498 14.98 16.9698 16.8C18.0398 17.52 18.6398 18.44 18.7398 19.38Z"
                                            stroke="#6A7283" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            stroke="#6A7283" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="text" name="name" placeholder="{{ __('Name') }}" required />
                                </div>
                            </fieldset>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <fieldset>
                                <label>{{ __('Email Address') }}</label>
                                <div>
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="16" viewBox="0 0 20 16" fill="none">
                                        <path
                                            d="M1 3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3M1 3V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V3M1 3L10 9L19 3"
                                            stroke="#6A7283" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="email" name="email" placeholder="{{ __('Enter email') }}" required />
                                </div>
                            </fieldset>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <fieldset>
                                <label>{{ __('Password') }}</label>
                                <div class="password-wrapper">
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="20" viewBox="0 0 16 20" fill="none">
                                        <path
                                            d="M4 9V5C4 3.93913 4.42143 2.92172 5.17157 2.17157C5.92172 1.42143 6.93913 1 8 1C9.06087 1 10.0783 1.42143 10.8284 2.17157C11.5786 2.92172 12 3.93913 12 5V9M1 11C1 10.4696 1.21071 9.96086 1.58579 9.58579C1.96086 9.21071 2.46957 9 3 9H13C13.5304 9 14.0391 9.21071 14.4142 9.58579C14.7893 9.96086 15 10.4696 15 11V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V11ZM7 14C7 14.2652 7.10536 14.5196 7.29289 14.7071C7.48043 14.8946 7.73478 15 8 15C8.26522 15 8.51957 14.8946 8.70711 14.7071C8.89464 14.5196 9 14.2652 9 14C9 13.7348 8.89464 13.4804 8.70711 13.2929C8.51957 13.1054 8.26522 13 8 13C7.73478 13 7.48043 13.1054 7.29289 13.2929C7.10536 13.4804 7 13.7348 7 14Z"
                                            stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="password" name="password" placeholder="{{ __('Your password') }}" required />
                                    <button type="button">
                                        <svg class="pass-off show" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10.5851 10.5869C10.21 10.9621 9.99942 11.4708 9.99951 12.0013C9.99961 12.5317 10.2104 13.0404 10.5856 13.4154C10.9607 13.7904 11.4695 14.0011 11.9999 14.001C12.5304 14.0009 13.039 13.7901 13.4141 13.4149M16.681 16.673C15.2782 17.5507 13.6547 18.0109 12 18C8.4 18 5.4 16 3 12C4.272 9.88003 5.712 8.32203 7.32 7.32603M10.18 6.18003C10.779 6.05876 11.3888 5.99845 12 6.00003C15.6 6.00003 18.6 8.00003 21 12C20.334 13.11 19.621 14.067 18.862 14.87M3 3L21 21"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <svg class="pass-on" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10 12C10 12.5304 10.2107 13.0391 10.5858 13.4142C10.9609 13.7893 11.4696 14 12 14C12.5304 14 13.0391 13.7893 13.4142 13.4142C13.7893 13.0391 14 12.5304 14 12C14 11.4696 13.7893 10.9609 13.4142 10.5858C13.0391 10.2107 12.5304 10 12 10C11.4696 10 10.9609 10.2107 10.5858 10.5858C10.2107 10.9609 10 11.4696 10 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M21 12C18.6 16 15.6 18 12 18C8.4 18 5.4 16 3 12C5.4 8 8.4 6 12 6C15.6 6 18.6 8 21 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </fieldset>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <fieldset>
                                <label>{{ __('Confirm password') }}</label>
                                <div class="password-wrapper">
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="20" viewBox="0 0 16 20" fill="none">
                                        <path
                                            d="M4 9V5C4 3.93913 4.42143 2.92172 5.17157 2.17157C5.92172 1.42143 6.93913 1 8 1C9.06087 1 10.0783 1.42143 10.8284 2.17157C11.5786 2.92172 12 3.93913 12 5V9M1 11C1 10.4696 1.21071 9.96086 1.58579 9.58579C1.96086 9.21071 2.46957 9 3 9H13C13.5304 9 14.0391 9.21071 14.4142 9.58579C14.7893 9.96086 15 10.4696 15 11V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V11ZM7 14C7 14.2652 7.10536 14.5196 7.29289 14.7071C7.48043 14.8946 7.73478 15 8 15C8.26522 15 8.51957 14.8946 8.70711 14.7071C8.89464 14.5196 9 14.2652 9 14C9 13.7348 8.89464 13.4804 8.70711 13.2929C8.51957 13.1054 8.26522 13 8 13C7.73478 13 7.48043 13.1054 7.29289 13.2929C7.10536 13.4804 7 13.7348 7 14Z"
                                            stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="password" name="password_confirmation"
                                        placeholder="{{ __('Confirm password') }}" required />
                                    <button type="button">
                                        <svg class="pass-off show" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10.5851 10.5869C10.21 10.9621 9.99942 11.4708 9.99951 12.0013C9.99961 12.5317 10.2104 13.0404 10.5856 13.4154C10.9607 13.7904 11.4695 14.0011 11.9999 14.001C12.5304 14.0009 13.039 13.7901 13.4141 13.4149M16.681 16.673C15.2782 17.5507 13.6547 18.0109 12 18C8.4 18 5.4 16 3 12C4.272 9.88003 5.712 8.32203 7.32 7.32603M10.18 6.18003C10.779 6.05876 11.3888 5.99845 12 6.00003C15.6 6.00003 18.6 8.00003 21 12C20.334 13.11 19.621 14.067 18.862 14.87M3 3L21 21"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <svg class="pass-on" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10 12C10 12.5304 10.2107 13.0391 10.5858 13.4142C10.9609 13.7893 11.4696 14 12 14C12.5304 14 13.0391 13.7893 13.4142 13.4142C13.7893 13.0391 14 12.5304 14 12C14 11.4696 13.7893 10.9609 13.4142 10.5858C13.0391 10.2107 12.5304 10 12 10C11.4696 10 10.9609 10.2107 10.5858 10.5858C10.2107 10.9609 10 11.4696 10 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M21 12C18.6 16 15.6 18 12 18C8.4 18 5.4 16 3 12C5.4 8 8.4 6 12 6C15.6 6 18.6 8 21 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </fieldset>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button class="button button-pri w-100" type="submit">
                                {{ __('Sign up') }}
                            </button>
                        </form>
                        <p class="auth-change-des">
                            {{ __('Do you have an account?') }}
                            <button class="auth-hyper-btn" type="button" data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                                {{ __('Sign In') }}
                            </button>
                        </p>
                    </div>

                    <div class="or-separator">
                        <span class="bar"></span>
                        <span>{{ __('OR') }}</span>
                        <span class="bar"></span>
                    </div>

                    <div class="">
                        <div class="auth-socials">
                            <a class="auth-social" href="{{ route('auth.google', ['role' => 'owner']) }}">
                                <img src="{{ asset('/frontend/assets/images/icons/google.svg') }}" alt="">
                                <span>{{ __('Google') }}</span>
                            </a>
                            <a class="auth-social" href="{{ route('auth.facebook', ['role' => 'owner']) }}">
                                <img src="{{ asset('/frontend/assets/images/icons/facebook.svg') }}" alt="">
                                <span>{{ __('Facebook') }}</span>
                            </a>
                        </div>
                        <div class="">
                            <p class="auth-change-des">
                                {{ __('By creating an account, you agree to our') }}
                                <a href="#" class="auth-hyper-btn">
                                    {{ __('Terms and Conditions.') }}</a>
                                {{ __('View our') }}
                                <a href="#" class="auth-hyper-btn">{{ __('Privacy Policy.') }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Modal end -->

<!-- Login Modal start -->
<div class="auth-modal modal fade" id="loginModal" aria-hidden="true" aria-labelledby="loginModalLabel"
    tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body auth-modal-body">
                <div class="modal-content-left">
                    <figure class="modal-img">
                        <img src="{{ asset('/frontend/assets/images/login.png') }}" alt="Image" />
                    </figure>
                </div>
                <div class="modal-content-right position-relative">
                    <div class="modal-content-element">
                        <h2 class="modal-content-title">{{ __('Login') }}</h2>
                        <p class="modal-content-title-des">
                            {{ __('You can sign in using your company .com account to access our services.') }}
                        </p>
                    </div>

                    <div class="modal-content-element">
                        <form class="auth-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')

                            <fieldset>
                                <label>{{ __('Email Address') }}</label>
                                <div>
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="16" viewBox="0 0 20 16" fill="none">
                                        <path
                                            d="M1 3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3M1 3V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V3M1 3L10 9L19 3"
                                            stroke="#6A7283" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="email" name="email" placeholder="{{ __('Enter email') }}" required />
                                </div>
                            </fieldset>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <fieldset>
                                <label>{{ __('Password') }}</label>
                                <div class="password-wrapper">
                                    <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="20" viewBox="0 0 16 20" fill="none">
                                        <path
                                            d="M4 9V5C4 3.93913 4.42143 2.92172 5.17157 2.17157C5.92172 1.42143 6.93913 1 8 1C9.06087 1 10.0783 1.42143 10.8284 2.17157C11.5786 2.92172 12 3.93913 12 5V9M1 11C1 10.4696 1.21071 9.96086 1.58579 9.58579C1.96086 9.21071 2.46957 9 3 9H13C13.5304 9 14.0391 9.21071 14.4142 9.58579C14.7893 9.96086 15 10.4696 15 11V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V11ZM7 14C7 14.2652 7.10536 14.5196 7.29289 14.7071C7.48043 14.8946 7.73478 15 8 15C8.26522 15 8.51957 14.8946 8.70711 14.7071C8.89464 14.5196 9 14.2652 9 14C9 13.7348 8.89464 13.4804 8.70711 13.2929C8.51957 13.1054 8.26522 13 8 13C7.73478 13 7.48043 13.1054 7.29289 13.2929C7.10536 13.4804 7 13.7348 7 14Z"
                                            stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <input type="password" name="password" placeholder="{{ __('Your password') }}" required />
                                    <button type="button">
                                        <svg class="pass-off show" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10.5851 10.5869C10.21 10.9621 9.99942 11.4708 9.99951 12.0013C9.99961 12.5317 10.2104 13.0404 10.5856 13.4154C10.9607 13.7904 11.4695 14.0011 11.9999 14.001C12.5304 14.0009 13.039 13.7901 13.4141 13.4149M16.681 16.673C15.2782 17.5507 13.6547 18.0109 12 18C8.4 18 5.4 16 3 12C4.272 9.88003 5.712 8.32203 7.32 7.32603M10.18 6.18003C10.779 6.05876 11.3888 5.99845 12 6.00003C15.6 6.00003 18.6 8.00003 21 12C20.334 13.11 19.621 14.067 18.862 14.87M3 3L21 21"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <svg class="pass-on" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M10 12C10 12.5304 10.2107 13.0391 10.5858 13.4142C10.9609 13.7893 11.4696 14 12 14C12.5304 14 13.0391 13.7893 13.4142 13.4142C13.7893 13.0391 14 12.5304 14 12C14 11.4696 13.7893 10.9609 13.4142 10.5858C13.0391 10.2107 12.5304 10 12 10C11.4696 10 10.9609 10.2107 10.5858 10.5858C10.2107 10.9609 10 11.4696 10 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M21 12C18.6 16 15.6 18 12 18C8.4 18 5.4 16 3 12C5.4 8 8.4 6 12 6C15.6 6 18.6 8 21 12Z"
                                                stroke="#6A7283" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </fieldset>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button class="button button-pri w-100" type="submit">
                                {{ __('Sign In') }}
                            </button>
                        </form>
                        <p class="auth-change-des">
                           {{ __('Do not have an account?') }}
                            <button class="auth-hyper-btn" type="button" data-bs-toggle="modal"
                                data-bs-target="#registerModal">
                                {{ __('Register') }}
                            </button>
                        </p>
                    </div>

                    <div class="or-separator">
                        <span class="bar"></span>
                        <span>{{ __('OR') }}</span>
                        <span class="bar"></span>
                    </div>

                    <div class="">
                        <div class="auth-socials">
                            <a class="auth-social" href="{{ route('auth.google') }}">
                                <img src="{{ asset('/frontend/assets/images/icons/google.svg') }}" alt="">
                                <span>{{ __('Google') }}</span>
                            </a>
                            <a class="auth-social" href="{{ route('auth.facebook') }}">
                                <img src="{{ asset('/frontend/assets/images/icons/facebook.svg') }}" alt="">
                                <span>{{ __('Facebook')}}</span>
                            </a>
                        </div>
                        <div class="">
                            <p class="auth-change-des">
                                {{ __('By creating an account, you agree to our')}}
                                <a href="#" class="auth-hyper-btn">
                                    {{ __('Terms and Conditions.') }}
                                </a>
                                {{ __('View our')}}
                                <a href="#" class="auth-hyper-btn">
                                    {{ __('Privacy Policy.')}}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Modal end -->

<!-- Booking Success Modal start -->
@if(session('t-complete'))
    @if(Auth::check())
        @if(session('booking'))
            @php
                $booking = session('booking');
            @endphp

            <div class="auth-modal modal fade" id="bookingSuccessModal" aria-hidden="true"
                 aria-labelledby="bookingSuccessModalLabel" tabindex="-1">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body success-modal-body">
                            <svg class="success-modal-icon" xmlns="http://www.w3.org/2000/svg" width="64" height="63" viewBox="0 0 64 63" fill="none">
                                <g clip-path="url(#clip0_2709_1674)">
                                    <path d="M61.039 31.4987C62.0039 30.3751 62.68 29.033 63.0088 27.5889C63.3376 26.1448 63.3091 24.6423 62.9257 23.2118C62.5424 21.7812 61.8158 20.4658 60.8089 19.3796C59.8021 18.2934 58.5455 17.4693 57.1481 16.9787C57.4219 15.5232 57.3364 14.0228 56.899 12.6077C56.4617 11.1927 55.6857 9.90572 54.6383 8.85849C53.5909 7.81127 52.3039 7.03541 50.8888 6.59824C49.4737 6.16106 47.9733 6.07577 46.5177 6.34976C46.0275 4.95201 45.2036 3.69504 44.1174 2.68798C43.0312 1.68091 41.7156 0.954196 40.2848 0.570924C38.8541 0.187651 37.3514 0.159408 35.9072 0.488645C34.463 0.817882 33.1211 1.49465 31.9978 2.46019C30.8742 1.49531 29.5322 0.819157 28.0881 0.490374C26.644 0.161592 25.1415 0.190114 23.7109 0.573465C22.2804 0.956815 20.9649 1.68342 19.8788 2.69024C18.7926 3.69706 17.9685 4.95369 17.4779 6.35112C16.0224 6.07756 14.5222 6.16324 13.1073 6.60071C11.6925 7.03818 10.4057 7.81423 9.35863 8.86156C8.31157 9.90888 7.53585 11.1958 7.09874 12.6108C6.66163 14.0258 6.57634 15.5261 6.85026 16.9815C5.45284 17.472 4.1962 18.2961 3.18938 19.3823C2.18256 20.4685 1.45595 21.7839 1.0726 23.2145C0.689252 24.6451 0.660726 26.1475 0.989508 27.5916C1.31829 29.0357 1.99446 30.3778 2.95933 31.5014C1.99417 32.6249 1.31779 33.9671 0.988913 35.4113C0.660037 36.8555 0.688588 38.3582 1.07211 39.7889C1.45563 41.2196 2.18251 42.5351 3.18968 43.6212C4.19684 44.7073 5.45387 45.5311 6.85162 46.0213C6.57746 47.4767 6.66265 48.9771 7.09981 50.3921C7.53697 51.8072 8.3129 53.0942 9.36022 54.1413C10.4075 55.1885 11.6946 55.9643 13.1097 56.4013C14.5248 56.8382 16.0252 56.9233 17.4806 56.6489C17.9712 58.0463 18.7953 59.303 19.8815 60.3098C20.9676 61.3166 22.2831 62.0432 23.7136 62.4266C25.1442 62.8099 26.6467 62.8384 28.0908 62.5097C29.5348 62.1809 30.8769 61.5047 32.0005 60.5398C33.1241 61.505 34.4662 62.1814 35.9105 62.5103C37.3547 62.8391 38.8574 62.8106 40.2881 62.4271C41.7188 62.0435 43.0342 61.3167 44.1203 60.3095C45.2064 59.3023 46.0303 58.0453 46.5204 56.6476C47.9759 56.9216 49.4763 56.8364 50.8914 56.3992C52.3065 55.9621 53.5935 55.1862 54.6407 54.1389C55.688 53.0916 56.4639 51.8046 56.9011 50.3895C57.3383 48.9744 57.4235 47.4741 57.1494 46.0186C58.5469 45.5281 59.8037 44.704 60.8106 43.6178C61.8174 42.5316 62.544 41.2161 62.9273 39.7854C63.3105 38.3548 63.3388 36.8522 63.0098 35.4081C62.6807 33.964 62.0042 32.6221 61.039 31.4987Z" fill="#18C07A"/>
                                    <path d="M26.3926 43.4231L17.7118 34.7477C17.3823 34.4178 17.1973 33.9705 17.1973 33.5042C17.1973 33.038 17.3823 32.5907 17.7118 32.2607L18.7664 31.2048C19.0964 30.8753 19.5436 30.6903 20.0099 30.6903C20.4762 30.6903 20.9234 30.8753 21.2534 31.2048L27.5636 37.5109L42.4247 21.7184C42.7445 21.3791 43.1858 21.1806 43.6519 21.1663C44.1179 21.1521 44.5705 21.3234 44.9104 21.6426L45.9935 22.6647C46.3332 22.9846 46.532 23.4262 46.5462 23.8925C46.5604 24.3589 46.3889 24.8118 46.0693 25.1517L28.9216 43.3839C28.7601 43.556 28.5657 43.6938 28.3499 43.7892C28.1341 43.8847 27.9013 43.9357 27.6654 43.9394C27.4295 43.9431 27.1952 43.8992 26.9765 43.8106C26.7579 43.7219 26.5593 43.5901 26.3926 43.4231Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_2709_1674">
                                        <rect width="62.4769" height="62.4769" fill="white" transform="translate(0.761719 0.261475)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="success-modal-title">
                                🎉 {{ __('Congratulations!') }}
                            </div>
                            <div class="success-modal-details">
                                @if($booking['loyalty_point_earn'] > 0)
                                    <div class="success-modal-details-highlight">
                                        {{ __('Congratulations! You have earned') }} {{ $booking['loyalty_point_earn'] }} {{ __('loyalty points') }}.
                                    </div>
                                    <div>
                                        {{ __('Thank you for booking this beautiful villa! These points bring you closer to exciting rewards, exclusive benefits, and unforgettable experiences in the future.') }}
                                    </div>
                                @else
                                    <div>
                                        {{ __('Thank you for booking this beautiful villa! We look forward to serving you and ensuring your stay is memorable.') }}
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="success-modal-confirm-btn" data-bs-dismiss="modal" aria-label="Close">{{ __('OK') }}</button>
                        </div>
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>


        @endif
    @endif
@endif
<!-- Booking Success Modal end -->
