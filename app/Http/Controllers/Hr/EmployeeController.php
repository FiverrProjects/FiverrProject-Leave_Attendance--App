<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportEmployees;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
use App\Employee;
use DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return view('hr/employee/index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hr/employee/create');
    }

    public function singlecreate()
    {
        //
        return view('hr/employee/singlecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::where('id',$id)->first();
        return view('hr/employee/edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //editing employee details
        $employee = Employee::where('id',$id)->first();
        $employee->emp_name = $request->name;
        $employee->emp_id = $request->empid;
        $employee->enrolment_id = $request->enrolid;
        $employee->nid = $request->nid;
        $employee->save();

        //displaying notification ufter upate
        Toastr::success('Employee Updated Successfully','Success');
        return redirect()->route('employee.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = employee::find($id);
        $employee->delete();

        Toastr::success('Employee Deleted Successfully','Success');
        return redirect()->back();
    }

    //Excel Import of Employess
    public function import(Request $request)
    {
        //bulk upload of  employees
        $request->validate([
            'file' => 'required'
        ]);

        Excel::import(new ImportEmployees, request()->file('file'));
        Toastr::success('File Imported Successfully','Success');
        return redirect()->back();
        // $file = $request->file('file');

        // if (isset($file))
        // {
        //     $filename = $file->getClientOriginalName();

        //     if (!file_exists('uploads/imports'))
        //     {
        //         mkdir('uploads/imports',0777,true);
        //     }
        //     $file->move('uploads/imports',$filename);
        //     Excel::import(new ImportEmployees, request()->file('file'));
        //     Toastr::success('File Imported Successfully','Success');
        
        //     return redirect()->back();
        // }else{
        //     $filename = "default.xlss";
        //     return "NO file";
        // }
    }

    public function singlestore(Request $request)
    {
        //storing employee  details into database
        $employee = new Employee();
        $employee->emp_name = $request->name;
        $employee->emp_id = $request->empid;
        $employee->enrolment_id = $request->enrolid;
        $employee->nid = $request->nid;
        $employee->save();

        //displaying notification message to user after adding employee
        Toastr::success('Employee Created Successfully','Success');
        return redirect()->back();
    }
}
