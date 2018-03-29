<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_notification extends Model
{
    	protected $table = 'tbl_notification';
    	protected $primaryKey = "notification_id";
        public $timestamps = false;

}
