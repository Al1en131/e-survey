<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" antialiased h-full">
    <div class="min-h-screen flex flex-col ">
        <header class="items-center gap-2 flex px-6 sticky">
            <div class="flex lg:justify-start">
                @foreach ($management as $item)
                    @if ($item->hasmedia('management'))
                        <img class="block h-20 w-auto fill-current text-gray-800"
                            src="{{ $item->getFirstMediaUrl('management') }}" />
                    @else
                        <img class="block h-20 w-auto fill-current text-gray-800"
                            src="{{ asset('assets/image/TNYI.png') }}" />
                    @endif
                @endforeach
            </div>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        @role('admin')
                            <a class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                href="{{ url('/admin/dashboard') }}">
                                Dashboard
                            </a>
                            @elserole('user')
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @endrole
                    @else
                        <a class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                            href="{{ route('login') }}">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                href="{{ route('register') }}">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <main class="px-6 max-md:px-10 flex-grow">
            {{ $slot }}
        </main>
        <footer class="py-3 text-center text-sm text-white bg-secondary bottom-0">
            @include('layouts.footer')
        </footer>
    </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
