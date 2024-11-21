@extends('layouts.app')

@section('title')
    <title>Reports | Lend.Nexus</title>
@endsection

@section('style')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">System Reports</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-outline card-primary col-md-4">
                        <div class="card-header">
                            General Reports
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a target="_blank" href="{{ url('/loan_book') }}">Loan Book Report</a>
                                </li>
                                <li class="list-group-item">
                                    <a target="_blank" href="{{ url('/collections') }}">Collections Report</a>
                                </li>
                                <li class="list-group-item">
                                    <a target="_blank" href="{{ url('/monthly_sales') }}">Monthly Sales Report</a>
                                </li>
                                <li class="list-group-item">
                                    <a target="_blank" href="{{ url('/daily_sales') }}">Daily Sales Report</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="card card-outline card-success col-md-4">
                        <div class="card-header">
                            Sales Reports
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a target="_blank" href="{{ url('/monthly_sales') }}">Monthly Sales Report</a>
                                </li>
                                <li class="list-group-item">
                                    <a target="_blank" href="{{ url('/daily_sales') }}">Daily Sales Report</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
@endsection
