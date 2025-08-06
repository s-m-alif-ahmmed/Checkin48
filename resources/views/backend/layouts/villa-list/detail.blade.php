@extends('backend.app')

@section('title', 'Villa Detail')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Villa Detail</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Villa</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">

                    <div class="form-group">
                        <label for="created_at" class="form-label">Villa Created At:</label>
                        <input type="text" class="form-control" name="created_at" placeholder="Created Time" id="created_at" value="{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d h:i a') ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="creator" class="form-label">Villa Owner Name:</label>
                        <input type="text" class="form-control" name="creator" placeholder="Creator" id="creator" value="#{{ $data->user->name ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="creator" class="form-label">Villa Owner Email:</label>
                        <input type="text" class="form-control" name="creator" placeholder="Creator" id="creator" value="{{ $data->user->email ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Villa Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->title ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="vote_end_date" class="form-label">Villa Images:</label>
                        @if($data->villa_images)
                            @foreach($data->villa_images as $image)
                                <img class="img-fluid m-2" style="height: 150px; width: auto;" src="{{ asset($image->image ?? 'frontend/no-image.jpg') }}" alt="Booking Image">
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="vote_end_date" class="form-label">Villa Owner Signature:</label>
                        <img width="150" height="100" src="data:image/png;base64, {{ $data->signature }}" alt="Signature" />
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Country:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->country->name ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">City:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->city->name ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Description:</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="3" disabled readonly >{{ $data->description ?? 'N/A' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Villa Rules:</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="3" disabled readonly >{{ $data->villa_rules ?? 'N/A' }}</textarea>
                    </div>

                    @if($data->full_address)
                        <div class="form-group">
                            <label for="title" class="form-label">Full Address:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->full_address ?? 'N/A' }}" disabled readonly>
                        </div>
                    @endif

{{--                    @if($data->map_location)--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="title" class="form-label">Villa Map Address:</label>--}}
{{--                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->map_location ?? 'N/A' }}" disabled readonly>--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    <div class="form-group">
                        <label for="title" class="form-label">Property Type:</label>
                        <input type="text" class="form-control" name="title" placeholder="Price Type" id="title" value="{{ $data->property_type ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Property Label:</label>
                        <input type="text" class="form-control" name="title" placeholder="Price Type" id="title" value="{{ $data->propertyLabel->name ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Rooms:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->room ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Bathrooms:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->bathroom ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Balcony's:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->balcony ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Kitchen:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->kitchen ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Living Rooms:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->living_room ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Bar's:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->bar ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Garages:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->garage ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Pool Size:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->pool ?? 0 }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Check In Time:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ \Carbon\Carbon::parse($data->check_in_time)->format('h:i a') ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Check Out Time:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ \Carbon\Carbon::parse($data->check_out_time)->format('h:i a') ?? 'N/A' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Adults:</label>
                        <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->adults ?? 0 }}" disabled readonly>
                    </div>

                    @if($data->childrens)
                        <div class="form-group">
                            <label for="title" class="form-label">Children's:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ $data->childrens ?? 0 }}" disabled readonly>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title" class="form-label">Payment Option:</label>
                        @if($data->payment_option == 0)
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="Pay 15% online and 85% in cash on arrival" disabled readonly />
                        @elseif($data->payment_option == 1)
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="Pay 100% online" disabled readonly />
                        @endif
                    </div>

                    @if($data->price_type_id_one)
                        <div class="form-group">
                            <label for="title" class="form-label">{{ $data->price_type_one->name }}:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ number_format($data->price, 2) ?? 0 }}" disabled readonly>
                        </div>
                    @endif

                    @if($data->price_type_id_two)
                        <div class="form-group">
                            <label for="title" class="form-label">{{ $data->price_type_two->name }}:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ number_format($data->price_two, 2) ?? 0 }}" disabled readonly>
                        </div>
                    @endif

                    @if($data->price_type_id_three)
                        <div class="form-group">
                            <label for="title" class="form-label">{{ $data->price_type_three->name }}:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ number_format($data->price_three, 2) ?? 0 }}" disabled readonly>
                        </div>
                    @endif

                    @if($data->price_type_id_four)
                        <div class="form-group">
                            <label for="title" class="form-label">{{ $data->price_type_four->name }}:</label>
                            <input type="text" class="form-control" name="title" placeholder="Booking title" id="title" value="{{ number_format($data->price_four, 2) ?? 0 }}" disabled readonly>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title" class="form-label"> Status:</label>
                        <select class="select2" name="" id="" disabled >
                            <option value="active" {{ $data->status == 'active' ? 'selected' : '' }} >Active</option>
                            <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }} >Pending</option>
                            <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }} >Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('villas.index') }}" class="btn btn-danger me-2">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
