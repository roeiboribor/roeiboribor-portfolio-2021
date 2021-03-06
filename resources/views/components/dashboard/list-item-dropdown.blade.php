@props(['active','title','href','icon'])

@php
$classes = ($active ?? false)
? 'bg-gray-300 dark:bg-gray-800'
: '';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <div class="icon-link">
        <a {{ $attributes->merge(['href' => $href]) }}>
            <i class="{{  $icon  }} w-20 text-2xl"></i>
            <span class="link_name">{{ $title }}</span>
        </a>
        <i class="bx bxs-chevron-right arrow w-12 text-xl"></i>
    </div>
    <ul class="sub-menu">
        <li>
            <a {{ $attributes->merge(['href' => $href,'class'=>'link_name']) }}>
                {{ $title }}
            </a>
        </li>
        {{ $slot }}
    </ul>
</li>