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
        Schema::dropIfExists('product_images');
        Schema::create('product_images', function (Blueprint $table) {
            $table->id('_id');
            $table->string('imageUrl');
            $table->boolean('isMain');
            $table->foreignId('productId')->constrained('products', '_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
