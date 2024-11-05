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
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="leads" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leads</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="customers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="clearedMonthly" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Zero Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="employers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Imara Banks</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Loans
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="top_ups" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Ups</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="loans" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loans</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Collections</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="collection_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collection List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="overdues" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Over-Dues</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="defaulters" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Past Over-Dues</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dueRoll" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Due Roll</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Payments</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="suspense" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suspense</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="payments" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Reports</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="disbursedReport" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Disbursed Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="loanBookReport" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loan Book Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="collectionsReport" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collections Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="employers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="roles" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Access</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="organization" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Organization</p>
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
