@extends('frontend.app')

@section('title', 'Contact Us Page')

@push('styles')
@endpush

@section('content')

    <!-- Hero start -->
    @php
        // Filter the collection to get the CMS entry with id = 6
        $cmsNew = $cms->where('id', 6)->first(); // Use first() instead of get()
        $image = $cmsNew ? $cmsNew->image : null; // Ensure cmsItem is not null
        $banner_image = $cmsNew ? $cmsNew->banner_image : null; // Ensure cmsHeroBanner is not null
        $banner_title = $cmsNew ? $cmsNew->banner_title : null; // Ensure cmsHeroBanner is not null
        $bottom_image = $cmsNew ? $cmsNew->page_image : null; // Ensure cmsHeroBanner is not null
        $bottom_title = $cmsNew ? $cmsNew->page_title : null; // Ensure cmsHeroBanner is not null
        $button_title = $cmsNew ? $cmsNew->button_title : null; // Ensure cmsHeroBanner is not null
        $button_url = $cmsNew ? $cmsNew->button_url : null; // Ensure cmsHeroBanner is not null
    @endphp

    <section class="hero-sec" style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/background/contact-bg.png') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="banner-breadcrumb">
                    <a href="{{ route('home') }}" class="banner-breadcrumb-item"> {{ __('Home') }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                            fill="white" />
                    </svg>
                    <a href="{{ route('contact') }}" class="banner-breadcrumb-item">
                        {{ __('Contact Us') }}
                    </a>
                </div>
                <h1 class="hero-title-pri">{{ $banner_title ?? __('Contact Us') }}</h1>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- main section start -->
    <main>
        <!-- contact section start -->
        <section class="section container" dir="ltr">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset($image ?? '/frontend/assets/images/contact-img.png') }}" alt="Image" class="contact-img" />
                </div>

                <div class="col-lg-6" dir="ltr">
                    <div class="contact-from-section">
                        <h3 class="contact-from-title"> {{ __('Contact now') }}</h3>

                        {{-- contact form start --}}
                        <form class="contact-form" action="{{ route('contact-form.submit') }}" method="POST">
                            @csrf

                            <fieldset class="contact-input">
                                <label for="name" class="form-label"> {{ __('Full Name') }}</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="contact-input">
                                <label for="email" class="form-label"> {{ __('Email Address') }}</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="contact-input">
                                <label for="whatsapp" class="form-label"> {{ __('WhatsApp Number') }}</label>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control">
                                @error('whatsapp')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="contact-input">
                                <label for="phone" class="form-label"> {{ __('Phone Number') }}</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="contact-input">
                                <label for="subject" class="form-label"> {{ __('Subject') }}</label>
                                <input type="text" name="subject" id="subject" class="form-control" required>
                                @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="contact-input">
                                <label for="message" class="form-label"> {{ __('Message') }}</label>
                                <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>

                            {{-- <label class="contact-checkbox">
                                <input type="checkbox" />
                                <span>I agree that my data may be processed to respond to my
                                    request for <br />
                                    information.</span>
                            </label> --}}
                            <button type="submit" class="button button-pri">
                                {{ __('Send Message') }}
                            </button>
                        </form>
                        {{-- contact form start --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- contact section end -->

        @if($faqs->count() > 0)
            <!-- faq section start -->
            <section class="section container">
                <div class="section-box justify-content-center">
                    <h2 class="section-title text-center"> {{ __('Frequently Asked Question') }}</h2>
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

        <!-- travelers section start -->
        @include('frontend.partials.popular-villa-info')
        <!-- travelers section End -->

    </main>
    <!-- main section end -->

@endsection

@push('scripts')

@endpush
