<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Project</h1>
        </div>
    </x-slot>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-red-400': 'bg-red-600' }}
                        fixed top-16 right-0">
        {{ session('status') == 'success'
        ? 'Project has been successfully Deleted!'
        : 'An error has occured please try again!' }}
    </x-alert-toast>
    @endif

    <div class="container flex items-center justify-center pt-8 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-full">
            <form method="GET" action="{{ route('projects.index') }}">
                <div class="relative w-4/12 flex items-center mx-auto">
                    <x-input id="search" class="block ml-1 w-full text-smalt-700 pr-16" type="search" name="search"
                        :value="old('search')" placeholder="search..." />
                    <x-button
                        class="absolute right-0.5 bg-smalt-300 hover:bg-smalt-200 transform active:scale-95 active:bg-smalt-400">
                        <i class='bx bx-search-alt text-xl'></i>
                    </x-button>
                </div>
            </form>

            <div class="mt-8 mb-4">
                <table class="table-fixed w-full rounded">
                    <thead class="bg-gradient-to-r from-green-400 to-blue-500 shadow-md">
                        <tr>
                            <th class="border-r-2 w-2/12">Title</th>
                            <th class="border-r-2 w-2/12">Tags</th>
                            <th class="border-r-2 w-2/12">Link</th>
                            <th class="border-r-2 w-4/12">Description</th>
                            <th class="w-2/12">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr class="border-b-2 h-14">
                            <td class="p-2">
                                <small>
                                    {{ $project->title }}
                                </small>
                            </td>
                            <td class="p-2">
                                <small>
                                    {{ $project->tags }}
                                </small>
                            </td>
                            <td class="p-2">
                                <a href="{{ $project->link }}" class="hover:text-smalt-400" target="_blank">
                                    <small>
                                        {{ $project->link }}
                                    </small>
                                </a>
                            </td>
                            <td class="p-2">
                                <small @click="toggleExpand($event.target)" class="cursor-pointer line-clamp-3">
                                    {{ $project->description }}
                                </small>
                            </td>
                            <td class="relative">
                                <div class="absolute flex items-center justify-evenly inset-0">
                                    <x-a-button href="{{ route('projects.edit',$project->slug) }}"
                                        class="bg-smalt-200 hover:bg-smalt-100 transform active:scale-95 active:bg-smalt-400 hover:shadow-md shadow">
                                        <i class='bx bx-edit text-xl'></i>
                                    </x-a-button>
                                    <x-button
                                        @click="showModal = !showModal, slug = '{{ route('projects.destroy',$project->slug) }}'"
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
                    {{ $projects->links() }}
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