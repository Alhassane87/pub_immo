@extends('layouts.app')

@section('title', 'Tableau de Bord Client')

@section('content')
    <h1>Tableau de Bord Client</h1>
    <p>Bienvenue, {{ auth()->user()->name }}!</p>
    <h2>Annonces Disponibles</h2>
    <a href="{{ route('client.annonces.index') }}">Voir les Annonces</a>
@endsection

