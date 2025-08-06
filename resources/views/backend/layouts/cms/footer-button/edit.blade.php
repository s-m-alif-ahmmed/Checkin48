@extends('backend.app')

@section('title', 'Footer Buttons')

@section('content')

{{-- PAGE-HEADER --}}
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Footer Buttons Form</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Footer Buttons</li>
        </ol>
    </div>
</div>
{{-- PAGE-HEADER --}}


<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-body">
                <form action="{{ route('cms.footer.button.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title_en" class="form-label">Title(EN):</label>
                                <input type="text" class="form-control @error('title.en') is-invalid @enderror"
                                       name="title[en]" placeholder="Enter here title" id="title_en"
                                       value="{{ old('title.en', $data->getTranslation('title', 'en')) }}">
                                @error('title.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title_ar" class="form-label">Title(AR):</label>
                                <input type="text" class="form-control @error('title.ar') is-invalid @enderror"
                                       name="title[ar]" dir="rtl" placeholder="Enter here title" id="title_ar"
                                       value="{{ old('title.ar', $data->getTranslation('title', 'ar')) }}">
                                @error('title.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_one_en" class="form-label">Button One Title(EN):</label>
                                <input type="text" class="form-control @error('button_one.en') is-invalid @enderror"
                                       name="button_one[en]" placeholder="Enter here button title" id="button_one_en"
                                       value="{{ old('button_one.en', $data->getTranslation('button_one', 'en')) }}">
                                @error('button_one.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="button_one_ar" class="form-label">Button One Title(AR):</label>
                                <input type="text" class="form-control @error('button_one.ar') is-invalid @enderror"
                                       name="button_one[ar]" dir="rtl" placeholder="Enter here button title" id="button_one_ar"
                                       value="{{ old('button_one.ar', $data->getTranslation('button_one', 'ar')) }}">
                                @error('button_one.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_one_url" class="form-label">Button One Url:</label>
                                <input type="text" class="form-control @error('button_one_url') is-invalid @enderror"
                                       name="button_one_url" placeholder="Enter here button url" id="button_one_url"
                                       value="{{ old('button_one_url', $data->button_one_url ?? '') }}">
                                @error('button_one_url')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_two_en" class="form-label">Button Two Title(EN):</label>
                                <input type="text" class="form-control @error('button_two.en') is-invalid @enderror"
                                       name="button_two[en]" placeholder="Enter here button title" id="button_two_en"
                                       value="{{ old('button_two.en', $data->getTranslation('button_two', 'en')) }}">
                                @error('button_two.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="button_two_ar" class="form-label">Button Two Title(AR):</label>
                                <input type="text" class="form-control @error('button_two.ar') is-invalid @enderror"
                                       name="button_two[ar]" dir="rtl" placeholder="Enter here button title" id="button_two_ar"
                                       value="{{ old('button_two.ar', $data->getTranslation('button_two', 'ar')) }}">
                                @error('button_two.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_two_url" class="form-label">Button Two Url:</label>
                                <input type="text" class="form-control @error('button_two_url') is-invalid @enderror"
                                       name="button_two_url" placeholder="Enter here button url" id="button_two_url"
                                       value="{{ old('button_two_url', $data->button_two_url ?? '') }}">
                                @error('button_two_url')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_three_en" class="form-label">Button Three Title(EN):</label>
                                <input type="text" class="form-control @error('button_three.en') is-invalid @enderror"
                                       name="button_three[en]" placeholder="Enter here button title" id="button_three_en"
                                       value="{{ old('button_three.en', $data->getTranslation('button_three', 'en')) }}">
                                @error('button_three.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="button_three_ar" class="form-label">Button Three Title(AR):</label>
                                <input type="text" class="form-control @error('button_three.ar') is-invalid @enderror"
                                       name="button_three[ar]" dir="rtl" placeholder="Enter here button title" id="button_three_ar"
                                       value="{{ old('button_three.ar', $data->getTranslation('button_three', 'ar')) }}">
                                @error('button_three.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_three_url" class="form-label">Button Three Url:</label>
                                <input type="text" class="form-control @error('button_three_url') is-invalid @enderror"
                                       name="button_three_url" placeholder="Enter here button url" id="button_three_url"
                                       value="{{ old('button_three_url', $data->button_three_url ?? '') }}">
                                @error('button_three_url')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_four_en" class="form-label">Button Four Title(EN):</label>
                                <input type="text" class="form-control @error('button_four.en') is-invalid @enderror"
                                       name="button_four[en]" placeholder="Enter here button title" id="button_four_en"
                                       value="{{ old('button_four.en', $data->getTranslation('button_four', 'en')) }}">
                                @error('button_four.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="button_four_ar" class="form-label">Button Four Title(AR):</label>
                                <input type="text" class="form-control @error('button_four.ar') is-invalid @enderror"
                                       name="button_four[ar]" dir="rtl" placeholder="Enter here button title" id="button_four_ar"
                                       value="{{ old('button_four.ar', $data->getTranslation('button_four', 'ar')) }}">
                                @error('button_four.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_four_url" class="form-label">Button Four Url:</label>
                                <input type="text" class="form-control @error('button_four_url') is-invalid @enderror"
                                       name="button_four_url" placeholder="Enter here button url" id="button_four_url"
                                       value="{{ old('button_four_url', $data->button_four_url ?? '') }}">
                                @error('button_four_url')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_five_en" class="form-label">Button Five Title(EN):</label>
                                <input type="text" class="form-control @error('button_title.en') is-invalid @enderror"
                                       name="button_five[en]" placeholder="Enter here button title" id="button_five_en"
                                       value="{{ old('button_five.en', $data->getTranslation('button_five', 'en')) }}">
                                @error('button_five.en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="button_five_ar" class="form-label">Button Five Title(AR):</label>
                                <input type="text" class="form-control @error('button_five.ar') is-invalid @enderror"
                                       name="button_five[ar]" dir="rtl" placeholder="Enter here button title" id="button_five_ar"
                                       value="{{ old('button_five.ar', $data->getTranslation('button_five', 'ar')) }}">
                                @error('button_five.ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="button_five_url" class="form-label">Button Five Url:</label>
                                <input type="text" class="form-control @error('button_five_url') is-invalid @enderror"
                                       name="button_five_url" placeholder="Enter here button url" id="button_five_url"
                                       value="{{ old('button_five_url', $data->button_five_url ?? '') }}">
                                @error('button_five_url')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
