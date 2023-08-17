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
                            <li class="breadcrumb-item"><a href="/portfolio">Portfolio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services__details__thumb">
                    <img src="{{ asset($portfolio->image) }}" alt="">
                </div>
                <div class="services__details__content">
                    <h2 class="title">{{ $portfolio->title}}</h2>
                    <p>
                        {!! $portfolio->description !!}
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="services__sidebar">
                   
                    <div class="widget">
                        <h5 class="title">Project Information</h5>
                        <ul class="sidebar__contact__info">
                            <li><span>Date:</span> {{ $portfolio->date}}</li>
                            <li><span>Client:</span> {{ $portfolio->client}}</li>
                            <li><span>Link :</span> <a href="https://{{ $portfolio->link}}" target="_blank">{{ $portfolio->link}}</a></li>
                        </ul>
                        <ul class="sidebar__contact__social">
                            <li><a href="{{ $portfolio->linkedin}}"><i class="fab fa-linkedin" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $portfolio->facebook}}"><i class="fab fa-facebook" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $portfolio->youtube}}"><i class="fab fa-youtube" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $portfolio->twitter}}"><i class="fab fa-twitter" style="font-size:24px"></i></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection
