@extends('backend.app')

@section('title', 'Booking Detail')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Booking Detail</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">

                    <div class="form-group">
                        <label for="created_at" class="form-label">Booking Time:</label>
                        <input type="text" class="form-control" name="created_at" placeholder="Created Time" id="created_at" value="{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d h:i a') ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="creator" class="form-label">Booking ID:</label>
                        <input type="text" class="form-control" name="creator" placeholder="Creator" id="creator" value="#{{ $data->booking_id ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="creator" class="form-label">Booked By:</label>
                        <input type="text" class="form-control" name="creator" placeholder="Creator" id="creator" value="{{ $data->name ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Email:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->email ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Phone Number:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->number ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Villa Name:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->villa->title ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Villa Owner Name:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->villa->user->name ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="vote_end_date" class="form-label">Villa Images:</label>
                        @if($data->villa->villa_images)
                            @foreach($data->villa->villa_images as $image)
                                <img class="img-fluid m-2" style="height: 100px; width: auto;" src="{{ asset($image->image ?? 'frontend/no-image.jpg') }}" alt="Booking Image">
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Price Type:</label>
                        <input type="text" class="form-control" name="title" placeholder="Price Type" id="title" value="{{ $data->priceType->name ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Villa Day Price:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->villa_day_price, 2) ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Guests:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->people ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Checkin Date:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->check_in_date ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Checkout Date:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->check_out_date ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Total Nights:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->nights ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Tax Percentage:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->tax_percent ?? 0 }}%" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Subtotal:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->subtotal, 2) ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Tax:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->tax, 2) ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Earn Loyalty Point(5%):</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->loyalty_point_earn ?? 0 }}" disabled readonly>
                    </div>

                    @if($data->loyalty_point_use > 0)
                        <div class="form-group">
                            <label for="title" class="form-label">Used Loyalty Point:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->loyalty_point_use ?? 0 }}" disabled readonly>
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label">Used Loyalty Point Discount Value:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->loyalty_point_use, 2) ?? 0 }}" disabled readonly>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title" class="form-label">Total:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->total_amount, 2) ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Villa Owner Amount(85%):</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->subtotal * 0.85, 2) ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Admin Amount(15%):</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->subtotal * 0.15, 2) ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Online Payment:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->online_payment, 2) ?? 0 }}" disabled readonly>
                    </div>

                    @if($data->hand_cash > 0)
                        <div class="form-group">
                            <label for="title" class="form-label">Villa Owner Hand Cash Payment:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="₪{{ number_format($data->hand_cash, 2) ?? 0 }}" disabled readonly>
                        </div>
                    @endif

                    @if($data->payment_method)
                        <div class="form-group">
                            <label for="title" class="form-label">Payment Method:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->payment_method ?? '' }}" disabled readonly>
                        </div>
                    @endif

                    @if($data->payment_id)
                        <div class="form-group">
                            <label for="title" class="form-label">Payment Method:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->payment_id ?? '' }}" disabled readonly>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title" class="form-label">Online Payment Status:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->payment_status ?? '' }}" disabled readonly>
                    </div>

                    @if($data->hand_cash > 0)
                        <div class="form-group">
                            <label for="title" class="form-label">Hand Cash Payment Status:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title"
                                   value="@if ($data->status == 'approved')
                                        @if($data->hand_cash > 0) Paid @else N/A @endif @elseif($data->status == 'pending') @if($data->hand_cash > 0) Unpaid @else N/A @endif @elseif($data->status == 'cancelled') @if($data->hand_cash > 0) Cancelled @else Cancelled @endif
                                       @endif"
                                   disabled readonly>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title" class="form-label">Booking Status:</label>
                        <select class="select2" name="" id="" disabled >
                            <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }} >Pending</option>
                            <option value="approved" {{ $data->status == 'approved' ? 'selected' : '' }} >Completed</option>
                            <option value="cancelled" {{ $data->status == 'cancelled' ? 'selected' : '' }} >Cancelled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('bookings.index') }}" class="btn btn-danger me-2">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
