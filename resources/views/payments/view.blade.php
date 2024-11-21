@extends('layouts.app')

@section('title')
    <title>Payments | Lend.Nexus</title>
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
                        <h1 class="m-0">Payment Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Payment</li>
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
                    <div class="card-header">
                        <h3 class="card-title">View Payment</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <h2>Ksh. {{ number_format($payment->amount) }}</h2>
                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-bordered table-striped table-hover" style="font-size:15px;">
                                    <tbody>
                                    <tr>
                                        <th>Payment No:</th>
                                        <td>{{ set_number($payment->id) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method:</th>
                                        <td>{{ $payment->payment_method }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payer Phone:</th>
                                        <td>{{ $payment->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Received:</th>
                                        <td>{{ $payment->date_received }}</td>
                                    </tr>
                                    <tr>
                                        <th>Receipt No:</th>
                                        <td>{{ $payment->receipt }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Details:</th>
                                        <td>{{ $payment->customer->getCustomerName() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Loan Id:</th>
                                        <td>
                                            <a target="_blank" href="{{ url('/loans/'.$payment->loan_id) }}">{{ $payment->loan_id }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Loan Balance:</th>
                                        <td>{{ number_format($payment->loan->getBalance()) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{!! $payment->getStatusBadge() !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="m-tb-20">
                                    <a href="{{  url('/payments/edit/'.$payment->id) }}" class="btn btn-primary bg-gradient-primary"><i class="fas fa-edit"></i> Edit Payment</a>
                                </div>
                            </div>
                        </div>
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
@endsection
