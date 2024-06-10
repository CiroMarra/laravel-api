@extends('layouts.admin')

@section('content')
    <div>
        <h2>Nome Progetto: {{ $project->name }}</h2>
    </div>
    @if ($project->cover_image)
        <div>
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="card-img" style="max-width: 340px;">
        </div>
    @endif
    <div>
        <strong>Tipo progetto</strong>: {{ $project->type ? $project->type->name : 'Nessun tipo' }}
    </div>

    <div>
        <strong>Technologies</strong>:
        @if (count($project->technologies) > 0)
            @foreach ($project->technologies as $project)
                {{ $project->name }}@if (!$loop->last),@endif
            @endforeach
        @else
            <small class="text-danger"> Non ci sono tecnologie usate </small>
        @endif
    </div>

    <div>
        <strong>Created at</strong>: {{ $project->created_at }}
    </div>
    <div class="my-3">
        
        <div class="my-1">
            <strong>Summary</strong>: 
        </div>
        {{ $project->summary }}
    </div>
    
    <div class="my-5">
        <small><strong>Last update</strong>: {{ $project->updated_at }}</small>
    </div>

    @if ($project->content)
        <p class="mt-5">{{ $project->content }}</p>
    @endif
@endsection