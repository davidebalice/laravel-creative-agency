@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
.even{background: #f9f9f9}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('messages.BlogCategory') }}</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('blog.category.add') }}">
                    <button class="btn btn-success addButton">
                        <i class="ri-add-circle-fill" style="font-size:22px"></i> 
                        <div>
                            &nbsp;&nbsp;{{ __('messages.Addcategory') }}
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
                                            <th style="width: 54px;" >{{ __('messages.Publish') }}</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 464px;" aria-label="Position: activate to sort column ascending">{{ __('messages.Category') }}</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;" aria-label="Position: activate to sort column ascending">{{ __('messages.Order') }}</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 125px;" aria-label="Office: activate to sort column ascending">{{ __('messages.Action') }}</th>
                                        </thead>

                                        <tbody>
                                       
                                       @php
                                            $i=1;
                                            $class_row="even";
                                            $totRecords = count($blogcategory)
                                        @endphp

                                        @if ($totRecords==0)
                                        <tr>
                                            <td colspan="5">
                                                <h5 class="py-5 pl-4">{{ __('messages.Noresult') }}</h5>
                                            </td>
                                        </tr>
                                        @endif

                                        @foreach ($blogcategory as $item)
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
                                                <td class="dtr-control">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input activeSwtich" type="checkbox" role="switch" data-item-id="active_{{ $item->id }}" 
                                                        //prettier-ignore
                                                        @if ($item->active)
                                                            checked
                                                        @endif
                                                        id="active_{{ $item->id }}">
                                                    </div>
                                                </td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->order }}</td>
                                                <td>
                                                    <a href="{{ route('blog.category.edit',$item->id) }}" class="btn btn-info sm button_edit" title="Edit">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="{{ route('blog.category.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>

                                                    <hr/>

                                                    @if ($item->position<=1)
                                                    <a href="#" class="btn btn-success btn-sm button_disable">
                                                      <span class="mdi mdi-arrow-up icon_mdi_arrow"></span>
                                                    </a>
                                                    @else
                                                    <a href="{{url('admin/blogcategory/sort/up/'.$item->id)}}" class="btn btn-success btn-sm button_edit">
                                                      <span class="mdi mdi-arrow-up icon_mdi_arrow"></span>
                                                    </a>
                                                    @endif
                          
                                                    @if ($item->position==$totRecords)
                                                    <a href="#" class="btn btn-success btn-sm button_disable">
                                                      <span class="mdi mdi-arrow-down icon_mdi_arrow"></span>
                                                    </a>
                                                    @else
                                                    <a href="{{url('admin/blogcategory/sort/down/'.$item->id)}}" class="btn btn-success btn-sm button_edit">
                                                      <span class="mdi mdi-arrow-down icon_mdi_arrow"></span>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $blogcategory->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        initializeSwitches('blogcategory');
      });
    </script>
@endsection