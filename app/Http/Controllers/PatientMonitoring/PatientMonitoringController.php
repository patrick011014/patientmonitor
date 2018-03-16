<?php

namespace App\Http\Controllers\PatientMonitoring;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Patient;
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
class PatientMonitoringController extends Patient
{
    public function getIndex()
    {
    	return view('patient.dashboard');
    }
}
