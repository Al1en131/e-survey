<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <header>
        @yield('header')
    </header>
    <main>
        <div class="relative bg-secondary">
            @yield('content')
            {{-- <div class="absolute right-[50%] top-5">
                <img src="/assets/image/mail.png" class="h-20 z-0" alt="">
            </div> --}}
            <div class="absolute left-10 top-[15%]">
                <img src="/assets/image/coin.png" class="h-20" alt="">
            </div>
            <div class="absolute bottom-10 left-16">
                <img src="/assets/image/thumb.png" class="h-20" alt="">
            </div>
            <div class="absolute right-5 top-[10%]">
                <img src="/assets/image/pencil.png" class="h-20" alt="">
            </div>
            <div class="absolute right-16 bottom-[15%]">
                <img src="/assets/image/clock.png" class="h-20 z-0" alt="">
            </div>
        </div>
    </main>
</body>

</html>
