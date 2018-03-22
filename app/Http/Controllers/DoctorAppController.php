<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypt;

use App\Models\Tbl_doctors;
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
}
