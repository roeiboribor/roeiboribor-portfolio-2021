<x-app-layout>
    <div
        class="sticky top-0 flex items-center bg-white text-gray-100 bg-opacity-10 backdrop-filter backdrop-blur-sm h-full w-full py-4">
        <h1 class="text-3xl font-bold ml-3">Dashboard</h1>

        {{-- NOTE: BREADCRUMBS HIDDEN --}}
        <div class="ml-16 hidden">
            <ol class="flex flex-wrap space-x-1">
                <li class="breadcrumb-item text-sm">
                    <a href="#" class="text-smalt-50 font-semibold flex items-center">
                        <span class="underline">Home</span>
                        <i class='bx bx-chevron-right text-xl text-white ml-2'></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm">
                    <a href="#" class="text-smalt-50 font-semibold flex items-center">
                        <span class="underline">2nd Page</span>
                        <i class='bx bx-chevron-right text-xl text-white ml-2'></i>
                    </a>
                </li>
                <li class="breadcrumb-item active text-sm" aria-current="page">
                    <span class="text-gray-200">3rd Page</span>
                </li>
            </ol>
        </div>
    </div>
    <div>
        <div class="blank-space"></div>
        <div class="blank-space"></div>
        <div class="blank-space"></div>
        <div class="blank-space"></div>
        <div class="blank-space"></div>
        <div class="blank-space"></div>
        <div class="blank-space"></div>
    </div>
</x-app-layout>