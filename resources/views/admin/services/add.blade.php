@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Add service</h4>
                        <form id="frm_services" method="post" action="{{ route('services.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Title
                                </label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Description
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="5" id="elm2"></textarea>
                                    @error('description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Image
                                </label>
                                <div class="col-sm-10">
                                    <input name="photo" id="image"  class="form-control" type="file">
                                    <div class="avatar-xl mt-4 overflow-hidden" style="width:150px">
                                        <img id="showImage" class="h-100 w-auto justify-content-center" src="{{ (!empty($services->photo)) ? url($services->photo) : url('upload/no_image.jpg') }}" alt="image">                                   
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Icon
                                   <br />
                                </label>
                                <div class="col-sm-10">
                                    <input name="icon" id="image_home"  class="form-control" type="file">
                                    <div class="avatar-xl mt-4 overflow-hidden" style="width:150px">
                                        <img id="showImage_home" class="h-100 w-auto justify-content-center" src="{{ (!empty($services->icon)) ? url($services->icon) : url('upload/no_image.jpg') }}" alt="image_home">                                   
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <a href="#" onclick="$('#frm_services').submit()" class="btn btn-primary waves-effect waves-light">            
                                <i class="fas fa-plus-circle"></i>               
                                &nbsp;Insert
                            </a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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