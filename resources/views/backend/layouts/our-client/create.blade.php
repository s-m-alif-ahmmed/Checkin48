@extends('backend.app')

@section('title', 'Our Clients')

@section('content')

{{-- PAGE-HEADER --}}
<div class="page-header">
    <div>
        <h1 class="page-title">Clients Form</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clients</li>
        </ol>
    </div>
</div>
{{-- PAGE-HEADER END --}}


<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-body">

                <!-- Form for creating a client -->
                <form action="{{ route('our-clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="logo" class="form-label">Logo:</label>
                        <input type="file" class="dropify form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('our-clients.index') }}" class="btn btn-danger me-2">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
