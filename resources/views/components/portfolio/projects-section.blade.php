@props(['projects'])
@foreach ($projects as $project)
<div class="relative cursor-pointer">
    <img class="rounded transform scale-95 hover:scale-100 duration-200"
        src="{{ asset('assets/img/portfolio/projects/'.$project->image) }}" alt="{{ $project->title.' Screenshot' }}">
</div>
@endforeach