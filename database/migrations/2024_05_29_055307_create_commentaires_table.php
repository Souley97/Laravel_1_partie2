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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            
            // Clé étrangère vers la table "articles" pour l'enquête associée
            $table->unsignedBigInteger('id_article');
            $table->foreign('id_article')->references('id')->on('articles')->onDelete('cascade');

            $table->string('contenu');
            $table->string('nom_complet_auteur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
