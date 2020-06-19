@extends('hr/layouts/app')

@section('main-content')
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Employee Import</h4>
                <!-- <p class="card-description">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official
                        jQuery Validation Documentation </a>for a full list of instructions and other options.</p> -->
                <form class="cmxform" id="signupForm" method="POST" action="{{route('employee.import')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group">
                            <label for="file">Choose Excel FIle</label>
                            <input id="file" class="form-control" name="file" type="file">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Upload History</h6>
                <!-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                        DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>File Name</th>
                                <th>Date of Upload</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>555</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
