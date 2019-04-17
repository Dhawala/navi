<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchdulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ac_code',10);
            $table->string('course_code',10);
            $table->string('group',10);
            $table->string('medium',10);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('centre',10);
            $table->string('loc_id',5);
            $table->string('room_id',5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schdules');
    }
}
