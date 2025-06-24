<x-landing-layout>
    <div class="bg-white text-black/50 ">
        <div class=" items-center justify-center">
            <div class="w-full">
                <div class="mt-8 max-md:mt-6 items-center">
                    <div class="justify-between relative flex">
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
                                    class="text-[54px] text-[#2D2D2D] max-md:hidden top-0 md:w-[620px] absolute max-md:text-4xl font-bold max-md:mx-2 max-md:mt-12 mt-[51px] ml-[50px] leading-[78px]">
                                    {{ $item->title }}</h1>
                                <p
                                    class="mt-[250px] ml-[50px] text-xl max-md:hidden max-md:mt-[150px] text-[#2D2D2D] max-md:mx-2 max-md:text-10">
                                    {{ $item->description }}</p>

                                <div class="max-md:contents hidden ">
                                    <div
                                        class="">
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
    </div>
</x-landing-layout>
