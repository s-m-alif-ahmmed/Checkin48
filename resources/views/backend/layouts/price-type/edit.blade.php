@extends('backend.app')

@section('title', 'Price.types Edit')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Price types Edit Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Price types</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('price.types.update', $priceType->id) }}">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="name_en" class="form-label">Price Types (EN):</label>
                            <input type="text" class="form-control @error('name.en') is-invalid @enderror"
                                name="name[en]" value="{{ old('name.en', $priceType->getTranslation('name', 'en')) }}"
                                placeholder="Enter Price Types" id="name_en">
                            @error('name.en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_ar" class="form-label">Price Types (AR):</label>
                            <input type="text" class="form-control @error('name.ar') is-invalid @enderror"
                                name="name[ar]" value="{{ old('name.ar', $priceType->getTranslation('name', 'ar')) }}" dir="rtl"
                                placeholder="Enter Price Types" id="name_ar">
                            @error('name.ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
