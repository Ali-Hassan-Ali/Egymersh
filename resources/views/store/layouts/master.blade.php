<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <title>@yield('page_title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('store_assets/assets/imgs/theme/favicon.png') }}">
    <!-- Template CSS -->
    @if (app()->getLocale() == 'ar')

        <link href="{{ asset('store_assets/assets/css/main-rtl.css') }}" rel="stylesheet" type="text/css"/>

    @else

        <link href="{{ asset('store_assets/assets/css/main.css') }}" rel="stylesheet" type="text/css" />

    @endif

    <link href="{{ asset('store_assets/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/vendors/fontawesome-all.min.css') }}">
    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('plugin/noty/noty.css') }}">
    <script src="{{ asset('plugin/noty/noty.min.js') }}"></script>

    {{-- niceCountryInput --}}
    <link rel="stylesheet" href="{{ asset('plugin/country/niceCountryInput.css') }}">

    {{-- jquery-ui --}}
    <link rel="stylesheet" href="{{ asset('plugin/image-processing/jquery-ui.css') }}">

    {{-- Tag --}}
    <link rel="stylesheet" href="{{ asset('plugin/tag/tagify.css') }}">

    <!-- vendor min  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/sweetalert/sweetalert2.min.css') }}">

    @livewireStyles

</head>

<body class="{{ session()->get('darkmode') == 'dark' ? 'dark' : 'nodark'}}">

    <div class="screen-overlay text-li"></div>

    @include('store.layouts.sidebar')

    <main class="main-wrap">

        @include('store.layouts.header')

        @yield('page_content')

        @include('store.layouts.footer')

        @include('partials._session')

    </main>

    <script src="{{ asset('store_assets/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/chart.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('store_assets/assets/js/main.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('store_assets/assets/js/custom-chart.js') }}" type="text/javascript"></script>
    <script src="{{ asset('store_assets/assets/js/add-product.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('store_assets/assets/js/manual-order.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('plugin/interact.min.js') }}" type="text/javascript"></script>

    {{-- niceCountryInput js --}}
    <script src="{{ asset('plugin/country/niceCountryInput.js') }}" type="text/javascript"></script>

    {{-- Tag js --}}
    <script src="{{ asset('plugin/tag/jQuery.tagify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugin/tag/tagify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugin/tag/tagify.polyfills.min.js') }}" type="text/javascript"></script>

    <!-- min sweetalert -->
    <script src="{{ asset('plugin/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugin/jquery.number.min.js') }}"></script>
    {{--noty--}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script> --}}
    @yield('scripts')
    {{-- imageMaker js & jquery-ui.min.js --}}
    <script src="{{ asset('plugin/image-merge/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('store_assets/assets/js/seller/product.js') }}" type="text/javascript"></script>
    <script src="{{ asset('store_assets/assets/js/seller/edit-product.js') }}" type="text/javascript"></script>
    <script src="{{ asset('store_assets/assets/js/app.js') }}"></script>

    @livewireScripts

    <div hidden>
        <div id="getLocale">{{ app()->getLocale() }}</div>
    </div>
</body>
</html>
