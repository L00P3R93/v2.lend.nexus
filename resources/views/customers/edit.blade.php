@extends('layouts.app')

@section('title')
    <title>Edit Customer | Lend.Nexus</title>
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
                        <h1 class="m-0">Customer Management</h1>
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
                <div class="card">
                    <div class="card-header">
                        Edit Customer
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fullName">Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>

                                        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Full Name" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>

                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="phoneNo">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="phoneNo" id="phoneNo" placeholder="Phone Number" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <select class="form-control" id="status" name="status">
                                            <option> -- Select Status --</option>
                                            <option value="1">Active</option>
                                            <option value="2">Blocked</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary bg-gradient-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $('#role,#status').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: 10
        })
    </script>
@endsection
