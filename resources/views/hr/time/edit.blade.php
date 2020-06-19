@extends('hr/layouts/app')

@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Time Setting</h6>
                <form method="POST" action="{{ route('time.update',$time->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputText1">Work Start</label>
                        <input type="time" class="form-control" id="exampleInputText1" value="{{$time->starttime}}"
                            placeholder="Enter work start time" name="starttime" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText2">Work End</label>
                        <input type="time" class="form-control" id="exampleInputText2" value="{{$time->endtime}}"
                            placeholder="Enter work end time" name="endtime" required>
                    </div>
                    <h6 class="card-title">Bonus Time</h6>
                    <div class="form-group">
                        <label for="exampleInputText3">From</label>
                        <input type="time" class="form-control" id="exampleInputText3" value="{{$time->from}}"
                            placeholder="Enter bous time start" name="from" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText4"> To</label>
                        <input type="time" class="form-control" id="exampleInputText4" placeholder="Enter bonus time end" value="{{$time->to}}" name="to" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText4">Overtime After</label>
                        <input type="time" class="form-control" id="exampleInputText4" placeholder="Enter overtime start" value="{{$time->overtime}}" name="overtime" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
