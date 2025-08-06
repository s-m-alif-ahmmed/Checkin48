@extends('backend.app')

@section('title', 'Benefits')

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Benefits of Joining Edit Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Benefits of Joining</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('benefits-of-joining.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_en" class="form-label">Title(EN):</label>
                                    <input type="text" class="form-control @error('title.en') is-invalid @enderror"
                                           name="title[en]" placeholder="Enter title" id="title_en"
                                           value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
                                    @error('title.en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title_ar" class="form-label">Title(AR):</label>
                                    <input type="text" class="form-control @error('title.ar') is-invalid @enderror"
                                           name="title[ar]" dir="rtl" placeholder="Enter title" id="title_ar"
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

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control dropify" id="image" name="image" data-default-file="{{ isset($item->image) ? asset($item->image) : '' }}">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_two_en" class="form-label">Title Two(EN):</label>
                                    <input type="text" class="form-control @error('title_two.en') is-invalid @enderror"
                                           name="title_two[en]" placeholder="Enter here title two" id="title_two_en"
                                           value="{{ old('title_two.en', $item->getTranslation('title_two', 'en')) }}">
                                    @error('title_two.en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title_two_ar" class="form-label">Title Two(AR):</label>
                                    <input type="text" class="form-control @error('title_two.ar') is-invalid @enderror"
                                           name="title_two[ar]" dir="rtl" placeholder="Enter here title two" id="title_two_ar"
                                           value="{{ old('title_two.ar', $item->getTranslation('title_two', 'ar')) }}">
                                    @error('title_two.ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_three_en" class="form-label">Title Three(EN):</label>
                                    <input type="text" class="form-control @error('title_three.en') is-invalid @enderror"
                                           name="title_three[en]" placeholder="Enter here title three" id="title_three_en"
                                           value="{{ old('title_three.en', $item->getTranslation('title_three', 'en')) }}">
                                    @error('title_three.en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title_three_ar" class="form-label">Title Three(AR):</label>
                                    <input type="text" class="form-control @error('title_three.ar') is-invalid @enderror"
                                           name="title_three[ar]" dir="rtl" placeholder="Enter here title three" id="title_three_ar"
                                           value="{{ old('title_three.ar', $item->getTranslation('title_three', 'ar')) }}">
                                    @error('title_three.ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_four_en" class="form-label">Title Four(EN):</label>
                                    <input type="text" class="form-control @error('title_four.en') is-invalid @enderror"
                                           name="title_four[en]" placeholder="Enter here title four" id="title_four_en"
                                           value="{{ old('title_four.en', $item->getTranslation('title_four', 'en')) }}">
                                    @error('title_four.en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title_four_ar" class="form-label">Title Four(AR):</label>
                                    <input type="text" class="form-control @error('title_four.ar') is-invalid @enderror"
                                           name="title_four[ar]" dir="rtl" placeholder="Enter here title four" id="title_four_ar"
                                           value="{{ old('title_four.ar', $item->getTranslation('title_four', 'ar')) }}">
                                    @error('title_four.ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="active" {{ old('status', $item->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Benefit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
