<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}" dir="{{app()->getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{--    Styles  --}}
    @include('frontend.partials.styles')

</head>
<body>

<!-- dashboard layout start -->
<div class="dashboard">

    <!-- DASHBOARD Left -->
    @include('frontend.layouts.owner-dashboard.partials.left-side')

    @yield('content')
</div>
<!-- dashboard layout end -->

{{-- Header --}}
@include('frontend.layouts.owner-dashboard.partials.modal')
{{-- Header --}}

<!-- Javascript Links -->
@include('frontend.partials.scripts')

</body>
</html>
