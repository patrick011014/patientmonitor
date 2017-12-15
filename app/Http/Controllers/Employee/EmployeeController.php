<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Member;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use Redirect;
use Validator;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;

class EmployeeController extends Member
{
    public function dashboard(Request $request)
    {
    	return view('employee.employee_dashboard');
    }

    public function profile_information()
    {
    	return view('employee.employee_dashboard');
    }

    public function company_information()
    {
    	return view('employee.employee_dashboard');
    }

    public function leave_request()
    {
    	return view('employee.employee_dashboard');
    }

    public function leave_approver()
    {
    	return view('employee.employee_dashboard');
    }
}