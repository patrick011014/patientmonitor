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
                // $data['response'] = $explode[3];
            }
            else
            {
                $data['response'] = 'not occupied';
            }
        }

        // notification generator
        // if(isset($insert))
        // {
        //     if($insert['status'] == 'emergency')
        //     {
        //         $patient        = Tbl_patient::where('patient_id',$insert['patient_id'])->first();
        //         $active_notif   = count(Tbl_notification::where('patient_id',$insert['patient_id'])->where('doctor_id',$patient->doctor_id)->where('notified',0)->get());
        //         if($active_notif < 1)
        //         {
        //             date_default_timezone_set('Asia/Manila');
        //             $insert_notif['patient_id']     = $insert['patient_id'];
        //             $insert_notif['doctor_id']      = $patient->doctor_id;
        //             $insert_notif['message']        = $this->notificationGenerator($insert);
        //             $insert_notif['room_id']        = $patient->room_id;
        //             $insert_notif['date_created']   = Carbon::now();
        //             Tbl_notification::insert($insert_notif);
        //         }
        //     }
        // }

        // check if there is a unread notification with greater than 3 mins unnoticed
        date_default_timezone_set('Asia/Manila');
        $now = strtotime(Carbon::now());
        $limit = 60 * 3;
        $unnotified = Tbl_notification::where('notified',0)->get();
        foreach($unnotified as $key => $value)
        {
            $diff = $now - strtotime($value->date_created);
            if($diff > $limit)
            {
                $update['notified'] = 1;
                $update['sms_notified'] = 1;
                Tbl_notification::where('notification_id',$value->notification_id)->update($update);
                
                // uncomment to enable sms gateway
                // $doctor = Tbl_doctors::where('doctor_id',$value->doctor_id)->first();
                // if($doctor)
                // {
                //     $nexmo = app('Nexmo\Client');
                //     $nexmo->message()->send([
                //         'to'   => $doctor->contact_number,
                //         'from' => 'Patient Monitor',
                //         'text' => $value->message
                //     ]);
                // }
                // until here
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

        $active_sensors = explode('/', $patient->sensors);

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
    	if(in_array(1, $active_sensors))
        {
            if($explode[1] < 30)
            {
                $status = 'emergency';
            }
        }
    	// temp
        if(in_array(2, $active_sensors))
        {
            if($explode[2] > 38)
            {
                $status = 'emergency';
            }
        }
    	// pulse
        if(in_array(3, $active_sensors))
        {
            if($explode[3] > 100 || $explode[3] < 40)
            {
                $status = 'emergency';
            }
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

        if($details['dex'] > 120 || $details['dex'] == '')
        {
            $rephrase['dex'] = "Disconnected";
        }
        else if($details['dex'] <=120 && $details['dex'] >=100)
        {
            $rephrase['dex'] = "100%";
        }
        else if($details['dex'] < 0)
        {
            $rephrase['dex'] = "0%";
        }
        else
        {
            $rephrase['dex'] = $details['dex']."%";;
        }
        // temp
        if($details['pulse'] > 100 || $details['pulse'] == '')
        {
            $rephrase['temp'] = "Disconnected";
        }
        else
        {
            $rephrase['temp'] = $details['pulse']."°C";
        }
        // pulse
        if($details['pulse'] == '' || $details['pulse'] == 'Disconnected')
        {
            $rephrase['pulse'] = "Disconnected";
        }
        else
        {
            $rephrase['pulse'] = $details['pulse']." BPM";
        }

        $message = '';
// your patient patrick manarang on Room 201, dextrose level is 100%, temperature is 35°C, and pulse is 60 BMP
        $message .= 'Your patient '.$patient['patient_display_name']." on ".$room->room_name.", ";
        $message .= 'dextrose level is '.$rephrase['dex'].', ';
        $message .= 'temperature is '.$rephrase['temp'].', ';
        $message .= 'and pulse is '.$rephrase['pulse'].'.';
        return $message;
    }
}
