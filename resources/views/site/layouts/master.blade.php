<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <title> @yield('page_title') | @lang('title.EgyMerch') </title>
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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site_assets/assets/imgs/favicon.png') }}">
    <!-- Template CSS -->
    @if (app()->getLocale() == 'ar')

        <link rel="stylesheet" href="{{ asset('site_assets/assets/css/main-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/assets/css/acount-rtl.css') }}">

    @else

        <link rel="stylesheet" href="{{ asset('site_assets/assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/assets/css/acount.css') }}">

    @endif
    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/vendors/fontawesome-all.min.css') }}">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    {{-- niceCountryInput --}}
    <link rel="stylesheet" href="{{ asset('plugin/country/niceCountryInput.css') }}">

    <!-- vendor min  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/sweetalert/sweetalert2.min.css') }}">

    {{-- style css --}}
    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/style.css') }}">

@livewireStyles
</head>

<body>

    @include('site.layouts.header')

    <main class="main">
        @yield('page_content')
    </main>

    @include('site.layouts.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-10">@lang('home.Now Loading')</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <input type="number" id="size-product-id" hidden>
    <input type="text" id="size-product" hidden>
    <input type="number" id="color-product-id" hidden>
    <input type="text" id="color-product" hidden>

    <!-- Vendor JS-->
    <script src="{{ asset('site_assets/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.elevatezoom.js') }}"></script>

    <script type="text/javascript">
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    
    @livewireScripts

    <!-- Template  JS -->
    @if (app()->getLocale() == 'ar')

        <script src="{{ asset('site_assets/assets/js/main-rtl.js') }}"></script>
        <script src="{{ asset('site_assets/assets/js/shop-ar.js') }}"></script>

    @else

        <script src="{{ asset('site_assets/assets/js/main.js') }}"></script>
        <script src="{{ asset('site_assets/assets/js/shop.js') }}"></script>

    @endif

    {{-- app js --}}
    <script src="{{ asset('site_assets/assets/js/app.js') }}"></script>

    {{-- niceCountryInput js --}}
    <script src="{{ asset('plugin/country/niceCountryInput.js') }}" type="text/javascript"></script>

    <!-- min sweetalert -->
    <script src="{{ asset('plugin/sweetalert/sweetalert2.all.min.js') }}"></script>

    <!-- min sweetalert -->
    <script src="{{ asset('site_assets/assets/js/cart.js') }}"></script>

    {{--jquery number--}}

    <script src="{{ asset('plugin/jquery.number.min.js') }}"></script>

    @yield('scripts')

</body>

</html>
