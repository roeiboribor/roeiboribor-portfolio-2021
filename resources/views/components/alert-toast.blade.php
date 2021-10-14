<div {!! $attributes->merge(['class' => 'alert-toast z-50 fixed m-8 px-4 py-4
    rounded-lg w-5/6 md:w-full max-w-sm animate-slide-in-right']) !!}>
    <p class="text-sm text-gray-100">
        {{ $slot }}
    </p>
    <x-button class="absolute top-1 right-2" @click="hideToast()">
        <i class='bx bx-window-close text-lg'></i>
    </x-button>
</div>