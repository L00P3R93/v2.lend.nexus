@extends('layouts.app')

@section('title')
    <title>Refinances | Lend.Nexus</title>
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
                        <h1 class="m-0">Refinance Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Refinances</li>
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
                        <h3 class="card-title">Loans List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('layouts._message')
                        <table id="refinanceTable" class="table table-bordered table-striped table-hover">
                            <thead class="bg-gradient-navy">
                            <tr>
                                <th>LoanID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>GivenDate</th>
                                <th>DueDate</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($refinances as $refinance)
                                <tr>
                                    <td>
                                        <a target="_blank" href="{{ url('/loans/'.$refinance->loan_id) }}" class="text-bold text-blue">{{ set_number($refinance->loan_id) }}</a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ url('/customers/'.$refinance->customer_id) }}" class="text-bold">{{  $refinance->customer->getCustomerName() }}</a>
                                    </td>
                                    <td>{{ $refinance->customer_phone }}</td>
                                    <td>{{ date('Y-m-d', strtotime($refinance->created_at)) }}</td>
                                    <td>{{ $refinance->due_date }}</td>
                                    <td>{{ number_format($refinance->amount) }}</td>
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
        const refinanceTable = $("#refinanceTable").DataTable({
            dom: 'Bfrtip', responsive: true, lengthChange: true, autoWidth: false,
            buttons: ["colvis"],
            order: [[0, 'desc']]
        })
    </script>
@endsection
