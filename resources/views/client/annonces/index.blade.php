@extends('layouts.app')

@section('title', 'Annonces')

@section('content')
    <h1>Annonces Disponibles</h1>
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
                        <a href="{{ route('client.annonces.show', $annonce) }}">Voir Détails</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

