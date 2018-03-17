<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// patient monitoring
Route::get('/','UserLoginController@index');  
Route::post('/login','UserLoginController@login');
Route::any('/logout','UserLoginController@logout');
AdvancedRoute::controller('/member', 'PatientMonitoring\PatientMonitoringController');
Route::any('/arduino/insert','ArduinoController@index');

// patient monitoring end

// sgsco 

// Route::get('/','LoginController@index');  

Route::get('/login',function()
{
	
});
// Route::post('/login','LoginController@login'); 

// Route::any('/logout','LoginController@logout'); 

Route::any('/admin/dashboard','Admin\AdminController@dashboard');
Route::any('/admin/employee_approver','Admin\AdminController@employee_approver');
Route::any('/admin/sample_modal','Admin\AdminController@sample_modal');

/*Start Employee List kim*/
Route::any('/admin/employee_list','Admin\AdminController@employee_list');
Route::any('/admin/modal_create_employee','Admin\AdminController@modal_create_employee');
Route::any('/admin/modal_import_201_file','Admin\AdminController@modal_import_201_file');
Route::any('/admin/save_201_file','Admin\AdminController@save_201_file');
/*End Employee List kim*/

/*Start timekeeping kim*/
Route::any('/admin/time_keeping','Admin\AdminController@time_keeping');
Route::any('/admin/modal_create_period','Admin\AdminController@modal_create_period');
Route::any('/admin/modal_import_time_sheet','Admin\AdminController@modal_import_time_sheet');
/*End timekeeping kim*/

/*Start holiday*/
Route::any('/admin/holiday','Admin\AdminController@holiday');
/*End holiday*/

/*Start shift template*/
Route::any('/admin/holiday','Admin\AdminController@holiday');
Route::any('/admin/modal_create_holiday','Admin\AdminController@modal_create_holiday');
/*End shift template*/

/*Start shift template*/
Route::any('/admin/shift_template','Admin\AdminController@shift_template');
/*End shift template*/

Route::any('/employee/dashboard','Employee\EmployeeController@dashboard');
Route::any('/employee/profile_information','Employee\EmployeeController@profile_information');
Route::any('/employee/company_information','Employee\EmployeeController@company_information');

//set approver - patrick
Route::any('/employee/set_approver','Employee\EmployeeController@set_approver');
Route::get('/employee/set-approver','Employee\EmployeeController@set_approver_index');

// request leave - patrick
Route::any('/employee/leave_request','Employee\EmployeeController@leave_request');
Route::get('/employee/leave_request_table','Employee\EmployeeController@leave_request_table');
Route::get('/employee/leave_request_add','Employee\EmployeeController@add_request_leave');
Route::post('/employee/leave_request_add','Employee\EmployeeController@submit_request_leave');

//respond to email - patrick
Route::get('/respond_to_request/approve','Email\EmailController@approve');
Route::get('/respond_to_request/reject','Email\EmailController@reject');


Route::any('/employee/leave_approver','Employee\EmployeeController@leave_approver');

// sgsco end

