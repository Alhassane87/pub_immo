<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        // Affiche toutes les annonces de l'agent connecté
        $annonces = Annonce::where('user_id', Auth::id())->get();
        return view('agent.annonces.index', compact('annonces'));
    }

    public function create()
    {
        // Affiche le formulaire pour créer une annonce
        return view('agent.annonces.create');
    }

    public function store(Request $request)
    {
        // Valide et crée une nouvelle annonce
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'localisation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $annonce = new Annonce($request->all());
        $annonce->user_id = Auth::id(); // Associe l'annonce à l'agent
        $annonce->save();

        return redirect()->route('agent.annonces.index')->with('success', 'Annonce créée avec succès.');
    }

    // Autres méthodes (edit, update, destroy) similaires à AnnonceController...
}
