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
            $table->id('_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('isAdmin')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
            $table->timestamps();
        });
        Schema::dropIfExists('personal_access_tokens');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
