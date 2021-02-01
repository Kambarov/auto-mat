<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')@lang('admin.title')</title>
    <link rel="apple-touch-icon" href="/vendor/dashboard/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/vendor/dashboard/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/vendors/css/vendors.min.css">
{{--    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/vendors/css/ui/prism.min.css">--}}
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/assets/css/style.css">
    <!-- END: Custom CSS-->

    @stack('css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{ auth()->user()->name }}</span>
                                <span class="user-status">Available</span>
                            </div>
{{--                            <span>--}}
{{--                                <img class="round" src="/vendor/dashboard/app-assets/images/portrait/small/avatar-s-11.jpg"--}}
{{--                                     alt="avatar" height="40" width="40">--}}
{{--                            </span>--}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="feather icon-power"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Auto-Mat</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->is('dashboard')?'active':'' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="feather icon-home"></i><span class="menu-title" >@lang('admin.home')</span>
                </a>
            </li>

            <li class=" navigation-header"><span>Apps</span></li>

{{--            <li class=" nav-item {{ request()->is('dashboard/users*') ? 'active' : '' }}">--}}
{{--                <a href="{{ route('dashboard.users.index') }}">--}}
{{--                    <i class="feather icon-users"></i><span class="menu-title">@lang('admin.users.title')</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class=" nav-item {{ request()->is('dashboard/products*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.products.index') }}">
                    <i class="feather icon-database"></i><span class="menu-title">@lang('admin.products.title')</span>
                </a>
            </li>

            <li class=" nav-item {{ request()->is('dashboard/orders*') ? 'active' : '' }}">
                @include('dashboard.partials.order.list')
            </li>

            <li class="navigation-header">
                <span>
                    <hr>
                </span>
            </li>
            <li class=" nav-item {{ request()->is('dashboard/settings*') ? 'active' : '' }}">
                @include('dashboard.partials.settings.link')
            </li>

            <li class="nav-item">
                <a href="{{ route('home') }}" target="_blank"><i class="feather icon-globe"></i>
                    <span class="menu-title" data-i18n="Chat">@lang('admin.site')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    @yield('speedbar')
                </div>
            </div>
        </div>
        <div class="content-body">
            @include('dashboard.includes.alerts')
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">AutoMat &copy; {{ date('Y', time()) }}<a class="text-bold-800 grey darken-2" href="#" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="/vendor/dashboard/app-assets/vendors/js/vendors.min.js"></script>
<script src="/vendor/dashboard/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
{{--<script src="/vendor/dashboard/app-assets/vendors/js/ui/prism.min.js"></script>--}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/vendor/dashboard/app-assets/js/core/app-menu.js"></script>
<script src="/vendor/dashboard/app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

@stack('js')


<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
