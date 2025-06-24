<x-admin-layout>
    <div class="flex items-center justify-between mb-4 max-md:mb-4">
        <div class="font-agrandir">
            <h1 class="text-4xl text-secondary font-medium pb-2 max-md:text-lg max-md:pb-0">
                Dashboard
            </h1>
        </div>
        <div class="text-right text-sm text-secondary font-medium max-md:text-xs" id="current-date">
        </div>
    </div>
    <div class="mb-8 ps-12 bg-primary flex justify-between items-center rounded-lg">
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
                <img src="/assets/image/survey.png" alt="People Icon" class="w-36 h-36 object-cover" />
            </div>
        </div>
        <div class="w-1/2 rounded-lg bg-secondary px-12 py-2 text-left flex justify-between items-center">
            <div>
                <p class="text-xl font-semibold">Total Participants</p>
                <p>{{ $totalParticipants }}</p>
            </div>

            <div class="flex items-center">
                <img src="/assets/image/participants.png" alt="People Icon" class="w-full h-32 object-cover" />
            </div>
        </div>
    </div>


</x-admin-layout>
