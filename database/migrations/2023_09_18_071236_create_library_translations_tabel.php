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
        Schema::create('library_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('library_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');

            $table->unique(['library_id', 'locale']);
            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_translations');
    }
};
