<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    // Spécifie les attributs assignables en masse
    protected $fillable = ['annonce_id', 'user_id', 'message'];

    /**
     * Relation avec le modèle Annonce.
     * Une demande appartient à une annonce.
     */
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }

    /**
     * Relation avec le modèle User.
     * Une demande appartient à un utilisateur (client).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
