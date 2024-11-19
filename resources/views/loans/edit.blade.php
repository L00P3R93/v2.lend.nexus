@extends('layouts.app')

@section('title')
    <title>Edit Loan | Lend.Nexus</title>
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
                        <h1 class="m-0">Loan Management</h1>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Loan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="">
                            @csrf
                            @method('PUT')
                            <div class="row m-tb-10">
                                <div class="form-group col-md-4">
                                    <label for="customer">Customer Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="customer" id="customer" placeholder="Customer Details" value="{{ $loan->customer_phone }}" disabled />
                                    </div>
                                    <div id="customer_details">
                                        {!! \App\Helpers\Badge::set('info', $loan->customer->getCustomerName()) !!}
                                        {!! \App\Helpers\Badge::set('warning', 'Limit: '.number_format($loan->customer->loan_limit)) !!}
                                        {!! \App\Helpers\Badge::set('warning', $loan->product->name.' | '.$loan->bank->name) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="loan_amount">Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="loan_amount" id="loan_amount" placeholder="Loan Amount" value="{{ old('loan_amount', $loan->loan_amount) }}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="loan_interest">Interest</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="loan_interest" id="loan_interest" placeholder="Loan Interest" value="{{ old('loan_interest', $loan->loan_interest) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row m-tb-10">
                                <div class="form-group col-md-4">
                                    <label for="givenDate">Given Date</label>
                                    <div class="input-group date" id="givenDt" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="given_date" name="given_date" data-target="#givenDt" value="{{ old('givenDate', $loan->given_date) }}"/>
                                        <div class="input-group-append" data-target="#givenDt" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-day"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dueDate">Due Date</label>
                                    <div class="input-group date" id="dueDt" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="due_date" name="due_date" data-target="#dueDt" value="{{ old('due_date', $loan->due_date) }}"/>
                                        <div class="input-group-append" data-target="#dueDt" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bank_id">Bank</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <select class="form-control" id="bank_id" name="bank_id">
                                            <option> -- Select Bank --</option>
                                            @foreach($banks as $bank)
                                                <option {{ selected(old('bank_id', $loan->bank_id), $bank->id, 'selected') }} value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-tb-10">
                                <div class="form-group col-md-4">
                                    <label for="late_penalty">Late Penalty</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="late_penalty" id="late_penalty" placeholder="Late Penalty" value="{{ old('late_penalty', $loan->late_penalty) }}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bounce_cheque">Bounced Cheque</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="bounce_cheque" id="bounce_cheque" placeholder="Bounce Cheque" value="{{ old('bounce_cheque', $loan->bounce_cheque) }}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="recovery_fee">Recovery Fee</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="recovery_fee" id="recovery_fee" placeholder="Recovery Fee" value="{{ old('recovery_fee', $loan->recovery_fee) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row m-tb-10">
                                <div class="form-group col-md-4">
                                    <label for="penalty_total">Total Arrears</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="penalty_total" id="penalty_total" placeholder="Total Arrears" value="{{  old('penalty_total', $loan->penalty_total) }}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="loan_total">Total Loan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="loan_total" id="loan_total" placeholder="Loan Total" value="{{  old('loan_total', $loan->loan_total) }}" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary bg-gradient-navy m-tb-10">Update&nbsp;<i class="fas fa-arrow-right"></i></button>
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
    <script>
        $('#loan_period, #pay_method, #when_due').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: 10
        })
        $('#due_date_dt').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>
@endsection
