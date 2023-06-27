@php
    $homeslide = App\Models\HomeSlide::find(1);
@endphp
<section class="banner">
    <div class="container custom-container" >
        <div class="row align-items-center justify-content-center justify-content-lg-between" >
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end">
                    @php
                        /*
                        <img src="{{ $homeslide->home_slide }}" alt="">
                        */
                    @endphp
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp mobileWhite" data-wow-delay=".2s">
                        {{ $homeslide->title }}
                    </h2>
                    <h4 class="wow title fadeInUp mobileWhite slideText2" data-wow-delay=".4s">
                        {{ $homeslide->short_title }}
                    </h4>
                    <img src="{{ asset('/frontend/assets/img/images/laravel.png')}}" class="wow fadeInUp laravelHome" data-wow-delay=".6s">
                </div>
            </div>
        </div>
    </div>
</section>