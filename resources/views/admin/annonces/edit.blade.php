@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Annonce: {{ $annonce->titre }}</h1>

    <form action="{{ route('admin.annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $annonce->titre }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $annonce->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" name="prix" id="prix" class="form-control" value="{{ $annonce->prix }}" required>
        </div>

        <div class="mb-3">
            <label for="localisation" class="form-label">Localisation</label>
            <input type="text" name="localisation" id="localisation" class="form-control" value="{{ $annonce->localisation }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (facultatif)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour l'Annonce</button>
    </form>
</div>
@endsection

