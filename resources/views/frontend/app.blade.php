<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{app()->getLocale() === 'ar' ? 'rtl' : 'ltr'}}">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('metainfos')

    <title>@yield('title')</title>

    {{--    Styles  --}}
    @include('frontend.partials.styles')
</head>

<body class="top-0">
    {{-- Header --}}
    @include('frontend.partials.header',['socialMediaLinks' => $socialMediaLinks])
    {{-- Header --}}

    <!-- =============================================== Main Start Hare ================================== -->
    @yield('content')
    <!-- =============================================== Main End Hare ================================== -->

    {{-- Header --}}
    @include('frontend.partials.footer',['socialMediaLinks' => $socialMediaLinks])
    {{-- Header --}}

    {{-- Header --}}
    @include('frontend.partials.modal')
    {{-- Header --}}
    <div id="google_translate_element2"></div>
    @include('frontend.partials.scripts')
</body>

</html>
