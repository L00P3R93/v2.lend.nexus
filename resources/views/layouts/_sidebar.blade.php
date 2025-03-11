<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-gradient-navy">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bolder">Lend.Nexus</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar search" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ selected(request()->path(), 'dashboard', 'active') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ selector(request()->path(), ['leads','customers','zero_balance','banks'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/leads') }}" class="nav-link {{ selected(request()->path(), 'leads', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leads</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/customers') }}" class="nav-link {{ selected(request()->path(), 'customers', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/zero_balance') }}" class="nav-link {{ selected(request()->path(), 'zero_balance', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Zero Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/banks') }}" class="nav-link {{ selected(request()->path(), 'banks', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banks</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ selector(request()->path(), ['refinances','loans'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Loans
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/refinances') }}" class="nav-link {{ selected(request()->path(), 'refinances', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Refinances</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/loans') }}" class="nav-link {{ selected(request()->path(), 'loans', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loans</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ selector(request()->path(), ['collections_list','overdue', 'defaulters', 'due_roll'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Collections</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/collections_list') }}" class="nav-link {{ selected(request()->path(), 'collections_list', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collection List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/overdue') }}" class="nav-link {{ selected(request()->path(),'overdue', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>OverDues</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/defaulters') }}" class="nav-link {{ selected(request()->path(),'defaulters', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Past Over-Dues</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/due_roll') }}" class="nav-link {{ selected(request()->path(),'due_roll', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Due Roll</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ selector(request()->path(), ['suspense','payments'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Payments</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link  {{ selected(request()->path(),'suspense', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suspense</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/payments') }}" class="nav-link  {{ selected(request()->path(),'payments', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  {{ selector(request()->path(), ['disbursedReport','loanBookReport','collectionsReport'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Reports</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/disbursedReport') }}" class="nav-link {{ selected(request()->path(), 'disbursedReport', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Disbursed Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/loanBookReport') }}" class="nav-link {{ selected(request()->path(), 'loanBookReport', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loan Book Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/collectionsReport') }}" class="nav-link {{ selected(request()->path(), 'collectionsReport', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collections Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ selector(request()->path(), ['products','roles','users'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/users') }}" class="nav-link {{ selected(request()->path(), 'users', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Access</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/roles') }}" class="nav-link {{ selected(request()->path(), 'roles', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/products') }}" class="nav-link {{ selected(request()->path(), 'products', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
