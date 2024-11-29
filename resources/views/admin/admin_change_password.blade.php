@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('messages.Changepassword') }}</h4>
                        
                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form id="frm_profile" class="mt-4" method="post" action="/update/password">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    {{ __('messages.Oldpassword') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Newpassword') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="newpassword" class="form-control" type="password" id="newpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   {{ __('messages.Confirmpassword') }}
                                </label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password" id="confirm_password">
                                </div>
                            </div>

                            <hr />

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


@endsection