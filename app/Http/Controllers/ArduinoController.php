<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_user;
use App\Models\Tbl_rooms;
use App\Models\Tbl_patient;
use App\Models\Tbl_logs;
use App\Models\Tbl_notification;
use App\Models\Tbl_doctors;
use Carbon\Carbon;

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
            // $explode[3] = 60;

            $arduino_key = $explode[0];

            $rooms = Tbl_rooms::get();

            foreach($rooms as $key => $value)
            {
                if($value->room_type == 'Ward')
                {
                    $explode_key = explode('/', $value->arduino_key);
                    foreach($explode_key as $key)
                    {
                        if($key == $explode[0])
                        {
                            $arduino_key = $value->arduino_key;
                        }
                    }
                }
            }

            $room = Tbl_rooms::where('arduino_key',$arduino_key)->first();
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

        if(isset($insert))
        {
            if($insert['status'] == 'emergency')
            {
                $patient        = Tbl_patient::where('patient_id',$insert['patient_id'])->first();
                $active_notif   = count(Tbl_notification::where('patient_id',$insert['patient_id'])->where('doctor_id',$patient->doctor_id)->where('notified',0)->get());
                if($active_notif < 1)
                {
                    date_default_timezone_set('Asia/Manila');
                    $insert_notif['patient_id']     = $insert['patient_id'];
                    $insert_notif['doctor_id']      = $patient->doctor_id;
                    $insert_notif['message']        = $this->notificationGenerator($insert);
                    $insert_notif['room_id']        = $patient->room_id;
                    $insert_notif['date_created']   = Carbon::now();
                    Tbl_notification::insert($insert_notif);
                }
            }
        }

        // check if there is a unread notification with greater than 5 mins unnoticed
        date_default_timezone_set('Asia/Manila');
        $now = strtotime(Carbon::now());
        $limit = 60 * 5;
        $unnotified = Tbl_notification::where('notified',0)->get();
        foreach($unnotified as $key => $value)
        {
            $diff = $now - strtotime($value->date_created);
            if($diff > $limit)
            {
                $update['notified'] = 1;
                $update['sms_notified'] = 1;
                Tbl_notification::where('notification_id',$value->notification_id)->update($update);
                // send sms here
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
    		if(isset($explode[$key]) && $explode[$key] != '')
    		{
    			$insert[$value] = $explode[$key];
    		}
    		else
    		{
    			$insert[$value] = '';
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
        date_default_timezone_set('Asia/Manila');
        $insert['date_created'] = date_format(Carbon::now(),"m/d/Y h:i A");

    	return $insert;
    }
    function notificationGenerator($details)
    {
        $patient = Tbl_patient::where('patient_id',$details['patient_id'])->first();
        $room = Tbl_rooms::where('room_id',$patient->room_id)->first();
        $message = '';
// your patient patrick manarang on Room 201, dextrose level is 100%, temperature is 35°C, and pulse is 60 BMP
        $message .= 'Your patient '.$patient['patient_display_name']." on ".$room->room_name.", ";
        $message .= 'dextrose level is '.$details['dex'].'%, ';
        $message .= 'temperature is '.$details['temp'].'°C, ';
        $message .= 'and pulse is '.$details['pulse'].' BMP.';
        return $message;
    }
}
