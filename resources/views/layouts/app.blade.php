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
        <aside class="sidebar fixed">

        </aside>
        <div>
            <nav>Navigation</nav>
            <main class="flex items-center justify-center">
                <div class="text-center mx-auto">
                    This is a content
                </div>
            </main>
        </div>
    </div>
</body>

</html>