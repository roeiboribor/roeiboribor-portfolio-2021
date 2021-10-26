<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Settings</h1>
        </div>
    </x-slot>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-green-600': 'bg-red-600' }}
                    fixed top-16 right-0">
        {{ session('status') == 'success'
        ? 'Password has been successfully updated! 😄'
        : session('message').' 😞' }}
    </x-alert-toast>
    @endif

    <div x-data="{isLoader: false}"
        class="container flex items-center justify-center pt-4 animate__animated animate__bounceInDown">
        <div class="relative dashboard-card w-7/12 overflow-y-auto">
            @if ($errors->any())
            <div class="font-medium text-red-600 dark:text-red-500 mt-4 text-center">
                {{ __('Please follow the password creation rules! 👇👇👇') }}
            </div>
            @endif

            {{-- LOADING ICON --}}
            <div :class="{'flex': isLoader,'hidden': ! isLoader}"
                class="hidden overlay bg-black bg-opacity-30 z-10 items-center justify-center">
                <i class='bx bx-loader-circle animate-spin text-9xl'></i>
            </div>

            <form method="POST" action="{{ route('settings.password.store') }}">
                @csrf
                <div x-data="{isPassword: false}" class="mt-4">
                    <div>
                        <p class="text-xl font-bold text-center mb-2">The new password must contain at least one:</p>
                        <ul class="list-disc list-inside lg:w-5/6 w-full mx-auto opacity-80">
                            <li>Letter uppercase & lowercase [A-Z, a-b]</li>
                            <li>Special character [/$@!*] etc...</li>
                            <li>Number</li>
                            <li>Minimum of 8</li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <x-label for="old_password" :value="__('Old Password')" />

                        <x-input id="old_password" class="block mt-1 w-full text-smalt-700" type="password"
                            name="old_password" placeholder="Enter old password" required />
                    </div>
                    <div class="mt-3">
                        <x-label for="new_password" :value="__('New Password')" />
                        <div class="relative">
                            <x-input id="new_password" class="block mt-1 w-full text-smalt-700" type="password"
                                name="new_password" :value="old('new_password')" placeholder="Enter new password"
                                required />
                            <span @click="{isPassword = !isPassword}"
                                class="show-password absolute top-2 right-2 cursor-pointer">
                                <i :class="{'bx-show': !isPassword, 'bx-hide': isPassword}"
                                    class='bx bx-show transition duration-300 opacity-50 hover:opacity-100 text-smalt-700 text-3xl'></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-8">
                        <x-button @click="isLoader = validateForm()"
                            class="ml-3 bg-green-500 hover:bg-green-400 transform active:scale-95 active:bg-green-600 hover:shadow-md shadow">
                            {{ __('Save Password') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const newPassword = document.querySelector('#new_password');
            const oldPassword = document.querySelector('#old_password');
            const showPassword = document.querySelector('.show-password');
            
            const validateForm = () => {
                let isLoader = false;
                isLoader = (newPassword.value == '' || oldPassword.value == '') ? false : true;

                return isLoader;
            }

            showPassword.addEventListener('click', () => {
                tooglePassword(newPassword);
            })

            const tooglePassword = (el) => {
                if (el.type === "password") {
                    el.type = "text";
                } else {
                    el.type = "password";
                }
            }

            const hideToast = () => {
                const alertToast = document.querySelector('.alert-toast');
                alertToast.classList.add('animate-fade-out-right');
            }

            validateForm();
        </script>
    </x-slot>
</x-app-layout>