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

    	$rules['room_name'] = 'required';
    	$rules['room_type'] = 'required';
    	$rules['room_level'] = 'required';

    	$validator = Validator::make($insert, $rules);

    	if($validator->fails())
    	{
    		$response["call_function"] = 'complete_fields';
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

    	$rules['room_name'] = 'required';
    	$rules['room_type'] = 'required';
    	$rules['room_level'] = 'required';

    	$validator = Validator::make($update, $rules);

    	if($validator->fails())
    	{
    		$response["call_function"] = 'complete_fields';
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

        $data["rows"] = $query->get();
        return view("tables.rooms_table", $data);
    }
}
