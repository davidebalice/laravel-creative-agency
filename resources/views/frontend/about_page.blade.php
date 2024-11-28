@extends('frontend.main_master')
@section('main')

@section('title')
{{ __('messages.About') }}
@endsection

@php
    $gallery = App\Models\MultiImage::limit(4)->get();
    $services = App\Models\Service::limit(8)->get();
@endphp

@if(file_exists(public_path($pagebanner->about)))
    <section class="breadcrumb__wrap backgroundBanner" style="background: url('{{ asset($pagebanner->about) }}');">
@else
    <section class="breadcrumb__wrap">
@endif

    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{ __('messages.About') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('messages.About') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about about__style__two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__image">
                    <img src="{{ $aboutpage->about_image }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <h2 class="title">{{ $aboutpage->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__content">
                            <p><span>{{ $aboutpage->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{!! $aboutpage->short_description !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="about__info__wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                                role="tab" aria-controls="about" aria-selected="true">About</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                                role="tab" aria-controls="skills" aria-selected="false">Skills</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards" type="button"
                                role="tab" aria-controls="awards" aria-selected="false">awards</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <p class="desc">
                                {!! $aboutpage->long_description !!}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            {!! $aboutpage->skills !!}
                        </div>
                        <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
                            {!! $aboutpage->awards !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gallerySection">
    <div class="row align-items-center">
        @foreach ($gallery as $item)
            <div class="col-lg-3">
                <img class="w-100" src="{{ asset($item->gallery)}}">
            </div>
        @endforeach  
    </div>
</section>

<section class="services__style__two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="section__title text-center">
                    <span class="sub-title">{{ __('messages.Services') }}</span>
                    <h2 class="title">Our service</h2>
                </div>
            </div>
        </div>
        <div class="services__style__two__wrap">
            <div class="row gx-0">
                @foreach ($services as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services__item">
                            <div class="services__thumb">
                                <img src="{{ asset($item->photo)}}" alt="">
                            </div>
                            <div class="services__content2 mt-2">
                                <h3 class="title">
                                    {{ $item->title }}
                                </h3>
                                {!! $item->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
    </div>
</section>

@endsection