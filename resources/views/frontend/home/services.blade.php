@php
$services = App\Models\Service::orderBy('id', 'asc')->limit(5)->get();
@endphp

<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">Services</span>
                        <h2 class="title">Creates digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">
            
            @foreach ($services as $item)
            <div class="col-xl-3">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="services-details.html">
                            <img src="{{ asset($item->photo)}}" alt="">
                        </a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img src="{{ asset($item->icon)}}" alt="">
                        </div>
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
</section>