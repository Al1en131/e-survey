@extends('layouts.user')

@section('content')
    <section class="flex min-h-screen items-center justify-center px-4 md:px-0">
        <div class="absolute left-0 top-0 flex w-full items-center justify-between px-4 py-2">
            @foreach ($management as $item)
                @if ($item->hasmedia('management'))
                    <img class="md:h-[6vw] h-20" src="{{ $item->getFirstMediaUrl('management') }}" />
                @else
                    <img class="md:h-[6vw] h-20" src="{{ asset('assets/image/TNYI.png') }}" />
                @endif
            @endforeach
        </div>
        <div class="flex flex-col items-center justify-center gap-4 md:flex-row md:gap-10">
            <div class="md:ot-20">
                <img class="w-40 md:w-auto" src="{{ asset('assets/img/Frame 1000006071.png') }}" alt="">
            </div>
            <div
                class="flex w-full flex-col items-center gap-4 pt-6 text-center text-[#A3B0BC] md:w-1/2 md:gap-6 md:pt-10 md:text-xl">
                <h1 class="font-inter text-2xl font-semibold text-white md:text-5xl">Yayy! You're Invited</h1>
                <p class="text-center text-sm md:text-base">Congratulation, you are invited to join this program.
                    Click Accept Invitation button to
                    enrol into the program.</p>
                <span><b class="font-semibold">Survey Name : </b>{{ $survey->title }}</span>
                <button class="rounded-lg bg-primary py-4 px-8 text-sm font-bold text-white md:py- md:text-lg">
                    <a href="{{ route('home.survey.start', ['slug' => $survey->slug]) }}">
                        Accept Invitation
                    </a>
                </button>
            </div>
        </div>
    </section>
@endsection
