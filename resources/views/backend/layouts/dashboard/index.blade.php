@extends('backend.app')

@section('title', 'Dashboard')

@section('content')
    {{--     PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    {{--     PAGE-HEADER --}}


    <div class="row">

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_amount }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Collected Amount</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_online_payment }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Online Payment</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_tax }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Tax</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_remaining }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Remaining Amount</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_villa_owner_amount }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Villa Owner Amount</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_hand_cash }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Villa Owner Hand Cash</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">--}}
{{--            <div class="card-link">--}}
{{--                <div class="card overflow-hidden">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <h3 class="mb-2 fw-semibold">₪{{ $villa_owner_remaining }}</h3>--}}
{{--                                <p class="text-muted fs-13 mb-0">Total Villa Owner Rest Amount</p>--}}
{{--                            </div>--}}
{{--                            <div class="col col-auto top-icn dash">--}}
{{--                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >--}}
{{--                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_profit }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Profit(15%)</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_loyalty_discount }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Loyalty Discount</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">₪{{ $total_remaining_profit }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Remaining Profit</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >
                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">--}}
{{--            <div class="card-link">--}}
{{--                <div class="card overflow-hidden">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <h3 class="mb-2 fw-semibold">{{ $total_withdraw_request_count }}</h3>--}}
{{--                                <p class="text-muted fs-13 mb-0">Total pending Withdraw Request</p>--}}
{{--                            </div>--}}
{{--                            <div class="col col-auto top-icn dash">--}}
{{--                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >--}}
{{--                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">--}}
{{--            <div class="card-link">--}}
{{--                <div class="card overflow-hidden">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <h3 class="mb-2 fw-semibold">₪{{ number_format($total_withdraw_request_amount, 2 ?? 0) }}</h3>--}}
{{--                                <p class="text-muted fs-13 mb-0">Total Pending Withdraw Request Amount</p>--}}
{{--                            </div>--}}
{{--                            <div class="col col-auto top-icn dash">--}}
{{--                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" >--}}
{{--                                        <path d="M32 32C14.3 32 0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32L64 96l128 0c35.3 0 64 28.7 64 64l0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-70.7-57.3-128-128-128L32 32zM320 480c70.7 0 128-57.3 128-128l0-288c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 288c0 35.3-28.7 64-64 64l-128 0 0-224c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l160 0z"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $total_users }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Users</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                        <g data-name="28-Agency">
                                            <path style="fill:#ffee6e" d="M47 11h10v2H47z" />
                                            <path transform="rotate(-29.745 50.5 6)" style="fill:#ffee6e"
                                                  d="M46.469 5h8.062v2h-8.062z" />
                                            <path transform="rotate(-60.255 50.5 18)" style="fill:#ffee6e"
                                                  d="M49.5 13.969h2v8.062h-2z" />
                                            <path style="fill:#ffee6e" d="M7 11h10v2H7z" />
                                            <path transform="rotate(-60.255 13.5 6)" style="fill:#ffee6e"
                                                  d="M12.5 1.969h2v8.062h-2z" />
                                            <path transform="rotate(-29.745 13.499 18)" style="fill:#ffee6e"
                                                  d="M9.469 17h8.062v2H9.469z" />
                                            <path
                                                d="m36.707 26.293-1.414 1.414L37.586 30H33v-6h-2v6h-4.586l2.293-2.293-1.414-1.414-4 4A.974.974 0 0 0 23.3 31.7l-.006.006 4 4 1.414-1.414L26.414 32h11.172l-2.293 2.293 1.414 1.414 4-4-.007-.007a.974.974 0 0 0 .006-1.408z"
                                                style="fill:#afb4c8" />
                                            <path style="fill:#b2876d" d="M26 13h4v8h-4z" />
                                            <path style="fill:#966857" d="M28 13h2v8h-2zM27 1v2.73l-4 2.18V1h4z" />
                                            <path style="fill:#b2876d" d="M25 1h-2v4.91l2-1.09V1z" />
                                            <path style="fill:#a3d4ff" d="M33 13h5v4h-5z" />
                                            <path style="fill:#65b1fc" d="M33 15h5v2h-5z" />
                                            <path d="M38 13h-5v4h5zm3-3.09V21H30v-8h-4v8h-3V9.91L32 5z"
                                                  style="fill:#f7f7f7" />
                                            <path style="fill:#cfcfcf" d="m32 5-9 4.91v2L32 7l9 4.91v-2L32 5z" />
                                            <path style="fill:#ff936b"
                                                  d="M27 3.73 32 1l11 6v4l-2-1.09L32 5l-9 4.91L21 11V7l2-1.09 4-2.18z" />
                                            <path style="fill:#ff7045"
                                                  d="m32 3-9 4.91L21 9v2l2-1.09L32 5l9 4.91L43 11V9l-2-1.09L32 3z" />
                                            <path d="M43 31v2h3c7 0 7-3 7-3a2.938 2.938 0 0 0 3 3h3v-2a8 8 0 0 0-16 0z"
                                                  style="fill:#966857" />
                                            <path
                                                d="M53 28a2.938 2.938 0 0 0 3 3h3v2h-3a2.938 2.938 0 0 1-3-3s0 3-7 3h-3v-2h3c7 0 7-3 7-3z"
                                                style="fill:#8d5c4d" />
                                            <path style="fill:#e9edf5" d="M39 47v16h24V47l-10-2-2 2-2-2-10 2z" />
                                            <path style="fill:#cdd2e1"
                                                  d="m49 45 2 2 2-2 10 2v3l-10-2-2 2-2-2-10 2v-3l10-2z" />
                                            <path
                                                d="M49 42.59V45l2 2 2-2v-2.41a5.083 5.083 0 0 1-4 0zM56 33v5h1a2.006 2.006 0 0 0 2-2v-3zM43 33v3a2.006 2.006 0 0 0 2 2h1v-5z"
                                                style="fill:#faa68e" />
                                            <path
                                                d="M49 42.59a5 5 0 0 0 5.54-1.05A5.022 5.022 0 0 0 56 38v-5a2.938 2.938 0 0 1-3-3s0 3-7 3v5a5.029 5.029 0 0 0 3 4.59z"
                                                style="fill:#ffcdbe" />
                                            <path
                                                d="M53 30a2.938 2.938 0 0 0 3 3v2a2.938 2.938 0 0 1-3-3s0 3-7 3v-2c7 0 7-3 7-3z"
                                                style="fill:#ffbeaa" />
                                            <path style="fill:#a3d4ff" d="m50 52-1 6 2 2 2-2-1-6h-2z" />
                                            <path style="fill:#65b1fc" d="m48 50 2 2h2l2-2-3-3-3 3z" />
                                            <path style="fill:#afb4c8"
                                                  d="M46.22 45.56 48 50l3-3-2-2-2.78.56zM51 47l3 3 1.78-4.44L53 45l-2 2z" />
                                            <path d="M5 31v2h3c7 0 7-3 7-3a2.938 2.938 0 0 0 3 3h3v-2a8 8 0 0 0-16 0z"
                                                  style="fill:#966857" />
                                            <path
                                                d="M15 28a2.938 2.938 0 0 0 3 3h3v2h-3a2.938 2.938 0 0 1-3-3s0 3-7 3H5v-2h3c7 0 7-3 7-3z"
                                                style="fill:#8d5c4d" />
                                            <path style="fill:#9c9c9c" d="M1 47v16h24V47l-10-2-2 2-2-2-10 2z" />
                                            <path style="fill:#cfcfcf"
                                                  d="m11 45 2 2 2-2 10 2v3l-10-2-2 2-2-2-10 2v-3l10-2z" />
                                            <path
                                                d="M11 42.59V45l2 2 2-2v-2.41a5.083 5.083 0 0 1-4 0zM18 33v5h1a2.006 2.006 0 0 0 2-2v-3zM5 33v3a2.006 2.006 0 0 0 2 2h1v-5z"
                                                style="fill:#faa68e" />
                                            <path
                                                d="M11 42.59a5 5 0 0 0 5.54-1.05A5.022 5.022 0 0 0 18 38v-5a2.938 2.938 0 0 1-3-3s0 3-7 3v5a5.029 5.029 0 0 0 3 4.59z"
                                                style="fill:#ffcdbe" />
                                            <path
                                                d="M15 30a2.938 2.938 0 0 0 3 3v2a2.938 2.938 0 0 1-3-3s0 3-7 3v-2c7 0 7-3 7-3z"
                                                style="fill:#ffbeaa" />
                                            <path
                                                d="M25.2 46.02 16 44.18v-.992A6.007 6.007 0 0 0 18.91 39H19a3 3 0 0 0 3-3v-5a9 9 0 0 0-18 0v5a3 3 0 0 0 3 3h.09A6.007 6.007 0 0 0 10 43.188v.992L.8 46.02A1 1 0 0 0 0 47v16a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V47a1 1 0 0 0-.8-.98zM19 37v-3h1v2a1 1 0 0 1-1 1zM6 36v-2h1v3a1 1 0 0 1-1-1zm2-4H6v-1a7 7 0 0 1 14 0v1h-2a1.883 1.883 0 0 1-2-2 1.019 1.019 0 0 0-1-1.023.979.979 0 0 0-1 .966v.015c-.017.11-.414 2.042-6 2.042zm1 1.979c2.99-.129 4.7-.84 5.687-1.628A3.963 3.963 0 0 0 17 33.874V38a4 4 0 0 1-8 0zM13 44a6 6 0 0 0 1-.09v.676l-1 1-1-1v-.676a6 6 0 0 0 1 .09zM2 47.819l8.671-1.734L12 47.414V62H2zM24 62H14V47.414l1.329-1.329L24 47.819zM63.2 46.02 54 44.18v-.992A6.007 6.007 0 0 0 56.91 39H57a3 3 0 0 0 3-3v-5a9 9 0 0 0-18 0v5a3 3 0 0 0 3 3h.09A6.007 6.007 0 0 0 48 43.188v.992l-9.2 1.84a1 1 0 0 0-.8.98v16a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V47a1 1 0 0 0-.8-.98zm-14.525.065.915.915-1.221 1.221L47.6 46.3zm3.258 11.572-.933.929-.929-.929.776-4.657h.306zM51.586 51h-1.172l-1-1L51 48.414 52.586 50zm.828-4 .915-.915 1.071.215-.768 1.921zM57 37v-3h1v2a1 1 0 0 1-1 1zm-13-1v-2h1v3a1 1 0 0 1-1-1zm2-4h-2v-1a7 7 0 0 1 14 0v1h-2a1.883 1.883 0 0 1-2-2 1.019 1.019 0 0 0-1-1.023.979.979 0 0 0-1 .966v.015c-.017.11-.414 2.042-6 2.042zm1 1.979c2.99-.129 4.7-.84 5.687-1.628A3.963 3.963 0 0 0 55 33.874V38a4 4 0 0 1-8 0zM51 44a6 6 0 0 0 1-.09v.676l-1 1-1-1v-.676a6 6 0 0 0 1 .09zm-11 3.819 5.6-1.12 1.469 3.672a.978.978 0 0 0 .227.331l-.005.005 1.636 1.636-.915 5.493a1 1 0 0 0 .279.871L50 60.414V62H40zM62 62H52v-1.586l1.707-1.707a1 1 0 0 0 .279-.871l-.915-5.493 1.636-1.636-.007-.007a.978.978 0 0 0 .227-.331L56.4 46.7l5.6 1.12zM20.489 11.86a1 1 0 0 0 .99.018l.521-.285V21a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-9.407l.521.285A1 1 0 0 0 44 11V7a1 1 0 0 0-.521-.878l-11-6a1 1 0 0 0-.958 0L28 2.043V1a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v4.316l-1.479.806A1 1 0 0 0 20 7v4a1 1 0 0 0 .489.86zM27 20v-6h2v6zm13 0h-9v-7a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v7h-1v-9.5l8-4.364 8 4.364zM24 2h2v1.134l-2 1.091zm-2 5.594 10-5.455 10 5.455v1.721l-9.521-5.193a1 1 0 0 0-.958 0L22 9.315z" />
                                            <path
                                                d="M32 17a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-5a1 1 0 0 0-1 1zm2-3h3v2h-3zM47 11h10v2H47zM46.504 7.132l7-4 .992 1.737-7 4zM46.504 16.869l.993-1.737 7 4-.993 1.736zM7 11h10v2H7zM9.504 4.868l.993-1.737 7 4-.993 1.737zM9.504 19.131l7-4 .992 1.737-7 4zM40.7 31.7a.974.974 0 0 0 .006-1.408l-4-4-1.414 1.414L37.586 30H33v-6h-2v6h-4.586l2.293-2.293-1.414-1.414-4 4A.974.974 0 0 0 23.3 31.7l-.006.006 4 4 1.414-1.414L26.414 32h11.172l-2.293 2.293 1.414 1.414 4-4z" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $total_villa_users }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Villa Owners</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                        <g data-name="28-Agency">
                                            <path style="fill:#ffee6e" d="M47 11h10v2H47z" />
                                            <path transform="rotate(-29.745 50.5 6)" style="fill:#ffee6e"
                                                  d="M46.469 5h8.062v2h-8.062z" />
                                            <path transform="rotate(-60.255 50.5 18)" style="fill:#ffee6e"
                                                  d="M49.5 13.969h2v8.062h-2z" />
                                            <path style="fill:#ffee6e" d="M7 11h10v2H7z" />
                                            <path transform="rotate(-60.255 13.5 6)" style="fill:#ffee6e"
                                                  d="M12.5 1.969h2v8.062h-2z" />
                                            <path transform="rotate(-29.745 13.499 18)" style="fill:#ffee6e"
                                                  d="M9.469 17h8.062v2H9.469z" />
                                            <path
                                                d="m36.707 26.293-1.414 1.414L37.586 30H33v-6h-2v6h-4.586l2.293-2.293-1.414-1.414-4 4A.974.974 0 0 0 23.3 31.7l-.006.006 4 4 1.414-1.414L26.414 32h11.172l-2.293 2.293 1.414 1.414 4-4-.007-.007a.974.974 0 0 0 .006-1.408z"
                                                style="fill:#afb4c8" />
                                            <path style="fill:#b2876d" d="M26 13h4v8h-4z" />
                                            <path style="fill:#966857" d="M28 13h2v8h-2zM27 1v2.73l-4 2.18V1h4z" />
                                            <path style="fill:#b2876d" d="M25 1h-2v4.91l2-1.09V1z" />
                                            <path style="fill:#a3d4ff" d="M33 13h5v4h-5z" />
                                            <path style="fill:#65b1fc" d="M33 15h5v2h-5z" />
                                            <path d="M38 13h-5v4h5zm3-3.09V21H30v-8h-4v8h-3V9.91L32 5z"
                                                  style="fill:#f7f7f7" />
                                            <path style="fill:#cfcfcf" d="m32 5-9 4.91v2L32 7l9 4.91v-2L32 5z" />
                                            <path style="fill:#ff936b"
                                                  d="M27 3.73 32 1l11 6v4l-2-1.09L32 5l-9 4.91L21 11V7l2-1.09 4-2.18z" />
                                            <path style="fill:#ff7045"
                                                  d="m32 3-9 4.91L21 9v2l2-1.09L32 5l9 4.91L43 11V9l-2-1.09L32 3z" />
                                            <path d="M43 31v2h3c7 0 7-3 7-3a2.938 2.938 0 0 0 3 3h3v-2a8 8 0 0 0-16 0z"
                                                  style="fill:#966857" />
                                            <path
                                                d="M53 28a2.938 2.938 0 0 0 3 3h3v2h-3a2.938 2.938 0 0 1-3-3s0 3-7 3h-3v-2h3c7 0 7-3 7-3z"
                                                style="fill:#8d5c4d" />
                                            <path style="fill:#e9edf5" d="M39 47v16h24V47l-10-2-2 2-2-2-10 2z" />
                                            <path style="fill:#cdd2e1"
                                                  d="m49 45 2 2 2-2 10 2v3l-10-2-2 2-2-2-10 2v-3l10-2z" />
                                            <path
                                                d="M49 42.59V45l2 2 2-2v-2.41a5.083 5.083 0 0 1-4 0zM56 33v5h1a2.006 2.006 0 0 0 2-2v-3zM43 33v3a2.006 2.006 0 0 0 2 2h1v-5z"
                                                style="fill:#faa68e" />
                                            <path
                                                d="M49 42.59a5 5 0 0 0 5.54-1.05A5.022 5.022 0 0 0 56 38v-5a2.938 2.938 0 0 1-3-3s0 3-7 3v5a5.029 5.029 0 0 0 3 4.59z"
                                                style="fill:#ffcdbe" />
                                            <path
                                                d="M53 30a2.938 2.938 0 0 0 3 3v2a2.938 2.938 0 0 1-3-3s0 3-7 3v-2c7 0 7-3 7-3z"
                                                style="fill:#ffbeaa" />
                                            <path style="fill:#a3d4ff" d="m50 52-1 6 2 2 2-2-1-6h-2z" />
                                            <path style="fill:#65b1fc" d="m48 50 2 2h2l2-2-3-3-3 3z" />
                                            <path style="fill:#afb4c8"
                                                  d="M46.22 45.56 48 50l3-3-2-2-2.78.56zM51 47l3 3 1.78-4.44L53 45l-2 2z" />
                                            <path d="M5 31v2h3c7 0 7-3 7-3a2.938 2.938 0 0 0 3 3h3v-2a8 8 0 0 0-16 0z"
                                                  style="fill:#966857" />
                                            <path
                                                d="M15 28a2.938 2.938 0 0 0 3 3h3v2h-3a2.938 2.938 0 0 1-3-3s0 3-7 3H5v-2h3c7 0 7-3 7-3z"
                                                style="fill:#8d5c4d" />
                                            <path style="fill:#9c9c9c" d="M1 47v16h24V47l-10-2-2 2-2-2-10 2z" />
                                            <path style="fill:#cfcfcf"
                                                  d="m11 45 2 2 2-2 10 2v3l-10-2-2 2-2-2-10 2v-3l10-2z" />
                                            <path
                                                d="M11 42.59V45l2 2 2-2v-2.41a5.083 5.083 0 0 1-4 0zM18 33v5h1a2.006 2.006 0 0 0 2-2v-3zM5 33v3a2.006 2.006 0 0 0 2 2h1v-5z"
                                                style="fill:#faa68e" />
                                            <path
                                                d="M11 42.59a5 5 0 0 0 5.54-1.05A5.022 5.022 0 0 0 18 38v-5a2.938 2.938 0 0 1-3-3s0 3-7 3v5a5.029 5.029 0 0 0 3 4.59z"
                                                style="fill:#ffcdbe" />
                                            <path
                                                d="M15 30a2.938 2.938 0 0 0 3 3v2a2.938 2.938 0 0 1-3-3s0 3-7 3v-2c7 0 7-3 7-3z"
                                                style="fill:#ffbeaa" />
                                            <path
                                                d="M25.2 46.02 16 44.18v-.992A6.007 6.007 0 0 0 18.91 39H19a3 3 0 0 0 3-3v-5a9 9 0 0 0-18 0v5a3 3 0 0 0 3 3h.09A6.007 6.007 0 0 0 10 43.188v.992L.8 46.02A1 1 0 0 0 0 47v16a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V47a1 1 0 0 0-.8-.98zM19 37v-3h1v2a1 1 0 0 1-1 1zM6 36v-2h1v3a1 1 0 0 1-1-1zm2-4H6v-1a7 7 0 0 1 14 0v1h-2a1.883 1.883 0 0 1-2-2 1.019 1.019 0 0 0-1-1.023.979.979 0 0 0-1 .966v.015c-.017.11-.414 2.042-6 2.042zm1 1.979c2.99-.129 4.7-.84 5.687-1.628A3.963 3.963 0 0 0 17 33.874V38a4 4 0 0 1-8 0zM13 44a6 6 0 0 0 1-.09v.676l-1 1-1-1v-.676a6 6 0 0 0 1 .09zM2 47.819l8.671-1.734L12 47.414V62H2zM24 62H14V47.414l1.329-1.329L24 47.819zM63.2 46.02 54 44.18v-.992A6.007 6.007 0 0 0 56.91 39H57a3 3 0 0 0 3-3v-5a9 9 0 0 0-18 0v5a3 3 0 0 0 3 3h.09A6.007 6.007 0 0 0 48 43.188v.992l-9.2 1.84a1 1 0 0 0-.8.98v16a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V47a1 1 0 0 0-.8-.98zm-14.525.065.915.915-1.221 1.221L47.6 46.3zm3.258 11.572-.933.929-.929-.929.776-4.657h.306zM51.586 51h-1.172l-1-1L51 48.414 52.586 50zm.828-4 .915-.915 1.071.215-.768 1.921zM57 37v-3h1v2a1 1 0 0 1-1 1zm-13-1v-2h1v3a1 1 0 0 1-1-1zm2-4h-2v-1a7 7 0 0 1 14 0v1h-2a1.883 1.883 0 0 1-2-2 1.019 1.019 0 0 0-1-1.023.979.979 0 0 0-1 .966v.015c-.017.11-.414 2.042-6 2.042zm1 1.979c2.99-.129 4.7-.84 5.687-1.628A3.963 3.963 0 0 0 55 33.874V38a4 4 0 0 1-8 0zM51 44a6 6 0 0 0 1-.09v.676l-1 1-1-1v-.676a6 6 0 0 0 1 .09zm-11 3.819 5.6-1.12 1.469 3.672a.978.978 0 0 0 .227.331l-.005.005 1.636 1.636-.915 5.493a1 1 0 0 0 .279.871L50 60.414V62H40zM62 62H52v-1.586l1.707-1.707a1 1 0 0 0 .279-.871l-.915-5.493 1.636-1.636-.007-.007a.978.978 0 0 0 .227-.331L56.4 46.7l5.6 1.12zM20.489 11.86a1 1 0 0 0 .99.018l.521-.285V21a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-9.407l.521.285A1 1 0 0 0 44 11V7a1 1 0 0 0-.521-.878l-11-6a1 1 0 0 0-.958 0L28 2.043V1a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v4.316l-1.479.806A1 1 0 0 0 20 7v4a1 1 0 0 0 .489.86zM27 20v-6h2v6zm13 0h-9v-7a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v7h-1v-9.5l8-4.364 8 4.364zM24 2h2v1.134l-2 1.091zm-2 5.594 10-5.455 10 5.455v1.721l-9.521-5.193a1 1 0 0 0-.958 0L22 9.315z" />
                                            <path
                                                d="M32 17a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-5a1 1 0 0 0-1 1zm2-3h3v2h-3zM47 11h10v2H47zM46.504 7.132l7-4 .992 1.737-7 4zM46.504 16.869l.993-1.737 7 4-.993 1.736zM7 11h10v2H7zM9.504 4.868l.993-1.737 7 4-.993 1.737zM9.504 19.131l7-4 .992 1.737-7 4zM40.7 31.7a.974.974 0 0 0 .006-1.408l-4-4-1.414 1.414L37.586 30H33v-6h-2v6h-4.586l2.293-2.293-1.414-1.414-4 4A.974.974 0 0 0 23.3 31.7l-.006.006 4 4 1.414-1.414L26.414 32h11.172l-2.293 2.293 1.414 1.414 4-4z" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $villas->count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Villas</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0"
                                         viewBox="0 0 512 512" xml:space="preserve" class="side-menu__icon">
                                        <g>
                                            <path
                                                d="M100.152 105.707c22.984 0 41.684-18.699 41.684-41.684S123.137 22.34 100.152 22.34c-22.969 0-41.655 18.699-41.655 41.683s18.687 41.684 41.655
                                 41.684zm0-67.351c14.153 0 25.668 11.515 25.668 25.667 0 14.153-11.515 25.668-25.668 25.668-14.138 0-25.64-11.515-25.64-25.668.001-14.152
                                  11.503-25.667 25.64-25.667zm115.743 84.458c-6.401-14.066-23.064-20.328-37.149-13.958a.652.652 0 0
                                   0-.026.012l-32.871 15.01-42.923-16.641c-14.455-5.585-30.748 1.61-36.3 15.982a27.675 27.675 0 0 0-1.919 9.863c-.223
                                    16.714-1.4 93.153-1.642 112.044l-50.167 73.235c-8.744 12.78-5.468 30.286 7.294 39.017 4.725 3.244 10.2 4.931 15.81 4.931 1.725
                                     0 3.462-.159 5.193-.482 7.364-1.372 13.755-5.529 18-11.715l54.493-79.601a27.977 27.977 0 0 0 4.467-9.316l5.53 2.577 1.828 57.592c.249
                                      7.498 3.401 14.448 8.875 19.57 5.474 5.123 12.604 7.814 20.096 7.557 7.486-.229 14.434-3.367 19.561-8.833 5.142-5.482 7.836-12.641
                                       7.586-20.145l-2.354-74.833c-.371-10.643-6.589-20.032-16.216-24.499l-43.246-20.141.448-25.872 15.939 6.176c7.105 2.877 15.183 2.709
                                        22.183-.47l43.588-19.895c6.831-3.108 12.04-8.691 14.669-15.721 2.625-7.02 2.358-14.639-.747-21.444zM201.64 138.65a11.984 11.984
                                         0 0 1-6.309 6.756l-43.582 19.893a11.977 11.977 0 0 1-9.566.189 7.211 7.211 0 0 0-.132-.052l-26.702-10.346a8.01 8.01 0 0 0-10.9
                                          7.328l-.737 42.548a8.008 8.008 0 0 0 4.626 7.398l47.973 22.342a11.994 11.994 0 0 1 6.96 10.505l2.353 74.821a12 12 0 0 1-3.26
                                           8.669 11.914 11.914 0 0 1-8.391 3.782c-3.246.098-6.292-1.045-8.642-3.244s-3.703-5.185-3.81-8.396l-1.984-62.504a8.01 8.01 0 0
                                            0-4.622-7.005l-20.382-9.496a8.007 8.007 0 0 0-11.389 7.125l-.086 5.184c-.017 2.508-.826 4.918-2.344 6.971a9.206 9.206 0 0
                                             0-.167.236l-54.562 79.702a11.959 11.959 0 0 1-7.723 5.025 11.96 11.96 0 0 1-9.018-1.915c-5.482-3.751-6.886-11.271-3.131-16.759l51.534-75.231a7.995 7.995
                                              0 0 0 1.4-4.425c.244-19.524 1.45-97.732 1.672-114.467.019-1.475.288-2.883.823-4.24 1.84-4.763 6.412-7.686 11.252-7.686 1.447
                                               0 2.92.262 4.35.814l46.062 17.858a8.01 8.01 0 0 0 6.221-.182l35.932-16.407c6.054-2.728 13.209-.037 15.961 6.013a11.935 11.935 0 0 1 .32 9.196zm-14.521
                                                213.983h-66.926a8.008 8.008 0 0 0-8.008 8.008v121.011a8.008 8.008 0 0 0 8.008 8.008h66.926a8.008 8.008 0 0 0 8.008-8.008V360.641a8.008 8.008 0 0 0-8.008-8.008zm-8.008
                                                 121.011h-50.91V368.649h50.91zm-94.946-75.061H17.239a8.008 8.008 0 0 0-8.008 8.008v75.062a8.008 8.008 0 0 0 8.008 8.008h66.926a8.008 8.008 0 0 0 8.008-8.008V406.59a8.007
                                                  8.007 0 0 0-8.008-8.007zm-8.008 75.061h-50.91v-59.046h50.91zM434.063 251.22l22.791-22.762a8.008 8.008 0 0 0 1.66-8.914l-6.918-15.592a108.681 108.681 0 0 0
                                                   10.062-24.264l15.885-6.116a8.008 8.008 0 0 0 5.13-7.473v-32.23a8.007 8.007 0 0 0-5.131-7.473l-15.884-6.116a109.167 109.167 0 0 0-10.063-24.284l6.918-15.568a8.008
                                                    8.008 0 0 0-1.656-8.914l-22.791-22.791a8.007 8.007 0 0 0-8.913-1.656l-15.568 6.917a109.301 109.301 0 0 0-24.284-10.063l-6.117-15.884a8.007 8.007 0 0 0
                                                    -7.473-5.13h-32.229a8.008 8.008 0 0 0-7.473 5.13l-6.116 15.884a108.683 108.683 0 0 0-24.261 10.061l-15.563-6.915a8.01 8.01 0 0 0-8.913 1.656l-22.791 22.791a8.008
                                                     8.008 0 0 0-1.656 8.914l6.917 15.568a110.147 110.147 0 0 0-10.081 24.28l-15.895 6.12a8.008 8.008 0 0 0-5.13 7.473v32.23a8.008 8.008 0 0 0 5.13 7.473l15.895
                                                      6.121a110.845 110.845 0 0 0 10.06 24.276l-6.899 15.581a8.007 8.007 0 0 0 1.663 8.908l22.791 22.762a8.01 8.01 0 0 0 8.901 1.656l15.575-6.897a110.207 110.207
                                                       0 0 0 24.254 10.057l6.12 15.895a8.006 8.006 0 0 0 7.473 5.13h32.229a8.009 8.009 0 0 0 7.473-5.13l6.117-15.885a109.242 109.242 0 0 0 24.29-10.066l15.571
                                                        6.896a8.007 8.007 0 0 0 8.9-1.656zm-29.188-21.046a93.328 93.328 0 0 1-27.414 11.359 8.004 8.004 0 0 0-5.625 4.914l-5.622 14.6H344.98l-5.622-14.599a8.009
                                                         8.009 0 0 0-5.604-4.91 94.331 94.331 0 0 1-27.412-11.367 8.01 8.01 0 0 0-7.434-.499l-14.314 6.338-15.02-15 6.336-14.307a8.005 8.005 0 0 0-.493-7.423
                                                          94.92 94.92 0 0 1-11.373-27.451 8.01 8.01 0 0 0-4.909-5.604l-14.599-5.622v-21.235l14.599-5.621a8.01 8.01 0 0 0 4.909-5.604 94.178 94.178 0 0 1 11.393-27.436
                                                           8.007 8.007 0 0 0 .498-7.448l-6.356-14.307 15.015-15.014 14.307 6.356a8.005 8.005 0 0 0 7.457-.504 92.824 92.824 0 0 1 27.378-11.353 8.007 8.007 0 0
                                                            0 5.624-4.914l5.622-14.599h21.234l5.622 14.599a8.01 8.01 0 0 0 5.624 4.914 93.366 93.366 0 0 1 27.416 11.359 8.005 8.005 0 0 0 7.447.498l14.307-6.356
                                                             15.015 15.014-6.357 14.307a8.007 8.007 0 0 0 .499 7.449 93.309 93.309 0 0 1 11.358 27.415 8.01 8.01 0 0 0 4.914 5.625l14.6 5.621v21.235l-14.6 5.622a8.008
                                                              8.008 0 0 0-4.914 5.625 92.752 92.752 0 0 1-11.354 27.377 8.008 8.008 0 0 0-.505 7.454l6.359 14.333-15.017 14.998-14.314-6.338a8.005 8.005 0 0
                                                               0-7.441.499zM355.61 72.173c-42.913 0-77.825 34.899-77.825 77.797 0 42.913 34.912 77.825 77.825 77.825 42.897 0 77.797-34.912 77.797-77.825
                                                                0-42.897-34.899-77.797-77.797-77.797zm0 139.607c-34.082 0-61.81-27.728-61.81-61.81 0-34.066 27.728-61.781 61.81-61.781 34.066
                                                                 0 61.781 27.715 61.781 61.781.001 34.082-27.714 61.81-61.781 61.81zm0-88.838c-14.903 0-27.028 12.125-27.028 27.028 0 14.919
                                                                  12.125 27.057 27.028 27.057s27.028-12.138 27.028-27.057c.001-14.903-12.124-27.028-27.028-27.028zm0 38.069c-6.072 0-11.013-4.953-11.013-11.041
                                                                   0-6.072 4.94-11.013 11.013-11.013s11.013 4.94 11.013 11.013c0 6.088-4.94 11.041-11.013 11.041zm-61.144 114.311a8.004 8.004 0 0 0-7.614-.604l-66.954 29.735a8.006 8.006 0 0 0-4.758 7.318v169.88a8.008 8.008 0 0 0 8.008 8.008h66.954a8.008 8.008 0 0 0 8.008-8.008V282.036a8.012 8.012 0 0 0-3.644-6.714zm-12.372 198.322h-50.938V316.977l50.938-22.623zm110.963-176.315h-66.955a8.008 8.008 0 0 0-8.008 8.008v176.315a8.008 8.008 0 0 0 8.008 8.008h66.955a8.008 8.008 0 0 0 8.008-8.008V305.337a8.01 8.01 0 0 0-8.008-8.008zm-8.008 176.315H334.11V313.345h50.939zm115.394-240.287a8.008 8.008 0 0 0-7.533-.714l-66.954 28.12a8.007 8.007 0 0 0-4.907 7.383v213.505a8.008 8.008 0 0 0 8.008 8.008h66.954a8.008 8.008 0 0 0 8.008-8.008V240.027a8.008 8.008 0 0 0-3.576-6.67zm-12.44 240.287h-50.938V273.469l50.938-21.393z"
                                                opacity="1" class=""></path>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $bookings->count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Bookings</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0"
                                         viewBox="0 0 512 512" xml:space="preserve" class="side-menu__icon">
                                        <g>
                                            <path
                                                d="M100.152 105.707c22.984 0 41.684-18.699 41.684-41.684S123.137 22.34 100.152 22.34c-22.969 0-41.655 18.699-41.655 41.683s18.687 41.684 41.655
                                 41.684zm0-67.351c14.153 0 25.668 11.515 25.668 25.667 0 14.153-11.515 25.668-25.668 25.668-14.138 0-25.64-11.515-25.64-25.668.001-14.152
                                  11.503-25.667 25.64-25.667zm115.743 84.458c-6.401-14.066-23.064-20.328-37.149-13.958a.652.652 0 0
                                   0-.026.012l-32.871 15.01-42.923-16.641c-14.455-5.585-30.748 1.61-36.3 15.982a27.675 27.675 0 0 0-1.919 9.863c-.223
                                    16.714-1.4 93.153-1.642 112.044l-50.167 73.235c-8.744 12.78-5.468 30.286 7.294 39.017 4.725 3.244 10.2 4.931 15.81 4.931 1.725
                                     0 3.462-.159 5.193-.482 7.364-1.372 13.755-5.529 18-11.715l54.493-79.601a27.977 27.977 0 0 0 4.467-9.316l5.53 2.577 1.828 57.592c.249
                                      7.498 3.401 14.448 8.875 19.57 5.474 5.123 12.604 7.814 20.096 7.557 7.486-.229 14.434-3.367 19.561-8.833 5.142-5.482 7.836-12.641
                                       7.586-20.145l-2.354-74.833c-.371-10.643-6.589-20.032-16.216-24.499l-43.246-20.141.448-25.872 15.939 6.176c7.105 2.877 15.183 2.709
                                        22.183-.47l43.588-19.895c6.831-3.108 12.04-8.691 14.669-15.721 2.625-7.02 2.358-14.639-.747-21.444zM201.64 138.65a11.984 11.984
                                         0 0 1-6.309 6.756l-43.582 19.893a11.977 11.977 0 0 1-9.566.189 7.211 7.211 0 0 0-.132-.052l-26.702-10.346a8.01 8.01 0 0 0-10.9
                                          7.328l-.737 42.548a8.008 8.008 0 0 0 4.626 7.398l47.973 22.342a11.994 11.994 0 0 1 6.96 10.505l2.353 74.821a12 12 0 0 1-3.26
                                           8.669 11.914 11.914 0 0 1-8.391 3.782c-3.246.098-6.292-1.045-8.642-3.244s-3.703-5.185-3.81-8.396l-1.984-62.504a8.01 8.01 0 0
                                            0-4.622-7.005l-20.382-9.496a8.007 8.007 0 0 0-11.389 7.125l-.086 5.184c-.017 2.508-.826 4.918-2.344 6.971a9.206 9.206 0 0
                                             0-.167.236l-54.562 79.702a11.959 11.959 0 0 1-7.723 5.025 11.96 11.96 0 0 1-9.018-1.915c-5.482-3.751-6.886-11.271-3.131-16.759l51.534-75.231a7.995 7.995
                                              0 0 0 1.4-4.425c.244-19.524 1.45-97.732 1.672-114.467.019-1.475.288-2.883.823-4.24 1.84-4.763 6.412-7.686 11.252-7.686 1.447
                                               0 2.92.262 4.35.814l46.062 17.858a8.01 8.01 0 0 0 6.221-.182l35.932-16.407c6.054-2.728 13.209-.037 15.961 6.013a11.935 11.935 0 0 1 .32 9.196zm-14.521
                                                213.983h-66.926a8.008 8.008 0 0 0-8.008 8.008v121.011a8.008 8.008 0 0 0 8.008 8.008h66.926a8.008 8.008 0 0 0 8.008-8.008V360.641a8.008 8.008 0 0 0-8.008-8.008zm-8.008
                                                 121.011h-50.91V368.649h50.91zm-94.946-75.061H17.239a8.008 8.008 0 0 0-8.008 8.008v75.062a8.008 8.008 0 0 0 8.008 8.008h66.926a8.008 8.008 0 0 0 8.008-8.008V406.59a8.007
                                                  8.007 0 0 0-8.008-8.007zm-8.008 75.061h-50.91v-59.046h50.91zM434.063 251.22l22.791-22.762a8.008 8.008 0 0 0 1.66-8.914l-6.918-15.592a108.681 108.681 0 0 0
                                                   10.062-24.264l15.885-6.116a8.008 8.008 0 0 0 5.13-7.473v-32.23a8.007 8.007 0 0 0-5.131-7.473l-15.884-6.116a109.167 109.167 0 0 0-10.063-24.284l6.918-15.568a8.008
                                                    8.008 0 0 0-1.656-8.914l-22.791-22.791a8.007 8.007 0 0 0-8.913-1.656l-15.568 6.917a109.301 109.301 0 0 0-24.284-10.063l-6.117-15.884a8.007 8.007 0 0 0
                                                    -7.473-5.13h-32.229a8.008 8.008 0 0 0-7.473 5.13l-6.116 15.884a108.683 108.683 0 0 0-24.261 10.061l-15.563-6.915a8.01 8.01 0 0 0-8.913 1.656l-22.791 22.791a8.008
                                                     8.008 0 0 0-1.656 8.914l6.917 15.568a110.147 110.147 0 0 0-10.081 24.28l-15.895 6.12a8.008 8.008 0 0 0-5.13 7.473v32.23a8.008 8.008 0 0 0 5.13 7.473l15.895
                                                      6.121a110.845 110.845 0 0 0 10.06 24.276l-6.899 15.581a8.007 8.007 0 0 0 1.663 8.908l22.791 22.762a8.01 8.01 0 0 0 8.901 1.656l15.575-6.897a110.207 110.207
                                                       0 0 0 24.254 10.057l6.12 15.895a8.006 8.006 0 0 0 7.473 5.13h32.229a8.009 8.009 0 0 0 7.473-5.13l6.117-15.885a109.242 109.242 0 0 0 24.29-10.066l15.571
                                                        6.896a8.007 8.007 0 0 0 8.9-1.656zm-29.188-21.046a93.328 93.328 0 0 1-27.414 11.359 8.004 8.004 0 0 0-5.625 4.914l-5.622 14.6H344.98l-5.622-14.599a8.009
                                                         8.009 0 0 0-5.604-4.91 94.331 94.331 0 0 1-27.412-11.367 8.01 8.01 0 0 0-7.434-.499l-14.314 6.338-15.02-15 6.336-14.307a8.005 8.005 0 0 0-.493-7.423
                                                          94.92 94.92 0 0 1-11.373-27.451 8.01 8.01 0 0 0-4.909-5.604l-14.599-5.622v-21.235l14.599-5.621a8.01 8.01 0 0 0 4.909-5.604 94.178 94.178 0 0 1 11.393-27.436
                                                           8.007 8.007 0 0 0 .498-7.448l-6.356-14.307 15.015-15.014 14.307 6.356a8.005 8.005 0 0 0 7.457-.504 92.824 92.824 0 0 1 27.378-11.353 8.007 8.007 0 0
                                                            0 5.624-4.914l5.622-14.599h21.234l5.622 14.599a8.01 8.01 0 0 0 5.624 4.914 93.366 93.366 0 0 1 27.416 11.359 8.005 8.005 0 0 0 7.447.498l14.307-6.356
                                                             15.015 15.014-6.357 14.307a8.007 8.007 0 0 0 .499 7.449 93.309 93.309 0 0 1 11.358 27.415 8.01 8.01 0 0 0 4.914 5.625l14.6 5.621v21.235l-14.6 5.622a8.008
                                                              8.008 0 0 0-4.914 5.625 92.752 92.752 0 0 1-11.354 27.377 8.008 8.008 0 0 0-.505 7.454l6.359 14.333-15.017 14.998-14.314-6.338a8.005 8.005 0 0
                                                               0-7.441.499zM355.61 72.173c-42.913 0-77.825 34.899-77.825 77.797 0 42.913 34.912 77.825 77.825 77.825 42.897 0 77.797-34.912 77.797-77.825
                                                                0-42.897-34.899-77.797-77.797-77.797zm0 139.607c-34.082 0-61.81-27.728-61.81-61.81 0-34.066 27.728-61.781 61.81-61.781 34.066
                                                                 0 61.781 27.715 61.781 61.781.001 34.082-27.714 61.81-61.781 61.81zm0-88.838c-14.903 0-27.028 12.125-27.028 27.028 0 14.919
                                                                  12.125 27.057 27.028 27.057s27.028-12.138 27.028-27.057c.001-14.903-12.124-27.028-27.028-27.028zm0 38.069c-6.072 0-11.013-4.953-11.013-11.041
                                                                   0-6.072 4.94-11.013 11.013-11.013s11.013 4.94 11.013 11.013c0 6.088-4.94 11.041-11.013 11.041zm-61.144 114.311a8.004 8.004 0 0 0-7.614-.604l-66.954 29.735a8.006 8.006 0 0 0-4.758 7.318v169.88a8.008 8.008 0 0 0 8.008 8.008h66.954a8.008 8.008 0 0 0 8.008-8.008V282.036a8.012 8.012 0 0 0-3.644-6.714zm-12.372 198.322h-50.938V316.977l50.938-22.623zm110.963-176.315h-66.955a8.008 8.008 0 0 0-8.008 8.008v176.315a8.008 8.008 0 0 0 8.008 8.008h66.955a8.008 8.008 0 0 0 8.008-8.008V305.337a8.01 8.01 0 0 0-8.008-8.008zm-8.008 176.315H334.11V313.345h50.939zm115.394-240.287a8.008 8.008 0 0 0-7.533-.714l-66.954 28.12a8.007 8.007 0 0 0-4.907 7.383v213.505a8.008 8.008 0 0 0 8.008 8.008h66.954a8.008 8.008 0 0 0 8.008-8.008V240.027a8.008 8.008 0 0 0-3.576-6.67zm-12.44 240.287h-50.938V273.469l50.938-21.393z"
                                                opacity="1" class=""></path>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $reviews->count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Reviews</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0"
                                        y="0" viewBox="0 0 96 96" xml:space="preserve" class="side-menu__icon">
                                        <g>
                                            <path
                                                d="M81.282 4.31H43.424c-5.91 0-10.718 4.807-10.718 10.719v19.034H14.711C8.805 34.064 4 38.871 4 44.777v23.8c0 5.906 4.805 10.714 10.711 10.714h1.677v7.412c0 2.013 1.146 3.767 2.991 4.57.642.28 1.322.417 1.996.417a5.01 5.01 0 0 0 3.411-1.342l11.771-11.057H52.58c5.908 0 10.714-4.807 10.714-10.714V53.141l7.928 7.427a4.961 4.961 0 0 0 5.385.94 4.975 4.975 0 0 0 3-4.57v-7.391h1.676C87.192 49.548 92 44.74 92 38.829v-23.8C92 9.118 87.192 4.31 81.282 4.31zM52.58 73.881H35.487a2.71 2.71 0 0 0-1.852.734L21.798 85.736v-9.15a2.704 2.704 0 0 0-2.705-2.705h-4.382a5.307 5.307 0 0 1-5.301-5.304v-23.8a5.307 5.307 0 0 1 5.301-5.304h18.028c.336 5.611 4.993 10.075 10.685 10.075h14.459v19.029a5.307 5.307 0 0 1-5.303 5.304zm34.01-35.052a5.315 5.315 0 0 1-5.308 5.309h-4.381a2.704 2.704 0 0 0-2.705 2.705v9.103l-11.742-11.02-.056-.053-.007.008-.014-.013a2.702 2.702 0 0 0-1.85-.729H43.424a5.315 5.315 0 0 1-5.308-5.309v-.005h.02l-.02-23.794a5.315 5.315 0 0 1 5.308-5.309h37.858a5.315 5.315 0 0 1 5.308 5.309z"
                                                opacity="1" class=""></path>
                                            <path
                                                d="M73.172 18.648H51.534a2.704 2.704 0 1 0 0 5.41h21.639a2.704 2.704 0 1 0-.001-5.41zM73.172 29.467H51.534a2.704 2.704 0 1 0 0 5.41h21.639a2.704 2.704 0 1 0-.001-5.41zM22.852 54.038c-.324.106-.595.322-.865.539-.487.539-.812 1.247-.812 1.949s.324 1.405.812 1.891c.541.539 1.19.814 1.893.814.378 0 .758-.111 1.082-.217.325-.111.595-.328.865-.597.487-.486.812-1.189.812-1.891s-.325-1.411-.812-1.949c-.757-.702-1.947-.972-2.975-.539zM35.781 54.038c-1.028-.433-2.218-.164-2.975.539-.487.539-.757 1.247-.757 1.949s.27 1.405.757 1.891c.27.269.541.486.865.597.379.106.703.217 1.082.217.704 0 1.353-.275 1.894-.814.487-.486.812-1.189.812-1.891s-.325-1.411-.812-1.949c-.271-.216-.541-.433-.866-.539zM46.601 54.038c-.649-.275-1.407-.275-2.11 0-.324.106-.595.322-.865.539-.487.539-.812 1.247-.812 1.949s.324 1.405.812 1.891c.541.539 1.19.814 1.894.814.378 0 .757-.111 1.082-.217.325-.111.595-.328.866-.597.487-.486.757-1.189.757-1.891s-.271-1.411-.757-1.949c-.272-.216-.542-.433-.867-.539zM18.5 26.763h5.41a2.704 2.704 0 1 0 0-5.41H18.5a2.704 2.704 0 1 0 0 5.41zM78.006 70.04h-5.41a2.704 2.704 0 1 0 0 5.41h5.41a2.704 2.704 0 1 0 0-5.41z"
                                                opacity="1" class=""></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $blogs->count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Blogs</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-info dash ms-auto box-shadow-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144L0 368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144l-16 0 0 96 16 0c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48l0-224z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row" style="margin-bottom: 100px;">
        <!-- Card 1 -->
        <div class="col-lg-12 col-md-12 col-12 mb-4">
            <div class="card-style mb-10">
                <div style="background-color: white;" class="p-4 rounded-3">
                    <p class="text-primary text-bold text-center">User Data for Each Month</p>
                    <canvas id="new-users-chart"></canvas>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- chart for new users start --}}
    <script>
        // Data passed from the controller
        const labels = @json($chartData['labels']); // Will always have 12 months
        const data = @json($chartData['data']); // Will have counts, with 0 for months without users

        const ctx = document.getElementById('new-users-chart').getContext('2d');
        const newUserChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'This year\'s Users',
                    data: data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(0, 123, 255, 0.5)',
                        'rgba(220, 53, 69, 0.5)',
                        'rgba(40, 167, 69, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(23, 162, 184, 0.5)',
                        'rgba(255, 193, 7, 0.5)',
                        'rgba(188, 80, 144, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132,0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(0, 123, 255, 0.5)',
                        'rgba(220, 53, 69, 0.5)',
                        'rgba(40, 167, 69, 0.5)',
                        'rgba(23, 162, 184, 0.5)',
                        'rgba(255, 193, 7, 0.5)',
                        'rgba(188, 80, 144, 0.5)'
                    ],
                    borderWidth: 1,
                    barThickness: 50
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    {{-- chart for new users end --}}
@endpush
