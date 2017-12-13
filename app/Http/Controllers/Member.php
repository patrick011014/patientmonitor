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

class Member extends BaseController
{
	public $employee_info;
	
	function __construct()
	{
		$this->middleware(function ($request, $next)
		{
			if(!session('employee_email') || !session('employee_password'))
			{
				return Redirect::to("/")->send();
			}
			else if (session('employee_email') == 'admin' && session('employee_password') == 'admin') 
			{
				$this->employee_info = 'admin';
			}
			else
			{
				$employee_email 	= session('employee_email');
				$employee_password	= session('employee_password');
				$employee_info	= Tbl_employee_info::where('employee_email',$employee_email)->where('employee_tin',$employee_password)->first();
				$this->employee_info = $employee_info;
			}

			return $next($request);
		});
	}
}