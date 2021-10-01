<x-guest-layout>
    <h1>Home</h1>
    <div class="flex space-x-4 text-white">
        <a href="{{ route('register') }}" class="rounded px-8 py-2 bg-blue-500">Register</a>
        <a href="{{ route('login') }}" class="rounded px-8 py-2 bg-green-500">Login</a>
        <a href="{{ route('dashboard') }}" class="rounded px-8 py-2 bg-yellow-500">Dashboard</a>
    </div>
</x-guest-layout>