<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAnnouncementsChangeDateField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Announcements', function (Blueprint $table) {
            $table->dateTime('exp_date')->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Announcements', function (Blueprint $table) {
            $table->date('exp_date')->change();
        });

    }
}
