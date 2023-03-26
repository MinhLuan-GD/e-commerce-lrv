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
        Schema::dropIfExists('order_items');
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('_id');
            $table->string('title');
            $table->string('image');
            $table->integer('price');
            $table->foreignId('orderId')->constrained('orders', '_id');
            $table->foreignId('productId')->constrained('products', '_id');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
