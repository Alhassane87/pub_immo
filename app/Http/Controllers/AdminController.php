<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // Affiche le tableau de bord de l'administrateur
        return view('admin.dashboard', [
            'users' => User::all(),
            'annonces' => Annonce::all(),
        ]);
    }

    public function manageUsers()
    {
        // Affiche la liste des utilisateurs
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        // Affiche le formulaire de création d'utilisateur
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        // Valide et crée un nouvel utilisateur (agent ou client)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,agent,client', // Valide le rôle
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function editUser(User $user)
    {
        // Affiche le formulaire d'édition d'un utilisateur
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        // Valide et met à jour l'utilisateur
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,agent,client',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroyUser(User $user)
    {
        // Supprime un utilisateur
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function manageAnnonces()
    {
        // Affiche la liste des annonces
        $annonces = Annonce::all();
        return view('admin.annonces.index', compact('annonces'));
    }

    // Ajoutez d'autres méthodes pour gérer les annonces, par exemple :
    public function editAnnonce(Annonce $annonce)
    {
        // Affiche le formulaire d'édition d'une annonce
        return view('admin.annonces.edit', compact('annonce'));
    }

    public function updateAnnonce(Request $request, Annonce $annonce)
    {
        // Valide et met à jour l'annonce
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'localisation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $annonce->update($request->only('titre', 'description', 'prix', 'localisation', 'image'));

        return redirect()->route('admin.annonces.index')->with('success', 'Annonce mise à jour avec succès.');
    }

    public function destroyAnnonce(Annonce $annonce)
    {
        // Supprime une annonce
        $annonce->delete();
        return redirect()->route('admin.annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}
