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
        Schema::table('companies_requests', function (Blueprint $table) {
            $table->string('number_of_current_projects')->after('number_of_centers');
            $table->string('major_donors_of_projects')->after('number_of_current_projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies_requests', function (Blueprint $table) {
            $table->dropColumn(['number_of_current_projects', 'major_donors_of_projects']);
        });
    }
};
