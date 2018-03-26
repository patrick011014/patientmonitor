<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypt;

use App\Models\Tbl_doctors;
use App\Models\Tbl_patient;
use App\Models\Tbl_logs;
use App\Models\Tbl_rooms;
use App\Models\Tbl_activation_codes;

class DoctorAppController extends Controller
{
    public function getIndex()
    {
    	return 'hello world';
    }
    public function getLogin()
    {
    	$username = request('username');
    	$password = request('password');

    	$return = '[{"doctor_id":1,"first_name":"error_login","middle_name":"","last_name":"","display_name":"","username":"","password":" ","contact_number":"","specialization":"","archived":0}]';

    	$query = Tbl_doctors::where('username',$username)->where('archived',0)->first();
    	if($query)
    	{
    		if($password == Crypt::decrypt($query->password))
			{
				$query->raw_pass = Crypt::decrypt($query->password);
				$return = '['.json_encode($query).']';
			}
    	}
		return $return;
    }
    public function getRegister()
    {
    	$activation_code = request('activation_code');

    	$insert['first_name'] 		= request('first_name');
    	$insert['middle_name'] 		= request('middle_name');
    	$insert['last_name'] 		= request('last_name');
    	$insert['display_name'] 	= request('first_name')." ".request('last_name');
    	$insert['password'] 		= Crypt::encrypt(request('password'));
    	$insert['contact_number'] 	= request('contact_number');
    	$insert['specialization'] 	= request('specialization');
    	$insert['username']			= '';

    	$query = Tbl_activation_codes::where('activation_code',$activation_code)->first();
    	if($query)
    	{
    		if($query->used == 'unused')
    		{
    			$id = Tbl_doctors::insertGetId($insert);
    			$update['username'] = $this->generateUsername($insert['first_name'],$insert['last_name'],$id);
    			Tbl_doctors::where('doctor_id',$id)->update($update);
    			$response = "Username: ".$update['username']."\nPassword: ".request('password');
    		}
    		else
    		{
    			$response = 'code_used';
    		}
    	}
    	else
    	{
    		$response = 'error_code';
    	}
    	return $response;
    }
    public function generateUsername($firstname,$lastname,$user_id)
    {
        $placeholder = "";
        if($user_id<10)
        {
            $placeholder = "0";
        }
        $username = str_replace(' ', '', strtolower($firstname)) . str_replace(' ', '', strtolower(substr($lastname, 0,2))) . $placeholder . $user_id;
        return $username;
    }
    public function getUpdateContact()
    {
    	$doctor_id = request('id');
    	$update['contact_number'] = request('contact');
    	$return = Tbl_doctors::where('doctor_id',$doctor_id)->update($update);
    	if($return)
    	{
    		return 'success';
    	}
    	else
    	{
    		return 'error';
    	}
    }
    public function getUpdatePassword()
    {
    	$doctor_id = request('id');
    	$update['password'] = Crypt::encrypt(request('password'));
    	$return = Tbl_doctors::where('doctor_id',$doctor_id)->update($update);
    	if($return)
    	{
    		return 'success';
    	}
    	else
    	{
    		return 'error';
    	}
    }
    public function getPatientInfo()
    {
    	$patient_id = request('id');
    	$query = Tbl_patient::where('patient_id',$patient_id)->first();
    	$log = Tbl_logs::where('patient_id',$query->patient_id)->where('arduino_key',$query->bed_key)->orderBy('date_created','DESC')->first();
    	// dd($query);
    	$query->room_name = Tbl_rooms::where('room_id',$query->room_id)->first()->room_name;
    	if($log)
    	{
    		$query->dex = $log->dex;
	    	$query->temp = $log->temp;
	    	$query->pulse = $log->pulse;
    	}
    	else
    	{
    		$query->dex = '';
	    	$query->temp = '';
	    	$query->pulse = '';
    	}

    	// dex
        if($query->dex > 120 || $query->dex == '')
        {
            $query->dex = "Disconnected";
        }
        else if($query->dex <=120 && $query->dex >=100)
        {
            $query->dex = "100%";
        }
        else if($query->dex < 0)
        {
            $query->dex = "0%";
        }
        else
        {
            $query->dex = $query->dex."%";;
        }
        // temp
        if($query->temp > 100 || $query->temp == '')
        {
            $query->temp = "Disconnected";
        }
        else
        {
            $query->temp = $query->temp."°C";
        }
        // pulse
        if($query->pulse == '' || $query->pulse == 'Disconnected')
        {
            $query->pulse = "Disconnected";
        }
        else
        {
            $query->pulse = $query->pulse." BPM";
        }

    	return '['.json_encode($query).']';
    }
    public function getDashboard()
    {
    	$patients = Tbl_patient::where('status','on_room')->where('doctor_id',request('id'))->get();
    	foreach($patients as $key => $value)
    	{
    		$log = Tbl_logs::where('room_id',$value->room_id)->where('arduino_key',$value->bed_key)->first();
    		// dd($log);
    		if($log)
    		{
    			$patients[$key]->status = $log->status;
    		}
    		else
    		{
    			$patients[$key]->status = '';
    		}
    	}
    	return json_encode($patients);
    }
}
