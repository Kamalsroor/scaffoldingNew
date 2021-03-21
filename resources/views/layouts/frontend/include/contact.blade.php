<section class="contact">
    <div class="container">
        <img class="contact__shape1" src="{{ asset('frontend') }}/imgs/shape1.png">
        <img class="contact__shape2" src="{{ asset('frontend') }}/imgs/shape2.png">
        <div class="row no-gutters">
            <div class="col-lg-8">
                <div class="contact__content">
                    <h5>{{Settings::locale(app()->getLocale())->get('countact_us_title')}}</h5>
                    <p>{{Settings::locale(app()->getLocale())->get('countact_us_des')}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="h-100 contact__btn d-flex align-items-center justify-content-center">
                    <a href="#" class="d-inline primary-btn btn-hover">contact us</a>
                </div>
            </div>
        </div>
    </div>
</section>
