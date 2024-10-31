<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // Spécifie les attributs assignables en masse
    protected $fillable = ['name', 'email', 'password', 'role'];

    // Spécifie les attributs qui doivent être cachés pour les tableaux
    protected $hidden = ['password', 'remember_token'];

    // Spécifie les attributs qui doivent être convertis en types natifs
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation avec le modèle Annonce.
     * Un utilisateur (agent) peut avoir plusieurs annonces.
     */
    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }

    /**
     * Relation avec le modèle Demande.
     * Un utilisateur (client) peut avoir plusieurs demandes.
     */
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    /**
     * Vérifie si l'utilisateur est un administrateur.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Vérifie si l'utilisateur est un agent.
     */
    public function isAgent()
    {
        return $this->role === 'agent';
    }

    /**
     * Vérifie si l'utilisateur est un client.
     */
    public function isClient()
    {
        return $this->role === 'client';
    }
}
