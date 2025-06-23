@extends('layouts.user')

@section('content')
    <section class="flex min-h-screen items-center justify-center">
        <div class="absolute left-0 top-0 flex w-full items-center justify-between px-4 py-2">
            @foreach ($management as $item)
                @if ($item->hasmedia('management'))
                    <img class="md:h-[6vw] h-20" src="{{ $item->getFirstMediaUrl('management') }}" />
                @else
                    <img class="md:h-[6vw] h-20" src="{{ asset('assets/image/TNYI.png') }}" />
                @endif
            @endforeach
        </div>
        <div class="flex items-center justify-center gap-10">
            <div class="max-md:hidden">
                <img src="{{ asset('assets/img/Frame 1000006071.png') }}" alt="">
            </div>
            <div class="flex w-full md:w-full flex-col items-center gap-11 pt-10 text-[#A3B0BC]">
                <h1 class="font-inter text-5xl font-semibold text-white">Yayy! Finish</h1>
                <p class="text-balance text-center">Congratulations, you have completed this survey</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        class="rounded-lg bg-primary p-4 px-20 font-bold text-white">Logout</a>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            localStorage.clear();
        });
    </script>
@endsection
