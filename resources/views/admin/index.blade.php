@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card dashCard">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">CMS</p>
                                <h4 class="mb-2">Demo of a Cms with portfolio, services, blog and homepage management developed in Laravel.</h4>
                                <div class="text-center">
                                    <img src="{{ asset('backend/assets/images/laravel.png') }}" alt="Laravel" class="laravelLogo">
                                </div>
                            </div>
                        </div>                                            
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6">
                <div class="card dashCard dashCardBg">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="text-center">
                                    <img src="{{ asset('logo/logo.png') }}" alt="db" class="dbLogo">
                                </div>
                                <h3 class="mb-2 dashText1">Important</h3>
                                <h4 class="mb-2 dashText2">This CMS is in DEMO MODE, the crud operations area not allowed.</h4>
                            </div>
                        </div>                                            
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="row dashBox">
                            <h4 class="card-title mb-4 dashTitle">
                                <p class="dashTitle2">
                                    Latest work on Portfolio
                                </p>
                            </h4>
                            <a href="{{ route('portfolio.add') }}" class="dashTitle" >
                                <button class="btn btn-success addButton2">
                                    <i class="ri-add-circle-fill" style="font-size:22px"></i> 
                                    <div>
                                        &nbsp;&nbsp;Add work
                                    </div>
                                </button>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th style="width: 120px;">Salary</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><h6 class="mb-0">Charles Casey</h6></td>
                                        <td>Web Developer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                        </td>
                                        <td>
                                            23
                                        </td>
                                        <td>
                                            04 Apr, 2021
                                        </td>
                                        <td>$42,450</td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row dashBox">
                            <h4 class="card-title mb-4 dashTitle">
                                <p class="dashTitle2">
                                    Latest article in Blog
                                </p>
                            </h4>
                            <a href="{{ route('blog.add') }}" class="dashTitle" >
                                <button class="btn btn-success addButton2">
                                    <i class="ri-add-circle-fill" style="font-size:22px"></i> 
                                    <div>
                                        &nbsp;&nbsp;Add article
                                    </div>
                                </button>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th style="width: 120px;">Salary</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><h6 class="mb-0">Charles Casey</h6></td>
                                        <td>Web Developer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                        </td>
                                        <td>
                                            23
                                        </td>
                                        <td>
                                            04 Apr, 2021
                                        </td>
                                        <td>$42,450</td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection