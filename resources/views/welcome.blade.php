<x-landing-layout>
    <div class="bg-white text-black/50 ">
        <div class=" items-center justify-center sm:px-6 lg:px-14">
            <div class="w-full">
                <div class="mt-8 max-md:mt-6 items-center">
                    <div class="justify-between items-center relative flex">
                        <div class="max-md:mt-4 max-md:mb-10">
                            <div class="absolute max-lg:hidden"><svg width="690" height="247" viewBox="0 0 651 247"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="15" y="13" width="645" height="221" stroke="#333333"
                                        stroke-width="2" />
                                    <rect x="1" y="1" width="22" height="22" fill="#EFC356" stroke="#333333"
                                        stroke-width="2" />
                                    <rect x="1" y="224" width="22" height="22" fill="#EFC356" stroke="#333333"
                                        stroke-width="2" />
                                    <rect x="648" y="224" width="22" height="22" fill="#EFC356" stroke="#333333"
                                        stroke-width="2" />
                                    <rect x="648" y="1" width="22" height="22" fill="#EFC356" stroke="#333333"
                                        stroke-width="2" />
                                </svg>
                            </div>
                            @foreach ($management as $item)
                                <h1
                                    class="text-[54px] text-[#2D2D2D] max-md:hidden top-4 md:w-[620px] absolute max-md:text-4xl font-bold max-md:mx-2 max-md:mt-12 mt-[51px] ml-[50px] leading-[78px]">
                                    {{ $item->title }}</h1>
                                <p
                                    class="mt-[250px] ml-[50px] text-xl max-md:hidden max-md:mt-[150px] text-[#2D2D2D] max-md:mx-2 max-md:text-10">
                                    {{ $item->description }}</p>

                                <div class="max-md:contents hidden ">
                                    <div class="">
                                        <h1
                                            class="text-xl text-[#2D2D2D] text-center md:w-[620px] max-md:text-4xl font-bold leading-[78px]">
                                            {{ $item->title }}</h1>
                                        <p class=" text-xl max-md:mt-8 text-[#2D2D2D] px-4 text-center max-md:text-10">
                                            {{ $item->description }}</p>
                                        <div class="sm:justify-center">
                                            <a href="{{ route('login') }}" class="">
                                                <button
                                                    class="py-4 md:ml-[50px] mt-12 px-10 flex max-md:mt-8 max-md:px-5 max-md:mx-auto max-md:text-sm rounded-[20px] gap-2 items-center hover:bg-[#3b749c] bg-secondary justify-center text-white max-md:shadow-[5px_5px_0px_0px_rgb(39,82,121)] max-md:border max-md:border-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 20 20" fill="none">
                                                        <path
                                                            d="M7.35156 14.4219C6.46094 17.0703 2.92969 17.0703 2.92969 17.0703C2.92969 17.0703 2.92969 13.5391 5.57813 12.6484"
                                                            stroke="#F8F9FF" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M15.3047 8.23437L10 13.5391L6.46094 10L11.7656 4.69531C13.7734 2.6875 15.7812 2.71094 16.6406 2.83594C16.7732 2.85363 16.8963 2.91447 16.9909 3.00907C17.0855 3.10367 17.1464 3.22677 17.1641 3.35937C17.2891 4.21875 17.3125 6.22656 15.3047 8.23437Z"
                                                            stroke="#F8F9FF" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M14.4219 9.11719V14.1641C14.4195 14.3289 14.3521 14.4862 14.2344 14.6016L11.7109 17.1328C11.6309 17.2128 11.5306 17.2695 11.4208 17.297C11.3111 17.3244 11.1959 17.3215 11.0876 17.2886C10.9794 17.2558 10.882 17.1941 10.8061 17.1102C10.7301 17.0264 10.6783 16.9235 10.6562 16.8125L10 13.5391"
                                                            stroke="#F8F9FF" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M10.883 5.57812H5.83612C5.67127 5.58047 5.51402 5.64787 5.39862 5.76563L2.86737 8.28906C2.78741 8.36912 2.73068 8.46939 2.70323 8.57916C2.67579 8.68894 2.67866 8.8041 2.71154 8.91237C2.74442 9.02064 2.80608 9.11796 2.88994 9.19393C2.9738 9.2699 3.07671 9.32168 3.18769 9.34375L6.46112 10"
                                                            stroke="#F8F9FF" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg><span>Get Started</span></button>
                                            </a>
                                        </div>
                                        <div class="w-full flex justify-center mt-16">
                                            <img class="h-32" src="{{ asset('assets/image/landing-page.png') }}" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="sm:justify-center">
                                <a href="{{ route('login') }}" class="max-md:hidden">
                                    <button
                                        class="py-4 md:ml-[50px] mt-12 px-10 flex max-md:mt-8 max-md:px-5 max-md:mx-auto max-md:text-sm rounded-[20px] gap-2 items-center hover:bg-primary bg-secondary justify-center text-white hover:border hover:border-secondary hover:text-secondary max-md:shadow-[5px_5px_0px_0px_rgb(39,82,121)] max-md:border max-md:border-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M7.35156 14.4219C6.46094 17.0703 2.92969 17.0703 2.92969 17.0703C2.92969 17.0703 2.92969 13.5391 5.57813 12.6484"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M15.3047 8.23437L10 13.5391L6.46094 10L11.7656 4.69531C13.7734 2.6875 15.7812 2.71094 16.6406 2.83594C16.7732 2.85363 16.8963 2.91447 16.9909 3.00907C17.0855 3.10367 17.1464 3.22677 17.1641 3.35937C17.2891 4.21875 17.3125 6.22656 15.3047 8.23437Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M14.4219 9.11719V14.1641C14.4195 14.3289 14.3521 14.4862 14.2344 14.6016L11.7109 17.1328C11.6309 17.2128 11.5306 17.2695 11.4208 17.297C11.3111 17.3244 11.1959 17.3215 11.0876 17.2886C10.9794 17.2558 10.882 17.1941 10.8061 17.1102C10.7301 17.0264 10.6783 16.9235 10.6562 16.8125L10 13.5391"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M10.883 5.57812H5.83612C5.67127 5.58047 5.51402 5.64787 5.39862 5.76563L2.86737 8.28906C2.78741 8.36912 2.73068 8.46939 2.70323 8.57916C2.67579 8.68894 2.67866 8.8041 2.71154 8.91237C2.74442 9.02064 2.80608 9.11796 2.88994 9.19393C2.9738 9.2699 3.07671 9.32168 3.18769 9.34375L6.46112 10"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg><span>Get Started</span></button>
                                </a>
                            </div>
                        </div>
                        <img class="w-[520px] h-[460px] max-lg:hidden"
                            src="{{ asset('assets/image/landing-page.png') }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-primary p-14 mb-8 mt-16 w-full">
            <div class="flex justify-center items-center gap-4 text-white">
                <p class="text-3xl font-semibold pr-2">All the amazing surveys start here, ready to shape better decisions
                </p>

                <div class="border-r border-r-gray-300 pr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                    </svg>
                    <p class="text-sm">Empowering businesses to create meaningful surveys with ease.</p>
                </div>

                <div class="pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>

                    <p class="text-sm">Collect responses, analyze results, and grow smarter decisions.</p>
                </div>
            </div>
        </div>
        <div class="mt-16 mb-8 px-14">
            <p class="mb-6 text-secondary text-4xl text-center font-bold">How to Create Your Survey</p>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-white mt-10">
                <!-- Step 1 -->
                <div class="bg-primary p-6 rounded-lg shadow-lg">
                    <div class="text-4xl font-bold text-white mb-2">01</div>
                    <h3 class="text-lg font-semibold mb-2">Set Up Your Survey</h3>
                    <p class="text-sm text-gray-300">Start by giving your survey a title and description. Define the
                        purpose and target participants to ensure clarity and focus.</p>
                </div>

                <!-- Step 2 -->
                <div class="bg-primary p-6 rounded-lg shadow-lg">
                    <div class="text-4xl font-bold text-white mb-2">02</div>
                    <h3 class="text-lg font-semibold mb-2">Add Your Questions</h3>
                    <p class="text-sm text-gray-300">Insert different types of questions multiple choice, ratings,
                        short answers based on the information you need to collect.</p>
                </div>

                <!-- Step 3 -->
                <div class="bg-primary p-6 rounded-lg shadow-lg">
                    <div class="text-4xl font-bold text-white mb-2">03</div>
                    <h3 class="text-lg font-semibold mb-2">Customize Survey Settings</h3>
                    <p class="text-sm text-gray-300">Adjust survey flow, enable anonymity, set deadlines, and add logic
                        to personalize the participant experience.</p>
                </div>

                <!-- Step 4 -->
                <div class="bg-primary p-6 rounded-lg shadow-lg">
                    <div class="text-4xl font-bold text-white mb-2">04</div>
                    <h3 class="text-lg font-semibold mb-2">Publish & Share</h3>
                    <p class="text-sm text-gray-300">Once ready, publish your survey and share the link. Track
                        responses in real-time and get insights instantly.</p>
                </div>
            </div>

        </div>

    </div>
</x-landing-layout>
