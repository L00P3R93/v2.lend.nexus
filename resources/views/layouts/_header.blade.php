<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="">
                <form class="form-inline">
                    <div>
                        <ul id="search-result-container" class="results" style="border:solid 1px #BDC7D8;display:none; "></ul>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- User Panel Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <!-- User panel (optional) -->
                <div class="user-panel">
                    <div class="image">
                        <img src="{{ get_gravatar(Auth::user()->email) }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <span class="d-block">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ url('users/'.Auth::user()->id) }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('logout') }}" class="dropdown-item">
                    <i class="fas fa-reply mr-2"></i> Log Out
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
