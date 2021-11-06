<div :class="{'w-60': open,'close w-20': ! open}" class="sidebar w-20 fixed top-0 h-full left-0 z-50">
    <div class="w-full h-full">
        <div class="h-14 w-full flex items-center whitespace-nowrap justify-between px-4">
            <a href="{{ route('home') }}" class="absolute left-5">
                <img src="{{ asset('assets/img/portfolio/logo.png') }}" alt="Logo" class="h-10 w-10">
            </a>
            <span :class="{'opacity-0':! open, 'transition delay-200 duration-300': open}"
                class="font-bold text-xl ml-12">
                Welcome back!
            </span>
        </div>
        <ul :class="{'overflow-auto': open, 'overflow-visible': !open}"
            class="nav-links h-full whitespace-nowrap scrollbar-hide pt-7 pb-36">
            {{-- MANAGERS --}}
            @if (Auth::user()->role === 'manager')
            <x-dashboard.list-item :href="route('manager.dashboard')" :icon="__('bx bxs-dashboard')"
                :title="__('Dashboard')" :active="request()->routeIs('dashboard')">
            </x-dashboard.list-item>
            @endif

            {{-- SUPPLIERS --}}
            @if (Auth::user()->role === 'supplier')
            <x-dashboard.list-item :href="route('supplier.dashboard')" :icon="__('bx bxs-dashboard')"
                :title="__('Dashboard')" :active="request()->routeIs('supplier.dashboard')">
            </x-dashboard.list-item>
            <x-dashboard.list-item :href="route('products.index')" :icon="__('bx bx-store-alt')" :title="__('Products')"
                :active="request()->routeIs('products.index')">
            </x-dashboard.list-item>
            @endif

            {{-- CUSTOMERS --}}
            @if (Auth::user()->role === 'customer')
            <x-dashboard.list-item :href="route('customer.dashboard')" :icon="__('bx bxs-dashboard')"
                :title="__('Dashboard')" :active="request()->routeIs('customer.dashboard')">
            </x-dashboard.list-item>
            @endif

            {{-- SUPER --}}
            @if (Auth::user()->role === 'super')
            <x-dashboard.list-item-dropdown :href="null" :icon="__('bx bxs-folder-open')" :title="__('Projects')"
                :active="request()->routeIs('projects.index')">
                <li>
                    <a href="{{ route('projects.index') }}">All Projects</a>
                </li>
            </x-dashboard.list-item-dropdown>
            <x-dashboard.list-item :href="route('products.index')" :icon="__('bx bx-store-alt')" :title="__('Products')"
                :active="request()->routeIs('products.index')">
            </x-dashboard.list-item>
            @endif

            {{-- OPEN FOR ALL --}}
            <x-dashboard.list-item-dropdown :href="null" :icon="__('bx bx-cog')" :title="__('Settings')"
                :active="request()->routeIs('settings.password.create')">
                <li>
                    <a href=" {{ route('settings.password.create') }}">Change Password</a>
                </li>
            </x-dashboard.list-item-dropdown>
        </ul>
    </div>
</div>