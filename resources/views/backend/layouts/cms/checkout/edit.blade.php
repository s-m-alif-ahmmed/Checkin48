@extends('backend.app')

@section('title', 'Checkout')

@section('content')
{{-- PAGE-HEADER --}}
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Checkout Banner</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Checkout</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banner</li>
        </ol>
    </div>
</div>
{{-- PAGE-HEADER --}}

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-body">
                <form action="{{ route('cms.checkout.update', $heros->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="banner_title_en" class="form-label">Banner Title(EN):</label>
                                <input type="text" class="form-control @error('banner_title.en') is-invalid @enderror"
                                       name="banner_title[en]" placeholder="Enter here banner title" id="banner_title_en"
                                       value="{{ old('banner_title.en', $heros->getTranslation('banner_title', 'en')) }}">
                                @error('banner_title.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="banner_title_ar" class="form-label">Banner Title(AR):</label>
                                <input type="text" class="form-control @error('banner_title.ar') is-invalid @enderror"
                                       name="banner_title[ar]" dir="rtl" placeholder="Enter here banner title" id="banner_title_ar"
                                       value="{{ old('banner_title.ar', $heros->getTranslation('banner_title', 'ar')) }}">
                                @error('banner_title.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="banner_image" class="form-label">Banner Image:</label>
                                <input type="file" class="dropify @error('banner_image') is-invalid @enderror" name="banner_image" id="banner_image" data-default-file="{{ isset($heros->banner_image) ? asset($heros->banner_image) : '' }}">
                                @error('banner_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                    <option value="active" {{ $heros->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $heros->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
