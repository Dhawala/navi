<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBatchColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('schedules', function (Blueprint $table) {
            $table->integer('batch_id');
            $table->softDeletes();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->integer('batch_id');
            $table->softDeletes();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->integer('batch_id');
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('batch_id');
            $table->dropSoftDeletes();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('batch_id');
            $table->dropSoftDeletes();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('batch_id');
            $table->dropSoftDeletes();
        });

    }
}
