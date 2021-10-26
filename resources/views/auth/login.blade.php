<x-guest-layout>
    <div class="fixed top-4 right-4">
        <x-darkmode-toggle-button />
    </div>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full text-smalt-700" type="email" name="email"
                    :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full text-smalt-700" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-smalt-600 shadow-sm focus:border-smalt-300 focus:ring focus:ring-smalt-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button
                    class="ml-3 bg-smalt-300 hover:bg-smalt-200 transform active:scale-95 active:bg-smalt-400 shadow">
                    {{ __('Log in') }}
                </x-button>
                <x-a-button :href="route('home')" class=" ml-3 bg-yellow-500 hover:bg-yellow-400 transform active:scale-95
                    active:bg-yellow-600 shadow">
                    {{ __('Back') }}
                </x-a-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>