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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('election_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('candidat_id')->constrained('candidats')->cascadeOnDelete();

            $table->enum('poste', ['president', 'vpi', 'vpe', 'secretaire', 'tresorier', 'scome', 'scope', 'score', 'scora', 'scoph', 'scorp', 'scohe', 'communication', 'sport']);

            $table->timestamps();

            // Garantit qu’un utilisateur ne peut voter qu’une seule fois par poste dans une élection
            $table->unique(['user_id', 'election_id', 'poste']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
