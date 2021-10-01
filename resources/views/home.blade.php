<x-guest-layout>
    <div class="min-h-screen dark:text-gray-100 dark:bg-smalt-900">
        <h1>Home</h1>
        <div class="flex space-x-4">
            <a href="{{ route('register') }}" class="rounded px-8 py-2 bg-blue-500">Register</a>
            <a href="{{ route('login') }}" class="rounded px-8 py-2 bg-green-500">Login</a>
            <a href="{{ route('dashboard') }}" class="rounded px-8 py-2 bg-yellow-500">Dashboard</a>
        </div>
    </div>
    <x-slot name="scripts">
        <script>

        </script>
    </x-slot>
</x-guest-layout>