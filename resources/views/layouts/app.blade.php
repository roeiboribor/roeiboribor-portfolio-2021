<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div id="app" class="min-h-screen text-smalt-900 dark:text-gray-100 bg-gray-100 dark:bg-smalt-900">
        <x-dashboard.navigation />

        <div class="dashboard-wrapper relative">
            <aside id="sidebar" style="width: 240px;" :class="{'-translate-x-full': ! menu, '': menu }"
                class="sidebar transition duration-300 ease-in-out absolute inset-y-0 transform">
                <div class="h-full bg-white dark:bg-smalt-900">
                    <h1>Side Bar</h1>
                </div>
            </aside>
        </div>
    </div>

    <script defer>
        const nav = document.querySelector('nav');
        const dashboardWrapper = document.querySelector('.dashboard-wrapper');

        dashboardWrapper.style.height = `calc(100vh - ${nav.clientHeight}px)`;
    </script>
</body>

</html>