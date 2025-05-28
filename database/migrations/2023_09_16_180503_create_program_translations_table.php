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
        Schema::create('program_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->string('locale')->index();
            $table->string('title_en');
            $table->string('description_en');
            $table->string('title_ar');
            $table->string('description_ar');

            $table->unique(['program_id', 'locale']);
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_translations');
    }
};
