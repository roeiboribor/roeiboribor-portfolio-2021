<x-guest-layout>
    <div
        class="relative min-h-screen text-smalt-900 dark:text-gray-100 transition-colors duration-300 bg-gray-100 dark:bg-smalt-900">
        {{-- Navigation --}}
        <header id="navbarContainer" class="fixed inset-x-0 w-full md:px-4 md:pt-4 z-40">
            <div class="relative">
                <div
                    class="absolute -inset-1 dark:filter dark:bg-gradient-to-r dark:from-purple-500 dark:via-green-300 dark:to-blue-400 dark:blur dark:opacity-75 z-0 dark:animate-tilt">
                </div>
                <nav id="navbar" role="navigation"
                    class="relative shadow-lg px-4 bg-white dark:bg-smalt-900 transition-all ease-in-out duration-300 md:rounded-lg overflow-hidden z-10">
                    <div class="max-w-7xl mx-auto flex justify-between">
                        <div class="flex">
                            <a href="#" class="flex items-center py-2 md:py-4">
                                <img src="{{ asset('assets/img/portfolio/logo.png') }}" alt="Logo" class="h-8 w-8 mr-2">
                                <span class="font-bold text-2xl hidden md:block">
                                    My<span class="text-smalt-100">Portfolio</span>
                                </span>
                            </a>
                        </div>

                        <x-darkmode-toggle-button />

                        <div x-data="{ open: false }" class="md:hidden flex items-center">
                            <button class="w-10 h-10 relative focus:outline-none" @click="open = !open">
                                <div
                                    class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                                    <span aria-hidden="true"
                                        class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                                        :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                                    <span aria-hidden="true"
                                        class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out"
                                        :class="{'opacity-0': open } "></span>
                                    <span aria-hidden="true"
                                        class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out"
                                        :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                                </div>
                            </button>
                        </div>

                        <!-- Secondary Navbar items -->
                        <ul class="hidden md:flex items-center justify-center h-full">
                            <li class="navitem">
                                <a href="#" class="navlink">
                                    Home
                                </a>
                                <span class="line"></span>
                            </li>
                            <li class="navitem">
                                <a href="#" class="navlink">
                                    About
                                </a>
                                <span class="line"></span>
                            </li>
                            <li class="navitem">
                                <a href="#" class="navlink">
                                    Services
                                </a>
                                <span class="line"></span>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        {{-- Sidebar --}}

        {{-- Main --}}

        {{-- Footer --}}

        {{-- Modals --}}

    </div>
    <x-slot name="scripts">
        <script>

        </script>
    </x-slot>
</x-guest-layout>