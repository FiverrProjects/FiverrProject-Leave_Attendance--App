<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Leave;
use Brian2694\Toastr\Facades\Toastr;


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
    public function allleave()
    {
        //
        $allleaves = Leave::all();
        return view('hod/leave/all_leave', compact('allleaves'));


    }


    public function index()
    {
        //
        $leaves = Leave::where('status', 0)->get();
        
        return view('hod/leave/index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $leave = Leave::where('id',$id)->first();
        return view('hod/leave/edit',compact('leave'));
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
        $leave = Leave::where('id',$id)->first();
        $leave->Hodstamp = $request->Hodstamp;
        $leave->save();
        Toastr::success('Stamp Successfully Added','Success');
        return redirect()->route('hodleave.index');
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
        $leave = Leave::find($id);
        $leave->delete();

        Toastr::success('Leave Successfully Deleted','Success');
        return redirect()->back();
    }

    public function approval($id)
    {
        $leave = Leave::find($id);
        if ($leave->status == 0)
        {
            $leave->status = 1;
            $leave->save();

            Toastr::success('Leave Successfully Approved','Success');
        } else {
            Toastr::info('This Post is already approved','Info');
        }
        return redirect()->back();
    }

    public function decline($id)
    {
        $leave = Leave::find($id);
        if ($leave->status == 0)
        {
            $leave->status = 3;
            $leave->save();

            Toastr::success('Leave Successfully Declined','Success');
        } else {
            Toastr::info('This Post is already approved','Info');
        }
        return redirect()->back();
    }
}
