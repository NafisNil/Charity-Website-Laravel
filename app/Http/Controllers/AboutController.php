<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use Image;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $about = About::orderBy('id', 'desc')->first();
        $aboutCount = About::count();
        return view('admin.about.index', compact('about','aboutCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        //
        $about = About::create($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $about);
        }

        return redirect()->route('about.index')->with('status', 'About information created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
        return view('admin.about.edit', [
            'edit' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        //
        $about->update($request->all());
        if ($request->hasFile('photo')) {
           @unlink('storage/'.$about->photo);
            $this->_uploadImage($request, $about);
        }
        return redirect()->route('about.index')->with('status', 'About information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
          if(!empty($about->photo)){
            @unlink('storage/'.$about->photo);
        }
        $about->delete();
        return redirect()->route('about.index')->with('status', 'About information deleted successfully!');
    }

    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(280, 292)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}
