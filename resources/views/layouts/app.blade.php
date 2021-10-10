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
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 1rem;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #4082FB;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #0E61FA;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div id="app" x-data="{open: true}"
        class="relative min-h-screen text-smalt-900 dark:text-gray-100 bg-white dark:bg-gray-900 z-0">
        <div :class="{'w-60': open,'w-20': ! open}"
            class="sidebar fixed top-0 w-60 h-full left-0 transition-all duration-300">
            <div class="w-full h-full">
                <a href="{{ route('home') }}" class="h-14 w-full flex items-center whitespace-nowrap px-4">
                    <img src="{{ asset('assets/img/portfolio/logo.png') }}" alt="Logo" class="h-12 w-12">
                    <span :class="{'opacity-0':! open}" class="transition duration-300 font-bold text-2xl ml-4">
                        Dashboard
                    </span>
                </a>
            </div>
        </div>
        <div :class="{'pl-60': open,'pl-20': ! open}" class="main-content pl-60 transition-all duration-300">
            <div class="relative min-h-screen pr-4">
                <x-top-navbar />
                <main class="rounded-lg bg-gray-200 dark:bg-gray-800 shadow-inner relative">
                    <div class="container py-4">
                        <div class="blank-space">
                            <h1 class="text-center">Main</h1>
                        </div>
                        <div class="blank-space"></div>
                        <div class="blank-space"></div>
                        <div class="blank-space"></div>
                        <div class="blank-space"></div>
                        <div class="blank-space"></div>
                    </div>
                </main>
                <footer class="relative overflow-hidden">
                    <div class="relative z-10 px-4 py-8">
                        <div class="container">
                            <p class="text-center">
                                <small>
                                    © Copyright 2021, Roei Boribor
                                </small>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script>
        const topNavbar = document.querySelector('nav.top-navbar');
        // const mainContent = document.querySelector('section.main-content');
        const main = document.querySelector('main');
        const footer = document.querySelector('footer');

        // mainContent.style.paddingTop = `${topNavbar.clientHeight}px`;
        main.style.minHeight = `calc(100vh - ${getMinHeightMain()}px)`;
        console.log(getMinHeightMain());

        function getMinHeightMain() {
            const topNavbarHeight = topNavbar.clientHeight;
            const footerHeight = footer.clientHeight;
            return topNavbarHeight + footerHeight;
        }
    </script>
</body>

</html>