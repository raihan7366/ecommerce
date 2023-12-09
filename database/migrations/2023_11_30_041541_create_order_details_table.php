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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_name')->index();
            $table->foreign('product_name')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('product_image')->index();
            $table->foreign('product_image')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('product_category')->index();
            $table->foreign('product_category')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('product_brand')->index();
            $table->foreign('product_brand')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('order_discount')->index();
            $table->foreign('order_discount')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('order_total_amount')->index();
            $table->foreign('order_total_amount')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('order_sub_amount')->index();
            $table->foreign('order_sub_amount')->references('id')->on('orders')->onDelete('cascade');
            
            $table->decimal('quantity');
            $table->decimal('price',10,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
