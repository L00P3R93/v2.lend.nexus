@extends('layouts.app')

@section('title')
    <title>Create Loan | Lend.Nexus</title>
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
                        <h3 class="card-title">Create Loan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="" >
                            @csrf
                            @method('POST')
                            <div class="m-tb-10">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="customer">Customer Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="customer" id="customer" placeholder="Customer Details" value="{{ $customer->primaryPhone }}" disabled />
                                    </div>
                                    <div id="customer_details">
                                        {!! \App\Helpers\Badge::set('info', $customer->getCustomerName()) !!}
                                        {!! \App\Helpers\Badge::set('warning', 'Limit: '.number_format($customer->loan_limit)) !!}
                                        {!! \App\Helpers\Badge::set('warning', $customer->product->name.' | '.$customer->bank->name) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row m-tb-10">
                                <div class="form-group col-md-6">
                                    <label for="loan_amount">Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="loan_amount" id="loan_amount" placeholder="Loan Amount" value="{{ old('loan_amount', 0) }}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="loan_period">Period</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <select class="form-control" id="loan_period" name="loan_period">
                                            <option> -- Select Loan Period -- </option>
                                            @for($i=1; $i<=12; $i++)
                                                <option {{ selected(old('loan_period', 0), $i, 'selected') }} value="{{ $i }}">{{ "$i Months" }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-tb-10">
                                <div class="form-group col-md-6">
                                    <label for="pay_method">Payment Method</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                        </div>
                                        <select class="form-control" id="pay_method" name="pay_method">
                                            <option> -- Select Method -- </option>
                                            <option {{ selected(1, old('pay_method', 0), 'selected') }} value="1"> Mobile Money </option>
                                            <option {{ selected(2, old('pay_method', 0), 'selected') }} value="2"> Bank Transfer </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="when_due">When is the Due Date? </label>
                                    <div class="input-group date" id="due_date_dt" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="due_date" name="due_date" data-target="#due_date_dt" value="{{ old('due_date', date('Y-m-d', strtotime("today +1 month"))) }}"/>
                                        <div class="input-group-append" data-target="#due_date_dt" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-day"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary bg-gradient-primary"><i class="fas fa-arrow-right"></i>&nbsp;Submit </button>
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
