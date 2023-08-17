@extends('frontend.main_master')
@section('main')

@section('title')
Blog
@endsection

<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{$blogs->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="standard__blog blog__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="standard__blog__post">
                    <div class="standard__blog__thumb">
                        @if (file_exists($blogs->image_home))
                            <img src="{{ asset($blogs->image_home)}}" alt="">
                        @else
                            <img src="{{ asset('upload/no_image_blog.jpg')}}" alt="">                         
                        @endif
                    </div>
                    <div class="blog__details__content services__details__content">
                        <ul class="blog__post__meta">
                            <li><i class="fal fa-calendar-alt"></i>
                                {{ Carbon\Carbon::parse($blogs->created_at)->diffForHumans() }}
                            </li>
                            <div class="blog__post__avatar">
                                <span class="post__by">By: <a href="#">{{ $blogs->authors->name }} {{ $blogs->authors->surname }}</a></span>
                            </div>
                        </ul> 
                        <h2 class="title">{{$blogs->title}}</h2>
                        {!! $blogs->description !!}
                        
                    </div>
                    <div class="blog__details__bottom">
                        <ul class="blog__details__tag">
                            <li class="title">Tag:</li>
                            <li class="tags-list">
                               
                                @php
                                    $tags = $blogs->tags;
                                    $tags = explode(',',$tags);
                                    foreach ($tags as $value) {
                                        $value=trim($value);
                                        echo '<a href="/blog/?tag='.$value.'">'.$value.'</a>';
                                    }
                                @endphp
                                 
                            </li>
                        </ul>
                        <ul class="blog__details__social">
                            <li class="title">Share :</li>
                            <li class="social-icons">
                                <a href="#"><i class="fab fa-facebook" style="font-size:22px"></i></a>
                                <a href="#"><i class="fab fa-twitter-square" style="font-size:22px"></i></a>
                                <a href="#"><i class="fab fa-linkedin" style="font-size:22px"></i></a>
                                <a href="#"><i class="fab fa-pinterest" style="font-size:22px"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <aside class="blog__sidebar">
                    @include('frontend.partials.form_blog_side')                  
                    @include('frontend.partials.recent_blog_side')   
                    @include('frontend.partials.category_blog_side')    
                    @include('frontend.partials.tags_blog_side')   
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection