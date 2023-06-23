@php
    $about = App\Models\About::find(1);
    $allMultiImage = App\Models\MultiImage::all();
    $homeslide = App\Models\HomeSlide::find(1);
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @php
                        /*
                         <div class="banner__img text-center text-xxl-end">
                            <img src="{{ asset('temp.png')}}" alt="">
                        </div>
                        */
                    @endphp
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                  
                    <div class="section__title">
                        <h2 class="title">
                            {{ $about->title }}
                        </h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p> {{ $about->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc mb-2">{!! $about->short_description !!}</p>
                   
                    <div class="banner__video mt-3">
                        <a href="{{ $homeslide->video_url }}" class="popup-video"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gallerySection">
    <div class="row align-items-center">
        @foreach ($allMultiImage as $item)
            <div class="col-lg-3">
                <img class="light" src="{{ asset($item->multi_image)}}">
            </div>
        @endforeach  
    </div>
</section>