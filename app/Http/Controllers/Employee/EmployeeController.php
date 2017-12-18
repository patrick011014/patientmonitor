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
use Mail;

use App\Models\Tbl_employee_info;
use App\Models\Tbl_leave_request;

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
        $data['page'] = 'Request Leave';
        $data['request'] = Tbl_employee_info::get();
    	return view('employee.employee_request_leave',$data);
    }
    public function leave_request_table()
    {
        $employee_id = $this->employee_info->employee_id;
        $data['page'] = 'Leave Request Table';
        $activetab = request('activetab');
        $data['activetab'] = $activetab;
        $data['request'] = Tbl_leave_request::where('employee_id',$employee_id)->where('status',$activetab)->orderBy('leave_request_id','DESC')->get();
        return view('employee.request_leave_table',$data);
    }
    public function add_request_leave()
    {
        $data['page'] = "Request Leave";
        return view('employee.request_leave_add',$data);
    }
    public function submit_request_leave(Request $request)
    {
        $request_leave['employee_id'] = $this->employee_info->employee_id;
        $request_leave['date_from'] = $request->date_from;
        $request_leave['date_to'] = $request->date_to;
        $request_leave['reason'] = $request->reason;
        $request_leave['status'] = 'pending';
        $request_leave['approve_one_by'] = '';
        $request_leave['approve_two_by'] = '';
        $request_leave['rejected_by'] = '';

        

        $id = Tbl_leave_request::insertGetId($request_leave);

        $crypt_id = Crypt::encrypt($id);

        // approver details
        $eid = 1;
        $recipient_name = 'John Patrick Manarang';
        $recipient_email = 'patrickmanarang143@gmail.com';
        
        $email_data['from'] = $this->employee_info->employee_email;
        $email_data['sender_name'] = $this->employee_info->employee_first_name." ".$this->employee_info->employee_last_name;
        $email_data['to'] = $recipient_email;
        $email_data['recipient_name'] = $recipient_name;
        $email_data['subject'] = "Leave of Absence";
        $email_data['date_from'] = $request->date_from;
        $email_data['date_to'] = $request->date_to;
        $email_data['reason'] = $request->reason;
        $email_data['link'] = 'sgsco.test/respond_to_request?rid='.$crypt_id.'&tag=approver1&eid='.$eid;

        $this->send_email($email_data);
        $response['call_function'] = 'success';
        
        return json_encode($response);
    }
    public function send_email($data)
    {
        Mail::send('emails.request_leave',$data, function($message) use ($data)
        {
            $message->from($data["from"], "SGSCO.HRIS");
            $message->subject($data['subject']." - ".$data['sender_name']);
            $message->to($data["to"]);
        });

    }
    public function leave_approver()
    {
    	return view('employee.employee_dashboard');
    }
}