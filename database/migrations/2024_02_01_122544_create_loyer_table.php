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
        Schema::create('loyers', function (Blueprint $table) {
            $table->id();
            $table->string('propriete');
            $table->integer('montantmensuel');
            $table->integer('montantannuel');
            $table->date('datedecheance');
            $table->date('datepaiement');
            $table->string('methodepaiement');
            $table->string('statut');
            $table->string('paroisse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyers');
    }
};
