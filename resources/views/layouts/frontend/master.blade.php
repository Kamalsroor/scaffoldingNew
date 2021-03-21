<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html dir="{{ Locales::getDir() }}" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ $title ? $title .' | '. app_name() : app_name() }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" href="{{ app_favicon() }}" type="image/x-icon" />

    <!-- Admin Lte -->
    @if(Locales::getDir() == 'rtl')
        <link rel="stylesheet" href="{{ asset(mix('/css/main.rtl.css')) }}">
    @else
        <link rel="stylesheet" href="{{ asset(mix('/css/main.css')) }}">
    @endif

    @stack('styles')

    {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
</head>
<body data-scroll-target="body">



        <!--================
            main Navbar
        =================-->
        {{-- @include('layouts.frontend.include.navbar') --}}



        {{ $slot }}



        <!--=========
        - Footer -
        ===========-->

        @include('layouts.frontend.include.footer')


        <!-- General Components -->



<!-- REQUIRED SCRIPTS -->
<!-- Scripts -->
<script src="{{ asset(mix('/js/frontend.js')) }}"></script>

@stack('scripts')

@if ($errors->any())
{{-- @dd($errors->any()) --}}
<script>
    toastr.error("{{trans('frontend.errors.des')}}", "{{trans('frontend.errors.title')}}")
</script>
@endif



@foreach (session('flash_notification', collect())->toArray() as $message)

    @if ($message['overlay'])
        <script>
            toastr.success("{{$message['message']}}", "{{$message['title']}}")
        </script>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}



</body>
</html>
