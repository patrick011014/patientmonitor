<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Member;
use App\Models\Tbl_employee_info;

use Redirect;
use Validator;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;
use Request;
use Excel;
use Input;
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
        $data['_employee'] = Tbl_employee_info::get();
    	return view('admin.employee_list',$data);
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
       $file = Input::file('201_file');
       $_data = Excel::selectSheetsByIndex(0)->load($file, function($reader){})->all();
       $_array = array();

       foreach ($_data as $key => $data) 
       {
         // die(var_dump($data));
         $insert = null;

         $insert['employee_first_name']         = Self::nullableToString($data['first_name']);
         $insert['employee_middle_name']        = Self::nullableToString($data['middle_name']);
         $insert['employee_last_name']          = Self::nullableToString($data['last_name']);
         $insert['employee_contact']            = Self::nullableToString($data['employee_contact']);
         $insert['employee_email']              = Self::nullableToString($data['employee_email']);
         $insert['employee_birthdate']          = date('Y-m-d');
         $insert['employee_number']             = Self::nullableToString($data['employee_number']);
         $insert['employee_atm_number']         = 'null';
         $insert['employee_address']            = 'null';
         $insert['employee_street']             = 'null';
         $insert['employee_city']               = 'null';
         $insert['employee_state']              = Self::nullableToString($data['employee_state']);
         $insert['employee_zipcode']            = 'null';
         $insert['employee_tax_status']         = 'null';
         $insert['employee_tin']                = 'null';
         $insert['employee_sss']                = 'null';
         $insert['employee_pagibig']            = 'null';
         $insert['employee_philhealth']         = 'null';
         $insert['password']                    = 'null';
         $insert['employee_remarks']            = 'null';

         // die(var_dump($insert));
         // array_push($_array, $insert);

         Tbl_employee_info::insert($insert);
       }
       // Tbl_employee_info::insert($insert);
       // return  Redirect::to('/admin/employee_list');
       // die(var_dump($_array));
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


    public function nullableToString($data = null, $output = 'string')
    {

         if($data == null && $output == 'string')
         {
              $data = '';
         }
         else if($data == null && $output == 'int')
         {
              $data = 0;
         }

         return $data;
    }
}
