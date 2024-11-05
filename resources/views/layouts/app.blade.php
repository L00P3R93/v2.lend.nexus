<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/assets/images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('/site.webmanifest') }}">

    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/custom/css/util.css') }} " />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
        body {
            /*font-family: "Poppins", sans-serif;*/
            font-family: "Raleway", serif;
        }
        .user-panel img {
           vertical-align: unset !important;
        }
    </style>
    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('layouts._header');
    @include('layouts._sidebar');
    @yield('content')
    @include('layouts._footer');
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('/assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ url('/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/assets/dist/js/adminlte.js') }}"></script>
@yield('script')
</body>
</html>
