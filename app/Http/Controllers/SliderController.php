<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $slider = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider.index',['slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        //
        $slider = Slider::create($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $slider);
        }

        return redirect()->route('slider.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
        return view('admin.slider.edit',[
            'edit' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        //

        $slider->update($request->all());
        if ($request->hasFile('photo')) {
           @unlink('storage/'.$slider->photo);
            $this->_uploadImage($request, $slider);
        }

        return redirect()->route('slider.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
        if(!empty($slider->photo)){
            @unlink('storage/'.$slider->photo);
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('status','Data deleted successfully!');
    }

    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1128)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }

}
