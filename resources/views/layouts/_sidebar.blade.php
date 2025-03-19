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
                <!-- Requests -->
                <li class="nav-item {{ selector(request()->path(), ['civil_requests','imara_requests','agent_requests'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-registered"></i>
                        <p>
                            Requests
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/civil_requests') }}" class="nav-link {{ selected(request()->path(), 'civil_requests', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Civil Loan Requests</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/imara_requests') }}" class="nav-link {{ selected(request()->path(), 'imara_requests', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Imara Loan Requests</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/agent_requests') }}" class="nav-link {{ selected(request()->path(), 'agent_requests', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agent Loan Requests</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Leads -->
                <li class="nav-item {{ selector(request()->path(), ['bank_leads','civil_leads'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-people-arrows"></i>
                        <p>Leads</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/bank_leads') }}" class="nav-link {{ selected(request()->path(), 'bank_leads', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bankers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/civil_leads') }}" class="nav-link {{ selected(request()->path(), 'civil_leads', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Civil Servants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cheques_update') }}" class="nav-link {{ selected(request()->path(), 'cheques_update', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Cheques</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Customers -->
                <li class="nav-item {{ selector(request()->path(), ['bank_customers','civil_customers','cheques_update'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/bank_customers') }}" class="nav-link {{ selected(request()->path(), 'bank_customers', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bankers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/civil_customers') }}" class="nav-link {{ selected(request()->path(), 'civil_customers', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Civil Servants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cheques_update') }}" class="nav-link {{ selected(request()->path(), 'cheques_update', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Cheques</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Lists -->
                <li class="nav-item {{ selector(request()->path(), ['my_requests','agent_lists','zero_balance','zero_balance_civil','leads_marketing','refinance_marketing','blocked','blacklist','dnd','banks'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Lists
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/my_requests') }}" class="nav-link {{ selected(request()->path(), 'my_requests', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Loan Requests</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/agent_lists') }}" class="nav-link {{ selected(request()->path(), 'agent_lists', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assigned Lists</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/zero_balance') }}" class="nav-link {{ selected(request()->path(), 'zero_balance', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Zero Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/leads_marketing') }}" class="nav-link {{ selected(request()->path(), 'leads_marketing', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leads List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/zero_balance_civil') }}" class="nav-link {{ selected(request()->path(), 'zero_balance_civil', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Zero Balance Civil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/refinance_marketing') }}" class="nav-link {{ selected(request()->path(), 'refinance_marketing', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Re-Finance List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/blocked') }}" class="nav-link {{ selected(request()->path(), 'blocked', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blocked List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/blacklist') }}" class="nav-link {{ selected(request()->path(), 'blacklist', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Black-list</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dnd') }}" class="nav-link {{ selected(request()->path(), 'dnd', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Do-Not-Disturb List</p>
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
                <!-- Loans -->
                <li class="nav-item {{ selector(request()->path(), ['pending_loans','refinances','loans'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Loans
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/pending_loans') }}" class="nav-link {{ selected(request()->path(), 'pending_loans', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Loans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/loans') }}" class="nav-link {{ selected(request()->path(), 'loans', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/refinances') }}" class="nav-link {{ selected(request()->path(), 'refinances', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Refinances</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Calculators -->
                <li class="nav-item {{ selector(request()->path(), ['imara_calc','civil_calc'], 'menu-open') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>Loan Calculators</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/imara_calc') }}" class="nav-link  {{ selected(request()->path(),'imara_calc', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Imara Loan Calculator</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/civil_calc') }}" class="nav-link  {{ selected(request()->path(),'civil_calc', 'active') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Civil Loan Calculator</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Payments -->
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
                <!-- Collections -->
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
