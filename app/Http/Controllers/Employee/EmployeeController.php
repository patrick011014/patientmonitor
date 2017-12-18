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
use App\Models\Tbl_approvers;

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
        $approver = Tbl_approvers::where('employee_id',$this->employee_info->employee_id)->where('approver_type','line_manager')->first();
        if($approver)
        {
            return view('employee.request_leave_add',$data);
        }
        else
        {
            $data['page'] = "Set Line Manager";
            $data['approver_type'] = 'line_manager';
            $data['employee'] = Tbl_employee_info::where('employee_id','!=',$this->employee_info->employee_id)->get();
            return view('employee.employee_set_approver',$data);
        }
        
    }
    public function set_approver_index()
    {
        $data['page'] = "Set Line Manager";
        $data['approver_type'] = 'line_manager';
        $data['employee'] = Tbl_employee_info::where('employee_id','!=',$this->employee_info->employee_id)->get();
        return view('employee.employee_set_approver',$data);
    }
    public function set_approver(Request $request)
    {
        $insert['employee_id'] = $this->employee_info->employee_id;
        $insert['approver_type'] = $request->approver_type;
        $insert['archive'] = 0;
        $insert['approver_employee_id'] = $request->approver_employee_id;
        
        $approver = Tbl_approvers::where('employee_id',$this->employee_info->employee_id)->where('approver_type',$request->approver_type)->first();
        if($approver)
        {
            $update['approver_employee_id'] = $request->approver_employee_id;
            Tbl_approvers::where('employee_id',$this->employee_info->employee_id)
                         ->where('approver_type',$request->approver_type)
                         ->update($update);
        }
        else
        {
            Tbl_approvers::insert($insert);
        }
        
        $response['call_function'] = 'success';
        
        return json_encode($response);

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


        $approver_details = Tbl_approvers::Employee()->where('tbl_approvers.employee_id',$this->employee_info->employee_id)->where('tbl_approvers.approver_type','line_manager')->first();
        // approver details

        $eid = $approver_details->approver_employee_id;
        $recipient_name = $approver_details->employee_first_name." ".$approver_details->employee_last_name;
        $recipient_email = $approver_details->employee_email;
        
        $email_data['from'] = $this->employee_info->employee_email;
        $email_data['sender_name'] = $this->employee_info->employee_first_name." ".$this->employee_info->employee_last_name;
        $email_data['to'] = $recipient_email;
        $email_data['recipient_name'] = $recipient_name;
        $email_data['subject'] = "Leave of Absence";
        $email_data['date_from'] = $request->date_from;
        $email_data['date_to'] = $request->date_to;
        $email_data['reason'] = $request->reason;
        $email_data['domain'] = 'sgsco.test';
        $email_data['link'] = 'rid='.$id.'&tag=approver1&eid='.$eid;

        $this->send_email($email_data);
        $response['call_function'] = 'success';
        
        return json_encode($response);
    }
    public function send_email($data)
    {
        Mail::send('emails.request_leave',$data, function($message) use ($data)
        {
            $message->from('sgsco.hris@gmail.com', "SGSCO.HRIS");
            $message->subject($data['subject']." - ".$data['sender_name']);
            $message->to($data["to"]);
        });

    }
    public function leave_approver()
    {
    	return view('employee.employee_dashboard');
    }
}