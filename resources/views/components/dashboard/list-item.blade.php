@props(['active','icon','href','title'])

<li>
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