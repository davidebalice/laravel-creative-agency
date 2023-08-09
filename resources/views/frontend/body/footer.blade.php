@php
    $footer = App\Models\Footer::find(1);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget"> 
                    <div class="fw-title bold">
                       Company Name
                    </div>                
                    <div class="footer__widget__address">
                        <p>{{ $footer->address }}</p>
                        <p>{{ $footer->city }}</p>
                        <a href="mailto:noreply@envato.com" class="mail">{{ $footer->email }}</a>
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
                        <h5 class="sub-title">Project on github</h5>
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