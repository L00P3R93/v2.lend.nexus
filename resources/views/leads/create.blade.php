@extends('layouts.app')

@section('title')
    <title>New Lead | Lend.Nexus</title>
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
                        <h1 class="m-0">Leads Management</h1>
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
                        Create Lead
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            @csrf
                            @method('POST')
                            <h3>Personal Details</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first_name">First Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>

                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="last_name">Last Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required autocomplete="off"/>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label for="other_name">Other Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-4">
                                    <label for="idNo">National ID/ Passport</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="idNo" id="idNo" placeholder="National ID/Passport" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="primaryPhone">Primary Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="primaryPhone" id="primaryPhone" placeholder="Phone Number" required />
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label for="secondaryPhone">Alternative Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="secondaryPhone" id="secondaryPhone" placeholder="Phone Number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="form-group col-md-4">
                                    <label for="work_email">Email Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="work_email" id="work_email" placeholder="Email Address" autocomplete="off"  />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender">Gender</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        </div>
                                        <select class="form-control" name="gender" id="gender">
                                            <option> -- Select Gender -- </option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dob">Date Of Birth</label>
                                    <div class="input-group date" id="dobdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="dob" name="dob" data-target="#dobdate" value="{{ date('Y-m-d') }}"/>
                                        <div class="input-group-append" data-target="#dobdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h3>Product Details</h3>
                            <div class="row m-t-10">
                                <div class="form-group col-md-4">
                                    <label for="product_id">Loan Product</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <select class="form-control" name="product_id" id="product_id">
                                            <option> -- Select Product -- </option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
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
                                                <option  value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="branch_id">Branch</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <select class="form-control" name="branch_id" id="branch_id">
                                            <option> -- Select Branch -- </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <h3>Physical Addresses</h3>
                            <div class="row m-t-10">
                                <div class="form-group col-md-4">
                                    <label for="business_address">Work Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                        </div>
                                        <textarea class="form-control" id="business_address" name="business_address" rows="3" cols="20"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="town_id">Town</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                        </div>
                                        <select class="form-control" name="town_id" id="town_id">
                                            <option> -- Select Town -- </option>
                                            @foreach($towns as $town)
                                                <option value="{{ $town->id }}">{{ $town->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="section">Office Branch</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-project-diagram"></i></span>
                                        </div>
                                        <select class="form-control" name="section" id="section">
                                            <option> -- Select Office Branch -- </option>
                                            <option value="1">Nairobi - HQ</option>
                                            <option value="2">Mombasa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="form-group col-md-4">
                                    <label for="home_address">Home Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                        </div>
                                        <textarea class="form-control" id="home_address" name="home_address" rows="3" cols="20"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="comments">Comments</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
                                        </div>
                                        <textarea class="form-control" id="comments" name="comments" rows="3" cols="20"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-tb-20">
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
                            <button type="submit" class="btn btn-primary bg-gradient-primary m-tb-25">Save</button>
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
        $('#gender, #product_id, #bank_id, #branch_id, #job_type, #town_id, #section, #status').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: 10
        })
        $('#dobdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $(document).ready(function () {
            $('#bank_id').on('change', function () {
                let bankId = $(this).val();
                if (bankId) {
                    $.ajax({
                        url: "{{ url('/branches') }}/" + bankId,
                        type: 'GET',
                        success: function (branches) {
                            $('#branch_id').empty().append('<option value=""> -- Select Branch -- </option>');
                            $.each(branches, function (key, branch) {
                                $('#branch_id').append(`<option value="${branch.id}">${branch.name}</option>`);
                            });
                        }
                    });
                } else {
                    $('#branch_id').empty().append('<option value=""> -- Select Branch -- </option>');
                }
            });
        });
    </script>
@endsection
