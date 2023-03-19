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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('_id');
            $table->string('userId');
            $table->string('status');
            $table->string('shippingAddress');
            $table->string('paymentMethod');
            $table->integer('itemsPrice');
            $table->integer('shippingPrice');
            $table->integer('totalPrice');
            $table->boolean('isDelivered');
            $table->timestamp('deliveredAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
