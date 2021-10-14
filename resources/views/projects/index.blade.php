<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Project</h1>
        </div>
    </x-slot>

    <div class="container flex items-center justify-center pt-8 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-full">
            <div class="relative w-4/12 flex items-center mx-auto">
                <x-input id="search" class="block ml-1 w-full text-smalt-700 pr-16" type="text" name="search"
                    :value="old('search')" placeholder="search..." />
                <x-button
                    class="absolute right-0.5 bg-smalt-300 hover:bg-smalt-200 transform active:scale-95 active:bg-smalt-400">
                    <i class='bx bx-search-alt text-xl'></i>
                </x-button>
            </div>
            <div class="mt-8 grid grid-cols-4 gap-4">
                <div class="rounded bg-gray-50 dark:bg-gray-700 p-4 shadow">
                    <h1 class="text-center">Card</h1>
                </div>
                <div class="rounded bg-gray-50 dark:bg-gray-700 p-4 shadow">
                    <h1 class="text-center">Card</h1>
                </div>
                <div class="rounded bg-gray-50 dark:bg-gray-700 p-4 shadow">
                    <h1 class="text-center">Card</h1>
                </div>
                <div class="rounded bg-gray-50 dark:bg-gray-700 p-4 shadow">
                    <h1 class="text-center">Card</h1>
                </div>
                <div class="rounded bg-gray-50 dark:bg-gray-700 p-4 shadow">
                    <h1 class="text-center">Card</h1>
                </div>
                <div class="rounded bg-gray-50 dark:bg-gray-700 p-4 shadow">
                    <h1 class="text-center">Card</h1>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
        </script>
    </x-slot>
</x-app-layout>