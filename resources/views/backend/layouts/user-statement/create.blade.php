@extends('backend.app')

@section('title', 'User Statement Create')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">User Statement Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Statement</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('user.statement.store') }}" >
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="statement_en" class="form-label">User Statement(EN):</label>
                            <input type="text" class="form-control @error('statement.en') is-invalid @enderror"
                                   name="statement[en]" placeholder="User Statement" id="statement_en" value="{{ old('statement.en') }}">
                            @error('statement.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="statement_ar" class="form-label">User Statement(AR):</label>
                            <input type="text" class="form-control @error('statement.ar') is-invalid @enderror"
                                   name="statement[ar]" placeholder="User Statement" dir="rtl" id="statement_ar" value="{{ old('statement.ar') }}">
                            @error('statement.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('user.statement.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
