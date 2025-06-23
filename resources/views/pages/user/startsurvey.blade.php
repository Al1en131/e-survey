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
            @if ($participants && $participants->is_finish == 1)
                <div class="flex w-full md:w-1/2 mx-4 flex-col items-start gap-8 max-md:gap-0 pt-10 text-[#A3B0BC]">
                    <h1 class="text-2xl font-semibold text-white max-md:mb-5">
                        Survey Has Finished
                    </h1>
                    <p class="text-pretty text-start max-md:mb-8">
                        {{ $survey->description }}
                    </p>
                    <div class="flex w-full max-md:block">
                        <div class="flex w-1/2 items-center gap-2 max-md:w-full max-md:mb-5">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20.5274" cy="20.0303" r="20" fill="#E2642B" />
                                <path
                                    d="M14.0274 12.7803C14.0274 12.3661 13.6916 12.0303 13.2774 12.0303C12.8632 12.0303 12.5274 12.3661 12.5274 12.7803V27.2803C12.5274 27.6945 12.8632 28.0303 13.2774 28.0303C13.6916 28.0303 14.0274 27.6945 14.0274 27.2803V22.8888L15.6849 22.5399C17.132 22.2352 18.6399 22.4372 19.9559 23.1121C21.7997 24.0576 23.9399 24.2458 25.9204 23.6364L27.998 22.9971C28.3127 22.9003 28.5274 22.6095 28.5274 22.2803V13.7803C28.5274 13.5542 28.4255 13.3403 28.25 13.1979C28.0745 13.0555 27.8441 12.9998 27.6229 13.0464L25.2432 13.5474C23.8425 13.8422 22.386 13.7159 21.057 13.1843L20.5549 12.9835C18.951 12.3419 17.1931 12.1895 15.5027 12.5454L14.0274 12.8559V12.7803Z"
                                    fill="white" />
                            </svg>
                            <div class="flex flex-col">
                                <span class="font-semibold text-white">{{ $count_question }} Questions</span>
                                <span class="text-xs">One of requirements to finish the session</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 w-1/2 max-md:w-full max-md:mb-5">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20.5275" cy="20.0303" r="20" fill="#E2642B" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5275 28.0303C24.9457 28.0303 28.5275 24.4486 28.5275 20.0303C28.5275 15.612 24.9457 12.0303 20.5275 12.0303C16.1092 12.0303 12.5275 15.612 12.5275 20.0303C12.5275 24.4486 16.1092 28.0303 20.5275 28.0303ZM21.2775 15.0303C21.2775 14.6161 20.9417 14.2803 20.5275 14.2803C20.1133 14.2803 19.7775 14.6161 19.7775 15.0303V20.0303C19.7775 20.4445 20.1133 20.7803 20.5275 20.7803H24.5275C24.9417 20.7803 25.2775 20.4445 25.2775 20.0303C25.2775 19.6161 24.9417 19.2803 24.5275 19.2803H21.2775V15.0303Z"
                                    fill="white" />
                            </svg>
                            <div class="flex flex-col">
                                <span
                                    class="font-semibold text-white">{{ date('d, M Y', strtotime($survey->start_date)) . ' - ' . date('d, M Y', strtotime($survey->end_date)) }}</span>
                                <span class="text-xs">Finish the Survey before the time is up </span>

                            </div>
                        </div>
                    </div>
                    <form class="w-full" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="flex w-full items-center justify-center gap-5 rounded-lg bg-primary p-4 font-bold text-white"
                            type="submit">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="flex w-full md:w-1/2 mx-4 flex-col items-start gap-8 max-md:gap-0 pt-10 text-[#A3B0BC]">
                    <h1 class="text-2xl font-semibold text-white max-md:mb-5">
                        About Survey
                    </h1>
                    <p class="text-pretty text-start max-md:mb-8">
                        {{ $survey->description }}
                    </p>
                    <div class="max-md:grid max-md:grid-cols-1 flex w-full max-md:mb-8">
                        <div class="flex items-center gap-3 mb-0 max-md:mb-5 w-1/2 max-md:w-full">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20.5274" cy="20.0303" r="20" fill="#E2642B" />
                                <path
                                    d="M14.0274 12.7803C14.0274 12.3661 13.6916 12.0303 13.2774 12.0303C12.8632 12.0303 12.5274 12.3661 12.5274 12.7803V27.2803C12.5274 27.6945 12.8632 28.0303 13.2774 28.0303C13.6916 28.0303 14.0274 27.6945 14.0274 27.2803V22.8888L15.6849 22.5399C17.132 22.2352 18.6399 22.4372 19.9559 23.1121C21.7997 24.0576 23.9399 24.2458 25.9204 23.6364L27.998 22.9971C28.3127 22.9003 28.5274 22.6095 28.5274 22.2803V13.7803C28.5274 13.5542 28.4255 13.3403 28.25 13.1979C28.0745 13.0555 27.8441 12.9998 27.6229 13.0464L25.2432 13.5474C23.8425 13.8422 22.386 13.7159 21.057 13.1843L20.5549 12.9835C18.951 12.3419 17.1931 12.1895 15.5027 12.5454L14.0274 12.8559V12.7803Z"
                                    fill="white" />
                            </svg>
                            <div class="flex flex-col">
                                <span class="font-semibold text-white">{{ $count_question }} Questions</span>
                                <span class="text-xs">One of requirements to finish the session</span>
                            </div>
                        </div>
                        <div class="flex items-center  gap-2 w-1/2 max-md:w-full">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20.5275" cy="20.0303" r="20" fill="#E2642B" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5275 28.0303C24.9457 28.0303 28.5275 24.4486 28.5275 20.0303C28.5275 15.612 24.9457 12.0303 20.5275 12.0303C16.1092 12.0303 12.5275 15.612 12.5275 20.0303C12.5275 24.4486 16.1092 28.0303 20.5275 28.0303ZM21.2775 15.0303C21.2775 14.6161 20.9417 14.2803 20.5275 14.2803C20.1133 14.2803 19.7775 14.6161 19.7775 15.0303V20.0303C19.7775 20.4445 20.1133 20.7803 20.5275 20.7803H24.5275C24.9417 20.7803 25.2775 20.4445 25.2775 20.0303C25.2775 19.6161 24.9417 19.2803 24.5275 19.2803H21.2775V15.0303Z"
                                    fill="white" />
                            </svg>
                            <div class="flex flex-col">
                                <span
                                    class="font-semibold text-white">{{ date('d, M Y', strtotime($survey->start_date)) . ' - ' . date('d, M Y', strtotime($survey->end_date)) }}</span>
                                <span class="text-xs">Finish the Survey before the time is up </span>
                            </div>
                        </div>
                    </div>
                    <a class="flex w-full items-center justify-center gap-5 rounded-lg bg-primary p-4 font-bold text-white"
                        href="{{ route('home.question', ['slug' => $survey->slug]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.527466 2.68297C0.527466 1.25684 2.05646 0.352785 3.30606 1.04006L14.8466 7.38738C16.1419 8.09975 16.1418 9.96083 14.8466 10.6732L3.30606 17.0205C2.05646 17.7078 0.527466 16.8037 0.527466 15.3776V2.68297Z"
                                fill="white" />
                        </svg>
                        Start Survey
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
