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
                        <form method="post" action="" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <h3>Personal Details</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first_name">First Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>

                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name', $customer->first_name) }}" required autocomplete="off" />
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="last_name">Last Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name', $customer->last_name) }}" required autocomplete="off"/>
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label for="other_name">Other Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name" value="{{ old('other_name', $customer->other_name) }}"  autocomplete="off" />
                                        @error('other_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                        <input type="text" class="form-control" name="idNo" id="idNo" placeholder="National ID/Passport" value="{{ old('idNo', $customer->idNo) }}"  />
                                        @error('idNo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="primaryPhone">Primary Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="primaryPhone" id="primaryPhone" placeholder="Phone Number" value="{{ old('primaryPhone', $customer->primaryPhone) }}" />
                                        @error('primaryPhone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label for="secondaryPhone">Alternative Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="secondaryPhone" id="secondaryPhone" placeholder="Phone Number" value="{{ old('secondaryPhone', $customer->secondaryPhone) }}" />
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
                                        <input type="email" class="form-control" name="work_email" id="work_email" placeholder="Email Address" value="{{ old('work_email', $customer->work_email) }}"  />
                                        @error('work_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                            <option {{ selected(1, $customer->gender, 'selected') }} value="1">Male</option>
                                            <option {{ selected(2, $customer->gender, 'selected') }} value="2">Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dob">Date Of Birth</label>
                                    <div class="input-group date" id="dobdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="dob" name="dob" data-target="#dobdate" value="{{ old('dob', $customer->dob) }}"/>
                                        <div class="input-group-append" data-target="#dobdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                        @error('dob')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                                <option {{ selected($product->id, $customer->product_id, 'selected') }} value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4" id="bank_section" style="@if($customer->product_id != 1) {{ 'display: none' }} @endif">
                                    <label for="bankId">Bank</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <select class="form-control" id="bank_id" name="bank_id">
                                            <option> -- Select Bank --</option>
                                            @foreach($banks as $bank)
                                                <option {{ selected($bank->id, $customer->bank_id, 'selected') }} value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('bank_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4" id="branch_section" style="@if($customer->product_id != 1) {{ 'display: none' }} @endif">
                                    <label for="branchId">Branch</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <select class="form-control" name="branch_id" id="branch_id">
                                            <option> -- Select Branch -- </option>
                                            @foreach($branches as $branch)
                                                <option {{ selected($branch->id, $customer->branch_id, 'selected') }} value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10" id="job_type_section" style="@if($customer->product_id != 1) {{ 'display: none' }} @endif">
                                <div class="form-group col-md-4">
                                    <label for="job_type">Job Type</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                        </div>
                                        <select class="form-control" name="job_type" id="job_type">
                                            <option> -- Select Job Type -- </option>
                                            <option {{ selected(1, $customer->job_type, 'selected') }} value="1">Permanent</option>
                                            <option {{ selected(2, $customer->job_type, 'selected') }} value="2">Contract</option>
                                        </select>
                                        @error('job_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                        <textarea class="form-control" id="business_address" name="business_address" rows="3" cols="20">{{ $customer->business_address }}</textarea>
                                        @error('business_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="town">Town</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                        </div>
                                        <select class="form-control" name="town_id" id="town_id">
                                            <option> -- Select Town -- </option>
                                            @foreach($towns as $town)
                                                <option {{ selected($town->id, $customer->town_id, 'selected') }} value="{{ $town->id }}">{{ $town->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('town_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                            <option {{ selected(1, $customer->section, 'selected') }} value="1">Nairobi - HQ</option>
                                            <option {{ selected(2, $customer->section, 'selected') }} value="2">Mombasa</option>
                                        </select>
                                        @error('section')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                        <textarea class="form-control" id="home_address" name="home_address" rows="3" cols="20">{{ old('home_address', $customer->home_address) }}</textarea>
                                        @error('home_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="comments">Comments</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
                                        </div>
                                        <textarea class="form-control" id="comments" name="comments" rows="3" cols="20">{{ $customer->comments }}</textarea>
                                        @error('comments')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h3>Credit Details</h3>
                            <div class="row m-t-10">
                                <div class="col-md-4">
                                    <label for="loan_limit">Loan Limit</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="loan_limit" id="loan_limit" placeholder="Loan Limit" value="{{ $customer->loan_limit }}" />
                                        @error('loan_limit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label for="status">Customer Status</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <select class="form-control" id="status" name="status">
                                            <option> -- Select Customer Status</option>
                                            @foreach($states as $status)
                                                <option {{ selected($status->id, $customer->status, 'selected') }} value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
            $("#product_id").change(function() {
                let productId = $(this).val();
                // Show/Hide bank, branch and job type based on the selected loan product
                if (productId === '1') {  // Bankers loan product
                    $('#bank_section').show();
                    $('#branch_section').show();
                    $('#job_type_section').show();
                } else {
                    $('#bank_section').hide();
                    $('#branch_section').hide();
                    $('#job_type_section').hide();
                }
            })

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

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
