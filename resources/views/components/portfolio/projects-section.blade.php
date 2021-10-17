@props(['projects'])
<div x-data="project()">
    <div class="owl-carousel owl-theme mb-4">
        @foreach ($projects as $project)
        <div class="relative cursor-pointer">
            <img @click="getProject('{{$project->slug}}')"
                class="rounded transform scale-95 hover:scale-100 duration-200"
                src="{{ asset('assets/img/portfolio/projects/'.$project->image) }}"
                alt="{{ $project->title.' Screenshot' }}">
        </div>
        @endforeach
    </div>
    <template x-if="isProject">
        <div x-show="isProject" class="relative projector" x-transition:enter="transition ease duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="relative card z-10 px-8 py-4 shadow-lg">
                <h3 class="text-2xl font-semibold tracking-wider" x-text="project.title"></h3>
                <div class="badges mt-2">
                    <template x-for="tag in tags" :key="project.slug">
                        <span class="badge animate__animated" x-text="tag"></span>
                    </template>
                </div>
                <p @click="toggleExpand($event.target)"
                    class="description mt-4 line-clamp-3 tracking-wide cursor-pointer" x-text="project.description">
                </p>
            </div>
            <div
                class="absolute -inset-1 dark:filter dark:bg-gradient-to-r dark:from-purple-500 dark:via-green-300 dark:to-blue-400 dark:blur dark:opacity-75 z-0 dark:animate-tilt">
            </div>
        </div>
    </template>
</div>