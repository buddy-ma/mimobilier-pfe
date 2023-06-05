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
            $table->string('Titre',255);
            $table->integer('type_id');
            $table->integer('id_promoteur');
            $table->integer('id_ville');
            $table->integer('id_quartier');
            $table->string('Adresse',255);
            $table->string('extras',255);
            $table->string('Position',255);
            $table->string('surface',255);
            $table->integer('nbr_chambres');
            $table->biginteger('prix');
            $table->boolean('Status')->default(1)->change();
            $table->boolean('is_dispo')->default(1)->change();
            $table->boolean('is_sponsorised')->default(0)->change();;
            $table->string('vues');
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