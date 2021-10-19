<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Dashboard</h1>
        </div>
    </x-slot>

    <div class="grid grid-cols-12 gap-6 mt-8 px-4">
        <div class="col-span-3">
            <div
                class="rounded-lg shadow-lg backdrop-filter backdrop-blur-sm bg-opacity-80 bg-smalt-500 text-gray-100 px-8 py-4 flex items-center justify-between">
                <div>
                    <h2 class="font-extrabold text-6xl">
                        {{ $users['usersCount'] }}
                    </h2>
                    <p>No. of Users</p>
                </div>
                <i class='bx bxs-user-account text-8xl'></i>
            </div>
        </div>
        <div class="col-span-3">
            <div
                class="rounded-lg shadow-lg backdrop-filter backdrop-blur-sm bg-opacity-80 bg-yellow-500 text-gray-100 px-8 py-4 flex items-center justify-between">
                <div>
                    <h2 class="font-extrabold text-6xl">
                        {{ $users['agentsCount'] }}
                    </h2>
                    <p>No. of Agents</p>
                </div>
                <i class='bx bx-group text-8xl'></i>
            </div>
        </div>
        <div class="col-span-3">
            <div
                class="rounded-lg shadow-lg backdrop-filter backdrop-blur-sm bg-opacity-80 bg-green-500 text-gray-100 px-8 py-4 flex items-center justify-between">
                <div>
                    <h2 class="font-extrabold text-6xl">
                        120,456
                    </h2>
                    <p>Points</p>
                </div>
                <i class='bx bx-bar-chart text-8xl'></i>
            </div>
        </div>
        <div class="col-span-3">
            <div
                class="rounded-lg shadow-lg backdrop-filter backdrop-blur-sm bg-opacity-80 bg-red-500 text-gray-100 px-8 py-4 flex items-center justify-between">
                <div>
                    <h2 class="font-extrabold text-6xl">
                        100%
                    </h2>
                    <p>Attendance Rate</p>
                </div>
                <i class='bx bx-notepad text-8xl'></i>
            </div>
        </div>

        <div class="col-span-4">
            <div class="dashboard-card">
                <h1>Card</h1>
            </div>
        </div>

        <div class="col-span-8">
            <div class="dashboard-card">
                <h1>Card</h1>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script>
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
</x-app-layout>