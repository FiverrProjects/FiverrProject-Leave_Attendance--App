<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

//HOD routes
Route::put('approve/{id}', 'Hod\LeaveController@approval')->name('approve.leave');
Route::put('decline/{id}', 'Hod\LeaveController@decline')->name('decline.leave');
Route::delete('delete-leave/{id}', 'Hod\LeaveController@destroy')->name('leave.destroy');
Route::resource('leave','Hod\LeaveController');
Route::get('hod-dashboard', 'Hod\HodDashboardController@index')->name('hoddashboard');
Route::get('hod-leave-status', 'Hod\LeaveController@index')->name('hodleave.index');
Route::get('hod-all-leave', 'Hod\LeaveController@allleave')->name('allhodleave.index');

//employee routes
Route::get('employee-dashboard', 'Employee\EmployeeDashboardController@index')->name('employeedashboard');
Route::resource('leave','Employee\LeaveController');
Route::get('apply-leave-form', 'Employee\LeaveController@create')->name('leave.create');
Route::get('leave-status', 'Employee\LeaveController@index')->name('leave.index');
Route::post('apply-leave', 'Employee\LeaveController@store')->name('leave.store');

//manager routes
Route::get('manager-dashboard', 'Manager\ManagerDashboardController@index')->name('managerdashboard');
Route::put('manager-approve/{id}', 'Manager\LeaveController@approval')->name('managerapprove.leave');
Route::put('manager-decline/{id}', 'Manager\LeaveController@decline')->name('managerdecline.leave');
Route::delete('manager-delete-leave/{id}', 'Manager\LeaveController@destroy')->name('managerleave.destroy');
Route::get('manager-leave-status', 'Manager\LeaveController@index')->name('managerleave.index');
Route::get('manager-all-leave', 'Manager\LeaveController@allleave')->name('allmanagerleave.index');
Route::resource('managerleave','Manager\LeaveController');

//HR routes
// Route::resource('calender','Hr\CalenderController');
Route::get('hr-dashboard', 'Hr\HrDashboardController@index')->name('hrdashboard');
// Route::get('hr-calender', 'Hr\CalenderController@index')->name('hrcalender');
// Route::post('create-event', 'Hr\CalenderController@create')->name('event.create');
Route::resource('employee','Hr\EmployeeController');
Route::get('employee-list', 'Hr\EmployeeController@index')->name('employee.index');
Route::get('employee-create', 'Hr\EmployeeController@create')->name('employee.create');
Route::delete('employee-delete/{id}', 'Hr\EmployeeController@destroy')->name('employee.destroy');
Route::get('single-create', 'Hr\EmployeeController@singlecreate')->name('single.create');
Route::post('single-store', 'Hr\EmployeeController@singlestore')->name('single.store');
Route::post('import-employees', 'Hr\EmployeeController@import')->name('employee.import');
Route::resource('time','Hr\TimeController');
Route::get('time-create', 'Hr\TimeController@create')->name('time.create');
Route::post('time-store', 'Hr\TimeController@store')->name('time.store');

//fullcalender
Route::get('fullcalendar','Hr\FullCalendarController@index')->name('fullcal');
// Route::post('fullcalendar/create','Hr\FullCalendarController@create');
// Route::post('fullcalendar/update','Hr\FullCalendarController@update');
// Route::post('fullcalendar/delete','Hr\FullCalendarController@destroy');









