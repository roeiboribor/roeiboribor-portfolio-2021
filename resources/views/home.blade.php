<x-guest-layout>
    <div x-data="{ open: false }"
        class="relative min-h-screen text-smalt-900 dark:text-gray-100 transition-colors duration-300 bg-gray-200 dark:bg-smalt-900">

        {{-- Navigation --}}
        <header class="fixed inset-x-0 w-full md:px-4 md:pt-4 z-40">
            <div class="relative">
                <div
                    class="absolute -inset-1 dark:filter dark:bg-gradient-to-r dark:from-purple-500 dark:via-green-300 dark:to-blue-400 dark:blur dark:opacity-75 z-0 dark:animate-tilt">
                </div>
                <x-portfolio.navbar>
                    <div class="flex">
                        <a href="#" class="flex items-center py-2 md:py-4">
                            <img src="{{ asset('assets/img/portfolio/logo.png') }}" alt="Logo" class="h-8 w-8 mr-2">
                            <span class="font-bold text-2xl hidden md:block">
                                My<span class="text-smalt-100">Portfolio</span>
                            </span>
                        </a>
                    </div>
                    <div class="md:hidden flex items-center order-2">
                        <x-portfolio.hamburger-menu />
                    </div>
                    <div class="flex items-center order-1">
                        <div class="relative md:mr-8">
                            <x-darkmode-toggle-button />
                        </div>

                        <ul class="hidden nav-list md:flex items-center h-full justify-center space-x-4">
                            <x-portfolio.nav-items :sections="$sections" />
                        </ul>
                    </div>
                </x-portfolio.navbar>
            </div>
        </header>

        {{-- Sidebar --}}


        {{-- Main --}}
        <main>
            <div style="background-image: url('{{ asset('assets/img/portfolio/bg-01.jpg') }}');"
                class="banner absolute shadow-lg z-10">
                <div class="overlay dark:bg-opacity-30 bg-opacity-40 bg-black rounded-3xl"></div>
            </div>
            <div class="relative container grid grid-cols-12 z-30">
                <div class="col-span-4 hidden lg:block pt-40 pr-4">
                    <x-portfolio.profile-card />
                </div>
                <div class="col-span-12 lg:col-span-8 px-4 pt-16 md:pt-40 lg:pt-72">
                    <section id="home" class="home relative mb-8 pt-4">
                        <x-portfolio.home-section />
                    </section>
                    @foreach ($sections as $section)
                    <div id="{{ $section }}" class="py-8">
                        <div class="flex items-center justify-center pt-20">
                            <h2 class="text-3xl font-bold mr-8">{{ ucfirst($section) }}</h2>
                            <div class="line-dotted w-full"></div>
                            <p class="text-xl ml-8">{{ $loop->index+1 }}</p>
                        </div>
                        <section class="{{ $section }} pt-16">
                            <x-dynamic-component :component="'portfolio.'.$section.'-section'" />
                        </section>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>

        {{-- Footer --}}

        {{-- Modals --}}

    </div>
    <x-slot name="scripts">
        <script>
            const header = document.querySelector('header');
            const main = document.querySelector('main');
            const profileCard = document.querySelector('.profile-card');

            const navitems = document.querySelectorAll('.nav-list .navitem');
            const badges = document.querySelectorAll('.badge');
            
            main.style.paddingTop = `${header.clientHeight}px`;
            profileCard.style.top = `${header.clientHeight+16}px`;
            profileCard.style.height = `calc(100vh - ${header.clientHeight+32}px)`;

            animateOnMouseOver(badges,'animate__jello');

            navitems.forEach(navitem => {
                navitem.addEventListener('click', () => {
                    removeActiveClass(navitems);
                    navitem.classList.add('active');
                })
            });

            function removeActiveClass(elements) {
                elements.forEach(element => {
                    element.classList.remove('active');
                });
            }

            function animateOnMouseOver(elements, animationName) {
                elements.forEach(element => {
                    element.addEventListener('mouseover', () => {
                        element.classList.add(animationName);
                    });
                    element.addEventListener('animationend', () => {
                        element.classList.remove(animationName);
                    });
                });
            }
        </script>
    </x-slot>
</x-guest-layout>