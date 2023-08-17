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
                    <h2 class="title">Contact us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd"
        allowfullscreen loading="lazy"></iframe>
</div>

<div class="contact-area">
    <div class="container">
        <form action="{{ route('store.message') }}" class="contact__form" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="Enter your name*" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" placeholder="Enter your mail*"  value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" name="tel" placeholder="Enter your tel"  value="{{old('tel')}}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="subject" placeholder="Your subject*"  value="{{old('subject')}}">
                </div>
            </div>
            <textarea name="message" id="message" placeholder="Enter your massage*">{{old('message')}}</textarea>
            @error('message')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
            <button type="submit" class="btn">send massage</button>
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
                        <h4 class="title">address line</h4>
                        <span>Bowery St, New York, <br> NY 10013,USA</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="assets/img/icons/contact_icon02.png" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">Phone Number</h4>
                        <span>+1255 - 568 - 6523</span>
                        <span>+1255 - 568 - 6523</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="assets/img/icons/contact_icon03.png" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">Mail Address</h4>
                        <span>email@example.com</span>
                        <span>info@yourdomain.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection