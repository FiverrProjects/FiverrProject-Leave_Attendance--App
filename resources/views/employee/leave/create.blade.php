@extends('employee/layouts/app')

@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Leave Application Form</h6>
                <form method="POST" action="{{ route('leave.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputText1">Name of Applicant</label>
                        <input type="text" class="form-control" id="exampleInputText1" value="{{Auth::user()->name}}"
                            placeholder="Enter Name" name="name" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText2">Position Held</label>
                        <input type="text" class="form-control" id="exampleInputText2" value=""
                            placeholder="Enter Position" name="position" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Leave Type</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="type" required>
                            <option selected disabled>Select your leave type</option>
                            <option>Casual Leave</option>
                            <option>Casual Leave(On and Off)</option>
                            <option>Vacation Leave(Local)</option>
                            <option>Vacation Leave(Abroad)</option>
                            <option>Sick Leave</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText3">Reason for Leave</label>
                        <input type="text" class="form-control" id="exampleInputText3" value=""
                            placeholder="Enter Leave Reason" name="reason" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText4">From</label>
                        <input type="date" class="form-control" id="exampleInputText4" value="" name="fromdate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText5">To</label>
                        <input type="date" class="form-control" id="exampleInputText5" value="" name="todate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNumber1">Number Of Days</label>
                        <input type="number" class="form-control" id="exampleInputNumber1" value="" placeholder="Enter number of days" name="numofdays" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNumber1">Head of Department Stamp(Initials)</label>
                        <input type="text" class="form-control" id="exampleInputNumber1" value="" placeholder="Enter your initials" name="hodstamp" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNumber1">Manager Stamp(Initials)</label>
                        <input type="text" class="form-control" id="exampleInputNumber1" value="" placeholder="Enter your initials" name="managerstamp" disabled>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

