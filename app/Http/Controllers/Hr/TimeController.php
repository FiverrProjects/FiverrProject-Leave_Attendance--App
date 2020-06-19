<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Time;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class TimeController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $times = Time::all();
        return view('hr/time/create',compact('times'));

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
        //storing leave form details into database
        $time = new Time();
        $time->starttime= $request->starttime;
        $time->endtime = $request->endtime;
        $time->from = $request->from;
        $time->to = $request->to;
        $time->overtime = $request->overtime;
        $time->save();

        //displaying notification message to user after adding employee
        Toastr::success('Time Created Successfully','Success');
        return redirect()->back();
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
        $time = Time::where('id',$id)->first();
        return view('hr/time/edit',compact('time'));
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
        $time = Time::where('id',$id)->first();
        $time->starttime= $request->starttime;
        $time->endtime = $request->endtime;
        $time->from = $request->from;
        $time->to = $request->to;
        $time->overtime = $request->overtime;
        $time->save();

        //displaying notification message to user after updating time
        Toastr::success('Time Updated Successfully','Success');
        return redirect()->route('time.create');

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
