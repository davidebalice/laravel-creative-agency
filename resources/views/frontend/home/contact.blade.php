<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <h2 class="title">{{ __('messages.Contactus') }}</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:info@companyname.com" style="font-size:16px">info@companyname.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="#">
                            <input type="text" placeholder="Enter name*">
                            <input type="email" placeholder="Enter mail*">
                            <input type="number" placeholder="Enter number*">
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">{{ __('messages.Send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>