<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{ config('app.name', 'Roei Boribor') }}</title>

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
    <div id="app" x-data="{open: true}"
        class="relative min-h-screen text-smalt-900 dark:text-gray-100 bg-gray-200 dark:bg-smalt-900 z-0 transition-all duration-300">
        <div :class="{'w-60': open,'w-20': ! open}"
            class="sidebar fixed top-0 w-60 h-full left-0 bg-white dark:bg-smalt-900 px-4 transition-all">
            <div class="w-full h-full">
                <h1 class="text-center">Sidebar</h1>
            </div>
        </div>
        <div :class="{'pl-60': open,'pl-20': ! open}" class="main-content pl-60 transition-all">
            <div class="relative min-h-screen">
                <nav class="sticky left-0 top-0 py-2 flex items-center justify-between bg-white dark:bg-smalt-900">
                    <x-hamburger-menu />
                    <x-darkmode-toggle-button />
                </nav>
                <main class="shadow-inner">
                    <div class="blank-space">
                        <h1 class="text-center">Main</h1>
                    </div>
                </main>
                <footer class="relative overflow-hidden">
                    <div class="rounded-t-lg relative">
                        <div class="relative z-10 shadow-lg bg-white dark:bg-smalt-900 px-4 py-8">
                            <div class="container">
                                <p class="text-center">
                                    <small>
                                        © Copyright 2021, Roei Boribor
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script>
        // const topNavbar = document.querySelector('nav.top-navbar');
        // const mainContent = document.querySelector('section.main-content');
        // const main = document.querySelector('main');
        // const footer = document.querySelector('footer');

        // mainContent.style.paddingTop = `${topNavbar.clientHeight}px`;
        // main.style.minHeight = `calc(100vh - ${getMinHeightMain()}px)`;

        // function getMinHeightMain() {
        //     const topNavbarHeight = topNavbar.clientHeight;
        //     const footerHeight = footer.clientHeight;
        //     return topNavbarHeight + footerHeight;
        // }
    </script>
</body>

</html>