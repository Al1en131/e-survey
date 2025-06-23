<x-admin-layout>
    <div class="max-md:px-6 lg:px-16 py-9 max-md:py-6">
        <div class="items-center justify-between mb-6 max-md:mb-4 max-md:contents hidden">
            <div class="flex items-center gap-3">
                <div class="rounded-lg bg-primary p-[5px]">
                    <a class="" href="{{ route('admin.answer.index') }}">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                    </a>
                </div>
                <h1 class=" text-4xl text-[#475569] font-medium pb-2 max-md:text-lg max-md:pb-0 ">Participant Data
                </h1>
            </div>
            <div class="font-Poppins">
                <h5 class="text-lg text-slate-500 max-md:text-base my-2 mb-6">{{ $survey->title }}</h5>
            </div>
        </div>
        <div class="flex items-center justify-between mb-6 max-md:mb-4 max-md:hidden">
            <div class="font-Poppins">
                <h1 class=" text-4xl text-[#475569] font-medium pb-2 max-md:text-lg max-md:pb-0">Participant Data
                </h1>
                <h5 class="text-lg text-slate-500">{{ $survey->title }}</h5>
            </div>
            <div class="flex items-center justify-end">
                <div class="rounded-lg bg-primary p-2">
                    <a class="" href="{{ route('admin.answer.index') }}">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                <thead class="text-xs text-white uppercase bg-secondary">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        {{-- email --}}
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" width="15%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $key => $participant)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-wrap survey-title">
                                {{ $participant->user->name }}
                            </th>
                            <td class="px-6 py-4">
                                </p> {{ $participant->user->email }}</p>
                            </td>
                            <td width="15%" class="px-6 py-4 content-center">
                                <div>
                                    <a href="{{ route('admin.answer.participant', ['survey' => $participant->id, 'participant' => $participant->id]) }}"
                                        class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg><span>View</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
