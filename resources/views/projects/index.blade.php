<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Project</h1>
        </div>
    </x-slot>

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

            <div class="mt-8">
                <table class="table-fixed w-full border-2 rounded">
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
                        <tr class="border-2">
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
                                <small>
                                    {{ $project->link }}
                                </small>
                            </td>
                            <td class="p-2">
                                <small>
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
                                        class="bg-red-500 hover:bg-red-400 transform active:scale-95 active:bg-red-600 hover:shadow-md shadow">
                                        <i class='bx bx-trash text-xl'></i>
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
        </script>
    </x-slot>
</x-app-layout>