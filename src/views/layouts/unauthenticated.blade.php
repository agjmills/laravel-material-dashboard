<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ env('APP_NAME') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" href="/vendor/laravel-material-dashboard/css/font-awesome.min.css">
  <link href="/vendor/laravel-material-dashboard/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
  <div class="main-panel">
    <!-- End Navbar -->
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
<script src="/vendor/laravel-material-dashboard/js/plugins/bootstrap-notify.js"></script>
<script src="/vendor/laravel-material-dashboard/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
@yield('js')
</body>

</html>
