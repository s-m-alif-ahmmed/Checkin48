@extends('frontend.layouts.owner-dashboard.app')

@section('title', 'Booking Details')

@push('styles')
@endpush

@section('content')

     <!-- Main layout start -->
     <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.owner-dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">
            <div class="booking-details-container">
                <h1 class="text-center mb-3">{{ __('Booking Details') }}</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3>{{ __('Booking ID') }}: #{{ $booking->booking_id }}</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Villa Name') }}:</strong> {{ $booking->villa->title ?? '' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Customer Name') }}:</strong> {{ $booking->user->name ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Customer Email') }}:</strong> {{ $booking->user->email ?? '' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Total Guest') }}:</strong> {{ $booking->guest_count ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Booking Type') }}:</strong> {{ $booking->priceType->name ?? '' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Total Nights') }}:</strong> {{ $booking->nights ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Per nights') }}:</strong> ₪{{ $booking->villa_day_price ?? '' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Booking Date') }}:</strong> {{ $booking->created_at->format('m/d/Y') ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Check-in Date') }}:</strong> {{ $booking->check_in_date ?? '' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Check-out Date') }}:</strong> {{ $booking->check_out_date ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Tax') }}:</strong> {{ $booking->tax_percent ?? '' }}%</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Tax Amount') }}:</strong> ₪{{ $booking->tax ?? '' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Hand Cash') }}:</strong> ₪{{ $booking->hand_cash ?? 0 }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Total Amount') }}:</strong> ₪{{ $booking->total_amount ?? 0 }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Online Payment') }}:</strong> ₪{{ $booking->online_payment ?? 0 }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Booking Status') }}:</strong>
                                                @if($booking->status == 'approved')
                                                    {{ $booking->status ? __('Completed') : ''}}
                                                @elseif($booking->status == 'pending')
                                                    {{ $booking->status ? __('Pending') : ''}}
                                                @elseif($booking->status == 'cancelled')
                                                    {{ $booking->status ? __('Cancelled') : ''}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Online Payment Status') }}:</strong>
                                                @if($booking->status == 'approved')
                                                    @if($booking->payment_status == 'paid')
                                                        {{ __('Paid') }}
                                                    @elseif($booking->payment_status == 'unpaid')
                                                        {{ __('Unpaid') }}
                                                    @endif
                                                @elseif($booking->status == 'pending')
                                                    @if($booking->payment_status == 'paid')
                                                        {{ __('Paid') }}
                                                    @elseif($booking->payment_status == 'unpaid')
                                                        {{ __('Unpaid') }}
                                                    @endif
                                                @elseif($booking->status == 'cancelled')
                                                    @if($booking->payment_status == 'paid')
                                                        {{ __('Cancelled') }}
                                                    @elseif($booking->payment_status == 'unpaid')
                                                        {{ __('Cancelled') }}
                                                    @endif
                                                @endif
                                            </p>
                                        </div>
                                        @if($booking->hand_cash > 0)
                                            <div class="col-md-6">
                                                <p><strong>{{ __('Hand Cash Payment Status') }}:</strong>
                                                    @if ($booking->status == 'approved')
                                                        @if($booking->hand_cash > 0)
                                                            {{ __('Paid') }}
                                                        @else
                                                            {{ __('N/A') }}
                                                        @endif
                                                    @elseif($booking->status == 'pending')
                                                        @if($booking->hand_cash > 0)
                                                            {{ __('Unpaid') }}
                                                        @else
                                                            {{ __('N/A') }}
                                                        @endif
                                                    @elseif($booking->status == 'cancelled')
                                                        @if($booking->hand_cash > 0)
                                                            {{ __('Cancelled') }}
                                                        @else
                                                            {{ __('Cancelled') }}
                                                        @endif
                                                    @endif
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                    <hr>
                                    <h3>{{ __('Villa Images') }}:</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @forelse ($booking->villa->villa_images as $image)
                                                <img class="img-fluid" src="{{ asset($image->image ?? '') }}" alt="{{ $booking->villa->title }}" style="width: auto; height: 100px; border-radius: 5px; margin: 5px;">
                                            @empty
                                                <p class="text-center">{{ __('No images available for this villa.') }}</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('owner.booking') }}" class="btn btn-primary">{{ __('Back to Bookings') }}</a>
                </div>
        <!-- main section end -->
    </div>
    <!-- Main layout end -->

@endsection

 @push('scripts')

@endpush
