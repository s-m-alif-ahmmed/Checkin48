@extends('frontend.app')

@section('title', 'Blog Page')

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
        // Filter the collection to get the CMS entry with id = 6
        $cmsNew = $cms->where('id', 5)->first(); // Use first() instead of get()
        $banner_image = $cmsNew ? $cmsNew->banner_image : null; // Ensure cmsHeroBanner is not null
        $banner_title = $cmsNew ? $cmsNew->banner_title : null; // Ensure cmsHeroBanner is not null
        $bottom_image = $cmsNew ? $cmsNew->page_image : null; // Ensure cmsHeroBanner is not null
        $bottom_title = $cmsNew ? $cmsNew->page_title : null; // Ensure cmsHeroBanner is not null
        $button_title = $cmsNew ? $cmsNew->button_title : null; // Ensure cmsHeroBanner is not null
        $button_url = $cmsNew ? $cmsNew->button_url : null; // Ensure cmsHeroBanner is not null
    @endphp

    <!-- Hero start -->
    <section class="hero-sec" style="background-image: url('{{ asset($banner_image ?? '/frontend/assets/images/background/blog-bg.png') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="banner-breadcrumb">
                    <a href="{{ route('home') }}" class="banner-breadcrumb-item">
                        {{ __('Home') }}
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M7.74408 15.5894C7.41864 15.264 7.41864 14.7363 7.74408 14.4109L12.1548 10.0002L7.74408 5.58942C7.41864 5.26398 7.41864 4.73634 7.74408 4.41091C8.06951 4.08547 8.59715 4.08547 8.92259 4.41091L13.9226 9.41091C14.248 9.73634 14.248 10.264 13.9226 10.5894L8.92259 15.5894C8.59715 15.9149 8.06951 15.9149 7.74408 15.5894Z"
                            fill="white" />
                    </svg>
                    <a href="{{ route('blog') }}" class="banner-breadcrumb-item">
                        {{ __('Blog') }}
                    </a>
                </div>
                <h1 class="hero-title-pri">
                    @if ($banner_title)
                        {{ $banner_title }}
                    @else
                    {{ __('Discover your perfect getaway') }}
                    @endif
                </h1>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- main section start -->
    <main>

        <!-- all blog section start -->
        @if($blogs->count() > 0)
            <section class="section all-blog-section container">
                <div class="section-box">
                    <h2 class="section-title">{{ __('Blog post') }}</h2>
                </div>
                <div class="all-blogs">
                    @foreach ($blogs as $item)
                        <div class="blog-item">
                            <figure class="blog-img">
                                <img src="{{ asset($item->image ? $item->image : 'frontend/assets/images/blog-1.png') }}"
                                    alt="Blog image"
                                    onerror="this.onerror=null;this.src='{{ asset('frontend/assets/images/blog-1.png') }}';" />
                            </figure>
                            <div class="blog-content">
                                <div class="blog-time">
                                    <img src="{{ asset('/frontend/assets/images/icons/calendar.svg') }}"
                                        alt="calendar icon" />
                                    <span>{{ $item->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="details">
                                    {{ $item->title }}
                                </div>
                                <div class="blog-footer">
                                    <div class="client-details">
                                        <figure class="client-img">
                                            <img src="{{ $item->user->image ? asset($item->user->image) : asset('frontend/assets/images/client-1.png') }}"
                                                alt="client image" />
                                        </figure>
                                        <span>{{ $item->user->name }}</span>
                                    </div>
                                    <a href="{{ route('blogs.details', ['slug' => $item->slug]) }}"
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

                <div class="pagination-wrapper mt-4 mt-lg-5">
                    <!-- Previous Button -->
                    @if ($blogs->onFirstPage())
                        <span class="pagination-item pagination-item-prev disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <path
                                    d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $blogs->previousPageUrl() }}" class="pagination-item pagination-item-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <path
                                    d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </a>
                    @endif

                    <!-- Pagination Numbers -->
                    @php
                        $currentPage = $blogs->currentPage();
                        $lastPage = $blogs->lastPage();
                        $start = max(1, $currentPage - 2);
                        $end = min($lastPage, $currentPage + 2);
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $blogs->url(1) }}" class="pagination-item">1</a>
                        @if ($start > 2)
                            <span class="pagination-item pagination-more">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $currentPage)
                            <span class="pagination-item active">{{ $i }}</span>
                        @else
                            <a href="{{ $blogs->url($i) }}" class="pagination-item">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($end < $lastPage)
                        @if ($end < $lastPage - 1)
                            <span class="pagination-item pagination-more">...</span>
                        @endif
                        <a href="{{ $blogs->url($lastPage) }}" class="pagination-item">{{ $lastPage }}</a>
                    @endif

                    <!-- Next Button -->
                    @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}" class="pagination-item pagination-item-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <path
                                    d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </a>
                    @else
                        <span class="pagination-item pagination-item-next disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <path
                                    d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </span>
                    @endif
                </div>


            </section>
        @else
        @endif
        <!-- all blog section end -->

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
