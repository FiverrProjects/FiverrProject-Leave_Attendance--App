@extends('hr/layouts/app')

@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Add New Employee</h6>
                <form method="POST" action="{{ route('single.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputText1">Employee Name</label>
                        <input type="text" class="form-control" id="exampleInputText1" value=""
                            placeholder="Enter Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText2">Employee ID</label>
                        <input type="number" class="form-control" id="exampleInputText2" value=""
                            placeholder="Enter employee ID" name="empid" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText3">Enrolment ID</label>
                        <input type="number" class="form-control" id="exampleInputText3" value=""
                            placeholder="Enter enrolment ID" name="enrolid" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText4"> Employee NID</label>
                        <input type="text" class="form-control" id="exampleInputText4" placeholder="Enter employee NID" value="" name="nid" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
