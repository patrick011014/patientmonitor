<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblLeaveRequest1216170919am extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_leave_request', function (Blueprint $table) {
            $table->string('status');
            $table->string('approve_one_by');
            $table->string('approve_two_by');
            $table->string('rejected_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_leave_request', function (Blueprint $table) {
            //
        });
    }
}
