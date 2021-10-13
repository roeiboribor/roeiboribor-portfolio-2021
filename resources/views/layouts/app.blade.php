<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="Roei Boribor" />

    <title>{{ config('app.name', 'Roei Boribor') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
    <div id="app" x-data="{open: checkSidebar()}"
        class="relative min-h-screen text-smalt-900 dark:text-gray-100 bg-white dark:bg-gray-900 z-0">

        {{-- SIDEBAR --}}
        <x-dashboard.sidebar />

        {{-- MAIN CONTENT --}}
        <div :class="{'pl-60': open,'pl-20': ! open}" class="main-content pl-20 transition-all duration-300">
            <div class="relative min-h-screen pr-4">

                <x-dashboard.top-navbar />

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

                <x-dashboard.footer />
            </div>
        </div>
    </div>

    <script>
        const topNavbar = document.querySelector('nav.top-navbar');
        const main = document.querySelector('main');
        const footer = document.querySelector('footer');
        const hamburger = document.querySelector('#hamburger');
        let isSidebar = localStorage.getItem('sidebar');
        let arrows = document.querySelectorAll('.arrow');
        
        // FUNCTIONS
        const getMinHeightMain = () => {
            const topNavbarHeight = topNavbar.clientHeight;
            const footerHeight = footer.clientHeight;
            return topNavbarHeight + footerHeight;
        }

        const checkSidebar = () => {
            const sidebar = document.querySelector('.sidebar').classList;
            const mainContent = document.querySelector('.main-content').classList;
        
            if (isSidebar === 'true') {
                return true;
            } else {
                return false;
            }
        }
        
        const toggleSidebar = () => {
            isSidebar = localStorage.getItem('sidebar');
            if (isSidebar !== 'true') {
                localStorage.setItem('sidebar', 'true');
            } else {
                localStorage.setItem('sidebar', 'false');
            }
        }

        // INITIALIZE
        main.style.minHeight = `calc(100vh - ${getMinHeightMain()}px)`;
        
        checkSidebar();
        
        hamburger.addEventListener('click', () => toggleSidebar())
        
        arrows.forEach((arrow) => {
            arrow.addEventListener('click', () => {
                let arrowParent = arrow.parentElement.parentElement;
                arrowParent.classList.toggle('showMenu');
            });
        });
    </script>

    {{ $scripts ?? '' }}
</body>

</html>