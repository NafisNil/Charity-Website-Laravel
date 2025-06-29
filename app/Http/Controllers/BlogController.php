<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

use Image;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $blog = Blog::latest()->get();
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $blogCategories = BlogCategory::all();
         return view('admin.blog.create',['blogCategories' => $blogCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        //
        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
           
            'blog_category_id' => $request->blog_category_id,
            'status' => $request->status,
            'tags' => $request->tags,
        ]);

           if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $blog);
        }

        return redirect()->route('blog.index')->with('success','Data inserted successfully');

    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
         $blogCategories = BlogCategory::all();
        return view('admin.blog.edit', [
            'edit' => $blog,
            'blogCategories' => $blogCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        //
        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'blog_category_id' => $request->blog_category_id,
            'status' => $request->status,
            'tags' => $request->tags,
        ]);

          if ($request->hasFile('photo')) {
           @unlink('storage/'.$blog->photo);
            $this->_uploadImage($request, $blog);
        }

        return redirect()->route('blog.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
          if(!empty($blog->photo)){
            @unlink('storage/'.$blog->photo);
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('status','Data deleted successfully!');
    }

        private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(515, 230)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}
