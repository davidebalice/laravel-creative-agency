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
            <div class="col-12 mb-4">
                <a href="{{ route('admin.blog') }}">
                    <button class="btn btn-success addButton">
                        <i class="mdi mdi-keyboard-backspace" style="font-size:22px"></i> 
                        <div>
                            &nbsp;&nbsp;{{ __('messages.Back') }}
                        </div>
                    </button>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">{{ __('messages.Addarticle') }}</h4>
                                             
                        <form id="frm_blog" method="post" action="{{ route('blog.store')}}" enctype="multipart/form-data">
                            @csrf
                                
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    {{ __('messages.Date') }}
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group" id="datepicker2">
                                        <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker2" data-provide="datepicker" data-date-autoclose="true">
                            
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        <div class="datepicker " style="top: 39.6406px; left: 0px; z-index: 10; display: block;">
                                            <div class="datepicker-days" style="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    {{ __('messages.Category') }}
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="category_id">
                                        <option value=""> - {{ __('messages.Category') }} - </option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}" {{ $item->id == old('category_id') ? 'selected' : ''}} >{{$item->category}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                              
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Title') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input" value="{{ old('title')}}">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    {{ __('messages.Author') }}
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="user_id">
                                        <option value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>
                                    </select>
                                </div>
                            </div>
                              
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Tag
                                </label>
                                <div class="col-sm-10">
                                    <input name="tags" class="form-control bootstrap-tagsinput tag" value="{{old('tags') ? old('tags') : 'home,tech'}}" type="text" id="example-text-input" data-role="tagsinput" >
                                    @error('tags')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Description') }}
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="5" id="elm2">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Image') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="image" id="image"  class="form-control" type="file">
                                    <div class="avatar-xl mt-4 overflow-hidden" style="width:150px">
                                        <img id="showImage" class="h-100 w-auto justify-content-center" src="{{ (!empty($portfolio->image)) ? url($portfolio->image) : url('upload/no_image.jpg') }}" alt="image">
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Image') }}
                                   <br />
                                   (homepage 1020x512px)
                                </label>
                                <div class="col-sm-10">
                                    <input name="image_home" id="image_home"  class="form-control" type="file">
                                    <div class="avatar-xl mt-4 overflow-hidden" style="width:150px">
                                        <img id="showImage_home" class="h-100 w-auto justify-content-center" src="{{ (!empty($portfolio->image_home)) ? url($portfolio->image_home) : url('upload/no_image.jpg') }}" alt="image_home">
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <a href="#" onclick="$('#frm_blog').submit()" class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-plus-circle"></i>
                                &nbsp;{{ __('messages.Insert') }}
                            </a>
                        </form>



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
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
        $('#image_home').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage_home').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection