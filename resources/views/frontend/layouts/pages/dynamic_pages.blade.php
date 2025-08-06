@extends('frontend.app')

@section('title')
    {{ $data->page_title }}
@endsection

@push('styles')
@endpush

@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>{!! $data->page_content !!}</p>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
@endpush
