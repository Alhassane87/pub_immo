@extends('layouts.app')

@section('title', 'Tableau de Bord Agent')

@section('content')
    <h1>Tableau de Bord Agent</h1>
    <p>Bienvenue, {{ auth()->user()->name }}!</p>
    <h2>Mes Annonces</h2>
    <a href="{{ route('agent.annonces.index') }}">Gérer mes annonces</a>
@endsection

