@extends('layouts.app')

@section('title', 'Mes Annonces')

@section('content')
    <h1>Mes Annonces</h1>
    <a href="{{ route('agent.annonces.create') }}">Ajouter une Annonce</a>
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
                        <a href="{{ route('agent.annonces.edit', $annonce) }}">Modifier</a>
                        <form action="{{ route('agent.annonces.destroy', $annonce) }}" method="POST" style="display:inline;">
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

