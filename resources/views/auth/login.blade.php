<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-[#003366] font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#003366] focus:border-[#003366]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="block text-[#003366] font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#003366] focus:border-[#003366]"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#003366] shadow-sm focus:ring-[#003366]" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-[#003366] hover:text-[#001f33] focus:outline-none focus:ring-2 focus:ring-[#003366]" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-4 bg-[#003366] hover:bg-[#001f33] text-white px-6 py-2 rounded-md">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
