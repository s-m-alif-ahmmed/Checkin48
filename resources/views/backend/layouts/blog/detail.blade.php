@extends('backend.app')

@section('title', 'Blog Detail')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Blog Detail</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">

                    <div class="form-group">
                        <label for="created_at" class="form-label">Created At:</label>
                        <input type="text" class="form-control" name="created_at" placeholder="Created Time" id="created_at" value="{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d H:i:s') ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="creator" class="form-label">Created By:</label>
                        <input type="text" class="form-control" name="creator" placeholder="Creator" id="creator" value="{{ $data->user->name ?? ' ' }}" disabled readonly>
                    </div>

                    <!-- Blog Tags -->
                    <div class="form-group mb-3">
                        <label for="tags">Tags</label>
                        <select name="tags[]" id="tags" class="form-control select2-show-search form-select" multiple disabled readonly>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ $data->tags->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title" class="form-label">Blog Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Blog title" id="title" value="{{ $data->title ?? ' ' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Blog Description:</label>
                        <p disabled readonly>{!! $data->description ?? ' ' !!}</p>
                    </div>

                    <div class="form-group">
                        <label for="body" class="form-label">Blog Body:</label>
                        <p disabled readonly>{!! $data->body ?? ' ' !!}</p>
                    </div>

                    <div class="form-group">
                        <label for="vote_end_date" class="form-label">Blog Image:</label>
                        <img class="img-fluid" style="height: 200px; width: auto;" src="{{ asset($data->image ?? 'frontend/no-image.jpg') }}" alt="Blog Image">
                    </div>

                    <div class="form-group">
                        <a href="{{ route('blog.index') }}" class="btn btn-danger me-2">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
