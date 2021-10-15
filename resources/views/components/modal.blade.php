{{-- Modal Background --}}
<div x-show="showModal" class="fixed overflow-auto z-50 bg-black bg-opacity-40 inset-0"
    x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    {{-- Modal --}}
    <div x-show="showModal" class="dashboard-card shadow-2xl sm:w-4/12 mx-auto mt-60"
        x-transition:enter="transition ease duration-100 transform"
        x-transition:enter-start="opacity-0 scale-50 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease duration-100 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
        <div>
            {{-- Modal Title --}}
            <span class="font-bold block text-2xl mb-3">{{ $title }}</span>
            {{-- Modal Content --}}
            {{ $slot }}
        </div>

        {{-- Modal Buttons Container --}}
        <div class="flex items-center justify-end space-x-2 mt-5">
            {{ $buttons }}
        </div>
    </div>
</div>