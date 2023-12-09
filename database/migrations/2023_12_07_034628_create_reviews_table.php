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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_name_en')->index()->nullable();
            $table->foreign('product_name_en')->references('id')->on('products')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('product_image')->index()->nullable();
            $table->foreign('product_image')->references('id')->on('products')->onDelete('cascade')->nullable();
            $table->string('user_name_en')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('contact_no_en')->unique();
            $table->text('comment')->nullable();
            $table->integer('ratings')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
