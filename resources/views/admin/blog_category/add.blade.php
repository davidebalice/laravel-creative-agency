@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('admin.blog.category') }}">
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
                        <h4 class="card-title mb-5">{{ __('messages.Addcategory') }}</h4>
                     
                        <form id="frm_category" method="post" action="{{ route('blog.category.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Category') }}
                                </label>
                                <div class="form-group col-sm-10">
                                    <input name="category" class="form-control" type="text" id="example-text-input" value="{{old('category')}}">
                                    @error('category')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Order') }}
                                </label>
                                <div class="form-group col-sm-10">
                                    <input name="order" class="form-control" type="text" id="example-text-input" style="width:100px" value="1">
                                    @error('order')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                               
                            <hr />

                            <a href="#" onclick="$('#frm_category').submit()" class="btn btn-primary waves-effect waves-light">
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

<script>
$(document).ready(function(){
   $('#frm_category').validate({
    rules:{
        category: {
            required : true,
        },
        order: {
            required : true,
        }
    },
    message: {
            category: {
                required: 'Enter blog category'
            },
            order: {
                required: 'Enter order'
            }
    },
    errorElement: 'span',
    errorPlacement: function(error,element){
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element,errorClass,validClass){
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element,errorClass,validClass){
        $(element).removeClass('is-invalid');
    },
   });
});
</script>
@endsection