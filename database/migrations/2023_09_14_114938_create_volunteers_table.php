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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->enum('volunteer', ['yes', 'no'])->default('no');
            $table->string('volunteer_details')->nullable();
            $table->enum('skills', ['yes', 'no'])->default('no');
            $table->string('skills_details')->nullable();
            $table->date('beginning');
            $table->date('ending');
            $table->text('experience');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
