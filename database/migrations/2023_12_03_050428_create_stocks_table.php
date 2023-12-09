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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_name_en')->index();
            $table->foreign('product_name_en')->references('id')->on('products')->onDelete('cascade');
            $table->decimal('total_quantity');
            $table->unsignedBigInteger('order_quantity')->index();
            $table->foreign('order_quantity')->references('id')->on('orders')->onDelete('cascade');
            $table->decimal('buying_price',10,2);
            $table->decimal('selling_price',10,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
