@include('admin.sessionMsg')
<div class="card-body">


    <div class="form-group row">
        <label for="Image" class="col-md-4 col-form-label text-md-right"></label>
        <div class="col-md-6">

            <img id="showImage"
                src="{{ !empty($edit->photo) ? URL::to('storage/' . $edit->photo) : URL::to('image/no_image.png') }}"
                style="widows: inherit; width:120px; height:120px; border:1px solid #042b3d" alt="">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Image <span style="color:red">*</span></label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="photo" class="custom-file-input" id="image"
                    value="{{ @$item->photo }}">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>

        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Name <span style="color:red">*</span></label>

        <input type="text" class="form-control" name="name" value="{!! old('name', @$edit->name) !!}">

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description <span style="color:red">*</span></label>

        <textarea name="description" id="" cols="30" rows="5" class="form-control">{!! old('description', @$edit->description) !!}</textarea>

    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Date <span style="color:red">*</span></label>

        <input type="date" class="form-control" name="date" value="{!! old('date', @$edit->date) !!}">

    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Currency <span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="currency"  value="{!!old('currency',@$edit->currency)!!}" placeholder="USD or GBP or EUR">

  </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Amount Raised <span style="color:red" >*</span></label>

    <input type="number" step="any"  class="form-control" name="amount_raised"  value="{!!old('amount_raised',@$edit->amount_raised)!!}">

  </div>


    <div class="form-group">
    <label for="exampleInputEmail1">Goal Amount <span style="color:red" >*</span></label>

    <input type="number" step="any"  class="form-control" name="goal_amount"  value="{!!old('goal_amount',@$edit->goal_amount)!!}">

  </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Status <span style="color:red">*</span></label>
        <select name="status" class="form-control">
            <option value="active" {{ @$edit->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="paused" {{ @$edit->status == 'paused' ? 'selected' : '' }}>Paused</option>
        </select>
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>

    CKEDITOR.replace( 'description' );
    
</script>