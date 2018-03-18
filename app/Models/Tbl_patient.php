<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_patient extends Model
{
    	protected $table = 'tbl_patient';
    	protected $primaryKey = "patient_id";
        public $timestamps = false;

        public function scopeLogs($query)
        {
        	$query->leftjoin('tbl_logs','tbl_patient.patient_id','=','tbl_logs.patient_id');
        }

}
