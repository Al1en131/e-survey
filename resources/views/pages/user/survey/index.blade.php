@extends('layouts.user')

@section('content')
    <section class="h-full antialiased z-50">
        <div class="flex flex-col items-center justify-between gap-10 w-full md:max-w-screen min-h-screen px-4 md:px-20">
            <div class="flex w-full items-center justify-between pt-5 max-md:pt-0 md:flex-row sticky">
                @foreach ($management as $item)
                    @if ($item->hasmedia('management'))
                        <img class="md:h-[4vw] h-20" src="{{ $item->getFirstMediaUrl('management') }}" />
                    @else
                        <img class="md:h-[4vw] h-20" src="{{ asset('assets/image/TNYI.png') }}" />
                    @endif
                @endforeach
                <span
                    class="hidden md:block line-clamp-4 text-xl md:text-base overflow-visible font-semibold text-light mt-5 md:mt-0">
                    {{ Str::limit($survey->title, 45) }}
                </span>
                <div class="relative md:hidden" x-data="{ open: false }">
                    <button @click.prevent="open = true" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="white" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" :class="[open && '!block']" x-trap.noscroll="open"
                        class="absolute hidden right-0 px-0 mt-2 w-64 bg-white shadow-lg rounded-md z-10">
                        <div class="px-4 py-3">
                            <span class="block text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                            <span class="block text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                        </div>
                        <hr class="h-[2px] border-0 bg-gray-500">
                        <span class="block px-4 py-2 text-black">
                            {{ Str::limit($survey->title, 45) }}
                        </span>
                    </div>
                </div>
            </div>
            <ul class="w-full">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                @csrf
                @foreach ($steps as $key => $item)
                    @if ($item->stepable_type == 'App\Models\Checkpoint')
                        <li class="{{ $item->order }} checkpoint" id="step-{{ $key + 1 }}" style="display: none;">
                            <div
                                class="text-pretty mx-auto flex max-w-xl flex-col items-center justify-center gap-8 text-start text-light">
                                <div class="">
                                    @if ($item->stepable->getFirstMediaUrl('checkpoint'))
                                        <img src="{{ $item->stepable->getFirstMediaUrl('checkpoint') }}" alt="">
                                    @else
                                        <img src="{{ asset('assets/img/Frame 1171277236.png') }}" alt="">
                                    @endif
                                </div>
                                <span class="text-2xl font-bold text-center">
                                    {{ $item->stepable->title }}
                                </span>
                                <p class="text-lg md:text-xl font-medium text-center text-[#BECBD7]">
                                    {{ $item->stepable->description }}
                                </p>
                            </div>
                        </li>
                    @else
                        <li class="{{ $item->order }} {{ $item->type }}" id="step-{{ $key + 1 }}"
                            style="display: none;">
                            <label class="flex md:flex-row justify-center md:gap-10" for="question-{{ $key + 1 }}">
                                <span
                                    class="rounded-half flex h-12 w-12 md:h-[46px] md:w-[46px] items-center justify-center max-md:hidden bg-[#b86326] text-2xl md:text-3xl font-bold text-white">{{ $key + 1 }}</span>
                                <div class="flex w-full md:w-[80%] flex-col gap-6 md:gap-12 max-md:mt-16">
                                    @if ($item->stepable->getFirstMediaUrl('question'))
                                        <div class="w-full md:w-1/2">
                                            <img src="{{ $item->stepable->getFirstMediaUrl('question') }}"
                                                alt="question images">
                                        </div>
                                    @endif
                                    <span class="text-pretty text-xl md:text-2xl font-medium text-light">
                                        {{ $item->stepable->question }}
                                    </span>
                                    @if ($item->stepable->type == 'essay')
                                        <input
                                            class="font-josefin placeholder-gray-400 focus:shadow-outline appearance-none border-0 border-b border-white bg-transparent px-0 pb-4 pt-0 text-xl md:text-3xl text-ashes focus:border-[#b86326] focus:outline-none focus:ring-0"
                                            id="question-{{ $key + 1 }}" type="text"
                                            placeholder="Type your answer here"
                                            oninput="saveAnswer('essay', {{ $key + 1 }}, {{ $item->stepable_id }}, this.value); validateInput()">
                                    @elseif ($item->stepable->type == 'likert')
                                        <div class="flex w-fit flex-col gap-6 text-primary">
                                            <div class="flex flex-wrap gap-4 md:gap-10"
                                                id="likert-options-{{ $key + 1 }}">
                                                @foreach ($likerts as $likert)
                                                    @if ($likert->likert > $item->stepable->option->first()->option)
                                                        @break
                                                    @endif
                                                    <button
                                                        class="flex w-fit items-center justify-center rounded-xl bg-white p-3 md:p-6 hover:ring-4 hover:ring-[#b86326]"
                                                        data-likert="{{ $likert->likert }}" type="button"
                                                        onclick="selectLikert({{ $key + 1 }}, {{ $item->stepable_id }}, {{ $likert->likert }})">
                                                        <span
                                                            class="rounded-half flex h-12 w-12 md:h-[46px] md:w-[46px] items-center justify-center border-4 border-primary text-xl md:text-2xl font-semibold">{{ $likert->likert }}</span>
                                                    </button>
                                                @endforeach
                                            </div>
                                            <div class="flex justify-between text-[#eaa35d] text-sm md:text-xl">
                                                <span>Disagree</span>
                                                <span>Agree</span>
                                            </div>
                                        </div>
                                        <input id="likert-value-{{ $key + 1 }}" type="hidden"
                                            oninput="validateInput()">
                                    @elseif ($item->stepable->type == 'choices')
                                        <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-3 md:gap-6">
                                            @php
                                                $alphabets = range('A', 'Z');
                                            @endphp
                                            @foreach ($item->stepable->option as $j => $option)
                                                <button
                                                    class="choice-option flex w-full items-center justify-start gap-2 md:gap-4 rounded-lg bg-[#F4F4F4] px-4 py-6 md:px-8 md:py-12 hover:cursor-pointer hover:ring-4 hover:ring-[#b86326]"
                                                    id="choice-{{ $option->id }}" type="button"
                                                    onclick="saveAnswer('choices', {{ $key + 1 }}, {{ $item->stepable_id }}, '{{ $option->id }}'); validateInput();">
                                                    <span class="text-xl md:text-2xl font-semibold"
                                                        data-choice-id="{{ $option->id }}">{{ $alphabets[$j] }}.</span>
                                                    <div class="text-base md:text-xl">{{ $option->option }}</div>
                                                </button>
                                            @endforeach
                                        </div>
                                        <input id="choices-value-{{ $key + 1 }}" type="hidden"
                                            oninput="validateInput()">
                                    @endif
                                </div>
                            </label>
                        </li>
                    @endif
                @endforeach
            </ul>

            <div id="steps-question" class="flex w-full items-center justify-between flex-col md:flex-row">
                <div class="font-sora text-xl md:text-2xl font-bold text-ashes z-50">
                    <span class="text-2xl md:text-3xl" id="current-question">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 inline-block text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span> / {{ count($steps) }}
                </div>
                <div class="flex gap-5 py-12 z-50">
                    <button
                        class="rounded-half flex h-12 w-12 md:h-[60px] md:w-[60px] items-center justify-center bg-danger"
                        type="button" onclick="prevStep()">
                        <svg width="13" height="21" viewBox="0 0 13 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.684 2.47147L2.63216 10.5233L10.684 18.5751" stroke="#565E6D"
                                stroke-width="4.0259" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button
                        class="rounded-half flex h-12 w-12 md:h-[60px] md:w-[60px] cursor-not-allowed items-center justify-center bg-warning disabled:opacity-50"
                        id="next-button" type="button" onclick="nextStep()" disabled>
                        <svg width="13" height="21" viewBox="0 0 13 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.31604 2.47147L10.3678 10.5233L2.31604 18.5751" stroke="#565E6D"
                                stroke-width="4.0259" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button
                        class="hidden h-12 md:h-[60px] w-48 md:w-[200px] cursor-not-allowed items-center justify-center text-xl md:text-2xl text-[#565E6D] font-medium rounded-lg bg-warning disabled:opacity-50"
                        id="finish-button" type="button">Finish</button>
                </div>
            </div>

            <div class="hidden w-full items-center justify-between flex-col md:flex-row" id="steps-checkpoint">
                <div class="font-sora text-lg font-bold text-ashes z-50">
                    <span class="text-2xl md:text-3xl">checkpoint 👋</span> / {{ count($steps) }}
                </div>
                <div class="py-12 z-50">
                    <button
                        class="flex h-12 md:h-[60px] w-48 md:w-[200px] items-center justify-center gap-3 rounded-lg bg-danger"
                        type="button" onclick="nextStep()">
                        <span class="text-xl md:text-2xl font-medium text-[#565E6D]">Continue</span>
                        <svg width="13" height="21" viewBox="0 0 13 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.31604 2.47147L10.3678 10.5233L2.31604 18.5751" stroke="#565E6D"
                                stroke-width="4.0259" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <script>
        let steps = 1;
        const totalSteps = {!! json_encode(count($steps)) !!};
        const currentSlug = {!! json_encode($survey->slug) !!};
        const homeAnswerUrl = {!! json_encode(route('home.answer.end')) !!}
    </script>
    <script src="{{ asset('js/surveyQuestionSlide.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js"></script>
@endsection
