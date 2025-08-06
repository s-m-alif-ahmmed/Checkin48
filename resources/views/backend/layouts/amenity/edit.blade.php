@extends('backend.app')

@section('title', 'Edit Property Label')

@push('style')

@endpush

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Property Label Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Property Label</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('amenities.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="name_en" class="form-label">Name(EN)</label>
                            <input type="text" name="name[en]" id="name_en" class="form-control" value="{{ old('name.en', $data->getTranslation('name', 'en')) }}" placeholder="Enter amenity name">
                            @error('name.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name_ar" class="form-label">Name(AR)</label>
                            <input type="text" name="name[ar]" id="name_ar" class="form-control" value="{{ old('name.ar', $data->getTranslation('name', 'ar')) }}" placeholder="Enter amenity name">
                            @error('name.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control dropify" data-default-file="{{ asset($data->image ?? 'frontend/no-image.jpg') }}" value="{{ $data->image }}">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
