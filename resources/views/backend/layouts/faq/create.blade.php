@extends('backend.app')

@section('title', 'Faq Create')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Faq Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Faq</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('faq.store') }}" >
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="question_en" class="form-label">Faq Question(EN):</label>
                            <input type="text" class="form-control @error('question.en') is-invalid @enderror"
                                   name="question[en]" placeholder="Faq Question" id="question_en" value="{{ old('question.en') }}">
                            @error('question.en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="question_ar" class="form-label">Faq Question(AR):</label>
                            <input type="text" class="form-control @error('question.ar') is-invalid @enderror"
                                   name="question[ar]" placeholder="Faq Question" dir="rtl" id="question_ar" value="{{ old('question.ar') }}">
                            @error('question.ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer_en" class="form-label">Faq Answer(EN):</label>
                            <textarea class="form-control @error('answer.en') is-invalid @enderror" name="answer[en]" id="answer_en" placeholder="Faq Answer" cols="30" rows="3">{{ old('answer.en') }}</textarea>
                            @error('answer.en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer_ar" class="form-label">Faq Answer(AR):</label>
                            <textarea class="form-control @error('answer.ar') is-invalid @enderror" name="answer[ar]" id="answer_ar" dir="rtl" placeholder="Faq Answer" cols="30" rows="3">{{ old('answer.ar') }}</textarea>
                            @error('answer.ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('faq.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
