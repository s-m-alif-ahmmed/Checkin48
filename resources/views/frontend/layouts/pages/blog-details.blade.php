@extends('frontend.app')

@section('title', 'Blog Details')

@section('metainfos')
    <!-- Facebook and LinkedIn -->
    <meta property="og:title" content="{{ $blog->title ?? '' }}" />
    <meta property="og:description" content="{{ $blog->description ?? '' }}" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:image" content="{{ asset($blog->image ?? '') }}" />
    <meta property="og:type" content="article" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $blog->title ?? '' }}" />
    <meta name="twitter:description" content="{{ $blog->description ?? '' }}" />
    <meta name="twitter:image" content="{{ asset($blog->image ?? '') }}" />

@endsection


@push('styles')
    {{-- Related Blogs and Tags show all and show less --}}
    <style>
        .d-none {
            display: none;
        }
    </style>

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
        // Filter the collection to get the CMS entry with id = 6
        $cmsNew = $cms->where('id', 8)->first(); // Use first() instead of get()
        $banner_image = $cmsNew ? $cmsNew->banner_image : null; // Ensure cmsHeroBanner is not null
        $banner_title = $cmsNew ? $cmsNew->banner_title : null; // Ensure cmsHeroBanner is not null
        $bottom_image = $cmsNew ? $cmsNew->page_image : null; // Ensure cmsHeroBanner is not null
        $bottom_title = $cmsNew ? $cmsNew->page_title : null; // Ensure cmsHeroBanner is not null
        $button_title = $cmsNew ? $cmsNew->button_title : null; // Ensure cmsHeroBanner is not null
        $button_url = $cmsNew ? $cmsNew->button_url : null; // Ensure cmsHeroBanner is not null
    @endphp

    <!-- Hero start -->
    <section class="hero-sec"
        style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/blog-details-banner-bg.png') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="banner-breadcrumb">
                    <a href="{{ route('home') }}" class="banner-breadcrumb-item">{{ __('Home') }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                            fill="white" />
                    </svg>
                    <a href="{{ route('blog') }}" class="banner-breadcrumb-item">
                        {{ __('Blog') }}
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                            fill="white" />
                    </svg>
                    <a href="{{ route('blogs.details', ['slug' => $blog->slug]) }}"
                        class="banner-breadcrumb-item">{{ __('Details') }}</a>
                </div>
                <h1 class="hero-title-pri">
                    @if ($banner_title)
                        {{ $banner_title }}
                    @else
                        {{ __('Blog Details') }}
                    @endif
                </h1>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- main section start -->
    <main>
        <section class="blog-details">
            <div class="container">
                <div class="blog-details-section">

                    {{-- Blog details start --}}
                    <div class="blog-details-main-section">
                        <div class="blog-details-top">
                            <div class="blog-details-top-left">
                                <div class="blog-owner">
                                    <figure>
                                        <img src="{{ $blog->user->avatar ? asset($blog->user->avatar) : asset('frontend/default-avatar-profile.jpg') }}"
                                            alt="" />
                                    </figure>
                                    <p>{{ $blog->user->name ?? ' ' }}</p>
                                </div>
                                <div class="blog-updated-details">
                                    <div class="blog-release-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 28 28" fill="none">
                                            <path
                                                d="M18.667 3.5V8.16667M9.33366 3.5V8.16667M4.66699 12.8333H23.3337M4.66699 8.16667C4.66699 7.54783 4.91282 6.95434 5.35041 6.51675C5.78799 6.07917 6.38149 5.83333 7.00033 5.83333H21.0003C21.6192 5.83333 22.2127 6.07917 22.6502 6.51675C23.0878 6.95434 23.3337 7.54783 23.3337 8.16667V22.1667C23.3337 22.7855 23.0878 23.379 22.6502 23.8166C22.2127 24.2542 21.6192 24.5 21.0003 24.5H7.00033C6.38149 24.5 5.78799 24.2542 5.35041 23.8166C4.91282 23.379 4.66699 22.7855 4.66699 22.1667V8.16667ZM12.8337 18.6667C12.8337 18.9761 12.9566 19.2728 13.1754 19.4916C13.3942 19.7104 13.6909 19.8333 14.0003 19.8333C14.3097 19.8333 14.6065 19.7104 14.8253 19.4916C15.0441 19.2728 15.167 18.9761 15.167 18.6667C15.167 18.3572 15.0441 18.0605 14.8253 17.8417C14.6065 17.6229 14.3097 17.5 14.0003 17.5C13.6909 17.5 13.3942 17.6229 13.1754 17.8417C12.9566 18.0605 12.8337 18.3572 12.8337 18.6667Z"
                                                stroke="#4F4F4F" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <p>{{ $blog->created_at->format('d M, Y') }}</p>
                                    </div>
                                    <div class="updated-date">
                                        <div class="custom-dot"></div>
                                        <p>{{ __('Updated on') }} {{ $blog->updated_at->format('d M, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- share button start --}}
                            <div class="blog-details-top-right dropdown-center">
                                <button type="button" class="button share-btn button-pri">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M12.8545 10.375C11.9282 10.375 11.112 10.8307 10.5993 11.5236L6.16668 9.25387C6.24027 9.00303 6.29199 8.74306 6.29199 8.46875C6.29199 8.09669 6.21571 7.74297 6.08393 7.41762L10.7228 4.62612C11.2391 5.232 11.9979 5.625 12.8545 5.625C14.4054 5.625 15.667 4.36341 15.667 2.8125C15.667 1.26159 14.4054 0 12.8545 0C11.3036 0 10.042 1.26159 10.042 2.8125C10.042 3.16991 10.1156 3.50894 10.2377 3.82369L5.58496 6.62337C5.06915 6.0355 4.32127 5.65625 3.47949 5.65625C1.92859 5.65625 0.666992 6.91784 0.666992 8.46875C0.666992 10.0197 1.92859 11.2812 3.47949 11.2812C4.42105 11.2812 5.25109 10.8122 5.76184 10.0998L10.1798 12.3622C10.0985 12.6248 10.042 12.8984 10.042 13.1875C10.042 14.7384 11.3036 16 12.8545 16C14.4054 16 15.667 14.7384 15.667 13.1875C15.667 11.6366 14.4054 10.375 12.8545 10.375Z"
                                            fill="white" />
                                    </svg>
                                    <p>{{ __('share') }}</p>
                                </button>
                                <div class="share-dropdown" dir="ltr">
                                    <div class="social-icons">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}"
                                            target="_blank" class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M6.46395 8.83221H4.87995C4.62395 8.83221 4.54395 8.73621 4.54395 8.49621V6.56021C4.54395 6.30421 4.63995 6.22421 4.87995 6.22421H6.46395V4.81621C6.46395 4.17621 6.57595 3.56821 6.89595 3.00821C7.23195 2.43221 7.71195 2.04821 8.31995 1.82421C8.71995 1.68021 9.11995 1.61621 9.55195 1.61621H11.1199C11.3439 1.61621 11.4399 1.71221 11.4399 1.93621V3.76021C11.4399 3.98421 11.3439 4.08021 11.1199 4.08021C10.6879 4.08021 10.2559 4.08021 9.82395 4.09621C9.39195 4.09621 9.16795 4.30421 9.16795 4.75221C9.15195 5.23221 9.16795 5.69621 9.16795 6.19221H11.0239C11.2799 6.19221 11.3759 6.28821 11.3759 6.54421V8.48021C11.3759 8.73621 11.2959 8.81621 11.0239 8.81621H9.16795V14.0322C9.16795 14.3042 9.08795 14.4002 8.79995 14.4002H6.79995C6.55995 14.4002 6.46395 14.3042 6.46395 14.0642V8.83221Z"
                                                    fill="#1d2635" />
                                            </svg>
                                        </a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->url() }}&title={{ $blog->title }}&summary={{ $blog->description }}"
                                            target="_blank" class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M4.37732 2.57128C4.37732 3.43908 3.62128 4.14256 2.68866 4.14256C1.75604 4.14256 1 3.43908 1 2.57128C1 1.70349 1.75604 1 2.68866 1C3.62128 1 4.37732 1.70349 4.37732 2.57128Z"
                                                    fill="#1d2635" />
                                                <path d="M1.23093 5.29752H4.11753V14H1.23093V5.29752Z" fill="#1d2635" />
                                                <path
                                                    d="M8.76495 5.29752H5.87835V14H8.76495C8.76495 14 8.76495 11.2603 8.76495 9.54737C8.76495 8.51922 9.11781 7.48657 10.5258 7.48657C12.1169 7.48657 12.1074 8.83207 12.0999 9.87444C12.0902 11.237 12.1134 12.6274 12.1134 14H15V9.40703C14.9756 6.47428 14.2074 5.12293 11.6804 5.12293C10.1797 5.12293 9.24946 5.80077 8.76495 6.41403V5.29752Z"
                                                    fill="#1d2635" />
                                            </svg>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?text={{ $blog->title }}&url={{ request()->url() }}"
                                            target="_blank" class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                                viewBox="0 0 16 17" fill="none">
                                                <path
                                                    d="M9.34076 7.39625L14.5862 1.29883H13.3432L8.78858 6.59313L5.15081 1.29883H0.955078L6.4561 9.30475L0.955078 15.6988H2.19815L7.00796 10.1079L10.8497 15.6988H15.0454L9.34045 7.39625H9.34076ZM7.6382 9.37528L7.08083 8.57807L2.64605 2.23459H4.55534L8.13426 7.35399L8.69163 8.1512L13.3438 14.8056H11.4345L7.6382 9.37559V9.37528Z"
                                                    fill="#1d2635" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
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
                            {{-- share button end --}}
                        </div>

                        <div class="blog-details-main-lower">
                            <div class="blog-details-main">
                                <figure class="feature-img">
                                    <img src="{{ $blog->image ? asset($blog->image) : asset('frontend/assets/images/default-blog.png') }}"
                                        alt="{{ $blog->title }}" />
                                </figure>
                                <h1>{{ $blog->title }}</h1>
                                <p>{!! $blog->description !!}</p>
                            </div>
                            <hr />
                            <div class="blogs-container-element">
                                {!! $blog->body !!}
                            </div>
                        </div>
                    </div>
                    {{-- Blog details end --}}


                    <aside class="blogs-bar">

                        <div class="blogs-bar-component">
                            <p class="section-title-sec">{{ __('Search') }}</p>
                            <hr />
                            <form action="" class="blog-details-search" id="searchForm" dir="ltr">
                                <fieldset>
                                    <input type="text" name="query" id="search" placeholder="{{ __('Search') }}" />
                                </fieldset>
                                <button type="submit" value="" class="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M17.5 17.5L12.5 12.5M2.5 8.33333C2.5 9.09938 2.65088 9.85792 2.94404 10.5657C3.23719 11.2734 3.66687 11.9164 4.20854 12.4581C4.75022 12.9998 5.39328 13.4295 6.10101 13.7226C6.80875 14.0158 7.56729 14.1667 8.33333 14.1667C9.09938 14.1667 9.85792 14.0158 10.5657 13.7226C11.2734 13.4295 11.9164 12.9998 12.4581 12.4581C12.9998 11.9164 13.4295 11.2734 13.7226 10.5657C14.0158 9.85792 14.1667 9.09938 14.1667 8.33333C14.1667 7.56729 14.0158 6.80875 13.7226 6.10101C13.4295 5.39328 12.9998 4.75022 12.4581 4.20854C11.9164 3.66687 11.2734 3.23719 10.5657 2.94404C9.85792 2.65088 9.09938 2.5 8.33333 2.5C7.56729 2.5 6.80875 2.65088 6.10101 2.94404C5.39328 3.23719 4.75022 3.66687 4.20854 4.20854C3.66687 4.75022 3.23719 5.39328 2.94404 6.10101C2.65088 6.80875 2.5 7.56729 2.5 8.33333Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>

                            <!-- This is where the search results will be displayed -->
                            <div id="searchResults" class="mt-3"></div>
                        </div>

                        @if ($related_blogs->count() > 0)
                            <div class="blogs-bar-component">
                                <p class="section-title-sec">{{ __('More Related Blogs') }}</p>
                                @foreach ($related_blogs as $key => $related_blog)
                                    <hr class="{{ $key >= 5 ? 'd-none' : '' }}" />
                                    <a href="{{ route('blogs.details', ['slug' => $related_blog->slug]) }}"
                                        class="related-blog {{ $key >= 5 ? 'd-none' : '' }}">
                                        <figure>
                                            <img src="{{ asset($related_blog->image ? $related_blog->image : '/frontend/assets/images/related-blog-1.png') }}"
                                                alt="{{ $related_blog->title }}" />
                                        </figure>
                                        <div class="related-blog-cntainer">
                                            <h5>
                                                {{ $related_blog->title }}
                                            </h5>
                                            <p>{{ $related_blog->created_at->format('d/m/y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                                <button class="see-all-btn" id="seeAllRelatedBlogs">
                                    <p>{{ __('See All') }}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M14.1668 5.83337L5.8335 14.1667M14.1668 5.83337H6.66683M14.1668 5.83337V13.3334"
                                            stroke="#0B0B0B" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="see-all-btn d-none" id="seeLessRelatedBlogs">
                                    <p>{{ __('Show Less') }}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M5.8335 14.1667L14.1668 5.83337M5.8335 14.1667H13.3335M5.8335 14.1667V6.66671"
                                            stroke="#0B0B0B" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        @if ($tags->count() > 0)
                            <div class="blogs-bar-component">
                                <p class="section-title-sec">{{ __('Popular Tags') }}</p>
                                <hr />
                                <div class="popular-tags">
                                    @foreach ($tags as $key => $tag)
                                        <div class="popular-tag {{ $key >= 5 ? 'd-none' : '' }}">
                                            <p>{{ $tag->name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <hr />
                                <button class="see-all-btn" id="seeAllBtn">
                                    <p>{{ __('See All') }}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M14.1668 5.83337L5.8335 14.1667M14.1668 5.83337H6.66683M14.1668 5.83337V13.3334"
                                            stroke="#0B0B0B" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="see-all-btn d-none" id="seeLessBtn">
                                    <p>{{ __('Show Less') }}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M5.8335 14.1667L14.1668 5.83337M5.8335 14.1667H13.3335M5.8335 14.1667V6.66671"
                                            stroke="#0B0B0B" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                    </aside>
                </div>
            </div>
        </section>

        <!-- testimonial section start -->
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
                        <div class="testimonial-item flex-column h-100 d-flex " dir="ltr">
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
        <!-- testimonial section end -->

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
    {{-- Blog Ajax Search --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('search');
            const searchResultsContainer = document.getElementById('searchResults');

            // Handle form submission for search
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                const query = searchInput.value;

                if (query.length > 0) {
                    // Make the AJAX request
                    fetch("{{ route('blogs.search') }}?query=" + query)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success && data.results.length > 0) {
                                let resultsHTML = '<div class="related-blogs">';

                                data.results.forEach(blog => {
                                    // Generate the route for each blog using JavaScript's string interpolation
                                    const blogUrl =
                                        "{{ route('blogs.details', ['slug' => '__slug__']) }}"
                                        .replace('__slug__', blog.slug);

                                    // Correctly handle the image URL in JavaScript
                                    const assetUrl =
                                        "{{ asset('') }}"; // The base URL for assets
                                    const blogImage = blog.image ? assetUrl + blog.image :
                                        assetUrl + '/frontend/assets/images/related-blog-1.png';

                                    resultsHTML += `
                                        <hr />
                                        <a href="${blogUrl}" class="related-blog">
                                            <figure>
                                                <img src="${blogImage}"
                                                     alt="${blog.title}" />
                                            </figure>
                                            <div class="related-blog-cntainer">
                                                <h5>${blog.title}</h5>
                                                <p>${new Date(blog.created_at).toLocaleDateString()}</p>
                                            </div>
                                        </a>
                                    `;
                                });

                                resultsHTML += '</div>';
                                searchResultsContainer.innerHTML = resultsHTML;
                            } else {
                                searchResultsContainer.innerHTML = `<p>{{ __('No blogs found') }}</p>`;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                } else {
                    searchResultsContainer.innerHTML = ''; // Clear results if no query
                }
            });
        });
    </script>

    {{-- Related Blog Show all and show less --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seeAllBtn = document.getElementById('seeAllRelatedBlogs');
            const seeLessBtn = document.getElementById('seeLessRelatedBlogs');
            const relatedBlogs = document.querySelectorAll('.related-blog.d-none');
            const allRelatedBlogs = document.querySelectorAll('.related-blog');
            const hiddenRelatedBlogs = document.querySelectorAll('.related-blog.d-none, hr.d-none');

            // Show all related blogs
            seeAllBtn.addEventListener('click', function() {
                // Remove 'd-none' from all related blogs and show "Show Less" button
                allRelatedBlogs.forEach(item => item.classList.remove('d-none'));
                hiddenRelatedBlogs.forEach(item => item.classList.remove('d-none'));
                seeAllBtn.classList.add('d-none'); // Hide "See All" button
                seeLessBtn.classList.remove('d-none'); // Show "Show Less" button
            });

            // Show less related blogs (5 blogs only)
            seeLessBtn.addEventListener('click', function() {
                // Hide all related blogs after the first 5
                allRelatedBlogs.forEach((item, index) => {
                    if (index >= 5) item.classList.add('d-none');
                });
                seeLessBtn.classList.add('d-none'); // Hide "Show Less" button
                seeAllBtn.classList.remove('d-none'); // Show "See All" button
            });
        });
    </script>

    {{-- Blog Tags Show all and show less --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seeAllBtn = document.getElementById('seeAllBtn');
            const seeLessBtn = document.getElementById('seeLessBtn');
            const hiddenTags = document.querySelectorAll('.popular-tag.d-none');

            // Show all tags
            seeAllBtn.addEventListener('click', function() {
                hiddenTags.forEach(tag => tag.classList.remove('d-none'));
                seeAllBtn.classList.add('d-none'); // Hide "See All" button
                seeLessBtn.classList.remove('d-none'); // Show "Show Less" button
            });

            // Show less (hide extra tags)
            seeLessBtn.addEventListener('click', function() {
                hiddenTags.forEach(tag => tag.classList.add('d-none'));
                seeLessBtn.classList.add('d-none'); // Hide "Show Less" button
                seeAllBtn.classList.remove('d-none'); // Show "See All" button
            });
        });
    </script>

    {{-- share button script start --}}



    {{-- share button script end --}}
@endpush
