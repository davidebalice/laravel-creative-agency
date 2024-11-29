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
                        @if (app()->getLocale() == 'it')
                            {{ $homeslide->title_it }}
                        @else
                            {{ $homeslide->title }}
                        @endif
                    </h2>
                    <h4 class="wow title fadeInUp mobileWhite slideText2" data-wow-delay=".4s">
                        @if (app()->getLocale() == 'it')
                            {{ $homeslide->short_title_it }}
                        @else
                            {{ $homeslide->short_title }}
                        @endif
                    </h4>
                    <h6 class="wow title fadeInUp mobileWhite slideText3" data-wow-delay=".6s">
                        @if (app()->getLocale() == 'it')
                            {{ $homeslide->text_it }}
                        @else
                            {{ $homeslide->text }}
                        @endif
                    </h6>
                    <div class="slideHomeContainer">
                        <img src="{{ asset('/frontend/assets/img/images/laravel.png')}}" class="wow fadeInUp laravelHome" data-wow-delay=".8s">
                        <a href="/login" class="wow fadeInUp btn mobileWhite" data-wow-delay=".9s">{{ __('messages.GoToCms') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>