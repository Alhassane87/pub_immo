@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Utilisateur: {{ $user->name }}</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select name="role" id="role" class="form-select">
                <option value="agent" {{ $user->role === 'agent' ? 'selected' : '' }}>Agent</option>
                <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Client</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour l'Utilisateur</button>
    </form>
</div>
@endsection

