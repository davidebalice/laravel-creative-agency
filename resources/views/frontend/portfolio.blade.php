@extends('frontend.main_master')
@section('main')

@section('title')
Portfolio
@endsection

@if(file_exists(public_path($pagebanner->portfolio)))
    <section class="breadcrumb__wrap backgroundBanner" style="background: url('{{ asset($pagebanner->portfolio) }}');">
@else
    <section class="breadcrumb__wrap">
@endif
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Portfolio</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfolio__inner">
    <div class="container">
        <div class="portfolio__inner__active">
            @foreach ($portfolio as $item)
            <div class="portfolio__inner__item grid-item cat-two cat-three mb-5">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-6 col-md-10 mt-4">
                        <div class="portfolio__inner__thumb">
                            <a href="{{ route('portfolio.details',$item->id) }}">
                                @if (file_exists($item->image_home))
                                    <img src="{{ asset($item->image_home)}}" alt="">
                                @else
                                    <img src="{{ asset('upload/no_image_blog.jpg')}}" alt="">                        
                                @endif
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-10">
                        <div class="portfolio__inner__content">
                            <h2 class="title">
                                <a href="{{ route('portfolio.details',$item->id) }}">
                                    {{$item->title}}
                                </a>
                            </h2>
                            {!! Str::limit($item->description,150) !!}
                            <p>
                                <a href="{{ route('portfolio.details',$item->id) }}" class="btn mobileWhite">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
