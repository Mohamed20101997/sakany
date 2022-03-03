<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <title>سكني</title>
    <!-- Stylesheets -->
    <link href="{{asset('front')}}/css/bootstrap.css" rel="stylesheet">
    <link href="{{asset('front')}}/css/bootstrap.rtl.full.min.css" rel="stylesheet">
    <link href="{{asset('front')}}/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{asset('front')}}/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
    <link href="{{asset('front')}}/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
    <link href="{{asset('front')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('front')}}/css/responsive.css" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{asset('front/')}}/css/color-switcher-design.css" rel="stylesheet">

    <!--Color Themes-->
    <link id="theme-color-file" href="{{asset('front')}}/css/color-themes/default-theme.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('front')}}/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{asset('front')}}/images/favicon.png" type="image/x-icon">

    {{-- noty --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    @yield('css')

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header">
        <!-- Main Box -->
        <div class="main-box">
            <div class="auto-container">
                <div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="{{route('home')}}"><img src="{{asset('front/images/logo4.png')}}"></a></div>

                    </div>

                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">

                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">

                                <ul class="navigation clearfix" id="nav_one">


                                    @if(auth()->guard('user')->check() || auth()->guard('owner')->check())

                                        <li>
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                                    @if(auth()->guard('user')->check())
                                                        {{auth()->guard('user')->user()->name}}
                                                    @elseif(auth()->guard('owner')->check())
                                                        {{auth()->guard('owner')->user()->name}}
                                                    @endif

                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{route('front.logout')}}">خروج</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        @if(auth()->guard('owner')->check())
                                            <li><a href="#">إضافة شقه</a></li>
                                        @endif

                                    @else
                                        <li><a href="{{route('front.login')}}">دخول</a></li>
                                        <li><a href="{{route('front.register')}}">حساب جديد</a></li>
                                    @endif
                                        <li><a href="{{route('home')}}">الرئيسيه</a></li>
                                </ul>

                            </div>

                        </nav>
                        <!-- Main Menu End-->
                    </div>
                    <!--Nav Outer End-->

                </div>
            </div>
        </div>

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{route('home')}}" class="img-responsive"><img src="{{asset('front')}}/images/logo6.png" style="width: 40%;" alt="" title=""></a>
                </div>

                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('front.login')}}">Login</a></li>
                                <li><a href="{{route('front.register')}}">Sing Up</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->

    </header>
    <!--End Main Header -->

@include('dashboard.partials._confirm')
@include('dashboard.partials._sessions')
   @yield('contain')

    <!--Main Footer-->
    <footer class="main-footer" style="background-image:url(images/background/2.jpg)">
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="column col-md-6 col-sm-12 col-xs-12">
                        <div class="copyright">&copy; Copyright 2022 All rights reserved</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="{{asset('front')}}/js/jquery.js"></script>
<!--Revolution Slider-->
<script src="{{asset('front')}}/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{asset('front')}}/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="{{asset('front')}}/js/main-slider-script.js"></script>

<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
<script src="{{asset('front')}}/js/jquery.fancybox.js"></script>
<script src="{{asset('front')}}/js/owl.js"></script>
<script src="{{asset('front')}}/js/jquery-ui.js"></script>
<script src="{{asset('front')}}/js/wow.js"></script>
<script src="{{asset('front')}}/js/appear.js"></script>
<script src="{{asset('front')}}/js/script.js"></script>

<!--Color Switcher-->
<script src="{{asset('front')}}/js/color-settings.js"></script>

@yield('js')

</body>
</html>
