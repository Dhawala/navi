<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyLatitudeLongitudeLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations',function (Blueprint $table){
           $table->dropColumn('longitude');
           $table->dropColumn('latitude');
        });

        Schema::table('locations',function (Blueprint $table){
            $table->mediumText('longitude');
            $table->mediumText('latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations',function (Blueprint $table){
            $table->dropColumn('longitude');
            $table->dropColumn('latitude');
        });
        Schema::table('locations',function (Blueprint $table){
            $table->double('longitude');
            $table->double('latitude');
        });

    }
}
