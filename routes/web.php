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

Route::get('/','LoginController@index');

Route::any('/login','LoginController@login');
Route::any('/logout','LoginController@logout');

Route::any('/admin/dashboard','Admin\AdminController@dashboard');
Route::any('/admin/employee_list','Admin\AdminController@dashboard');
Route::any('/admin/employee_approver','Admin\AdminController@dashboard');


Route::any('/employee/dashboard','Employee\EmployeeController@dashboard');
Route::any('/employee/profile_information','Employee\EmployeeController@profile_information');
Route::any('/employee/company_information','Employee\EmployeeController@company_information');
Route::any('/employee/leave_request','Employee\EmployeeController@leave_request');
Route::any('/employee/leave_approver','Employee\EmployeeController@leave_approver');
