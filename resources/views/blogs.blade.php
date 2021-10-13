<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Blogs</h1>
        </div>
    </x-slot>

    <div class="container pt-8">
        <div class="bg-glass p-4 rounded-lg">
            <h1>Card</h1>
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