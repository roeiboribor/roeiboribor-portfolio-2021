<li class="active group navitem">
    <a href="#home" class="navlink group-hover:opacity-100">
        Home
    </a>
    <span class="line group-hover:w-full"></span>
</li>
@foreach ($sections as $section)
<li class="group navitem">
    <a href="#{{ $section }}" class="navlink group-hover:opacity-100">
        {{ ucfirst($section) }}
    </a>
    <span class="line group-hover:w-full"></span>
</li>
@endforeach