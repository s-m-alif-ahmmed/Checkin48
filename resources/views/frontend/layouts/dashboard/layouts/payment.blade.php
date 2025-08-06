@extends('frontend.layouts.dashboard.app')

@section('title', 'Payment')

@push('styles')
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .main-content {
                display: none;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">
            <h3 class="dashboard-title">{{ __('Payment History') }}</h3>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Type') }}</th>
                            <th scope="col">{{ __('Payment ID') }}</th>
                            <th scope="col">{{ __('Total Amount') }}</th>
                            <th scope="col">{{ __('Online Payment') }}</th>
                            <th scope="col">{{ __('Hand Cash') }}</th>
                            <th scope="col">{{ __('Dates') }}</th>
                            <th scope="col">{{ __('Payment Method') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col" class="text-center">{{ __('Invoice') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td scope="row">{{ __('Invoice') }}</td>
                                <td>#{{ $booking->booking_id }}</td>
                                <td>₪{{ $booking->total_amount }}</td>
                                <td>₪{{ $booking->online_payment }}</td>
                                <td>₪{{ $booking->hand_cash }}</td>
                                <td>{{ $booking->created_at->format('m/d/y') }}</td>
                                <td>{{ $booking->payment_method ?? 'N/A' }}</td>
                                <td>{{ $booking->email }}</td>
                                <td class="text-center">
                                    <a class="download-invoice-link me-2"
                                        href="{{ route('booking.invoice.view', $booking->id) }}">
                                        <i class="bi bi-eye-fill"></i>
                                        <div class="status download">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16"
                                                viewBox="0 0 17 16" fill="none">
                                                <g clip-path="url(#clip0_13426_3443)">
                                                    <path
                                                        d="M12.1992 13.3812C12.3629 13.0252 12.6546 12.7642 13.0071 12.6412V11.3125C13.0071 10.5371 13.638 9.90625 14.4134 9.90625H15.2188C15.3785 9.90619 15.537 9.93345 15.6875 9.98687V1.40625C15.6875 0.630844 15.0567 0 14.2812 0H4.90625C4.13084 0 3.5 0.630844 3.5 1.40625V2.09375H11.5625C12.5964 2.09375 13.4375 2.93488 13.4375 3.96875V8.34375C13.4375 9.37762 12.5964 10.2188 11.5625 10.2188H3.5V14.5938C3.5 15.3692 4.13084 16 4.90625 16H13.3657L12.4091 14.8839C12.0474 14.4619 11.9669 13.8861 12.1992 13.3812Z"
                                                        fill="#00C981" />
                                                    <path
                                                        d="M16.1553 13.5H15.6875V11.3125C15.6875 11.0536 15.4776 10.8438 15.2187 10.8438H14.4133C14.1545 10.8438 13.9446 11.0536 13.9446 11.3125V13.5H13.4767C13.0763 13.5 12.8602 13.9697 13.1208 14.2738L14.4601 15.8363C14.6472 16.0546 14.9848 16.0546 15.1719 15.8363L16.5112 14.2738C16.7718 13.9697 16.5558 13.5 16.1553 13.5ZM6.62533 4.90625H6.05333C6.05399 5.28816 6.05502 5.91256 6.05502 6.15278C6.05502 6.43913 6.05683 7.03647 6.05802 7.40472C6.26102 7.40356 6.51186 7.40175 6.64577 7.39941C7.28408 7.38825 7.5748 6.74716 7.5748 6.15625C7.5748 5.55197 7.32539 4.90625 6.62533 4.90625ZM3.59111 4.90625H3.03442C3.03502 5.11312 3.03567 5.36559 3.03567 5.47563C3.03567 5.60538 3.0368 5.84859 3.0378 6.04712C3.23046 6.04609 3.46414 6.04503 3.59111 6.04503C3.90911 6.04503 4.17777 5.78428 4.17777 5.47566C4.17777 5.16703 3.90911 4.90625 3.59111 4.90625Z"
                                                        fill="#00C981" />
                                                    <path
                                                        d="M12.5 8.34375V3.96875C12.5 3.45097 12.0803 3.03125 11.5625 3.03125H1.5625C1.04472 3.03125 0.625 3.45097 0.625 3.96875V8.34375C0.625 8.86153 1.04472 9.28125 1.5625 9.28125H11.5625C12.0803 9.28125 12.5 8.86153 12.5 8.34375ZM3.59116 6.67C3.46362 6.67 3.22678 6.67109 3.03353 6.67212V7.71875C3.03353 7.89134 2.89363 8.03125 2.72103 8.03125C2.54844 8.03125 2.40853 7.89134 2.40853 7.71875V4.59475C2.40841 4.55363 2.4164 4.51289 2.43205 4.47487C2.4477 4.43684 2.4707 4.40228 2.49973 4.37316C2.52876 4.34404 2.56325 4.32094 2.60122 4.30517C2.6392 4.2894 2.67991 4.28129 2.72103 4.28128H3.59116C4.25925 4.28128 4.80281 4.81709 4.80281 5.47566C4.80281 6.13422 4.25928 6.67 3.59116 6.67ZM7.80172 7.44203C7.52012 7.80953 7.11353 8.01631 6.65675 8.02431C6.40513 8.02872 5.77456 8.03116 5.74784 8.03125H5.74666C5.66397 8.03125 5.58465 7.99848 5.52608 7.94012C5.46751 7.88176 5.43445 7.80256 5.43416 7.71987C5.43412 7.70853 5.43009 6.58241 5.43009 6.15278C5.43009 5.79647 5.42784 4.59434 5.42784 4.59431C5.42777 4.55323 5.43579 4.51253 5.45146 4.47455C5.46713 4.43657 5.49013 4.40206 5.51915 4.37298C5.54818 4.3439 5.58265 4.32083 5.6206 4.30509C5.65855 4.28935 5.69923 4.28125 5.74031 4.28125H6.62537C7.56712 4.28125 8.19984 5.03475 8.19984 6.15625C8.19984 6.65031 8.05847 7.10694 7.80172 7.44203ZM10.4039 4.90625H9.44984V5.81416H10.3033C10.4759 5.81416 10.6158 5.95406 10.6158 6.12666C10.6158 6.29925 10.4759 6.43916 10.3033 6.43916H9.44984V7.71875C9.44984 7.89134 9.30994 8.03125 9.13734 8.03125C8.96475 8.03125 8.82484 7.89134 8.82484 7.71875V4.59375C8.82485 4.51087 8.85778 4.43139 8.91638 4.37279C8.97499 4.31419 9.05447 4.28126 9.13734 4.28125H10.4039C10.5765 4.28125 10.7164 4.42116 10.7164 4.59375C10.7164 4.76634 10.5765 4.90625 10.4039 4.90625Z"
                                                        fill="#00C981" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_13426_3443">
                                                        <rect width="16" height="16" fill="white"
                                                            transform="translate(0.625)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span>{{ __('View') }}</span>
                                        </div>
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
@endpush
