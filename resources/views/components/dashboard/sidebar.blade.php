<div :class="{'w-60': open,'w-20': ! open}" class="sidebar fixed top-0 w-20 h-full left-0 transition-all duration-300">
    <div class="w-full h-full">
        <div class="h-14 w-full flex items-center whitespace-nowrap justify-between px-4">
            <a href="{{ route('home') }}" class="absolute left-5">
                <img src="{{ asset('assets/img/portfolio/logo.png') }}" alt="Logo" class="h-10 w-10">
            </a>
            <span :class="{'opacity-0':! open, 'transition delay-200 duration-300': open}"
                class="font-bold text-lg ml-12">
                Welcome back!
            </span>
        </div>
    </div>
</div>