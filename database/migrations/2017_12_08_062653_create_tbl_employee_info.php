<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEmployeeInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employee_info', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('employee_first_name');
            $table->string('employee_middle_name');
            $table->string('employee_last_name');
            $table->string('employee_contact');
            $table->string('employee_email');
            $table->string('employee_biometric');
            $table->string('employee_address');
            $table->text('employee_password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_employee_info');
    }
}
