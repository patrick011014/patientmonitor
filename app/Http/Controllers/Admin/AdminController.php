<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Member;

use Redirect;
use Validator;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;
use Request;
use Excel;

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

    public function modal_import_201_file()
    {
        return view('admin.modal_import_201_file');
    }

    public function save_201_file()
    {
        $file = Request::input('file');
        die(var_dump($file));
        $employee_info = Excel::selectSheetsByIndex(0)->load($file, function($reader){})->get(array('employee_number','biometric_number','first_name','middle_name','last_name'))->toArray();
        die(var_dump($employee_info));
        $response['success'] = 'success';
        $response['call_function'] = 'reload_employee_list';

       
    }

    public function time_keeping()
    {
        return view('admin.time_keeping');
    }

    public function modal_create_period()
    {
        return view('admin.modal_create_period');
    }

    public function modal_import_time_sheet()
    {
        return view('admin.modal_create_period');
    }

    public function holiday()
    {
        return view('admin.holiday');
    }
    public function modal_create_holiday()
    {
        return view('admin.modal_create_holiday');
    }
    public function shift_template()
    {
        return view('admin.shift_template');
    }
}
