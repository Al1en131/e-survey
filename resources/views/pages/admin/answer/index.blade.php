<x-admin-layout>
    <div class="max-md:px-6 lg:px-16 py-9 max-md:py-6">
        <div class="flex items-center justify-between mb-6 max-md:mb-4">
            <div class="font-Poppins">
                <h1 class=" text-4xl text-[#475569] font-medium pb-2 max-md:text-lg max-md:pb-0">Answer Data
                </h1>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                <thead class="text-xs text-white uppercase bg-secondary">
                    <tr>
                        <th scope="col" class="px-6 py-3">
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
                        <tr
                            class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-wrap survey-title">
                                {{ $survey->title }}
                            </th>
                            <td class="py-4 px-6 text-center">
                                {{ $survey->participant->count() }}
                            </td>
                            <td class="px-6 py-4 content-center w-40">
                                <div class="flex">
                                    <a href="{{ route('admin.answer.detail', ['survey' => $survey]) }}"
                                        class="text-white px-4 rounded-xl py-3 hover:bg-primary hover:bg-opacity-80 bg-primary">
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
