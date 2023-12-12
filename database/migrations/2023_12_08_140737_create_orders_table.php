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
            $table->id();
            $table->integer('customer_id');
            $table->integer('order_total');
            $table->integer('tax_total');
            $table->integer('shipping_total');
            $table->text('order_date');
            $table->text('order_timestamps');
            $table->tinyInteger('order_status')->default(0)->comment('0=Pending, 1=Approve');
            $table->string('delivery_address');
            $table->tinyInteger('delivery_status')->default(0)->comment('0=Pending, 1=Successs');
            $table->string('payment_type');
            $table->integer('payment_amount')->default(0);
            $table->tinyInteger('payment_status')->default(0)->comment('0=Pending, 1=Success');
            $table->string('transaction_id')->nullable();
            $table->string('currency')->default('BDT');
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
