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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id')->index();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->index();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->integer('discount_type')->default(1)->comment('1=>percentage 2=>fixed');
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->boolean('is_popular')->default(false)->comment('1=>yes 0=>no');
            $table->boolean('is_featured')->default(false)->comment('1=>yes 0=>no');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
