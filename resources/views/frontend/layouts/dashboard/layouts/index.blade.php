@extends('frontend.layouts.dashboard.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .star-rating {
            direction: rtl;
            /* Right-to-left layout for proper star alignment */
            font-size: 2rem;
            display: inline-flex;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating .star {
            color: #ddd;
            /* Unselected star color */
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating input[type="radio"]:checked~.star,
        .star-rating input[type="radio"]:hover~.star {
            color: #ffcc00;
            /* Selected star color */
        }

        .star-rating .star:hover,
        .star-rating .star:hover~.star {
            color: #ffcc00;
            /* Hover effect for stars */
        }
    </style>
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{-- Header --}}
        @include('frontend.layouts.dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">

            <h3 class="dashboard-title">{{ __('Recent Activity') }}</h3>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Booking Villas') }}</th>
                            <th scope="col">{{ __('Location') }}</th>
                            <th scope="col" class="text-center">{{ __('Status') }}</th>
                            <th scope="col" class="text-center">{{ __('Review') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td scope="row">
                                    <div class="villa-listing-item">
                                        <figure class="villa-listing-img">
                                            <img src="{{ $booking->villa->villa_images->first()->image ?? '/frontend/assets/images/blog-1.png' }}"
                                                alt="{{ $booking->villa->title ?? '' }}" />
                                        </figure>
                                        <div>
                                            <div class="villa-listing-title">
                                                {{ $booking->villa->title }}
                                            </div>
                                            <div class="villa-listing-details">
                                                {{ __('Booking date') }}:
                                                {{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y') }}
                                            </div>
                                            <div class="villa-listing-details">
                                                {{ __('Booked date') }}:
                                                {{ \Carbon\Carbon::parse($booking->check_in_date)->format('M d, Y') }} -
                                                {{ \Carbon\Carbon::parse($booking->check_out_date)->format('M d, Y') }}
                                            </div>
                                            <div class="villa-listing-price">₪{{ $booking->total_amount }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $booking->villa->full_address }}</td>
                                <td class="text-center">
                                    @if ($booking->status == 'approved')
                                        <div class="status pending">{{ __('Completed') }}</div>
                                    @elseif($booking->status == 'cancelled')
                                        <div class="status pending">{{ __('Cancelled') }}</div>
                                    @elseif($booking->status == 'pending')
                                        <div class="status pending">{{ __('Pending') }}</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="status completed review-button" data-bs-toggle="modal"
                                        data-bs-target="#reviewModal" data-villa-id="{{ $booking->villa->id }}">
                                        {{ __('Review') }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- modal start --}}
                <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewModalLabel">{{ __('Submit Your Review') }} </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="reviewForm" method="POST" action="{{ route('villa.add.review') }}">
                                @csrf
                                <div class="modal-body">
                                    <!-- Hidden Field for Villa ID -->
                                    <input type="hidden" name="villa_id" id="villaId" value="">
                                    <!-- Rating -->
                                    <div class="mb-3">
                                        <label
                                            class="form-label text-center"><strong>{{ __('Rating') }}:</strong>&nbsp;&nbsp;&nbsp;</label>
                                        <div class="star-rating">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" class="star">&#9733;</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" class="star">&#9733;</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" class="star">&#9733;</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" class="star">&#9733;</label>
                                            <input type="radio" id="star1" name="rating" value="1" required />
                                            <label for="star1" class="star">&#9733;</label>
                                        </div>
                                    </div>

                                    <!-- Comment -->
                                    <div class="mb-3">
                                        <label for="comment" class="form-label"><strong>{{ __('Comment') }}:</strong></label>
                                        <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Write your review here..."></textarea>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger rounded-5"
                                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                    <button type="submit" class="btn btn-success rounded-5">{{ __('Submit Review') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                {{-- modal end --}}
            </div>

            <div class="pagination-wrapper">
                @if ($bookings->onFirstPage())
                    <span class="pagination-item pagination-item-prev disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                            fill="none">
                            <path
                                d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                fill="#C1C4CC" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $bookings->previousPageUrl() }}" class="pagination-item pagination-item-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                            fill="none">
                            <path
                                d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                fill="#C1C4CC" />
                        </svg>
                    </a>
                @endif

                <!-- Pagination Numbers -->
                @php
                    $currentPage = $bookings->currentPage();
                    $lastPage = $bookings->lastPage();
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                @endphp

                @if ($start > 1)
                    <a href="{{ $bookings->url(1) }}" class="pagination-item">1</a>
                    @if ($start > 2)
                        <span class="pagination-item pagination-more">...</span>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    @if ($i == $currentPage)
                        <span class="pagination-item active">{{ $i }}</span>
                    @else
                        <a href="{{ $bookings->url($i) }}" class="pagination-item">{{ $i }}</a>
                    @endif
                @endfor

                @if ($end < $lastPage)
                    @if ($end < $lastPage - 1)
                        <span class="pagination-item pagination-more">...</span>
                    @endif
                    <a href="{{ $bookings->url($lastPage) }}" class="pagination-item">{{ $lastPage }}</a>
                @endif

                <!-- Next Button -->
                @if ($bookings->hasMorePages())
                    <a href="{{ $bookings->nextPageUrl() }}" class="pagination-item pagination-item-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                            fill="none">
                            <path
                                d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                fill="#C1C4CC" />
                        </svg>
                    </a>
                @else
                    <span class="pagination-item pagination-item-next disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                            fill="none">
                            <path
                                d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                fill="#C1C4CC" />
                        </svg>
                    </span>
                @endif

            </div>
        </main>
        <!-- main section end -->
    </div>
    <!-- Main layout end -->

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reviewButtons = document.querySelectorAll('.review-button');
            const villaIdInput = document.getElementById('villaId');

            reviewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const villaId = this.getAttribute('data-villa-id');
                    villaIdInput.value = villaId;
                });
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".dashboard-search-input input").on("keyup", function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('search.bookings') }}",
                    type: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        let tbody = $(".dashboard-table tbody");
                        tbody.empty();

                        if (data.bookings.length === 0) {
                            tbody.append('<tr><td colspan="4">{{ __('No results found') }}</td></tr>');
                            return;
                        }

                        data.bookings.forEach(function(booking) {
                            console.log(booking.villa.full_address);
                            let imagePath =
                                booking.villa.villa_images?.length > 0 ?
                                booking.villa.villa_images[0].image :
                                '/frontend/assets/images/blog-1.png';

                            // created_at date formating
                            const createdAt = new Date(booking.created_at);
                            const formattedCreatedAt = new Intl.DateTimeFormat(
                            'en-US', {
                                month: 'short',
                                day: '2-digit',
                                year: 'numeric',
                            }).format(createdAt);

                            let row = `
            <tr>
                <td>
                    <div class="villa-listing-item">
                        <figure class="villa-listing-img">
                            <img src="${imagePath}" alt="${booking.villa.title}" />
                        </figure>
                        <div>
                            <div class="villa-listing-title">${booking.villa.title.{{app()->getLocale()}}}</div>
                            <div class="villa-listing-details">{{ __('Booking date') }}: ${formattedCreatedAt}</div>
                            <div class="villa-listing-details">
                                {{ __('Booked date') }}: ${booking.check_in_date} - ${booking.check_out_date}
                            </div>
                            <div class="villa-listing-price">₪${booking.total_amount}</div>
                        </div>
                    </div>
                </td>
                <td>${booking.villa.full_address.{{app()->getLocale()}}}</td>
                <td class="text-center">
                <div class="status ${
                    booking.status === 'approved'
                     ? 'pending">{{ __('Completed') }}'
                     : booking.status === 'cancelled'
                     ? 'pending">{{ __('Cancelled') }}'
                     : booking.status === 'pending'
                    ? 'pending">{{ __('Pending') }}'
                     : ''
                 }</div>
                </td>

                <td class="text-center">
                    <button class="status completed review-button" data-bs-toggle="modal"
                        data-bs-target="#reviewModal" data-villa-id="${booking.villa.id}">
                        {{ __('Review') }}
                    </button>
                </td>
            </tr>
        `;
                            tbody.append(row);
                        });
                    },
                });
            });
        });
    </script>
@endpush
