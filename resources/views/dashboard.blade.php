@extends('layouts.app')

@section('title')
    <title>Dashboard | Lend.Nexus</title>
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
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('layouts._message')
                <!-- Small boxes (Stat box) -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        Current Month Summary
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-teal">
                                    <div class="inner">
                                        <h4>0</h4>
                                        <p>Active Clients</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-people-outline"></i>
                                    </div>
                                    <a href="#" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-orange">
                                    <div class="inner">
                                        <h4>KES {{ number_format(0) }}</h4>
                                        <p>Loan Book</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <a href="{{ url('/loan_book') }}" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-red">
                                    <div class="inner">
                                        <h4>KES {{ number_format(0) }}</h4>
                                        <p>Total Interest</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <a href="{{  url('/loan_book') }}" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-gray">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Sales Today</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <a href="{{ url('/daily_sales') }}" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-navy">
                                    <div class="inner">
                                        <h4>KES {{ number_format(0) }}</h4>
                                        <p>New Loans</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('/monthly_sales') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-success">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Top-Ups</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{ url('/monthly_sales') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-yellow">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Topped Amounts</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-purple">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Amount Rolled</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="{{ url('/rolled') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </div>
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        Next Month Summary
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-maroon">
                                    <div class="inner">
                                        <h4>KES {{ number_format(0) }}</h4>
                                        <p>New Loans For Next Month</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('/monthly_sales') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-lightblue">
                                    <div class="inner">
                                        <h4>KES {{ number_format(0) }}</h4>
                                        <p>Top-Ups For Next Month</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('/monthly_sales') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-olive">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Topped Amounts For Next Month</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-dark">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Due Roll For Next Month</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('/rolled') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-green card-outline">
                    <div class="card-header">
                        Collections Summary
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-blue">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Total Collected For This Month</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('/collections_report') }}" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-cyan">
                                    <div class="inner">
                                        <h4>KES {{  number_format(0) }}</h4>
                                        <p>Total Collected For Next Month</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('/collections_report') }}" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
@endsection
