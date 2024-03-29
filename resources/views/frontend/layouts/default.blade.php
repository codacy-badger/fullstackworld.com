<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('frontend.layouts.partials._meta')
    @include('frontend.layouts.partials._styles')
    @include('frontend.layouts.partials._analytics')
    @include('frontend.layouts.partials._addsense')

</head>
<body>
<div id="app">
@include('frontend.layouts.partials._navigation')
<section class="bd-tws-home section">
        <div class="container is-widescren">

            @yield('content')
        </div>
    </section>
    @include('frontend.layouts.partials._footer')

    @include('frontend.layouts.partials._scripts')
</div>
</body>
</html>