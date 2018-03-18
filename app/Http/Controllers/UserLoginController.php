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

    	// $insert['first_name'] = "patrick";
    	// $insert['middle_name'] = "ramos";
    	// $insert['last_name'] = "manarang";
    	// $insert['username'] = "";
    	// $insert['password'] = Crypt::encrypt('123');

    	// $user_id = Tbl_user::insertGetId($insert);

    	// $update['username'] = $this->generateUsername('patrick','manarang',$user_id);
    	// Tbl_user::where('user_id',$user_id)->update($update);

    	return view('login.userlogin',$data);
    }
    public function login(Request $request)
    {
    	$username	= $request->username;
        $password   = $request->password;


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
    	$username = $firstname . substr($lastname, 0,2) . $placeholder . $user_id;
    	return $username;
    }
}