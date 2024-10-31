<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Affiche toutes les annonces
        $annonces = Annonce::all();
        return view('client.annonces.index', compact('annonces'));
    }

    public function show(Annonce $annonce)
    {
        // Affiche une annonce spécifique
        return view('client.annonces.show', compact('annonce'));
    }

    public function sendDemande(Request $request, Annonce $annonce)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        // Créer une demande associée à l'annonce
        $demande = new Demande($request->all());
        $demande->user_id = Auth::id(); // Associe la demande au client
        $demande->annonce_id = $annonce->id; // Associe la demande à l'annonce
        $demande->save();

        return redirect()->route('client.annonces.show', $annonce)->with('success', 'Demande envoyée avec succès.');
    }
}
