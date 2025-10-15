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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('election_id')->constrained()->cascadeOnDelete();

            $table->enum('poste', ['president', 'vpi', 'vpe', 'secretaire', 'tresorier', 'scome', 'scope', 'score', 'scora', 'scoph', 'scorp', 'scohe', 'communication', 'sport']);

            // Informations de campagne
            $table->text('programme')->nullable();
            $table->string('slogan')->nullable();
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->string('affiche')->nullable();
            $table->string('video')->nullable();

            // Réseaux sociaux
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();

            // Statut de validation par la CEI
            $table->enum('statut', ['en_attente', 'valide', 'rejete'])->default('en_attente');
            $table->text('commentaire_cei')->nullable();

            $table->timestamps();

            // Empêcher qu’un même étudiant se présente deux fois au même poste dans la même élection
            $table->unique(['user_id', 'election_id', 'poste']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
