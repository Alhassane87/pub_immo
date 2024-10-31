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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // L'agent qui crée l'annonce
            $table->string('titre'); // Titre de l'annonce
            $table->text('description'); // Description détaillée de l'annonce
            $table->decimal('prix', 10, 2); // Prix de l'annonce
            $table->string('localisation'); // Localisation (ville ou adresse)
            $table->string('image')->nullable(); // Image principale de l'annonce (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
