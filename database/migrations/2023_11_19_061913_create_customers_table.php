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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn')->nullable();
            $table->string('email')->unique();
            $table->string('contact_no_en')->unique()->nullable();
            $table->string('contact_no_bn')->unique()->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->boolean('full_access')->default(false)->comment('1=>yes 0=>no');
            $table->boolean('status')->default(1)->comment('1=>active 2=>inactive');
            $table->string('address')->nullable();
            $table->string('shipping_address')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
