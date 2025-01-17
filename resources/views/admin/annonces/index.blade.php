@extends('layouts.app')

@section('title', 'Gestion des Annonces')

@section('content')
    <h1>Liste des Annonces</h1>
    <a href="{{ route('admin.annonces.create') }}">Ajouter une Annonce</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($annonces as $annonce)
                <tr>
                    <td>{{ $annonce->id }}</td>
                    <td>{{ $annonce->titre }}</td>
                    <td>{{ $annonce->prix }}</td>
                    <td>
                        <a href="{{ route('admin.annonces.edit', $annonce) }}">Modifier</a>
                        <form action="{{ route('admin.annonces.destroy', $annonce) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

