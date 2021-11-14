<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Blogs</h1>
        </div>
    </x-slot>

    <div class="container flex items-center justify-center pt-8 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-6/12">
            @if (count($posts) > 0)

            @foreach ($posts as $post)
            <div>
                <h3>
                    <a href="{{ route('blogs.show',$post->slug) }}">{{ $post->title }}</a>
                </h3>
                <p>{{ $post->summary }}</p>
            </div>
            @endforeach

            @endif
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