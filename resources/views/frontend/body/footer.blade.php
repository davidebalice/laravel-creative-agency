@php
    $footer = App\Models\Footer::find(1);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title bold">
                        {{ $footer->name }}
                    </div>
                    <div class="footer__widget__address">
                        <p>{{ $footer->address }}</p>
                        <p>{{ $footer->city }}</p>
                        <br />
                        <p>{{ $footer->number }}</p>
                        <a href="mailto:{{ $footer->email }}" class="mail">{{ $footer->email }}</a>
                    </div>
                    <div class="footer__widget__social">
                        <ul class="footer__social__list">
                            <li><a href="{{ $footer->linkedin}}"><i class="fab fa-linkedin" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $footer->facebook}}"><i class="fab fa-facebook" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $footer->instagram}}"><i class="fab fa-instagram" style="font-size:24px"></i></a></li>
                            <li><a href="{{ $footer->twitter}}"><i class="fab fa-twitter" style="font-size:24px"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget"> 
                   
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">{{ __('messages.Projectongithub') }}</h5>
                    </div>
                    <div class="footer__widget__social">
                        <ul class="footer__social__list">
                            <li><a href="https://github.com/davidebalice/laravel-creative-agency" target="_blank">Github.com/davidebalice/laravel-creative-agency</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>{{ $footer->copyright }} <script>document.write(new Date().getFullYear());</script> - <a href="https://www.davidebalice.dev" target="_blank" class="siteLink">www.davidebalice.dev</a></p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>