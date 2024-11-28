@extends('frontend.main_master')
@section('main')

<section class="breadcrumb__wrap">
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="/blog" aria-current="page">Blog</a></li>
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
                
                @if ($blogpost->count() === 0)
                    <p>No results</p>
                @else
                    @foreach ($blogpost as $item)
                        
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb">
                                @if (file_exists($item->image_home))
                                <img src="{{ asset($item->image_home)}}" alt="">
                                @else
                                <img src="{{ asset('upload/no_image_blog.jpg')}}" alt="">
                                @endif
                                <a href="{{ route('blog.details',$item->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                            </div>
                            <div class="standard__blog__content">
                                <div class="blog__post__avatar">
                                    <div class="thumb"><img src="assets/img/blog/blog_avatar.png" alt=""></div>
                                    <span class="post__by">By : <a href="#">Halina Spond</a></span>
                                </div>
                                <h2 class="title"><a href="{{ route('blog.details',$item->id) }}">{{ $item->title }}</a></h2>
                                
                                {!! Str::limit($item->description,250) !!}

                                <ul class="blog__post__meta">
                                    <li><i class="fal fa-calendar-alt"></i>
                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                    </li>
                                    <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                    <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                                </ul>
                            </div>
                        </div>

                    @endforeach
                @endif 

                {{ $blogpost->links() }}

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