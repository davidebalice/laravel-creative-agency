<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Login" name="description" />
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/toastr.css?d=2') }}" >
        <style>
            .loginInput{
                border:1px solid #ddd;
                width: 100%;
                padding:6px;
                border-radius: 4px;
                background: #f1f1f1;
                box-shadow: 0px 0px 3px 0px rgb(0, 0, 0,0.16) inset;
            }

            .loginButton{
                border:1px solid #ddd;
                width: 100%;
                text-align: center;
                padding:6px;
                border-radius: 4px;
                background: #de564f;
                box-shadow: 0px 0px 3px 0px rgb(0, 0, 0,0.16);
            }
            .loginButton:hover{
                background: #bc3b3b;
            }
            
        </style>
    </head>

    <body class="auth-body-bg">
        <x-guest-layout>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-4 mb-4">
                            <div class="mb-3">
                                <a href="/" class="auth-logo">
                                    <img src="{{ asset('logo/logo.png') }}" height="20" class="mx-auto" alt="" style="height:45px">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Login</b></h4>

                        @if (env('DEMO_MODE'))
                            <div class="loginData">
                                <b>Demo data</b>:
                                <p>
                                    Email: mario@rossi.it
                                </p>
                                <p>
                                    Password: 12345678
                                </p>
                            </div>
                        @endif
                           

                        <div class="p-3">
                            
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email  -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <br />
                                    <x-text-input id="email" class="block mt-1 w-full loginInput" type="email" name="email" value="mario@rossi.it" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                
                                @php
                                    /*
                                     <!-- Username  -->
                                    <div>
                                        <x-input-label for="username" :value="__('Username')" />
                                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                    </div>
                                    */
                                @endphp
                               
                                
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <br />
                                    <x-text-input id="password" class="block mt-1 w-full loginInput"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    

                                    <x-primary-button class="ml-3 loginButton">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                   
                                </div>

                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
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
                    "positionClass": "toast-top-right",
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
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
        </script>

        <script src="{{ asset('backend/assets/js/app.js') }}"></script>
        </x-guest-layout>
    </body>
</html>