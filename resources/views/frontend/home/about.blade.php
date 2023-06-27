@php
    $about = App\Models\About::find(1);
    $homeslide = App\Models\HomeSlide::find(1);
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                   
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <h2 class="title mobileWhite">
                            {{ $about->title }}
                        </h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                        </div>
                        <div class="about__exp__content mobileWhite">
                            <p class="mobileWhite"> {{ $about->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc mb-2 mobileWhite">{!! $about->short_description !!}</p>
                   
                    <div class="banner__video mt-3">
                        <a href="{{ $homeslide->video_url }}" class="popup-video"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>