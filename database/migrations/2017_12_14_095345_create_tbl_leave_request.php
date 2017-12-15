<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblLeaveRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_leave_request', function (Blueprint $table) {
            $table->increments('leave_request_id');
            $table->integer('employee_id');
            $table->dateTime("date_from");
            $table->dateTime("date_to");
            $table->text('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_leave_request');
    }
}
