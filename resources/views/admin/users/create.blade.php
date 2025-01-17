@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Nouvel Utilisateur</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select name="role" id="role" class="form-select">
                <option value="agent">Agent</option>
                <option value="client">Client</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer Utilisateur</button>
    </form>
</div>
@endsection

