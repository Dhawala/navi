<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudentStaffMessageColumnsToAllocationCancellationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allocation_cancellations', function (Blueprint $table) {
            //
            $table->mediumText('student_message')->nullable();
            $table->mediumText('staff_message')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('allocation_cancellations', function (Blueprint $table) {
            //
            $table->dropColumn('student_message');
            $table->dropColumn('staff_message');

        });
    }
}
