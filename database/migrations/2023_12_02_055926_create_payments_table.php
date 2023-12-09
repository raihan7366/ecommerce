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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('customer_name_en')->index();
            $table->foreign('customer_name_en')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('customer_contact_no_en')->index();
            $table->foreign('customer_contact_no_en')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('customer_email')->index();
            $table->foreign('customer_email')->references('id')->on('customers')->onDelete('cascade');

            $table->string('transaction_no');
            $table->integer('payment_type')->default(1)->comment('1=>Bkash 2=>card 3=>COD');
            $table->string('card_no')->unique();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
