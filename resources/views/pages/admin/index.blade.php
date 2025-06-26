<x-admin-layout>
    <div class="flex items-center justify-between mb-4 max-md:mb-4">
        <div class="font-agrandir">
            <h1 class="text-2xl text-secondary font-semibold pb-2 max-md:text-lg max-md:pb-0">
                Dashboard
            </h1>
        </div>
        <div class="text-right text-sm text-secondary font-medium max-md:text-xs" id="current-date">
        </div>
    </div>
    <div class="mb-4 ps-12 bg-primary flex justify-between items-center rounded-lg">
        <div class="text-white">
            <h2 class="text-xl font-semibold mb-2">Admin Dashboard</h2>
            <p class="text-sm leading-relaxed max-w-2xl">
                Welcome to your admin dashboard. Here you can monitor the overall activity of the platform including the
                total number of users, surveys, and participants. Use this page to navigate quickly to key sections and
                manage the system efficiently.
            </p>
        </div>
        <div class="flex items-center">
            <img src="/assets/image/people-2.png" alt="People Icon" class="w-64 h-64 object-cover" />
        </div>
    </div>
    <div class="flex gap-4 text-white">
        <div class="w-1/2 rounded-lg bg-secondary px-12 py-2 text-left flex justify-between items-center">
            <div>
                <p class="text-xl font-semibold">Total Surveys</p>
                <p>{{ $totalSurveys }}</p>
            </div>
            <div class="flex items-center">
                <img src="/assets/image/file.png" alt="People Icon" class="w-full h-32 object-cover" />
            </div>
        </div>
        <div class="w-1/2 rounded-lg bg-secondary px-12 py-2 text-left flex justify-between items-center">
            <div>
                <p class="text-xl font-semibold">Total Participants</p>
                <p>{{ $totalParticipants }}</p>
            </div>

            <div class="flex items-center">
                <img src="/assets/image/boy.png" alt="People Icon" class="w-full h-32 object-cover" />
            </div>
        </div>
    </div>
    <div class="flex gap-4 text-white mt-4">
        <div class="w-1/3 rounded-lg bg-secondary px-12 py-6 text-left flex justify-between items-center">
            <div>
                <p class="text-lg font-semibold">Surveys Created by Users</p>
                <p class="text-sm mt-1">A collection of forms made for research, feedback, and insights</p>
            </div>
            {{-- <div class="flex items-center">
                <img src="/assets/image/file.png" alt="Survey Icon" class="w-full h-32 object-cover" />
            </div> --}}
        </div>
        <div class="w-1/3 rounded-lg bg-secondary px-12 py-6 text-left flex justify-between items-center">
            <div>
                <p class="text-lg font-semibold">User Participation</p>
                <p class="text-sm mt-1">Represents engagement and willingness to share experiences</p>
            </div>
            {{-- <div class="flex items-center">
                <img src="/assets/image/boy.png" alt="Participant Icon" class="w-full h-32 object-cover" />
            </div> --}}
        </div>
        <div class="w-1/3 rounded-lg bg-secondary px-12 py-6 text-left flex justify-between items-center">
            <div>
                <p class="text-lg font-semibold">Collected Responses</p>
                <p class="text-sm mt-1">Valuable inputs that help drive informed decisions</p>
            </div>
            {{-- <div class="flex items-center">
                <img src="/assets/image/boy.png" alt="Respondent Icon" class="w-full h-32 object-cover" />
            </div> --}}
        </div>
    </div>


    <div class="relative overflow-x-auto mt-4 shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-white bg-primary">
                Top 5 Surveys
                <p class="mt-1 text-sm font-normal text-white">
                    A list of recent or most participated surveys submitted by users.
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Start Date</th>
                    <th scope="col" class="px-6 py-3">End Date</th>                </tr>
            </thead>
            <tbody>
                @forelse ($topSurveys as $survey)
                    <tr class="bg-primary border-b text-white">
                        <th scope="row"
                            class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $survey->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Illuminate\Support\Str::limit($survey->description, 50) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($survey->start_date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($survey->end_date)->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500 dark:text-gray-400">
                            No surveys available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>




</x-admin-layout>
