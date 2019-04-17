<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsDeparments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table){
            $table->renameColumn('dpt_code','code');
            $table->renameColumn('dpt_name','name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table){
           $table->renameColumn('code','dpt_code');
           $table->renameColumn('name','dpt_name');
        });
    }
}
