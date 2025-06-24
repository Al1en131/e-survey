<nav class="bg-secondary border-gray-200 dark:bg-secondary sticky">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto max-lg:px-6 lg:px-16 py-2">
        <div class="shrink-0 flex items-center">
            <a href="{{ route('admin.index') }}">
                @foreach ($management as $item)
                    @if ($item->hasmedia('management'))
                        <img class="block h-14 w-auto fill-current text-gray-800"
                            src="{{ $item->getFirstMediaUrl('management') }}" />
                    @else
                        <img class="block h-14 w-auto fill-current text-gray-800"
                            src="{{ asset('assets/image/TNYI.png') }}" />
                    @endif
                @endforeach
            </a>
        </div>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('admin.management.index') }}" class="text-white mr-4 max-md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                    <span
                        class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center py-2 justify-center text-sm text-white hover:text-primary md:hidden"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4  rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('admin.index') }}"
                        class="{{ request()->is('admin/dashboard') ? 'text-primary font-semibold border-b-2 border-b-primary' : 'text-white' }} block py-2 px-3 md:p-0 hover:text-primary"
                        aria-current="page">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.survey.index') }}"
                        class="{{ request()->is('admin/survey/*') ? 'text-primary font-semibold border-b-2 border-b-primary' : 'text-white' }} block py-2 px-3 md:p-0 hover:text-primary">Survey</a>
                </li>
                <li>
                    <a href="{{ route('admin.answer.index') }}"
                        class="{{ request()->is('admin/answer/*') ? 'text-primary font-semibold border-b-2 border-b-primary' : 'text-white' }} block py-2 px-3 md:p-0 dark:text-white hover:text-primary">Answer</a>
                </li>
                <li class="md:hidden">
                    <a href="{{ route('admin.management.index') }}"
                        class="{{ request()->is('admin/management') ? 'text-primary font-semibold border-b-2 border-b-primary' : 'text-white' }} block py-2 px-3 md:p-0 hover:text-primary">Setting</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
