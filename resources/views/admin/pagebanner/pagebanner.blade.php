@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="{{ asset('backend/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        background: #f1f1f1 !important;
        color: #b70000 !important;
        font-weight: 700px;
        padding:3px;
    }
    #datepicker2{
        width:20%;
        min-width:200px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-0">{{ __('messages.Pagebanner') }}</h4>

                        <hr />

                        @foreach(['about', 'portfolio', 'blog', 'contact', 'service'] as $term)
                            <h5 class="card-title mb-3  mt-5">{{ __('messages.Page') }}: <b>{{ ucfirst($term) }}</b></h5>
                            <form id="frm_{{ $term }}" method="post" action="{{ route('update.page.banner') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Banner (2000x1000px) - {{ ucfirst($term) }}
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="{{ $term }}" id="{{ $term }}" class="form-control image-input" type="file">
                                        <div class="avatar-xl mt-4 overflow-hidden" style="width: 150px">
                                            <img id="showImage_{{ $term }}" class="h-100 w-auto justify-content-center" src="{{ (!empty($pagebanner->$term)) ? url($pagebanner->$term) : url('upload/no_image.jpg') }}" alt="image_{{ $term }}">
                                        </div>
                                    </div>
                                </div>
                        
                                <a href="#" onclick="$('#frm_{{ $term }}').submit()" class="btn btn-primary waves-effect waves-light">
                                    <i class="fas fa-save"></i>
                                    &nbsp;Upload - {{ ucfirst($term) }}
                                </a>
                            </form>
                        
                            <hr />
                        @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.image-input').change(function(e) {
        var inputId = e.target.id;
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage_' + inputId).attr('src', e.target.result);
        };
        reader.readAsDataURL(e.target.files[0]);
    });
    });
</script>
@endsection