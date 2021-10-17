<x-app-layout>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-red-400': 'bg-red-600' }}
                        fixed top-16 right-0">
        {{ session('status') == 'success'
        ? 'Project has been successfully Deleted!'
        : 'An error has occured please try again!' }}
    </x-alert-toast>
    @endif

    <div class="container flex items-center justify-center pt-8 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-full relative">
            <form method="GET" action="{{ route('settings.index') }}">
                <div class="relative w-4/12 flex items-center mx-auto">
                    <x-input id="search" class="block ml-1 w-full text-smalt-700 pr-16" type="search" name="search"
                        :value="old('search')" placeholder="search..." />
                    <x-button
                        class="absolute right-0.5 bg-smalt-300 hover:bg-smalt-200 transform active:scale-95 active:bg-smalt-400">
                        <i class='bx bx-search-alt text-xl'></i>
                    </x-button>
                </div>
            </form>

            <div class="absolute top-4 right-8">
                <x-a-button :href="route('register')"
                    class="bg-green-500 hover:shadow-lg transform duration-300 active:scale-95 active:bg-green-600 shadow">
                    <i class='bx bx-user-plus text-xl mr-3'></i> New User
                </x-a-button>
            </div>
            <div class="absolute top-4 left-8">
                <h2 class="text-3xl">
                    <i class='bx bx-group'></i> {{ $users->count() }}
                </h2>
            </div>

            <div class="mt-8 mb-4">
                <table class="table-fixed w-full rounded">
                    <thead class="bg-gradient-to-r from-green-400 to-blue-500 shadow-md">
                        <tr>
                            <th class="border-r-2 w-2/12">First Name</th>
                            <th class="border-r-2 w-2/12">Last Name</th>
                            <th class="border-r-2 w-2/12">Email</th>
                            <th class="border-r-2 w-2/12">Role</th>
                            <th class="border-r-2 w-2/12">Active</th>
                            <th class="w-2/12">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="border-b-2 h-14">
                            <td class="p-2 text-center">
                                {{ $user->first_name }}
                            </td>
                            <td class="p-2 text-center">
                                {{ $user->last_name }}
                            </td>
                            <td class="p-2 text-center">
                                {{ $user->email }}
                            </td>
                            <td class="p-2 text-center">
                                {{ $user->role }}
                            </td>
                            <td class="p-2 text-center">
                                {{ $user->is_active == 1 ? 'Yes':'No'}}
                            </td>
                            <td class="relative">
                                <div class="absolute flex items-center justify-evenly inset-0">
                                    <x-a-button href="{{ route('settings.edit',$user->id) }}"
                                        class="bg-smalt-200 hover:bg-smalt-100 transform active:scale-95 active:bg-smalt-400 hover:shadow-md shadow">
                                        <i class='bx bx-edit text-xl'></i>
                                    </x-a-button>
                                    <x-button
                                        @click="showModal = !showModal, slug = '{{ route('settings.destroy',$user->id) }}'"
                                        class="bg-red-500 hover:bg-red-400 transform active:scale-95 active:bg-red-600 hover:shadow-md shadow">
                                        <i class='bx bx-trash text-xl'></i>
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $users->onEachSide(5)->links() }}
                </div>
            </div>
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