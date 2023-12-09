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

            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('sub_amount',10,2);
            $table->decimal('discount',10,2);
            $table->decimal('total_amount',10,2);
            $table->integer('payment_status')->default(1)->comment('1=>paid 2=>not paid');
            $table->integer('delivery_status')->default(1)->comment('1=>delivered 2=>not delivered');
            $table->date('order_date');
            $table->date('delivery_date');
            $table->timestamps();
            $table->softDeletes();
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
