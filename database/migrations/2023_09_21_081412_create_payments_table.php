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
            $table->foreignId('payment_method_id')->constrained(); // PayPal, Visa, etc
            $table->morphs('paymentable'); // Or $table->foreignId('donate_id')->nullable()->constrained('donates')->nullOnDelete(); 
            $table->morphs('payer'); // Or $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->float('price'); 
            $table->string('currency_code')->nullable();
            $table->enum('type', ['payment', 'refund'])->default('payment');
            $table->enum('status', ['pending', 'completed', 'cancelled', 'failed'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->json('payment_response')->nullable();
            $table->timestamps();
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
