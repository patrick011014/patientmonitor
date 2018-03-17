<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_user;

class ArduinoController extends Controller
{
    public function index()
    {
    	$response = '';

    	$data['response'] = request('data');

    	$update['middle_name'] = request('data');
    	Tbl_user::where('user_id',1)->update($update);

    	return view('patient.arduino',$data);
    }
}
