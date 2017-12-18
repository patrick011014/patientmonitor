<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_approvers extends Model
{
    	protected $table = 'tbl_approvers';
    	protected $primaryKey = "approver_id";
        public $timestamps = false;

        public function scopeEmployee($query)
        {
        	$query->join("tbl_employee_info", "tbl_approvers.approver_employee_id", "=", "tbl_employee_info.employee_id");
        }

}
