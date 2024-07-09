<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css?h=3f30c2c47d7d23c7a994db0c862d45a5') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Atkinson%20Hyperlegible.css?h=84bb895363bb66de241345351f8f4886') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Libre%20Franklin.css?h=c483a619f5978d638540c0fef0acd310') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Roboto%20Mono.css?h=cb73c7efb6764b94092b072b9b0b50b4') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/swiper-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Features-Image-images.css?h=4f3cfa46e40e236365345fc77963f4b8') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Navbar-With-Button-icons.css?h=1fd32d3ad4648c772c8c2ecd9aee29a8') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Simple-Slider-swiper-bundle.min.css?h=abe124df8669475fefb104f2ec924f59') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/Simple-Slider.css?h=da830b6503e0457b5735b0129f20b163') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])  
    @livewireStyles  
</head>

<body style="font-family: 'Libre Franklin', sans-serif;">
    @guest
        {{ $slot }}   
    @endguest

    <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js?h=79ff9637b74326c362fb6f7f5801a7ba') }}"></script>
    <script src="{{ asset('/assets/js/Simple-Slider-swiper-bundle.min.js?h=e0c0f6a33b1ca78b2a1df838a346a344') }}"></script>
    <script src="{{ asset('/assets/js/Simple-Slider.js?h=84b1d7cbf88bb21b37fb412ca8f94640') }}"></script>
    @livewireScripts
</body>
</html>