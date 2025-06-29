<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryRequest;
use Illuminate\Support\Str;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogCategories = BlogCategory::all();
        return view('admin.blogCategory.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request)
    {
        //
        $blogCategory = BlogCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]); 
        return redirect()->route('blogCategory.index')->with('success', 'Blog Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        //
        return view('admin.blogCategory.edit', ['edit' => $blogCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        //
         $blogCategory->update([
            'name' => $request->name,
           'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('blogCategory.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        //
         $blogCategory->delete();
        return redirect()->route('blogCategory.index')->with('success', 'Data deleted successfully');
    }
}
