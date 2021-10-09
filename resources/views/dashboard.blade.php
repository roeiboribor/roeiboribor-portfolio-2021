<x-app-layout>
    <div x-data="{open: true}" class="overflow-hidden">
        <aside class="fixed left-0 bg-white dark:bg-smalt-900 inset-y-0 w-64">
            <div class="logo-details h-14 flex items-center">
                <i class="bx bxl-c-plus-plus"></i>
                <span class="logo_name">Codinglab</span>
            </div>
        </aside>
        <section class="relative h-screen left-64">
            <nav class="flex items-center justify-between bg-white dark:bg-smalt-900">
                <x-hamburger-menu />
                <x-darkmode-toggle-button />
            </nav>
            <main class="flex items-center">

            </main>
            {{-- Navigation Bar --}}
            {{-- Main Section --}}
        </section>
    </div>
</x-app-layout>