@extends('layouts.app')

@section('title')
    <title>Civil Leads | Lend.Nexus</title>
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
                        <h1 class="m-0">Civil Servant Leads Management</h1>
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
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        @include('layouts._message')
                        <table id="leadsTable" class="table table-bordered table-striped table-hover">
                            <thead class="bg-gradient-navy">
                            <tr>
                                <th>Name</th>
                                <th>Employer</th>
                                <th>Civil Type</th>
                                <th>Town</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <td>{{ $lead->getCustomerName() }}</td>
                                    <td>{{ $lead->bank->name }}</td>
                                    <td>{{ $lead->branch->name }}</td>
                                    <td>{{ $lead->town->name }}</td>
                                    <td>{{ $lead->user->name }}</td>
                                    <td>{{ $lead->created_at }}</td>
                                    <td>
                                        <a class="mr-3" href="{{ url('/leads/'.$lead->id) }}">
                                            <img src="{{ url('/assets/images/icons/eye.svg') }}" alt="img">
                                        </a>
                                        <a class="mr-3" href="{{ url('/leads/edit/'.$lead->id) }}">
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
        const leadsTable = $("#leadsTable").DataTable({
            dom: 'Bfrtip', responsive: true, lengthChange: true, autoWidth: false,
            buttons: [
                {text: '<i class=\'fas fa-plus-circle\'></i> New Lead', className: 'btn btn-sm bg-gradient-navy text-white',
                    action: function () {
                        window.open('leads/create', '_self')
                    }
                },
                "colvis"
            ],
            order: [[0, 'desc']]
        })
    </script>
@endsection
