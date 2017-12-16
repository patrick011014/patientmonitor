<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_leave_request extends Model
{
    	protected $table = 'tbl_leave_request';
    	protected $primaryKey = "leave_request_id";
        public $timestamps = false;
}
