<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Référence au livre
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur (si applicable)
            $table->unsignedTinyInteger('rating'); // Note de 1 à 5
            $table->text('content'); // Contenu de la review
            $table->timestamps();
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
