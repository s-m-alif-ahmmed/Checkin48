@extends('backend.app')

@section('title', 'Create Blog')

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Blog Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Blog Tags -->
                        <div class="form-group mb-3">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="form-control select2-show-search form-select" multiple
                                    required>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title_en" class="form-label">Title(EN)</label>
                            <input type="text" name="title[en]" id="title_en" class="form-control" value="{{ old('title.en') }}" placeholder="Enter title" required>
                            @error('title.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title_ar" class="form-label">Title(AR)</label>
                            <input type="text" name="title[ar]" id="title_ar" class="form-control" dir="rtl" value="{{ old('title.ar') }}" placeholder="Enter title" required>
                            @error('title.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Blog Description -->
                        <div class="form-group mb-3">
                            <label for="description_en">Description(EN)</label>
                            <textarea id="description_en" name="description[en]" class="ck-editor form-control">{{ old('description.en') }} </textarea>
                            @error('description.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Blog Description -->
                        <div class="form-group mb-3">
                            <label for="description_ar">Description(AR)</label>
                            <textarea id="description_ar" name="description[ar]" dir="rtl" class="ck-editor form-control">{{ old('description.ar') }} </textarea>
                            @error('description.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Blog Body -->
                        <div class="form-group mb-3">
                            <label for="body_en">Body(EN)</label>
                            <textarea id="body_en" name="body[en]" class="ck-editor form-control">{{ old('body.en') }}</textarea>
                            @error('body.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Blog Body -->
                        <div class="form-group mb-3">
                            <label for="body_ar">Body(AR)</label>
                            <textarea id="body_ar" name="body[ar]" dir="rtl" class="ck-editor form-control">{{ old('body.ar') }}</textarea>
                            @error('body.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Blog Image -->
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control dropify"
                                data-default-file="">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Blog Status -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
