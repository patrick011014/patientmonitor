<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_user extends Model
{
    	protected $table = 'tbl_user';
    	protected $primaryKey = "user_id";
        public $timestamps = false;
}
