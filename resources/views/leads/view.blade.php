@extends('layouts.app')

@section('title')
    <title>Lead Detail | Lend.Nexus</title>
@endsection

@section('style')
    <!-- Lightbox2 -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/lightbox2/css/lightbox.min.css') }}">
    <style>
        .user_profile_avatar {
            width: 30vh;height: 30vh;
            box-shadow: 0 3px 2px rgba(0, 0, 0, 0.034), 0 7px 5px rgba(0, 0, 0, 0.048), 0 13px 10px rgba(0, 0, 0, 0.06), 0 22px 18px rgba(0, 0, 0, 0.072), 0 42px 33px rgba(0, 0, 0, 0.086), 0 100px 80px rgba(0, 0, 0, 0.12);
            margin: 25px auto;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lead Details</h1>
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
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-biodata-tab" data-toggle="pill" href="#custom-tabs-four-biodata" role="tab" aria-controls="custom-tabs-four-biodata" aria-selected="true">Bio-Data</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-biodata" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ url('/assets/images/avatar.png') }}" data-lightbox="UserImage" data-title="{{ $lead->getCustomerName() }}">
                                                <img class="user_profile_avatar" src="{{ url('/assets/images/avatar.png') }}" alt="IMG_CUSTOMER" />
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <h3>PERSONAL DETAILS</h3>
                                            <hr/>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" style="width: 100%">
                                                    <tr>
                                                        <th>NAME:</th>
                                                        <td style="width: 40%">{{ $lead->getCustomerName() }}</td>
                                                        <th>NATIONAL ID:</th>
                                                        <td>{{ $lead->idNo }}</td>
                                                    </tr
                                                    <tr>
                                                        <th>D.O.B:</th>
                                                        <td>{{ $lead->dob }}</td>
                                                        <th>GENDER:</th>
                                                        <td>{{ getGender($lead->gender) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>PHONE NO.:</th>
                                                        <td class="contacts">{!! (strlen($lead->secondaryPhone) > 0) ? "<a href='tel:+$lead->primaryPhone'>$lead->primaryPhone</a>/$lead->secondaryPhone": "<a href='tel:+$lead->primaryPhone'>$lead->primaryPhone</a>" !!}</td>
                                                        <th>EMAIL:</th>
                                                        <td>{{ $lead->work_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>TOWN:</th>
                                                        <td>{{ $lead->town->name }}</td>
                                                        <th>PERSONAL EMAIL:</th>
                                                        <td>{{ $lead->work_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>HOME ADDRESS:</th>
                                                        <td>{{ $lead->home_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>BUSINESS ADDRESS:</th>
                                                        <td>{{ $lead->business_address }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <h3 class="m-t-40">EMPLOYER DETAILS</h3>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <th>BANK:</th>
                                                        <td>{{ $lead->bank->name }}</td>
                                                        <th>BRANCH:</th>
                                                        <td>{{ $lead->branch->name }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <h3 class="m-t-40">ACCOUNT DETAILS</h3>
                                            <hr/>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <th>LOAN PRODUCT:</th>
                                                        <td>{{ $lead->product->name }}</td>
                                                        <th>CREDIT LIMIT:</th>
                                                        <td>{{ number_format($lead->loan_limit, 2) }}</td>
                                                        <th>OFFICE BRANCH:</th>
                                                        <td>{{ getSection($lead->section) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>STATUS:</th>
                                                        <td>{!! $lead->getStatusBadge() !!}</td>
                                                        <th>ADDED BY:</th>
                                                        <td>{{ $lead->user->name }}</td>
                                                        <th>ADDED DATE:</th>
                                                        <td>{{ $lead->created_at }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>COMMENTS:</th>
                                                        <td>
                                                            @if(isset($lead->comments))
                                                                {{ $lead->comments }}
                                                            @else
                                                                {!! \App\Helpers\Badge::set('danger', 'NONE') !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="m-tb-20">
                                                <div class="margin">
                                                    <div class="btn-group">
                                                        <a href="{{ url('/leads/edit/'.$lead->id) }}" class="btn btn-warning bg-gradient-warning">
                                                            <i class="fas fa-user-edit"></i>&nbsp;Edit Lead
                                                        </a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a target="_blank" href="{{ url('/customers/edit/'.$lead->id) }}" class="btn btn-success bg-gradient-success">
                                                            <i class="fas fa-check-circle"></i>&nbsp;Add as Customer
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
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
    <!-- Lightbox2 -->
    <script src="{{ url('/assets/plugins/lightbox2/js/lightbox.min.js') }}"></script>
@endsection
