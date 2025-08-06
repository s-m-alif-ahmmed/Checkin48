@extends('backend.app')

@section('title', 'Search')

@section('content')
{{-- PAGE-HEADER --}}
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Search Banner</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Search</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banner</li>
        </ol>
    </div>
</div>
{{-- PAGE-HEADER --}}

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-body">
                <form action="{{ route('cms.search.update', $heros->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
