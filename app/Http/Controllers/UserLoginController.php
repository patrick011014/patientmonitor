<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tbl_user;


use Redirect;
use Validator;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;

class UserLoginController extends Controller
{
    public function index()
    {
    	$data['page'] = "Login";
        // dd(Crypt::decrypt("eyJpdiI6IlNxOGNERzZMWUtGd3pHd3ZYaUFYSWc9PSIsInZhbHVlIjoiY1F6RWtocVlRRUlPYWZZdFpETXVEZz09IiwibWFjIjoiYzg5YmY0Yzk5ODM2ZWM4YWUzNjBiYmNmMDZmZWMxYmIxN2VkMGRhZjAwNzIwMzMyY2M4MWNlYWU1NGM5MjAxYSJ9"));

    	// $insert['first_name'] = "ruffa";
    	// $insert['middle_name'] = "ayonon";
    	// $insert['last_name'] = "arsenio";
    	// $insert['username'] = "";
    	// $insert['password'] = Crypt::encrypt('12345');
     //    $insert['contact_number'] = '09982172883';

    	// $user_id = Tbl_user::insertGetId($insert);

    	// $update['username'] = $this->generateUsername('ruffa','arsenio',$user_id);
    	// Tbl_user::where('user_id',$user_id)->update($update);

    	return view('login.userlogin',$data);
    }
    public function login(Request $request)
    {
    	$username	= $request->username;
        $password   = $request->password;

        Session::put('login_username', $username);

        $user_info  = Tbl_user::where('username',$username)->where('archived',0)->first();

        if($user_info)
        {
        	if($password == Crypt::decrypt($user_info->password))
    		{
    			Session::put('username',$username);
	            Session::put('password',$password);   
	            return Redirect::to("/member");
    		}
    		else
    		{
    			return Redirect::back()->with('response','error');
    		}
        }       
        else
        {
            return Redirect::back()->with('response','error');
        }
    }
    public function logout()
    {
    	// Session::forget('employee_email');
        Session::forget('username');
        Session::forget('password');
        
        return Redirect::to("/");
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
