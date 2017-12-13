<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Member;

class AdminController extends BaseController
{
    public function index()
    {
    	return view('index');
    }
    public function dashboard()
    {
    	return view('admin.admin_dashboard');
    }

    public function profile_information()
    {
    	return view('admin.admin_dashboard');
    }

    public function company_information()
    {
    	return view('admin.admin_dashboard');
    }

    public function leave_request()
    {
    	return view('admin.admin_dashboard');
    }

    public function leave_approver()
    {
    	return view('admin.admin_dashboard');
    }
}
