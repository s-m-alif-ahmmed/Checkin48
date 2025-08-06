@extends('frontend.layouts.owner-dashboard.app')

@section('title', 'Booking')

@push('styles')
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.owner-dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">
            <h3 class="dashboard-title">{{ __('Booking Requests') }}</h3>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Villa Name') }}</th>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Booked by') }}</th>
                            <th scope="col">{{ __('Total Amount') }}</th>
                            <th scope="col">{{ __('Dates') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col" class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td scope="row">
                                    <div class="booking-villa-listing-item">
                                        <figure>
                                            <img src="{{ asset($booking->villa->villa_images->first()->image ?? '/frontend/assets/images/villa-details-2.png') }}"
                                                alt=" client" />
                                        </figure>
                                        <div class="listing-item-name">
                                            {{ $booking->villa->title ?? '' }}
                                        </div>
                                    </div>
                                </td>
                                <td>#{{ $booking->booking_id }}</td>
                                <td>
                                    <div class="booking-villa-listing-author">
                                        <figure>
                                            <img src="{{ asset($booking->user->avatar ?? '/frontend/default-avatar-profile.jpg') }}"
                                                alt="" />
                                        </figure>
                                        <div class="booking-villa-listing-author-name">
                                            {{ $booking->name ?? '' }}
                                        </div>
                                    </div>
                                </td>
                                <td>₪{{ $booking->total_amount }}</td>
                                <td>{{ $booking->created_at->format('m/d/y') }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>
                                    <select class="select2" name="" id=""
                                        onchange="showStatusChangeAlert({{ $booking->id }}, this.value)" style="padding: 5px; border-radius: 10px;">
                                        <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>
                                            {{ __('Completed') }}</option>
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                            {{ __('Pending') }}</option>
                                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                            {{ __('Cancelled') }}</option>
                                    </select>

                                </td>
                                <td>
                                    <a href="{{ route('owner.booking.view', $booking->id) }}" type="button" class="status accept">
                                        {{ __('View') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper">
                <!-- Previous Button -->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function showStatusChangeAlert(bookingId, newStatus) {
            Swal.fire({
                title: "{{ __('Are you sure?') }}",
                text: "{{ __('You want to update the status?') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('Yes, update it!') }}",
                confirmButtonColor: '#0d6efd',
                cancelButtonText: "{{ __('No, cancel!') }}",
                cancelButtonColor: '#ff0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request
                    $.ajax({
                        url: "{{ route('change.bookings.status', ':id') }}".replace(':id', bookingId),
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: newStatus,
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire("{{ __('Updated!') }}", response.message, 'success')
                                .then(() => {
                                    location.reload();
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire("{{ __('Error!') }}", "{{ __('Something went wrong. Please try again.') }}", 'error');
                        }
                    });
                }
            });
        }
    </script>
@endpush
