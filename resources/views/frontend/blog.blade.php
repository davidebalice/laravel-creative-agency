@extends('frontend.main_master')
@section('main')

@section('title')
Blog
@endsection


@if(file_exists(public_path($pagebanner->blog)))
    <section class="breadcrumb__wrap backgroundBanner" style="background: url('{{ asset($pagebanner->blog) }}');">
@else
    <section class="breadcrumb__wrap">
@endif
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">
                        @isset($categoryname)
                            {{ $categoryname->category }}
                        @else
                            Blog
                        @endisset 
                    </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="standard__blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if ($blogs->count() === 0)
                    <p>No results</p>
                @else
                    @foreach ($blogs as $item)
                        
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb">
                                @if (file_exists($item->image_home))
                                    <img src="{{ asset($item->image_home)}}" alt="">
                                @else
                                    <img src="{{ asset('upload/no_image_blog.jpg')}}" alt="">                         
                                @endif
                            </div>
                            <div class="standard__blog__content">
                                <ul class="blog__post__meta">
                                    <li><i class="fal fa-calendar-alt"></i>
                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                    </li>
                                    <div class="blog__post__avatar">
                                        <span class="post__by">By: <a href="#">{{ $item->authors->name }} {{ $item->authors->surname }}</a></span>
                                    </div>
                                </ul>    

                                <h2 class="title"><a href="{{ route('blog.details',$item->id) }}">{{ $item->title }}</a></h2>
                                
                                {!! Str::limit($item->description,250) !!}

                                <p style="text-align: right;margin-top:10px">
                                    <a href="{{ route('blog.details',$item->id) }}" class="btn mobileWhite">Details</a>
                                </p>
                            </div>
                        </div>
                        <div class="standard__blog__line"></div>
                    @endforeach
                @endif
                {{ $blogs->links() }}
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