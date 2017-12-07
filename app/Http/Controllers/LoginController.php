<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tbl_employee_info;

class LoginController extends Controller
{
    public function index()
    {
    	$data['page'] = "Login";
    	return view('login.login',$data);
    }
    public function login(Request $request)
    {
    	$email = $request->email;
    	$query = Tbl_employee_info::where('employee_email',$email)->first();
    	if(count($query)>0)
    	{
    		return 'login success';
    	}
    	else
    	{
    		return 'login failed';
    	}
    }
}
