<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_patient extends Model
{
    	protected $table = 'tbl_patient';
    	protected $primaryKey = "patient_id";
        public $timestamps = false;

}
