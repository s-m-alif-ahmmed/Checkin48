@extends('backend.app')

@section('title', 'Facebook Login Settings')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Facebook Login Settings</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Facebook Login Settings</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('credentials.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="google_client_id" value="{{ env('GOOGLE_CLIENT_ID') }}">
                        <input type="hidden" name="google_client_secret_id" value="{{ env('GOOGLE_CLIENT_SECRET') }}">

                        <div class="row mb-4">
                            <label for="mail_host" class="col-md-3 form-label">FACEBOOK CLIENT ID</label>
                            <div class="col-md-9">
                                <input class="form-control @error('facebook_client_id') is-invalid @enderror" id="facebook_client_id"
                                       name="facebook_client_id" placeholder="Enter your FACEBOOK CLIENT ID" type="text"
                                       value="{{ env('FACEBOOK_CLIENT_ID') }}">
                                @error('facebook_client_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_password" class="col-md-3 form-label">FACEBOOK SECRET ID</label>
                            <div class="col-md-9">
                                <input class="form-control @error('facebook_client_secret_id') is-invalid @enderror" id="facebook_client_secret_id"
                                       name="facebook_client_secret_id" placeholder="Enter your FACEBOOK SECRET ID" type="text"
                                       value="{{ env('FACEBOOK_CLIENT_SECRET') }}">
                                @error('facebook_client_secret_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
