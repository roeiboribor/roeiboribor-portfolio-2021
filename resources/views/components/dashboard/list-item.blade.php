@props(['active','icon','href','title'])

@php
$classes = ($active ?? false)
? 'bg-gray-300 dark:bg-gray-800'
: '';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <a {{ $attributes->merge(['href' => $href]) }}>
        <i class="{{ $icon }} w-20 text-2xl"></i>
        <span class="link_name">
            {{ $title }}
        </span>
    </a>
    <ul class="sub-menu blank">
        <li>
            <a {{ $attributes->merge(['href' => $href,'class' => 'link_name']) }}>{{ $title }}</a>
        </li>
    </ul>
</li>