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
        <label for="exampleInputEmail1">Title <span style="color:red">*</span></label>

        <input type="text" class="form-control" name="title" value="{!! old('title', @$edit->title) !!}" required>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description <span style="color:red">*</span></label>

        <textarea name="description" id="" cols="30" rows="5" class="form-control">{!! old('description', @$edit->description) !!}</textarea>

    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Tag <span style="color:red">*</span></label>

        <input type="text" class="form-control" name="tags" value="{!! old('tags', @$edit->tags) !!}" placeholder="Enter tags separated by commas">

    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Category </label>

        <select name="blog_category_id" id="" class="form-control">
            <option value="">Select Category</option>
            @foreach($blogCategories as $category)
                <option value="{{ $category->id }}" {{ @$edit->blog_category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

  </div>



    <div class="form-group">
        <label for="exampleInputEmail1">Status <span style="color:red">*</span></label>
        <select name="status" class="form-control">
            <option value="active" {{ @$edit->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ @$edit->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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