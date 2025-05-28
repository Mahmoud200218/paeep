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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('parent_name');
            $table->string('grandfather_name');
            $table->string('family_name');
            $table->string('phone_number');
            $table->string('email');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->enum('qualification', ['bachelors', 'diploma', 'college_student', 'high_school']);
            $table->date('date_of_birth');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
