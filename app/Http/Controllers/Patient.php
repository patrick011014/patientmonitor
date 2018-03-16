<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Tbl_employee_info;

use Crypt;
use Redirect;
use Request;
use View;
use Session;
use Carbon\Carbon;

class Patient extends BaseController
{
	public $user_info;
	
	function __construct()
	{
		$this->middleware(function ($request, $next)
		{
			if(!session('username') || !session('password'))
			{
				return Redirect::to("/")->send();
			}
			else
			{
				$username 	= session('username');
				$password	= session('password');
				$user_info	= Tbl_employee_info::where('employee_email',$username)->where('password',$password)->first();
				$this->user_info = $user_info;
			}

			return $next($request);
		});
	}
}