@extends('backend.app')

@section('title', 'State Edit')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">State Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">State</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('state.update', ['id' => $data->id]) }}" >
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="country_id" class="form-label">Country:</label>
                            <select class="form-control select2 form-select" name="country_id" id="country_id" data-placeholder="Choose one country" required>
                                <option value="" >Choose one country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id ==  $data->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city_id" class="form-label">City:</label>
                            <select class="form-control select2 form-select" name="city_id" id="city_id" data-placeholder="Choose one city" required>
                                @if ($data->city_id)
                                    <option value="{{ $data->city->id }}">{{ $data->city->name }}</option>
                                @else
                                    <option value="">Select City</option>
                                @endif
                            </select>
                            @error('city_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">State Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" placeholder="State Name" id="name" value="{{ $data->name ?? '' }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('state.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // When the country dropdown value changes
            $('#country_id').change(function () {
                var countryId = $(this).val(); // Get the selected country ID

                // Clear the city dropdown if no country is selected
                if (!countryId) {
                    $('#city_id').html('<option value="">Select City</option>');
                    return;
                }

                // Make an AJAX request to fetch cities
                $.ajax({
                    url: '{{ route('getCitiesByCountry') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        country_id: countryId
                    },
                    success: function (response) {
                        // Populate the city dropdown with the response data
                        var options = '<option value="">Select City</option>';
                        $.each(response, function (index, city) {
                            options += '<option value="' + city.id + '">' + city.name + '</option>';
                        });
                        $('#city_id').html(options);
                    },
                    error: function (xhr) {
                        console.error(xhr.responseJSON.message || 'Error fetching cities');
                    }
                });
            });
        });
    </script>
@endpush
