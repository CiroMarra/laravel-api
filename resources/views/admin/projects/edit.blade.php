@extends('layouts.admin')

@section('content')
    <h2>Modifica il progetto: {{ $project->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label"><strong>Nome progetto</strong></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}">
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo di progetto</label>
            <select class="form-select" id="type_id" name="type_id">
                <option value="">Seleziona il tipo</option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id', $project->type_id)) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        <div>
        <div>
            <h5> Scegli la tecnologia che è stata usata per il progetto </h5>
                 @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input @checked(in_array($technology->id, old('technologies', []))) class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technologies-{{ $technology->id }}">
                        <label class="form-check-label" for="technologies-{{ $technology->id }}">
                        {{ $technology->name }}
                        </label>
                    </div>
                @endforeach 
        </div>   


        <div class="mb-3">
            <label for="cover_image" class="form-label"><strong>Immagine Progetto</strong></label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
            
            @if ($project->cover_image)
                <div class="my-2">
                    <img width="240" src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" >
                </div>
            @else
                <small class="text-danger">Non c'è nessuna immagine del progetto caricata</small>
            @endif

        </div>




        <div class="mb-3 py-3">
            <label for="title" class="form-label">Nome cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name', $project->client_name) }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" rows="15" name="content">{{ old('summary', $project->summary) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
@endsection