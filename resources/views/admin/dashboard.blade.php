@extends('layouts.admin-main')
@section('admin-page-title')
Admin Dashboard
@endsection
@section('content')
<!-- Main-body start -->
<div class="main-body" >
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>Admin Dashboard</h4>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page header end -->
        <?php $adminx = \App\Admin::find(\Auth::guard('admin')->id()); ?>

        @if($adminx->role_id == 1 || $adminx->role_id == 3)
        <!-- Page body start -->
        <div class="page-body">
            <div class="col-md-6 col-xl-6">
                <div class="card table-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-bag-alt text-success"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>{{$total_business}}</h5>
                                    <span><a href="{{ route('admin.business.index') }}">Businesses</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-business-man-alt-1 text-success"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>{{$total_employee}}</h5>
                                    <span><a href="{{ route('admin.employee.index') }}">Total Employees</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-ui-user-group text-success"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>{{$total_user}}</h5>
                                    <span><a href="{{ route('admin.user.index') }}">Total Users</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-eye-alt text-success"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>{{$total_category}}</h5>
                                    <span><a href="{{ route('admin.categories.index') }}">Categories</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 col-xl-3">
                            <div class="card social-widget-card">
                                <div class="card-block-big bg-facebook">
                                    <h3>{{$total_business}} +</h3>
                                    <span class="m-t-10">Total Businesses</span>
                                    <i class="icofont icofont-bag-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-3">
                            <div class="card social-widget-card">
                                <div class="card-block-big bg-twitter">
                                    <h3>{{$total_employee}} +</h3>
                                    <span class="m-t-10">Total Employees</span>
                                    <i class="icofont icofont-business-man-alt-1"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-3">
                            <div class="card social-widget-card">
                                <div class="card-block-big bg-linkein">
                                    <h3>{{$total_user}} +</h3>
                                    <span class="m-t-10">Business Users</span>
                                    <i class="icofont icofont-ui-user-group"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-3">
                            <div class="card social-widget-card">
                                <div class="card-block-big bg-google-plus">
                                    <h3>{{$total_category}} +</h3>
                                    <span class="m-t-10">Business Categories</span>
                                    <i class="icofont icofont-database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body end -->
        @endif
    </div>
</div>
<!-- Main-body end -->


<div id="styleSelector">

</div>
@endsection