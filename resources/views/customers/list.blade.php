@extends('layouts.app')

@section('title')
    <title>Customers | Lend.Nexus</title>
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('layouts._message')
                        <table id="customersTable" class="table table-bordered table-striped table-hover">
                            <thead class="bg-gradient-navy">
                            <tr>
                                <th>Name</th>
                                <th>Bank</th>
                                <th>Branch</th>
                                <th>Town</th>
                                <th>Loan Limit</th>
                                <th>Has Loan</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->getCustomerName() }}</td>
                                    <td>{{ $customer->bank->name }}</td>
                                    <td>{{ $customer->branch->name }}</td>
                                    <td>{{ $customer->town->name }}</td>
                                    <td>{{ number_format($customer->loan_limit) }}</td>
                                    <td>{{ $customer->has_loan }}</td>
                                    <td></td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>
                                        <a class="mr-3" href="{{ url('/customers/'.$customer->id) }}">
                                            <img src="{{ url('/assets/images/icons/eye.svg') }}" alt="img">
                                        </a>
                                        <a class="mr-3" href="{{ url('/customers/edit/'.$customer->id) }}">
                                            <img src="{{ url('/assets/images/icons/edit.svg') }}" alt="img">
                                        </a>
                                        <a class="confirm-text" onclick="return false">
                                            <img src="{{ url('/assets/images/icons/delete.svg') }}" alt="img">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        const customersTable = $("#customersTable").DataTable({
            dom: 'Bfrtip', responsive: true, lengthChange: true, autoWidth: false,
            buttons: [
                {text: '<i class=\'fas fa-plus-circle\'></i> New Customer', className: 'btn btn-sm bg-gradient-navy text-white',
                    action: function () {
                        window.open('customers/create', '_self')
                    }
                },
                "colvis"
            ],
            order: [[0, 'desc']]
        })
    </script>
@endsection
