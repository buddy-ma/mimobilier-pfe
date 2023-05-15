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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('position', 255)->nullable();
            $table->string('display_name', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('logo', 255)->default('logo.png');
            $table->string('avatar', 255)->default('avatar.png');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('language', 2)->default('en');
            $table->text('bio')->nullable();
            $table->text('skills')->nullable();
            $table->text('social')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
