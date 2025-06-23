<x-admin-layout>
    <div class="py-9 max-md:px-5 max-md:py-6">
        <div class="mx-auto sm:px-6 lg:px-20">
            <div class="flex items-center justify-between pb-[31px] max-md:pb-3">
                <div class="flex gap-4 max-md:gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    <h1 class=" text-4xl font-medium text-[#103558] max-md:pb-0 max-md:text-lg">
                        Hasil Survey
                    </h1>
                </div>
                <div class="flex items-center justify-end">
                    <div class="rounded-lg bg-primary p-2">
                        <a class="" href="{{ route('admin.answer.detail', ['survey' => $survey]) }}">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex ms-1 max-md:block w-full">
                <div class="block w-1/2 max-md:w-full">
                    <div class="block my-4">
                        <p class="text-sm">Participant Name</p>
                        <div class="flex gap-2 items-center">
                            <div class="w-6"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 20 20" fill="none" class="">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.875 5.625C6.875 4.7962 7.20424 4.00134 7.79029 3.41529C8.37634 2.82924 9.1712 2.5 10 2.5C10.8288 2.5 11.6237 2.82924 12.2097 3.41529C12.7958 4.00134 13.125 4.7962 13.125 5.625C13.125 6.4538 12.7958 7.24866 12.2097 7.83471C11.6237 8.42076 10.8288 8.75 10 8.75C9.1712 8.75 8.37634 8.42076 7.79029 7.83471C7.20424 7.24866 6.875 6.4538 6.875 5.625ZM13.125 8.125C13.125 7.46196 13.3884 6.82607 13.8572 6.35723C14.3261 5.88839 14.962 5.625 15.625 5.625C16.288 5.625 16.9239 5.88839 17.3928 6.35723C17.8616 6.82607 18.125 7.46196 18.125 8.125C18.125 8.78804 17.8616 9.42393 17.3928 9.89277C16.9239 10.3616 16.288 10.625 15.625 10.625C14.962 10.625 14.3261 10.3616 13.8572 9.89277C13.3884 9.42393 13.125 8.78804 13.125 8.125ZM1.875 8.125C1.875 7.46196 2.13839 6.82607 2.60723 6.35723C3.07607 5.88839 3.71196 5.625 4.375 5.625C5.03804 5.625 5.67393 5.88839 6.14277 6.35723C6.61161 6.82607 6.875 7.46196 6.875 8.125C6.875 8.78804 6.61161 9.42393 6.14277 9.89277C5.67393 10.3616 5.03804 10.625 4.375 10.625C3.71196 10.625 3.07607 10.3616 2.60723 9.89277C2.13839 9.42393 1.875 8.78804 1.875 8.125ZM5.25833 12.5975C5.76662 11.8009 6.46757 11.1452 7.29635 10.6912C8.12513 10.2372 9.05501 9.99946 10 10C10.7915 9.99928 11.5743 10.1657 12.297 10.4885C13.0197 10.8112 13.6661 11.2829 14.1939 11.8728C14.7217 12.4627 15.119 13.1573 15.3597 13.9114C15.6004 14.6654 15.6792 15.4618 15.5908 16.2483C15.58 16.3461 15.5463 16.4398 15.4925 16.5221C15.4386 16.6043 15.3661 16.6727 15.2808 16.7217C13.6738 17.6438 11.8528 18.1277 10 18.125C8.07917 18.125 6.275 17.615 4.71917 16.7217C4.63391 16.6727 4.5614 16.6043 4.50754 16.5221C4.45367 16.4398 4.41997 16.3461 4.40917 16.2483C4.26921 14.9705 4.56872 13.6831 5.25833 12.5983V12.5975Z"
                                        fill="#242565" />
                                    <path
                                        d="M4.23507 11.8784C3.4132 13.1471 3.03028 14.6503 3.14507 16.1576C2.64466 16.0817 2.15249 15.959 1.67507 15.7909L1.57923 15.7576C1.49373 15.7272 1.41886 15.6727 1.36369 15.6007C1.30852 15.5287 1.27542 15.4422 1.2684 15.3518L1.26007 15.2509C1.2264 14.8326 1.27736 14.4117 1.4099 14.0135C1.54244 13.6152 1.75385 13.2478 2.0315 12.933C2.30916 12.6182 2.64737 12.3627 3.02597 12.1815C3.40456 12.0003 3.81577 11.8972 4.23507 11.8784ZM16.8551 16.1576C16.9699 14.6503 16.5869 13.1471 15.7651 11.8784C16.1844 11.8972 16.5956 12.0003 16.9742 12.1815C17.3528 12.3627 17.691 12.6182 17.9686 12.933C18.2463 13.2478 18.4577 13.6152 18.5902 14.0135C18.7228 14.4117 18.7737 14.8326 18.7401 15.2509L18.7317 15.3518C18.7246 15.4421 18.6914 15.5284 18.6362 15.6002C18.5811 15.6721 18.5063 15.7265 18.4209 15.7568L18.3251 15.7901C17.8526 15.9568 17.3617 16.0809 16.8551 16.1576Z"
                                        fill="#242565" />
                                </svg></div>
                            <p class="items-center text-[#757575] font-semibold">{{ $participant->user->name }}
                            </p>
                        </div>
                    </div>
                    <div class="block my-4">
                        <p class="text-sm">Survey Name</p>
                        <div class="flex gap-2">
                            <div class="w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="21"
                                    height="21"
                                    class="max-md:w-[25.5px] max-md:h-[25.5px] pt-[2.8px] max-md:pt-0 max-md:mt-1 items-center max-md:pb-2 mt-[1px]"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#242565"
                                        d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm64 0v64h64V96H64zm384 0H192v64H448V96zM64 224v64h64V224H64zm384 0H192v64H448V224zM64 352v64h64V352H64zm384 0H192v64H448V352z" />
                                </svg>
                            </div>
                            <p class="items-center text-[#757575] font-semibold">{{ $survey->title }}</p>
                        </div>
                    </div>
                </div>
                <div class="block  w-1/2 max-md:w-full">
                    <div class="block my-4">
                        <p class="text-sm ">Date Start</p>
                        <div class="flex gap-2 items-center">
                            <div class="w-6"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                    viewBox="0 0 20 20" fill="none" class="">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z"
                                        fill="#242565" />
                                </svg></div>
                            <p class="items-center text-[#757575] font-semibold">
                                {{ date('l, d F Y', strtotime($survey->start_date)) }}</p>
                        </div>
                    </div>
                    <div class="block my-4">
                        <p class="text-sm">Survey Start</p>
                        <div class="flex gap-2 items-center">
                            <div class="w-6"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 16 16" fill="none" class="">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16ZM9 4C9 3.73478 8.89464 3.48043 8.70711 3.29289C8.51957 3.10536 8.26522 3 8 3C7.73478 3 7.48043 3.10536 7.29289 3.29289C7.10536 3.48043 7 3.73478 7 4V8C7.00006 8.26519 7.10545 8.51951 7.293 8.707L10.121 11.536C10.2139 11.6289 10.3242 11.7026 10.4456 11.7529C10.567 11.8032 10.6971 11.8291 10.8285 11.8291C10.9599 11.8291 11.09 11.8032 11.2114 11.7529C11.3328 11.7026 11.4431 11.6289 11.536 11.536C11.6289 11.4431 11.7026 11.3328 11.7529 11.2114C11.8032 11.09 11.8291 10.9599 11.8291 10.8285C11.8291 10.6971 11.8032 10.567 11.7529 10.4456C11.7026 10.3242 11.6289 10.2139 11.536 10.121L9 7.586V4Z"
                                        fill="#242565" />
                                </svg></div>
                            <p class="items-center text-[#757575] font-semibold">
                                {{ date('h:i A', strtotime($survey->start_date)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 ms-1">
                @foreach ($answers as $key => $answer)
                    <div class="block mt-16">
                        <div class="flex relative">
                            <p
                                class="text-sm text-white rounded-full font-bold w-9 h-9 py-2 text-center absolute bg-green-500">
                                {{ $key + 1 }}
                            </p>
                            <div class="ml-16">
                                @if ($answer->question->getFirstMediaUrl('question'))
                                    <img class="max-w-md mb-6 max-md:max-w-60"
                                        src="{{ $answer->question->getFirstMediaUrl('question') }}"
                                        alt="Image Question">
                                @endif
                                <p class="font-medium text-lg mt-1">{{ $answer->question->question }}</p>
                            </div>
                        </div>
                        @if ($answer->question->type === 'essay')
                            <div class="block ms-16 gap-4 mt-4">
                                <p class="text-[#a3a3a3] font-medium">Answer :</p>
                                <p class="mt-1 text-slate-500 text-lg font-semibold">
                                    {{ $answer->answerable->essay }}
                                </p>
                            </div>
                        @elseif ($answer->question->type === 'choices')
                            <div class="flex flex-wrap ms-16 max-md:block gap-4 mt-6">
                                @php
                                    $alphabets = range('A', 'Z');
                                @endphp
                                @foreach ($answer->question->option as $i => $option)
                                    @if ($answer->answerable_id === $option->id)
                                        <button
                                            class="bg-primary flex text-white py-10 px-4 max-md:mb-4 rounded-lg gap-2 w-80 items-center max-md:w-full max-md:h-[115.143px]">
                                            <b>
                                                {{ $alphabets[$i] }}.
                                            </b>
                                            <span class="text-left">
                                                {{ $option->option }}
                                            </span>
                                        </button>
                                    @else
                                        <button
                                            class="bg-gray-200 flex text-black py-10 px-4 max-md:mb-4 rounded-lg gap-2 w-80 max-md:w-full items-center max-md:h-[115.143px]">
                                            <b>
                                                {{ $alphabets[$i] }}.
                                            </b>
                                            <span class="text-left">
                                                {{ $option->option }}
                                            </span>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        @elseif ($answer->question->type === 'likert')
                            <div class="flex w-fit flex-col gap-8 text-white ml-16 ">
                                <div class="flex flex-wrap gap-10 mt-6">
                                    @for ($j = 1; $j <= $answer->question->option->first()->option; $j++)
                                        @if ($answer->answerable->likert == $j)
                                            <button
                                                class="flex w-fit items-center justify-center rounded-xl bg-primary p-6 hover:ring-4 hover:ring-primary border-2 border-white"
                                                type="button">
                                                <span
                                                    class="rounded-half flex h-[46px] w-[46px] items-center justify-center border-4 border-white text-white text-2xl font-semibold">
                                                    {{ $j }}
                                                </span>
                                            </button>
                                        @else
                                            <button
                                                class="flex w-fit items-center justify-center rounded-xl bg-gray-200 p-6 hover:ring-2 hover:ring-primary border-2 border-primary"
                                                type="button">
                                                <span
                                                    class="rounded-half flex h-[46px] w-[46px] items-center justify-center border-4 border-primary text-primary text-2xl font-semibold">
                                                    {{ $j }}
                                                </span>
                                            </button>
                                        @endif
                                    @endfor
                                </div>
                                <div class="text-base flex justify-between text-black max-md:text-xs">
                                    <span class="">Disagree</span>
                                    <span class="">Agree</span>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin-layout>
