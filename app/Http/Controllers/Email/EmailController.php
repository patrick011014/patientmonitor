<?php

namespace App\Http\Controllers\Email;

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

class EmailController extends Member
{
    public function approve()
    {
        $rid = request('rid');
        $tag = request('tag');
        $eid = request('eid');

        $approver = Tbl_employee_info::where('employee_id',$eid)->first();

        if($approver)
        {
            $approver_name = $approver->employee_first_name." ".$approver->employee_last_name;
            if($tag == 'approver1')
            {
                // approver details

                $request = Tbl_leave_request::where('leave_request_id',$rid)->first();
                
                $eid = 3;
                $recipient_name = 'Michael Antone';
                $recipient_email = 'michael.antone@sgsco.com';
                
                $email_data['from'] = $this->employee_info->employee_email;
                $email_data['sender_name'] = $this->employee_info->employee_first_name." ".$this->employee_info->employee_last_name;
                $email_data['to'] = $recipient_email;
                $email_data['recipient_name'] = $recipient_name;
                $email_data['subject'] = "Leave of Absence";
                $email_data['date_from'] = $request->date_from;
                $email_data['date_to'] = $request->date_to;
                $email_data['reason'] = $request->reason;
                $email_data['domain'] = 'sgsco.test';
                $email_data['link'] = 'rid='.$rid.'&tag=approver2&eid='.$eid;

                $this->send_email($email_data);

                $update['approve_one_by'] = $approver_name;
                $update['status'] = 'pending';
                Tbl_leave_request::where('leave_request_id',$rid)->update($update);
            }
            else if($tag == 'approver2')
            {
                $update['approve_two_by'] = $approver_name;
                $update['status'] = 'approved';
                Tbl_leave_request::where('leave_request_id',$rid)->update($update);
            }

            return 'Request Approved';

        }

    }
    public function reject()
    {
        $rid = request('rid');
        $tag = request('tag');
        $eid = request('eid');


        $approver = Tbl_employee_info::where('employee_id',$eid)->first();

        if($approver)
        {
            $approver_name = $approver->employee_first_name." ".$approver->employee_last_name;
            $update['rejected_by'] = $approver_name;
            $update['status'] = 'rejected';

            Tbl_leave_request::where('leave_request_id',$rid)->update($update);

            return 'Request denied';

        }

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
}