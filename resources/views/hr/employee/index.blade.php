@extends('hr/layouts/app')

@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Employee List</h6>
                <!-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                        DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee ID</th>
                                <th>Enrolment ID</th>
                                <th>Employee Name</th>
                                <th>NID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->emp_id}}</td>
                                <td>{{$employee->enrolment_id}}</td>
                                <td>{{$employee->emp_name}}</td>
                                <td>{{$employee->nid}}</td>
                                <td>
                                     <a href="{{route('employee.edit',$employee->id)}}">
                                        <button type="button" data-toggle="tooltip" data-placement="top"
                                            title="edit employee" class="btn btn-primary">
                                            <i data-feather="edit"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('single.create')}}">
                                        <button type="button" data-toggle="tooltip" data-placement="top"
                                            title="add new employee" class="btn btn-primary">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                        title="trash" type="button" onclick="deletePost({{ $employee->id }})">
                                        <i data-feather="trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $employee->id }}"
                                        action="{{ route('employee.destroy',$employee->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
                document.getElementById('delete-form-' + id).submit();
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

    function approvePost(id) {
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
                document.getElementById('approve-form-' + id).submit();
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

    function declinePost(id) {
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
                document.getElementById('decline-form-' + id).submit();
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
