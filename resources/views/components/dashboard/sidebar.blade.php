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
            <x-dashboard.list-item :href="route('dashboard')" :icon="__('bx bx-grid-alt')" :title="__('Dashboard')" />
            <x-dashboard.list-item-dropdown :href="route('dashboard')" :icon="__('bx bxs-folder-open')"
                :title="__('Projects')">
                <li>
                    <a href="#create">Create</a>
                </li>
                <li>
                    <a href="#update">Update</a>
                </li>
                <li>
                    <a href="#delete">Delete</a>
                </li>
            </x-dashboard.list-item-dropdown>
            <x-dashboard.list-item-dropdown :href="route('dashboard')" :icon="__('bx bxl-blogger')"
                :title="__('Blogs')">
                <li>
                    <a href="#create">Create</a>
                </li>
                <li>
                    <a href="#update">Update</a>
                </li>
                <li>
                    <a href="#delete">Delete</a>
                </li>
            </x-dashboard.list-item-dropdown>
            <x-dashboard.list-item :href="route('dashboard')" :icon="__('bx bx-cog')" :title="__('Settings')" />
        </ul>
    </div>
</div>