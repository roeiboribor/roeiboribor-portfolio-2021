<x-app-layout>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-green-500': 'bg-red-600' }}
                        fixed top-16 right-0">
        {{ session('status') == 'success'
        ? 'User has been successfully Update!'
        : 'An error has occured please try again!' }}
    </x-alert-toast>
    @endif

    <div class="container flex items-center justify-center pt-8 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-7/12 overflow-y-auto relative">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('settings.update',$user->id) }}">
                @method('PUT')
                @csrf
                <div>
                    <x-label for="first_name" :value="__('First Name')" />

                    <x-input id="first_name" class="block mt-1 w-full text-gray-800" type="text" name="first_name"
                        :value="$user->first_name ?? old('first_name')" placeholder="Enter First Name" required
                        autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="last_name" :value="__('Last Name')" />

                    <x-input id="last_name" class="block mt-1 w-full text-gray-800" type="text" name="last_name"
                        :value="$user->last_name ?? old('last_name')" placeholder="Enter Last Name" required
                        autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full text-gray-800" type="email" name="email"
                        :value="$user->email ?? old('email')" placeholder="Enter Email ex. first_last@test.com"
                        required />
                </div>
                <div class="mt-4 grid grid-cols-2 gap-4">
                    <div>
                        <x-label for="role" :value="__('Role')" />

                        <x-select id="role" class="block mt-1 w-full text-gray-800" type="text" name="role" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' :'' }}>{{ __('Admin') }}
                            </option>
                            <option value="tl" {{ $user->role == 'tl' ? 'selected' :'' }}>{{ __('TL') }}</option>
                            <option value="qa" {{ $user->role == 'qs' ? 'selected' :'' }}>{{ __('QA') }}</option>
                            <option value="sme" {{ $user->role == 'sme' ? 'selected' :'' }}>{{ __('SME') }}</option>
                            <option value="agent" {{ $user->role == 'agent' ? 'selected' :'' }}>{{ __('Agent') }}
                            </option>
                        </x-select>
                    </div>
                    <div>
                        <x-label for="is_active" :value="__('Active')" />

                        <x-select id="is_active" class="block mt-1 w-full text-gray-800" type="text" name="is_active"
                            required>
                            <option value="1" {{ $user->role == 1 ? 'selected' :'' }}>{{ __('Yes') }}</option>
                            <option value="0" {{ $user->role == 0 ? 'selected' :'' }}>{{ __('No') }}</option>
                        </x-select>
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button
                        class="ml-4 bg-green-500 hover:bg-green-400 transform active:scale-95 active:bg-green-600 ">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="modal">
        <x-modal>
            <x-slot name="title">
                {{ __('⚠️ Warning!!⚠️') }}
            </x-slot>

            <p class="text-center my-8">Are you sure you want to delete the project?</p>

            <x-slot name="buttons">
                {{-- --}}
                <form method="POST" :action="slug">
                    @csrf
                    @method('DELETE')
                    <x-button @click="showModal = !showModal"
                        class="bg-red-500 hover:bg-red-400 transform active:scale-95 active:bg-red-600 hover:shadow-md shadow">
                        {{ __('Delete') }}
                    </x-button>
                </form>
                <x-button @click="showModal = !showModal"
                    class="bg-smalt-200 hover:bg-smalt-100 transform active:scale-95 active:bg-smalt-300 hover:shadow-md shadow">
                    {{ __('Cancel') }}
                </x-button>
            </x-slot>
        </x-modal>
    </x-slot>

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