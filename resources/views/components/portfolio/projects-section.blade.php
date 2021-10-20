@props(['projects'])
<div class="grid grid-cols-2">
    @foreach ($projects as $project)
    <div
        class="relative rounded col-span-2 md:col-span-1 cursor-pointer group overflow-hidden bg-white dark:bg-smalt-900">
        <img class="relative transform duration-300 group-hover:scale-150 group-hover:opacity-0"
            src="{{ asset('assets/img/portfolio/projects/'.$project->image) }}"
            alt="{{ $project->title.' Screenshot' }}">
        <div class="absolute inset-0 px-1 text-center">
            <h3
                class="mt-2 text-2xl font-bold transition duration-500 ease-in-out transform -translate-y-full opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
                {{ $project->title }}
            </h3>
            <div class="mt-2 transition duration-500 ease-in-out opacity-0 group-hover:opacity-100">
                @php
                $tags = explode(", ",$project->tags);
                @endphp
                @foreach ($tags as $tag)
                <span class="badge animate__animated">{{ $tag }}</span>
                @endforeach
            </div>
            <p
                class="hidden mt-4 transition duration-500 ease-in-out transform -translate-x-full group-hover:translate-x-0 opacity-0 group-hover:opacity-100 md:line-clamp-5">
                {{ $project->description }}
            </p>
            <x-a-button :href="$project->link" target="__blank"
                class="absolute bottom-6 md:bottom-2 left-1/2 -translate-x-1/2 -translate-y-full bg-green-500 hover:bg-green-400 transform active:scale-95
                                active:bg-green-600 opacity-0 pointer-events-none focus:pointer group-hover:pointer-events-auto group-hover:-translate-y-0 group-hover:opacity-100">
                {{ __('Visit Website') }}
            </x-a-button>
        </div>
    </div>
    @endforeach
</div>