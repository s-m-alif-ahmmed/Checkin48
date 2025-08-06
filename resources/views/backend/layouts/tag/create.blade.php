@extends('backend.app')

@section('title', 'Create Tag')

@push('style')

@endpush

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Tag Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tag</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('tag.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name_en" class="form-label">Name(EN)</label>
                            <input type="text" name="name[en]" id="name_en" class="form-control" value="{{ old('name.en') }}" placeholder="Enter tag name" required>
                            @error('name.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name_ar" class="form-label">Name(AR)</label>
                            <input type="text" name="name[ar]" id="name_ar" class="form-control" dir="rtl" value="{{ old('name.ar') }}" placeholder="Enter tag name" required>
                            @error('name.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

