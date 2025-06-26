<x-guest-layout>
    <x-auth-session-status class="" :status="session('status')" />

    <div class="min-w-screen min-h-screen flex items-center justify-center bg-gray-100 text-gray-800">
        <div class="bg-white shadow-xl items-center rounded-xl overflow-hidden flex w-full max-w-6xl">
            <!-- Left Image Section -->
            <div class="hidden md:flex w-1/2 bg-primary items-center justify-center">
                <img src="/assets/image/peoples.svg" alt="People Icon" class="w-full h-full object-cover" />
            </div>

            <!-- Right Form Section -->
            <div class="w-full md:w-1/2 p-10">
                <div class="text-center mb-14">
                    <h1 class="text-4xl font-bold text-gray-800">Welcome Back</h1>
                    <p class="text-gray-500 mt-2">Please login to your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    @if (session('error'))
                        <p class="text-red-500 text-sm font-semibold text-center">{{ session('error') }}</p>
                    @endif

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
                                :value="old('email')" required autocomplete="email" />
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
                                required autocomplete="current-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button
                            class="w-full bg-primary text-white font-semibold py-2 rounded-md hover:bg-primary-dark transition duration-200">
                            Login
                        </button>
                    </div>

                    <!-- Optional: Forgot password -->

                </form>
                <div class="text-sm text-center mt-14">
                    <a href="{{ route('password.request') }}" class="text-primary hover:underline">Forgot your
                        password?</a>
                </div>
                <div class="text-sm text-center">
                    <span>Belum punya akun?</span>
                    <a href="{{ route('register') }}" class="text-primary hover:underline">Daftar di sini</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
