<x-admin-layout>
    <div class="">
        <div class="flex items-center justify-between mb-6 max-md:mb-4">
            <div class="font-agrandir">
                <h1 class="text-2xl text-secondary font-semibold pb-2 max-md:text-lg max-md:pb-0">
                    Answer
                </h1>
            </div>
            <div class="text-right text-sm text-secondary font-medium max-md:text-xs" id="current-date">
            </div>
        </div>
        <div class="mb-8 pr-4 bg-primary flex items-center gap-3 rounded-lg">
            <div class="flex items-center">
                <img src="/assets/image/people-4.png" alt="People Icon" class="w-64 h-64 object-cover rounded-full" />
            </div>
            <div class="text-white">
                <h2 class="text-xl font-semibold mb-2">Survey Participation Overview</h2>
                <p class="text-sm leading-relaxed max-w-2xl">
                    This page lists all available surveys along with the number of participants. You can view detailed
                    participant information, including names and emails, by selecting a specific survey.
                </p>
            </div>
        </div>
        <div class="overflow-x-auto rounded-xl">
            <table class="w-full text-base text-left text-gray-500 rtl:text-right">
                <thead class="text-base text-white bg-secondary">
                    <tr>
                        <th scope="col" class="px-6 whitespace-nowrap py-3">
                            Survey Name
                        </th>
                        <th scope="col" class="text-center px-6">
                            Participant
                        </th>
                        <th scope="col" class="px-6 py-3 text-center justify-center w-40">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveys as $key => $survey)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-wrap survey-title">
                                {{ $survey->title }}
                            </th>
                            <td class="py-4 px-6 text-center">
                                {{ $survey->participant->count() }}
                            </td>
                            <td class="px-6 py-4 content-center w-40">
                                <div class="flex">
                                    <a href="{{ route('admin.answer.detail', ['survey' => $survey]) }}"
                                        class="text-white px-4 rounded-xl py-3 flex justify-center items-center gap-2 hover:bg-primary hover:bg-opacity-90 bg-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                        </svg>

                                        Participant
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

<script>
    function selectParticipantOnChange(key) {
        const selectedParticipant = document.getElementById(`participant-select-${key}`).value;
        const containerViewBtn = document.getElementById(`view-button-container-${key}`);

        containerViewBtn.querySelectorAll('a').forEach(viewBtn => {
            viewBtn.style.display = 'none';
            if (viewBtn.id === `view-button-${key}-${selectedParticipant}`) {
                viewBtn.style.display = 'flex';
            }
        });
    }
</script>
