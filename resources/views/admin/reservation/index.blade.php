@extends('layouts.app')


@section('site-title', 'Reservation')


@push('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@endpush

@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Reservations</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width: 100%">
                                    <thead class="text-primary">
                                    <th style="width: 8%">ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>E-Mail</th>
                                    <th>Time And Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($reservations as $key => $reservation)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $reservation->name }}</td>
                                                <td>{{$reservation->phone }}</td>
                                                <td>{{ $reservation->email }}</td>
                                                <td>{{ $reservation->date }}</td>
                                                <td>{{ $reservation->message }}</td>
                                                <td>
                                                    @if($reservation->status)
                                                        <span class="label label-success">Confirmed</span>
                                                    @else
                                                        <span class="label label-danger">Not Confirmed Yet</span>
                                                    @endif
                                                </td>
                                                <td>{{ $reservation->created_at }}</td>
                                                <td>
                                                    @if(! $reservation->status)
                                                        <button onclick="confirmReservation({{ $reservation->id  }})" type="button" class="btn btn-info"><i class="material-icons">done</i></button>
                                                        <form action="{{ route('admin.reservation.status', $reservation->id) }}" method="POST" id="status-form-{{ $reservation->id }}" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @else
                                                        <button onclick="rejectReservation({{ $reservation->id  }})" type="button" class="btn btn-danger"><i class="material-icons">done</i></button>
                                                        <form action="{{ route('admin.reservation.inverseStatus', $reservation->id) }}" method="POST" id="reject-form-{{ $reservation->id }}" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endif
                                                    <button onclick="deleteReservation({{ $reservation->id  }})" type="button" class="btn btn-danger"><i class="material-icons">delete</i></button>
                                                    <form action="{{ route('admin.reservation.destroy', $reservation->id) }}" method="POST" id="delete-form-{{ $reservation->id }}" style="display: none;">
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
        </div>
    </div>


@endsection


@push('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>

    <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@8.3.0/dist/sweetalert2.all.min.js"></script>
    <!-- Sweet Alert 2 End -->

    @if(session('successMsg'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                type: 'success',
                title: '{{ session('successMsg') }}'
            })
        </script>
    @endif


    <script type="text/javascript">
        function deleteReservation(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You want to delete this slider!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>


    <script type="text/javascript">
        function confirmReservation(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You want to confirm this request!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, confirm it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('status-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

        function rejectReservation(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You want to reject this request!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, reject it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('reject-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

    </script>


@endpush
