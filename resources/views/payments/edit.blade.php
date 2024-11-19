@extends('layouts.app')

@section('title')
    <title>Edit Payment | Lend.Nexus</title>
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
                        <h1 class="m-0">Edit Payment</h1>
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
                        <h3 class="card-title">Edit Payment</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="phone">Payer Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{  old('phone', $payment->phone) }}" required />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="payment_method">Payment Method</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                        </div>
                                        <select class="form-control" name="payment_method" id="payment_method">
                                            <option> -- Select Method -- </option>
                                            <option {{ selected(1, old('payment_method', $payment->payment_method), 'selected') }} value="1">Mobile Money</option>
                                            <option {{ selected(2, old('payment_method', $payment->payment_method), 'selected') }} value="2">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="receipt">Transaction No</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="receipt" id="receipt" placeholder="Receipt/Transaction No" value="{{  old('receipt', $payment->receipt) }}" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="amount">Amount Paid</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount Paid" value="{{  old('amount', $payment->amount) }}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="loan_id">Loan ID</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="loan_id" id="loan_id" placeholder="Loan ID" value="{{  old('loan_id', $payment->loan_id) }}" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary bg-gradient-navy m-tb-10">Submit&nbsp;<i class="fas fa-arrow-right"></i></button>
                        </form>
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
