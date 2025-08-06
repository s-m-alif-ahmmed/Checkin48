@extends('backend.app')

@section('title', 'System Settings')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">System Settings</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">System Settings</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('system.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_en" class="form-label">Title(EN):</label>
                                    <input type="text" class="form-control @error('title.en') is-invalid @enderror"
                                        name="title[en]" placeholder="title" id="title_en"
                                        value="{{ old('title.en', $setting->getTranslation('title', 'en')) }}">
                                    @error('title.en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_ar" class="form-label">Title(AR):</label>
                                    <input type="text" class="form-control @error('title.ar') is-invalid @enderror"
                                        name="title[ar]" placeholder="title" id="title_ar" dir="rtl"
                                        value="{{ old('title.ar', $setting->getTranslation('title', 'ar')) }}">
                                    @error('title.ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="systemName_en" class="form-label">System Name(EN):</label>
                                    <input type="text" class="form-control @error('system_name.en') is-invalid @enderror"
                                        name="system_name[en]" placeholder="System Name" id="systemName_en"
                                        value="{{ old('system_name.en', $setting->getTranslation('system_name', 'en')) }}">
                                    @error('system_name.en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="systemName_ar" class="form-label">System Name(AR):</label>
                                    <input type="text" class="form-control @error('system_name.ar') is-invalid @enderror"
                                        name="system_name[ar]" placeholder="System Name" id="systemName_ar" dir="rtl"
                                        value="{{ old('system_name.ar', $setting->getTranslation('system_name', 'ar')) }}">
                                    @error('system_name.ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="copyRights_en" class="form-label">Copy Rights Text(EN):</label>
                            <input type="text" class="form-control @error('copyright_text.en') is-invalid @enderror"
                                name="copyright_text[en]" placeholder="Copy Rights Text" id="copyRights_en"
                                value="{{ old('copyright_text.en', $setting->getTranslation('copyright_text', 'en')) }}">
                            @error('copyright_text.en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="copyRights_ar" class="form-label">Copy Rights Text(AR):</label>
                            <input type="text" class="form-control @error('copyright_text.ar') is-invalid @enderror"
                                name="copyright_text[ar]" placeholder="Copy Rights Text" dir="rtl" id="copyRights_ar"
                                value="{{ old('copyright_text.ar', $setting->getTranslation('copyright_text', 'ar')) }}">
                            @error('copyright_text.ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="summernote_en" class="form-label">About System(EN):</label>
                            <textarea class="form-control @error('description.en') is-invalid @enderror" id="summernote_en" name="description[en]"
                                placeholder="About System">{{ old('description.en', $setting->getTranslation('description', 'en')) }}</textarea>
                            @error('description.en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="summernote_ar" class="form-label">About System(AR):</label>
                            <textarea class="form-control @error('description.ar') is-invalid @enderror" id="summernote_ar" dir="rtl" name="description[ar]"
                                placeholder="About System">{{ old('description.ar', $setting->getTranslation('description', 'ar')) }}</textarea>
                            @error('description.ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo" class="form-label">Logo:</label>
                                    <input type="hidden" name="remove_logo" value="0">
                                    <input type="file" class="dropify @error('logo') is-invalid @enderror" name="logo"
                                        id="logo"
                                        data-default-file="@isset($setting){{ asset($setting->logo) }}@endisset">
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo" class="form-label">Favicon:</label>
                                    <input type="hidden" name="remove_favicon" value="0">
                                    <input type="file" class="dropify @error('favicon') is-invalid @enderror"
                                        name="favicon" id="favicon"
                                        data-default-file="@isset($setting){{ asset($setting->favicon) }}@endisset">
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
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
