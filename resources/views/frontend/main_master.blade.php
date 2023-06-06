<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/toastr.css?d=32') }}" >
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('frontend.body.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>
            @yield('main')
        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->
        @include('frontend.body.footer')
        <!-- Footer-area-end -->




		<!-- JS here -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/element-in-view.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-form.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
        <!-- Toaster js -->
        <script type="text/javascript" src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
           
               case 'success':
               toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
               toastr.success(" {{ Session::get('message') }} ");
               break;
           
               case 'warning':
               toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
        </script>
    </body>
</html>
