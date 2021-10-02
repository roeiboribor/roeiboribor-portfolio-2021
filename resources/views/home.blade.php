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
                            <x-portfolio.nav-items />
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
                <div class="overlay dark:bg-opacity-0 bg-opacity-30 bg-black rounded-3xl"></div>
            </div>
            <div class="relative container grid grid-cols-12 z-30">
                <div class="col-span-4 pt-40 pr-4">
                    <div class="profile-card shadow-md sticky">
                        <div class="relative rounded-lg px-4 pt-8 bg-white dark:bg-smalt-900 h-full w-full z-10">
                            <div class="card-header text-center mb-8">
                                <img class="mx-auto mb-3 h-30 filter drop-shadow-lg bg-gradient-01 border-4 border-white rounded-full"
                                    src="{{ asset('assets/img/portfolio/avatar.png') }}" alt="facebook avatar">
                                <h3 class="text-2xl font-bold">Roei Boribor</h3>
                                <h4 class="text-md tracking-wider">I'M PHP DEVELOPER</h4>
                            </div>
                            <div class="card-body">
                                <div class="line-dotted mx-8 my-2"></div>
                                <div class="flex justify-center gap-4 md:gap-8 lg:gap-4 py-8 text-center">
                                    <a class="social-btn" href="https://github.com/roeiboribor" target="_blank">
                                        <i class='bx bxl-github text-4xl transition duration-300 hover:opacity-70'></i>
                                    </a>
                                    <a class="social-btn" href="https://www.linkedin.com/in/roei-boribor/"
                                        target="_blank">
                                        <i
                                            class='bx bxl-linkedin-square text-4xl transition duration-300 hover:opacity-70'></i>
                                    </a>
                                    <a class="social-btn" href="https://www.facebook.com/roeiharris/" target="_blank">
                                        <i
                                            class='bx bxl-facebook-square text-4xl transition duration-300 hover:opacity-70'></i>
                                    </a>
                                    <a class="social-btn" href="mailto:roeiboribor@gmail.com" target="_blank">
                                        <i
                                            class='bx bxs-envelope text-4xl transition duration-300 hover:opacity-70'></i>
                                    </a>
                                </div>
                                <div class="line-dotted mx-8 my-2"></div>
                                <div class="pt-8">
                                    <h5 class="text-center text-md font-bold tracking-wider mb-4">
                                        MY TECH STACKS
                                    </h5>
                                    <div class="text-center grid gap-2">
                                        <div>
                                            <span class="badge animate__animated">HTML</span>
                                            <span class="badge animate__animated">CSS</span>
                                            <span class="badge animate__animated">JavaScript</span>
                                            <span class="badge animate__animated">jQuery</span>
                                            <span class="badge animate__animated">Vue3</span>
                                            <span class="badge animate__animated">Bootstrap</span>
                                            <span class="badge animate__animated">Tailwind</span>
                                            <span class="badge animate__animated">Sass/Scss</span>
                                            <span class="badge animate__animated">Photoshop</span>
                                        </div>
                                        <div>
                                            <span class="badge animate__animated">PHP</span>
                                            <span class="badge animate__animated">C#</span>
                                            <span class="badge animate__animated">VB.net</span>
                                            <span class="badge animate__animated">MySql</span>
                                            <span class="badge animate__animated">Git</span>
                                            <span class="badge animate__animated">Github</span>
                                            <span class="badge animate__animated">Laravel</span>
                                            <span class="badge animate__animated">Gsheets</span>
                                            <span class="badge animate__animated">NodeJS</span>
                                            <span class="badge animate__animated">FileZilla</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute -inset-1 dark:filter dark:bg-gradient-to-r dark:from-purple-500 dark:via-green-300 dark:to-blue-400 dark:blur dark:opacity-75 z-0">
                        </div>
                    </div>
                </div>
                <div class="col-span-8 pt-72">
                    <div class="blank-space"></div>
                    <div class="blank-space"></div>
                    <div class="blank-space"></div>
                    <div class="blank-space"></div>
                    <div class="blank-space"></div>
                    <div class="blank-space"></div>
                    <h1 class="text-center">Blank</h1>
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