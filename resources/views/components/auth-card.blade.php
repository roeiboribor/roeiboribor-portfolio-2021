<div
    class="min-h-screen flex justify-center items-center text-smalt-900 dark:text-gray-100 transition-colors duration-300 bg-gray-100 dark:bg-smalt-900">
    <div class="relative w-full mx-4 sm:max-w-md">
        <div class="px-6 py-4 bg-white dark:bg-smalt-900 shadow-md sm:rounded-lg relative z-10">
            {{ $slot }}
        </div>
        <x-gradient-light class="-inset-1 animate-pulse" />
    </div>
</div>