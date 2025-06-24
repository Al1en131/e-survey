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
                <nav class="flex flex-col space-y-6">
                    <a href="{{ route('admin.index') }}"
                        class="{{ request()->is('admin/dashboard') ? 'text-white font-semibold border-l-4 pl-2 border-white' : 'text-white' }} hover:text-white">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.survey.index') }}"
                        class="{{ request()->is('admin/survey/*') ? 'text-white font-semibold border-l-4 pl-2 border-white' : 'text-white' }} hover:text-white">
                        Survey
                    </a>
                    <a href="{{ route('admin.answer.index') }}"
                        class="{{ request()->is('admin/answer/*') ? 'text-white font-semibold border-l-4 pl-2 border-white' : 'text-white' }} hover:text-white">
                        Answer
                    </a>
                    <a href="{{ route('admin.management.index') }}"
                        class="{{ request()->is('admin/management') ? 'text-white font-semibold border-l-4 pl-2 border-white' : 'text-white' }} hover:text-white">
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
                        class="block text-sm text-gray-300 hover:text-red-400 mt-2">Logout</a>
                </form>
            </div>
        </div>
    </aside>
</div>
