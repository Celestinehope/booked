<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="{{asset('import/assets/css/style.css')}}" rel="stylesheet">
    </head>
    <body class="font-sans text-White-900 antialiased" >
        <div style="background-image: url({{asset('import/assets/img/29.jpg')}});" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-green-100 dark:bg-brown-900">
            <div >
                <a href="/" style="font-type:bold;" class="logo" >
                     BOOKED
                </a>
            </div>

            <div style="background-color:white;" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white:bg-white shadow-md overflow-hidden sm:rounded-lg">
            
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
