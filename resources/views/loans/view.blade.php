@extends('layouts.app')

@section('title')
    <title>Loan Detail | Lend.Nexus</title>
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
                        <h1 class="m-0">Loan Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Loans</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 text-center">
                            <h2 class="m-t-30">{!! 'KES.  <span class="text-bold text-orange">' . number_format($loan->loan_amount).'</span>' !!}</h2>
                        </div>
                        <div class="col-md-10 col-lg-10 ">
                            <table class="table table-striped table-bordered table-hover" style="text-transform: uppercase;">
                                <thead>
                                <tr>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th style="width: 30%;">Customer Name:</th>
                                    <td>{{ $loan->customer->getCustomerName() }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Phone:</th>
                                    <td>{{ $loan->customer_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Given Date:</th>
                                    <td>{{ $loan->given_date }}</td>
                                </tr>

                                <tr>
                                    <th>Due Date:</th>
                                    <td>{{ $loan->due_date }}</td>
                                </tr>
                                <tr>
                                    <th>Given By:</th>
                                    <td>{{ $loan->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Loan Product:</th>
                                    <td>{!! $loan->product->name." <i class='text-orange text-bold'>| ".$loan->bank->name."</i>" !!}</td>
                                </tr>

                                <tr>
                                    <th>Loan Amount:</th>
                                    <td>{!! number_format($loan->loan_amount)."&nbsp;&nbsp;<i class='text-orange'>&nbsp;| ".number_format($loan->loan_amount - $loan->processing_fee)."</i>" !!}</td>
                                </tr>
                                <tr>
                                    <th>Loan Interest:</th>
                                    <td>{{ number_format($loan->loan_interest) }}</td>
                                </tr>
                                <tr>
                                    <th>Processing Fees:</th>
                                    <td>{{ number_format($loan->processing_fee) }}</td>
                                </tr>
                                <tr>
                                    <th>Late Payment Penalty:</th>
                                    <td>{{ number_format($loan->late_penalty) }}</td>
                                </tr>
                                <tr>
                                    <th>Bounced Cheque:</th>
                                    <td>{{ number_format($loan->bounce_cheque) }}</td>
                                </tr>
                                <tr>
                                    <th>Debt Recovery Fee:</th>
                                    <td>{{ number_format($loan->recovery_fee) }}</td>
                                </tr>
                                <tr>
                                    <th>Total Penalty Arrears:</th>
                                    <td>{{ number_format($loan->penalty_total) }}</td>
                                </tr>
                                <tr>
                                    <th>Loan Total:</th>
                                    <td>{{ number_format($loan->loan_total) }}</td>
                                </tr>
                                <tr>
                                    <th>Amount Paid:</th>
                                    <td>
                                        <strong>
                                            {{ number_format(0) }}
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Balance:</th>
                                    <td class="text-red text-bold">{{ number_format(0) }} </strong> </td>
                                </tr>
                                <tr>
                                    <th>Last Repayment Date:</th>
                                    <td>{{ '' }}</td>
                                </tr>
                                <tr>
                                    <th>Comments:</th>
                                    <td class="comments text-bold"><small>{!! $loan->comments !!}</small></td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>{!! $loan->getStatusBadge() !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- Lightbox2 -->
    <script src="{{ url('/assets/plugins/lightbox2/js/lightbox.min.js') }}"></script>
@endsection
