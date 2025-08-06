@extends('backend.app')

@section('title', 'Our Mission')

@section('content')

{{-- PAGE-HEADER --}}
<div class="page-header">
    <div>
        <h1 class="page-title">Our Mission Edit Form</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Mission</li>
        </ol>
    </div>
</div>
{{-- PAGE-HEADER --}}

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-body">
                <form action="{{ route('our-mission.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title_en" class="form-label">Title(EN):</label>
                                <input type="text" class="form-control @error('title.en') is-invalid @enderror"
                                       name="title[en]" placeholder="Enter here title" id="title_en"
                                       value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
                                @error('title.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title_ar" class="form-label">Title(AR):</label>
                                <input type="text" class="form-control @error('title.ar') is-invalid @enderror"
                                       name="title[ar]" dir="rtl" placeholder="Enter here title" id="title_ar"
                                       value="{{ old('title.ar', $item->getTranslation('title', 'ar')) }}">
                                @error('title.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sub_title_en" class="form-label">Sub Title(EN):</label>
                                <input type="text" class="form-control @error('sub_title.en') is-invalid @enderror"
                                       name="sub_title[en]" placeholder="Enter here sub title" id="sub_title_en"
                                       value="{{ old('sub_title.en', $item->getTranslation('sub_title', 'en')) }}">
                                @error('sub_title.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub_title_ar" class="form-label">Sub Title(AR):</label>
                                <input type="text" class="form-control @error('sub_title.ar') is-invalid @enderror"
                                       name="sub_title[ar]" dir="rtl" placeholder="Enter here sub title" id="sub_title_ar"
                                       value="{{ old('sub_title.ar', $item->getTranslation('sub_title', 'ar')) }}">
                                @error('sub_title.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Media -->
                    <div class="mb-3">
                        <label for="media" class="form-label">Upload Image or Video</label>
                        <input type="file" name="media" id="media" class="form-control dropify" accept=".jpeg,.png,.jpg,.gif,.mp4,.mov,.avi" data-default-file="{{ isset($item->media) ? asset($item->media) : '' }}">
                        @error('media')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Heading One -->
                    <div class="mb-3">
                        <label for="heading_one_title_en" class="form-label">Heading One Title(EN)</label>
                        <input type="text" name="heading_one_title[en]" id="heading_one_title_en" class="form-control" value="{{ old('heading_one_title.en', $item->getTranslation('heading_one_title', 'en')) }}" placeholder="Enter heading one title">
                        @error('heading_one_title.en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_one_title_ar" class="form-label">Heading One Title(AR)</label>
                        <input type="text" name="heading_one_title[ar]" id="heading_one_title_ar" dir="rtl" class="form-control" value="{{ old('heading_one_title.ar', $item->getTranslation('heading_one_title', 'ar')) }}" placeholder="Enter heading one title">
                        @error('heading_one_title.ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_one_description_en" class="form-label">Heading One Description(EN)</label>
                        <textarea name="heading_one_description[en]" id="heading_one_description_en" rows="3" class="form-control">{{ old('heading_one_description.en', $item->getTranslation('heading_one_description', 'en')) }}</textarea>
                        @error('heading_one_description.en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_one_description_ar" class="form-label">Heading One Description(AR)</label>
                        <textarea name="heading_one_description[ar]" id="heading_one_description_ar" rows="3" dir="rtl" class="form-control">{{ old('heading_one_description.ar', $item->getTranslation('heading_one_description', 'ar')) }}</textarea>
                        @error('heading_one_description.ar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Heading Two -->
                    <div class="mb-3">
                        <label for="heading_two_title_en" class="form-label">Heading Two Title(EN)</label>
                        <input type="text" name="heading_two_title[en]" id="heading_two_title_en" class="form-control" value="{{ old('heading_two_title.en', $item->getTranslation('heading_two_title', 'en')) }}" placeholder="Enter heading two title">
                        @error('heading_two_title.en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_two_title_ar" class="form-label">Heading Two Title(AR)</label>
                        <input type="text" name="heading_two_title[ar]" id="heading_two_title_ar" dir="rtl" class="form-control" value="{{ old('heading_two_title.ar', $item->getTranslation('heading_two_title', 'ar')) }}" placeholder="Enter heading two title">
                        @error('heading_two_title.ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_two_description_en" class="form-label">Heading Two Description(EN)</label>
                        <textarea name="heading_two_description[en]" id="heading_two_description_en" rows="3" class="form-control">{{ old('heading_two_description.en', $item->getTranslation('heading_two_description', 'en')) }}</textarea>
                        @error('heading_two_description.en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_two_description_ar" class="form-label">Heading Two Description(AR)</label>
                        <textarea name="heading_two_description[ar]" id="heading_two_description_ar" dir="rtl" rows="3" class="form-control">{{ old('heading_two_description.ar', $item->getTranslation('heading_two_description', 'ar')) }}</textarea>
                        @error('heading_two_description.ar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Heading Three -->
                    <div class="mb-3">
                        <label for="heading_three_title_en" class="form-label">Heading Three Title(EN)</label>
                        <input type="text" name="heading_three_title[en]" id="heading_three_title_en" class="form-control" value="{{ old('heading_three_title.en', $item->getTranslation('heading_three_title', 'en')) }}" placeholder="Enter heading three title">
                        @error('heading_three_title.en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_three_title_ar" class="form-label">Heading Three Title(AR)</label>
                        <input type="text" name="heading_two_title[ar]" id="heading_three_title_ar" dir="rtl" class="form-control" value="{{ old('heading_three_title.ar', $item->getTranslation('heading_three_title', 'ar')) }}" placeholder="Enter heading three title">
                        @error('heading_three_title.ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_three_description_en" class="form-label">Heading Three Description(EN)</label>
                        <textarea name="heading_three_description[en]" id="heading_three_description_en" rows="3" class="form-control">{{ old('heading_three_description.en', $item->getTranslation('heading_three_description', 'en')) }}</textarea>
                        @error('heading_three_description.en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="heading_three_description_ar" class="form-label">Heading Three Description(AR)</label>
                        <textarea name="heading_three_description[ar]" id="heading_three_description_ar" rows="3" dir="rtl" class="form-control">{{ old('heading_three_description.ar', $item->getTranslation('heading_three_description', 'ar')) }}</textarea>
                        @error('heading_three_description.ar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="active" {{ old('status', $item->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection
