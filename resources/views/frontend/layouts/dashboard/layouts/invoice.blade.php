@extends('frontend.layouts.dashboard.app')

@section('title', 'Payment')

@push('styles')
    <style>
        #invoice .invoices {
            background-color: hsl(0, 33%, 99%);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    <!-- Main layout start -->
    <div class="main-content">
        {{--  Header --}}
        @include('frontend.layouts.dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">
            <section class="py-3 py-md-5 mb-10">
                <div class="container" id="invoice">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 invoices">
                            <div class="row gy-3 mb-3">
                                <div style="float:right;text-align:right;">
                                    <button class="btn btn-primary" id="print-button" onclick="printInvoice()">Print</button>
                                </div>
                                <div class="col-6">
                                    <h2 class="text-uppercase text-endx m-0">Invoice</h2>
                                </div>
                                <div class="col-6">
                                    <a class="d-block text-end" href="#!">
                                        <img src="{{ asset($systemSetting->logo ?? '/frontend/eVento_logo.png') }}"
                                             class="img-fluid" alt="Invoice Logo" width="135" height="44" />
                                    </a>
                                </div>
                                <div class="col-12">
                                    <h4>From</h4>
                                    <address>
                                        @if($user->name)
                                            <strong>{{ $user->name }}</strong><br />
                                        @endif
                                        @if($user->email)
                                            {{ $user->email }}<br />
                                        @endif
                                        @if($user->number)
                                            Phone: {{ $user->number }}<br />
                                        @endif
                                        @if(request()->getHost())
                                            website: {{ request()->getHost() }}<br />
                                        @endif
                                    </address>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 col-sm-6 col-md-6">
                                    <h4>Bill To</h4>
                                    <address>
                                        @if($booking->name)
                                            <strong>{{ $booking->name }}</strong><br/>
                                        @endif
                                        @if($booking->email)
                                            {{ $booking->email }}<br/>
                                        @endif
                                        @if($booking->number)
                                            Phone: {{ $booking->number }}<br/>
                                        @endif
                                        @if($booking->country)
                                            Country: {{ $booking->country }}
                                        @endif
                                    </address>
                                </div>
                                <div class="col-8 col-sm-6 col-md-6">
                                    <h4 class="row">
                                        <span class="col-6">Invoice</span>
                                        <h4>
                                            <span class="col-6 text-sm-end">Id#{{ $booking->number }}</span>
                                        </h4>
                                    </h4>
                                    <div class="row">
                                        <span class="col-6">Check In</span>
                                        <span class="col-4 text-sm-end">{{ $booking->check_in_date }}</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Check Out</span>
                                        <span class="col-4 text-sm-end">{{ $booking->check_out_date }}</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Nights</span>
                                        <span class="col-4 text-sm-end">{{ $booking->nights }}</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Guest</span>
                                        <span class="col-4 text-sm-end">{{ $booking->guest_count }}</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Online Payment</span>
                                        <span class="col-4 text-sm-end">
                                            @if($booking->status == 'pending')
                                                {{ ucfirst($booking->payment_status) }}
                                            @elseif($booking->status == 'approved')
                                                {{ ucfirst($booking->payment_status) }}
                                            @elseif($booking->status == 'cancelled')
                                                Cancelled
                                            @endif
                                        </span>
                                    </div>
                                    @if($booking->hand_cash > 0)
                                        <div class="row">
                                            <span class="col-6">Hand Cash</span>
                                            <span class="col-4 text-sm-end">
                                                @if($booking->status == 'pending')
                                                    Unpaid
                                                @elseif($booking->status == 'approved')
                                                    Paid
                                                @elseif($booking->status == 'cancelled')
                                                    Cancelled
                                                @endif
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="text-uppercase">#</th>
                                                <th scope="col" class="text-uppercase">Villa Name</th>
                                                <th scope="col" class="text-uppercase text-end">Price</th>
                                                <th scope="col" class="text-uppercase text-end">Subtotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $booking->villa->title ?? 'Villa' }}</td>
                                                <td class="text-end">₪{{ number_format($booking->villa_day_price, 2) }}
                                                </td>
                                                <td class="text-end">₪{{ number_format($booking->subtotal, 2) }}</td>
                                            </tr>
                                            @if($booking->loyalty_point_use > 0)
                                                <tr>
                                                    <td colspan="3" class="text-end">Loyalty Point Discount</td>
                                                    <td class="text-end">₪{{ number_format($booking->loyalty_point_use, 2) }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td colspan="3" class="text-end">Tax ({{ $booking->tax_percent }}%)</td>
                                                <td class="text-end">₪{{ number_format($booking->tax, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end text-uppercase fw-bold">Total</td>
                                                <td class="text-end fw-bold">
                                                    ₪{{ number_format($booking->total_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end text-uppercase fw-bold">Online Payment</td>
                                                <td class="text-end fw-bold">
                                                    ₪{{ number_format($booking->online_payment, 2) }}</td>
                                            </tr>
                                            @if($booking->hand_cash > 0)
                                                <tr>
                                                    <td colspan="3" class="text-end text-uppercase fw-bold">Hand Cash</td>
                                                    <td class="text-end fw-bold">
                                                        ₪{{ number_format($booking->hand_cash, 2) }}</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- main section end -->
    </div>
    <!-- Main layout end -->


@endsection

@push('scripts')
    <script>
        function downloadPDF() {
            document.getElementById('print-button').style.display = 'none';
            const element = document.getElementById('invoice');
            html2pdf()
                .from(element)
                .set({
                    margin: 1,
                    filename: 'invoice.pdf',
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        orientation: 'portrait'
                    }
                })
                .save()
                .then(function() {
                    // After download, you can optionally show the print button again if needed
                    document.getElementById('print-button').style.display = '';
                });
        }

        document.querySelector('button[onclick="printInvoice()"]').onclick = downloadPDF;
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
@endpush
