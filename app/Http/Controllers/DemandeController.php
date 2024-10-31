<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function index()
    {
        // Affiche toutes les demandes
        $demandes = Demande::all();
        return view('demandes.index', compact('demandes'));
    }

    public function create(Annonce $annonce)
    {
        // Affiche le formulaire pour créer une demande
        return view('demandes.create', compact('annonce'));
    }

    public function store(Request $request, Annonce $annonce)
    {
        // Valide et crée une nouvelle demande
        $request->validate([
            'message' => 'required|string',
        ]);

        $demande = new Demande($request->all());
        $demande->user_id = Auth::id(); // Associe la demande à l'utilisateur actuel
        $demande->annonce_id = $annonce->id; // Associe la demande à l'annonce
        $demande->save();

        return redirect()->route('annonces.show', $annonce)->with('success', 'Demande envoyée avec succès.');
    }
}
