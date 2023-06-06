@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <center class="py-4">

                    <div class="rounded-circle avatar-xl mt-4 overflow-hidden" style="width:12rem;height:12rem">
                         <img id="showImage" class="h-100 w-auto justify-content-center" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin/'.$adminData->profile_image) : url('upload/no_image.jpg') }}" alt="profile">                                   
                     </div>           



                    </center>
                    <div class="card-body">
                        <h3 class="card-title">
                            {{$adminData->name}} {{$adminData->surname}}
                        </h3>
                        <p class="card-text">
                            Email: {{$adminData->email}}
                        </p>
                        <hr />
                        <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light">            
                            <i class="fas fa-edit"></i>               
                            Edit profile
                        </a>


                        <!--
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        -->


                    </div>
                </div>
            </div>

           
          

        </div>

    </div>
</div>
    
@endsection