@extends('layouts.app')

@section('title', 'Tableau de Bord Administrateur')

@section('content')
    <h1>Tableau de Bord Administrateur</h1>
    <p>Bienvenue, {{ auth()->user()->name }}!</p>
    <h2>Utilisateurs</h2>
    <a href="{{ route('admin.users.index') }}">Gérer les utilisateurs</a>
    <h2>Annonces</h2>
    <a href="{{ route('admin.annonces.index') }}">Gérer les annonces</a>
@endsection

