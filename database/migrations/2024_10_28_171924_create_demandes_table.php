<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annonce_id')->constrained()->onDelete('cascade'); // Référence à l'annonce concernée
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence au client qui fait la demande
            $table->text('message'); // Message de la demande
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
