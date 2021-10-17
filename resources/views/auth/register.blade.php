<x-guest-layout>
    <div class="fixed top-4 right-4">
        <x-darkmode-toggle-button />
    </div>
    <x-auth-card>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full text-smalt-600" type="text" name="first_name"
                    :value="old('first_name')" placeholder="Enter First Name" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full text-smalt-600" type="text" name="last_name"
                    :value="old('last_name')" placeholder="Enter Last Name" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full text-smalt-600" type="email" name="email"
                    :value="old('email')" placeholder="Enter Email ex. first_last@test.com" required />
            </div>
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full text-smalt-600" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full text-smalt-600" type="password"
                    name="password_confirmation" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4 bg-smalt-300 hover:bg-smalt-200 transform active:scale-95 active:bg-smalt-400 ">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>