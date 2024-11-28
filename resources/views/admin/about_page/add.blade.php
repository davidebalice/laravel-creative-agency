@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-5">Gallery</h4>
                        
                        <form id="frm_about" method="post" action="{{ route('store.gallery')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Gallery (multi select)
                                </label>
                                <div class="col-sm-10">
                                    <input name="gallery[]" id="gallery"  class="form-control" type="file" multiple="">
                                </div>
                            </div>

                            <hr />
                            
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