@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-5">About page</h4>
                        
                        <!--
                        <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each
                            textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>
                        -->
                        
                        <form id="frm_about" method="post" action="{{ route('update.about')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $aboutpage->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Title
                                </label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input" value="{{ $aboutpage->title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Short title
                                </label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" id="example-text-input" value="{{ $aboutpage->short_title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Short description
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="short_description" class="form-control" rows="5" id="elm1">{{ $aboutpage->short_description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Long description
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="long_description" class="form-control" rows="5" id="elm2">{{ $aboutpage->long_description }}</textarea>
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   About image
                                </label>
                                <div class="col-sm-10">
                                    <input name="about_image" id="about_image"  class="form-control" type="file">
                                    <div class="rounded avatar-xl mt-4 overflow-hidden" style="width:12rem;height:12rem">
                                        <img id="showImage" class="h-100 w-auto justify-content-center" src="{{ (!empty($aboutpage->about_image)) ? url($aboutpage->about_image) : url('upload/no_image.jpg') }}" alt="about_image">                                   
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <a href="/admin/profile"  class="btn btn-primary waves-effect waves-light">            
                                <i class="fas fa-arrow-left"></i>               
                                &nbsp;Back
                            </a>

                            <a href="#" onclick="$('#frm_about').submit()" class="btn btn-primary waves-effect waves-light">            
                                <i class="fas fa-save"></i>               
                                &nbsp;Save
                            </a>
                        </form>

                        
                        <!--

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    </select>
                            </div>
                        </div>
                       
                        -->



                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#about_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection