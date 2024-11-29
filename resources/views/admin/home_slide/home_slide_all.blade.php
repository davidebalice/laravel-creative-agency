@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Home</h4>
                       
                        <form id="frm_profile" method="post" action="{{ route('update.slider')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $homeslide->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Title') }} (en)
                                </label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input" value="{{ $homeslide->title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Shorttitle') }} (en)
                                </label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" id="example-text-input" value="{{ $homeslide->short_title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Text') }} (en)
                                </label>
                                <div class="col-sm-10">
                                    <input name="text" class="form-control" type="text" id="example-text-input" value="{{ $homeslide->text }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Title') }} (it)
                                </label>
                                <div class="col-sm-10">
                                    <input name="title_it" class="form-control" type="text" id="example-text-input" value="{{ $homeslide->title_it }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Shorttitle') }} (it)
                                </label>
                                <div class="col-sm-10">
                                    <input name="short_title_it" class="form-control" type="text" id="example-text-input" value="{{ $homeslide->short_title_it }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Text') }} (it)
                                </label>
                                <div class="col-sm-10">
                                    <input name="text_it" class="form-control" type="text" id="example-text-input" value="{{ $homeslide->text_it }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Video Url
                                </label>
                                <div class="col-sm-10">
                                    <input name="video_url" class="form-control" type="text" id="example-text-input" value="{{ $homeslide->video_url }}">
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Image') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="home_slide" id="profile_image"  class="form-control" type="file">
                                    <div class="rounded avatar-xl mt-4 overflow-hidden" style="width:12rem;height:12rem">
                                        <img id="showImage" class="h-100 w-auto justify-content-center" src="{{ (!empty($homeslide->home_slide)) ? url($homeslide->home_slide) : url('upload/no_image.jpg') }}" alt="profile">
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <a href="/admin/profile"  class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-arrow-left"></i>
                                &nbsp;{{ __('messages.Back') }}
                            </a>

                            <a href="#" onclick="$('#frm_profile').submit()" class="btn btn-primary waves-effect waves-light">
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
        $('#profile_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection