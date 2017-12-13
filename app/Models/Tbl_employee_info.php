<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tbl_employee_info extends Model
{
    protected $table = 'tbl_employee_info';
	protected $primaryKey = "item_id";
    public $timestamps = false;

}
