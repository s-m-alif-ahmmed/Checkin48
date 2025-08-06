@extends('frontend.layouts.owner-dashboard.app')

@section('title', 'Payment Option')

@push('styles')
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.owner-dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">
            <div class="dashboard-card">
                <div class="row py-md-3 py-lg-5">
                    <div class="col-md-5">
                        <a href="{{ route('owner.payment') }}" class="back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                fill="none">
                                <path
                                    d="M5.83398 14.0007H22.1673M5.83398 14.0007L10.5007 18.6673M5.83398 14.0007L10.5007 9.33398"
                                    stroke="#1D2635" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>{{ __('Back to Payments') }}</span>
                        </a>
                        <div class="withdraw-title mt-xl-4 mt-2">{{ __('Withdraw balance') }}</div>
                        <div class="withdraw-tagline mt-xl-5 mt-4">
                            {{ __('Available for withdrawal') }}
                        </div>
                        <div class="withdraw-price mt-2">{{ __('Shekel') }} ₪{{ number_format($total_avalaible_withdraw, 2) }}
                        </div>
                        <div class="withdraw-tagline mt-xl-5 mt-4">
                            {{ __('Type Withdraw Amount') }}
                        </div>
                        <div class="withdraw-options">
                          {{-- withdraw form start --}}
                          <form action="{{ route('withdraw.request') }}" method="POST">
                            @csrf

                              <input class="" type="number" name="amount" placeholder="{{ __('Enter Amount') }}" style="border-radius: 8px; padding: 10px; margin-right: 10px;" />

                            @error('amount')
                              <br>
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                              <br>
                            <button type="submit" class="button button-pri mt-4">
                                {{ __('Request Withdrawal') }}
                            </button>
                        </form>
                         {{-- withdraw form end --}}
                        </div>
                        <div class="col-md-6">
                            <img class="withdraw-img img-fluid" src="{{ asset('/frontend/assets/images/withdraw-img.png') }}" alt="withdraw" />
                        </div>
                    </div>
                </div>
        </main>
        <!-- main section end -->
    </div>
    <!-- Main layout end -->

@endsection

@push('scripts')
@endpush
