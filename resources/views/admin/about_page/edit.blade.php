@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-5">Update multi image</h4>
                        
                        <form id="frm_about" method="post" action="{{ route('update.gallery')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $multiImage->id }}">
                           
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Image
                                </label>
                                <div class="col-sm-10">
                                    <input name="gallery" id="gallery"  class="form-control" type="file">
                                    <div class="rounded avatar-xl mt-4 overflow-hidden" style="width:12rem;height:12rem">
                                        <img id="showImage" class="h-100 w-auto justify-content-center" src="{{asset($multiImage->gallery) }}" alt="gallery">                                   
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <a href="/gallery"  class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-arrow-left"></i>
                                &nbsp;Back
                            </a>

                            <a href="#" onclick="$('#frm_about').submit()" class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-save"></i>
                                &nbsp;Save
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
        $('#multi_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection