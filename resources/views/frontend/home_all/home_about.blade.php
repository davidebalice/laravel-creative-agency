@php
    $about = App\Models\About::find(1);
    $allMultiImage = App\Models\MultiImage::all();


   
    
@endphp
<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    <div class="banner__img text-center text-xxl-end">
                        <img src="{{ asset('temp.png')}}" alt="">
                    </div>
                    @foreach ($allMultiImage as $item)
                    <li>
                        <img class="light" src="{{ asset($item->multi_image)}}">
                        <img class="dark" src="{{ asset($item->multi_image)}}">
                    </li>
                    @endforeach                
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
                    <p class="desc">{!! $about->short_description !!}</p>
                    <a href="about.html" class="btn mt-">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>