<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function index()
    {
        // Affiche toutes les annonces
        $annonces = Annonce::all();
        return view('annonces.index', compact('annonces'));
    }

    public function create()
    {
        // Affiche le formulaire pour créer une annonce
        return view('annonces.create');
    }

    public function store(Request $request)
    {
        // Valide et crée une nouvelle annonce
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'localisation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Validation de l'image
        ]);

        $annonce = new Annonce($request->all());
        $annonce->user_id = Auth::id(); // Associe l'annonce à l'utilisateur actuel
        $annonce->save();

        return redirect()->route('annonces.index')->with('success', 'Annonce créée avec succès.');
    }

    public function show(Annonce $annonce)
    {
        // Affiche une annonce spécifique
        return view('annonces.show', compact('annonce'));
    }

    public function edit(Annonce $annonce)
    {
        // Affiche le formulaire pour éditer une annonce
        return view('annonces.edit', compact('annonce'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        // Valide et met à jour l'annonce
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'localisation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $annonce->update($request->all());

        return redirect()->route('annonces.index')->with('success', 'Annonce mise à jour avec succès.');
    }

    public function destroy(Annonce $annonce)
    {
        // Supprime une annonce
        $annonce->delete();
        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}
