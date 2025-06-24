<x-admin-layout>
    <div class="">
        <div class="">
            <div class="flex items-center justify-between pb-[31px] max-md:pb-4">
                <div class="">
                    <h1 class="pb-2 text-4xl font-medium text-secondary max-md:pb-0 max-md:text-lg">
                        Update a survey
                    </h1>
                </div>
                <div class="flex items-center justify-end">
                    <div class="rounded-lg bg-primary p-2">
                        <a class="" href="{{ route('admin.survey.index') }}">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="mb-5 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('error'))
                <div class="mb-5 text-red-500">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-8 px-8 py-2 bg-primary flex items-center gap-12 rounded-lg">
                <div class="flex items-center space-x-3">
                    <img src="/assets/image/people.png" alt="People Icon" class="w-52 h-52 object-cover rounded-full" />
                </div>
                <div class="text-white">
                    <h2 class="text-xl font-semibold mb-2">Edit Existing Survey</h2>
                    <p class="text-sm leading-relaxed max-w-2xl">
                        This page allows you to update the details of an existing survey. You can modify the title,
                        description, and questions to better suit your objectives. Once changes are saved, the updated
                        survey will be reflected for all participants.
                    </p>
                </div>
            </div>
            <div class="overflow-hidden sm:rounded-lg">
                <div class="py-1 lg:py-2">
                    <form method="POST" action="{{ route('admin.survey.update', ['survey' => $survey->id]) }}"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-10 grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="block sm:col-span-2 sm:flex">
                                <label class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                                    for="survey">Survey
                                    Name</label>
                                <input
                                    class="focus:ring-primary-600 focus:border-primary-600 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                                    id="survey" name="title" type="text" value="{{ $survey->title }}"
                                    placeholder="Type survey name" required="">
                            </div>
                            <div class="block sm:col-span-2 sm:flex">
                                <label class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                                    for="survey-description">Description</label>
                                <textarea
                                    class="focus:ring-primary-500 focus:border-primary-500 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                                    id="survey-description" name="description" rows="4" placeholder="Your description here" required>{{ $survey->description }}</textarea>
                            </div>
                            <div class="block sm:col-span-2 sm:flex">
                                <label class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                                    for="description">Surveys
                                    Open</label>
                                <div class="flex w-full items-center" date-rangepicker>
                                    <div class="relative">
                                        <input
                                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary"
                                            name="start_date" type="date" value="{{ $startDate->format('Y-m-d') }}"
                                            placeholder="Select date start">
                                    </div>
                                    <div class="relative ml-4">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 end-0 top-0 flex items-center pe-3.5">
                                        </div>
                                        <input
                                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-secondary focus:ring-secondary"
                                            id="start_time" name="start_time" type="time"
                                            value="{{ $startDate->format('H:i:s') }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="block sm:col-span-2 sm:flex">
                                <label class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                                    for="description">Surveys
                                    Closed</label>
                                <div class="flex w-full items-center" date-rangepicker>
                                    <div class="relative">
                                        <input
                                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary"
                                            name="end_date" type="date" value="{{ $endDate->format('Y-m-d') }}"
                                            placeholder="Select date start">
                                    </div>
                                    <div class="relative ml-4">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 end-0 top-0 flex items-center pe-3.5">
                                        </div>
                                        <input
                                            class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-secondary focus:ring-secondary"
                                            id="end_time" name="end_time" type="time"
                                            value="{{ $endDate->format('H:i:s') }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="questions-container">
                            @foreach ($steps as $key => $step)
                                <div class="question-item mt-10" id="{{ $key === 0 ? 'question-template' : $key }}">
                                    <input name="questionsUpdate[{{ $key }}][id]" type="text"
                                        value="{{ $step->stepable_id }}" hidden>
                                    <div
                                        class="flex w-full items-center justify-between rounded-t-lg border-b border-gray-200 bg-secondary p-4 font-medium text-white rtl:text-right">
                                        <span class="question-number">Question {{ $key + 1 }}</span>
                                        <div class="flex items-center">
                                            <div class="right-2 top-[150px] max-sm:right-0 max-sm:top-[60px]">
                                                <label class="hover:cursor-pointer" for="avatar">
                                                    <svg class="mr-2 h-7 w-7 max-md:h-5 max-md:w-5" id="add-image"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                                    </svg>
                                                </label>
                                            </div>
                                            <a href="" cancel-id="{{ $step->id }}"
                                                class="delete-question-update hover:cursor-pointer">
                                                <svg class=" mr-2 h-7 w-7 max-md:h-5 max-md:w-5"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </a>
                                            <select
                                                class="type-dropdown block w-36 rounded-lg border border-gray-300 bg-white p-[6px] text-xs text-secondary focus:border-primary focus:ring-primary"
                                                name="questionsUpdate[{{ $key }}][type]">
                                                <option class="hover:bg-black" value="essay"
                                                    {{ $step->stepable->type === 'essay' ? 'selected' : '' }}>
                                                    Essay
                                                </option>
                                                <option class="hover:bg-black" value="likert"
                                                    {{ $step->stepable->type === 'likert' ? 'selected' : '' }}>
                                                    Likert
                                                </option>
                                                <option class="hover:bg-black" value="choices"
                                                    {{ $step->stepable->type === 'choices' ? 'selected' : '' }}>
                                                    Multiple Choice
                                                </option>
                                                <option class="hover:bg-black" value="checkpoint"
                                                    {{ $step->stepable->type != 'essay' && $step->stepable->type != 'likert' && $step->stepable->type != 'choices'
                                                        ? 'selected'
                                                        : '' }}>
                                                    Checkpoint
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="question-content">
                                        @if ($step->stepable->type === 'essay')
                                            <div class="rounded-b-lg border border-gray-300 p-4">
                                                <div class="image">
                                                    @if ($step->stepable->getFirstMediaUrl('question'))
                                                        @include('components.edit-survey-image', [
                                                            'step' => $step,
                                                            'type' => 'question',
                                                            'key' => $key,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="rounded-lg border border-gray-400 p-4">
                                                    <div class="group relative z-0 w-full">
                                                        <input
                                                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-0"
                                                            name="questionsUpdate[{{ $key }}][question]"
                                                            type="text" value="{{ $step->stepable->question }}"
                                                            placeholder=" " required />
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($step->stepable->type === 'likert')
                                            <input name="questionsUpdate[{{ $key }}][likertId]"
                                                type="text" value="{{ $step->stepable->option->first()->id }}"
                                                hidden>
                                            <div class="border border-gray-300 p-4">
                                                <div class="image">
                                                    @if ($step->stepable->getFirstMediaUrl('question'))
                                                        @include('components.edit-survey-image', [
                                                            'step' => $step,
                                                            'type' => 'question',
                                                            'key' => $key,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="rounded-lg border border-gray-400 p-4">
                                                    <div class="group relative z-0 w-full">
                                                        <input
                                                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-0"
                                                            name="questionsUpdate[{{ $key }}][question]"
                                                            type="text" value="{{ $step->stepable->question }}"
                                                            placeholder=" " required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rounded-b-lg border border-gray-300 p-4">
                                                <div class="flex content-center justify-center text-center">
                                                    <div class="flex">
                                                        <p
                                                            class="content-center justify-center text-center text-sm text-primary">
                                                            From<span
                                                                class="mx-6 font-semibold text-secondary">1</span>
                                                        </p>
                                                    </div>
                                                    <div class="ms-4 flex gap-6">
                                                        <p
                                                            class="content-center justify-center text-center text-sm text-primary">
                                                            To</p>
                                                        <select
                                                            class="block w-[64px] rounded-lg border border-gray-300 bg-white p-[10px] text-sm font-semibold text-secondary focus:border-secondary focus:ring-secondary"
                                                            id="type"
                                                            name="questionsUpdate[{{ $key }}][likert]"
                                                            selectedIndex='4'>
                                                            @for ($j = 1; $j <= 15; $j++)
                                                                <option class="hover:bg-black"
                                                                    value="{{ $j }}"
                                                                    {{ $step->stepable->option->first()->option === "$j" ? 'selected' : '' }}>
                                                                    {{ $j }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($step->stepable->type === 'choices')
                                            <div class="border border-gray-300 p-4">
                                                <div class="image">
                                                    @if ($step->stepable->getFirstMediaUrl('question'))
                                                        @include('components.edit-survey-image', [
                                                            'step' => $step,
                                                            'type' => 'question',
                                                            'key' => $key,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="rounded-lg border border-gray-400 p-4">
                                                    <div class="group relative z-0 w-full">
                                                        <input
                                                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-0"
                                                            name="questionsUpdate[{{ $key }}][question]"
                                                            type="text" value="{{ $step->stepable->question }}"
                                                            placeholder=" " required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rounded-b-lg border border-gray-300 p-4"
                                                id="answers-container">
                                                @php $alphabets = range('A', 'Z') @endphp
                                                @foreach ($step->stepable->option as $j => $option)
                                                    <input
                                                        name="questionsUpdate[{{ $key }}][options][{{ $j }}][choiceId]"
                                                        type="text" value="{{ $option->id }}" hidden>
                                                    <div class="option-container mb-4 flex sm:col-span-2"
                                                        id="option-container-{{ $key . '-' . $j }}">
                                                        <div
                                                            class="delete-option content-center items-center justify-center text-center">
                                                            <svg class="mr-2 h-7 w-7 max-md:h-5 max-md:w-5"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke="#C40C0C"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </div>
                                                        <div
                                                            class="mr-4 content-center items-center justify-center text-center">
                                                            <label
                                                                class="block rounded-full bg-green-500 px-[11px] py-[6px] text-sm text-white"
                                                                for="name">{{ $alphabets[$j] }}</label>
                                                        </div>
                                                        <input
                                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 placeholder-gray-400 focus:border-secondary focus:ring-secondary"
                                                            id="answer"
                                                            name="questionsUpdate[{{ $key }}][options][{{ $j }}][choice]"
                                                            type="text" value="{{ $option->option }}"
                                                            value="" placeholder="" required />
                                                    </div>
                                                @endforeach
                                                <div>
                                                    <button class="text-sm" id="add-option-btn" type="button">+
                                                        Add answer option</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="rounded-b-lg border border-gray-300 p-4">
                                                <div class="image">
                                                    @if ($step->stepable->getFirstMediaUrl('checkpoint'))
                                                        @include('components.edit-survey-image', [
                                                            'step' => $step,
                                                            'type' => 'checkpoint',
                                                            'key' => $key,
                                                        ])
                                                    @endif
                                                </div>
                                                <div class="p-4">
                                                    <div class="mb-4 block sm:col-span-2 sm:flex">
                                                        <label
                                                            class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                                                            for="checkpoint">Title</label>
                                                        <input
                                                            class="focus:ring-primary-600 focus:border-primary-600 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                                                            id="checkpoint"
                                                            name="questionsUpdate[{{ $key }}][checkpoint]"
                                                            type="text" value="{{ $step->stepable->title }}"
                                                            placeholder="Title checkpoint" required="">
                                                    </div>
                                                    <div class="block sm:col-span-2 sm:flex">
                                                        <label
                                                            class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                                                            for="description">Description</label>
                                                        <textarea
                                                            class="focus:ring-primary-500 focus:border-primary-500 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                                                            id="description" name="questionsUpdate[{{ $key }}][checkpointDescription]" rows="4"
                                                            placeholder="Your description here" required>{{ $step->stepable->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="">
                            <button
                                class="mb-4 me-2 mt-4 rounded-lg border border-primary px-5 py-2.5 text-center text-sm font-medium text-primary hover:bg-primary hover:text-white"
                                id="add-question-btn" type="button">+
                                Add question
                            </button>
                            <button
                                class="w-full rounded-lg bg-primary px-6 py-[11px] font-medium text-white hover:bg-secondary"
                                type="submit">
                                Update survey
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
<script>
    let currentStep = {!! json_encode($key) !!};
    const addImage = {!! json_encode(asset('assets/image/add-image.png')) !!};
</script>
<script src="{{ asset('js/surveyQuestionHandler.js') }}"></script>
