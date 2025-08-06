@extends('backend.app')

@section('title', 'Newsletter')

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Newsletter Edit</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Newsletter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('news.letter.update', $newsletter->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('POST')
                        <div class="pe-3 mb-3">
                            <label class="block text-sm font-medium mb-2" for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $newsletter->title) }}">
                              @error('title')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>
                        <div class="pe-3 mb-3">
                            <label class="block text-sm font-medium mb-2" for="PDF">PDF</label>
                            <input type="file" accept="application/pdf" name="pdf" id="pdf" class="dropify" data-default-file="{{ asset($newsletter->pdf) }}">
                              @error('pdf')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>
                        <div class="pe-3 mb-3">
                            <label class="block text-sm font-medium mb-2" for="status">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active" {{ old('status', $newsletter->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $newsletter->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                              @error('status')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn bg-info text-white py-2 px-5 hover:bg-success rounded-md">
                                Update
                            </button>
                            <a href="{{ route('news.letter.index') }}" type="button"
                                class="btn bg-danger text-white py-2 px-5 hover:bg-dark rounded-md">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

