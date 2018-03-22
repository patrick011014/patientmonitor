<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_activation_codes extends Model
{
    	protected $table = 'tbl_activation_codes';
    	protected $primaryKey = "activation_id";
        public $timestamps = false;

}
