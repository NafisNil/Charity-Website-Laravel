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
        <label for="exampleInputEmail1">Location <span style="color:red">*</span></label>

        <input type="text" class="form-control" name="location" value="{!! old('location', @$edit->location) !!}">

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
        <label for="exampleInputEmail1">Time <span style="color:red">*</span></label>

       <input type="time" class="form-control" name="time"
    value="{{ old('time', isset($edit->time) ? \Illuminate\Support\Carbon::parse($edit->time)->format('H:i') : '') }}">


    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Organizer name <span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="organizer"  value="{!!old('organizer',@$edit->organizer)!!}" placeholder="">

  </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Status <span style="color:red">*</span></label>
        <select name="status" class="form-control">
            <option value="previous" {{ @$edit->status == 'previous' ? 'selected' : '' }}>Previous</option>
            <option value="ongoing" {{ @$edit->status == 'ongoing' ? 'selected' : '' }}>On-going</option>
            <option value="upcoming" {{ @$edit->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
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