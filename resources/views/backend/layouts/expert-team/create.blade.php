@extends('backend.app')

@section('title', 'Our Experts')

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Our Experts</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Our Experts</a></li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('expert-team.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name_en" class="form-label">Name(EN):</label>
                            <input type="text" class="form-control @error('name.en') is-invalid @enderror"
                                   name="name[en]" placeholder="Enter Name" id="name_en" value="{{ old('name.en') }}" required>
                            @error('name.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_ar" class="form-label">Name(AR):</label>
                            <input type="text" class="form-control @error('name.ar') is-invalid @enderror"
                                   name="name[ar]" placeholder="Enter Name" dir="rtl" id="name_ar" value="{{ old('name.ar') }}" required>
                            @error('name.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="designation_en" class="form-label">Designation(EN):</label>
                            <input type="text" class="form-control @error('designation.en') is-invalid @enderror"
                                   name="designation[en]" placeholder="Enter designation" id="designation_en" value="{{ old('designation.en') }}" required>
                            @error('designation.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="designation_ar" class="form-label">Designation(AR):</label>
                            <input type="text" class="form-control @error('name.ar') is-invalid @enderror"
                                   name="designation[ar]" placeholder="Enter designation" dir="rtl" id="designation_ar" value="{{ old('designation.ar') }}" required>
                            @error('designation.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="dropify form-control" id="image" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="skype" class="form-label">Skype</label>
                            <input type="text" class="form-control" id="skype" name="skype" value="{{ old('skype') }}">
                            @error('skype')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
                            @error('linkedin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
