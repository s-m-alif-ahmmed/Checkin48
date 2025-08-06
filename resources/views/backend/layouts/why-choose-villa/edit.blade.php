@extends('backend.app')

@section('title', 'Why Choose Our Villa Edit')

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Why Choose Our Villa Edit Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Why Choose Our Villa</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('why-choose-villa.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updating -->

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="file" name="icon" id="icon" class="form-control dropify" data-default-file="{{ isset($data->icon) ? asset($data->icon) : '' }}" value="{{ old('icon', $data->icon) }}" accept="image/*">
                            @error('icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title_en" class="form-label">Title(EN)</label>
                            <input type="text" class="form-control @error('title.en') is-invalid @enderror"
                                   name="title[en]" placeholder="Enter title" id="title_en"
                                   value="{{ old('title.en', $data->getTranslation('title', 'en')) }}">
                            @error('title.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title_ar" class="form-label">Title(AR)</label>
                            <input type="text" class="form-control @error('title.ar') is-invalid @enderror"
                                   name="title[ar]" dir="rtl" placeholder="Enter title" id="title_ar"
                                   value="{{ old('title.ar', $data->getTranslation('title', 'ar')) }}">
                            @error('title.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description_en" class="form-label">Description(EN)</label>
                            <textarea name="description[en]" id="description_en" rows="4" class="form-control" placeholder="Enter description" required>{{ old('description.en', $data->getTranslation('description', 'en')) }}</textarea>
                            @error('description.en')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description_ar" class="form-label">Description(AR)</label>
                            <textarea name="description[ar]" id="description_ar" rows="4" class="form-control" dir="rtl" placeholder="Enter description" required>{{ old('description.ar', $data->getTranslation('description', 'ar')) }}</textarea>
                            @error('description.ar')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="active" {{ old('status', $data->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $data->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
