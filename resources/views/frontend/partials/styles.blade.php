@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

    <!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{ isset($systemSetting->favicon) && !empty($systemSetting->favicon) ? asset($systemSetting->favicon) : asset('frontend/eVento_Favicon.png') }}" />


<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet"/>

<!-- plugins css -->
<link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/bootstrap-5.3.3.min.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/owl.carousel-2.3.4.min.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/owl.theme-2.3.4.default.min.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/select2-4.1.0-rc.min.css')}}" type="text/css"/>

<!-- main css -->
<link rel="stylesheet" href="{{asset('/frontend/assets/css/global.css')}}" type="text/css" />

<link rel="stylesheet" href="{{asset('/frontend/assets/css/styles.css')}}" type="text/css" />
{{--Dashboard--}}
<link rel="stylesheet" href="{{asset('/frontend/assets/css/dashboard.css')}}" type="text/css"/>

<link rel="stylesheet" href="{{asset('/frontend/assets/css/responsive.css')}}" type="text/css" />

{{--Toast--}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

{{-- SweetAlert2 CSS --}}
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css" rel="stylesheet">


@stack('styles')
<style>
    .skiptranslate {
        display: none !important;
    }
</style>
