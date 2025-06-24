<!-- SIDEBAR -->
<div x-data="{ sidebarOpen: false }">
    <!-- Toggle button (visible on small screens) -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="fixed z-50 top-4 left-4 text-white bg-primary p-2 rounded md:hidden">
        <!-- Hamburger icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Overlay (for mobile) -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-40 z-40 md:hidden">
    </div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 z-50 w-64 h-screen bg-secondary dark:bg-secondary border-r border-gray-200 dark:border-gray-700 transform transition-transform duration-300 ease-in-out md:translate-x-0">
        <div class="h-full flex flex-col justify-between px-4 py-4">

            <!-- LOGO SECTION -->
            <div>
                <a href="{{ route('admin.index') }}" class="flex items-center mb-6">
                    @foreach ($management as $item)
                        @if ($item->hasMedia('management'))
                            <img class="h-12 w-auto" src="{{ $item->getFirstMediaUrl('management') }}" alt="Logo" />
                        @else
                            <img class="h-12 w-auto" src="{{ asset('assets/image/TNYI.png') }}" alt="Default Logo" />
                        @endif
                    @endforeach
                </a>

                <!-- NAVIGATION LINKS -->
                <nav class="flex flex-col space-y-4">
                    <a href="{{ route('admin.index') }}"
                        class="{{ request()->is('admin/dashboard') ? 'text-white font-semibold border-l-4 pl-2 border-white bg-white/10' : 'text-white' }} hover:text-white flex items-center p-2 gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>

                        Dashboard
                    </a>
                    <a href="{{ route('admin.survey.index') }}"
                        class="{{ request()->is('admin/survey/*') ? 'text-white font-semibold border-l-4 pl-2 border-white bg-white/10' : 'text-white' }} hover:text-white flex items-center p-2 gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        Survey
                    </a>
                    <a href="{{ route('admin.answer.index') }}"
                        class="{{ request()->is('admin/answer/*') ? 'text-white font-semibold border-l-4 pl-2 border-white bg-white/10' : 'text-white' }} hover:text-white flex items-center p-2 gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                        </svg>

                        Answer
                    </a>
                    <a href="{{ route('admin.management.index') }}"
                        class="{{ request()->is('admin/management') ? 'text-white font-semibold border-l-4 pl-2 border-white bg-white/10' : 'text-white' }} hover:text-white flex items-center p-2 gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                        </svg>
                        Setting
                    </a>
                </nav>
            </div>

            <!-- USER DROPDOWN -->
            <div class="mt-8">
                <div class="flex items-center space-x-3">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="User photo">
                    <div>
                        <p class="text-white text-sm">{{ auth()->user()->name }}</p>
                        <p class="text-gray-300 text-xs truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block text-sm text-red-400 mt-2 flex items-center gap-3"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                        Logout</a>
                </form>
            </div>
        </div>
    </aside>
</div>
