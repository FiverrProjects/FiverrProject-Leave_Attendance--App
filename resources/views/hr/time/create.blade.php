@extends('hr/layouts/app')

@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Time Setting</h6>
                <form method="POST" action="{{ route('time.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputText1">Work Start</label>
                        <input type="time" class="form-control" id="exampleInputText1" value=""
                            placeholder="Enter work start time" name="starttime" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText2">Work End</label>
                        <input type="time" class="form-control" id="exampleInputText2" value=""
                            placeholder="Enter work end time" name="endtime" required>
                    </div>
                    <h6 class="card-title">Bonus Time</h6>
                    <div class="form-group">
                        <label for="exampleInputText3">From</label>
                        <input type="time" class="form-control" id="exampleInputText3" value=""
                            placeholder="Enter bous time start" name="from" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText4"> To</label>
                        <input type="time" class="form-control" id="exampleInputText4" placeholder="Enter bonus time end" value="" name="to" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText4">Overtime After</label>
                        <input type="time" class="form-control" id="exampleInputText4" placeholder="Enter overtime start" value="" name="overtime" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Work Time</h6>
                <!-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                        DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Bonus Time Start</th>
                                <th>Bonus Time End</th>
                                <th>Overtime</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($times as $time)
                            <tr>
                                <td>{{$time->starttime}}</td>
                                <td>{{$time->endtime}}</td>
                                <td>{{$time->from}}</td>
                                <td>{{$time->to}}</td>
                                <td>{{$time->overtime}}</td>
                                <td>
                                     <a href="{{route('time.edit',$time->id)}}">
                                        <button type="button" data-toggle="tooltip" data-placement="top"
                                            title="edit time settings" class="btn btn-primary">
                                            <i data-feather="edit"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
