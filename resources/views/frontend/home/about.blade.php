@php
    $about = App\Models\About::find(1);
    $homeslide = App\Models\HomeSlide::find(1);
@endphp

<section id="aboutSection" class="about">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                   
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <h2 class="title mobileWhite wow fadeInUp" data-wow-delay=".2s">
                            {{ $about->title }}
                        </h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__content mobileWhite wow fadeInUp">
                            <p class="mobileWhite" data-wow-delay=".3s"> {{ $about->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc mb-2 mobileWhite wow fadeInUp" data-wow-delay=".4s">{!! $about->short_description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>