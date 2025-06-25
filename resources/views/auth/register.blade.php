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
                        <x-input-label for="name" :value="__('Name')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A8 8 0 1119.88 6.196 8 8 0 015.12 17.804z" />
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
                        <x-input-label for="email" :value="__('Email')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 12H8m0 0l4-4m-4 4l4 4" />
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
                        <x-input-label for="password" :value="__('Password')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 11c1.656 0 3 1.344 3 3s-1.344 3-3 3-3-1.344-3-3 1.344-3 3-3z" />
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
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 11c1.656 0 3 1.344 3 3s-1.344 3-3 3-3-1.344-3-3 1.344-3 3-3z" />
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
