@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('admin.portfolio') }}">
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
                        <h4 class="card-title mb-5">{{ __('messages.Updatework') }}</h4>
                        <form id="frm_portfolio" method="post" action="{{ route('portfolio.update')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $portfolio->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Name') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Title') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Longdescription') }}
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="5" id="elm2">{{ $portfolio->description }}</textarea>
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Date') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="date" class="form-control" type="text" id="example-text-input" style="max-width:250px;" value="{{ $portfolio->date }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Client') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="client" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->client }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Link
                                </label>
                                <div class="col-sm-10">
                                    <input name="link" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->link }}">
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Facebook
                                </label>
                                <div class="col-sm-10">
                                    <input name="facebook" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->facebook }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Twitter
                                </label>
                                <div class="col-sm-10">
                                    <input name="twitter" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->twitter }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Linkedin
                                </label>
                                <div class="col-sm-10">
                                    <input name="linkedin" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->linkedin }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Youtube
                                </label>
                                <div class="col-sm-10">
                                    <input name="youtube" class="form-control" type="text" id="example-text-input" value="{{ $portfolio->youtube }}">
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
                                        <img id="showImage" class="w-100 justify-content-center" src="{{ (!empty($portfolio->image)) ? url($portfolio->image) : url('upload/no_image.jpg') }}" alt="image">
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

                            <a href="#" onclick="$('#frm_portfolio').submit()" class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-save"></i>
                                &nbsp;{{ __('messages.Save') }}
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