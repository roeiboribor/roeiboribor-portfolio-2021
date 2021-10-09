<nav class="top-navbar absolute inset-x-0">
    <div class="relative flex items-center justify-between px-4 py-2 bg-white dark:bg-smalt-900 z-10">
        <div class="flex items-center">
            {{-- Navbar Brand --}}
            <a href="#" class="flex items-center">
                <img src="{{ asset('assets/img/portfolio/logo.png') }}" alt="Logo" class="h-6 w-6 mr-2">
                <span class="font-bold text-2xl hidden md:block transition-all duration-500 text-neongreen-glow">
                    {{ __('My Portfolio') }}
                </span>
            </a>
            {{-- Toggle Menu --}}
            <x-hamburger-menu class="ml-3" />
        </div>
        {{-- Settings Dropdown --}}
        <div class="flex items-center ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <div class="flex space-x-4">
                        <x-darkmode-toggle-button />
                        <button
                            class="flex items-center text-sm font-medium focus:outline-none transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->first_name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <x-gradient-light class="-inset-x-0 -top-1 bottom-0" />
</nav>