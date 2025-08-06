@extends('backend.app')

@section('title', 'Why Choose Us')

@section('content')

<div class="container p-5 mt-5" style="background-color: white">
    <h3 class="mt-3 mb-5">Why Choose Us Edit Form</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('why-choose-us.update', $item->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title_en" class="form-label">Title(EN)</label>
            <input type="text" class="form-control @error('title.en') is-invalid @enderror"
                   name="title[en]" placeholder="Enter title" id="title_en"
                   value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
            @error('title.en')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title_ar" class="form-label">Title(AR)</label>
            <input type="text" class="form-control @error('title.ar') is-invalid @enderror"
                   name="title[ar]" dir="rtl" placeholder="Enter title" id="title_ar"
                   value="{{ old('title.ar', $item->getTranslation('title', 'ar')) }}">
            @error('title.ar')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control dropify" value="{{ $item->image ?? null }}" data-default-file="{{ isset($item->image) ? asset($item->image) : '' }}">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description_en" class="form-label">Description(EN)</label>
            <textarea name="description[en]" id="description_en" rows="4" class="form-control" placeholder="Enter description" required>{{ old('description.en', $item->getTranslation('description', 'en')) }}</textarea>
            @error('description.en')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description_ar" class="form-label">Description(AR)</label>
            <textarea name="description[ar]" id="description_ar" rows="4" class="form-control" dir="rtl" placeholder="Enter description" required>{{ old('description.ar', $item->getTranslation('description', 'ar')) }}</textarea>
            @error('description.ar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="active" {{ old('status', $item->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


@endsection
