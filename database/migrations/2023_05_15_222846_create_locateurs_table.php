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
        Schema::create('locateurs', function (Blueprint $table) {
            $table->id();
            $table->string('cin');
            $table->string('fullname');
            $table->string('Photo');
            $table->string('Sexe');
            $table->date('Date jointe');
            $table->integer('Status');
            $table->integer('téléphone');
            $table->boolean('is_verified');
            $table->string('type_utilisateur',10);
            $table->string('photo_vérification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locateurs');
    }
};