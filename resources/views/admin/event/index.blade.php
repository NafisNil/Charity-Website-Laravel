@extends('admin.layouts.master')
@section('title')
    Event - Index
@endsection
@section('content')
    <!-- Include SweetAlert CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6 offset-3">
                    <h1>Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Event</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row offset-1">
                <!-- left column -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Event</h3>


                        <a href="{{ route('event.create') }}" class="float-right btn btn-outline-dark btn-sm mb-2"><i
                                class="fas fa-plus-square"></i></a>



                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.sessionMsg')
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Date/Time</th>

                                    <th>Location</th>

                                    <th>Photo</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>






                                @forelse ($event as $key => $item )

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                           @if ($item->status == 'previous')
                                                <span class="badge bg-danger">Previous</span>
                                            @elseif ($item->status == 'ongoing')
                                                <span class="badge bg-warning">Ongoing</span>
                                            @elseif ($item->status == 'upcoming')
                                                <span class="badge bg-success">Upcoming</span>

                                               
                                           @endif
                                        </td>

                                        <td>{{ date('d M Y', strtotime($item->date)) }} / {{$item->time->format('')}}</td>


                                        <td>{{ $item->location }} </td>
                                        <td> <img
                                                src="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}"
                                                alt="" style="max-height:120px"></td>

                                        <td>


                                            <a href="{{ route('event.edit', [$item]) }}" title="Edit"><button
                                                    class="btn btn-outline-info btn-sm"><i
                                                        class="fas fa-pen-square"></i></button></a>
                                            <button class="btn btn-outline-primary btn-sm" title="View Description"
                                                data-toggle="modal" data-target="#descriptionModal{{ $item->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>



                                            <button class="btn btn-outline-danger btn-sm" title="Delete"
                                                onclick="confirmDelete({{ $item->id }})"><i
                                                    class="fas fa-trash"></i></button>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('event.destroy', [$item]) }}" method="POST"
                                                style="display:none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>



                                        </td>

                                    </tr>
                                    {{-- Place this just before @endsection --}}
                                    <!-- Description Modal for each campaign -->
                                    <div class="modal fade" id="descriptionModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="descriptionModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="descriptionModalLabel{{ $item->id }}">
                                                        Campaign Description</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $item->description !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <span class="text-danger">Do data available!</span>
                                @endforelse

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                  <th>Name</th>
                                    <th>Status</th>
                                    <th>Date/Time</th>

                                    <th>Location</th>

                                    <th>Photo</th>

                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
    <script>
        function showDescription() {

            // Show modal (Bootstrap 4/5 compatible)
            $('#descriptionModal').modal('show');
        }

        function closeDescriptionModal() {
            $('#descriptionModal').modal('hide');
        }
    </script>
@endsection
