@extends('employee/layouts/app')

@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">LEAVE STATUS</h6>
                <!-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                        DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Type Of Leave</th>
                                <th>Number Of Days</th>
                                <th>Satus</th>
                                <!-- <th>Action</th> -->
                                <!-- <th>Start date</th>
                                <th>Salary</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaves as $leave)
                            <tr>
                                <td>{{$leave->type}}</td>
                                <td>{{$leave->numofdays}}</td>
                                <td>
                                @if($leave->status == 0)
                                <span class="badge badge-warning">Waiting on HOD</span>
                                @elseif($leave->status == 1)
                                <span class="badge badge-primary">Waiting on Manager</span>
                                @elseif($leave->status == 2)
                                <span class="badge badge-success">Leave Approved</span>
                                @elseif($leave->status == 3)
                                <span class="badge badge-danger">Leave Declined</span>
                                @endif
                                </td>
                                <!-- <td>{{$leave->numofdays}}</td> -->
                                <!-- <td>2011/04/25</td>
                                <td>$320,800</td> -->
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
