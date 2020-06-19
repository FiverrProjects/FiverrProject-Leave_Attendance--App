<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Leave;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class LeaveController extends Controller
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
        //returning the leaves applied by an employess
        $leaves = Auth::user()->leave()->latest()->get();
        return view('employee/leave/index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returining the leave appliacation form
        return view('employee/leave/create');
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
        //storing levae form details into database
        $leave = new Leave();
        $leave->name = Auth::user()->name;
        $leave->user_id = Auth::user()->id;
        $leave->position = $request->position;
        $leave->type = $request->type;
        $leave->reason = $request->reason;
        $leave->fromdate = $request->fromdate;
        $leave->todate = $request->todate;
        $leave->numofdays = $request->numofdays;
        $leave->save();

        //displaying notificartion message to user after applying for leave
        Toastr::success('Leave Applied Successfully','Success');
        return redirect()->route('employeedashboard');
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
        //
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
    }
}
