<x-guest-layout>
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="block text-[#003366] font-semibold" />
                <x-text-input id="name" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#003366] focus:border-[#003366]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="block text-[#003366] font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#003366] focus:border-[#003366]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="block text-[#003366] font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#003366] focus:border-[#003366]" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-[#003366] font-semibold" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#003366] focus:border-[#003366]" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-[#003366] hover:text-[#001f33] focus:outline-none focus:ring-2 focus:ring-[#003366]" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4 bg-[#003366] hover:bg-[#001f33] text-white px-6 py-2 rounded-md">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>


