@php
    $route = Route::current()->getName();
@endphp

<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ route('index') }}" class="logo__black"><img src="{{ asset('logo/logo.png')}}" alt="" style="width:90%"></a>
                                <a href="{{ route('index') }}" class="logo__white"><img src="{{ asset('logo/logo_white.png')}}" alt="" style="width:90%"></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex mainMenuBg">
                                <ul class="navigation">
                                    
                                    <li class="{{($route=='index') ? 'active' : ''}}">
                                        <a href="{{ route('index') }}">
                                            Home
                                        </a>
                                    </li>
                                    
                                    <li class="{{($route=='home.about') ? 'active' : ''}}">
                                        <a href="{{ route('home.about') }}">
                                            About
                                        </a>
                                    </li>

                                    <li class="{{($route=='portfolio') ? 'active' : ''}}">
                                        <a href="{{ route('portfolio') }}">
                                            Portfolio
                                        </a>                                    
                                    </li>

                                    <li class="{{($route=='blog') ? 'active' : ''}}">
                                        <a href="{{ route('blog')}}">
                                            Blog
                                        </a>    
                                    </li>

                                    <li class="{{($route=='contact') ? 'active' : ''}}">
                                        <a href="{{ route('contact')}}">
                                            Contact
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block mainMenuBgDx">
                                <a href="#" class="btn btnGitHub">
                                    <span class="fab  fa-github"></span>
                                    <span>GitHub</span>
                                </a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ route('index') }}"><img src="{{ asset('logo/logo.png')}}" alt="" style="max-width:150px"></a>
                            </div>
                            <div class="menu__outer">
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>