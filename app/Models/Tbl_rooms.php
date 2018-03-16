<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tbl_rooms extends Model
{
    	protected $table = 'tbl_rooms';
    	protected $primaryKey = "room_id";
        public $timestamps = false;
}
