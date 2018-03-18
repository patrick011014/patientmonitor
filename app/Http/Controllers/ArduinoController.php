<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_user;
use App\Models\Tbl_rooms;
use App\Models\Tbl_patient;
use App\Models\Tbl_logs;

class ArduinoController extends Controller
{
    public function index()
    {
    	$data['response'] = '';

    	$received_data = request('data');

    	if($received_data != '')
        {
            $explode = explode('/', $received_data);
            for($x=0;$x<5;$x++)
            {
                if(!isset($explode[$x]))
                {
                    $explode[$x] = "0";
                }
            }
            $explode[3] = 60;

            $room = Tbl_rooms::where('arduino_key',$explode[0])->first();
            $patient = Tbl_patient::where('room_id',$room->room_id)->where('status','on_room')->first();

            if($patient)
            {
                $insert = $this->getAllData($explode,$room,$patient);
                // dd($insert);
                $counter = count(Tbl_logs::where('arduino_key',$explode[0])->get());
                if($counter < 1)
                {
                    Tbl_logs::insert($insert);
                }
                else
                {
                    Tbl_logs::where('arduino_key',$explode[0])->update($insert);
                }
                // dd($insert);
                $data['response'] = $insert['status'];
            }
            else
            {
                $data['response'] = 'not occupied';
            }
        }

    	

    	return view('patient.arduino',$data);
    }
    public function getAllData($explode,$room,$patient)
    {
    	$insert['room_id'] = $room->room_id;
    	// dd($patient);
    	$insert['patient_id'] = $patient->patient_id;
    	$insert['status'] = 'normal';

    	$arr = array('arduino_key','dex','temp','pulse');

    	foreach($arr as $key => $value)
    	{
    		if(isset($explode[$key]))
    		{
    			$insert[$value] = $explode[$key];
    		}
    		else
    		{
    			$insert[$value] = '0';
    		}
    	}

    	//for asking assistance
    	if(isset($explode[4]))
		{
			$insert['alert'] = $explode[4];
		}
		else
		{
			$insert['alert'] = '0';
		}

    	$status = 'normal';
    	// assistance
    	if($explode[4] == 1)
    	{
    		$status = 'assistance';
    	}
    	// dex
    	if($explode[1] < 30)
    	{
    		$status = 'emergency';
    	}
    	// temp
    	if($explode[2] > 38)
    	{
    		$status = 'emergency';
    	}
    	// pulse
    	if($explode[3] > 81 && $explode[3] <49)
    	{
    		$status = 'emergency';
    	}

    	$insert['status'] = $status;

    	return $insert;
    }
}
