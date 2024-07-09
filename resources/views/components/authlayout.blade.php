<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/authenticated.css?h=cb606d99bb2418df19b6bc818b41e412') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Libre%20Franklin.css?h=3ff928010e86b7ea9e32af8df2def207') }}">
    <link rel="stylesheet" href="{{ asset('/assets/fonts/fontawesome-all.min.css?h=56e363b79edc339d45e4ccd6c3d498ac') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Features-Cards-icons.css?h=befd8a398792e305b7ffd4a176b5b585') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pricing-Free-Paid-badges.css?h=966f4a3faf034d0f7f9779567201fb70') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Testimonials-images.css?h=4f3cfa46e40e236365345fc77963f4b8') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Lightbox-Gallery-baguetteBox.min.css?h=2d761fd37d8ee0feb637c18138a4c982') }}">
    <!------ Include the above in your HEAD tag ---------->
    
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    @livewireStyles
</head>

<body id="page-top" style="font-family: 'Libre Franklin', sans-serif;">
    @auth
        {{ $slot }}
    @endauth
   
    <script data-navigate-once src="{{ asset('/assets/bootstrap/js/authenticated.js?h=79ff9637b74326c362fb6f7f5801a7ba') }}"></script>
    <script src="{{ asset('assets/js/Lightbox-Gallery-baguetteBox.min.js?h=add865daffd8b6e10264279f48d8ac50')}}"></script>
    <script src="{{ asset('assets/js/Lightbox-Gallery.js?h=64eb55ccbc6ead5e91ebe308caacba6e')}}"></script>
    <script defer src="{{ asset('/assets/js/theme.js?h=745dbc17a74e86e6bf9cba33e1d24a74') }}"></script>
    @livewireScripts
</body>
</html>