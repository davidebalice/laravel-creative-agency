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
                    <h4 class="mb-sm-0">Blog</h4>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-auto">
                <a href="{{ route('blog.add') }}">
                    <button class="btn btn-success addButton">
                        <i class="ri-add-circle-fill" style="font-size:22px"></i> 
                        <div>
                            &nbsp;&nbsp;Add article
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-auto">
                <form>
                    <div class="input-group">
                        <div class="searchContainer">
                            <div class="form-outline">
                                <input type="search" id="form1" class="form-control" name="q" />
                            </div>
                            <button type="submit" class="btn btn-primary ml-3">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
                                            <th style="width: 54px;" >Publish</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 164px;" aria-label="Position: activate to sort column ascending">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Title</th>                                            
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Tags</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 125px;" aria-label="Office: activate to sort column ascending">Action</th>
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
                                                <td><img src="{{ asset($item->image) }}" style="width:120px;height:auto;border:1px solid #ccc"></td>
                                                <td>{{$item-> categories->category  ?? 'None'}}

                                                @php
                                                    /*
                                                    $leagues = DB::table('blog_categories')->select('*')->where('id', $item->category_id)->first();                                              
                                                    echo $leagues->category  ?? 'None';
                                                    */
                                                @endphp 

                                                <br />
                                                  
                                              
                                                
                                                
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->tags }}</td>
                                                <td>
                                                    <a href="{{ route('blog.edit',$item->id) }}" class="btn btn-info sm" title="Edit">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="{{ route('blog.delete',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $blogs->links() }}
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
        initializeSwitches('blog');
      });
    </script>
@endsection