<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign In | Lend.Nexus</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/assets/images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('/site.webmanifest') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/plugins/animate/animate.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/plugins/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/custom/css/util.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/custom/css/login.css') }}" rel="stylesheet" />
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ url('/assets/images/img-01.png') }}" alt="IMG">
            </div>
            <form class="login100-form" method="post">
                {{ csrf_field() }}
                <div class="text-center p-b-40">
                    <h1 class="h3 mb-3 font-weight-bolder">Lend.Nexus</h1>
                    <span class="login100-form-title"></span>
                </div>

                <div class="form-label-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Email Or Username" required autofocus autocomplete="off">
                    <label for="username">Email Or Username</label>
                </div>

                <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                <p class="mt-5 mb-3 text-muted text-center"><strong>Copyright &copy; 2021 <a href="#">HMS</a>.</strong> &nbsp;&nbsp;All rights reserved.</p>
            </form>
        </div>
    </div>
</div>

<script src="{{ url('/assets/plugins/jquery/jquery.js') }}"></script>
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ url('/assets/plugins/tilt/tilt.jquery.min.js') }}"></script>
<script>$('.js-tilt').tilt({scale: 1.1})</script>
</body>
</html>
