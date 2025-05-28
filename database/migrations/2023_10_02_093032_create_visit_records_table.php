<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('visit_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('user_identifier'); // You can use this for session ID or IP address
            $table->integer('visit_count')->default(1);
            $table->timestamps();

            $table->unique(['event_id', 'user_identifier']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('visit_records');
    }
}
