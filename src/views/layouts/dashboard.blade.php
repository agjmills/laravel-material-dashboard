<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        {{ config('app.name') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link rel="stylesheet" href="/vendor/css/font-awesome.min.css">
    <link href="/vendor/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet"/>
    @yield('css')
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/img/logo/redrow-tree.svg">
        <div class="logo">
            <span class="simple-text logo-normal">
                <a href="{{route('admin.dashboard')}}">
                    <img src="/img/logo/redrow.svg" class="img-fluid" style="max-width: 200px">
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
<script src="/vendor/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/vendor/js/core/popper.min.js" type="text/javascript"></script>
<script src="/vendor/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/vendor/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="/vendor/js/plugins/chartist.min.js"></script>
<script src="/vendor/js/plugins/bootstrap-notify.js"></script>
<script src="/vendor/js/plugins/restfulizer.js"></script>
<script src="/vendor/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
@include('MaterialDashboard::partials.admin-alerts', [
    'hasAlert' => count(session('flash_notification')) > 0,
    'alertMessage' => session('flash_notification.message'),
    'alertLevel' => session('flash_notification.level')
])
@yield('js')
</body>

</html>
