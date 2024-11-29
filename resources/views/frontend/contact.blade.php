@extends('frontend.main_master')
@section('main')

@section('title')
Contact
@endsection


@if(file_exists(public_path($pagebanner->contact)))
    <section class="breadcrumb__wrap backgroundBanner" style="background: url('{{ asset($pagebanner->contact) }}');">
@else
    <section class="breadcrumb__wrap">
@endif

    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{ __('messages.Contact') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Contact') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="contact-map">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44773.57326360137!2d9.136533024770692!3d45.462786644763824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c1493f1275e7%3A0x3cffcd13c6740e8d!2sMilano%20MI!5e0!3m2!1sit!2sit!4v1732893995540!5m2!1sit!2sit" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="contact-area">
    <div class="container">
        <form action="{{ route('store.message') }}" class="contact__form" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="{{ __('messages.Enteryourname') }}*" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" placeholder="{{ __('messages.Enteryourmail') }}*"  value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" name="tel" placeholder="{{ __('messages.Enteryourtel') }}"  value="{{old('tel')}}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="subject" placeholder="{{ __('messages.Subject') }}*"  value="{{old('subject')}}">
                </div>
            </div>
            <textarea name="message" id="message" placeholder="{{ __('messages.Enteryourmassage') }}*">{{old('message')}}</textarea>
            @error('message')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
            <button type="submit" class="btn">{{ __('messages.Send') }}</button>
        </form>
    </div>
</div>


<section class="contact-info-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="assets/img/icons/contact_icon01.png" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">{{ $footer->name }}</h4>
                        <span>{{ $footer->address }} <br> {{ $footer->city }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="assets/img/icons/contact_icon02.png" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">{{ __('messages.Contact') }}</h4>
                        <span>{{ $footer->number }}</span>
                        <span><a href="mailto:{{ $footer->email }}" class="mail">{{ $footer->email }}</a></span>
                    </div>
                    <div class="footer__widget__social">
                        <ul class="footer__social__list" style="justify-content: center">
                            <li><a href="{{ $footer->linkedin}}"><i class="fab fa-linkedin" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $footer->facebook}}"><i class="fab fa-facebook" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $footer->instagram}}"><i class="fab fa-instagram" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $footer->twitter}}"><i class="fab fa-twitter" style="font-size:24px"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection