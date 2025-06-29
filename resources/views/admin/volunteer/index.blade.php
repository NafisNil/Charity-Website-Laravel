@extends('admin.layouts.master')
@section('title')
    Volunteer Application - Index
@endsection
@section('content')
    <!-- Include SweetAlert CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6 offset-3">
                    <h1>Volunteer Application</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Volunteer Application</li>
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
                        <h3 class="card-title">Volunteer Application</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.sessionMsg')
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>address</th>
                                    <th>occupation</th>
                                    <th>message</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>






                                @foreach ($volunteers as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->occupation }}</td>
                                        <td>{{ $item->message }}</td>

                                        <td>


          

                                            <button class="btn btn-outline-danger btn-sm" title="Delete"
                                                onclick="confirmDelete({{ $item->id }})"><i
                                                    class="fas fa-trash"></i></button>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('metric.destroy', [$item]) }}" method="POST"
                                                style="display:none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>



                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>address</th>
                                    <th>occupation</th>
                                    <th>message</th>
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
@endsection
