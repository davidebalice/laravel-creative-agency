@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-5">Footer</h4>
                        
                     
                        
                        <form id="frm_footer" method="post" action="{{ route('update.footer')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $footer->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Number
                                </label>
                                <div class="col-sm-10">
                                    <input name="number" class="form-control" type="text" id="example-text-input" value="{{ $footer->number }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Short description
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="short_description" class="form-control" rows="5" id="elm1">{{ $footer->short_description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                  Address
                                </label>
                                <div class="col-sm-10">
                                    <input name="address" class="form-control" type="text" id="example-text-input" value="{{ $footer->address }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    
                                    City
                                </label>
                                <div class="col-sm-10">
                                    <input name="city" class="form-control" type="text" id="example-text-input" value="{{ $footer->city }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                  Email
                                </label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="text" id="example-text-input" value="{{ $footer->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                  Facebook
                                </label>
                                <div class="col-sm-10">
                                    <input name="facebook" class="form-control" type="text" id="example-text-input" value="{{ $footer->facebook }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                  Twitter
                                </label>
                                <div class="col-sm-10">
                                    <input name="twitter" class="form-control" type="text" id="example-text-input" value="{{ $footer->twitter }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                  Linkedin
                                </label>
                                <div class="col-sm-10">
                                    <input name="linkedin" class="form-control" type="text" id="example-text-input" value="{{ $footer->linkedin }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                  Instagram
                                </label>
                                <div class="col-sm-10">
                                    <input name="instagram" class="form-control" type="text" id="example-text-input" value="{{ $footer->instagram }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                  Copyright
                                </label>
                                <div class="col-sm-10">
                                    <input name="copyright" class="form-control" type="text" id="example-text-input" value="{{ $footer->copyright }}">
                                </div>
                            </div>

                            <hr />

                            <a href="#" onclick="$('#frm_footer').submit()" class="btn btn-primary waves-effect waves-light">            
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

@endsection