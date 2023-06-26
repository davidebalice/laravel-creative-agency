@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<style>
.even{background: #f9f9f9}
</style>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Services</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('services.add') }}">
                    <button class="btn btn-success addButton">
                        <i class="ri-add-circle-fill" style="font-size:22px"></i> 
                        <div>
                            &nbsp;&nbsp;Add service
                        </div>
                    </button>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                           
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 74px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 74px;" aria-label="Position: activate to sort column ascending">Icon</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 164px;" aria-label="Position: activate to sort column ascending">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Service</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 125px;" aria-label="Office: activate to sort column ascending">Action</th>
                                        </thead>

                                        <tbody>
                                        @php
                                            $i=1;
                                            $class_row="even";
                                        @endphp
                                        @foreach ($services as $item) 
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
                                                <td class="sorting_1 dtr-control">{{ $item->id }}</td>
                                                <td><img src="{{ asset($item->icon) }}" style="width:80px;height:auto;border:1px solid #ccc"></td>
                                                <td><img src="{{ asset($item->photo) }}" style="width:150px;height:auto;border:1px solid #ccc"></td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    <a href="{{ route('services.edit',$item->id) }}" class="btn btn-info sm" title="Edit">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="{{ route('services.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="datatable_info" role="status" ariaf-live="polite">
                                        
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection