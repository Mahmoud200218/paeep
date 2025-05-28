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
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->string('donater_name');
            $table->string('email');
            $table->string('phone_number');
            $table->enum('project_type', ['community_care_initiatives', 'elderly_care', 'safe_streets', 'empowerment_for_all', 'emergency_relief']);
            $table->string('country');
            $table->string('city');
            $table->text('message');
            $table->enum('price', ['20', '50', '100', '500', '1000', '2000']);
            $table->float('other_price')->nullable();
            $table->enum('payment_method', ['stripe', 'visa', 'mastercard']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donates');
    }
};
