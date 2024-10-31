<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    // Spécifie les attributs assignables en masse
    protected $fillable = ['titre', 'description', 'prix', 'localisation', 'image', 'user_id'];

    /**
     * Relation avec le modèle User.
     * Une annonce appartient à un utilisateur (l'agent).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le modèle Demande.
     * Une annonce peut avoir plusieurs demandes de contact.
     */
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}
