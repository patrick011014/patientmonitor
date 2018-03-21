<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_doctors extends Model
{
    	protected $table = 'tbl_doctors';
    	protected $primaryKey = "doctor_id";
        public $timestamps = false;

}
