@extends('admin.layouts.master')
@section('title')
    Social Media- Index
@endsection
@section('content')
  <!-- Include SweetAlert CSS and JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Social Media</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Social Media</li>
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
                <h3 class="card-title">Social Media</h3>

                @if ($socialCount < 1)
                <a href="{{route('social.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>

                @endif
           


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                   
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Youtube</th>
                    <th>Twitter</th>
                  <th>Linkedin</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                  

                    @if ($socialCount > 0)
                    <tr>
                      <td>1</td>
                   
                      <td>  <a href="{{ @$social->facebook }}">{{@$social->facebook}}</a> </td>
                          <td>  <a href="{{ @$social->instagram }}">{{@$social->instagram}}</a> </td>
                             <td>  <a href="{{ @$social->youtube }}">{{@$social->youtube}}</a> </td>
                        <td>  <a href="{{ @$social->twitter }}">{{@$social->twitter}}</a> </td>
                      
                            <td>  <a href="{{ @$social->linkedin }}">{{@$social->linkedin}}</a> </td>
                           
                 
                     <td>
  
  
                        <a href="{{route('social.edit',[$social->id])}}" title="Edit"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
  
  
  
  
                        <form action="{{route('social.destroy',[$social->id])}}" method="POST">
                      
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-outline-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
  
  
  
                      </td>
  
                    </tr>
                    @endif

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                        
                     <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Youtube</th>
                    <th>Twitter</th>
                  <th>Linkedin</th>
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
