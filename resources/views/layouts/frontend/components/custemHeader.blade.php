<header class="custom-header" style="
    @if(isset($background))
        background: url({{  $background ?? "" }}) no-repeat top;
    @endif
background-size: cover;
">
    <div class="container">
        <div class="custom-header__item">
            <div class="custom-header__item__content">
                @if(isset($title))
                    <h1>{{$title}}</h1>
                @endif

                <img src="{{ asset('frontend') }}/imgs/line.png" alt="">
                <span>
                    <a href=""><i class="fas fa-home"></i> {{trans('frontend.navbar.home')}}</a>
                    @if(isset($breadcrumbs))
                     <span>/ {{$breadcrumbs}}</span>
                    @endif
                </span>
            </div>
        </div>
    </div>
</header>
