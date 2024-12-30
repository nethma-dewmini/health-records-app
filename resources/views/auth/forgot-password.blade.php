<x-guest-layout>
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
        <!-- Information Text -->
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="block text-[#003366] font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#003366] focus:border-[#003366]" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="ml-4 bg-[#003366] hover:bg-[#001f33] text-white px-6 py-2 rounded-md">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
