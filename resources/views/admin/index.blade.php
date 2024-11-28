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
            <div class="col-xl-4 col-md-4">
                <div class="card dashCard dashCardBg2">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="text-center">
                                    <img src="{{ asset('backend/assets/images/laravel.png') }}" alt="Laravel" class="laravelLogo">
                                </div>
                                <h5 class="mt-4 text-white text-center">Demo of Website and Cms developed in Laravel 
                                    <br />
                                    with portfolio, services, blog and homepage management.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <div class="card dashCard">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h5 class="mb-0">View project on Github</h5>
                                <div class="text-center">
                                    <img src="{{ asset('backend/assets/images/github.png') }}" alt="Github" class="githubLogo">
                                </div>
                                <a href="https://github.com/davidebalice/laravel-creative-agency" target="_blank">
                                    <p class="githubLink">Github.com/davidebalice/laravel-creative-agency</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 164px;" aria-label="Position: activate to sort column ascending">Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Portfolio name</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Title</th>
                                </thead>

                                <tbody>
                                @php
                                    $i=1;
                                    $class_row="even";
                                    $totRecords = count($portfolio);
                                @endphp

                              
                                @if ($totRecords==0)
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="py-5 pl-4">No result</h5>
                                        </td>
                                    </tr>
                                @endif    

                                @foreach ($portfolio as $item) 
                                    @php
                                        $i++
                                    @endphp
                                    @if($i % 2 == 0)
                                        @php
                                            $class_row="even";
                                        @endphp
                                    @else
                                        @php
                                            $class_row="odd";
                                        @endphp
                                    @endif
                                    <tr class="{{ $class_row }}">
                                        <td><img src="{{ asset($item->image) }}" style="width:120px;height:auto;border:1px solid #ccc"
                                            onerror="this.src='{{ asset('upload/no_image.jpg') }}'"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->title }}</td>
                                    </tr>
                                @endforeach
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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 164px;" aria-label="Position: activate to sort column ascending">{{ __('messages.Image') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 164px;" aria-label="Position: activate to sort column ascending">{{ __('messages.Date') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">{{ __('messages.Category') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">{{ __('messages.Title') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Tag</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 125px;" aria-label="Office: activate to sort column ascending">{{ __('messages.Action') }}</th>
                                </thead>

                                <tbody>
                                @php
                                    $i=1;
                                    $class_row="even";
                                @endphp
                                @foreach ($blogs as $item) 
                                    @php
                                        $i++
                                    @endphp
                                    @if($i % 2 == 0)
                                        @php
                                            $class_row="even";
                                        @endphp
                                    @else
                                        @php
                                            $class_row="odd";
                                        @endphp
                                    @endif
                                    <tr class="{{ $class_row }}">
                                        <td><img src="{{ asset($item->image) }}" style="width:120px;height:auto;border:1px solid #ccc"
                                            onerror="this.src='{{ asset('upload/no_image.jpg') }}'"></td>
                                        <td>{{$item->formatted_created_at ?? 'None' }}</td>
                                        <td>{{$item->categories->category  ?? 'None'}}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->tags }}</td>
                                    </tr>
                                @endforeach
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