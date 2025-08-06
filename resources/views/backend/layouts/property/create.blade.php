@extends('backend.app')

@section('title', 'Create Property Label')

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
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('property.levels.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name_en" class="form-label">Name(EN)</label>
                            <input type="text" name="name[en]" id="name_en" class="form-control" value="{{ old('name.en') }}" placeholder="Enter property label name" required>
                            @error('name.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name_ar" class="form-label">Name(AR)</label>
                            <input type="text" name="name[ar]" id="name_ar" class="form-control" dir="rtl" value="{{ old('name.ar') }}" placeholder="Enter property label name" required>
                            @error('name.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Property Label</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

