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
            background-image: linear-gradient(#72A3FC, #0E61FA);
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background-image: linear-gradient(#4082FB, #044CD1);
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div id="app" x-data="{open: false}"
        class="relative min-h-screen transition-colors duration-300 text-smalt-900 dark:text-gray-100 bg-white dark:bg-gray-900 z-0">

        {{-- SIDEBAR --}}
        <x-dashboard.sidebar />

        {{-- RIGHT CONTAINER --}}
        <div :class="{'pl-60': open,'pl-20': ! open}" class="pl-20 transition-all duration-300">
            <div class="relative min-h-screen pr-4">
                {{-- TOP NAVIGATION BAR --}}
                <x-dashboard.top-navbar />

                {{-- MAIN CONTENT --}}
                <main style="background-image: url('{{ asset('assets/img/trees.jpg') }}')" class="rounded-lg bg-white dark:bg-gray-800 shadow-inner relative bg-no-repeat bg-cover bg-center
                bg-fixed overflow-hidden">
                    <div class="overlay rounded-lg bg-black opacity-20 z-0"></div>
                    <div class="relative z-10 overflow-hidden">
                        <header class="header flex items-center">
                            {{ $header }}
                        </header>

                        <div class="px-4">
                            {{ $slot }}
                        </div>
                    </div>
                </main>

                {{-- FOOTER --}}
                <x-dashboard.footer />
            </div>
        </div>
    </div>

    <script src="{{ asset('js/anime.min.js') }}"></script>
    <script>
        const topNavbar = document.querySelector('nav.top-navbar');
        const main = document.querySelector('main');
        const footer = document.querySelector('footer');

        main.style.minHeight = `calc(100vh - ${getMinHeightMain()}px)`;

        function getMinHeightMain() {
            const topNavbarHeight = topNavbar.clientHeight;
            const footerHeight = footer.clientHeight;
            return topNavbarHeight + footerHeight;
        }
    </script>
</body>

</html>