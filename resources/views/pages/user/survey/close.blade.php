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
        @if ($dateNow < $survey->start_date)
            <div class="flex flex-col items-center justify-center gap-4 md:flex-row md:gap-10">
                <div class="">
                    <img class="w-48 md:w-auto" src="{{ asset('assets/img/Frame 1000006071.png') }}" alt="">
                </div>
                <div
                    class="flex w-full flex-col items-center gap-2 pt-6 text-center text-[#A3B0BC] md:w-1/2 md:gap-6 md:pt-10 md:text-xl">
                    <h1 class="font-inter text-2xl font-semibold text-white md:text-5xl"><b>{{ $survey->title }}</b> has not
                        started yet</h1>
                    <p class="text-center text-sm md:text-base">Contact the owner of this survey if you want to complete it
                    </p>
                </div>
            </div>
        @elseif ($dateNow >= $survey->end_date)
            <div class="flex flex-col items-center justify-center gap-4 md:flex-row md:gap-10">
                <div class="">
                    <img class="w-48 md:w-auto" src="{{ asset('assets/img/Frame 1000006071.png') }}" alt="">
                </div>
                <div
                    class="flex w-full flex-col items-center gap-2 pt-6 text-center text-[#A3B0BC] md:w-1/2 md:gap-6 md:pt-10 md:text-xl">
                    <h1 class="font-inter text-2xl font-semibold text-white md:text-5xl"><b>{{ $survey->title }}</b> is not
                        accepting any more answers</h1>
                    <p class="text-center text-sm md:text-base">Contact the survey owner if there is an error</p>
                </div>
            </div>
        @endif
    </section>
@endsection
