<?php

namespace App\Http\Controllers\PatientMonitoring;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Patient;

use App\Models\Tbl_employee_info;
use App\Models\Tbl_user;
use App\Models\Tbl_rooms;
use App\Models\Tbl_patient;

use Illuminate\Http\Request;

use Redirect;
use Validator;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;
use Input;
class PatientMonitoringController extends Patient
{
    public function getIndex()
    {
    	$data['page'] = "Dashboard";
    	return view('patient.dashboard',$data);
    }
    public function getDashboardTable()
    {
    	$data['page'] = 'Dashboard Table';
    	
    	$floor = request('room_level');
    	$data['private'] = Tbl_rooms::where('room_level',$floor)->where('room_type',"Private Room")->where('archived',0)->get();
    	$data['ward'] = Tbl_rooms::where('room_level',$floor)->where('room_type',"Ward")->where('archived',0)->get();

    	return view('tables.index_table',$data);
    }
    public function getRooms()
    {
    	$data['page'] = 'Rooms';
    	return view('patient.rooms',$data);
    }
    public function getAddRoom()
    {
    	$data['page'] = "Add Room";
    	return view('modals.rooms.add_room',$data);
    }
    public function postAddRoom(Request $request)
    {
    	$insert['room_name'] 	= $request->room_name;
    	$insert['room_type'] 	= $request->room_type;
    	$insert['room_level'] 	= $request->room_level;
    	$insert['archived'] 	= 0;
        $insert['patient_id']   = 0;
        $insert['capacity']     = $request->room_capacity;
        $insert['arduino_key']  = $request->arduino_key;

    	$rules['room_name']     = 'required';
    	$rules['room_type']     = 'required';
    	$rules['room_level']    = 'required';
        $rules['capacity']      = 'required';
        $rules['arduino_key']   = 'required';

    	$validator = Validator::make($insert, $rules);

    	if($validator->fails())
    	{
    		$response["call_function"] = 'complete_fields';
    	}
        else if(!is_numeric($request->room_capacity))
        {
            $response['call_function'] = 'invalid_capacity';
        }
    	else
    	{
    		Tbl_rooms::insert($insert);
    		$response['call_function'] = 'success';
    	}
    	
    	return json_encode($response);
    }
    public function getModifyRoom()
    {
    	$data['page'] 		= "Modify Room";
    	$data['row'] 		= Tbl_rooms::where('room_id',request('id'))->first();
    	$data['room_id'] 	= request('id');
    	return view('modals.rooms.modify_room',$data);
    }
    public function postModifyRoom(Request $request)
    {
    	$update['room_name'] 	= $request->room_name;
    	$update['room_type'] 	= $request->room_type;
    	$update['room_level'] 	= $request->room_level;
        $update['capacity']     = $request->room_capacity;
        $update['arduino_key']  = $request->arduino_key;

    	$rules['room_name']     = 'required';
    	$rules['room_type']     = 'required';
    	$rules['room_level']    = 'required';
        $rules['capacity']      = 'required';
        $rules['arduino_key']   = 'required';

    	$validator = Validator::make($update, $rules);

    	if($validator->fails())
    	{
    		$response["call_function"] = 'complete_fields';
            $response['status_message'] = '';
    	}
        else if(!is_numeric($request->room_capacity))
        {
            $response['call_function'] = 'invalid_capacity';
        }
    	else
    	{
    		Tbl_rooms::where('room_id',$request->room_id)->update($update);
    		$response['call_function'] = 'success';
    	}
    	
    	return json_encode($response);
    }
    function getArchive()
    {
    	$action = request('action');
    	$id = request('id');
    	if($action == 'Archive')
    	{
    		$update['archived'] = 1;
    	}
    	else
    	{
    		$update['archived'] = 0;
    	}
    	Tbl_rooms::where('room_id',$id)->update($update);
    }
    public function getRoomTable()
    {
    	$data["activetab"] = request("activetab");
        $query = Tbl_rooms::where("archived",request("activetab"));

        if(request('search')!='')
        {
            $query->where("room_name","LIKE","%".request("search")."%");
        }
        if(request('type') != '0')
        {
        	$query->where('room_type',request('type'));
        }
        if(request('level') != '0')
        {
        	$query->where('room_level',request('level'));
        }

        $data["rows"] = $query->orderBy('room_name')->get();
        return view("tables.rooms_table", $data);
    }
    public function getAccounts()
    {
    	$data['page'] = "Accounts";
    	return view('patient.accounts',$data);
    }
    public function getAccountsTable()
    {
    	$query = Tbl_user::where('archived',request('activetab'));

        if(request('search')!='')
        {
            $query->where("username","LIKE","%".request("search")."%");
        }

        $data['rows'] = $query->get();
        foreach($data['rows'] as $key => $value)
        {
        	$data['rows'][$key]->display_name = ucfirst($value->first_name)." ".ucfirst($value->last_name);
        }
        return view('tables.accounts_table',$data);
    }
    public function getArchiveAccount()
    {
    	$action = request('action');
    	$id = request('id');
    	if($action == 'Archive')
    	{
    		$update['archived'] = 1;
    	}
    	else
    	{
    		$update['archived'] = 0;
    	}
    	Tbl_user::where('user_id',$id)->update($update);	
    }
    public function getModifyAccount()
    {
    	$data['page'] = 'Modify User';
    	$data['user'] = Tbl_user::where('user_id',request('id'))->first();
    	// dd($data['user']);
    	return view('modals.accounts.modify_user',$data);
    }
    public function postModifyAccount(Request $request)
    {
    	$user_id = $request->user_id;

    	$update['first_name'] 		= $request->first_name;
    	$update['middle_name']		= $request->middle_name;
    	$update['last_name'] 		= $request->last_name;
    	$update['contact_number'] 	= $request->contact;

    	$rules['first_name'] 		= 'required';
    	$rules['middle_name'] 		= 'required';
    	$rules['last_name'] 		= 'required';
    	$rules['contact_number'] 	= 'required';

    	// dd($update);

    	$validator = Validator::make($update,$rules);

    	if($validator->fails())
    	{
    		$response['call_function'] = 'complete_fields';
    	}
    	else
    	{
    		Tbl_user::where('user_id',$user_id)->update($update);
    		$response['call_function'] = 'success';
    	}
    	return json_encode($response);
    }
    public function getAddUser()
    {
    	$data['page'] = "Create Account";
    	return view('modals.accounts.add_user',$data);
    }
    public function postAddUser(Request $request)
    {
    	$data['first_name'] 		= $request->first_name;
    	$data['middle_name'] 		= $request->middle_name;
    	$data['last_name'] 		= $request->last_name;
    	$data['contact_number'] 	= $request->contact;
    	$data['password'] 		= $request->password;

    	$rules['first_name'] 		= 'required';
    	$rules['middle_name'] 		= 'required';
    	$rules['last_name'] 		= 'required';
    	$rules['contact_number'] 	= 'required';
    	$rules['password'] 			= 'required';

    	$validator = Validator::make($data, $rules);

    	if($validator->fails())
    	{
    		$response["call_function"] = 'complete_fields';
    	}
    	else if($request->password != $request->confirm_pass)
    	{
    		$response['call_function'] = 'not_match';
    	}
    	else
    	{
    		$insert['first_name'] 		= $request->first_name;
	    	$insert['middle_name'] 		= $request->middle_name;
	    	$insert['last_name'] 		= $request->last_name;
	    	$insert['contact_number'] 	= $request->contact;
	    	$insert['password'] 		= Crypt::encrypt($request->password);
	    	$insert['username']			= '';
	    	$insert['archived'] 		= 0;
    		$user_id = Tbl_user::insertGetId($insert);

    		$update['username'] = $this->generateUsername($insert['first_name'],$insert['last_name'],$user_id);
    		Tbl_user::where('user_id',$user_id)->update($update);
    		Session::put('created_account',$user_id);

    		$response['call_function'] = 'success';
    	}
    	
    	return json_encode($response);
    }
    public function getShowCreatedAccount()
    {
    	$data['page'] = "Your Account";
    	$user_id = session('created_account');
    	$data['user'] = Tbl_user::where('user_id',$user_id)->first();
    	return view('modals.accounts.show_created_account',$data);
    }
    public function generateUsername($firstname,$lastname,$user_id)
    {
    	$placeholder = "";
    	if($user_id<10)
    	{
    		$placeholder = "0";
    	}
    	$username = str_replace(' ', '', strtolower($firstname)) . str_replace(' ', '', strtolower(substr($lastname, 0,2))) . $placeholder . $user_id;
    	return $username;
    }
    public function getPatients()
    {
        $data['page'] = "Patients";
        return view("patient.patients",$data);
    }
    public function getPatientTable()
    {
        $data["status"] = request("status");
        $query = Tbl_patient::where("status",request("status"));

        if(request('search')!='')
        {
            $query->where("patient_display_name","LIKE","%".request("search")."%");
        }

        $data["rows"] = $query->get();

        if(request('status') == 'on_room')
        {
            foreach($data['rows'] as $key => $value)
            {
                $room = Tbl_rooms::where('room_id',$value->room_id)->first();
                $data['rows'][$key]->room_name = $room->room_name;
                $data['rows'][$key]->room_level = $room->room_level;
                $data['rows'][$key]->room_type = $room->room_type;
            }
        }
        // dd($data['rows']);
        return view("tables.patient_table", $data);
    }
    public function getAddPatient()
    {
        $data['page'] = 'Add Patient';
        return view('modals.patients.add_patient',$data);
    }
    public function postAddPatient(Request $request)
    {
        $insert['first_name'] = $request->first_name;
        $insert['last_name'] = $request->last_name;
        $insert['middle_name'] = $request->middle_name;
        $insert['sickness'] = $request->sickness;
        $insert['room_id'] = 0;
        $insert['status'] = 'pending';
        $insert['patient_display_name'] = $request->first_name." ".$request->last_name;

        $rules['first_name'] = 'required';
        $rules['last_name'] = 'required';
        $rules['middle_name'] = 'required';
        $rules['sickness'] = 'required';

        $validator = Validator::make($insert,$rules);

        if($validator->fails())
        {
            $response['call_function'] = 'complete_fields';
        }
        else
        {
            Tbl_patient::insert($insert);
            $response['call_function'] = 'success';
        }
        return json_encode($response);

    }
    public function getArchivePatient()
    {
        $id = request('id');
        $update['status'] = strtolower(request('action'));
        $update['room_id'] = 0;
        $update['sickness'] = '';
        Tbl_patient::where('patient_id',$id)->update($update);
    }
    public function getModifyPatient()
    {
        $data['page'] = 'Modify Patient';
        $data['row'] = Tbl_patient::where('patient_id',request('id'))->first();
        return view('modals.patients.modify_patient',$data);
    }
    public function postModifyPatient(Request $request)
    {
        $update['first_name'] = $request->first_name;
        $update['last_name'] = $request->last_name;
        $update['middle_name'] = $request->middle_name;
        $update['sickness'] = $request->sickness;

        $rules['first_name'] = 'required';
        $rules['last_name'] = 'required';

        $validator = Validator::make($update,$rules);

        if($validator->fails())
        {
            $response['call_function'] = 'complete_fields';
        }
        else
        {
            Tbl_patient::where('patient_id',$request->patient_id)->update($update);
            $response['call_function'] = 'success';
        }
        return json_encode($response);
    }
    public function getAssignRoom()
    {
        $data['page'] = "Assign Room";
        $data['patient_id'] = request('id');
        $data['first_floor'] = Tbl_rooms::where('room_level','1st floor')->where('archived',0)->orderBy('room_name')->get();
        $data['second_floor'] = Tbl_rooms::where('room_level','2nd floor')->where('archived',0)->orderBy('room_name')->get();

        foreach($data['first_floor'] as $key => $value)
        {
            $counter = count(Tbl_patient::where('status','on_room')->where('room_id',$value->room_id)->get());
            if($counter >= $value->capacity)
            {
                unset($data['first_floor'][$key]);
            }
        }

        foreach($data['second_floor'] as $key => $value)
        {
            $counter = count(Tbl_patient::where('status','on_room')->where('room_id',$value->room_id)->get());
            if($counter >= $value->capacity)
            {
                unset($data['second_floor'][$key]);
            }
        }

        return view('modals.patients.assign_room',$data);
    }
    public function postAssignRoom(Request $request)
    {
        $update['room_id'] = $request->room_id;
        $update['status'] = 'on_room';
        Tbl_patient::where('patient_id',$request->patient_id)->update($update);
        $response['call_function'] = 'success';
        return json_encode($response);
    }
}
