<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_logs extends Model
{
    	protected $table = 'tbl_logs';
    	protected $primaryKey = "log_id";
        public $timestamps = false;

}
