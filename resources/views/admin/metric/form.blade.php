
@include('admin.sessionMsg')
<div class="card-body">






  <div class="form-group">
    <label for="exampleInputEmail1">Name <span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="name"  value="{!!old('name',@$edit->name)!!}">

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Amount <span style="color:red" >*</span></label>

    <input type="number"  class="form-control" name="amount"  value="{!!old('amount',@$edit->amount)!!}">

  </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>






