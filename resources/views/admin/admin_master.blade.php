<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Creative agency Laravel Cms" name="description" />
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
        <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/toastr.css?d=32') }}" >
    </head>
    <body data-topbar="dark">
        <div id="layout-wrapper">
           @include('admin.body.header')
           @include('admin.body.sidebar')
            <div class="main-content">
                @yield('admin')
                @include('admin.body.footer')
            </div>
        </div>
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>
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
        <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/form-editor.init.js?d=1') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('backend/assets/js/sweetalert.js') }}"></script>
        <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script> 
    </body>
</html>