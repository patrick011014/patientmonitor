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
            $table->date('employee_birthdate');
            $table->string('employee_number');
            $table->string('employee_atm_number');
            $table->string('employee_address');
            $table->string('employee_street');
            $table->string('employee_city');
            $table->string('employee_state');
            $table->string('employee_zipcode');
            $table->string('employee_tax_status');
            $table->string('employee_tin');
            $table->string('employee_sss');
            $table->string('employee_pagibig');
            $table->string('employee_philhealth');
            $table->text('password');
            $table->string('employee_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
