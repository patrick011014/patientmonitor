<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Member;

use Redirect;
use Validator;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;

class AdminController extends Member
{
    public function index()
    {
    	return view('index');
    }

    public function dashboard()
    {
    	return view('admin.admin_dashboard');
    }

    public function employee_list()
    {
    	return view('admin.employee_list');
    }

    public function employee_approver()
    {
    	return view('admin.employee_approver');
    }

    public function leave_request()
    {
    	return view('admin.admin_dashboard');
    }

    public function leave_approver()
    {
    	return view('admin.admin_dashboard');
    }

    public function sample_modal()
    {

        return '<h2>asdda</h2>';
    }

    public function modal_create_employee()
    {
        return view('admin.modal_create_employee');
    }
}
