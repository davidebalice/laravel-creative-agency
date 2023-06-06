@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="{{ asset('backend/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        background: #f1f1f1 !important;
        color: #b70000 !important;
        font-weight: 700px;
        padding:3px;
    } 
    #datepicker2{
        width:20%;
        min-width:200px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-5">Add blog</h4>
                        
                        <!--
                        <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each
                            textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>
                        -->
                        
                        <form id="frm_blog" method="post" action="{{ route('update.blog')}}" enctype="multipart/form-data">
                            @csrf
                                
                            <input type="hidden" name="id" value="{{ $blogs->id }}">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                <div class="input-group" id="datepicker2">
                                    <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker2" data-provide="datepicker" data-date-autoclose="true">
                        
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        <div class="datepicker " style="top: 39.6406px; left: 0px; z-index: 10; display: block;">
                                            <div class="datepicker-days" style="">
                                        
                                            {{--
                                            <table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">November 2022</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1667088000000">30</td><td class="old day" data-date="1667174400000">31</td><td class="day" data-date="1667260800000">1</td><td class="day" data-date="1667347200000">2</td><td class="day" data-date="1667433600000">3</td><td class="day" data-date="1667520000000">4</td><td class="day" data-date="1667606400000">5</td></tr><tr><td class="day" data-date="1667692800000">6</td><td class="day" data-date="1667779200000">7</td><td class="day" data-date="1667865600000">8</td><td class="day" data-date="1667952000000">9</td><td class="active day" data-date="1668038400000">10</td><td class="day" data-date="1668124800000">11</td><td class="day" data-date="1668211200000">12</td></tr><tr><td class="day" data-date="1668297600000">13</td><td class="day" data-date="1668384000000">14</td><td class="day" data-date="1668470400000">15</td><td class="day" data-date="1668556800000">16</td><td class="day" data-date="1668643200000">17</td><td class="day" data-date="1668729600000">18</td><td class="day" data-date="1668816000000">19</td></tr><tr><td class="day" data-date="1668902400000">20</td><td class="day" data-date="1668988800000">21</td><td class="day" data-date="1669075200000">22</td><td class="day" data-date="1669161600000">23</td><td class="day" data-date="1669248000000">24</td><td class="day" data-date="1669334400000">25</td><td class="day" data-date="1669420800000">26</td></tr><tr><td class="day" data-date="1669507200000">27</td><td class="day" data-date="1669593600000">28</td><td class="day" data-date="1669680000000">29</td><td class="day" data-date="1669766400000">30</td><td class="new day" data-date="1669852800000">1</td><td class="new day" data-date="1669939200000">2</td><td class="new day" data-date="1670025600000">3</td></tr><tr><td class="new day" data-date="1670112000000">4</td><td class="new day" data-date="1670198400000">5</td><td class="new day" data-date="1670284800000">6</td><td class="new day" data-date="1670371200000">7</td><td class="new day" data-date="1670457600000">8</td><td class="new day" data-date="1670544000000">9</td><td class="new day" data-date="1670630400000">10</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2022</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month focused active">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2020-2029</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2019</span><span class="year">2020</span><span class="year">2021</span><span class="year active focused">2022</span><span class="year">2023</span><span class="year">2024</span><span class="year">2025</span><span class="year">2026</span><span class="year">2027</span><span class="year">2028</span><span class="year">2029</span><span class="year new">2030</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade">2010</span><span class="decade active focused">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century active focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table>
                                            --}}
                                        
                                            </div>
                                        </div>
                                        </div><!-- input-group -->
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                        <option selected="" value=""> - Category - </option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}" {{ $item->id == $blogs->category_id ? 'selected' : ''}} >{{$item->category}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                              
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Title
                                </label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input" value="{{ $blogs->title }}">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Tags
                                </label>
                                <div class="col-sm-10">
                                    <input name="tags" class="form-control bootstrap-tagsinput tag" value="{{ $blogs->tags }}" type="text" id="example-text-input" data-role="tagsinput" >
                                    @error('tags')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Description
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="5" id="elm2">{{ $blogs->description }}</textarea>
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
                                    <input name="image" id="image"  class="form-control" type="file">
                                    <div class="avatar-xl mt-4 overflow-hidden" style="width:150px">
                                        <img id="showImage" class="h-100 w-auto justify-content-center" src="{{ (!empty($blogs->image)) ? url($blogs->image) : url('upload/no_image.jpg') }}" alt="image">                                   
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                   Image 
                                   <br />
                                   (homepage 1020x512px)
                                </label>
                                <div class="col-sm-10">
                                    <input name="image_home" id="image_home"  class="form-control" type="file">
                                    <div class="avatar-xl mt-4 overflow-hidden" style="width:150px">
                                        <img id="showImage_home" class="h-100 w-auto justify-content-center" src="{{ (!empty($blogs->image_home)) ? url($blogs->image_home) : url('upload/no_image.jpg') }}" alt="image_home">                                   
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <a href="#" onclick="$('#frm_blog').submit()" class="btn btn-primary waves-effect waves-light">            
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
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
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