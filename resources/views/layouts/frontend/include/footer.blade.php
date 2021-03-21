<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 pt-5">
                <div class="footer__left">
                    <h1>about company</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias aliquam nesciunt magnam
                        assumenda numquam consequatur doloremque. Error eaque consectetur repellat ipsa suscipit
                        ratione
                        omnis maiores consequatur, fuga est vitae ipsum!</p>
                </div>
            </div>
            <div class="col-12 col-lg-8 pt-2 pt-lg-5">
                <div class="footer__right">
                    <div class="row">
                        <div class="col-12 col-lg-4 pb-4">
                            <h1>INFORMAION</h1>
                            <div class="row footer__right__menu">
                                <div class="col-12">
                                    <ul>
                                        @component('frontend::components.hiddenSidebarItem')
                                            @slot('url',  route('front.home'))
                                            @slot('name', trans('frontend.navbar.home'))
                                        @endcomponent
                                        @component('frontend::components.hiddenSidebarItem')
                                            {{-- @slot('url',  route('front.about')) --}}
                                            @slot('name', trans('frontend.navbar.about'))
                                        @endcomponent
                                        @component('frontend::components.hiddenSidebarItem')
                                            {{-- @slot('url',  route('front.services')) --}}
                                            @slot('name', trans('frontend.navbar.services'))
                                        @endcomponent
                                        @component('frontend::components.hiddenSidebarItem')
                                            {{-- @slot('url',  route('front.portfolio')) --}}
                                            @slot('name', trans('frontend.navbar.portfolio'))
                                        @endcomponent
                                        @component('frontend::components.hiddenSidebarItem')
                                            {{-- @slot('url',  route('front.contact')) --}}
                                            @slot('name', trans('frontend.navbar.contact'))
                                        @endcomponent
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h1>useful link</h1>
                            <p><a href="#">your profile</a></p>
                            <p><a href="#">chat with us</a></p>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h1>our support</h1>
                            <div class="contact-us-block">
                                <div class="contact-us-block__item">
                                    <div class="contact-us-block__item__icon pr-3 mb-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-us-block__item__details">
                                        <a href="#">{{Settings::get('address')}}</a>
                                    </div>
                                </div>
                                <div class="contact-us-block__item">
                                    <div class="contact-us-block__item__icon pr-3 mb-3">
                                        <i class="fas fa-mobile"></i>
                                    </div>
                                    <div class="contact-us-block__item__details">
                                        <a href="#">{{Settings::get('phone')}}</a>
                                        {{-- <a href="#">01015440564</a> - --}}
                                    </div>
                                </div>
                                <div class="contact-us-block__item">
                                    <div class="contact-us-block__item__icon pr-3 mb-3">
                                        <i class="far fa-envelope-open"></i>
                                    </div>
                                    <div class="contact-us-block__item__details">
                                        <a href="#">{{Settings::get('email')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 pt-3 mt-sm-1 mt-md-3 mt-lg-0">
                <div class="to-up">
                    <div>
                        <a href="#" data-scroll="body"><i class="fas fa-chevron-up"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 footer__text">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 pt-4 d-flex justify-content-center align-items-center">
                            <p class="text-center">copy rights &copy; made by <a href="#">echosoft</a></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
