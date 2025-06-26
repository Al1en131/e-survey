<x-guest-layout>
    <div class="min-w-screen min-h-screen flex items-center justify-center bg-gray-100 text-gray-800">
        <div class="bg-white shadow-xl rounded-xl overflow-hidden flex w-full max-w-6xl">
            <!-- Left Image Section -->
            <div class="hidden md:flex w-1/2 bg-primary items-center justify-center">
                <img src="/assets/image/peoples.svg" alt="People Icon" class="w-full h-full object-cover" />
            </div>

            <!-- Right Form Section -->
            <div class="w-full md:w-1/2 p-10">
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-bold text-gray-800">Create an Account</h1>
                    <p class="text-gray-500 mt-2">Please fill in your details</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    @if (session('error'))
                        <p class="text-red-500 text-sm font-semibold text-center">{{ session('error') }}</p>
                    @endif

                    <!-- Name -->
                    <div>
                        <x-input-label class="mb-1" for="name" :value="__('Name')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>

                            </span>
                            <x-text-input id="name" name="name" type="text"
                                class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:outline-none"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label class="mb-1" for="email" :value="__('Email')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                </svg>
                            </span>
                            <x-text-input id="email" name="email" type="email"
                                class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:outline-none"
                                :value="old('email')" required autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label class="mb-1" for="password" :value="__('Password')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </span>
                            <x-text-input id="password" name="password" type="password"
                                class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:outline-none"
                                required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label class="mb-1" for="password_confirmation" :value="__('Confirm Password')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                </svg>

                            </span>
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:outline-none"
                                required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Register Button -->
                    <div>
                        <button
                            class="w-full bg-primary text-white font-semibold py-2 rounded-md hover:bg-primary-dark transition duration-200">
                            Register
                        </button>
                    </div>

                    <!-- Optional: Login link -->
                    <div class="text-sm text-center">
                        <span class="text-gray-500">Already have an account?</span>
                        <a href="{{ route('login') }}" class="text-primary hover:underline">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
