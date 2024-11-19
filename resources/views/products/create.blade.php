@extends('layouts.app')

@section('title')
    <title>New Product | Lend.Nexus</title>
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
                        <h1 class="m-0">Products Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
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
                        Create Product
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            @csrf
                            @method('POST')

                            @if($errors->any())
                                <div class="m-tb-20">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Product Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="rate">Interest Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="rate" id="rate" placeholder="Interest Rate" required autocomplete="off"/>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary bg-gradient-navy m-tb-10">Submit&nbsp;<i class="fas fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
@endsection
