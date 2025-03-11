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
        html,body {
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
        }

        .avatar {
            width: 25px;
            height: 25px;
            border-radius: 50%;
        }

        .loading {
            width: 20px;
            height: 20px;
        }

        .user_profile_avatar {
            width: 30vh;height: 30vh;
            box-shadow: 0 3px 2px rgba(0, 0, 0, 0.034), 0 7px 5px rgba(0, 0, 0, 0.048), 0 13px 10px rgba(0, 0, 0, 0.06), 0 22px 18px rgba(0, 0, 0, 0.072), 0 42px 33px rgba(0, 0, 0, 0.086), 0 100px 80px rgba(0, 0, 0, 0.12);
            margin: 25px auto;
            border-radius: 5px;
        }

        .user-panel img {
           vertical-align: unset !important;
        }

        .main-header {z-index: unset;}
        .search-result{
            border-bottom:solid 1px #BDC7D8;
            padding:5px;
            font-family: 'Raleway', sans-serif;
            font-size: 14px;
            color:blue;
        }

        a {
            color: #1e7ad3;
            text-decoration: none;
        }
        .results {
            position: fixed;
            /*width: 40vw;*/
            max-height: 60vh;
            overflow-y: scroll;
            margin-top: 50px;
            color: #000000;
            z-index: 2000 !important;
            padding: 0;
            border-width: 1px;
            border-style: solid;
            border-color: #cbcfe2 #c8cee7 #c4c7d7;
            border-radius: 3px;
            background-color: #fdfdfd;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
            background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: linear-gradient(top, #fdfdfd, #eceef4);
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* On screens that are 768px or less, set top to 60px; */
        @media screen and (max-width: 768px) {
            .results {
                top: 60px !important;
            }
        }

        .results li { display: block }

        .results li:first-child { margin-top: -1px }

        .results li:first-child:before, .search .resultsO li:first-child:after {
            display: block;
            content: '';
            width: 0;
            height: 0;
            position: absolute;
            left: 50%;
            margin-left: -5px;
            border: 5px outset transparent;
        }

        .results li:first-child:before {
            border-bottom: 5px solid #c4c7d7;
            top: -11px;
        }

        .results li:first-child:after {
            border-bottom: 5px solid #fdfdfd;
            top: -10px;
        }

        .results li:first-child:hover:before, .search .resultsO li:first-child:hover:after { display: none }

        .results li:last-child { margin-bottom: -1px }
        .results a {
            display: block;
            position: relative;
            margin: 0 -1px;
            padding: 6px 40px 6px 10px;
            color: #808394;
            font-weight: 500;
            text-shadow: 0 1px #fff;
            border: 1px solid transparent;
            border-radius: 3px;
        }

        .results a span { font-weight: 200 }

        .results a:before {
            content: '';
            width: 18px;
            height: 18px;
            position: absolute;
            top: 50%;
            right: 10px;
            margin-top: -9px;
            background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
        }

        .results a:hover {
            text-decoration: none;
            color: #fff;
            text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
            border-color: #2380dd #2179d5 #1a60aa;
            background-color: #338cdf;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
            background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
            background-image: linear-gradient(top, #59aaf4, #338cdf);
            -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
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
<!-- Helper Script -->
<script src="{{ url('/assets/custom/js/helpers.js') }}"></script>

<script>
    $(function () {
        let debounceTimer;

        $('.search').on("keyup click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            let value = $(this).val().trim();

            // Clear previous debounce timer
            clearTimeout(debounceTimer);

            if (value.length > 3) {
                // Set a new debounce timer (300ms delay)
                debounceTimer = setTimeout(() => {
                    searchData(value);
                }, 300);
            } else {
                $('#search-result-container').hide();
            }
        });

        $(document).click(function () {
            $('#search-result-container').hide();
        });

        const searchData = (query) => {
            let resultsContainer = $('#search-result-container');

            // Show loading state
            resultsContainer.show().html(`
                <div class='text-center'>
                    <img class="loading" src="{{ url('/assets/images/loading.gif') }}" alt="LOADING_IMG" />
                    <span style="font-size: 20px;">Loading...</span>
                </div>
            `);

            $.ajax({
                url: '{{ url('/search/customers') }}',
                type: 'GET',
                data: { query: query },
                dataType: 'json',
                success: function (response) {
                    resultsContainer.empty();

                    if (response.length > 0) {
                        response.forEach(customer => {
                            resultsContainer.append(`
                            <li class='search-result'>
                                <a class='nxt' target='_blank' href='{{ url('/customers') }}/${customer.id}'>
                                    ${customer.bio || ''}
                                    ${customer.productName || ''}
                                    ${customer.bank || ''}
                                    ${customer.loan ? `<strong>Loan ID: </strong>${customer.loan}, <strong>Status: </strong>${customer.status}` : ''}
                                </a>
                            </li>
                        `);
                        });
                    } else {
                        resultsContainer.append(`<div class='search-result text-center'>No Result Found...</div>`);
                    }
                },
                error: function (xhr, status, error) {
                    resultsContainer.html(`<div class='text-center text-danger'>Error: ${error}</div>`);
                }
            });
        };
    });
</script>
@yield('script')
</body>
</html>
