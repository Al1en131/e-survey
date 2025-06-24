<x-admin-layout>
    <div class="flex flex-col min-h-full py-9 max-md:py-6">
        <div class="max-w-full flex-grow">
            <div class="flex justify-between items-center mb-6 max-md:mb-4">
                <div class="font-Poppins">
                    <h1 class="text-4xl text-secondery font-medium pb-2 max-md:text-lg max-md:pb-0">Survey Data</h1>
                </div>
                <div class="hidden md:justify-end w-1/3 max-md:contents items-center">
                    <a href="{{ route('admin.survey.create') }}">
                        <button type="button" class="focus:outline-none text-white flex items-center bg-primary hover:bg-secondary rounded-lg text-sm px-8 py-2.5 max-md:px-4 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg> <span>Add survey</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="rounded-lg mb-7 max-md:mb-4 flex justify-between items-center">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1 items-center w-full">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="block px-5 ps-10 text-sm py-2.5 text-gray-900 border border-gray-400 rounded-lg w-full bg-gray-50 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Search for items">
                </div>
                <div class="md:flex md:justify-end w-1/4 md:ml-2 max-md:hidden">
                    <a href="{{ route('admin.survey.create') }}">
                        <button type="button" class="focus:outline-none text-white flex items-center bg-primary hover:bg-secondary rounded-lg text-sm px-12 py-2.5 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg> <span>Add survey</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="text-gray-900">
                <div class="relative sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-base text-white bg-secondary dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Survey Name</th>
                                    <th scope="col" class="px-6 py-3">Start Date</th>
                                    <th scope="col" class="px-6 py-3">End Date</th>
                                    <th scope="col" class="px-6 py-3 text-center w-12">Link</th>
                                    <th scope="col" class="px-6 py-3 text-center w-10">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-wrap font-normal survey-title">{{ $survey->title }}</th>
                                        <td class="px-6 py-4">{{ date('d M Y', strtotime($survey->start_date)) }}</td>
                                        <td class="px-6 py-4">{{ date('d M Y', strtotime($survey->end_date)) }}</td>
                                        <td class="px-6 py-4 w-12 content-center">
                                            <a href="#" class="bg-primary px-4 py-3 flex gap-2 items-center text-white rounded-lg text-nowrap copy-button w-full" data-slug="{{ config('app.url') . '/' . 'survey/' . $survey->slug }}">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                                    </svg>
                                                </span>
                                                Share
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 content-center w-10">
                                            <div class="w-full flex justify-around">
                                                <a href="{{ route('admin.survey.edit', ['id' => $survey->id]) }}" class="text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="delete text-red-600" data-id="{{ $survey->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="error-message" class="text-red-600 hidden mt-3 text-center">Enter the name of the survey correctly</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
