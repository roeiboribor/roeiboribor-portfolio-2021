<x-guest-layout>
    <div id="#portfolio" x-data="{ open: false }"
        class="relative min-h-screen text-smalt-900 dark:text-gray-100 transition-colors duration-300 bg-gray-300 dark:bg-smalt-900">

        {{-- Navigation --}}
        <header class="fixed inset-x-0 w-full md:px-4 md:pt-4 z-40">
            <div class="relative">
                <div
                    class="absolute -inset-1 dark:filter dark:bg-gradient-to-r dark:from-purple-500 dark:via-green-300 dark:to-blue-400 dark:blur dark:opacity-75 z-0 dark:animate-tilt">
                </div>
                <x-portfolio.navbar>
                    <div class="flex">
                        <a href="{{ route('login') }}" class="flex items-center py-2 md:py-4">
                            <img src="{{ asset('assets/img/portfolio/logo.png') }}" alt="Logo" class="h-8 w-8 mr-2">
                            <span class="font-bold text-2xl hidden md:block">
                                My<span class="text-smalt-100">Portfolio</span>
                            </span>
                        </a>
                    </div>
                    <div class="md:hidden flex items-center order-2">
                        <x-hamburger-menu />
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
        <div id="mobileMenu" @click="open = !open"
            class="fixed mobile-menu md:hidden inset-0 -translate-x-full transform transition duration-200 ease-in-out z-50"
            :class="{'': open, '-translate-x-full': !open }">
            <div class="absolute overlay bg-black opacity-50"></div>
            <div class="absolute inset-y-0 w-64">
                <div class="relative inset-0 h-full w-full bg-white dark:bg-smalt-800 z-10">
                    <ul class="space-y-8 nav-list items-center px-4 text-center pt-16">
                        <x-portfolio.nav-items :sections="$sections" />
                    </ul>
                </div>
                <x-gradient-light class="inset-y-0 left-0 -right-1 animate-tilt" />
            </div>
        </div>

        {{-- Main --}}
        <main>
            <div style="background-image: url('{{ asset('assets/img/portfolio/bg-01.jpg') }}');"
                class="banner absolute shadow-lg z-10">
                <div class="overlay dark:bg-opacity-30 bg-opacity-40 bg-black rounded-3xl"></div>
            </div>
            <div class="relative container grid grid-cols-12 z-30 pb-16">
                <div class="col-span-4 hidden lg:block pt-40 px-4">
                    <x-portfolio.profile-card />
                </div>
                <div class="overflow-x-hidden col-span-12 lg:col-span-8 px-4 pt-16 md:pt-40 lg:pt-72">
                    <section id="home" class="home relative mb-8 pt-4">
                        <x-portfolio.home-section :projects="$projects" />
                    </section>
                    @foreach ($sections as $section)
                    <div id="{{ $section }}" class="py-8">
                        <div class="flex items-center justify-center pt-20">
                            <h2 class="text-3xl font-bold mr-8">{{ ucfirst($section) }}</h2>
                            <div class="line-dotted w-full"></div>
                            <p class="text-xl ml-8">{{ $loop->index+1 }}</p>
                        </div>
                        <section class="{{ $section }} pt-16">
                            <x-dynamic-component :component="'portfolio.'.$section.'-section'" :projects="$projects" />
                        </section>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="pt-8 overflow-hidden">
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
                <x-gradient-light class="-inset-x-0 -top-1 bottom-0 animate-tilt" />
            </div>
        </footer>

        {{-- Modals --}}

    </div>
    <x-slot name="scripts">
        <script defer>
            const header = document.querySelector('header');
            const main = document.querySelector('main');
            const profileCard = document.querySelector('.profile-card');
            const projectorDesc = document.querySelector('.projector .description');
            const profileCardRole = document.querySelector('.profile-card .profile-card-role');

            const navitems = document.querySelectorAll('.nav-list .navitem');
            const homeCards = document.querySelectorAll('#home .cards-container .relative');
            const servicesRight = document.querySelectorAll('.services .grid .order-1');
            const servicesLeft = document.querySelectorAll('.services .grid .order-2');
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

            var typewriter = new Typewriter(profileCardRole, {
                loop: true,
                delay: 75,
            });

            typewriter
            .pauseFor(1500)
            .typeString(`I'M PHP DEVELOPER`)
            .pauseFor(3500)
            .start();

            ScrollReveal().reveal('.about', {
                origin : 'right',
                delay : 200,
                distance : '120px',
                easing : 'ease-in-out',
                reset: true
            });

            ScrollReveal().reveal('.welcome-title', {
                origin : 'top',
                delay : 200,
                duration: 1000,
                distance : '60px',
                easing : 'ease-in-out',
                reset: true
            });

            ScrollReveal().reveal('.project', {
                delay : 100,
                interval: 200,
                scale: 0.85,
                reset: true
            });

            ScrollReveal().reveal(servicesRight, {
                origin : 'right',
                delay : 200,
                distance : '120px',
                easing : 'ease-in-out',
                reset: true
            });

            ScrollReveal().reveal(servicesLeft, {
                origin : 'left',
                delay : 200,
                distance : '120px',
                easing : 'ease-in-out',
                reset: true
            });

            ScrollReveal().reveal(homeCards, {
                delay : 100,
                interval: 100,
                scale: 0.85,
                reset: true
            });

            function toggleExpand(element) {
                element.classList.toggle('line-clamp-3');
            }
            
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