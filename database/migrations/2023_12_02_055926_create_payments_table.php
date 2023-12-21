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
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->string('currency');
            $table->string('currency_code');
            $table->decimal('amount',10,2);
            $table->string('currency_value');
            $table->string('method');
            $table->string('txnid');
            $table->integer('status')->nullable();
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
