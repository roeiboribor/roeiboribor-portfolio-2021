<x-app-layout>
    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">My Profile</h1>
        </div>
    </x-slot>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-green-500': 'bg-red-600' }}
                        fixed top-16 right-0">
        {{ session('status') == 'success'
        ? 'Password has been successfully Updated!'
        : 'An error has occured please try again!' }}
    </x-alert-toast>
    @endif

    <div class="container flex items-center justify-center pt-8 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-7/12 overflow-y-auto relative">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('settings.profile.update') }}">
                @method('PUT')
                @csrf
                <fieldset>
                    <legend class="font-bold text-xl">Change Password</legend>
                    <div class="mt-4">
                        <x-label for="password" :value="__('New Password')" />
                        <x-input id="password" class="block mt-1 w-full text-gray-800" type="password" name="password"
                            required autofocus />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button
                            class="ml-4 bg-green-500 hover:bg-green-400 transform active:scale-95 active:bg-green-600 ">
                            {{ __('Confirm') }}
                        </x-button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const toggleExpand = (el) => {
                el.classList.toggle('line-clamp-3');
            }

            const hideToast = () => {
                const alertToast = document.querySelector('.alert-toast');
                alertToast.classList.add('animate-fade-out-right');
            }
        </script>
    </x-slot>
</x-app-layout>