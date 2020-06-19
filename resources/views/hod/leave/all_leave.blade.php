@extends('hod/layouts/app')

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
                                <th>Name Of Applicant</th>
                                <th>Number Of Days</th>
                                <th>Satus</th>
                                <!-- <th>Action</th> -->
                                <!-- <th>Start date</th>
                                <th>Salary</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allleaves as $allleave)
                            <tr>
                                <td>{{$allleave->name}}</td>
                                <td>{{$allleave->numofdays}}</td>
                                <td>
                                @if($allleave->status == 0)
                                <span class="badge badge-success">Waiting on HOD</span>
                                @elseif($allleave->status == 1)
                                <span class="badge badge-danger">Waiting on Manager</span>
                                @elseif($allleave->status == 2)
                                <span class="badge badge-danger">Leave Approved</span>
                                @elseif($allleave->status == 3)
                                <span class="badge badge-danger">Leave Declined</span>
                                @endif
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
@push('js')
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
        function approvePost(id) 
        {
            swal({
                title: 'Are you sure?',
                text: "You want to approve this Leave? ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approve-form-'+ id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'This Leave remains pending :)',
                        'info'
                    )
                }
            })

        }
        function declinePost(id) 
        {
            swal({
                title: 'Are you sure?',
                text: "You want to decline this Leave? ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, decline it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('decline-form-'+ id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'This Leave remains pending :)',
                        'info'
                    )
                }
            })

        }
    </script>
@endpush