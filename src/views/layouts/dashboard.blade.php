<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="/vendor/laravel-material-dashboard/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/vendor/laravel-material-dashboard/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        @yield('title') | {{ config('app.name') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link rel="stylesheet" href="/vendor/laravel-material-dashboard/css/font-awesome.min.css">
    <link href="/vendor/laravel-material-dashboard/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet"/>
    @yield('css')
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ config('laravel-material-dashboard.navigation_background_image') }}">
        <div class="logo">
            <span class="simple-text logo-normal">
                <a href="{{ config('laravel-material-dashboard.dashboard_url') }}">
                    <img src="{{ config('laravel-material-dashboard.logo') }}" class="img-fluid" style="max-width: 200px">
                </a>
            </span>
        </div>
        <div class="sidebar-wrapper">
            @include('MaterialDashboard::partials.admin-nav')

        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <span class="navbar-brand">
                        @yield('content_header')
                    </span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar’"></span>
                </button>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="/vendor/laravel-material-dashboard/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-material-dashboard/js/core/popper.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-material-dashboard/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-material-dashboard/js/plugins/chartist.min.js"></script>
<script src="/vendor/laravel-material-dashboard/js/plugins/bootstrap-notify.js"></script>
<script src="/vendor/laravel-material-dashboard/js/plugins/restfulizer.js"></script>
<script src="/vendor/laravel-material-dashboard/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
@if (session()->has('flash_notification'))
    @include('MaterialDashboard::partials.admin-alerts', [
        'hasAlert' => count(session('flash_notification')) > 0,
        'alertMessage' => session('flash_notification.message'),
        'alertLevel' => session('flash_notification.level')
    ])
@endif
@yield('js')
</body>

</html>
