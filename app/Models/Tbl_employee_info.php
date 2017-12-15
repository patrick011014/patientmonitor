<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_employee_info extends Model
{
    	protected $table = 'tbl_employee_info';
    	protected $primaryKey = "employee_id";
        public $timestamps = false;
}
