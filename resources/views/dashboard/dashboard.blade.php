@extends('layouts.app')

@section('bread-crumbbar')
    <h4 class="page-title">CRM</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">CRM</li>
        </ol>
    </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="widgetbar">
            <!-- <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button> -->
        </div>
    </div>
@endsection

@section('content')
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Students</h5>
                                    <h4 class="mb-0">2585</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated Today</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>25%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-award"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Teachers</h5>
                                    <h4 class="mb-0">263</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 1 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"><i class="feather icon-trending-down mr-1"></i>23%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-warning-inverse mr-0"><i class="feather icon-briefcase"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Staffs</h5>
                                    <h4 class="mb-0">45</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 3 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-secondary-inverse mr-0"><i class="feather icon-book-open"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Course</h5>
                                    <h4 class="mb-0">93</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 5 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"><i class="feather icon-trending-down mr-1"></i>10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
@endsection
