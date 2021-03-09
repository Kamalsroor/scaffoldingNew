<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Locales::getDir() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('dashboard.auth.login.title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Locales::getDir() == 'rtl')
        <link rel="stylesheet" href="{{ asset(mix('/css/vali.rtl.css')) }}">
    @else
        <link rel="stylesheet" href="{{ asset(mix('/css/vali.css')) }}">
    @endif
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content" id="app">
    <div class="logo">
        <h1>{{ config('app.name') }}</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="{{ route('login') }}" method="post">
            @csrf
            <h3 class="login-head">
                <i class="fas fa-lg fa-fw fa-user mr-2"></i>
                @lang('dashboard.auth.login.title')
            </h3>
            <div class="form-group">
                <label class="control-label">@lang('dashboard.auth.login.email')</label>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       type="text"
                       name="email"
                       value="{{ old('email') }}"
                       autofocus
                       placeholder="@lang('dashboard.auth.login.email')">
            </div>
            <div class="form-group">
                <label class="control-label">@lang('dashboard.auth.login.password')</label>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       type="password"
                       name="password"
                       autocomplete="current-password"
                       placeholder="@lang('dashboard.auth.login.password')">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox"
                                   name="remember"
                                   {{ old('remember') ? 'checked' : '' }}
                                   id="remember">
                            <span class="label-text">
                                @lang('dashboard.auth.login.remember')
                            </span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2">
                        <a href="{{ route('password.request') }}" data-toggle="flip">
                            @lang('dashboard.auth.login.forget')
                        </a>
                    </p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="fas fa-sign-in-alt fa-fw mr-2"></i>
                    @lang('dashboard.auth.login.submit')
                </button>
            </div>
        </form>
        <form class="forget-form" action="{{ route('password.email') }}" method="post">
            @csrf
            <h3 class="login-head">
                <i class="fa fa-lg fa-fw fa-lock"></i>
                @lang('dashboard.auth.forget.title')
            </h3>
            <div class="form-group">
                <label class="control-label">@lang('dashboard.auth.forget.email')</label>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       type="text"
                       name="email"
                       value="{{ old('email') }}"
                       autofocus
                       placeholder="@lang('dashboard.auth.forget.email')">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="fa fa-unlock fa-lg fa-fw mr-2"></i>
                    @lang('dashboard.auth.forget.submit')
                </button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip">
                        <i class="fa fa-angle-left fa-fw mr-2"></i>
                        @lang('dashboard.auth.login.title')
                    </a>
                </p>
            </div>
        </form>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{ asset(mix('/js/vali.js')) }}"></script>

<script type="text/javascript">

    @if ($errors->any())
            toastr.error(`<ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>`);
    @endif
    @if (session('status'))
            toastr.success(`{{ session('status') }}`);
    @endif

    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>
