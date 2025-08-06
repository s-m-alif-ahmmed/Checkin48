@extends('backend.app')

@section('title', 'Dynamic Page Create')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Dynamic Page Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dynamic Page</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('settings.dynamic_page.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="page_title_en" class="form-label">Title(EN):</label>
                            <input type="text" class="form-control @error('page_title.en') is-invalid @enderror"
                                name="page_title[en]" placeholder="title" id="title_en" value="{{ old('page_title.en') }}">
                            @error('page_title.en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="page_title_ar" class="form-label">Title(AR):</label>
                            <input type="text" class="form-control @error('page_title.ar') is-invalid @enderror"
                                name="page_title[ar]" dir="rtl" placeholder="title" id="title_ar" value="{{ old('page_title.ar') }}">
                            @error('page_title.ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="summernote_en" class="form-label">Content(EN):</label>
                            <textarea class="form-control @error('page_content.en') is-invalid @enderror" id="summernote_en" name="page_content[en]">{{ old('page_content.en') }}</textarea>
                            @error('page_content.en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="summernote_ar" class="form-label">Content(AR):</label>
                            <textarea class="form-control @error('page_content.ar') is-invalid @enderror" dir="rtl" id="summernote_ar" name="page_content[ar]">{{ old('page_content.ar') }}</textarea>
                            @error('page_content.ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('settings.dynamic_page.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Summernote for English textarea
            $('#summernote_en').summernote({
                height: 200, // Set the height of the editor
                placeholder: 'Write about the system here...',
                tabsize: 2
            });

            // Initialize Summernote for Arabic textarea
            $('#summernote_ar').summernote({
                height: 200, // Set the height of the editor
                placeholder: 'اكتب عن النظام هنا...',
                tabsize: 2
            });
        });
    </script>
@endpush
