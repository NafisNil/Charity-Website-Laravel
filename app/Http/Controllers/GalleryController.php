<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\GalleryRequest;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gallery = Gallery::orderBy('id', 'desc')->get();
        return view('admin.gallery.index',['gallery'=>$gallery]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        //
        $gallery = Gallery::create($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $gallery);
        }

        return redirect()->route('gallery.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
        return view('admin.gallery.edit',[
            'edit' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        //
         $gallery->update($request->all());
        if ($request->hasFile('photo')) {
           @unlink('storage/'.$gallery->photo);
            $this->_uploadImage($request, $gallery);
        }

        return redirect()->route('gallery.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
           if(!empty($gallery->photo)){
            @unlink('storage/'.$gallery->photo);
        }
        $gallery->delete();
        return redirect()->route('gallery.index')->with('status','Data deleted successfully!');
    }

    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(2000, 1000)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}
